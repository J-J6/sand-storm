{{-- Photo tile. Shows public/images/gallery/{file} when it exists, otherwise a clean spec-card fallback.
     Vars: file, label, icon, class (sizing), spec (optional) --}}
@php
    $path = 'images/gallery/' . $file;
    $has = file_exists(public_path($path));
@endphp

@if ($has)
    <figure class="group relative overflow-hidden rounded-lg bg-primary-container {{ $class ?? '' }}">
        <button type="button" data-lightbox="{{ asset($path) }}" data-caption="{{ $label }}" class="block w-full h-full text-left cursor-zoom-in">
            <img src="{{ asset($path) }}" alt="{{ $label }}" loading="lazy" class="w-full h-full object-cover transition duration-500 group-hover:scale-105">
            <figcaption class="absolute inset-x-0 bottom-0 p-space-md bg-gradient-to-t from-primary/90 to-transparent flex items-center justify-between gap-space-sm">
                <span class="font-label-technical text-label-technical text-surface-bright uppercase tracking-wider">{{ $label }}</span>
                @isset($spec)
                    <span class="font-label-technical text-label-technical text-on-tertiary-container">{{ $spec }}</span>
                @endisset
            </figcaption>
        </button>
    </figure>
@else
    <div class="relative overflow-hidden rounded-lg bg-primary-container text-on-primary {{ $class ?? '' }}">
        <div class="absolute inset-0 opacity-10 bg-[radial-gradient(#ffffff_1px,transparent_1px)] [background-size:20px_20px]"></div>
        <div class="relative h-full flex flex-col items-center justify-center gap-space-sm p-space-md text-center">
            <span class="material-symbols-outlined text-[44px] text-on-tertiary-container">{{ $icon ?? 'precision_manufacturing' }}</span>
            <span class="font-label-technical text-label-technical text-surface-dim uppercase tracking-widest">{{ $label }}</span>
            @isset($spec)
                <span class="font-label-technical text-label-technical text-on-tertiary-container">{{ $spec }}</span>
            @endisset
            @if (app()->environment('local'))
                <span class="font-label-technical text-label-technical text-outline">add: public/images/gallery/{{ $file }}</span>
            @endif
        </div>
    </div>
@endif
