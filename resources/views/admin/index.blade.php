@extends('layouts.admin')

@section('title', 'Inquiry Inbox — Sandstorm Admin')

@section('content')
@php
    $canDelete = auth()->user()->isSuperAdmin();
    $isJobs = ($type ?? 'inquiries') === 'jobs';
    $typeParam = $isJobs ? ['type' => 'jobs'] : [];
    $filtered = filled(request('q')) || (! $isJobs && filled(request('service')));
    $stats = [
        ['label' => $isJobs ? 'Total applications' : 'Total inquiries', 'value' => $stats['total'], 'icon' => 'inbox'],
        ['label' => 'Received today', 'value' => $stats['today'], 'icon' => 'today'],
        ['label' => 'Last 7 days', 'value' => $stats['week'], 'icon' => 'date_range'],
    ];
@endphp

{{-- Page heading --}}
<div class="mb-space-lg flex flex-col items-start gap-space-sm">
    <span class="inline-flex items-center gap-2 rounded bg-surface-container-high px-space-sm py-1 font-label-technical text-label-technical uppercase tracking-widest text-secondary">
        <span class="material-symbols-outlined text-[16px] text-on-tertiary-container" aria-hidden="true">lock</span>
        Private administration
    </span>
    <h1 class="font-headline-lg text-headline-lg text-primary">{{ $isJobs ? 'Job applications' : 'Website inquiries' }}</h1>
    <span class="h-1 w-12 rounded-full bg-on-tertiary-container" aria-hidden="true"></span>
    <p class="max-w-2xl text-on-surface-variant">{{ $isJobs ? 'Review job applications sent through the Join Our Team form.' : 'Review and follow up on requests sent through the Sandstorm website.' }}</p>
</div>

@if (session('status'))
    <div class="mb-space-md flex items-center gap-2 rounded border border-emerald-300 bg-emerald-50 p-3 font-label-technical text-label-technical text-emerald-800">
        <span class="material-symbols-outlined text-[18px]" aria-hidden="true">check_circle</span>
        <span>{{ session('status') }}</span>
    </div>
@endif

{{-- Section switcher: service inquiries and job applications stand on their own --}}
<div class="mb-space-lg grid grid-cols-1 gap-space-md sm:grid-cols-2">
    <a href="{{ route('admin.index') }}"
       class="flex items-center gap-space-md rounded-lg border bg-surface-container-lowest p-space-lg shadow-sm transition-colors {{ $isJobs ? 'border-outline-variant/40 hover:bg-surface-container-low' : 'border-primary ring-2 ring-primary/20' }}">
        <span class="flex h-11 w-11 shrink-0 items-center justify-center rounded-lg {{ $isJobs ? 'bg-surface-container-high text-primary' : 'bg-primary text-on-primary' }}">
            <span class="material-symbols-outlined text-[22px]" aria-hidden="true">inbox</span>
        </span>
        <div>
            <p class="font-label-technical text-label-technical uppercase tracking-wider text-secondary">Service inquiries</p>
            <p class="font-metric-display text-metric-display text-primary">{{ $counts['inquiries'] }}</p>
        </div>
    </a>
    <a href="{{ route('admin.index', ['type' => 'jobs']) }}"
       class="flex items-center gap-space-md rounded-lg border bg-surface-container-lowest p-space-lg shadow-sm transition-colors {{ $isJobs ? 'border-primary ring-2 ring-primary/20' : 'border-outline-variant/40 hover:bg-surface-container-low' }}">
        <span class="flex h-11 w-11 shrink-0 items-center justify-center rounded-lg {{ $isJobs ? 'bg-primary text-on-primary' : 'bg-surface-container-high text-primary' }}">
            <span class="material-symbols-outlined text-[22px]" aria-hidden="true">work</span>
        </span>
        <div>
            <p class="font-label-technical text-label-technical uppercase tracking-wider text-secondary">Job applications</p>
            <p class="font-metric-display text-metric-display text-primary">{{ $counts['jobs'] }}</p>
        </div>
    </a>
</div>

