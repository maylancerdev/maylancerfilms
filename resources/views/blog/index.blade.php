@extends('layouts.app')

@section('title', __('blog.frontend.page_title'))
@section('meta')
    <meta name="description" content="{{ __('blog.frontend.meta_description', ['site_name' => $settings['site_name'] ?? 'Maylancer Films']) }}">
@endsection

@section('og')
    <meta property="og:title" content="{{ __('blog.frontend.page_title') }}">
    <meta property="og:description" content="{{ __('blog.frontend.meta_description', ['site_name' => $settings['site_name'] ?? 'Maylancer Films']) }}">
    <meta property="og:type" content="website">
    <meta property="og:url" content="{{ route('blog.index') }}">
    @if(!empty($settings['og_image']))
    <meta property="og:image" content="{{ url('/storage/'.$settings['og_image']) }}">
    @endif
    <meta property="og:site_name" content="{{ $settings['site_name'] ?? config('app.name') }}">
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="{{ __('blog.frontend.page_title') }}">
    <meta name="twitter:description" content="{{ __('blog.frontend.meta_description', ['site_name' => $settings['site_name'] ?? 'Maylancer Films']) }}">
@endsection

@section('content')
<div class="tp-contact-spacing pb-160">
    <div class="container-fluid container-1524">

        @include('layouts.partials.breadcrumb', ['breadcrumbs' => [
            ['label' => __('front.breadcrumb.home'), 'url' => url('/')],
            ['label' => __('front.breadcrumb.blog'), 'url' => route('blog.index')],
        ]])

        {{-- Page headline --}}
        <div class="row justify-content-center">
            <div class="col-lg-8 text-center mb-70">
                <h2 class="tp-ff-morganite-bold text-uppercase ls-0 tp-text-common-white mb-20" style="font-size: 180px; line-height: 0.85;">{{ __('blog.frontend.blog') }}</h2>
                <p class="tp-ff-dm fw-500 fs-24 lh-140-per ls-m-2 tp-text-grey-5">{{ __('blog.frontend.all_posts', ['site_name' => $settings['site_name'] ?? 'Maylancer Films']) }}</p>
            </div>
        </div>

        {{-- Search bar --}}
        <div class="row justify-content-center mb-40">
            <div class="col-lg-6">
                <form action="{{ route('blog.index') }}" method="GET" class="d-flex gap-2">
                    <input type="text" name="search" value="{{ request('search') }}" placeholder="{{ __('blog.frontend.search_placeholder') }}" class="form-control tp-ff-inter fw-400 fs-16 tp-text-common-white tp-bg-common-black-5 border border-secondary rounded-3 p-3 flex-grow-1">
                    <button type="submit" class="tp-btn-2 tp-btn-primary tp-ff-inter fw-600 fs-15">{{ __('blog.frontend.search_button') }}</button>
                </form>
            </div>
        </div>

        {{-- Category filter --}}
        @if($categories->isNotEmpty())
        <div class="row mb-50">
            <div class="col-12 text-center">
                <a href="{{ route('blog.index') }}" class="tp-ff-inter fw-600 fs-15 {{ !$activeCategory ? 'tp-text-theme-primary' : 'tp-text-grey-2' }} mr-20">{{ __('blog.frontend.all_categories') }}</a>
                @foreach($categories as $cat)
                    <a href="{{ route('blog.index', ['category' => $cat->slug]) }}" class="tp-ff-inter fw-600 fs-15 {{ ($activeCategory ?? '') === $cat->slug ? 'tp-text-theme-primary' : 'tp-text-grey-2' }} mr-20">{{ $cat->name }}</a>
                @endforeach
            </div>
        </div>
        @endif

        {{-- Tag filter notice --}}
        @if(isset($activeTag))
        <div class="row mb-30">
            <div class="col-12 text-center">
                <span class="tp-ff-inter fw-500 fs-16 tp-text-grey-2">{{ __('blog.frontend.tagged_posts', ['name' => $activeTag->name]) }}</span>
                <a href="{{ route('blog.index') }}" class="tp-ff-inter fw-500 fs-14 tp-text-theme-primary ml-10">{{ __('blog.frontend.clear_tag') }}</a>
            </div>
        </div>
        @endif

        {{-- Posts grid --}}
        <div class="row">
            @forelse($posts as $post)
            <div class="col-lg-4 col-md-6 mb-40">
                <div class="tp-blog-vp-item tp--hover-item">
                    <a href="{{ route('blog.show', $post->slug) }}" class="tp-blog-vp-thumb d-block mb-20 p-relative fix tp-round-20">
                        @if($post->cover_image)
                        <img class="w-100" src="/storage/{{ $post->cover_image }}" alt="{{ $post->cover_image_alt ?: $post->title }}" loading="lazy">
                        @endif
                    </a>
                    <div class="tp-blog-vp-content">
                        <div class="tp-blog-vp-dates mb-10 d-flex align-items-center gap-2">
                            <span class="tp-ff-inter fw-600 fs-15 tp-text-grey-2">{{ $post->published_at?->format('M d, Y') }}</span>
                            @php $readTime = max(1, (int) ceil(str_word_count(strip_tags($post->body ?? '')) / 200)); @endphp
                            <span class="tp-ff-inter fw-400 fs-14 tp-text-grey-5">&middot; {{ __('blog.frontend.min_read', ['min' => $readTime]) }}</span>
                        </div>
                        <h3 class="tp-ff-inter fw-600 fs-28 lh-130-per ls-m-3 tp-text-common-white mb-15">
                            <a class="hover-text-white" href="{{ route('blog.show', $post->slug) }}">{{ $post->title }}</a>
                        </h3>
                        @if($post->excerpt)
                        <p class="tp-ff-dm fw-400 fs-16 lh-160-per tp-text-grey-5 mb-15">{{ Str::limit($post->excerpt, 120) }}</p>
                        @endif
                        @if($post->category)
                        <div class="tp-blog-vp-cetagory">
                            <a href="{{ route('blog.index', ['category' => $post->category->slug]) }}">{{ $post->category->name }}</a>
                        </div>
                        @endif
                    </div>
                </div>
            </div>
            @empty
            <div class="col-12 text-center">
                <p class="tp-ff-inter fw-500 fs-18 tp-text-grey-2">{{ __('blog.frontend.no_posts') }}</p>
            </div>
            @endforelse
        </div>

        {{-- Pagination --}}
        @if($posts->hasPages())
        <div class="row mt-40">
            <div class="col-12 d-flex justify-content-center">
                {{ $posts->withQueryString()->links('vendor.pagination.dark') }}
            </div>
        </div>
        @endif
    </div>
</div>
@endsection
