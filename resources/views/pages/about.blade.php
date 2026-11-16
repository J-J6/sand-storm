@extends('layouts.app')

@section('title', 'About Sandstorm Industries — Mombasa')

@section('content')

{{-- About Us Section --}}
<section class="w-full py-space-xl md:py-16 bg-surface" id="about">
    <div class="max-w-[1440px] mx-auto px-margin-mobile md:px-margin">
        @include('partials.page-heading', [
            'eyebrow' => 'About Sandstorm Industries',
            'icon' => 'domain',
            'title' => 'Packaging that helps protect goods in transit',
            'description' => 'Sandstorm Industries makes and assesses industrial packaging for manufacturers in Mombasa and the wider region. Our work is focused on dependable bags and clear quality checks for cement and other dry goods.',
        ])

        <div class="grid grid-cols-1 lg:grid-cols-12 gap-space-lg lg:gap-space-xl items-start">
            <div class="lg:col-span-7 flex flex-col gap-space-lg">
                <div class="p-space-lg bg-surface-container-lowest rounded-lg border border-outline-variant/40 shadow-sm">
                    <h3 class="font-headline-sm text-headline-sm text-primary mb-space-sm flex items-start gap-2">
                        <span class="material-symbols-outlined mt-0.5 shrink-0 text-on-tertiary-container">local_shipping</span>
                        The Mikindani Maritime Logistics Advantage
                    </h3>
                    <p class="font-body-md text-body-md text-on-surface-variant leading-relaxed">
                        Operating within kilometers of the Port of Mombasa, the Northern Corridor rail network, and key highway junctions gives our testing lab and production floor unparalleled logistical velocity. Raw materials imported through the Kilindini Harbour are inspected and processed with zero transit latency, allowing manufacturers across East and Central Africa to receive verified packaging that meets stringent East African Standards (EAS).
                    </p>
                </div>

                <div class="grid grid-cols-1 sm:grid-cols-3 gap-space-md">
                    <div class="p-space-md bg-surface-container-low rounded-lg border border-outline-variant/30 flex flex-col gap-space-xs">
                        <div class="w-8 h-8 rounded bg-surface-container-high flex items-center justify-center text-primary mb-1">
                            <span class="material-symbols-outlined text-[20px]">science</span>
                        </div>
                        <h4 class="font-headline-sm text-body-md text-primary font-bold">Rigorous Material Sourcing</h4>
                        <p class="font-body-sm text-body-sm text-on-surface-variant">
                            Screening 100% of imported virgin unbleached kraft papers and specialized polymers against porosity standards.
                        </p>
                    </div>
                    <div class="p-space-md bg-surface-container-low rounded-lg border border-outline-variant/30 flex flex-col gap-space-xs">
                        <div class="w-8 h-8 rounded bg-surface-container-high flex items-center justify-center text-on-tertiary-container mb-1">
                            <span class="material-symbols-outlined text-[20px]">compress</span>
                        </div>
                        <h4 class="font-headline-sm text-body-md text-primary font-bold">Zero-Tolerance Burst Calibration</h4>
                        <p class="font-body-sm text-body-sm text-on-surface-variant">
                            Every batch undergoes multi-axis pressure resistance validation to eliminate rupture risks during high-speed packing.
                        </p>
                    </div>
                    <div class="p-space-md bg-surface-container-low rounded-lg border border-outline-variant/30 flex flex-col gap-space-xs">
                        <div class="w-8 h-8 rounded bg-surface-container-high flex items-center justify-center text-secondary mb-1">
                            <span class="material-symbols-outlined text-[20px]">forklift</span>
                        </div>
                        <h4 class="font-headline-sm text-body-md text-primary font-bold">Local Sovereignty &amp; Distribution</h4>
                        <p class="font-body-sm text-body-sm text-on-surface-variant">
                            Empowering Kenya's heavy industrial sovereignty with rapid domestic replenishment and regional export certifications.
                        </p>
                    </div>
                </div>
            </div>

            <div class="lg:col-span-5 grid grid-cols-1 gap-space-md md:grid-cols-3 lg:grid-cols-1">
                <div class="p-space-lg bg-primary text-on-primary rounded-lg shadow-sm relative overflow-hidden">
                    <div class="flex flex-wrap items-center justify-between gap-x-space-sm gap-y-1">
                        <span class="font-label-technical text-label-technical text-surface-variant uppercase tracking-widest">METROLOGICAL METRIC 01</span>
                        <span class="font-label-technical text-label-technical text-on-tertiary-container bg-tertiary-container/30 px-2 py-0.5 rounded">PASSED</span>
                    </div>
                    <div class="mt-space-sm flex flex-wrap items-baseline gap-x-space-sm gap-y-0">
                        <span class="font-metric-display text-[40px] md:text-[34px] lg:text-[44px] leading-tight text-on-primary font-bold">99.8%</span>
                        <span class="font-label-technical text-label-technical text-on-tertiary-container uppercase tracking-wider">Yield</span>
                    </div>
                    <p class="font-body-md text-body-md text-surface-dim mt-space-xs">
                        Batch Compliance Yield across dynamic tensile, Mullen burst factor, and humidity cycling assessments.
                    </p>
                </div>

                <div class="p-space-lg bg-surface-container-lowest rounded-lg border border-outline-variant/40 shadow-sm">
                    <div class="flex flex-wrap items-center justify-between gap-x-space-sm gap-y-1">
                        <span class="font-label-technical text-label-technical text-secondary uppercase tracking-widest">LOAD CAPACITY SPEC</span>
                        <span class="material-symbols-outlined text-primary text-[20px]">fitness_center</span>
                    </div>
                    <div class="mt-space-sm flex flex-wrap items-baseline gap-x-space-sm gap-y-0">
                        <span class="font-metric-display text-[40px] md:text-[34px] lg:text-[44px] leading-tight text-primary font-bold">50 kg</span>
                        <span class="font-label-technical text-label-technical text-secondary uppercase tracking-wider">Drop Tolerant</span>
                    </div>
                    <p class="font-body-md text-body-md text-on-surface-variant mt-space-xs">
                        Multi-wall valve sack design engineered for zero drop failure at standard warehouse drop heights up to 1.8 meters.
                    </p>
                </div>

                <div class="p-space-lg bg-surface-container-low rounded-lg border border-outline-variant/30 shadow-sm">
                    <div class="flex flex-wrap items-center justify-between gap-x-space-sm gap-y-1">
                        <span class="font-label-technical text-label-technical text-secondary uppercase tracking-widest">LABORATORY CYCLE</span>
                        <span class="material-symbols-outlined text-on-tertiary-container text-[20px]">alarm_on</span>
                    </div>
                    <div class="mt-space-sm flex flex-wrap items-baseline gap-x-space-sm gap-y-0">
                        <span class="font-metric-display text-[40px] md:text-[34px] lg:text-[44px] leading-tight text-primary font-bold">24/7</span>
                        <span class="font-label-technical text-label-technical text-secondary uppercase tracking-wider">Continuous</span>
                    </div>
                    <p class="font-body-md text-body-md text-on-surface-variant mt-space-xs">
                        Round-the-clock shift inspection and rapid batch certification responding to high-volume coastal cement clinker production.
                    </p>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection
