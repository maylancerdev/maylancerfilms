<div class="tp-portfolio-area tp-bg-common-black-5 pt-155 pb-160">
    <div class="container-fluid container-1524">
        <div class="row">
            <div class="col-12">
                <div class="tp-portfolio-vp-title-wrap text-center mb-70">
                    <h2 class="tp-portfolio-vp-bigtitle tp-ff-morganite-bold text-uppercase ls-0 tp_text_invert invert-white mb-30 tp-text-common-white">{{ $sections['portfolio']['headline'] ?? __('front.portfolio.headline') }}</h2>
                    <p class="tp-portfolio-vp-para tp-ff-dm fw-500 fs-28 fs-md-22 lh-140-per ls-m-2 tp-text-grey-5">{{ $sections['portfolio']['description'] ?? __('front.portfolio.description') }}</p>
                </div>
                <div class="tp-portfolio-vp-wrapper">
                    <div class="d-grid">
                        @foreach($sections['portfolio']['items'] ?? [] as $item)
                        <div class="grid-item">
                            <div class="project-item project-style-3 hover-play">
                                <div class="project-item-inner">
                                    <div class="tp-portfolio-vp-post-thumbnail">
                                        <div class="video-container">
                                            <iframe class="" src="{{ $item['video_url'] }}" loading="lazy" allow="autoplay; fullscreen; picture-in-picture; clipboard-write; encrypted-media" referrerpolicy="strict-origin-when-cross-origin"></iframe>
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
                        @endforeach
                    </div>
                    <div class="d-flex justify-content-center mt-80">
                        <div class="tp-btn-group tp-btn-vp-group tp-btn-vp-group-primary">
                            @php $portfolioCta = (!empty($sections['portfolio']['cta_link']) && $sections['portfolio']['cta_link'] !== '#') ? $sections['portfolio']['cta_link'] : route('portfolio.index'); @endphp
                            <a class="tp-btn-circle" href="{{ $portfolioCta }}">
                                <svg width="14" height="14" viewBox="0 0 14 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M2.41379 3.30208C5.97452 3.05821 10.6092 1.55558 14 0C12.4438 3.39014 10.9406 8.02425 10.6973 11.585L8.35765 6.59331L1.14783 13.8037C1.02165 13.9295 0.850656 14.0001 0.672431 14C0.539461 14 0.409486 13.9605 0.298934 13.8866C0.188382 13.8128 0.102217 13.7077 0.0513353 13.5849C0.000453949 13.462 -0.0128613 13.3269 0.013072 13.1965C0.0390053 13.066 0.103024 12.9462 0.197034 12.8522L7.40683 5.64241L2.41379 3.30208Z" fill="currentColor" />
                                </svg>
                            </a>
                            <a class="tp-btn-2 tp-btn-primary" href="{{ $portfolioCta }}">{{ $sections['portfolio']['cta_text'] ?? __('front.portfolio.cta_text') }}</a>
                            <a class="tp-btn-circle" href="{{ $portfolioCta }}">
                                <svg width="14" height="14" viewBox="0 0 14 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M2.41379 3.30208C5.97452 3.05821 10.6092 1.55558 14 0C12.4438 3.39014 10.9406 8.02425 10.6973 11.585L8.35765 6.59331L1.14783 13.8037C1.02165 13.9295 0.850656 14.0001 0.672431 14C0.539461 14 0.409486 13.9605 0.298934 13.8866C0.188382 13.8128 0.102217 13.7077 0.0513353 13.5849C0.000453949 13.462 -0.0128613 13.3269 0.013072 13.1965C0.0390053 13.066 0.103024 12.9462 0.197034 12.8522L7.40683 5.64241L2.41379 3.30208Z" fill="currentColor" />
                                </svg>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
