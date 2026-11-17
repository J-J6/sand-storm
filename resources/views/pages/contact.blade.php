@extends('layouts.app')

@section('title', 'Contact Sandstorm Industries — Mombasa')

@section('content')

{{-- Contact Section --}}
<section class="w-full py-space-xl md:py-section bg-surface" id="contact">
    <div class="max-w-[1440px] mx-auto px-margin-mobile md:px-margin">
        @include('partials.page-heading', [
            'eyebrow' => 'Contact and quote requests',
            'icon' => 'contact_support',
            'title' => 'Tell us what you need',
            'description' => 'Request PP or cement bags made to your specification. Answer a few quick questions and we will confirm the price, sample and schedule before work begins.',
        ])

        <div class="grid grid-cols-1 lg:grid-cols-12 gap-space-lg xl:gap-space-xl items-start">

            {{-- Company Details --}}
            <div class="lg:col-span-5 flex flex-col gap-space-lg lg:sticky lg:top-28">
                <div class="p-space-lg bg-surface-container-lowest rounded-lg border border-outline-variant/40 shadow-sm flex flex-col gap-space-md">
                    <h2 class="font-headline-lg text-headline-xl-mobile text-primary sm:text-headline-lg">Mikindani Operations Facility</h2>
                    <div class="grid grid-cols-1 gap-space-md md:grid-cols-2 lg:grid-cols-1">
                        <div class="flex items-start gap-space-md">
                            <span class="material-symbols-outlined text-on-tertiary-container mt-space-xs shrink-0">pin_drop</span>
                            <div class="flex min-w-0 flex-col">
                                <span class="font-label-technical text-label-technical text-secondary uppercase">PHYSICAL ADDRESS</span>
                                <p class="font-body-md text-body-md text-primary font-medium mt-0.5">
                                    Off Mombasa Road (near EPZ Centre)<br>Mombasa, Kenya<br><span class="text-on-surface-variant font-normal">Plus Code: XJRC+WWR</span>
                                </p>
                            </div>
                        </div>
                        <div class="flex items-start gap-space-md">
                            <span class="material-symbols-outlined text-secondary mt-space-xs shrink-0">call</span>
                            <div class="flex min-w-0 flex-col">
                                <span class="font-label-technical text-label-technical text-secondary uppercase">TELEPHONE &amp; HOTLINE</span>
                                <p class="font-body-md text-body-md text-primary font-medium mt-0.5">
                                    <a class="whitespace-nowrap underline underline-offset-4" href="tel:+254 119 888333">+254 119 888333</a><br><a class="whitespace-nowrap underline underline-offset-4" href="tel:+254 119 444666">+254 119 444666</a>
                                </p>
                                <span class="font-label-technical text-label-technical text-on-tertiary-container mt-space-xs">Direct Laboratory Hotline: Ext 104</span>
                            </div>
                        </div>
                        <div class="flex items-start gap-space-md">
                            <span class="material-symbols-outlined text-secondary mt-space-xs shrink-0">mail</span>
                            <div class="flex min-w-0 flex-col">
                                <span class="font-label-technical text-label-technical text-secondary uppercase">OFFICIAL INQUIRIES</span>
                                <p class="font-body-md text-body-md text-primary font-medium mt-0.5">
                                    <a class="break-all underline underline-offset-4 hover:text-on-tertiary-container lg:text-[13px] xl:text-[15px]" href="mailto:sspackaging@sandstormindustriesltd.com">sspackaging@sandstormindustriesltd.com</a><br><a class="break-all underline underline-offset-4 hover:text-on-tertiary-container lg:text-[13px] xl:text-[15px]" href="mailto:jamiljamal@sandstormindustriesltd.com">jamiljamal@sandstormindustriesltd.com</a>
                                </p>
                            </div>
                        </div>
                        <div class="flex items-start gap-space-md">
                            <span class="material-symbols-outlined text-secondary mt-space-xs shrink-0">schedule</span>
                            <div class="flex min-w-0 flex-col">
                                <span class="font-label-technical text-label-technical text-secondary uppercase">OPERATIONAL HOURS</span>
                                <p class="font-body-md text-body-md text-primary font-medium mt-0.5">
                                    Monday &ndash; Saturday: 08:00 &ndash; 17:00 EAT<br>
                                    <span class="text-on-surface-variant font-normal">Call ahead to arrange a visit or sample drop-off.</span>
                                </p>
                            </div>
                        </div>
                    </div>

                    @include('partials.button', ['label' => 'Open directions in Google Maps', 'variant' => 'secondary', 'href' => 'https://maps.app.goo.gl/hqcNgMHYcjoNbRHx7', 'iconStart' => 'directions', 'external' => true, 'class' => 'whitespace-normal text-center'])
                    <p class="font-body-sm text-body-sm text-on-surface-variant">Search the address before travelling; call ahead to confirm the correct entrance and visitor arrangements.</p>

                </div>
            </div>

            {{-- Contact Form --}}
            <div class="lg:col-span-7 flex flex-col gap-space-lg">
                <div id="custom-bag" class="scroll-mt-28 p-space-md sm:p-space-lg md:p-space-xl bg-surface-container-lowest rounded-lg border border-outline-variant/40 shadow-sm">
                    <h2 class="font-headline-lg text-headline-xl-mobile text-primary sm:text-headline-lg mb-space-xs">Request a Custom Bag</h2>
                    <p class="max-w-[65ch] font-body-sm text-body-sm text-on-surface-variant mb-space-lg">
                        Answer the questions below to tell us how you want your PP or cement bags made. We will reply with a price, sample and delivery schedule, and aim to acknowledge requests within two business days.
                    </p>

                    @if (session('success'))
                        <div class="mb-space-md p-3 bg-emerald-50 border border-emerald-300 text-emerald-800 rounded font-label-technical text-label-technical flex items-center gap-space-sm">
                            <span class="material-symbols-outlined text-[18px]">verified</span>
                            <span>{{ session('success') }}</span>
                        </div>
                    @endif

                    <form class="flex flex-col gap-space-md" method="POST" action="{{ route('contact.submit') }}#custom-bag">
                        @csrf
                        <input type="hidden" name="serviceInterest" value="custom-bag">
                        {{-- Honeypot: real visitors never see or fill this field. --}}
                        <div style="position:absolute;left:-9999px;" aria-hidden="true">
                            <label for="hp_check">Leave this field empty</label>
                            <input type="text" id="hp_check" name="hp_check" tabindex="-1" autocomplete="off">
                        </div>
                        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-1 xl:grid-cols-2 gap-space-md">
                            <div class="flex flex-col gap-space-xs">
                                <label class="font-label-technical text-label-technical uppercase text-secondary" for="fullName">Full Name *</label>
                                <input class="h-11 px-3 bg-surface-container-lowest border border-outline-variant rounded-lg text-body-md text-on-surface placeholder:text-outline focus:outline-none focus:border-primary focus:ring-2 focus:ring-on-tertiary-container/20 @error('fullName') border-error @enderror"
                                       id="fullName" name="fullName" autocomplete="name" placeholder="Eng. Patrick Mwangi" required type="text" value="{{ old('fullName') }}">
                                @error('fullName') <span class="text-error text-body-sm">{{ $message }}</span> @enderror
                            </div>
                            <div class="flex flex-col gap-space-xs">
                                <label class="font-label-technical text-label-technical uppercase text-secondary" for="orgName">Company / Organization *</label>
                                <input class="h-11 px-3 bg-surface-container-lowest border border-outline-variant rounded-lg text-body-md text-on-surface placeholder:text-outline focus:outline-none focus:border-primary focus:ring-2 focus:ring-on-tertiary-container/20 @error('orgName') border-error @enderror"
                                       id="orgName" name="orgName" autocomplete="organization" placeholder="Mombasa Cement Corp" required type="text" value="{{ old('orgName') }}">
                                @error('orgName') <span class="text-error text-body-sm">{{ $message }}</span> @enderror
                            </div>
                        </div>

                        <div class="flex flex-col gap-space-xs">
                            <label class="font-label-technical text-label-technical uppercase text-secondary" for="email">Email *</label>
                            <input class="h-11 px-3 bg-surface-container-lowest border border-outline-variant rounded-lg text-body-md text-on-surface placeholder:text-outline focus:outline-none focus:border-primary focus:ring-2 focus:ring-on-tertiary-container/20 @error('email') border-error @enderror"
                                   id="email" name="email" autocomplete="email" placeholder="p.mwangi@organization.com" required type="email" value="{{ old('email') }}">
                            @error('email') <span class="text-error text-body-sm">{{ $message }}</span> @enderror
                        </div>

                        {{-- Ready-made questions: wording and options live in config/sandstorm.php --}}
                        <div class="flex flex-col gap-space-md border-t border-outline-variant/40 pt-space-md">
                            <p class="font-body-sm text-body-sm text-on-surface-variant">Tap one answer for each question. If you are unsure, pick the closest option and explain in the notes below.</p>
                            @foreach (config('sandstorm.custom_bag_questions') as $key => $question)
                                @php
                                    $multiple = $question['multiple'] ?? false;
                                    $chosen = (array) old($key, []);
                                @endphp
                                <fieldset class="flex min-w-0 flex-col gap-space-sm">
                                    <legend class="mb-space-sm font-body-md text-body-md font-semibold text-primary">
                                        <span class="mr-1 font-label-technical text-label-technical text-secondary">{{ str_pad($loop->iteration, 2, '0', STR_PAD_LEFT) }}</span>
                                        {{ $question['question'] }}@unless ($multiple)&nbsp;*@endunless
                                    </legend>
                                    <div class="flex flex-wrap gap-space-sm">
                                        @foreach ($question['options'] as $value => $label)
                                            <label class="inline-flex min-h-11 cursor-pointer items-center gap-space-sm rounded-lg border border-outline-variant bg-surface-container-lowest px-3 py-2 text-body-sm text-on-surface transition-colors hover:bg-surface-container-low has-[:checked]:border-primary has-[:checked]:bg-primary has-[:checked]:text-on-primary has-[:focus-visible]:ring-2 has-[:focus-visible]:ring-on-tertiary-container/40">
                                                <input class="h-4 w-4 shrink-0 accent-on-tertiary-container" type="{{ $multiple ? 'checkbox' : 'radio' }}"
                                                       name="{{ $multiple ? $key.'[]' : $key }}" value="{{ $value }}"
                                                       @checked(in_array($value, $chosen, true)) @required(! $multiple)>
                                                <span>{{ $label }}</span>
                                            </label>
                                        @endforeach
                                    </div>
                                    @error($key) <span class="text-error text-body-sm">{{ $message }}</span> @enderror
                                </fieldset>
                            @endforeach
                        </div>

                        <div class="flex flex-col gap-space-xs">
                            <label class="font-label-technical text-label-technical uppercase text-secondary" for="batchDetails">Anything else we should know?</label>
                            <textarea class="p-3 bg-surface-container-lowest border border-outline-variant rounded-lg text-body-md text-on-surface placeholder:text-outline focus:outline-none focus:border-primary focus:ring-2 focus:ring-on-tertiary-container/20"
                                      id="batchDetails" name="batchDetails" placeholder="Exact dimensions, the custom colour or size you want, delivery location, when you need the bags..." rows="4">{{ old('batchDetails') }}</textarea>
                            @error('batchDetails') <span class="text-error text-body-sm">{{ $message }}</span> @enderror
                        </div>

                        <p class="font-body-sm text-body-sm text-on-surface-variant">We use your details to respond to this request. Read our <a class="underline" href="{{ route('privacy') }}">privacy notice</a> and <a class="underline" href="{{ route('terms') }}">request terms</a>.</p>

                        <div class="pt-space-sm flex flex-col gap-space-sm">
                            @include('partials.button', ['label' => 'Send Custom Bag Request', 'type' => 'submit', 'iconStart' => 'send'])
                        </div>
                    </form>
                </div>

                {{-- Job applications --}}
                <div id="apply" class="p-space-md sm:p-space-lg md:p-space-xl bg-surface-container-lowest rounded-lg border border-outline-variant/40 shadow-sm">
                    <h2 class="font-headline-lg text-headline-xl-mobile text-primary sm:text-headline-lg mb-space-xs">Join Our Team</h2>
                    <p class="max-w-[65ch] font-body-sm text-body-sm text-on-surface-variant mb-space-lg">
                        Interested in working with Sandstorm? Tell us about yourself and the role you are interested in, and our team will contact you if there is a suitable opening.
                    </p>

                    @if (session('job_success'))
                        <div class="mb-space-md p-3 bg-emerald-50 border border-emerald-300 text-emerald-800 rounded font-label-technical text-label-technical flex items-center gap-space-sm">
                            <span class="material-symbols-outlined text-[18px]">verified</span>
                            <span>{{ session('job_success') }}</span>
                        </div>
                    @endif

                    <form class="flex flex-col gap-space-md" method="POST" action="{{ route('contact.submit') }}#apply">
                        @csrf
                        <input type="hidden" name="serviceInterest" value="job-inquiry">
                        <input type="hidden" name="orgName" value="Job applicant">
                        <div style="position:absolute;left:-9999px;" aria-hidden="true">
                            <label for="hp_check_job">Leave this field empty</label>
                            <input type="text" id="hp_check_job" name="hp_check" tabindex="-1" autocomplete="off">
                        </div>
                        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-1 xl:grid-cols-2 gap-space-md">
                            <div class="flex flex-col gap-space-xs">
                                <label class="font-label-technical text-label-technical uppercase text-secondary" for="jobFullName">Full Name *</label>
                                <input class="h-11 px-3 bg-surface-container-lowest border border-outline-variant rounded-lg text-body-md text-on-surface placeholder:text-outline focus:outline-none focus:border-primary focus:ring-2 focus:ring-on-tertiary-container/20"
                                       id="jobFullName" name="fullName" autocomplete="name" placeholder="Your full name" required type="text">
                            </div>
                            <div class="flex flex-col gap-space-xs">
                                <label class="font-label-technical text-label-technical uppercase text-secondary" for="jobEmail">Email *</label>
                                <input class="h-11 px-3 bg-surface-container-lowest border border-outline-variant rounded-lg text-body-md text-on-surface placeholder:text-outline focus:outline-none focus:border-primary focus:ring-2 focus:ring-on-tertiary-container/20"
                                       id="jobEmail" name="email" autocomplete="email" placeholder="you@example.com" required type="email">
                            </div>
                        </div>
                        <div class="flex flex-col gap-space-xs">
                            <label class="font-label-technical text-label-technical uppercase text-secondary" for="jobMessage">Role and About You</label>
                            <textarea class="p-3 bg-surface-container-lowest border border-outline-variant rounded-lg text-body-md text-on-surface placeholder:text-outline focus:outline-none focus:border-primary focus:ring-2 focus:ring-on-tertiary-container/20"
                                      id="jobMessage" name="batchDetails" placeholder="Which role are you interested in? Briefly describe your experience and qualifications." rows="4"></textarea>
                        </div>
                        <div class="pt-space-sm">
                            @include('partials.button', ['label' => 'Submit Application', 'type' => 'submit', 'iconStart' => 'send', 'class' => 'w-full'])
                        </div>
                    </form>
                </div>
            </div>

        </div>
    </div>
</section>

@endsection