{{-- Stat cards --}}
<div class="mb-space-lg grid grid-cols-1 gap-space-md sm:grid-cols-3">
    @foreach ($stats as $stat)
        <div class="flex items-center gap-space-md rounded-lg border border-outline-variant/40 bg-surface-container-lowest p-space-lg shadow-sm">
            <span class="flex h-11 w-11 shrink-0 items-center justify-center rounded-lg bg-primary text-on-primary">
                <span class="material-symbols-outlined text-[22px]" aria-hidden="true">{{ $stat['icon'] }}</span>
            </span>
            <div>
                <p class="font-label-technical text-label-technical uppercase tracking-wider text-secondary">{{ $stat['label'] }}</p>
                <p class="font-metric-display text-metric-display text-primary">{{ $stat['value'] }}</p>
            </div>
        </div>
    @endforeach
</div>

{{-- Search and filter --}}
<form method="GET" action="{{ route('admin.index') }}" class="mb-space-md flex flex-col gap-space-sm rounded-lg border border-outline-variant/40 bg-surface-container-lowest p-space-md shadow-sm md:flex-row md:items-center">
    @if ($isJobs)
        <input type="hidden" name="type" value="jobs">
    @endif
    <div class="relative flex-1">
        <span class="material-symbols-outlined pointer-events-none absolute left-3 top-1/2 -translate-y-1/2 text-[20px] text-outline" aria-hidden="true">search</span>
        <input class="h-11 w-full rounded-lg border border-outline-variant bg-surface-container-lowest pl-11 pr-3 text-body-md text-on-surface placeholder:text-outline focus:outline-none"
               type="search" name="q" value="{{ request('q') }}" placeholder="Search name, organization, email or message">
    </div>
    @unless ($isJobs)
    <select name="service" class="h-11 rounded-lg border border-outline-variant bg-surface-container-lowest px-3 text-body-md text-on-surface focus:outline-none md:w-56">
        <option value="">All services</option>
        @foreach ($serviceLabels as $value => $label)
            <option value="{{ $value }}" @selected(request('service') === $value)>{{ $label }}</option>
        @endforeach
    </select>
    @endunless
    <div class="flex gap-space-sm">
        <button type="submit" class="inline-flex h-11 items-center justify-center gap-1.5 rounded-lg bg-primary px-space-lg font-body-md font-medium text-on-primary transition-colors hover:bg-primary-container">
            <span class="material-symbols-outlined text-[18px]" aria-hidden="true">filter_list</span>
            Filter
        </button>
        @if ($filtered)
            <a href="{{ route('admin.index', $typeParam) }}" class="inline-flex h-11 items-center justify-center rounded-lg border border-outline-variant px-space-md font-body-md text-on-surface-variant transition-colors hover:bg-surface-container-low">Clear</a>
        @endif
    </div>
</form>

<div class="mb-space-sm flex flex-wrap items-center justify-between gap-space-sm">
    <p class="font-body-md text-on-surface-variant">
        Showing <span class="font-semibold text-primary">{{ $inquiries->total() }}</span>
        {{ \Illuminate\Support\Str::plural($isJobs ? 'application' : 'inquiry', $inquiries->total()) }}{{ $filtered ? ' matching your filter' : '' }}
    </p>
    <span class="font-label-technical text-label-technical uppercase tracking-wider text-secondary">Newest first</span>
</div>

@if ($inquiries->isEmpty())
    <div class="rounded-lg border border-outline-variant/50 bg-surface-container-lowest px-space-lg py-space-xl text-center shadow-sm">
        <span class="material-symbols-outlined mb-space-sm text-[36px] text-secondary" aria-hidden="true">{{ $filtered ? 'search_off' : 'mail' }}</span>
        <h2 class="font-headline-sm text-headline-sm text-primary">{{ $filtered ? 'Nothing matches your search' : ($isJobs ? 'No job applications yet' : 'No inquiries yet') }}</h2>
        <p class="mt-1 text-on-surface-variant">{{ $filtered ? 'Try a different search or clear the filter.' : ($isJobs ? 'Applications from the Join Our Team form will appear here.' : 'New website requests will appear here.') }}</p>
    </div>
