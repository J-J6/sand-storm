@extends('layouts.admin')

@section('title', 'Admin Sign In — Sandstorm Industries')

@section('content')
<section class="w-full">
    <div class="mx-auto w-full max-w-sm rounded-lg border border-outline-variant/40 bg-surface-container-lowest p-space-lg shadow-sm">
        <div class="mb-space-lg flex items-center justify-center gap-2 text-primary">
            <svg aria-hidden="true" class="h-5 w-5 text-secondary" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round">
                <rect x="4.5" y="10" width="15" height="11" rx="2" />
                <path d="M8 10V7a4 4 0 0 1 8 0v3" />
                <path d="M12 14.5v2" />
            </svg>
            <h1 class="font-headline-sm">Sign in</h1>
        </div>

        @error('credentials')
            <p class="mb-space-md rounded-lg border border-error bg-error-container p-space-md text-body-sm text-on-error-container">{{ $message }}</p>
        @enderror

        <form class="flex flex-col gap-space-md" method="POST" action="{{ route('admin.login.submit') }}">
            @csrf
            <div class="flex flex-col gap-1">
                <label class="font-label-technical text-label-technical uppercase text-secondary" for="username">Username</label>
                <input class="h-11 rounded-lg border border-outline-variant bg-surface-container-lowest px-3 text-body-md text-on-surface placeholder:text-outline focus:outline-none focus:border-primary" id="username" name="username" autocomplete="username" required value="{{ old('username') }}" autofocus>
                @error('username') <span class="text-error text-body-sm">{{ $message }}</span> @enderror
            </div>
            <div class="flex flex-col gap-1">
                <label class="font-label-technical text-label-technical uppercase text-secondary" for="password">Password</label>
                <input class="h-11 rounded-lg border border-outline-variant bg-surface-container-lowest px-3 text-body-md text-on-surface placeholder:text-outline focus:outline-none focus:border-primary" id="password" name="password" type="password" autocomplete="current-password" required>
                @error('password') <span class="text-error text-body-sm">{{ $message }}</span> @enderror
            </div>
            <button class="inline-flex h-11 items-center justify-center rounded-lg bg-on-tertiary-container px-space-lg font-headline-sm text-body-md font-semibold text-on-primary shadow-sm transition-colors hover:bg-tertiary-container" type="submit">Sign in</button>
        </form>
    </div>
</section>
@endsection
