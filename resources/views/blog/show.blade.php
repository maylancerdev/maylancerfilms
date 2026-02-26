@extends('layouts.app')

@section('title', $post->meta_title ?: $post->title)
@section('meta')
    @if($post->meta_description)
    <meta name="description" content="{{ $post->meta_description }}">
    @endif
@endsection

@section('og')
    <meta property="og:title" content="{{ $post->meta_title ?: $post->title }}">
    <meta property="og:description" content="{{ $post->meta_description ?: $post->excerpt ?: Str::limit(strip_tags($post->body), 160) }}">
    <meta property="og:type" content="article">
    <meta property="og:url" content="{{ route('blog.show', $post->slug) }}">
    @if($post->cover_image)
    <meta property="og:image" content="{{ url('/storage/'.$post->cover_image) }}">
    @endif
    <meta property="og:site_name" content="{{ $settings['site_name'] ?? config('app.name') }}">
    <meta property="article:published_time" content="{{ $post->published_at?->toIso8601String() }}">
    @if($post->author)
    <meta property="article:author" content="{{ $post->author->name }}">
    @endif
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="{{ $post->meta_title ?: $post->title }}">
    <meta name="twitter:description" content="{{ $post->meta_description ?: $post->excerpt ?: Str::limit(strip_tags($post->body), 160) }}">
    @if($post->cover_image)
    <meta name="twitter:image" content="{{ url('/storage/'.$post->cover_image) }}">
    @endif
@endsection

@push('jsonld')
@php
$articleJsonLd = json_encode([
    '@context' => 'https://schema.org',
    '@type' => 'Article',
    'headline' => $post->title,
    'description' => $post->meta_description ?: $post->excerpt ?: Str::limit(strip_tags($post->body), 160),
    'image' => $post->cover_image ? url('/storage/'.$post->cover_image) : '',
    'datePublished' => $post->published_at?->toIso8601String(),
    'dateModified' => $post->updated_at?->toIso8601String(),
    'author' => [
        '@type' => 'Person',
        'name' => $post->author?->name ?? '',
    ],
    'publisher' => [
        '@type' => 'Organization',
        'name' => $settings['site_name'] ?? config('app.name'),
        'logo' => !empty($settings['logo']) ? ['@type' => 'ImageObject', 'url' => url('/storage/'.$settings['logo'])] : null,
    ],
    'mainEntityOfPage' => [
        '@type' => 'WebPage',
        '@id' => route('blog.show', $post->slug),
    ],
], JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE);
@endphp
<script type="application/ld+json">{!! $articleJsonLd !!}</script>
@endpush

