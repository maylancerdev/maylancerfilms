<div class="tp-hero-area p-relative fix pre-header">
    @php $heroImages = $sections['hero']['images'] ?? []; @endphp
    @if(!empty($heroImages))
    <div class="content z-index-2 d-none d-md-block">
        @foreach($heroImages as $img)
        <div class="content__img">
            <div class="content__img-inner" style="background-image:url(/storage/{{ $img }})"></div>
        </div>
        @endforeach
    </div>
    @endif
    <div class="tp-hero-vp-spacing">
        <div class="container-fluid container-1824 containers">
            <div class="row">
                <div class="col-12">
                    <div class="tp-hero-vp-content mb-105 text-center">
                        <h2 class="tp-hero-vp-title tp-ff-morganite-bold text-uppercase tp-text-common-white ls-0 text-scale-anim">{{ $sections['hero']['title'] ?? __('front.hero.title') }}</h2>
                    </div>
                </div>
            </div>
            <div class="row align-items-end">
                <div class="col-lg-4">
                    <div class="tp-hero-vp-btn smooth mb-30">
                        <a href="{{ $sections['hero']['cta_link'] ?? '#awards' }}" class="tp-ff-dm lh-1 align-items-center fw-600 fs-18 ls-m-5 tp-text-grey-2 hover-text-white d-flex">{{ $sections['hero']['cta_text'] ?? __('front.hero.cta_text') }}
                            <svg class="ml-10 mt-5" width="14" height="9" viewBox="0 0 14 9" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M1 1L7.22222 7L13 1" stroke="currentColor" stroke-width="2" stroke-linecap="round" />
                            </svg>
                        </a>
                    </div>
                </div>
                <div class="col-lg-8">
                    <div class="text-lg-end mb-30">
                        <p class="tp-ff-dm fw-500 fs-24 lh-140-per ls-m-2 tp-text-grey-2">{{ $sections['hero']['description'] ?? __('front.hero.description') }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
