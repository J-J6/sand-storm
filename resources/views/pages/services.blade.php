@extends('layouts.app')

@section('title', 'Industrial Packaging & Testing Services — Sandstorm Industries')

@section('content')

<section class="w-full py-space-xl bg-surface">
    <div class="max-w-[1440px] mx-auto px-margin-mobile md:px-margin">
        @include('partials.page-heading', [
            'eyebrow' => 'Packaging and testing services',
            'icon' => 'build_circle',
            'title' => 'Choose a service and tell us what you need',
            'description' => 'We supply and assess industrial packaging for cement and other dry goods producers. Share the bag type, fill weight, quantity, destination and target date; we will confirm availability and send a written quote.',
        ])
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-space-md">
            <article class="p-space-md bg-surface-container-low rounded-lg border border-outline-variant/30"><h3 class="font-headline-sm text-primary">Packaging types</h3><p class="font-body-sm text-on-surface-variant mt-space-xs">Multi-wall kraft paper and polypropylene packaging are listed capabilities. Tell us whether you need valve or open-mouth bags and your fill weight; construction and dimensions are confirmed per order.</p></article>
            <article class="p-space-md bg-surface-container-low rounded-lg border border-outline-variant/30"><h3 class="font-headline-sm text-primary">Checks and specifications</h3><p class="font-body-sm text-on-surface-variant mt-space-xs">Requests can cover material strength, moisture resistance, burst performance, drop handling and packaging compliance. We agree the applicable method and acceptance criteria with you before testing.</p></article>
            <article class="p-space-md bg-surface-container-low rounded-lg border border-outline-variant/30"><h3 class="font-headline-sm text-primary">Order size and capacity</h3><p class="font-body-sm text-on-surface-variant mt-space-xs">Minimum quantities and available capacity depend on the product and schedule. There is no fixed MOQ published here; ask for a quote with your expected monthly volume or sample count.</p></article>
            <article class="p-space-md bg-surface-container-low rounded-lg border border-outline-variant/30"><h3 class="font-headline-sm text-primary">Timing and delivery</h3><p class="font-body-sm text-on-surface-variant mt-space-xs">Lead times and delivery coverage are confirmed for each request. Mombasa is our stated operating base; include your delivery town for a service and freight check.</p></article>
        </div>
        <div class="mt-space-lg p-space-lg bg-primary text-on-primary rounded-lg">
            <h3 class="font-headline-sm text-on-primary font-bold">For a useful sample quote</h3>
            <p class="font-body-md text-surface-dim mt-space-xs">Include the product, bag construction or a photo, fill weight, quantity, required checks, delivery location and target date. We will reply with scope, price, sample instructions and a proposed schedule. We aim to acknowledge within two business days.</p>
            <a class="inline-flex mt-space-md px-space-md py-space-sm bg-on-tertiary-container text-on-primary rounded" href="{{ route('contact') }}">Request a quote</a>
        </div>
    </div>
</section>