@else
    {{-- Mobile cards --}}
    <div class="space-y-space-sm md:hidden">
        @foreach ($inquiries as $inquiry)
            <article class="rounded-lg border border-outline-variant/50 bg-surface-container-lowest p-space-md shadow-sm">
                <div class="flex flex-col gap-1 border-b border-outline-variant/40 pb-space-sm">
                    <div class="flex flex-wrap items-start justify-between gap-2">
                        <h2 class="font-headline-sm text-headline-sm text-primary">{{ $inquiry->full_name }}</h2>
                        <time class="font-label-technical text-label-technical text-secondary" datetime="{{ $inquiry->created_at->toIso8601String() }}">{{ $inquiry->created_at->format('M j, Y · H:i') }}</time>
                    </div>
                    <a class="break-all font-body-sm text-secondary underline underline-offset-2" href="mailto:{{ $inquiry->email }}">{{ $inquiry->email }}</a>
                </div>
                @unless ($isJobs)
                <dl class="grid grid-cols-2 gap-space-sm py-space-sm font-body-sm">
                    <div>
                        <dt class="font-label-technical text-label-technical uppercase text-secondary">Organization</dt>
                        <dd class="mt-1 text-on-surface-variant">{{ $inquiry->organization }}</dd>
                    </div>
                    <div>
                        <dt class="font-label-technical text-label-technical uppercase text-secondary">Service</dt>
                        <dd class="mt-1 text-on-surface-variant">{{ $serviceLabels[$inquiry->service_interest] ?? $inquiry->service_interest }}</dd>
                    </div>
                </dl>
                @endunless
                @if ($inquiry->message)
                    <div class="border-t border-outline-variant/40 pt-space-sm">
                        <p class="mb-1 font-label-technical text-label-technical uppercase text-secondary">Message</p>
                        <p class="whitespace-pre-line break-words font-body-sm text-on-surface-variant">{{ $inquiry->message }}</p>
                    </div>
                @endif
                <div class="mt-space-sm flex gap-space-sm border-t border-outline-variant/40 pt-space-sm">
                    <a href="mailto:{{ $inquiry->email }}?subject={{ rawurlencode($isJobs ? 'Re: your Sandstorm job application' : 'Re: your Sandstorm inquiry') }}" class="inline-flex h-10 flex-1 items-center justify-center gap-1.5 rounded-lg bg-primary font-body-sm font-medium text-on-primary hover:bg-primary-container">
                        <span class="material-symbols-outlined text-[18px]" aria-hidden="true">reply</span> Reply
                    </a>
                    @if ($canDelete)
                        <button type="button" data-delete-url="{{ route('admin.inquiries.destroy', $inquiry) }}" data-delete-name="{{ $inquiry->full_name }}"
                                class="inline-flex h-10 flex-1 items-center justify-center gap-1.5 rounded-lg border border-error/40 font-body-sm font-medium text-error hover:bg-error-container">
                            <span class="material-symbols-outlined text-[18px]" aria-hidden="true">delete</span> Delete
                        </button>
                    @endif
                </div>
            </article>
        @endforeach
    </div>

    {{-- Desktop table --}}
    <div class="hidden overflow-x-auto rounded-lg border border-outline-variant/50 bg-surface-container-lowest shadow-sm md:block">
        <table class="w-full min-w-[700px] border-collapse text-left">
            <thead class="bg-primary text-on-primary">
                <tr class="font-label-technical text-label-technical uppercase tracking-wider">
                    <th class="px-space-md py-space-sm font-medium">Received</th>
                    <th class="px-space-md py-space-sm font-medium">Contact</th>
                    @unless ($isJobs)
                    <th class="px-space-md py-space-sm font-medium">Organization</th>
                    @endunless
                    @unless ($isJobs)
                    <th class="px-space-md py-space-sm font-medium">Service</th>
                    @endunless
                    <th class="px-space-md py-space-sm font-medium">Message</th>
                    <th class="px-space-md py-space-sm text-right font-medium">Actions</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-outline-variant/40">
                @foreach ($inquiries as $inquiry)
                    <tr class="align-top font-body-sm text-on-surface-variant transition-colors hover:bg-surface-container-low/70">
                        <td class="whitespace-nowrap px-space-md py-space-md">
                            <time datetime="{{ $inquiry->created_at->toIso8601String() }}">
                                {{ $inquiry->created_at->format('M j, Y') }}
                                <span class="mt-1 block text-secondary">{{ $inquiry->created_at->format('H:i') }}</span>
                            </time>
                        </td>
                        <td class="px-space-md py-space-md">
                            <div class="font-medium text-primary">{{ $inquiry->full_name }}</div>
                            <a class="mt-1 block break-all text-secondary underline underline-offset-2" href="mailto:{{ $inquiry->email }}">{{ $inquiry->email }}</a>
                        </td>
                        @unless ($isJobs)
                        <td class="break-words px-space-md py-space-md">{{ $inquiry->organization }}</td>
                        <td class="px-space-md py-space-md">
                            <span class="inline-flex rounded bg-surface-container-high px-2 py-1 text-on-surface-variant">{{ $serviceLabels[$inquiry->service_interest] ?? $inquiry->service_interest }}</span>
                        </td>
                        @endunless
                        <td class="max-w-sm whitespace-pre-line break-words px-space-md py-space-md">{{ $inquiry->message ?: '—' }}</td>
                        <td class="whitespace-nowrap px-space-md py-space-md text-right">
                            <a href="mailto:{{ $inquiry->email }}?subject={{ rawurlencode($isJobs ? 'Re: your Sandstorm job application' : 'Re: your Sandstorm inquiry') }}" class="inline-flex h-9 items-center gap-1 rounded-lg px-space-sm font-medium text-primary hover:bg-surface-container-high">
                                <span class="material-symbols-outlined text-[18px]" aria-hidden="true">reply</span> Reply
                            </a>
                            @if ($canDelete)
                                <button type="button" data-delete-url="{{ route('admin.inquiries.destroy', $inquiry) }}" data-delete-name="{{ $inquiry->full_name }}"
                                        class="inline-flex h-9 items-center gap-1 rounded-lg px-space-sm font-medium text-error hover:bg-error-container">
                                    <span class="material-symbols-outlined text-[18px]" aria-hidden="true">delete</span> Delete
                                </button>
                            @endif
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    @if ($inquiries->hasPages())
        <nav class="mt-space-md" aria-label="Inquiry pages">{{ $inquiries->links() }}</nav>
    @endif
