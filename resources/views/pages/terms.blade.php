@extends('layouts.app')

@section('title', 'Request Terms — Sandstorm Industries')

@section('content')
<section class="w-full py-space-xl bg-surface">
    <div class="max-w-[1440px] mx-auto px-margin-mobile md:px-margin">
        @include('partials.page-heading', [
            'eyebrow' => 'Request terms',
            'icon' => 'description',
            'title' => 'What to expect when you enquire',
            'description' => 'Information for visitors and customers contacting Sandstorm Industries.',
        ])
        <div class="max-w-3xl p-space-lg bg-surface-container-lowest rounded-lg border border-outline-variant/40 shadow-sm flex flex-col gap-space-md font-body-md text-body-md text-on-surface-variant leading-relaxed">
            <p>Sending a request is not a confirmed order, test booking, certification or agreement to buy. We will review your requirements and confirm scope, sample quantities, price, schedule, delivery arrangements and any applicable standard before work begins.</p>
            <p>We aim to acknowledge inquiries within two business days, Monday to Saturday. This is a target, not a guaranteed turnaround. Test duration and production lead time depend on the service, sample condition, order size and current capacity; we will confirm them in writing before you proceed.</p>
            <p>Minimum quantities, available production capacity and service coverage vary by product and destination. Ask us for a quote with your product, quantity and delivery location. No minimum order, test result, certification or delivery date is guaranteed until confirmed in a written quotation or service agreement.</p>
            <p>Please send only information you are authorized to share. If you need confidentiality terms, ask us to agree those in writing before sending sensitive technical material. A request alone does not create a non-disclosure agreement.</p>
            <a class="inline-flex self-start underline text-primary" href="{{ route('contact') }}">Request a quote</a>
        </div>
    </div>
</section>
@endsection
