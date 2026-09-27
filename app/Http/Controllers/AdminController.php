<?php

namespace App\Http\Controllers;

use App\Models\Inquiry;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class AdminController extends Controller
{
    public function showLogin(Request $request): View|RedirectResponse
    {
        if ($request->session()->get('admin_authenticated') === true) {
            return redirect()->route('admin.index');
        }

        return view('admin.login');
    }

    public function login(Request $request): RedirectResponse
    {
        $request->validate([
            'username' => ['required', 'string', 'max:255'],
            'password' => ['required', 'string', 'max:255'],
        ]);

        $configuredUsername = config('services.admin.username');
        $configuredPassword = config('services.admin.password');

        if (! filled($configuredUsername) || ! filled($configuredPassword)) {
            return back()
                ->withErrors(['credentials' => 'Admin sign in is not configured. Add ADMIN_USERNAME and ADMIN_PASSWORD to the project .env file, then try again.'])
                ->onlyInput('username');
        }

        if (! hash_equals((string) $configuredUsername, (string) $request->input('username'))
            || ! hash_equals((string) $configuredPassword, (string) $request->input('password'))) {
            return back()->withErrors(['credentials' => 'Those admin credentials are not correct.'])->onlyInput('username');
        }

        $request->session()->regenerate();
        $request->session()->put('admin_authenticated', true);

        return redirect()->intended(route('admin.index'));
    }

    public function index(): View
    {
        return view('admin.index', [
            'inquiries' => Inquiry::query()->latest()->paginate(20),
        ]);
    }

    public function logout(Request $request): RedirectResponse
    {
        $request->session()->forget('admin_authenticated');
        $request->session()->regenerateToken();

        return redirect()->route('admin.login');
    }
}
