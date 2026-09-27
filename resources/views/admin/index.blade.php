@extends('layouts.admin')

@section('title', 'Inquiry Inbox — Sandstorm Admin')

@section('content')
<section class="w-full">
    <div class="mx-auto max-w-6xl">
        <header class="mb-space-lg flex flex-col gap-space-md border-b border-outline-variant/60 pb-space-lg sm:flex-row sm:items-center sm:justify-between">
            <div>
                <p class="mb-space-sm inline-flex items-center gap-2 rounded bg-surface-container-high px-2 py-1 font-label-technical text-label-technical uppercase tracking-wider text-secondary">
                    <svg aria-hidden="true" class="h-4 w-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.7" stroke-linecap="round" stroke-linejoin="round">
                        <rect x="4.5" y="10" width="15" height="11" rx="2" />
                        <path d="M8 10V7a4 4 0 0 1 8 0v3" />
                    </svg>
                    Private administration
                </p>
                <h1 class="font-headline-lg text-on-surface">Website inquiries</h1>
                <p class="mt-1 font-body-md text-on-surface-variant">Review and follow up on requests sent through the Sandstorm website.</p>
            </div>
            <form class="shrink-0" method="POST" action="{{ route('admin.logout') }}">
                @csrf
                <button class="inline-flex h-10 items-center justify-center rounded-lg border border-outline-variant bg-surface-container-lowest px-space-md font-body-md font-medium text-primary shadow-sm transition-colors hover:bg-surface-container-low" type="submit">Sign out</button>
            </form>
        </header>

        <div class="mb-space-md flex flex-wrap items-center justify-between gap-space-sm">
            <p class="inline-flex items-center gap-2 font-body-md text-on-surface-variant">
                <span class="inline-flex min-w-7 items-center justify-center rounded-full bg-surface-container-high px-2 py-1 font-label-technical text-label-technical text-primary">{{ $inquiries->total() }}</span>
                {{ \Illuminate\Support\Str::plural('inquiry', $inquiries->total()) }} received
            </p>
            <span class="font-label-technical text-label-technical uppercase tracking-wider text-secondary">Newest first</span>
        </div>

        @if ($inquiries->isEmpty())
            <div class="rounded-lg border border-outline-variant/50 bg-surface-container-lowest px-space-lg py-space-xl text-center shadow-sm">
                <svg aria-hidden="true" class="mx-auto mb-space-sm h-8 w-8 text-secondary" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
                    <rect x="3.5" y="5.5" width="17" height="13" rx="2" />
                    <path d="m4.5 7 7.5 5.5L19.5 7" />
                </svg>
                <h2 class="font-headline-sm text-on-surface">No inquiries yet</h2>
                <p class="mt-1 font-body-md text-on-surface-variant">New website requests will appear here.</p>
            </div>
        @else
            <div class="space-y-space-sm md:hidden">
                @foreach ($inquiries as $inquiry)
                    <article class="rounded-lg border border-outline-variant/50 bg-surface-container-lowest p-space-md shadow-sm">
                        <div class="flex flex-col gap-1 border-b border-outline-variant/40 pb-space-sm">
                            <div class="flex flex-wrap items-start justify-between gap-2">
                                <h2 class="font-headline-sm text-on-surface">{{ $inquiry->full_name }}</h2>
                                <time class="font-label-technical text-label-technical text-secondary" datetime="{{ $inquiry->created_at->toIso8601String() }}">{{ $inquiry->created_at->format('M j, Y · H:i') }}</time>
                            </div>
                            <a class="break-all font-body-sm text-secondary underline underline-offset-2" href="mailto:{{ $inquiry->email }}">{{ $inquiry->email }}</a>
                        </div>
                        <dl class="grid grid-cols-2 gap-space-sm py-space-sm font-body-sm">
                            <div><dt class="font-label-technical text-label-technical uppercase text-secondary">Organization</dt><dd class="mt-1 text-on-surface-variant">{{ $inquiry->organization }}</dd></div>
                            <div><dt class="font-label-technical text-label-technical uppercase text-secondary">Service</dt><dd class="mt-1 text-on-surface-variant">{{ str($inquiry->service_interest)->replace('-', ' ')->headline() }}</dd></div>
                        </dl>
                        @if ($inquiry->message)
                            <div class="border-t border-outline-variant/40 pt-space-sm">
                                <p class="mb-1 font-label-technical text-label-technical uppercase text-secondary">Message</p>
                                <p class="whitespace-pre-line break-words font-body-sm text-on-surface-variant">{{ $inquiry->message }}</p>
                            </div>
                        @endif
                    </article>
                @endforeach
            </div>

            <div class="hidden overflow-x-auto rounded-lg border border-outline-variant/50 bg-surface-container-lowest shadow-sm md:block">
                <table class="w-full min-w-[760px] table-fixed border-collapse text-left">
                    <colgroup>
                        <col class="w-[145px]">
                        <col class="w-[225px]">
                        <col class="w-[155px]">
                        <col class="w-[170px]">
                        <col>
                    </colgroup>
                    <thead class="bg-surface-container-low">
                        <tr class="font-label-technical text-label-technical uppercase tracking-wider text-secondary">
                            <th class="px-space-md py-space-sm font-medium">Received</th>
                            <th class="px-space-md py-space-sm font-medium">Contact</th>
                            <th class="px-space-md py-space-sm font-medium">Organization</th>
                            <th class="px-space-md py-space-sm font-medium">Service</th>
                            <th class="px-space-md py-space-sm font-medium">Message</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-outline-variant/40">
                        @foreach ($inquiries as $inquiry)
                            <tr class="align-top font-body-sm text-on-surface-variant transition-colors hover:bg-surface-container-low/70">
                                <td class="px-space-md py-space-md"><time datetime="{{ $inquiry->created_at->toIso8601String() }}">{{ $inquiry->created_at->format('M j, Y') }}<span class="mt-1 block text-secondary">{{ $inquiry->created_at->format('H:i') }}</span></time></td>
                                <td class="px-space-md py-space-md"><div class="font-medium text-on-surface">{{ $inquiry->full_name }}</div><a class="mt-1 block break-all text-secondary underline underline-offset-2" href="mailto:{{ $inquiry->email }}">{{ $inquiry->email }}</a></td>
                                <td class="break-words px-space-md py-space-md">{{ $inquiry->organization }}</td>
                                <td class="px-space-md py-space-md"><span class="inline-flex rounded bg-surface-container-high px-2 py-1 text-on-surface-variant">{{ str($inquiry->service_interest)->replace('-', ' ')->headline() }}</span></td>
                                <td class="whitespace-pre-line break-words px-space-md py-space-md">{{ $inquiry->message ?: '—' }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @endif

        @if ($inquiries->hasPages())
            <nav class="mt-space-md" aria-label="Inquiry pages">{{ $inquiries->links() }}</nav>
        @endif
    </div>
</section>
@endsection
