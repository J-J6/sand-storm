@extends('layouts.admin')

@section('title', 'Admins — Sandstorm Admin')

@section('content')
@php
    $me = auth()->user();
    $inputClass = 'h-11 w-full rounded-lg border border-outline-variant bg-surface-container-lowest px-3 text-body-md text-on-surface placeholder:text-outline focus:outline-none';
    $createErrors = $errors->getBag('createUser');
@endphp

{{-- Page heading --}}
<div class="mb-space-lg flex flex-col items-start gap-space-sm">
    <span class="inline-flex items-center gap-2 rounded bg-surface-container-high px-space-sm py-1 font-label-technical text-label-technical uppercase tracking-widest text-secondary">
        <span class="material-symbols-outlined text-[16px] text-on-tertiary-container" aria-hidden="true">shield_person</span>
        Super admin only
    </span>
    <h1 class="font-headline-lg text-headline-lg text-primary">Admins</h1>
    <span class="h-1 w-12 rounded-full bg-on-tertiary-container" aria-hidden="true"></span>
    <p class="max-w-2xl text-on-surface-variant">Add people who can use this console, reset their passwords, and decide who can delete inquiries and manage other admins.</p>
</div>

@if (session('status'))
    <div class="mb-space-md flex items-center gap-2 rounded border border-emerald-300 bg-emerald-50 p-3 font-label-technical text-label-technical text-emerald-800">
        <span class="material-symbols-outlined text-[18px]" aria-hidden="true">check_circle</span>
        <span>{{ session('status') }}</span>
    </div>
@endif

@if (session('error'))
    <div class="mb-space-md flex items-center gap-2 rounded border border-error bg-error-container p-3 font-label-technical text-label-technical text-on-error-container">
        <span class="material-symbols-outlined text-[18px]" aria-hidden="true">error</span>
        <span>{{ session('error') }}</span>
    </div>
@endif

