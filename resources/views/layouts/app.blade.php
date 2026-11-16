<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, viewport-fit=cover">
    <link rel="icon" href="{{ asset('favicon.ico') }}" sizes="any">
    <link rel="icon" type="image/svg+xml" href="{{ asset('favicon.svg') }}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('favicon-32.png') }}">
    <link rel="apple-touch-icon" href="{{ asset('favicon-180.png') }}">
    <title>@yield('title', 'Sandstorm Industries Limited — Mikindani Metrology & Packaging')</title>
    <meta name="description" content="@yield('description', 'Industrial manufacturing, raw material testing, and cement bag packaging compliance in Mikindani, Mombasa, Kenya.')">

    @include('partials.design-system')

    @stack('styles')
</head>
<body class="bg-surface font-body-md text-body-md text-on-surface">

    @include('partials.navbar')

    <main class="w-full pt-16 lg:pt-20 bg-surface min-h-[calc(100vh-80px)]">
        <div class="flex flex-col w-full">
            @yield('content')
        </div>
    </main>

    @include('partials.footer')

    <script>
        const quickNavigation = document.querySelector('[data-quick-navigation]');

        if (quickNavigation) {
            let previousScrollPosition = window.scrollY;

            window.addEventListener('scroll', () => {
                const currentScrollPosition = window.scrollY;
                const scrollingDown = currentScrollPosition > previousScrollPosition + 4;
                const scrollingUp = currentScrollPosition < previousScrollPosition - 4;

                if (scrollingDown) {
                    quickNavigation.classList.add('is-hidden');
                } else if (scrollingUp || currentScrollPosition <= 24) {
                    quickNavigation.classList.remove('is-hidden');
                }

                previousScrollPosition = currentScrollPosition;
            }, { passive: true });
        }
    </script>

    @stack('scripts')
</body>
</html>