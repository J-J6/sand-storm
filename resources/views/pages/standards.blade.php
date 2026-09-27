@extends('layouts.app')

@section('title', 'Quality Standards & Metrology — Sandstorm Industries')

@section('content')

{{-- Why Choose Us / Quality Standards Section --}}
<section class="w-full py-space-xl bg-surface" id="standards">
    <div class="max-w-[1440px] mx-auto px-margin-mobile md:px-margin">
        @include('partials.page-heading', [
            'eyebrow' => 'Quality and standards',
            'icon' => 'verified',
            'title' => 'Clear checks for industrial packaging',
            'description' => 'We agree the applicable packaging requirements, test method and acceptance criteria with each customer before work starts.',
        ])

        <div class="grid grid-cols-1 lg:grid-cols-3 gap-space-xl">

            <div class="p-space-lg bg-surface-container-lowest rounded-lg border border-outline-variant/40 shadow-sm flex flex-col gap-space-md">
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
                <div class="mt-auto pt-space-sm">
                    <ul class="flex flex-col gap-1.5 font-label-technical text-label-technical text-secondary">
                        <li class="flex items-center gap-2"><span class="material-symbols-outlined text-[16px] text-emerald-700">check_circle</span><span>Zero Port-Hold Penalties</span></li>
                        <li class="flex items-center gap-2"><span class="material-symbols-outlined text-[16px] text-emerald-700">check_circle</span><span>Certified Tare Weight Verification</span></li>
                        <li class="flex items-center gap-2"><span class="material-symbols-outlined text-[16px] text-emerald-700">check_circle</span><span>Full Digital Traceability Seals</span></li>
                    </ul>
                </div>
            </div>

            <div class="p-space-lg bg-surface-container-lowest rounded-lg border border-outline-variant/40 shadow-sm flex flex-col gap-space-md">
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
                <div class="mt-auto pt-space-sm">
                    <ul class="flex flex-col gap-1.5 font-label-technical text-label-technical text-secondary">
                        <li class="flex items-center gap-2"><span class="material-symbols-outlined text-[16px] text-emerald-700">check_circle</span><span>Direct Access to SGR Freight Rail</span></li>
                        <li class="flex items-center gap-2"><span class="material-symbols-outlined text-[16px] text-emerald-700">check_circle</span><span>Kilindini Port Rapid Clearance</span></li>
                        <li class="flex items-center gap-2"><span class="material-symbols-outlined text-[16px] text-emerald-700">check_circle</span><span>Regional Warehousing Redundancy</span></li>
                    </ul>
                </div>
            </div>

            <div class="p-space-lg bg-surface-container-lowest rounded-lg border border-outline-variant/40 shadow-sm flex flex-col gap-space-md">
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
                <div class="mt-auto pt-space-sm">
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
<section class="w-full bg-primary-container text-on-primary py-space-lg">
    <div class="max-w-[1440px] mx-auto px-margin-mobile md:px-margin">
        <div class="p-space-lg bg-primary rounded-lg shadow-inner overflow-x-auto">
            <div class="flex flex-col md:flex-row md:items-center justify-between pb-space-sm mb-space-sm border-b border-surface-container-highest/20 gap-space-xs">
                <div class="flex items-center gap-space-sm">
                    <span class="w-2.5 h-2.5 rounded-full bg-on-tertiary-container"></span>
                    <span class="font-headline-sm text-body-md uppercase tracking-wider text-surface-bright">Live Laboratory Test Matrix Ledger</span>
                </div>
                <span class="font-label-technical text-label-technical text-outline">UPDATED HOURLY &bull; FACILITY TERMINAL 03</span>
            </div>
            <table class="w-full text-left font-label-technical text-label-technical border-collapse">
                <thead>
                    <tr class="text-secondary-fixed bg-surface-container-highest/10">
                        <th class="p-2">SPECIMEN ID</th>
                        <th class="p-2">SUBSTRATE TYPE</th>
                        <th class="p-2">PRESSURE RESISTANCE</th>
                        <th class="p-2">DROP HEIGHT TEST</th>
                        <th class="p-2">POROSITY RATING</th>
                        <th class="p-2">VERIFICATION STATUS</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-surface-container-highest/10 text-surface-dim">
                    <tr>
                        <td class="p-2 font-mono text-surface-bright">BATCH-2025-0814A</td>
                        <td class="p-2">3-Ply Clupak Extensible Kraft</td>
                        <td class="p-2 font-mono">485 kPa</td>
                        <td class="p-2 font-mono">1.80m / 5-cycle</td>
                        <td class="p-2 font-mono">14.2 s/100ml</td>
                        <td class="p-2"><span class="px-2 py-0.5 bg-emerald-950 text-emerald-400 rounded">PASSED KEBS</span></td>
                    </tr>
                    <tr>
                        <td class="p-2 font-mono text-surface-bright">BATCH-2025-0814B</td>
                        <td class="p-2">Polypropylene Woven + PE Film</td>
                        <td class="p-2 font-mono">620 kPa</td>
                        <td class="p-2 font-mono">2.00m / 7-cycle</td>
                        <td class="p-2 font-mono">Hermetic Seal</td>
                        <td class="p-2"><span class="px-2 py-0.5 bg-emerald-950 text-emerald-400 rounded">PASSED ISO</span></td>
                    </tr>
                    <tr>
                        <td class="p-2 font-mono text-surface-bright">BATCH-2025-0815A</td>
                        <td class="p-2">Recycled Heavy-Duty Composite</td>
                        <td class="p-2 font-mono">430 kPa</td>
                        <td class="p-2 font-mono">1.50m / 4-cycle</td>
                        <td class="p-2 font-mono">16.8 s/100ml</td>
                        <td class="p-2"><span class="px-2 py-0.5 bg-amber-950 text-amber-400 rounded">IN CALIBRATION</span></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</section>

@endsection