<div class="grid gap-space-lg lg:grid-cols-3">

    {{-- Add an admin --}}
    <section class="lg:col-span-1">
        <form method="POST" action="{{ route('admin.users.store') }}" class="flex flex-col gap-space-md rounded-lg border border-outline-variant/40 bg-surface-container-lowest p-space-lg shadow-sm">
            @csrf
            <h2 class="font-headline-sm text-headline-sm text-primary">Add an admin</h2>

            <div class="flex flex-col gap-1">
                <label class="font-label-technical text-label-technical uppercase text-secondary" for="new-name">Full name</label>
                <input class="{{ $inputClass }}" id="new-name" name="name" type="text" required value="{{ old('name') }}">
                @if ($createErrors->has('name')) <span class="text-body-sm text-error">{{ $createErrors->first('name') }}</span> @endif
            </div>

            <div class="flex flex-col gap-1">
                <label class="font-label-technical text-label-technical uppercase text-secondary" for="new-email">Email</label>
                <input class="{{ $inputClass }}" id="new-email" name="email" type="email" required value="{{ old('email') }}">
                @if ($createErrors->has('email')) <span class="text-body-sm text-error">{{ $createErrors->first('email') }}</span> @endif
            </div>

            <div class="flex flex-col gap-1">
                <label class="font-label-technical text-label-technical uppercase text-secondary" for="new-role">Role</label>
                <select class="{{ $inputClass }}" id="new-role" name="role">
                    <option value="admin" @selected(old('role', 'admin') === 'admin')>Admin — view, search and reply</option>
                    <option value="super_admin" @selected(old('role') === 'super_admin')>Super admin — also delete and manage admins</option>
                </select>
                @if ($createErrors->has('role')) <span class="text-body-sm text-error">{{ $createErrors->first('role') }}</span> @endif
            </div>

            <div class="flex flex-col gap-1">
                <label class="font-label-technical text-label-technical uppercase text-secondary" for="new-password">Password</label>
                <div class="flex gap-space-sm">
                    <input class="{{ $inputClass }} min-w-0 flex-1" id="new-password" name="password" type="text" required minlength="12" autocomplete="off">
                    <button type="button" data-generate-for="new-password" class="inline-flex h-11 shrink-0 items-center gap-1 rounded-lg border border-outline-variant px-space-md font-body-sm text-body-sm font-medium text-primary hover:bg-surface-container-low">
                        <span class="material-symbols-outlined text-[18px]" aria-hidden="true">autorenew</span> Generate
                    </button>
                </div>
                <p class="font-body-sm text-body-sm text-on-surface-variant">At least 12 characters. Pass it on through a secure channel.</p>
                @if ($createErrors->has('password')) <span class="text-body-sm text-error">{{ $createErrors->first('password') }}</span> @endif
            </div>

            <button type="submit" class="inline-flex h-[46px] items-center justify-center gap-2 rounded-lg bg-on-tertiary-container px-space-lg font-headline-sm text-body-md font-semibold text-on-primary shadow-sm transition-colors hover:bg-tertiary-container">
                <span class="material-symbols-outlined text-[18px]" aria-hidden="true">person_add</span>
                Add admin
            </button>
        </form>
    </section>

    {{-- Everyone with access --}}
    <section class="lg:col-span-2">
        <p class="mb-space-sm font-body-md text-on-surface-variant">
            <span class="font-semibold text-primary">{{ $users->count() }}</span> {{ \Illuminate\Support\Str::plural('account', $users->count()) }} can sign in
        </p>

        <ul class="divide-y divide-outline-variant/40 rounded-lg border border-outline-variant/50 bg-surface-container-lowest shadow-sm">
            @foreach ($users as $user)
                @php $isMe = $user->is($me); @endphp
                <li class="flex flex-col gap-space-sm p-space-md xl:flex-row xl:items-center xl:justify-between">
                    <div class="min-w-0">
                        <div class="flex flex-wrap items-center gap-2">
                            <span class="font-headline-sm text-body-md font-semibold text-primary">{{ $user->name }}</span>
                            @if ($isMe)
                                <span class="rounded bg-on-tertiary-container/10 px-2 py-0.5 font-label-technical text-label-technical uppercase text-on-tertiary-container">You</span>
                            @endif
                            <span class="rounded px-2 py-0.5 font-label-technical text-label-technical uppercase {{ $user->isSuperAdmin() ? 'bg-primary text-on-primary' : 'bg-surface-container-high text-on-surface-variant' }}">
                                {{ $user->isSuperAdmin() ? 'Super admin' : 'Admin' }}
                            </span>
                        </div>
                        <p class="mt-1 break-all font-body-sm text-body-sm text-secondary">{{ $user->email }}</p>
                        <p class="mt-1 font-label-technical text-label-technical text-outline">Added {{ $user->created_at?->format('M j, Y') ?? '—' }}</p>
                    </div>

                    <div class="flex flex-wrap gap-space-sm xl:shrink-0 xl:justify-end">
                        <button type="button" data-reset-url="{{ route('admin.users.password', $user) }}" data-reset-name="{{ $user->name }}"
                                class="inline-flex h-9 items-center gap-1 rounded-lg border border-outline-variant px-space-sm font-body-sm text-body-sm font-medium text-primary hover:bg-surface-container-low">
                            <span class="material-symbols-outlined text-[18px]" aria-hidden="true">key</span> Reset password
                        </button>

                        @unless ($isMe)
                            <button type="button"
                                    data-confirm-url="{{ route('admin.users.role', $user) }}"
                                    data-confirm-method="PATCH"
                                    data-confirm-role="{{ $user->isSuperAdmin() ? 'admin' : 'super_admin' }}"
                                    data-confirm-title="{{ $user->isSuperAdmin() ? 'Make '.$user->name.' a plain admin?' : 'Make '.$user->name.' a super admin?' }}"
                                    data-confirm-text="{{ $user->isSuperAdmin() ? 'They will no longer be able to delete inquiries or manage admins.' : 'They will be able to delete inquiries and manage other admins.' }}"
                                    data-confirm-button="Change role"
                                    data-confirm-tone="primary"
                                    class="inline-flex h-9 items-center gap-1 rounded-lg border border-outline-variant px-space-sm font-body-sm text-body-sm font-medium text-primary hover:bg-surface-container-low">
                                <span class="material-symbols-outlined text-[18px]" aria-hidden="true">swap_horiz</span>
                                {{ $user->isSuperAdmin() ? 'Make admin' : 'Make super admin' }}
                            </button>

                            <button type="button"
                                    data-confirm-url="{{ route('admin.users.destroy', $user) }}"
                                    data-confirm-method="DELETE"
                                    data-confirm-role=""
                                    data-confirm-title="Remove {{ $user->name }}?"
                                    data-confirm-text="Their account will be deleted and they will be signed out immediately."
                                    data-confirm-button="Remove admin"
                                    data-confirm-tone="danger"
                                    class="inline-flex h-9 items-center gap-1 rounded-lg border border-error/40 px-space-sm font-body-sm text-body-sm font-medium text-error hover:bg-error-container">
                                <span class="material-symbols-outlined text-[18px]" aria-hidden="true">person_remove</span> Remove
                            </button>
                        @endunless
                    </div>
                </li>
            @endforeach
        </ul>
    </section>
</div>

