@extends('layouts.app')

@php
    $pageOgTitle = $page->meta_title ?: __('page.frontend.page_title', ['title' => $page->title, 'site_name' => $settings['site_name'] ?? 'Maylancer Films']);
    $pageOgDesc = $page->meta_description ?: $page->excerpt ?: ($settings['default_meta_description'] ?? '');
@endphp

@section('title', $pageOgTitle)
@section('meta')
    @if($page->meta_description)
    <meta name="description" content="{{ $page->meta_description }}">
    @endif
@endsection

@section('og')
    <meta property="og:title" content="{{ $pageOgTitle }}">
    <meta property="og:description" content="{{ $pageOgDesc }}">
    <meta property="og:type" content="article">
    <meta property="og:url" content="{{ route('page.show', $page->slug) }}">
    @if($page->cover_image)
    <meta property="og:image" content="{{ url('/storage/'.$page->cover_image) }}">
    @elseif(!empty($settings['og_image']))
    <meta property="og:image" content="{{ url('/storage/'.$settings['og_image']) }}">
    @endif
    <meta property="og:site_name" content="{{ $settings['site_name'] ?? config('app.name') }}">
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="{{ $pageOgTitle }}">
    <meta name="twitter:description" content="{{ $pageOgDesc }}">
    @if($page->cover_image)
    <meta name="twitter:image" content="{{ url('/storage/'.$page->cover_image) }}">
    @endif
@endsection

@section('content')
<div class="tp-contact-spacing pb-160">
    <div class="container-fluid container-1524">

        @include('layouts.partials.breadcrumb', ['breadcrumbs' => [
            ['label' => __('front.breadcrumb.home'), 'url' => url('/')],
            ['label' => $page->title, 'url' => route('page.show', $page->slug)],
        ]])

        {{-- Page headline --}}
        <div class="row justify-content-center">
            <div class="col-lg-8 text-center mb-70">

                <h1 class="tp-ff-morganite-bold text-uppercase ls-0 tp-text-common-white mb-20" style="font-size: 180px; line-height: 0.85;">{{ $page->title }}</h1>

                @if($page->excerpt)
                <p class="tp-ff-dm fw-500 fs-24 lh-140-per ls-m-2 tp-text-grey-2">{{ $page->excerpt }}</p>
                @endif
            </div>
        </div>

        <div class="row justify-content-center">
            <div class="col-lg-8">
                {{-- Cover image --}}
                @if($page->cover_image)
                <div class="mb-50 tp-round-20 fix">
                    <img class="w-100" src="/storage/{{ $page->cover_image }}" alt="{{ $page->cover_image_alt ?: $page->title }}" loading="lazy">
                </div>
                @endif

                {{-- Body (rendered as markdown) --}}
                <div class="tp-page-body tp-ff-dm fw-400 fs-18 lh-180-per tp-text-common-white">
                    {!! Str::markdown($page->body ?? '') !!}
                </div>
            </div>
        </div>

        {{-- Team Members (About page only) --}}
        @if(isset($teamMembers) && $teamMembers->isNotEmpty())
        <div class="row mt-100">
            <div class="col-12 text-center mb-50">
                <h2 class="tp-ff-morganite-bold text-uppercase ls-0 tp-text-common-white mb-20" style="font-size: 140px; line-height: 0.85;">{{ __('team.frontend.headline') }}</h2>
                <p class="tp-ff-dm fw-500 fs-20 lh-140-per tp-text-grey-5">{{ __('team.frontend.subheadline') }}</p>
            </div>
            @foreach($teamMembers as $member)
            <div class="col-lg-3 col-md-6 mb-40">
                <div class="tp-bg-common-black-5 tp-round-20 text-center p-40 h-100">
                    @if($member->image)
                    <div class="mb-20">
                        <img class="rounded-circle" src="/storage/{{ $member->image }}" alt="{{ $member->image_alt ?: $member->name }}" width="120" height="120" loading="lazy" style="object-fit:cover;">
                    </div>
                    @endif
                    <h4 class="tp-ff-inter fw-600 fs-20 tp-text-common-white mb-5">{{ $member->name }}</h4>
                    <span class="tp-ff-inter fw-500 fs-14 tp-text-theme-primary d-block mb-15">{{ $member->role }}</span>
                    @if($member->bio)
                    <p class="tp-ff-dm fw-400 fs-15 lh-160-per tp-text-grey-5 mb-0">{{ $member->bio }}</p>
                    @endif
                </div>
            </div>
            @endforeach
        </div>
        @endif
    </div>
</div>
@endsection
