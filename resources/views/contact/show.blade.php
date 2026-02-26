@extends('layouts.app')

@section('title', __('contact.frontend.page_title'))
@section('meta')
    <meta name="description" content="{{ __('contact.frontend.meta_description', ['site_name' => $settings['site_name'] ?? 'Maylancer Films']) }}">
@endsection

@section('og')
    <meta property="og:title" content="{{ __('contact.frontend.page_title') }}">
    <meta property="og:description" content="{{ __('contact.frontend.meta_description', ['site_name' => $settings['site_name'] ?? 'Maylancer Films']) }}">
    <meta property="og:type" content="website">
    <meta property="og:url" content="{{ route('contact.show') }}">
    @if(!empty($settings['og_image']))
    <meta property="og:image" content="{{ url('/storage/'.$settings['og_image']) }}">
    @endif
    <meta property="og:site_name" content="{{ $settings['site_name'] ?? config('app.name') }}">
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="{{ __('contact.frontend.page_title') }}">
    <meta name="twitter:description" content="{{ __('contact.frontend.meta_description', ['site_name' => $settings['site_name'] ?? 'Maylancer Films']) }}">
@endsection

@if(isset($faqs) && $faqs->isNotEmpty())
@push('jsonld')
@php
$faqJsonLd = json_encode([
    '@context' => 'https://schema.org',
    '@type' => 'FAQPage',
    'mainEntity' => $faqs->map(fn($faq) => [
        '@type' => 'Question',
        'name' => $faq->question,
        'acceptedAnswer' => [
            '@type' => 'Answer',
            'text' => $faq->answer,
        ],
    ])->values()->all(),
], JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE);
@endphp
<script type="application/ld+json">{!! $faqJsonLd !!}</script>
@endpush
@endif