{{-- Reset password dialog --}}
<dialog id="reset-dialog" class="w-[calc(100%-2rem)] max-w-md rounded-xl border border-outline-variant/40 bg-surface-container-lowest p-0 text-on-surface shadow-2xl backdrop:bg-primary/60">
    <form id="reset-form" method="POST" action="" class="flex flex-col gap-space-md p-space-lg">
        @csrf
        @method('PATCH')
        <div>
            <h2 class="font-headline-sm text-headline-sm text-primary">Reset password</h2>
            <p class="mt-1 text-body-md text-on-surface-variant">Set a new password for <strong class="text-primary" data-reset-label></strong>. They will be signed out everywhere.</p>
        </div>
        <div class="flex gap-space-sm">
            <input class="{{ $inputClass }} min-w-0 flex-1" id="reset-password" name="password" type="text" required minlength="12" autocomplete="off" placeholder="At least 12 characters">
            <button type="button" data-generate-for="reset-password" class="inline-flex h-11 shrink-0 items-center gap-1 rounded-lg border border-outline-variant px-space-md font-body-sm text-body-sm font-medium text-primary hover:bg-surface-container-low">
                <span class="material-symbols-outlined text-[18px]" aria-hidden="true">autorenew</span> Generate
            </button>
        </div>
        <div class="flex flex-wrap justify-end gap-space-sm">
            <button type="button" data-dialog-cancel class="inline-flex h-10 items-center rounded-lg border border-outline-variant px-space-md font-body-md text-on-surface-variant hover:bg-surface-container-low">Cancel</button>
            <button type="submit" class="inline-flex h-10 items-center gap-1.5 rounded-lg bg-primary px-space-md font-body-md font-semibold text-on-primary hover:bg-primary-container">
                <span class="material-symbols-outlined text-[18px]" aria-hidden="true">key</span> Save password
            </button>
        </div>
    </form>
</dialog>

{{-- Confirm dialog (role change and removal) --}}
<dialog id="confirm-dialog" class="w-[calc(100%-2rem)] max-w-md rounded-xl border border-outline-variant/40 bg-surface-container-lowest p-0 text-on-surface shadow-2xl backdrop:bg-primary/60">
    <form id="confirm-form" method="POST" action="" class="flex flex-col gap-space-md p-space-lg">
        @csrf
        <input type="hidden" name="_method" id="confirm-method" value="DELETE">
        <input type="hidden" name="role" id="confirm-role" value="">
        <div class="flex items-start gap-space-md">
            <span class="flex h-11 w-11 shrink-0 items-center justify-center rounded-lg bg-surface-container-high text-primary">
                <span class="material-symbols-outlined text-[22px]" aria-hidden="true">shield_person</span>
            </span>
            <div>
                <h2 class="font-headline-sm text-headline-sm text-primary" id="confirm-title"></h2>
                <p class="mt-1 text-body-md text-on-surface-variant" id="confirm-text"></p>
            </div>
        </div>
        <div class="flex flex-wrap justify-end gap-space-sm">
            <button type="button" data-dialog-cancel class="inline-flex h-10 items-center rounded-lg border border-outline-variant px-space-md font-body-md text-on-surface-variant hover:bg-surface-container-low">Cancel</button>
            <button type="submit" id="confirm-submit" class="inline-flex h-10 items-center rounded-lg bg-error px-space-md font-body-md font-semibold text-on-error hover:opacity-90"></button>
        </div>
    </form>
</dialog>
@endsection

@push('scripts')
<script>
    const randomPassword = (length = 16) => {
        const chars = 'ABCDEFGHJKLMNPQRSTUVWXYZabcdefghijkmnopqrstuvwxyz23456789';
        const values = new Uint32Array(length);
        crypto.getRandomValues(values);
        return Array.from(values, (value) => chars[value % chars.length]).join('');
    };

    document.querySelectorAll('[data-generate-for]').forEach((button) => {
        button.addEventListener('click', () => {
            const input = document.getElementById(button.dataset.generateFor);
            input.value = randomPassword();
            input.focus();
        });
    });

    const resetDialog = document.getElementById('reset-dialog');
    const resetForm = document.getElementById('reset-form');

    document.querySelectorAll('[data-reset-url]').forEach((button) => {
        button.addEventListener('click', () => {
            resetForm.action = button.dataset.resetUrl;
            resetDialog.querySelector('[data-reset-label]').textContent = button.dataset.resetName;
            document.getElementById('reset-password').value = '';
            resetDialog.showModal();
        });
    });

    const confirmDialog = document.getElementById('confirm-dialog');
    const confirmForm = document.getElementById('confirm-form');
    const confirmSubmit = document.getElementById('confirm-submit');

    document.querySelectorAll('[data-confirm-url]').forEach((button) => {
        button.addEventListener('click', () => {
            confirmForm.action = button.dataset.confirmUrl;
            document.getElementById('confirm-method').value = button.dataset.confirmMethod;
            document.getElementById('confirm-role').value = button.dataset.confirmRole;
            document.getElementById('confirm-title').textContent = button.dataset.confirmTitle;
            document.getElementById('confirm-text').textContent = button.dataset.confirmText;
            confirmSubmit.textContent = button.dataset.confirmButton;

            const danger = button.dataset.confirmTone === 'danger';
            confirmSubmit.classList.toggle('bg-error', danger);
            confirmSubmit.classList.toggle('text-on-error', danger);
            confirmSubmit.classList.toggle('bg-primary', !danger);
            confirmSubmit.classList.toggle('text-on-primary', !danger);

            confirmDialog.showModal();
        });
    });

    [resetDialog, confirmDialog].forEach((dialog) => {
        dialog.querySelectorAll('[data-dialog-cancel]').forEach((button) => {
            button.addEventListener('click', () => dialog.close());
        });
        dialog.addEventListener('click', (event) => {
            if (event.target === dialog) {
                dialog.close();
            }
        });
    });
</script>
@endpush