@section('content')
<div class="tp-contact-spacing pb-160">
    <div class="container-fluid container-1524">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                @include('layouts.partials.breadcrumb', ['breadcrumbs' => [
                    ['label' => __('front.breadcrumb.home'), 'url' => url('/')],
                    ['label' => __('front.breadcrumb.blog'), 'url' => route('blog.index')],
                    ['label' => Str::limit($post->title, 40), 'url' => route('blog.show', $post->slug)],
                ]])

                {{-- Cover image --}}
                @if($post->cover_image)
                <div class="mb-40 tp-round-20 fix">
                    <img class="w-100" src="/storage/{{ $post->cover_image }}" alt="{{ $post->cover_image_alt ?: $post->title }}" loading="lazy">
                </div>
                @endif

                {{-- Meta --}}
                <div class="mb-20 d-flex align-items-center flex-wrap gap-3">
                    <span class="tp-ff-inter fw-600 fs-15 tp-text-grey-5">{{ $post->published_at?->format('M d, Y') }}</span>
                    @if($post->author)
                    <span class="tp-ff-inter fw-500 fs-15 tp-text-grey-5">{{ __('blog.frontend.by_author', ['name' => $post->author->name]) }}</span>
                    @endif
                    @if($post->category)
                    <a href="{{ route('blog.index', ['category' => $post->category->slug]) }}" class="tp-ff-inter fw-500 fs-15 tp-text-grey-5 hover-text-white">{{ __('blog.frontend.in_category', ['category' => $post->category->name]) }}</a>
                    @endif
                    @php $readingTime = max(1, (int) ceil(str_word_count(strip_tags($post->body ?? '')) / 200)); @endphp
                    <span class="tp-ff-inter fw-500 fs-15 tp-text-grey-5">{{ __('blog.frontend.min_read', ['min' => $readingTime]) }}</span>
                </div>

                {{-- Title --}}
                <h1 class="tp-ff-morganite-bold text-uppercase ls-0 tp-text-common-white mb-40" style="font-size: 120px; line-height: 0.9;">{{ $post->title }}</h1>

                {{-- Excerpt --}}
                @if($post->excerpt)
                <p class="tp-ff-dm fw-500 fs-22 lh-160-per tp-text-grey-5 mb-40">{{ $post->excerpt }}</p>
                @endif

                {{-- Body --}}
                <div class="tp-ff-dm fw-400 fs-18 lh-180-per tp-text-grey-2 mb-50 tp-markdown-content">
                    {!! Str::markdown($post->body ?? '') !!}
                </div>

                {{-- Tags --}}
                @if($post->tags->isNotEmpty())
                <div class="mb-40 pt-30" style="border-top: 1px solid rgba(255,255,255,0.1);">
                    <span class="tp-ff-inter fw-600 fs-15 tp-text-common-white mr-10">{{ __('blog.frontend.tagged_with') }}:</span>
                    @foreach($post->tags as $tag)
                    <a href="{{ route('blog.tag', $tag->slug) }}" class="tp-ff-inter fw-500 fs-14 tp-text-grey-2 hover-text-white mr-10">#{{ $tag->name }}</a>
                    @endforeach
                </div>
                @endif

                {{-- Share buttons --}}
                @php $shareUrl = urlencode(route('blog.show', $post->slug)); $shareTitle = urlencode($post->title); @endphp
                <div class="mb-50 d-flex align-items-center flex-wrap gap-3">
                    <span class="tp-ff-inter fw-600 fs-15 tp-text-common-white mr-10">{{ __('blog.frontend.share') }}:</span>
                    <a href="https://twitter.com/intent/tweet?url={{ $shareUrl }}&text={{ $shareTitle }}" target="_blank" rel="noopener" class="tp-ff-inter fw-500 fs-14 tp-text-grey-2 hover-text-white" title="{{ __('blog.frontend.share_twitter') }}">X</a>
                    <a href="https://www.facebook.com/sharer/sharer.php?u={{ $shareUrl }}" target="_blank" rel="noopener" class="tp-ff-inter fw-500 fs-14 tp-text-grey-2 hover-text-white" title="{{ __('blog.frontend.share_facebook') }}">Facebook</a>
                    <a href="https://www.linkedin.com/sharing/share-offsite/?url={{ $shareUrl }}" target="_blank" rel="noopener" class="tp-ff-inter fw-500 fs-14 tp-text-grey-2 hover-text-white" title="{{ __('blog.frontend.share_linkedin') }}">LinkedIn</a>
                    <button type="button" onclick="navigator.clipboard.writeText('{{ route('blog.show', $post->slug) }}');this.textContent='{{ __('blog.frontend.link_copied') }}'" class="tp-ff-inter fw-500 fs-14 tp-text-grey-2 hover-text-white bg-transparent border-0 p-0" style="cursor:pointer;">{{ __('blog.frontend.copy_link') }}</button>
                </div>

                {{-- Prev / Next navigation --}}
                @if(isset($prevPost) || isset($nextPost))
                <div class="d-flex justify-content-between align-items-center pt-30 mb-50" style="border-top: 1px solid rgba(255,255,255,0.1);">
                    <div>
                        @if(isset($prevPost))
                        <a href="{{ route('blog.show', $prevPost->slug) }}" class="tp-ff-inter fw-500 fs-15 tp-text-grey-2 hover-text-white">
                            &larr; {{ __('blog.frontend.prev_post') }}
                        </a>
                        <span class="d-block tp-ff-inter fw-600 fs-16 tp-text-common-white mt-5">{{ Str::limit($prevPost->title, 40) }}</span>
                        @endif
                    </div>
                    <div class="text-end">
                        @if(isset($nextPost))
                        <a href="{{ route('blog.show', $nextPost->slug) }}" class="tp-ff-inter fw-500 fs-15 tp-text-grey-2 hover-text-white">
                            {{ __('blog.frontend.next_post') }} &rarr;
                        </a>
                        <span class="d-block tp-ff-inter fw-600 fs-16 tp-text-common-white mt-5">{{ Str::limit($nextPost->title, 40) }}</span>
                        @endif
                    </div>
                </div>
                @endif
            </div>
        </div>

        {{-- Related posts --}}
        @if($relatedPosts->isNotEmpty())
        <div class="row mt-80">
            <div class="col-12 mb-40">
                <h3 class="tp-ff-morganite-bold text-uppercase ls-0 tp-text-common-white" style="font-size: 100px; line-height: 0.9;">{{ __('blog.frontend.related_posts') }}</h3>
            </div>
            @foreach($relatedPosts as $related)
            <div class="col-lg-4 col-md-6 mb-40">
                <div class="tp-blog-vp-item tp--hover-item">
                    <a href="{{ route('blog.show', $related->slug) }}" class="tp-blog-vp-thumb d-block mb-20 p-relative fix tp-round-20">
                        @if($related->cover_image)
                        <img class="w-100" src="/storage/{{ $related->cover_image }}" alt="{{ $related->cover_image_alt ?: $related->title }}" loading="lazy">
                        @endif
                    </a>
                    <div class="tp-blog-vp-content">
                        <div class="tp-blog-vp-dates mb-10">
                            <span class="tp-ff-inter fw-600 fs-15 tp-text-grey-2">{{ $related->published_at?->format('M d, Y') }}</span>
                        </div>
                        <h3 class="tp-ff-inter fw-600 fs-24 lh-130-per ls-m-3 tp-text-common-white">
                            <a class="hover-text-white" href="{{ route('blog.show', $related->slug) }}">{{ $related->title }}</a>
                        </h3>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        @endif
    </div>
</div>
@endsection
