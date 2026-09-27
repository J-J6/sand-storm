<header class="{{ request()->routeIs('home') ? '' : 'hidden xl:block' }} fixed top-0 w-full z-50 bg-surface-container-lowest/95 backdrop-blur-md shadow-[0_1px_8px_rgba(0,0,0,0.06)]">
    <div class="h-20 max-w-[1440px] mx-auto px-margin-mobile md:px-margin flex items-center justify-between gap-space-sm md:gap-space-md">

        @if (request()->routeIs('home'))
            <a href="{{ route('home') }}" class="flex shrink-0 items-center" aria-label="Sandstorm Industries home">
                <img src="{{ asset('images/logo.svg') }}" alt="Sandstorm Industries Limited" class="h-8 w-auto object-contain">
            </a>
        @endif

        <nav class="hidden xl:flex items-center gap-space-lg">
            <a href="{{ route('home') }}" class="{{ request()->routeIs('home') ? 'bg-primary-container text-on-primary-container' : 'text-on-surface-variant hover:text-on-surface' }} font-headline-sm text-headline-sm transition-colors py-space-xs px-space-sm rounded-lg">Home</a>
            <a href="{{ route('about') }}" class="{{ request()->routeIs('about') ? 'bg-primary-container text-on-primary-container' : 'text-on-surface-variant hover:text-on-surface' }} font-headline-sm text-headline-sm transition-colors py-space-xs px-space-sm rounded-lg">About</a>
            <a href="{{ route('services') }}" class="{{ request()->routeIs('services') ? 'bg-primary-container text-on-primary-container' : 'text-on-surface-variant hover:text-on-surface' }} font-headline-sm text-headline-sm transition-colors py-space-xs px-space-sm rounded-lg">Services</a>
            <a href="{{ route('standards') }}" class="{{ request()->routeIs('standards') ? 'bg-primary-container text-on-primary-container' : 'text-on-surface-variant hover:text-on-surface' }} font-headline-sm text-headline-sm transition-colors py-space-xs px-space-sm rounded-lg">Quality Standards</a>
            <a href="{{ route('contact') }}" class="{{ request()->routeIs('contact') ? 'bg-primary-container text-on-primary-container' : 'text-on-surface-variant hover:text-on-surface' }} font-headline-sm text-headline-sm transition-colors py-space-xs px-space-sm rounded-lg">Contact</a>
        </nav>

        <div class="hidden xl:flex items-center gap-space-md shrink-0">
            <a href="{{ route('contact') }}" class="inline-flex items-center justify-center gap-2 bg-on-tertiary-container hover:bg-tertiary-container text-on-primary font-headline-sm text-body-md font-semibold px-space-lg py-space-sm rounded-lg transition-colors">Inquire Now <span class="material-symbols-outlined text-[18px]" aria-hidden="true">arrow_forward</span></a>
        </div>

    </div>
</header>

<nav class="fixed bottom-10 left-1/2 z-50 grid w-[calc(100%-1.5rem)] max-w-md -translate-x-1/2 grid-cols-5 rounded-2xl border border-white/70 bg-white/90 p-1.5 shadow-[0_12px_32px_rgba(8,14,21,0.2)] backdrop-blur-xl xl:hidden" aria-label="Quick navigation" data-quick-navigation>
    <a href="{{ route('home') }}" aria-current="{{ request()->routeIs('home') ? 'page' : 'false' }}" class="flex min-h-14 flex-col items-center justify-center gap-0.5 rounded-xl {{ request()->routeIs('home') ? 'bg-primary text-on-primary' : 'text-on-surface-variant hover:bg-surface-container-low' }} transition-colors">
        <span class="material-symbols-outlined text-[20px]" aria-hidden="true">home</span>
        <span class="text-[10px] font-semibold leading-none">Home</span>
    </a>
    <a href="{{ route('about') }}" aria-current="{{ request()->routeIs('about') ? 'page' : 'false' }}" class="flex min-h-14 flex-col items-center justify-center gap-0.5 rounded-xl {{ request()->routeIs('about') ? 'bg-primary text-on-primary' : 'text-on-surface-variant hover:bg-surface-container-low' }} transition-colors">
        <span class="material-symbols-outlined text-[20px]" aria-hidden="true">domain</span>
        <span class="text-[10px] font-semibold leading-none">About</span>
    </a>
    <a href="{{ route('services') }}" aria-current="{{ request()->routeIs('services') ? 'page' : 'false' }}" class="flex min-h-14 flex-col items-center justify-center gap-0.5 rounded-xl {{ request()->routeIs('services') ? 'bg-primary text-on-primary' : 'text-on-surface-variant hover:bg-surface-container-low' }} transition-colors">
        <span class="material-symbols-outlined text-[20px]" aria-hidden="true">precision_manufacturing</span>
        <span class="text-[10px] font-semibold leading-none">Services</span>
    </a>
    <a href="{{ route('standards') }}" aria-current="{{ request()->routeIs('standards') ? 'page' : 'false' }}" class="flex min-h-14 flex-col items-center justify-center gap-0.5 rounded-xl {{ request()->routeIs('standards') ? 'bg-primary text-on-primary' : 'text-on-surface-variant hover:bg-surface-container-low' }} transition-colors">
        <span class="material-symbols-outlined text-[20px]" aria-hidden="true">verified</span>
        <span class="text-[10px] font-semibold leading-none">Standards</span>
    </a>
    <a href="{{ route('contact') }}" aria-current="{{ request()->routeIs('contact') ? 'page' : 'false' }}" class="flex min-h-14 flex-col items-center justify-center gap-0.5 rounded-xl {{ request()->routeIs('contact') ? 'bg-primary text-on-primary' : 'text-on-surface-variant hover:bg-surface-container-low' }} transition-colors">
        <span class="material-symbols-outlined text-[20px]" aria-hidden="true">mail</span>
        <span class="text-[10px] font-semibold leading-none">Contact</span>
    </a>
</nav>
