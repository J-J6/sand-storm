@extends('layouts.app')

@section('title', 'Sandstorm Industries Limited — Cement Bags, Mombasa')
@section('description', 'Reliable cement packaging, quality checks and responsive supply from Sandstorm Industries in Mikindani, Mombasa.')

@section('content')

<section class="relative isolate overflow-hidden bg-primary text-on-primary" id="hero">
    <img src="{{ asset('images/hero-facility.png') }}" alt="Industrial facility in Mikindani, Mombasa" class="absolute inset-0 -z-20 hidden h-full w-full object-cover object-center opacity-25 md:block" fetchpriority="high">
    <div class="absolute inset-0 -z-10 bg-gradient-to-r from-primary via-primary/95 to-primary/55"></div>
    <div class="absolute inset-0 -z-10 opacity-[0.08] bg-[radial-gradient(#ffffff_1px,transparent_1px)] [background-size:24px_24px]"></div>

    <div class="mx-auto grid max-w-[1440px] grid-cols-1 items-center gap-8 px-margin-mobile py-space-xl sm:py-16 md:px-margin lg:min-h-[620px] lg:grid-cols-12 lg:gap-12 lg:py-20">
        <div class="flex flex-col gap-6 lg:col-span-6">
            <span class="inline-flex w-fit items-center gap-2 rounded-full border border-white/20 bg-white/10 px-4 py-2 font-label-technical text-label-technical uppercase tracking-[0.18em] text-white/90"><span class="h-2 w-2 rounded-full bg-on-tertiary-container"></span> Mikindani · Mombasa, Kenya</span>
            <h1 class="max-w-2xl font-display-lg text-[34px] font-bold leading-[1.08] tracking-tight sm:text-headline-xl sm:leading-[1.06] sm:font-bold lg:text-[48px] lg:leading-[1.05] xl:text-display-lg xl:leading-[1.04]">Packaging strength you can build on.</h1>
            <p class="max-w-xl font-body-lg text-body-md leading-relaxed text-white/75 sm:text-body-lg sm:leading-relaxed">Durable cement bags, dependable quality checks and a local team ready to support your next order.</p>
            <div class="flex flex-wrap items-center gap-3 pt-1">
                <a href="{{ route('contact') }}" class="inline-flex items-center justify-center gap-2 rounded-lg bg-on-tertiary-container px-6 py-3.5 font-semibold text-on-primary shadow-lg transition hover:-translate-y-0.5 hover:bg-tertiary-container max-sm:w-full">Explore our services <span class="material-symbols-outlined text-[20px]" aria-hidden="true">arrow_forward</span></a>

            </div>
            <div class="mt-4 flex flex-wrap gap-x-7 gap-y-3 border-t border-white/15 pt-5 text-sm text-white/75">
                <span class="inline-flex items-center gap-2"><span class="material-symbols-outlined text-[18px] text-on-tertiary-container" aria-hidden="true">verified</span>Batch quality checks</span>
                <span class="inline-flex items-center gap-2"><span class="material-symbols-outlined text-[18px] text-on-tertiary-container" aria-hidden="true">location_on</span>Close to Mombasa port</span>
            </div>
        </div>
        <div class="relative lg:col-span-6">
            <div class="absolute -inset-2 rounded-3xl border border-white/10 sm:-inset-4"></div>
            <div class="relative overflow-hidden rounded-2xl border border-white/15 bg-white/10 shadow-2xl">
                <img src="https://bulkinside.com/wp-content/uploads/2023/10/Crafters_ADSTAR_sacks_300dpi-1024x682.jpg" alt="Finished cement sacks moving through an industrial packaging line" class="h-[240px] w-full object-cover sm:h-[390px] lg:h-[430px]" fetchpriority="high">
                <div class="absolute inset-x-0 bottom-0 bg-gradient-to-t from-black/90 via-black/40 to-transparent p-6 pt-20 sm:p-8 sm:pt-24 lg:pb-14">
                    <p class="font-label-technical text-xs uppercase tracking-[0.2em] text-white/70">Packaging built for the journey</p>
                    <p class="mt-2 max-w-md font-headline-sm text-xl font-semibold text-white sm:text-2xl">From production floor to your site.</p>
                </div>
            </div>
            <div class="relative z-10 ml-4 mt-3 flex w-fit items-center gap-3 rounded-xl bg-surface px-4 py-3 text-primary shadow-xl lg:absolute lg:-bottom-5 lg:left-8 lg:ml-0 lg:mt-0"><span class="material-symbols-outlined text-2xl text-on-tertiary-container" aria-hidden="true">precision_manufacturing</span><span><span class="block text-xs uppercase tracking-wider text-on-surface-variant">Focused on</span><span class="block font-semibold">Reliable packaging</span></span></div>
        </div>
    </div>
