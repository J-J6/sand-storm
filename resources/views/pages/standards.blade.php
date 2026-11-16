@extends('layouts.app')

@section('title', 'Quality Standards & Metrology — Sandstorm Industries')

@section('content')

{{-- Why Choose Us / Quality Standards Section --}}
<section class="w-full py-space-xl md:py-16 bg-surface" id="standards">
    <div class="max-w-[1440px] mx-auto px-margin-mobile md:px-margin">
        @include('partials.page-heading', [
            'eyebrow' => 'Quality and standards',
            'icon' => 'verified',
            'title' => 'Clear checks for industrial packaging',
            'description' => 'We agree the applicable packaging requirements, test method and acceptance criteria with each customer before work starts.',
        ])

        <div class="grid grid-cols-1 lg:grid-cols-3 gap-space-md md:gap-space-lg">

            <div class="p-space-lg bg-surface-container-lowest rounded-lg border border-outline-variant/40 shadow-sm flex flex-col gap-space-md md:grid md:grid-cols-[auto_1fr] md:gap-x-space-lg lg:flex">
                <div class="w-16 h-16 rounded bg-surface-container-low flex items-center justify-center text-primary">
                    <svg class="w-9 h-9 text-on-tertiary-container" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.75" viewBox="0 0 24 24">
                        <path d="M12 3v18"></path><path d="m19 8 3 3-3 3"></path><path d="m5 8-3 3 3 3"></path>
                        <rect height="8" rx="2" width="12" x="6" y="7"></rect><path d="M9 11h6"></path>
                    </svg>
                </div>
                <div class="flex flex-col gap-space-xs">
                    <span class="font-label-technical text-label-technical text-secondary uppercase tracking-widest">PILLAR 01 &bull; REGULATORY</span>
                    <h3 class="font-headline-sm text-headline-sm text-primary font-bold">Compliance-Driven Operations</h3>
                    <p class="font-body-md text-body-md text-on-surface-variant leading-relaxed">
                        Strict adherence to national and international packaging regulations, ensuring zero shipment rejections, certified tare weights, and full KEBS compliance traceability for heavy building materials across East Africa.
                    </p>
                </div>
                <div class="mt-auto pt-space-sm md:col-start-2 md:pt-0 lg:pt-space-sm">
                    <ul class="flex flex-col gap-1.5 font-label-technical text-label-technical text-secondary">
                        <li class="flex items-center gap-2"><span class="material-symbols-outlined text-[16px] text-emerald-700">check_circle</span><span>Zero Port-Hold Penalties</span></li>
                        <li class="flex items-center gap-2"><span class="material-symbols-outlined text-[16px] text-emerald-700">check_circle</span><span>Certified Tare Weight Verification</span></li>
                        <li class="flex items-center gap-2"><span class="material-symbols-outlined text-[16px] text-emerald-700">check_circle</span><span>Full Digital Traceability Seals</span></li>
                    </ul>
                </div>
            </div>

            <div class="p-space-lg bg-surface-container-lowest rounded-lg border border-outline-variant/40 shadow-sm flex flex-col gap-space-md md:grid md:grid-cols-[auto_1fr] md:gap-x-space-lg lg:flex">
                <div class="w-16 h-16 rounded bg-surface-container-low flex items-center justify-center text-primary">
                    <svg class="w-9 h-9 text-secondary" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.75" viewBox="0 0 24 24">
                        <polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"></polygon>
                    </svg>
                </div>
                <div class="flex flex-col gap-space-xs">
                    <span class="font-label-technical text-label-technical text-secondary uppercase tracking-widest">PILLAR 02 &bull; STRATEGIC</span>
                    <h3 class="font-headline-sm text-headline-sm text-primary font-bold">Mombasa-Based Expertise</h3>
                    <p class="font-body-md text-body-md text-on-surface-variant leading-relaxed">
                        Headquartered in Mikindani, Mombasa County. Positioned at Kenya's primary maritime and transit hub to offer rapid turnaround, local supply chain resilience, and regional support across the Northern Transport Corridor.
                    </p>
                </div>
                <div class="mt-auto pt-space-sm md:col-start-2 md:pt-0 lg:pt-space-sm">
                    <ul class="flex flex-col gap-1.5 font-label-technical text-label-technical text-secondary">
                        <li class="flex items-center gap-2"><span class="material-symbols-outlined text-[16px] text-emerald-700">check_circle</span><span>Direct Access to SGR Freight Rail</span></li>
                        <li class="flex items-center gap-2"><span class="material-symbols-outlined text-[16px] text-emerald-700">check_circle</span><span>Kilindini Port Rapid Clearance</span></li>
                        <li class="flex items-center gap-2"><span class="material-symbols-outlined text-[16px] text-emerald-700">check_circle</span><span>Regional Warehousing Redundancy</span></li>
                    </ul>
                </div>
            </div>

            <div class="p-space-lg bg-surface-container-lowest rounded-lg border border-outline-variant/40 shadow-sm flex flex-col gap-space-md md:grid md:grid-cols-[auto_1fr] md:gap-x-space-lg lg:flex">
                <div class="w-16 h-16 rounded bg-surface-container-low flex items-center justify-center text-primary">
                    <svg class="w-9 h-9 text-primary" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.75" viewBox="0 0 24 24">
                        <path d="M22 12h-4l-3 9L9 3l-3 9H2"></path>
                    </svg>
                </div>
                <div class="flex flex-col gap-space-xs">
                    <span class="font-label-technical text-label-technical text-secondary uppercase tracking-widest">PILLAR 03 &bull; LAB-PRECISION</span>
                    <h3 class="font-headline-sm text-headline-sm text-primary font-bold">Reliable Quality Control</h3>
                    <p class="font-body-md text-body-md text-on-surface-variant leading-relaxed">
                        Continuous stress-cycle monitoring, pneumatic burst testing, drop-tower verification, and sealed batch archiving for uncompromising structural security that eliminates bag tears during mechanized loading.
                    </p>
                </div>
                <div class="mt-auto pt-space-sm md:col-start-2 md:pt-0 lg:pt-space-sm">
                    <ul class="flex flex-col gap-1.5 font-label-technical text-label-technical text-secondary">
                        <li class="flex items-center gap-2"><span class="material-symbols-outlined text-[16px] text-emerald-700">check_circle</span><span>Calibrated Pneumatic Drop Towers</span></li>
                        <li class="flex items-center gap-2"><span class="material-symbols-outlined text-[16px] text-emerald-700">check_circle</span><span>Digital Micro-porosity Profilers</span></li>
                        <li class="flex items-center gap-2"><span class="material-symbols-outlined text-[16px] text-emerald-700">check_circle</span><span>Permanent Physical Specimen Vault</span></li>
                    </ul>
                </div>
            </div>

        </div>
    </div>
