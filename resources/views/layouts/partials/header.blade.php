<header>

    <!-- tp-header-area-start -->
    <div id="header-sticky" class="tp-header-area tp-header-vp-spacing pre-header sticky-black-bg tp-header-blur header-transparent">
        <div class="container-fluid container-1824">
            <div class="row align-items-center">
                <div class="col-xxl-3 col-xl-2 col-lg-4 col-md-4 col-sm-4 col-6">
                    <div class="tp-header-logo">
                        <a href="{{ url('/') }}">
                            @if(!empty($settings['logo']))
                                <img data-width="150" src="/storage/{{ $settings['logo'] }}" alt="{{ $settings['site_name'] ?? config('app.name') }}">
                            @else
                                <img data-width="150" src="{{ Vite::image('logo/logo-white-2.png') }}" alt="{{ $settings['site_name'] ?? config('app.name') }}">
                            @endif
                        </a>
                    </div>
                </div>
                <div class="col-xxl-6 col-xl-7 d-none d-xl-block">
                    <div class="tp-main-menu tp-main-menu-vp tp-header-dropdown dropdown-black-bg d-flex justify-content-center">
                        <nav class="tp-mobile-menu-active">
                            <ul>
                                <li class="">
                                    <a href="{{ route('portfolio.index') }}">{{ __('front.nav.portfolio') }}</a>
                                </li>
                                <li class="">
                                    <a href="{{ route('blog.index') }}">{{ __('front.nav.blog') }}</a>
                                </li>
                                @foreach($headerPages ?? [] as $headerPage)
                                <li class="">
                                    <a href="{{ route('page.show', $headerPage->slug) }}">{{ $headerPage->title }}</a>
                                </li>
                                @endforeach
                            </ul>
                        </nav>
                    </div>
                </div>
                <div class="col-xxl-3 col-xl-3 col-lg-8 col-md-8 col-sm-8 col-6">
                    <div class="tp-header-right d-flex align-items-center justify-content-end">
                        <div class="d-none d-sm-inline-block">
                            <div class="tp-btn-group tp-btn-vp-group">
                                <a class="tp-btn-circle" href="{{ route('contact.show') }}">
                                    <svg width="14" height="14" viewBox="0 0 14 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd" clip-rule="evenodd" d="M2.41379 3.30208C5.97452 3.05821 10.6092 1.55558 14 0C12.4438 3.39014 10.9406 8.02425 10.6973 11.585L8.35765 6.59331L1.14783 13.8037C1.02165 13.9295 0.850656 14.0001 0.672431 14C0.539461 14 0.409486 13.9605 0.298934 13.8866C0.188382 13.8128 0.102217 13.7077 0.0513353 13.5849C0.000453949 13.462 -0.0128613 13.3269 0.013072 13.1965C0.0390053 13.066 0.103024 12.9462 0.197034 12.8522L7.40683 5.64241L2.41379 3.30208Z" fill="currentColor" />
                                    </svg>
                                </a>
                                <a class="tp-btn-2 tp-btn-primary" href="{{ route('contact.show') }}">{{ __('front.nav.contact_us') }}</a>
                                <a class="tp-btn-circle" href="{{ route('contact.show') }}">
                                    <svg width="14" height="14" viewBox="0 0 14 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd" clip-rule="evenodd" d="M2.41379 3.30208C5.97452 3.05821 10.6092 1.55558 14 0C12.4438 3.39014 10.9406 8.02425 10.6973 11.585L8.35765 6.59331L1.14783 13.8037C1.02165 13.9295 0.850656 14.0001 0.672431 14C0.539461 14 0.409486 13.9605 0.298934 13.8866C0.188382 13.8128 0.102217 13.7077 0.0513353 13.5849C0.000453949 13.462 -0.0128613 13.3269 0.013072 13.1965C0.0390053 13.066 0.103024 12.9462 0.197034 12.8522L7.40683 5.64241L2.41379 3.30208Z" fill="currentColor" />
                                    </svg>
                                </a>
                            </div>
                        </div>
                        <button class="tp-menu-bar tp-header-sidebar-btn ml-20 d-xl-none">
                            <span></span>
                            <span></span>
                            <span></span>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- tp-header-area-end -->

</header>