</section>

<section class="bg-surface">
    <div class="mx-auto grid max-w-[1440px] grid-cols-1 gap-4 px-margin-mobile py-space-xl md:grid-cols-3 md:gap-5 md:px-margin md:py-16">
        @foreach ([
            ['icon' => 'inventory_2', 'title' => 'Made for handling', 'text' => 'Packaging options designed to protect cement through storage, transport and everyday site use.'],
            ['icon' => 'science', 'title' => 'Quality checked', 'text' => 'A careful approach to material checks and batch consistency before dispatch.'],
            ['icon' => 'local_shipping', 'title' => 'Locally positioned', 'text' => 'Our Mikindani base puts us close to Mombasa’s logistics network and customers.'],
        ] as $item)
            <article class="flex gap-4 rounded-xl border border-outline-variant/30 bg-surface-container-lowest p-space-md shadow-sm sm:p-space-lg md:flex-col xl:flex-row">
                <span class="flex h-12 w-12 shrink-0 items-center justify-center rounded-lg bg-primary text-on-tertiary-container"><span class="material-symbols-outlined">{{ $item['icon'] }}</span></span>
                <div><h2 class="font-headline-sm text-headline-sm font-bold text-primary">{{ $item['title'] }}</h2><p class="mt-2 font-body-md text-body-md leading-relaxed text-on-surface-variant">{{ $item['text'] }}</p></div>
            </article>
        @endforeach
    </div>
</section>

<section class="bg-surface-container-low py-space-xl sm:py-20">
    <div class="mx-auto max-w-[1440px] px-margin-mobile md:px-margin">
        <div class="mb-6 flex flex-col gap-4 md:mb-8 md:flex-row md:items-end md:justify-between">
            <div class="max-w-2xl"><span class="font-label-technical text-label-technical uppercase tracking-[0.18em] text-on-tertiary-container">Packaging &amp; production</span><h2 class="mt-3 font-display-lg text-3xl font-bold tracking-tight text-primary sm:text-4xl">The details matter.</h2><p class="mt-3 max-w-xl leading-relaxed text-on-surface-variant">Explore the packaging and industrial processes behind a product that has to perform from the factory to the job site.</p></div>
            <a href="{{ route('services') }}" class="inline-flex w-fit shrink-0 items-center gap-2 whitespace-nowrap font-semibold text-primary hover:text-on-tertiary-container">View our services <span class="material-symbols-outlined text-lg" aria-hidden="true">arrow_forward</span></a>
        </div>
        <div class="grid grid-cols-1 gap-5 md:grid-cols-5">
            <article class="group relative min-h-[300px] overflow-hidden rounded-2xl bg-primary md:col-span-3 lg:min-h-[380px]">
                <img src="https://bulkinside.com/wp-content/uploads/2023/10/Crafters_ADSTAR_sacks_300dpi-1024x682.jpg" alt="Cement bags on a packaging conveyor" loading="lazy" class="absolute inset-0 h-full w-full object-cover transition duration-500 group-hover:scale-[1.03]">
                <div class="absolute inset-0 bg-gradient-to-t from-primary/90 via-primary/10 to-transparent"></div>
                <div class="absolute inset-x-0 bottom-0 p-6 sm:p-8"><span class="font-label-technical text-xs uppercase tracking-[0.18em] text-white/70">Cement packaging</span><h3 class="mt-2 font-headline-lg text-2xl font-bold text-white sm:text-3xl">Built to protect every bag.</h3><p class="mt-2 max-w-lg text-sm leading-relaxed text-white/75">Strong formats and careful handling help keep product secure through the supply chain.</p></div>
            </article>
            <article class="group relative min-h-[300px] overflow-hidden rounded-2xl bg-primary md:col-span-2 lg:min-h-[380px]">
                <img src="https://image.made-in-china.com/2f0j00cFrVkWIDYpot/1-5-Ton-Bulk-Big-Bag-for-Cement.webp" alt="Industrial stitching equipment used in heavy-duty bag production" loading="lazy" class="absolute inset-0 h-full w-full object-cover transition duration-500 group-hover:scale-[1.03]">
                <div class="absolute inset-0 bg-gradient-to-t from-primary/90 via-primary/10 to-transparent"></div>
                <div class="absolute inset-x-0 bottom-0 p-6"><span class="font-label-technical text-xs uppercase tracking-[0.18em] text-white/70">Industrial capability</span><h3 class="mt-2 font-headline-lg text-2xl font-bold text-white">Precision in every step.</h3><p class="mt-2 text-sm leading-relaxed text-white/75">Purposeful processes support dependable, consistent packaging.</p></div>
            </article>
        </div>
    </div>