@section('content')
<div class="tp-contact-spacing pb-160">
    <div class="container-fluid container-1524">

        @include('layouts.partials.breadcrumb', ['breadcrumbs' => [
            ['label' => __('front.breadcrumb.home'), 'url' => url('/')],
            ['label' => __('front.breadcrumb.contact'), 'url' => route('contact.show')],
        ]])

        {{-- Page headline --}}
        <div class="row justify-content-center">
            <div class="col-lg-8 text-center mb-70">
                <h2 class="tp-ff-morganite-bold text-uppercase ls-0 tp-text-common-white mb-20" style="font-size: 180px; line-height: 0.85;">{{ __('contact.frontend.headline') }}</h2>
                <p class="tp-ff-dm fw-500 fs-24 lh-140-per ls-m-2 tp-text-grey-2">{{ __('contact.frontend.subheadline') }}</p>
            </div>
        </div>

        <div class="row">

            {{-- Left: Contact info --}}
            <div class="col-lg-4 mb-40">
                <div class="tp-footer-vp-widget">
                    <h4 class="tp-ff-inter fw-600 fs-24 ls-m-4 tp-text-common-white mb-30">{{ __('contact.frontend.info_title') }}</h4>
                    <p class="tp-ff-dm fw-400 fs-16 lh-160-per tp-text-grey-5 mb-40">{{ __('contact.frontend.info_description') }}</p>

                    @if(!empty($settings['phone']))
                    <div class="d-flex align-items-center mb-25">
                        <div class="tp-contact-icon mr-15">
                            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"/>
                            </svg>
                        </div>
                        <div>
                            <span class="tp-ff-inter fw-500 fs-14 tp-text-grey-5 d-block mb-5">{{ __('contact.frontend.info_phone') }}</span>
                            <a href="tel:{{ $settings['phone'] }}" class="tp-ff-inter fw-600 fs-16 tp-text-common-white hover-text-white">{{ $settings['phone'] }}</a>
                        </div>
                    </div>
                    @endif

                    @if(!empty($settings['email']))
                    <div class="d-flex align-items-center mb-25">
                        <div class="tp-contact-icon mr-15">
                            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"/>
                                <polyline points="22,6 12,13 2,6"/>
                            </svg>
                        </div>
                        <div>
                            <span class="tp-ff-inter fw-500 fs-14 tp-text-grey-5 d-block mb-5">{{ __('contact.frontend.info_email') }}</span>
                            <a href="mailto:{{ $settings['email'] }}" class="tp-ff-inter fw-600 fs-16 tp-text-common-white hover-text-white">{{ $settings['email'] }}</a>
                        </div>
                    </div>
                    @endif

                    @if(!empty($settings['address']))
                    <div class="d-flex align-items-center mb-25">
                        <div class="tp-contact-icon mr-15">
                            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"/>
                                <circle cx="12" cy="10" r="3"/>
                            </svg>
                        </div>
                        <div>
                            <span class="tp-ff-inter fw-500 fs-14 tp-text-grey-5 d-block mb-5">{{ __('contact.frontend.info_address') }}</span>
                            <span class="tp-ff-inter fw-600 fs-16 tp-text-common-white">{{ $settings['address'] }}</span>
                        </div>
                    </div>
                    @endif

                    {{-- Social links --}}
                    @php
                        $socials = [
                            'social_twitter' => __('front.footer.twitter'),
                            'social_instagram' => __('front.footer.instagram'),
                            'social_linkedin' => __('front.footer.linkedin'),
                            'social_dribbble' => __('front.footer.dribbble'),
                        ];
                        $hasSocials = collect($socials)->keys()->contains(fn($key) => !empty($settings[$key]) && $settings[$key] !== '#');
                    @endphp
                    @if($hasSocials)
                    <div class="mt-40">
                        <span class="tp-ff-inter fw-500 fs-14 tp-text-grey-5 d-block mb-15">{{ __('contact.frontend.info_follow') }}</span>
                        <div class="d-flex gap-3">
                            @foreach($socials as $key => $label)
                                @if(!empty($settings[$key]) && $settings[$key] !== '#')
                                <a href="{{ $settings[$key] }}" class="tp-ff-inter fw-600 fs-14 tp-text-common-white hover-text-white" target="_blank" rel="noopener">{{ $label }}</a>
                                @endif
                            @endforeach
                        </div>
                    </div>
                    @endif
                </div>
            </div>

            {{-- Right: Contact form or success message --}}
            <div class="col-lg-7 offset-lg-1">
                @if(session('success'))
                    {{-- Success state: replaces entire form permanently --}}
                    <div class="text-center pt-80">
                        <div class="mb-30">
                            <svg width="80" height="80" viewBox="0 0 80 80" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <circle cx="40" cy="40" r="38" stroke="currentColor" stroke-width="2" class="tp-text-theme-primary"/>
                                <path d="M24 40L35 51L56 30" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round" class="tp-text-theme-primary"/>
                            </svg>
                        </div>
                        <h3 class="tp-ff-inter fw-600 fs-32 ls-m-4 tp-text-common-white mb-20">{{ __('contact.frontend.success_title') }}</h3>
                        <p class="tp-ff-dm fw-400 fs-18 lh-160-per tp-text-grey-5 mb-40">{{ __('contact.frontend.success_message') }}</p>
                        <div class="tp-btn-group tp-btn-vp-group">
                            <a class="tp-btn-circle" href="{{ url('/') }}">
                                <svg width="14" height="14" viewBox="0 0 14 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M2.41379 3.30208C5.97452 3.05821 10.6092 1.55558 14 0C12.4438 3.39014 10.9406 8.02425 10.6973 11.585L8.35765 6.59331L1.14783 13.8037C1.02165 13.9295 0.850656 14.0001 0.672431 14C0.539461 14 0.409486 13.9605 0.298934 13.8866C0.188382 13.8128 0.102217 13.7077 0.0513353 13.5849C0.000453949 13.462 -0.0128613 13.3269 0.013072 13.1965C0.0390053 13.066 0.103024 12.9462 0.197034 12.8522L7.40683 5.64241L2.41379 3.30208Z" fill="currentColor" />
                                </svg>
                            </a>
                            <a class="tp-btn-2 tp-btn-primary" href="{{ url('/') }}">{{ __('contact.frontend.success_cta') }}</a>
                            <a class="tp-btn-circle" href="{{ url('/') }}">
                                <svg width="14" height="14" viewBox="0 0 14 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M2.41379 3.30208C5.97452 3.05821 10.6092 1.55558 14 0C12.4438 3.39014 10.9406 8.02425 10.6973 11.585L8.35765 6.59331L1.14783 13.8037C1.02165 13.9295 0.850656 14.0001 0.672431 14C0.539461 14 0.409486 13.9605 0.298934 13.8866C0.188382 13.8128 0.102217 13.7077 0.0513353 13.5849C0.000453949 13.462 -0.0128613 13.3269 0.013072 13.1965C0.0390053 13.066 0.103024 12.9462 0.197034 12.8522L7.40683 5.64241L2.41379 3.30208Z" fill="currentColor" />
                                </svg>
                            </a>
                        </div>
                    </div>
                @else
                    {{-- Contact form --}}
                    <form action="{{ route('contact.store') }}" method="POST">
                        @csrf

                        {{-- Honeypot --}}
                        <div aria-hidden="true" style="position:absolute;left:-9999px;"><input type="text" name="website" tabindex="-1" autocomplete="off"></div>

                        <div class="row">
                            <div class="col-md-6 mb-30">
                                <label class="tp-ff-inter fw-500 fs-14 tp-text-grey-5 d-block mb-10">{{ __('contact.frontend.name') }} *</label>
                                <input type="text" name="name" value="{{ old('name') }}" class="form-control tp-ff-inter fw-400 fs-16 tp-text-common-white tp-bg-common-black-5 border border-secondary rounded-3 p-3" required>
                                @error('name')
                                <span class="tp-ff-inter fw-400 fs-14 text-danger mt-5 d-block">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="col-md-6 mb-30">
                                <label class="tp-ff-inter fw-500 fs-14 tp-text-grey-5 d-block mb-10">{{ __('contact.frontend.email') }} *</label>
                                <input type="email" name="email" value="{{ old('email') }}" class="form-control tp-ff-inter fw-400 fs-16 tp-text-common-white tp-bg-common-black-5 border border-secondary rounded-3 p-3" required>
                                @error('email')
                                <span class="tp-ff-inter fw-400 fs-14 text-danger mt-5 d-block">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6 mb-30">
                                <label class="tp-ff-inter fw-500 fs-14 tp-text-grey-5 d-block mb-10">{{ __('contact.frontend.phone') }}</label>
                                <input type="text" name="phone" value="{{ old('phone') }}" class="form-control tp-ff-inter fw-400 fs-16 tp-text-common-white tp-bg-common-black-5 border border-secondary rounded-3 p-3">
                                @error('phone')
                                <span class="tp-ff-inter fw-400 fs-14 text-danger mt-5 d-block">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="col-md-6 mb-30">
                                <label class="tp-ff-inter fw-500 fs-14 tp-text-grey-5 d-block mb-10">{{ __('contact.frontend.subject') }}</label>
                                <input type="text" name="subject" value="{{ old('subject') }}" class="form-control tp-ff-inter fw-400 fs-16 tp-text-common-white tp-bg-common-black-5 border border-secondary rounded-3 p-3">
                                @error('subject')
                                <span class="tp-ff-inter fw-400 fs-14 text-danger mt-5 d-block">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="mb-30">
                            <label class="tp-ff-inter fw-500 fs-14 tp-text-grey-5 d-block mb-10">{{ __('contact.frontend.message') }} *</label>
                            <textarea name="message" rows="6" class="form-control tp-ff-inter fw-400 fs-16 tp-text-common-white tp-bg-common-black-5 border border-secondary rounded-3 p-3" required>{{ old('message') }}</textarea>
                            @error('message')
                            <span class="tp-ff-inter fw-400 fs-14 text-danger mt-5 d-block">{{ $message }}</span>
                            @enderror
                        </div>

                        <div>
                            <div class="tp-btn-group tp-btn-vp-group">
                                <button type="submit" class="tp-btn-circle">
                                    <svg width="14" height="14" viewBox="0 0 14 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd" clip-rule="evenodd" d="M2.41379 3.30208C5.97452 3.05821 10.6092 1.55558 14 0C12.4438 3.39014 10.9406 8.02425 10.6973 11.585L8.35765 6.59331L1.14783 13.8037C1.02165 13.9295 0.850656 14.0001 0.672431 14C0.539461 14 0.409486 13.9605 0.298934 13.8866C0.188382 13.8128 0.102217 13.7077 0.0513353 13.5849C0.000453949 13.462 -0.0128613 13.3269 0.013072 13.1965C0.0390053 13.066 0.103024 12.9462 0.197034 12.8522L7.40683 5.64241L2.41379 3.30208Z" fill="currentColor" />
                                    </svg>
                                </button>
                                <button type="submit" class="tp-btn-2 tp-btn-primary">{{ __('contact.frontend.submit') }}</button>
                                <button type="submit" class="tp-btn-circle">
                                    <svg width="14" height="14" viewBox="0 0 14 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd" clip-rule="evenodd" d="M2.41379 3.30208C5.97452 3.05821 10.6092 1.55558 14 0C12.4438 3.39014 10.9406 8.02425 10.6973 11.585L8.35765 6.59331L1.14783 13.8037C1.02165 13.9295 0.850656 14.0001 0.672431 14C0.539461 14 0.409486 13.9605 0.298934 13.8866C0.188382 13.8128 0.102217 13.7077 0.0513353 13.5849C0.000453949 13.462 -0.0128613 13.3269 0.013072 13.1965C0.0390053 13.066 0.103024 12.9462 0.197034 12.8522L7.40683 5.64241L2.41379 3.30208Z" fill="currentColor" />
                                    </svg>
                                </button>
                            </div>
                        </div>
                    </form>
                @endif
            </div>
        </div>
    </div>

    {{-- FAQ Section --}}
    @if(isset($faqs) && $faqs->isNotEmpty())
    <div class="row justify-content-center mt-100">
        <div class="col-lg-8 text-center mb-50">
            <h2 class="tp-ff-morganite-bold text-uppercase ls-0 tp-text-common-white mb-20" style="font-size: 140px; line-height: 0.85;">{{ __('faq.frontend.headline') }}</h2>
            <p class="tp-ff-dm fw-500 fs-20 lh-140-per tp-text-grey-5">{{ __('faq.frontend.subheadline') }}</p>
        </div>
        <div class="col-lg-8">
            <div class="accordion" id="faqAccordion">
                @foreach($faqs as $faq)
                <div class="accordion-item tp-bg-common-black-5 border border-secondary mb-15 tp-round-20" style="overflow: hidden;">
                    <h2 class="accordion-header" id="faqHead{{ $faq->id }}">
                        <button class="accordion-button collapsed tp-ff-inter fw-600 fs-18 tp-text-common-white tp-bg-common-black-5" type="button" data-bs-toggle="collapse" data-bs-target="#faqBody{{ $faq->id }}" aria-expanded="false" aria-controls="faqBody{{ $faq->id }}">
                            {{ $faq->question }}
                        </button>
                    </h2>
                    <div id="faqBody{{ $faq->id }}" class="accordion-collapse collapse" aria-labelledby="faqHead{{ $faq->id }}" data-bs-parent="#faqAccordion">
                        <div class="accordion-body tp-ff-dm fw-400 fs-16 lh-180-per tp-text-grey-5">
                            {{ $faq->answer }}
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
    @endif

</div>
</div>
@endsection
