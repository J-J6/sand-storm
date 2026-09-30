@extends('layouts.admin')

@section('title', 'Admin Sign In — Sandstorm Industries')

@section('content')
<div class="grid min-h-screen lg:grid-cols-2">

    {{-- Brand panel --}}
    <section class="relative flex flex-col justify-between overflow-hidden bg-primary px-margin-mobile py-space-lg text-on-primary md:px-margin lg:min-h-screen lg:py-space-xl">
        <div class="pointer-events-none absolute inset-0 opacity-10 bg-[radial-gradient(#ffffff_1px,transparent_1px)] [background-size:24px_24px]"></div>

        <div class="relative z-10 flex items-center gap-3">
            <span class="flex h-10 w-10 items-center justify-center rounded-lg bg-on-tertiary-container">
                <span class="material-symbols-outlined text-[22px] text-on-primary" aria-hidden="true">precision_manufacturing</span>
            </span>
            <span class="flex flex-col leading-tight">
                <span class="font-headline-sm text-body-md font-bold uppercase tracking-wide">Sandstorm Industries</span>
                <span class="font-label-technical text-[11px] uppercase tracking-widest text-on-primary-container">Mikindani · Mombasa</span>
            </span>
        </div>

        <div class="relative z-10 my-space-xl hidden max-w-md flex-col gap-space-md lg:flex">
            <span class="inline-flex items-center gap-2 self-start rounded bg-surface-container-highest/10 px-space-sm py-1 font-label-technical text-label-technical uppercase tracking-widest text-on-tertiary-container">
                <span class="material-symbols-outlined text-[16px]" aria-hidden="true">lock</span>
                Private administration
            </span>
            <h2 class="font-headline-xl text-headline-xl font-bold leading-tight text-on-primary">Manage website inquiries in one place.</h2>
            <span class="h-1 w-12 rounded-full bg-on-tertiary-container" aria-hidden="true"></span>
            <p class="font-body-lg text-body-lg text-surface-dim">Review quote requests, follow up with customers and keep the inbox tidy.</p>
        </div>

        <p class="relative z-10 hidden font-label-technical text-label-technical uppercase tracking-widest text-on-primary-container lg:block">Authorised staff only</p>
    </section>

    {{-- Sign-in form --}}
    <section class="flex items-center justify-center px-margin-mobile py-space-xl md:px-margin">
        <div class="w-full max-w-sm">
            <h1 class="font-headline-lg text-headline-lg text-primary">Sign in</h1>
            <span class="mt-space-sm block h-1 w-12 rounded-full bg-on-tertiary-container" aria-hidden="true"></span>
            <p class="mb-space-lg mt-space-sm text-on-surface-variant">Use your administrator account to view the inquiry inbox.</p>

            @error('credentials')
                <div class="mb-space-md flex items-start gap-2 rounded-lg border border-error bg-error-container p-space-md text-body-sm text-on-error-container">
                    <span class="material-symbols-outlined text-[18px]" aria-hidden="true">error</span>
                    <span>{{ $message }}</span>
                </div>
            @enderror

            <form class="flex flex-col gap-space-md" method="POST" action="{{ route('admin.login.submit') }}">
                @csrf

                <div class="flex flex-col gap-1">
                    <label class="font-label-technical text-label-technical uppercase text-secondary" for="email">Email</label>
                    <div class="relative">
                        <span class="material-symbols-outlined pointer-events-none absolute left-3 top-1/2 -translate-y-1/2 text-[20px] text-outline" aria-hidden="true">mail</span>
                        <input class="h-11 w-full rounded-lg border border-outline-variant bg-surface-container-lowest pl-11 pr-3 text-body-md text-on-surface placeholder:text-outline focus:outline-none @error('email') border-error @enderror"
                               id="email" name="email" type="email" autocomplete="username" required autofocus
                               placeholder="admin@sandstormindustries.co.ke" value="{{ old('email') }}">
                    </div>
                    @error('email') <span class="text-body-sm text-error">{{ $message }}</span> @enderror
                </div>

                <div class="flex flex-col gap-1">
                    <label class="font-label-technical text-label-technical uppercase text-secondary" for="password">Password</label>
                    <div class="relative">
                        <span class="material-symbols-outlined pointer-events-none absolute left-3 top-1/2 -translate-y-1/2 text-[20px] text-outline" aria-hidden="true">lock</span>
                        <input class="h-11 w-full rounded-lg border border-outline-variant bg-surface-container-lowest pl-11 pr-11 text-body-md text-on-surface placeholder:text-outline focus:outline-none @error('password') border-error @enderror"
                               id="password" name="password" type="password" autocomplete="current-password" required>
                        <button type="button" data-toggle-password aria-label="Show password"
                                class="absolute right-2 top-1/2 flex h-8 w-8 -translate-y-1/2 items-center justify-center rounded text-outline hover:text-on-surface">
                            <span class="material-symbols-outlined text-[20px]" aria-hidden="true">visibility</span>
                        </button>
                    </div>
                    @error('password') <span class="text-body-sm text-error">{{ $message }}</span> @enderror
                </div>

                <button class="mt-space-sm inline-flex h-[46px] items-center justify-center gap-2 rounded-lg bg-on-tertiary-container px-space-lg font-headline-sm text-body-md font-semibold text-on-primary shadow-sm transition-colors hover:bg-tertiary-container" type="submit">
                    <span>Sign in</span>
                    <span class="material-symbols-outlined text-[18px]" aria-hidden="true">arrow_forward</span>
                </button>
            </form>

        </div>
    </section>
</div>
@endsection

@push('scripts')
<script>
    const toggle = document.querySelector('[data-toggle-password]');
    const passwordInput = document.getElementById('password');

    if (toggle && passwordInput) {
        toggle.addEventListener('click', () => {
            const showing = passwordInput.type === 'password';
            passwordInput.type = showing ? 'text' : 'password';
            toggle.querySelector('.material-symbols-outlined').textContent = showing ? 'visibility_off' : 'visibility';
            toggle.setAttribute('aria-label', showing ? 'Hide password' : 'Show password');
        });
    }
</script>
@endpush