</section>

<section class="bg-surface py-space-xl sm:py-20">
    <div class="mx-auto grid max-w-[1440px] items-center gap-9 px-margin-mobile md:px-margin lg:grid-cols-12 lg:gap-14">
        <div class="lg:col-span-5"><span class="font-label-technical text-label-technical uppercase tracking-[0.18em] text-on-tertiary-container">Rooted in Mombasa</span><h2 class="mt-3 font-display-lg text-3xl font-bold tracking-tight text-primary sm:text-4xl">A local partner for your packaging needs.</h2><p class="mt-4 leading-relaxed text-on-surface-variant">Based in Mikindani, Sandstorm Industries serves cement producers and businesses looking for a responsive packaging partner on the Kenyan coast.</p><a href="{{ route('about') }}" class="mt-6 inline-flex items-center gap-2 font-semibold text-primary hover:text-on-tertiary-container">Get to know Sandstorm <span class="material-symbols-outlined text-lg" aria-hidden="true">arrow_forward</span></a></div>
        <div class="relative lg:col-span-7"><div class="absolute -bottom-3 -left-3 h-24 w-24 rounded-bl-2xl border-b-4 border-l-4 border-on-tertiary-container"></div><img src="{{ asset('images/hero-facility.png') }}" alt="Sandstorm Industries facility in Mikindani" loading="lazy" class="relative h-[260px] w-full rounded-2xl object-cover shadow-xl sm:h-[380px] lg:h-[420px]"><div class="absolute bottom-4 right-4 rounded-lg bg-surface px-4 py-3 shadow-lg"><span class="block font-label-technical text-xs uppercase tracking-wider text-on-surface-variant">Coast operations base</span><span class="font-semibold text-primary">Mikindani, Mombasa</span></div></div>
    </div>
</section>

<section class="bg-primary-container text-on-primary">
    <div class="mx-auto flex max-w-[1440px] flex-col gap-6 px-margin-mobile py-space-xl md:flex-row md:items-center md:justify-between md:px-margin md:py-14">
        <div><span class="font-label-technical text-xs uppercase tracking-[0.18em] text-white/65">Let's get started</span><h2 class="mt-2 font-headline-lg text-2xl font-bold sm:text-3xl">Planning your next order?</h2><p class="mt-2 text-white/70">Talk to our team about cement packaging and supply.</p></div>
        <a href="{{ route('contact') }}" class="inline-flex w-fit items-center justify-center gap-2 shrink-0 whitespace-nowrap rounded-lg bg-on-tertiary-container px-6 py-3.5 font-semibold text-on-primary shadow-lg transition hover:-translate-y-0.5 hover:bg-tertiary-container max-sm:w-full">Request a quote <span class="material-symbols-outlined text-[20px]" aria-hidden="true">arrow_forward</span></a>
    </div>
</section>

@endsection
