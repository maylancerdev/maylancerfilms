@extends('layouts.app')

@section('title', __('front.error.404_title'))

@section('content')
<div class="tp-contact-spacing pb-160">
    <div class="container-fluid container-1524">
        <div class="row justify-content-center">
            <div class="col-lg-8 text-center">
                <h1 class="tp-ff-morganite-bold text-uppercase ls-0 tp-text-theme-primary mb-20" style="font-size: 300px; line-height: 0.85;">404</h1>
                <h3 class="tp-ff-inter fw-600 fs-32 ls-m-3 tp-text-common-white mb-20">{{ __('front.error.404_heading') }}</h3>
                <p class="tp-ff-dm fw-400 fs-18 lh-160-per tp-text-grey-5 mb-50">{{ __('front.error.404_message') }}</p>
                <div class="tp-btn-group tp-btn-vp-group tp-btn-vp-group-primary">
                    <a class="tp-btn-circle" href="{{ url('/') }}">
                        <svg width="14" height="14" viewBox="0 0 14 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" clip-rule="evenodd" d="M2.41379 3.30208C5.97452 3.05821 10.6092 1.55558 14 0C12.4438 3.39014 10.9406 8.02425 10.6973 11.585L8.35765 6.59331L1.14783 13.8037C1.02165 13.9295 0.850656 14.0001 0.672431 14C0.539461 14 0.409486 13.9605 0.298934 13.8866C0.188382 13.8128 0.102217 13.7077 0.0513353 13.5849C0.000453949 13.462 -0.0128613 13.3269 0.013072 13.1965C0.0390053 13.066 0.103024 12.9462 0.197034 12.8522L7.40683 5.64241L2.41379 3.30208Z" fill="currentColor" />
                        </svg>
                    </a>
                    <a class="tp-btn-2 tp-btn-primary" href="{{ url('/') }}">{{ __('front.error.back_home') }}</a>
                    <a class="tp-btn-circle" href="{{ url('/') }}">
                        <svg width="14" height="14" viewBox="0 0 14 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" clip-rule="evenodd" d="M2.41379 3.30208C5.97452 3.05821 10.6092 1.55558 14 0C12.4438 3.39014 10.9406 8.02425 10.6973 11.585L8.35765 6.59331L1.14783 13.8037C1.02165 13.9295 0.850656 14.0001 0.672431 14C0.539461 14 0.409486 13.9605 0.298934 13.8866C0.188382 13.8128 0.102217 13.7077 0.0513353 13.5849C0.000453949 13.462 -0.0128613 13.3269 0.013072 13.1965C0.0390053 13.066 0.103024 12.9462 0.197034 12.8522L7.40683 5.64241L2.41379 3.30208Z" fill="currentColor" />
                        </svg>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
