<div class="mb-space-xl flex max-w-3xl flex-col items-start gap-space-sm">
    <div class="inline-flex items-center gap-2 self-start rounded bg-surface-container-high px-space-sm py-1 font-label-technical text-label-technical uppercase tracking-widest text-secondary">
        @if (!empty($icon))
            <span class="material-symbols-outlined text-[16px] text-on-tertiary-container" aria-hidden="true">{{ $icon }}</span>
        @endif
        {{ $eyebrow }}
    </div>
    <h1 class="font-headline-lg text-headline-lg font-semibold leading-tight tracking-tight text-primary sm:font-headline-xl sm:text-headline-xl">{{ $title }}</h1>
    <span class="h-1 w-12 rounded-full bg-on-tertiary-container" aria-hidden="true"></span>
    <p class="max-w-2xl font-body-lg text-body-lg leading-relaxed text-on-surface-variant">{{ $description }}</p>
</div>
