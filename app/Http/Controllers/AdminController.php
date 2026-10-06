<?php

namespace App\Http\Controllers;

use App\Models\Inquiry;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class AdminController extends Controller
{
    private const JOB = 'job-inquiry';

    private const SERVICES = [
        'cement-packaging' => 'Cement Packaging',
        'raw-material' => 'Raw Material',
        'qa-audit' => 'QA Audit',
        'consulting' => 'Consulting',
    ];

    public function showLogin(Request $request): View|RedirectResponse
    {
        if (Auth::check()) {
            return redirect()->route('admin.index');
        }

        return view('admin.login');
    }

    public function login(Request $request): RedirectResponse
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required', 'string'],
        ]);

        if (! Auth::attempt($credentials)) {
            return back()
                ->withErrors(['credentials' => 'Those admin credentials are not correct.'])
                ->onlyInput('email');
        }

        $request->session()->regenerate();

        return redirect()->intended(route('admin.index'));
    }

    public function index(Request $request): View|RedirectResponse
    {
        $search = trim((string) $request->query('q', ''));
        $service = (string) $request->query('service', '');
        $type = $request->query('type') === 'jobs' ? 'jobs' : 'inquiries';
        $isJobs = $type === 'jobs';

        // Job applications and service inquiries are kept in separate sections.
        $scope = fn () => $isJobs
            ? Inquiry::where('service_interest', self::JOB)
            : Inquiry::where('service_interest', '!=', self::JOB);

        $inquiries = $scope()
            ->when($search !== '', function ($query) use ($search) {
                $like = '%'.$search.'%';

                $query->where(function ($query) use ($like) {
                    $query->where('full_name', 'like', $like)
                        ->orWhere('organization', 'like', $like)
                        ->orWhere('email', 'like', $like)
                        ->orWhere('message', 'like', $like);
                });
            })
            ->when(! $isJobs && array_key_exists($service, self::SERVICES), fn ($query) => $query->where('service_interest', $service))
            ->latest()
            ->paginate(20)
            ->withQueryString();

        // After deleting the last row on a page, jump to the last page that still has rows.
        if ($inquiries->isEmpty() && $inquiries->currentPage() > 1) {
            return redirect()
                ->route('admin.index', array_merge($request->query(), ['page' => $inquiries->lastPage()]))
                ->with('status', session('status'));
        }

        return view('admin.index', [
            'inquiries' => $inquiries,
            'serviceLabels' => self::SERVICES,
            'type' => $type,
            'counts' => [
                'inquiries' => Inquiry::where('service_interest', '!=', self::JOB)->count(),
                'jobs' => Inquiry::where('service_interest', self::JOB)->count(),
            ],
            'stats' => [
                'total' => $scope()->count(),
                'today' => $scope()->where('created_at', '>=', now()->startOfDay())->count(),
                'week' => $scope()->where('created_at', '>=', now()->subDays(7))->count(),
            ],
        ]);
    }

    public function destroy(Inquiry $inquiry): RedirectResponse
    {
        $name = $inquiry->full_name;
        $inquiry->delete();

        return back()->with('status', "The inquiry from {$name} was deleted.");
    }

    public function logout(Request $request): RedirectResponse
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('admin.login');
    }
}