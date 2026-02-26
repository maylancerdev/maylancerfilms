<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="no-js aleric-dark">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title', ($settings['default_meta_title'] ?? config('app.name', 'Laravel')))</title>
    @yield('meta')

    {{-- Open Graph defaults --}}
    @hasSection('og')
        @yield('og')
    @else
        <meta property="og:title" content="@yield('title', ($settings['site_name'] ?? config('app.name')))">
        <meta property="og:description" content="{{ $settings['default_meta_description'] ?? '' }}">
        <meta property="og:type" content="website">
        <meta property="og:url" content="{{ url()->current() }}">
        @if(!empty($settings['og_image']))
        <meta property="og:image" content="{{ url('/storage/'.$settings['og_image']) }}">
        @endif
        <meta property="og:site_name" content="{{ $settings['site_name'] ?? config('app.name') }}">
        <meta name="twitter:card" content="summary_large_image">
    @endif

    {{-- Canonical URL --}}
    <link rel="canonical" href="@yield('canonical', url()->current())">

    {{-- RSS autodiscovery --}}
    <link rel="alternate" type="application/rss+xml" title="{{ $settings['site_name'] ?? config('app.name') }} — Blog" href="{{ route('blog.feed') }}">

    @if(!empty($settings['favicon']))
    <link rel="shortcut icon" type="image/x-icon" href="/storage/{{ $settings['favicon'] }}">
    @endif
    {{-- Analytics --}}
    @if(!empty($settings['analytics_code']))
    {!! $settings['analytics_code'] !!}
    @endif

    {{-- JSON-LD: Organization (global) --}}
    @php
    $orgJsonLd = json_encode([
        '@context' => 'https://schema.org',
        '@type' => 'Organization',
        'name' => $settings['site_name'] ?? config('app.name'),
        'url' => url('/'),
        'logo' => !empty($settings['logo']) ? url('/storage/'.$settings['logo']) : '',
        'contactPoint' => [
            '@type' => 'ContactPoint',
            'telephone' => $settings['phone'] ?? '',
            'email' => $settings['email'] ?? '',
            'contactType' => 'customer service',
        ],
        'sameAs' => array_values(array_filter([
            $settings['social_twitter'] ?? null,
            $settings['social_instagram'] ?? null,
            $settings['social_linkedin'] ?? null,
            $settings['social_dribbble'] ?? null,
        ], fn($v) => $v && $v !== '#')),
    ], JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE);
    @endphp
    <script type="application/ld+json">{!! $orgJsonLd !!}</script>
    @stack('jsonld')

    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>
<body class="tp-magic-cursor loaded video-production-bg">
<!--[if lte IE 9]>
<p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="https://browsehappy.com/">upgrade your browser</a> to improve your experience and security.</p>
<![endif]-->

@include('layouts.partials.loader')


@include('layouts.partials.header')

<div id="smooth-wrapper">
    <div id="smooth-content">
        <main>

            @yield('content')

        </main>

        @include('layouts.partials.footer')
    </div>
</div>


<!-- JS here -->
<script src="{{ asset('assets/js/vendor/jquery.js') }}"></script>
<script src="{{ asset('assets/js/bootstrap-bundle.js') }}"></script>
<script src="{{ asset('assets/js/plugin.js') }}"></script>
<script src="{{ asset('assets/js/three.js') }}"></script>
<script src="{{ asset('assets/js/hover-effect.umd.js') }}"></script>
<script src="{{ asset('assets/js/split-type.js') }}"></script>
<script src="{{ asset('assets/js/swiper-gl.js') }}"></script>
<script src="{{ asset('assets/js/effect-slicer.js') }}"></script>
<script src="{{ asset('assets/js/swiper-bundle.js') }}"></script>
<script src="{{ asset('assets/js/magnific-popup.js') }}"></script>
<script src="{{ asset('assets/js/nice-select.js') }}"></script>
<script src="{{ asset('assets/js/purecounter.js') }}"></script>
<script src="{{ asset('assets/js/isotope-pkgd.js') }}"></script>
<script src="{{ asset('assets/js/imagesloaded-pkgd.js') }}"></script>
<script src="{{ asset('assets/js/backtop.js') }}"></script>
<script src="{{ asset('assets/js/ajax-form.js') }}"></script>
<script src="{{ asset('assets/js/slider-init.js') }}"></script>
<script src="{{ asset('assets/js/main.js') }}"></script>
<script src="{{ asset('assets/js/tp-cursor.js') }}"></script>
<script type="module" src="{{ asset('assets/js/img-revel/index.js') }}"></script>
@include('layouts.partials.cookie-consent')
</body>
</html>
