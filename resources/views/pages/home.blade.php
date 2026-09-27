@extends('layouts.app')

@section('title', 'Sandstorm Industries Limited — Industrial Manufacturing & Packaging Compliance, Mombasa')

@section('content')

{{-- Hero Section --}}
<section class="relative w-full bg-primary text-on-primary overflow-hidden" id="hero">
    <div class="absolute inset-0 opacity-10 pointer-events-none bg-[radial-gradient(#ffffff_1px,transparent_1px)] [background-size:24px_24px]"></div>

    <div class="max-w-[1440px] mx-auto px-margin-mobile md:px-margin pt-space-xl pb-space-lg relative z-10">

        <div class="flex flex-wrap items-center justify-between gap-space-sm pb-space-md mb-space-lg text-on-primary-container">
            <div class="flex items-center gap-space-sm font-label-technical text-label-technical">
                <span class="inline-flex items-center gap-1.5 px-2.5 py-1 bg-primary-container text-surface-bright border border-surface-bright/10 rounded-sm">
                    <span class="w-2 h-2 rounded-full bg-on-tertiary-container animate-pulse"></span>
                    FACILITY ACTIVE: MSA-PLANT-01
                </span>
                <span class="hidden sm:inline text-outline">|</span>
                <span class="text-surface-variant font-label-technical">4°01'S, 39°37'E &bull; MIKINDANI, MOMBASA</span>
            </div>
            <div class="flex items-center gap-space-xs font-label-technical text-label-technical">
                <span class="px-2 py-0.5 bg-surface-container-high/10 text-surface-bright rounded">KEBS CD/432 READY</span>
                <span class="px-2 py-0.5 bg-surface-container-high/10 text-surface-bright rounded">ISO 9001:2015</span>
            </div>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-12 gap-space-xl items-center">
            <div class="lg:col-span-6 flex flex-col gap-space-md">
                <div class="inline-flex items-center gap-2 self-start px-space-sm py-1 bg-surface-container-highest/10 text-on-tertiary-container rounded">
                    <span class="material-symbols-outlined text-[16px]">precision_manufacturing</span>
                    <span class="font-label-technical text-label-technical uppercase tracking-widest">Industrial bags and quality support</span>
                </div>
                <h1 class="font-display-lg text-headline-xl-mobile sm:text-headline-xl lg:text-display-lg text-on-primary leading-tight font-bold tracking-tight">
                    Strong packaging for cement and dry goods
                </h1>
                <p class="font-body-lg text-body-lg text-surface-dim max-w-xl">
                    Sandstorm supplies heavy-duty bags and packaging checks for manufacturers. Based in Mombasa, we help protect products through filling, storage and delivery.
                </p>

                <div class="flex flex-wrap items-center gap-space-md pt-space-sm">
                    <a href="{{ route('contact') }}" class="inline-flex items-center justify-center gap-2 bg-on-tertiary-container hover:bg-tertiary-container text-on-primary font-headline-sm text-headline-sm px-space-xl py-3 rounded-lg transition-all duration-200 shadow-lg hover:-translate-y-0.5 shadow-on-tertiary-container/20">
                        <span>Get in Touch</span>
                        <span class="material-symbols-outlined text-[20px]">arrow_forward</span>
                    </a>
                    <a href="{{ route('standards') }}" class="inline-flex items-center justify-center gap-2 bg-primary-container hover:bg-surface-container-highest/20 text-surface-bright font-headline-sm text-headline-sm px-space-lg py-3 rounded-lg transition-all duration-200 hover:-translate-y-0.5">
                        <span>Explore Quality Standards</span>
                    </a>
                </div>

                <div class="pt-space-md flex items-center gap-space-lg">
                    <div class="flex flex-col">
                        <span class="font-metric-display text-headline-sm text-on-primary font-bold">50 KG</span>
                        <span class="font-label-technical text-label-technical text-outline">CALIBRATED RATING</span>
                    </div>
                    <div class="h-8 w-px bg-surface-container-highest/20"></div>
                    <div class="flex flex-col">
                        <span class="font-metric-display text-headline-sm text-on-tertiary-container font-bold">&plusmn;0.02%</span>
                        <span class="font-label-technical text-label-technical text-outline">BURST RESISTANCE TOLERANCE</span>
                    </div>
                    <div class="h-8 w-px bg-surface-container-highest/20"></div>
                    <div class="flex flex-col">
                        <span class="font-metric-display text-headline-sm text-on-primary font-bold">PORT MSA</span>
                        <span class="font-label-technical text-label-technical text-outline">12KM CORRIDOR LINK</span>
                    </div>
                </div>
            </div>

            <div class="lg:col-span-6 relative">
                <div class="relative bg-primary-container rounded-lg overflow-hidden shadow-2xl">
                    <div class="absolute top-3 left-4 z-20 flex items-center gap-2 pointer-events-none">
                        <span class="bg-primary/90 text-surface-bright font-label-technical text-label-technical px-2 py-0.5 rounded uppercase tracking-wider backdrop-blur-sm">
                            SPECIMEN FEED: LINE A-04
                        </span>
                    </div>
                    <div class="absolute bottom-3 right-4 z-20 pointer-events-none">
                        <span class="bg-primary/90 text-on-tertiary-container font-label-technical text-label-technical px-2 py-0.5 rounded uppercase tracking-wider backdrop-blur-sm">
                            DYNAMIC STRESS VERIFIED
                        </span>
                    </div>
                    <div class="absolute inset-0 pointer-events-none z-10 flex items-center justify-center">
                        <div class="w-12 h-12 relative opacity-30">
                            <div class="absolute top-1/2 left-0 right-0 h-px bg-surface-bright"></div>
                            <div class="absolute left-1/2 top-0 bottom-0 w-px bg-surface-bright"></div>
                        </div>
                    </div>

                    <img src="{{ asset('images/hero-facility.png') }}" alt="Cement packaging and quality testing automated facility at Mikindani" class="w-full h-[320px] sm:h-[400px] md:h-[500px] object-cover filter contrast-[1.08] brightness-[0.92]">

                    <div class="p-space-md bg-primary-container flex items-center justify-between text-on-primary">
                        <div class="flex items-center gap-space-sm font-label-technical text-label-technical">
                            <span class="text-on-tertiary-container font-bold">AUTOMATION:</span>
                            <span class="text-surface-dim">Robotic Conveyance &amp; De-aeration Check</span>
                        </div>
                        <div class="flex items-center gap-2">
                            <span class="w-1.5 h-1.5 rounded-full bg-emerald-400"></span>
                            <span class="font-label-technical text-label-technical text-surface-variant">ONLINE 100%</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="mt-space-xl p-space-lg bg-surface-container-low rounded-lg border border-outline-variant/30">
            <h2 class="font-headline-sm text-headline-sm text-primary font-bold">Packaging that protects goods on the way to customers</h2>
            <p class="font-body-md text-body-md text-on-surface-variant mt-space-xs">Sandstorm makes heavy-duty bags and helps manufacturers check that packaging is fit for filling, storage and transport. We serve producers of cement and other dry goods, with packaging and quality support from Mombasa. The goal is simple: fewer damaged bags, less product loss and clearer quality checks.</p>
            <a class="inline-flex mt-space-sm underline text-primary" href="{{ route('services') }}">See services and request a quote</a>
        </div>

        <div class="mt-space-xl pt-space-lg bg-primary-container/60 rounded-lg p-space-md grid grid-cols-1 md:grid-cols-3 gap-space-md">
            <div class="flex items-center gap-space-md">
                <div class="w-10 h-10 rounded bg-on-tertiary-container/10 flex items-center justify-center shrink-0">
                    <span class="material-symbols-outlined text-on-tertiary-container">layers</span>
                </div>
                <div class="flex flex-col">
                    <span class="font-headline-sm text-body-md text-surface-bright font-bold">3-Ply Kraft &amp; Polypropylene</span>
                    <span class="font-label-technical text-label-technical text-outline">Stress &amp; Moisture-Penetration Tested</span>
                </div>
            </div>
            <div class="flex items-center gap-space-md">
                <div class="w-10 h-10 rounded bg-secondary-fixed/10 flex items-center justify-center shrink-0">
                    <span class="material-symbols-outlined text-secondary-fixed">verified_user</span>
                </div>
                <div class="flex flex-col">
                    <span class="font-headline-sm text-body-md text-surface-bright font-bold">100% KEBS &amp; ASTM Alignment</span>
                    <span class="font-label-technical text-label-technical text-outline">Continuous Metrological Audits</span>
                </div>
            </div>
            <div class="flex items-center gap-space-md">
                <div class="w-10 h-10 rounded bg-surface-container-high/10 flex items-center justify-center shrink-0">
                    <span class="material-symbols-outlined text-surface-bright">hub</span>
                </div>
                <div class="flex flex-col">
                    <span class="font-headline-sm text-body-md text-surface-bright font-bold">Mikindani Industrial Hub</span>
                    <span class="font-label-technical text-label-technical text-outline">Unbroken Mombasa Port Proximity</span>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection
