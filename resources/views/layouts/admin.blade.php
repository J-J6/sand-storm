<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Sandstorm Admin')</title>
    <meta name="robots" content="noindex, nofollow">
    @include('partials.design-system')
    @stack('styles')
</head>
<body class="min-h-screen bg-surface font-body-md text-body-md text-on-surface">

@if (request()->routeIs('admin.login'))
    @yield('content')
@else
    <header class="sticky top-0 z-40 bg-primary text-on-primary shadow-[0_1px_8px_rgba(0,0,0,0.18)]">
        <div class="mx-auto flex h-16 max-w-[1440px] items-center justify-between gap-space-md px-margin-mobile md:px-margin">
            <a href="{{ route('admin.index') }}" class="flex items-center gap-3">
                <span class="flex h-9 w-9 items-center justify-center rounded-lg bg-on-tertiary-container">
                    <span class="material-symbols-outlined text-[20px] text-on-primary" aria-hidden="true">precision_manufacturing</span>
                </span>
                <span class="flex flex-col leading-tight">
                    <span class="font-headline-sm text-body-md font-bold uppercase tracking-wide">Sandstorm</span>
                    <span class="font-label-technical text-[11px] uppercase tracking-widest text-on-primary-container">Admin console</span>
                </span>
            </a>

            <div class="flex items-center gap-space-sm">
                <a href="{{ route('home') }}" target="_blank" rel="noopener noreferrer" class="hidden items-center gap-1.5 rounded-lg px-space-md py-2 font-body-sm text-body-sm text-on-primary-container transition-colors hover:bg-primary-container hover:text-on-primary sm:inline-flex">
                    <span class="material-symbols-outlined text-[18px]" aria-hidden="true">open_in_new</span>
                    View website
                </a>
                <span class="hidden font-label-technical text-label-technical text-on-primary-container md:inline">{{ auth()->user()?->email }}</span>
                <form method="POST" action="{{ route('admin.logout') }}">
                    @csrf
                    <button type="submit" class="inline-flex h-10 items-center gap-1.5 rounded-lg border border-on-primary-container/40 px-space-md font-body-sm text-body-sm font-medium text-on-primary transition-colors hover:bg-primary-container">
                        <span class="material-symbols-outlined text-[18px]" aria-hidden="true">logout</span>
                        Sign out
                    </button>
                </form>
            </div>
        </div>
    </header>

    <main class="mx-auto w-full max-w-[1440px] px-margin-mobile py-space-xl md:px-margin">
        @yield('content')
    </main>
@endif

@stack('scripts')
</body>
</html>
