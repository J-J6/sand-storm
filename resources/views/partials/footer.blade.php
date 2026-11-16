<footer class="w-full border-t border-outline-variant/30 bg-surface-container-low">
    <div class="max-w-[1440px] mx-auto px-margin-mobile md:px-margin pt-space-xl pb-28 md:pt-section md:pb-space-xl">
        <div class="grid grid-cols-1 gap-space-lg sm:grid-cols-2 sm:gap-space-xl lg:grid-cols-4 mb-space-xl">

            <div class="flex flex-col gap-space-sm">
                <span class="font-headline-sm text-headline-sm text-primary uppercase">Sandstorm Industries Limited</span>
                <p class="font-body-sm text-body-sm text-on-surface-variant leading-relaxed">Precision Manufacturing &amp; Packaging Compliance Standards in Coast Region. Industrial rigor, metrology validation, and materials testing operating out of Mikindani, Mombasa.</p>
                <div class="flex flex-wrap items-center gap-space-xs mt-space-sm">
                    <span class="inline-block px-space-sm py-space-xs bg-surface-container text-on-secondary-container font-label-technical text-label-technical rounded">KEBS ACCREDITED</span>
                    <span class="inline-block px-space-sm py-space-xs bg-surface-container text-on-secondary-container font-label-technical text-label-technical rounded">EAS CERTIFIED</span>
                </div>
            </div>

            <div class="flex flex-col gap-space-sm">
                <span class="font-label-technical text-label-technical uppercase tracking-widest text-on-surface">Explore the site</span>
                <ul class="flex flex-col font-body-sm text-body-sm">
                    <li><a class="inline-flex min-h-11 items-center text-on-surface-variant hover:text-on-surface transition-colors" href="{{ route('about') }}">About Sandstorm</a></li>
                    <li><a class="inline-flex min-h-11 items-center text-on-surface-variant hover:text-on-surface transition-colors" href="{{ route('services') }}">Packaging &amp; Tensile Testing</a></li>
                    <li><a class="inline-flex min-h-11 items-center text-on-surface-variant hover:text-on-surface transition-colors" href="{{ route('standards') }}">Quality &amp; Metrology Standards</a></li>
                    <li><a class="inline-flex min-h-11 items-center text-on-surface-variant hover:text-on-surface transition-colors" href="{{ route('standards') }}">Regulatory Compliance</a></li>
                    <li><a class="inline-flex min-h-11 items-center text-on-surface-variant hover:text-on-surface transition-colors" href="{{ route('contact') }}">Contact &amp; quote requests</a></li>
                    <li><a class="inline-flex min-h-11 items-center text-on-surface-variant hover:text-on-surface transition-colors" href="{{ route('privacy') }}">Privacy notice</a></li>
                    <li><a class="inline-flex min-h-11 items-center text-on-surface-variant hover:text-on-surface transition-colors" href="{{ route('terms') }}">Request terms</a></li>
                </ul>
            </div>

            <div class="flex flex-col gap-space-sm">
                <span class="font-label-technical text-label-technical uppercase tracking-widest text-on-surface">Coast Operations Base</span>
                <p class="font-body-sm text-body-sm text-on-surface-variant leading-relaxed"><a class="underline underline-offset-4 hover:text-on-surface transition-colors" href="https://maps.app.goo.gl/hqcNgMHYcjoNbRHx7" target="_blank" rel="noopener noreferrer">Off Mombasa Road (near EPZ Centre)<br>Mombasa, Kenya<br>Plus Code: XJRC+WWR</a></p>
                <div class="flex flex-col gap-space-xs font-label-technical text-label-technical text-on-surface-variant mt-space-xs">
                    <span>PLANT ID: MSA-MIK-094</span>
                    <span>COASTAL REGISTRY: SEC-IV</span>
                </div>
            </div>

            <div class="flex flex-col gap-space-sm">
                <span class="font-label-technical text-label-technical uppercase tracking-widest text-on-surface">Quality Verification</span>
                <p class="font-body-sm text-body-sm text-on-surface-variant leading-relaxed">Batch test verifications and digital calibration seals issued under regional industrial metrology guidelines.</p>
                <div class="p-space-sm bg-surface-container-lowest rounded-lg shadow-[0_1px_4px_rgba(0,0,0,0.04)]">
                    <span class="font-label-technical text-label-technical text-on-tertiary-container block font-bold">METROLOGY GATEWAY</span>
                    <span class="font-body-sm text-body-sm text-on-surface-variant block mt-0.5">Digital batch verification active 24/7 for marine &amp; freight packaging.</span>
                </div>
            </div>

        </div>

        <div class="pt-space-lg border-t border-outline-variant/40 flex flex-col lg:flex-row items-center justify-between gap-space-md font-body-sm text-body-sm text-on-surface-variant">
            <p class="text-center lg:text-left">&copy; {{ date('Y') }} Sandstorm Industries Limited. All rights reserved. Compliant with KEBS &amp; East African Industrial Standards.</p>
            <div class="flex flex-wrap items-center justify-center gap-x-space-lg gap-y-space-xs whitespace-nowrap font-label-technical text-label-technical uppercase">
                <span class="text-on-surface-variant">ISO 9001:2015</span>
                <span class="text-on-surface-variant">KEBS CD/432</span>
                <span class="text-on-surface-variant">EAS 351</span>
            </div>
        </div>
    </div>
</footer>
