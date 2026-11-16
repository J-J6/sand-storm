@extends('layouts.app')

@section('title', 'Privacy Notice — Sandstorm Industries')

@section('content')
<section class="w-full py-space-xl md:py-16 bg-surface">
    <div class="max-w-[1440px] mx-auto px-margin-mobile md:px-margin">
        @include('partials.page-heading', [
            'eyebrow' => 'Privacy notice',
            'icon' => 'lock',
            'title' => 'How we handle your inquiry',
            'description' => 'Information for visitors and customers contacting Sandstorm Industries.',
        ])
        <div class="max-w-3xl p-space-lg bg-surface-container-lowest rounded-lg border border-outline-variant/40 shadow-sm flex flex-col gap-space-md font-body-md text-body-md text-on-surface-variant leading-relaxed">
            <p>When you contact Sandstorm, we collect the name, organization, email address, service requested and any message you choose to send. We use these details to respond, prepare a quote or arrange the requested service.</p>
            <p>Your inquiry is stored in our application database and shared with the Sandstorm team responsible for responding. We do not ask you to submit confidential formulas, customer records or sensitive personal information through this form.</p>
            <p>We keep inquiry details while they are needed to handle the request and related business records, then delete or anonymize them when no longer needed, subject to applicable record-keeping requirements. You may ask to access, correct or delete your details by emailing <a class="underline" href="mailto:info@sandstormindustries.co.ke">info@sandstormindustries.co.ke</a>.</p>
            <p>For personal-data questions, contact us at that address. Do not send sensitive information by email unless we have agreed on a suitable method.</p>
            <a class="inline-flex self-start underline text-primary" href="{{ route('contact') }}">Contact us</a>
        </div>
    </div>
</section>
@endsection
