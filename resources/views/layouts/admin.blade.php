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
    <main class="w-full bg-surface {{ request()->routeIs('admin.login') ? 'grid min-h-screen place-items-center px-margin-mobile py-space-xl' : 'min-h-screen px-margin-mobile py-space-xl md:px-margin' }}">
        <div class="w-full">
            @yield('content')
        </div>
    </main>
    @stack('scripts')
</body>
</html>