</section>

{{-- Live Laboratory Test Matrix Ledger --}}
@php
    $ledger = [
        ['id' => 'BATCH-2025-0814A', 'substrate' => '3-Ply Clupak Extensible Kraft', 'pressure' => '485 kPa', 'drop' => '1.80m / 5-cycle', 'porosity' => '14.2 s/100ml', 'status' => 'PASSED KEBS', 'tone' => 'bg-emerald-950 text-emerald-400'],
        ['id' => 'BATCH-2025-0814B', 'substrate' => 'Polypropylene Woven + PE Film', 'pressure' => '620 kPa', 'drop' => '2.00m / 7-cycle', 'porosity' => 'Hermetic Seal', 'status' => 'PASSED ISO', 'tone' => 'bg-emerald-950 text-emerald-400'],
        ['id' => 'BATCH-2025-0815A', 'substrate' => 'Recycled Heavy-Duty Composite', 'pressure' => '430 kPa', 'drop' => '1.50m / 4-cycle', 'porosity' => '16.8 s/100ml', 'status' => 'IN CALIBRATION', 'tone' => 'bg-amber-950 text-amber-400'],
    ];
@endphp
<section class="w-full bg-primary-container text-on-primary py-space-lg md:py-space-xl">
    <div class="max-w-[1440px] mx-auto px-margin-mobile md:px-margin">
        <div class="p-space-md sm:p-space-lg bg-primary rounded-lg shadow-inner">
            <div class="flex flex-col md:flex-row md:items-center justify-between pb-space-sm mb-space-sm border-b border-surface-container-highest/20 gap-space-xs">
                <div class="flex items-center gap-space-sm">
                    <span class="w-2.5 h-2.5 shrink-0 rounded-full bg-on-tertiary-container"></span>
                    <span class="font-headline-sm text-body-md uppercase tracking-wider text-surface-bright">Live Laboratory Test Matrix Ledger</span>
                </div>
                <span class="font-label-technical text-label-technical text-outline">UPDATED HOURLY &bull; FACILITY TERMINAL 03</span>
            </div>

            {{-- Phones and small tablets: one card per specimen --}}
            <div class="flex flex-col divide-y divide-surface-container-highest/10 lg:hidden">
                @foreach ($ledger as $row)
                    <div class="py-space-md first:pt-space-xs last:pb-0 font-label-technical text-label-technical text-surface-dim">
                        <div class="flex flex-wrap items-center justify-between gap-2">
                            <span class="font-mono text-surface-bright">{{ $row['id'] }}</span>
                            <span class="px-2 py-0.5 rounded {{ $row['tone'] }}">{{ $row['status'] }}</span>
                        </div>
                        <p class="mt-1.5">{{ $row['substrate'] }}</p>
                        <dl class="mt-space-sm grid grid-cols-1 gap-space-sm min-[420px]:grid-cols-3">
                            <div><dt class="text-secondary-fixed">PRESSURE RESISTANCE</dt><dd class="mt-0.5 font-mono">{{ $row['pressure'] }}</dd></div>
                            <div><dt class="text-secondary-fixed">DROP HEIGHT TEST</dt><dd class="mt-0.5 font-mono">{{ $row['drop'] }}</dd></div>
                            <div><dt class="text-secondary-fixed">POROSITY RATING</dt><dd class="mt-0.5 font-mono">{{ $row['porosity'] }}</dd></div>
                        </dl>
                    </div>
                @endforeach
            </div>

            {{-- Laptop and desktop: full table --}}
            <table class="hidden w-full text-left font-label-technical text-label-technical border-collapse lg:table">
                <thead>
                    <tr class="text-secondary-fixed bg-surface-container-highest/10">
                        <th class="p-2.5">SPECIMEN ID</th>
                        <th class="p-2.5">SUBSTRATE TYPE</th>
                        <th class="p-2.5">PRESSURE RESISTANCE</th>
                        <th class="p-2.5">DROP HEIGHT TEST</th>
                        <th class="p-2.5">POROSITY RATING</th>
                        <th class="p-2.5">VERIFICATION STATUS</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-surface-container-highest/10 text-surface-dim">
                    @foreach ($ledger as $row)
                        <tr>
                            <td class="p-2.5 font-mono text-surface-bright whitespace-nowrap">{{ $row['id'] }}</td>
                            <td class="p-2.5">{{ $row['substrate'] }}</td>
                            <td class="p-2.5 font-mono whitespace-nowrap">{{ $row['pressure'] }}</td>
                            <td class="p-2.5 font-mono whitespace-nowrap">{{ $row['drop'] }}</td>
                            <td class="p-2.5 font-mono whitespace-nowrap">{{ $row['porosity'] }}</td>
                            <td class="p-2.5"><span class="inline-block whitespace-nowrap px-2 py-0.5 rounded {{ $row['tone'] }}">{{ $row['status'] }}</span></td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</section>

@endsection
