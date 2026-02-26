@if($testimonials->isNotEmpty())
<div class="tp-testimonial-area pt-155 pb-160">
    <div class="container-fluid container-1524">
        <div class="row">
            <div class="col-12">
                <div class="text-center mb-70">
                    <h2 class="tp-portfolio-vp-bigtitle tp-ff-morganite-bold text-uppercase ls-0 tp_text_invert invert-white mb-30 tp-text-common-white">{{ __('testimonial.frontend.headline') }}</h2>
                    <p class="tp-ff-dm fw-500 fs-28 fs-md-22 lh-140-per ls-m-2 tp-text-grey-5">{{ __('testimonial.frontend.subheadline') }}</p>
                </div>
            </div>
        </div>
        <div class="row justify-content-center">
            @foreach($testimonials as $testimonial)
            <div class="col-lg-4 col-md-6 mb-40">
                <div class="tp-bg-common-black-5 p-40 tp-round-20 h-100 d-flex flex-column">
                    <div class="mb-25">
                        <svg width="32" height="24" viewBox="0 0 32 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M0 24V14.4C0 11.7333 0.4 9.33333 1.2 7.2C2.05556 5.06667 3.17778 3.2 4.56667 1.6L8.93333 0C7.6 1.86667 6.6 3.86667 5.93333 6C5.32222 8.08 5.01667 10.2667 5.01667 12.56V13.2H12.8V24H0ZM19.2 24V14.4C19.2 11.7333 19.6 9.33333 20.4 7.2C21.2556 5.06667 22.3778 3.2 23.7667 1.6L28.1333 0C26.8 1.86667 25.8 3.86667 25.1333 6C24.5222 8.08 24.2167 10.2667 24.2167 12.56V13.2H32V24H19.2Z" fill="currentColor" class="tp-text-grey-5" opacity="0.2"/>
                        </svg>
                    </div>
                    <p class="tp-ff-dm fw-400 fs-18 lh-180-per tp-text-grey-5 mb-30 flex-grow-1">{{ $testimonial->quote }}</p>
                    <div class="d-flex align-items-center">
                        @if($testimonial->image)
                        <div class="mr-15">
                            <img class="rounded-circle" src="/storage/{{ $testimonial->image }}" alt="{{ $testimonial->image_alt ?: $testimonial->name }}" width="48" height="48" loading="lazy" style="object-fit: cover;">
                        </div>
                        @endif
                        <div>
                            <h4 class="tp-ff-inter fw-600 fs-16 tp-text-common-white mb-0">{{ $testimonial->name }}</h4>
                            @if($testimonial->byline)
                            <span class="tp-ff-inter fw-400 fs-14 tp-text-grey-5">{{ $testimonial->byline }}</span>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>
@endif
