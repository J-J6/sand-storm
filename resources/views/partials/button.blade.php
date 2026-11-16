{{-- One button for the public site.
     Vars: label (required), variant: primary | secondary | link (default primary),
           href (renders a link) or type (renders a button, default "button"),
           icon (after the label), iconStart (before the label), class (layout only), external (open in a new tab) --}}
@php
    $buttonVariants = [
        'primary' => 'whitespace-nowrap px-space-lg bg-on-tertiary-container text-on-primary shadow-sm hover:bg-tertiary-container',
        'secondary' => 'whitespace-nowrap px-space-lg border border-primary bg-surface-container-lowest text-primary hover:bg-primary hover:text-on-primary',
        'link' => 'text-primary hover:text-tertiary-container [&>span:not(.material-symbols-outlined)]:underline [&>span:not(.material-symbols-outlined)]:decoration-on-tertiary-container [&>span:not(.material-symbols-outlined)]:decoration-2 [&>span:not(.material-symbols-outlined)]:underline-offset-4',
    ];
    $buttonClasses = trim('inline-flex min-h-12 items-center justify-center gap-space-sm rounded-lg py-3 font-headline-sm text-body-md font-semibold transition-colors '
        .$buttonVariants[$variant ?? 'primary'].' '.($class ?? ''));
@endphp
@isset($href)
<a href="{{ $href }}" class="{{ $buttonClasses }}" @if (! empty($external)) target="_blank" rel="noopener noreferrer" @endif>
@else
<button type="{{ $type ?? 'button' }}" class="{{ $buttonClasses }}">
@endisset
    @if (! empty($iconStart))<span class="material-symbols-outlined text-[20px]" aria-hidden="true">{{ $iconStart }}</span>@endif
    <span>{{ $label }}</span>
    @if (! empty($icon))<span class="material-symbols-outlined text-[20px]" aria-hidden="true">{{ $icon }}</span>@endif
@isset($href)
</a>
@else
</button>
@endisset
