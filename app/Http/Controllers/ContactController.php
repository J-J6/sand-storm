<?php

namespace App\Http\Controllers;

use App\Models\Inquiry;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Mail\Message;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Illuminate\View\View;

class ContactController extends Controller
{
    public function index(): View
    {
        return view('pages.home');
    }

    public function submit(Request $request): RedirectResponse
    {
        $successMessage = 'Thanks, your inquiry has been received. Our team aims to respond within two business days. If your request is urgent, please call us.';

        // Honeypot: real visitors never see this field, so a value means a bot.
        // Return the normal success message so the bot learns nothing.
        if (filled($request->input('hp_check'))) {
            return back()->with('success', $successMessage);
        }

        $validated = $request->validate([
            'fullName' => ['required', 'string', 'max:255'],
            'orgName' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'max:255'],
            'serviceInterest' => ['required', 'in:cement-packaging,raw-material,qa-audit,consulting,job-inquiry'],
            'batchDetails' => ['nullable', 'string', 'max:5000'],
        ]);

        $inquiry = Inquiry::create([
            'full_name' => $validated['fullName'],
            'organization' => $validated['orgName'],
            'email' => $validated['email'],
            'service_interest' => $validated['serviceInterest'],
            'message' => $validated['batchDetails'] ?? null,
        ]);

        try {
            Mail::raw(
                "New website inquiry #{$inquiry->id}\n\nName: {$inquiry->full_name}\nOrganization: {$inquiry->organization}\nEmail: {$inquiry->email}\nService: {$inquiry->service_interest}\n\nMessage:\n".($inquiry->message ?? '(none)'),
                function (Message $message): void {
                    $message->to(config('sandstorm.inquiry_recipient'))
                        ->subject('New Sandstorm website inquiry');
                }
            );
        } catch (\Throwable $exception) {
            Log::error('Inquiry notification email could not be sent.', [
                'inquiry_id' => $inquiry->id,
                'exception' => $exception->getMessage(),
            ]);
        }

        return back()->with($validated['serviceInterest'] === 'job-inquiry' ? 'job_success' : 'success', $successMessage);
    }
}