{{-- Services Section --}}
<section class="w-full py-space-xl bg-surface-container-low" id="services">
    <div class="max-w-[1440px] mx-auto px-margin-mobile md:px-margin">
        <div class="flex flex-col gap-space-xs mb-space-xl text-center items-center max-w-3xl mx-auto">
            <div class="inline-flex items-center gap-2 px-space-sm py-1 bg-surface-container-high text-on-tertiary-container rounded">
                <span class="material-symbols-outlined text-[16px]">build_circle</span>
                <span class="font-label-technical text-label-technical uppercase tracking-widest">OUR CORE CAPABILITIES</span>
            </div>
            <h2 class="font-headline-xl text-headline-xl text-primary font-bold">
                Specialized Testing, Packaging &amp; Compliance Solutions
            </h2>
            <p class="font-body-lg text-body-lg text-on-surface-variant">
                Precision-engineered services designed for heavy industrial producers, cement manufacturers, and bulk dry-goods suppliers.
            </p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-space-lg">

            @php
                $services = [
                    [
                        'spec' => 'LAB-01', 'title' => 'Raw Material Testing',
                        'desc' => 'Comprehensive tensile strength analysis, moisture resistance verification, and Mullen burst factor testing for industrial kraft papers and polymer liners.',
                        'standard' => 'ASTM D828 / D774', 'status' => 'VERIFIED',
                        'icon' => 'M4 19.5v-15A2.5 2.5 0 0 1 6.5 2H20v20H6.5a2.5 2.5 0 0 1-2.5-2.5Z|M6 6h10|M6 10h10|M6 14h6',
                        'circle' => true,
                    ],
                    [
                        'spec' => 'PKG-02', 'title' => 'Cement Bag Packaging Compliance',
                        'desc' => 'Complete compliance verification under Kenyan Bureau of Standards (KEBS) and EAS 351. Drop-impact endurance, de-aeration rate, and barrier protection against coastal humidity.',
                        'standard' => 'KEBS KS EAS 351', 'status' => 'CERTIFIED',
                    ],
                    [
                        'spec' => 'AUD-03', 'title' => 'Quality Assurance &amp; Batch Auditing',
                        'desc' => 'End-to-end QA inspection protocols, statistical process control (SPC), on-site line audits, and officially certified batch conformity documentation for industrial clients.',
                        'standard' => 'SPC MATRIX 4.0', 'status' => 'AUDITED',
                    ],
                    [
                        'spec' => 'CON-04', 'title' => 'Production Standards Consulting',
                        'desc' => 'Technical advisory on line automation, bag filling optimization, dust mitigation, and transition to eco-engineered composite packaging without sacrificing tensile strength.',
                        'standard' => 'ADVISORY UNIT', 'status' => 'ACTIVE',
                    ],
                ];
            @endphp

            {{-- Card 1: Raw Material Testing --}}
            <div class="p-space-lg bg-surface-container-lowest rounded-lg border border-outline-variant/40 shadow-sm flex h-full min-h-[340px] flex-col justify-between transition-all duration-200 hover:-translate-y-0.5 hover:shadow-md">
                <div>
                    <div class="w-14 h-14 rounded bg-surface-container flex items-center justify-center text-primary mb-space-md">
                        <svg class="w-8 h-8 text-on-tertiary-container" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.75" viewBox="0 0 24 24">
                            <path d="M4 19.5v-15A2.5 2.5 0 0 1 6.5 2H20v20H6.5a2.5 2.5 0 0 1-2.5-2.5Z"></path>
                            <path d="M6 6h10"></path><path d="M6 10h10"></path><path d="M6 14h6"></path>
                            <circle cx="16" cy="15" r="3"></circle><path d="m18.5 17.5 2 2"></path>
                        </svg>
                    </div>
                    <div class="font-label-technical text-label-technical text-secondary mb-1">SERVICE SPEC: LAB-01</div>
                    <h3 class="font-headline-sm text-headline-sm text-primary font-bold mb-space-sm">Raw Material Testing</h3>
                    <p class="font-body-sm text-body-sm text-on-surface-variant leading-relaxed">
                        Comprehensive tensile strength analysis, moisture resistance verification, and Mullen burst factor testing for industrial kraft papers and polymer liners.
                    </p>
                </div>
                <div class="pt-space-md mt-space-md border-t border-surface-container flex items-center justify-between font-label-technical text-label-technical text-secondary">
                    <span>ASTM D828 / D774</span><span class="text-on-tertiary-container font-bold">VERIFIED</span>
                </div>
                <a class="inline-flex mt-space-md text-primary underline underline-offset-4 hover:text-on-tertiary-container" href="{{ route('contact', ['service' => 'raw-material']) }}">Ask about material testing</a>
            </div>

            {{-- Card 2: Cement Bag Packaging Compliance --}}
            <div class="p-space-lg bg-surface-container-lowest rounded-lg border border-outline-variant/40 shadow-sm flex h-full min-h-[340px] flex-col justify-between transition-all duration-200 hover:-translate-y-0.5 hover:shadow-md">
                <div>
                    <div class="w-14 h-14 rounded bg-surface-container flex items-center justify-center text-primary mb-space-md">
                        <svg class="w-8 h-8 text-primary" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.75" viewBox="0 0 24 24">
                            <rect height="17" rx="2" width="14" x="5" y="4"></rect>
                            <path d="M9 9h6"></path><path d="M9 13h6"></path><path d="M12 4v-2"></path>
                            <path d="m8 2 8 0"></path><path d="M12 17v4m0 0-2-2m2 2 2-2"></path>
                        </svg>
                    </div>
                    <div class="font-label-technical text-label-technical text-secondary mb-1">SERVICE SPEC: PKG-02</div>
                    <h3 class="font-headline-sm text-headline-sm text-primary font-bold mb-space-sm">Cement Bag Packaging Compliance</h3>
                    <p class="font-body-sm text-body-sm text-on-surface-variant leading-relaxed">
                        Complete compliance verification under Kenyan Bureau of Standards (KEBS) and EAS 351. Drop-impact endurance, de-aeration rate, and barrier protection against coastal humidity.
                    </p>
                </div>
                <div class="pt-space-md mt-space-md border-t border-surface-container flex items-center justify-between font-label-technical text-label-technical text-secondary">
                    <span>KEBS KS EAS 351</span><span class="text-on-tertiary-container font-bold">CERTIFIED</span>
                </div>
                <a class="inline-flex mt-space-md text-primary underline underline-offset-4 hover:text-on-tertiary-container" href="{{ route('contact', ['service' => 'cement-packaging']) }}">Ask about bag packaging</a>
            </div>

            {{-- Card 3: Quality Assurance & Batch Auditing --}}
            <div class="p-space-lg bg-surface-container-lowest rounded-lg border border-outline-variant/40 shadow-sm flex h-full min-h-[340px] flex-col justify-between transition-all duration-200 hover:-translate-y-0.5 hover:shadow-md">
                <div>
                    <div class="w-14 h-14 rounded bg-surface-container flex items-center justify-center text-primary mb-space-md">
                        <svg class="w-8 h-8 text-on-tertiary-container" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.75" viewBox="0 0 24 24">
                            <path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"></path>
                            <path d="m9 12 2 2 4-4"></path>
                        </svg>
                    </div>
                    <div class="font-label-technical text-label-technical text-secondary mb-1">SERVICE SPEC: AUD-03</div>
                    <h3 class="font-headline-sm text-headline-sm text-primary font-bold mb-space-sm">Quality Assurance &amp; Batch Auditing</h3>
                    <p class="font-body-sm text-body-sm text-on-surface-variant leading-relaxed">
                        End-to-end QA inspection protocols, statistical process control (SPC), on-site line audits, and officially certified batch conformity documentation for industrial clients.
                    </p>
                </div>
                <div class="pt-space-md mt-space-md border-t border-surface-container flex items-center justify-between font-label-technical text-label-technical text-secondary">
                    <span>SPC MATRIX 4.0</span><span class="text-on-tertiary-container font-bold">AUDITED</span>
                </div>
                <a class="inline-flex mt-space-md text-primary underline underline-offset-4 hover:text-on-tertiary-container" href="{{ route('contact', ['service' => 'qa-audit']) }}">Ask about a QA audit</a>
            </div>

            {{-- Card 4: Production Standards Consulting --}}
            <div class="p-space-lg bg-surface-container-lowest rounded-lg border border-outline-variant/40 shadow-sm flex h-full min-h-[340px] flex-col justify-between transition-all duration-200 hover:-translate-y-0.5 hover:shadow-md">
                <div>
                    <div class="w-14 h-14 rounded bg-surface-container flex items-center justify-center text-primary mb-space-md">
                        <svg class="w-8 h-8 text-primary" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.75" viewBox="0 0 24 24">
                            <circle cx="12" cy="12" r="10"></circle>
                            <polygon points="16.24 7.76 14.12 14.12 7.76 16.24 9.88 9.88 16.24 7.76"></polygon>
                        </svg>
                    </div>
                    <div class="font-label-technical text-label-technical text-secondary mb-1">SERVICE SPEC: CON-04</div>
                    <h3 class="font-headline-sm text-headline-sm text-primary font-bold mb-space-sm">Production Standards Consulting</h3>
                    <p class="font-body-sm text-body-sm text-on-surface-variant leading-relaxed">
                        Technical advisory on line automation, bag filling optimization, dust mitigation, and transition to eco-engineered composite packaging without sacrificing tensile strength.
                    </p>
                </div>
                <div class="pt-space-md mt-space-md border-t border-surface-container flex items-center justify-between font-label-technical text-label-technical text-secondary">
                    <span>ADVISORY UNIT</span><span class="text-on-tertiary-container font-bold">ACTIVE</span>
                </div>
                <a class="inline-flex mt-space-md text-primary underline underline-offset-4 hover:text-on-tertiary-container" href="{{ route('contact', ['service' => 'consulting']) }}">Ask about consulting</a>
            </div>

        </div>
    </div>
</section>

@endsection