@endif

@if ($canDelete)
    {{-- Delete confirmation --}}
    <dialog id="delete-dialog" class="w-[calc(100%-2rem)] max-w-md rounded-xl border border-outline-variant/40 bg-surface-container-lowest p-0 text-on-surface shadow-2xl backdrop:bg-primary/60">
        <form id="delete-form" method="POST" action="" class="flex flex-col gap-space-md p-space-lg">
            @csrf
            @method('DELETE')
            <div class="flex items-start gap-space-md">
                <span class="flex h-11 w-11 shrink-0 items-center justify-center rounded-lg bg-error-container text-error">
                    <span class="material-symbols-outlined text-[22px]" aria-hidden="true">warning</span>
                </span>
                <div>
                    <h2 class="font-headline-sm text-headline-sm text-primary">Delete this inquiry?</h2>
                    <p class="mt-1 text-body-md text-on-surface-variant">
                        The inquiry from <strong class="text-primary" data-delete-label></strong> will be permanently removed. This cannot be undone.
                    </p>
                </div>
            </div>
            <div class="flex justify-end gap-space-sm">
                <button type="button" data-delete-cancel class="inline-flex h-10 items-center rounded-lg border border-outline-variant px-space-md font-body-md text-on-surface-variant hover:bg-surface-container-low">Cancel</button>
                <button type="submit" class="inline-flex h-10 items-center gap-1.5 rounded-lg bg-error px-space-md font-body-md font-semibold text-on-error hover:opacity-90">
                    <span class="material-symbols-outlined text-[18px]" aria-hidden="true">delete</span> Delete permanently
                </button>
            </div>
        </form>
    </dialog>
@endif
@endsection

@if ($canDelete)
    @push('scripts')
    <script>
        const deleteDialog = document.getElementById('delete-dialog');
        const deleteForm = document.getElementById('delete-form');
        const deleteLabel = deleteDialog.querySelector('[data-delete-label]');

        document.querySelectorAll('[data-delete-url]').forEach((button) => {
            button.addEventListener('click', () => {
                deleteForm.action = button.dataset.deleteUrl;
                deleteLabel.textContent = button.dataset.deleteName;
                deleteDialog.showModal();
            });
        });

        deleteDialog.querySelector('[data-delete-cancel]').addEventListener('click', () => deleteDialog.close());
        deleteDialog.addEventListener('click', (event) => {
            if (event.target === deleteDialog) {
                deleteDialog.close();
            }
        });
    </script>
    @endpush
@endif