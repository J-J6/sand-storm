@php
    $navItems = [
        ['route' => 'home', 'label' => 'Home', 'short' => 'Home', 'icon' => 'home'],
        ['route' => 'about', 'label' => 'About', 'short' => 'About', 'icon' => 'domain'],
        ['route' => 'services', 'label' => 'Services', 'short' => 'Services', 'icon' => 'precision_manufacturing'],
        ['route' => 'standards', 'label' => 'Quality Standards', 'short' => 'Standards', 'icon' => 'verified'],
        ['route' => 'contact', 'label' => 'Contact', 'short' => 'Contact', 'icon' => 'mail'],
    ];
@endphp

{{-- Top bar: logo on every page. Links appear from tablet width up; phones use the quick navigation below. --}}
<header class="fixed top-0 z-50 w-full bg-surface-container-lowest/95 shadow-[0_1px_8px_rgba(0,0,0,0.06)] backdrop-blur-md">
    <div class="mx-auto flex h-16 max-w-[1440px] items-center justify-between gap-space-sm px-margin-mobile md:gap-space-md md:px-margin lg:h-20">

        <a href="{{ route('home') }}" class="flex shrink-0 items-center" aria-label="Sandstorm Industries home">
            <img src="{{ asset('images/logo.svg') }}" alt="Sandstorm Industries Limited" width="275" height="267" class="h-11 w-auto object-contain lg:h-14">
        </a>

        <nav class="hidden items-center gap-0.5 md:flex lg:gap-1 xl:gap-space-sm" aria-label="Main navigation">
            @foreach ($navItems as $item)
                <a href="{{ route($item['route']) }}" @if (request()->routeIs($item['route'])) aria-current="page" @endif
                   class="{{ request()->routeIs($item['route']) ? 'bg-primary-container text-on-primary' : 'text-on-surface-variant hover:bg-surface-container-low hover:text-on-surface' }} whitespace-nowrap rounded-lg px-2.5 py-2 font-headline-sm text-[15px] font-semibold leading-6 transition-colors lg:px-3 xl:px-space-md xl:text-[17px]">{{ $item['label'] }}</a>
            @endforeach
        </nav>

        <div class="flex shrink-0 items-center md:hidden lg:flex">
            <a href="{{ route('contact') }}" class="inline-flex items-center justify-center gap-2 whitespace-nowrap rounded-lg bg-on-tertiary-container px-space-md py-2 font-headline-sm text-body-sm font-semibold text-on-primary transition-colors hover:bg-tertiary-container lg:px-space-lg lg:py-space-sm lg:text-body-md">Inquire Now <span class="material-symbols-outlined text-[18px]" aria-hidden="true">arrow_forward</span></a>
        </div>

    </div>
</header>

<nav class="fixed bottom-[max(1rem,env(safe-area-inset-bottom))] left-1/2 z-50 grid w-[calc(100%-1.5rem)] max-w-md -translate-x-1/2 grid-cols-5 rounded-2xl border border-white/70 bg-white/90 p-1.5 shadow-[0_12px_32px_rgba(8,14,21,0.2)] backdrop-blur-xl md:hidden" aria-label="Quick navigation" data-quick-navigation>
    @foreach ($navItems as $item)
        <a href="{{ route($item['route']) }}" aria-current="{{ request()->routeIs($item['route']) ? 'page' : 'false' }}" class="flex min-h-14 min-w-0 flex-col items-center justify-center gap-0.5 rounded-xl {{ request()->routeIs($item['route']) ? 'bg-primary text-on-primary' : 'text-on-surface-variant hover:bg-surface-container-low' }} transition-colors">
            <span class="material-symbols-outlined text-[20px]" aria-hidden="true">{{ $item['icon'] }}</span>
            <span class="text-[10px] font-semibold leading-none">{{ $item['short'] }}</span>
        </a>
    @endforeach
</nav>
