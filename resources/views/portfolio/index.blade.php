@extends('layouts.app')

@section('title', __('front.portfolio.page_title'))
@section('meta')
    <meta name="description" content="{{ __('front.portfolio.meta_description') }}">
@endsection

@section('og')
    <meta property="og:title" content="{{ __('front.portfolio.page_title') }}">
    <meta property="og:description" content="{{ __('front.portfolio.meta_description') }}">
    <meta property="og:type" content="website">
    <meta property="og:url" content="{{ route('portfolio.index') }}">
    @if(!empty($settings['og_image']))
    <meta property="og:image" content="{{ url('/storage/'.$settings['og_image']) }}">
    @endif
    <meta property="og:site_name" content="{{ $settings['site_name'] ?? config('app.name') }}">
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="{{ __('front.portfolio.page_title') }}">
    <meta name="twitter:description" content="{{ __('front.portfolio.meta_description') }}">
@endsection

@section('content')
<div class="tp-contact-spacing pb-160">
    <div class="container-fluid container-1524">

        @include('layouts.partials.breadcrumb', ['breadcrumbs' => [
            ['label' => __('front.breadcrumb.home'), 'url' => url('/')],
            ['label' => __('front.breadcrumb.portfolio'), 'url' => route('portfolio.index')],
        ]])

        {{-- Page headline --}}
        <div class="row justify-content-center">
            <div class="col-lg-8 text-center mb-70">
                <h1 class="tp-ff-morganite-bold text-uppercase ls-0 tp-text-common-white mb-20" style="font-size: 180px; line-height: 0.85;">{{ __('front.portfolio.page_heading') }}</h1>
                <p class="tp-ff-dm fw-500 fs-24 lh-140-per ls-m-2 tp-text-grey-5">{{ __('front.portfolio.page_description') }}</p>
            </div>
        </div>

        {{-- Portfolio grid --}}
        <div class="tp-portfolio-vp-wrapper">
            <div class="d-grid">
                @forelse($items as $item)
                <div class="grid-item">
                    <div class="project-item project-style-3 hover-play">
                        <div class="project-item-inner">
                            <div class="tp-portfolio-vp-post-thumbnail">
                                <div class="video-container">
                                    <iframe src="{{ $item['video_url'] }}" loading="lazy" allow="autoplay; fullscreen; picture-in-picture; clipboard-write; encrypted-media" referrerpolicy="strict-origin-when-cross-origin"></iframe>
                                </div>
                            </div>
                            <div class="tp-portfolio-vp-content">
                                <div class="tp-portfolio-vp-title tp-ff-inter fw-600 fs-32 fs-xs-22 lh-160-per ls-m-3 tp-text-grey-5">
                                    <a href="{{ $item['link'] ?? '#' }}">
                                        <span class="tp-portfolio-vp-text-top">{{ $item['title_top'] }}</span>
                                        <br>
                                        <span class="tp-portfolio-vp-text-middle">{{ $item['title_bottom'] }}</span>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @empty
                <div class="text-center">
                    <p class="tp-ff-inter fw-500 fs-18 tp-text-grey-2">{{ __('front.portfolio.no_items') }}</p>
                </div>
                @endforelse
            </div>
        </div>
    </div>
</div>
@endsection
