<div class="tp-blog-area pt-160 pb-130">
    <div class="container-fluid container-1524">
        <div class="row align-items-center">
            <div class="col-lg-4">
                <div class="tp-blog-vp-title-wrap mb-30">
                    <h2 class="tp-blog-vp-title tp-ff-morganite-bold text-uppercase ls-0 mb-0 tp-text-common-black-5">
                        @php
                            $blogTitle = $sections['blog_section']['title'] ?? __('front.blog.section_title');
                            $blogTitleWords = explode(' ', $blogTitle, 2);
                        @endphp
                        <span class="tp_text_invert invert-black-6 d-inline-block">{{ $blogTitleWords[0] ?? '' }}</span><br>
                        <span class="tp_text_invert invert-black-6 d-inline-block">{{ $blogTitleWords[1] ?? '' }}</span>
                    </h2>
                </div>
            </div>
            <div class="col-lg-8">
                <div class="tp-blog-vp-item-wrap ml-30">
                    @foreach($latestPosts ?? [] as $post)
                    <div class="tp-blog-vp-item tp--hover-item">
                        <div class="row align-items-center">
                            @if($post->cover_image)
                            <div class="col-xxl-5 col-xl-5 col-lg-5 col-md-6">
                                <a href="{{ route('blog.show', $post->slug) }}" class="tp-blog-vp-thumb d-block mb-30 p-relative fix d-inline-block mr-30 tp-round-20">
                                    <img class="w-100" src="/storage/{{ $post->cover_image }}" alt="{{ $post->cover_image_alt ?: $post->title }}" loading="lazy">
                                </a>
                            </div>
                            @endif
                            <div class="col-xxl-6 col-xl-7 col-lg-7 col-md-6">
                                <div class="tp-blog-vp-content mb-30">
                                    <div class="tp-blog-vp-dates mb-10">
                                        <span class="tp-ff-inter fw-600 fs-15 tp-text-common-white">{{ $post->published_at?->format('M d, Y') }}</span>
                                    </div>
                                    <h3 class="tp-ff-inter fw-600 fs-43 fs-lg-35 fs-xs-30 lh-130-per ls-m-5 tp-text-common-white mb-30"><a class="underline-black" href="{{ route('blog.show', $post->slug) }}">{{ $post->title }}</a></h3>
                                    <div class="tp-blog-vp-cetagory">
                                        @if($post->category)
                                        <a href="{{ route('blog.index', ['category' => $post->category->slug]) }}">{{ $post->category->name }}</a>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
