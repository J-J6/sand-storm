@extends('layouts.app')

@section('title', 'Contact Sandstorm Industries — Mombasa')

@section('content')

{{-- Contact Section --}}
<section class="w-full py-space-xl bg-surface" id="contact">
    <div class="max-w-[1440px] mx-auto px-margin-mobile md:px-margin">
        @include('partials.page-heading', [
            'eyebrow' => 'Contact and quote requests',
            'icon' => 'contact_support',
            'title' => 'Tell us what you need',
            'description' => 'Ask about packaging, a test, a production review or a quote. We will confirm the scope, price, sample quantity and schedule before work begins.',
        ])

        <div class="grid grid-cols-1 lg:grid-cols-12 gap-space-xl items-stretch">

            {{-- Company Details --}}
            <div class="lg:col-span-5 flex h-full flex-col gap-space-lg">
                <div class="p-space-lg bg-surface-container-lowest rounded-lg border border-outline-variant/40 shadow-sm flex flex-col gap-space-md">
                    <h3 class="font-headline-sm text-headline-sm text-primary font-bold">Mikindani Operations Facility</h3>
                    <div class="flex flex-col gap-space-md">
                        <div class="flex items-start gap-space-md">
                            <span class="material-symbols-outlined text-on-tertiary-container mt-1 shrink-0">pin_drop</span>
                            <div class="flex flex-col">
                                <span class="font-label-technical text-label-technical text-secondary uppercase">PHYSICAL ADDRESS</span>
                                <p class="font-body-md text-body-md text-primary font-medium mt-0.5">
                                    Mikindani Industrial Zone, Off Makupa Causeway<br>Mombasa County, Kenya
                                </p>
                            </div>
                        </div>
                        <div class="flex items-start gap-space-md">
                            <span class="material-symbols-outlined text-secondary mt-1 shrink-0">call</span>
                            <div class="flex flex-col">
                                <span class="font-label-technical text-label-technical text-secondary uppercase">TELEPHONE &amp; HOTLINE</span>
                                <p class="font-body-md text-body-md text-primary font-medium mt-0.5">
                                    <a class="underline" href="tel:+254412008490">+254 (0) 41 200 8490</a><br><a class="underline" href="tel:+254722000891">+254 (0) 722 000 891</a>
                                </p>
                                <span class="font-label-technical text-label-technical text-on-tertiary-container mt-1">Direct Laboratory Hotline: Ext 104</span>
                            </div>
                        </div>
                        <div class="flex items-start gap-space-md">
                            <span class="material-symbols-outlined text-secondary mt-1 shrink-0">mail</span>
                            <div class="flex flex-col">
                                <span class="font-label-technical text-label-technical text-secondary uppercase">OFFICIAL INQUIRIES</span>
                                <p class="font-body-md text-body-md text-primary font-medium mt-0.5">
                                    <a class="break-all underline underline-offset-4 hover:text-on-tertiary-container" href="mailto:info@sandstormindustries.co.ke">info@sandstormindustries.co.ke</a><br><a class="break-all underline underline-offset-4 hover:text-on-tertiary-container" href="mailto:compliance@sandstormindustries.co.ke">compliance@sandstormindustries.co.ke</a>
                                </p>
                            </div>
                        </div>
                        <div class="flex items-start gap-space-md">
                            <span class="material-symbols-outlined text-secondary mt-1 shrink-0">schedule</span>
                            <div class="flex flex-col">
                                <span class="font-label-technical text-label-technical text-secondary uppercase">OPERATIONAL HOURS</span>
                                <p class="font-body-md text-body-md text-primary font-medium mt-0.5">
                                    Monday &ndash; Saturday: 07:30 &ndash; 17:30 EAT<br>
                                    <span class="text-on-surface-variant font-normal">Call ahead to arrange a visit or sample drop-off.</span>
                                </p>
                            </div>
                        </div>
                    </div>

                    <a class="inline-flex items-center justify-center gap-2 rounded-lg bg-primary px-space-md py-space-sm text-on-primary shadow-sm hover:bg-primary-container" target="_blank" rel="noopener noreferrer" href="https://www.google.com/maps/search/?api=1&query=Mikindani+Industrial+Zone%2C+Mombasa%2C+Kenya">
                        <span class="material-symbols-outlined">directions</span> Open directions in Google Maps
                    </a>
                    <p class="font-body-sm text-body-sm text-on-surface-variant">Search the address before travelling; call ahead to confirm the correct entrance and visitor arrangements.</p>

                </div>
            </div>

            {{-- Contact Form --}}
            <div class="lg:col-span-7 h-full">
                <div class="h-full p-space-lg md:p-space-xl bg-surface-container-lowest rounded-lg border border-outline-variant/40 shadow-sm">
                    <h3 class="font-headline-sm text-headline-sm text-primary font-bold mb-1">Testing Assessment Request</h3>
                    <p class="font-body-sm text-body-sm text-on-surface-variant mb-space-lg">
                        Tell us what you need and we will confirm the scope, price, sample quantity and schedule before work starts. We aim to acknowledge requests within two business days. Do not include confidential technical details until confidentiality terms are agreed in writing.
                    </p>

                    @if (session('success'))
                        <div class="mb-space-md p-3 bg-emerald-50 border border-emerald-300 text-emerald-800 rounded font-label-technical text-label-technical flex items-center gap-2">
                            <span class="material-symbols-outlined text-[18px]">verified</span>
                            <span>{{ session('success') }}</span>
                        </div>
                    @endif

                    <form class="flex flex-col gap-space-md" method="POST" action="{{ route('contact.submit') }}">
                        @csrf

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-space-md">
                            <div class="flex flex-col gap-1">
                                <label class="font-label-technical text-label-technical uppercase text-secondary" for="fullName">Full Name *</label>
                                <input class="h-11 px-3 bg-surface-container-lowest border border-outline-variant rounded-lg text-body-md text-on-surface placeholder:text-outline focus:outline-none focus:border-primary focus:ring-2 focus:ring-on-tertiary-container/20 @error('fullName') border-error @enderror"
                                       id="fullName" name="fullName" placeholder="Eng. Patrick Mwangi" required type="text" value="{{ old('fullName') }}">
                                @error('fullName') <span class="text-error text-body-sm">{{ $message }}</span> @enderror
                            </div>
                            <div class="flex flex-col gap-1">
                                <label class="font-label-technical text-label-technical uppercase text-secondary" for="orgName">Manufacturer / Organization *</label>
                                <input class="h-11 px-3 bg-surface-container-lowest border border-outline-variant rounded-lg text-body-md text-on-surface placeholder:text-outline focus:outline-none focus:border-primary focus:ring-2 focus:ring-on-tertiary-container/20 @error('orgName') border-error @enderror"
                                       id="orgName" name="orgName" placeholder="Mombasa Cement Corp" required type="text" value="{{ old('orgName') }}">
                                @error('orgName') <span class="text-error text-body-sm">{{ $message }}</span> @enderror
                            </div>
                        </div>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-space-md">
                            <div class="flex flex-col gap-1">
                                <label class="font-label-technical text-label-technical uppercase text-secondary" for="email">Professional Email *</label>
                                <input class="h-11 px-3 bg-surface-container-lowest border border-outline-variant rounded-lg text-body-md text-on-surface placeholder:text-outline focus:outline-none focus:border-primary focus:ring-2 focus:ring-on-tertiary-container/20 @error('email') border-error @enderror"
                                       id="email" name="email" placeholder="p.mwangi@organization.com" required type="email" value="{{ old('email') }}">
                                @error('email') <span class="text-error text-body-sm">{{ $message }}</span> @enderror
                            </div>
                            <div class="flex flex-col gap-1">
                                <label class="font-label-technical text-label-technical uppercase text-secondary" for="serviceInterest">Service Interest *</label>
                                @php
                                    $serviceOptions = [
                                        'cement-packaging' => 'Cement Bag Packaging Compliance (EAS 351)',
                                        'raw-material' => 'Raw Material Testing (Kraft / Polypropylene)',
                                        'qa-audit' => 'QA Line Audit & Batch Metrology Certification',
                                        'consulting' => 'General Production Standards Consulting',
                                    ];
                                    $selectedService = old('serviceInterest', request('service'));
                                @endphp
                                <details class="service-picker group relative">
                                    <summary class="flex h-11 cursor-pointer list-none items-center justify-between rounded-lg border border-outline-variant bg-surface-container-lowest px-3 text-body-md text-on-surface focus:outline-none focus:border-primary [&::-webkit-details-marker]:hidden">
                                        <span data-selected-service-label>{{ $serviceOptions[$selectedService] ?? 'Select Specialized Capability' }}</span>
                                        <span class="material-symbols-outlined text-[18px] transition-transform group-open:rotate-180" aria-hidden="true">expand_more</span>
                                    </summary>
                                    <fieldset class="absolute left-0 top-full z-30 mt-1 w-full rounded border border-outline-variant bg-surface-container-lowest p-1 shadow-lg">
                                        <legend class="sr-only">Choose a service interest</legend>
                                        @foreach ($serviceOptions as $value => $label)
                                            <label class="flex cursor-pointer items-start gap-2 rounded px-2 py-2 text-body-sm text-on-surface hover:bg-surface-container-low">
                                                <input class="mt-1 accent-primary" type="radio" name="serviceInterest" value="{{ $value }}" @checked($selectedService === $value) @required($loop->first)>
                                                <span>{{ $label }}</span>
                                            </label>
                                        @endforeach
                                    </fieldset>
                                </details>
                                @error('serviceInterest') <span class="text-error text-body-sm">{{ $message }}</span> @enderror
                            </div>
                        </div>

                        <div class="flex flex-col gap-1">
                            <label class="font-label-technical text-label-technical uppercase text-secondary" for="batchDetails">Message / Batch Specifications</label>
                            <textarea class="p-3 bg-surface-container-lowest border border-outline-variant rounded-lg text-body-md text-on-surface placeholder:text-outline focus:outline-none focus:border-primary focus:ring-2 focus:ring-on-tertiary-container/20"
                                      id="batchDetails" name="batchDetails" placeholder="Detail tare weights, bag ply structure, monthly volume, or compliance verification requirements..." rows="4">{{ old('batchDetails') }}</textarea>
                        </div>

                        <p class="font-body-sm text-body-sm text-on-surface-variant">We use your details to respond to this request. Read our <a class="underline" href="{{ route('privacy') }}">privacy notice</a> and <a class="underline" href="{{ route('terms') }}">request terms</a>.</p>

                        <div class="pt-space-sm flex flex-col gap-space-sm">
                            <button class="h-[46px] inline-flex items-center justify-center gap-2 bg-on-tertiary-container hover:bg-tertiary-container text-on-primary font-headline-sm text-body-md font-semibold px-space-lg rounded transition-colors shadow-sm" type="submit">
                                <span class="material-symbols-outlined text-[18px]">send</span>
                                <span>Submit Technical Inquiry</span>
                            </button>
                            <div class="flex items-center gap-2 text-on-surface-variant font-label-technical text-[11px] mt-1">
                                <span class="material-symbols-outlined text-[15px] text-secondary">lock</span>
                                <span>Please do not include confidential technical details until confidentiality terms are agreed in writing.</span>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

        </div>
    </div>
</section>

@push('scripts')
<script>
    document.querySelectorAll('.service-picker').forEach((picker) => {
        const summary = picker.querySelector('summary');
        const selectedLabel = summary.querySelector('[data-selected-service-label]');

        picker.querySelectorAll('input[name="serviceInterest"]').forEach((option) => {
            option.addEventListener('change', () => {
                selectedLabel.textContent = option.closest('label').querySelector('span').textContent.trim();
                picker.open = false;
            });
        });
    });
</script>
@endpush

@endsection
