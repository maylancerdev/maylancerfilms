<div id="cookie-consent" class="d-none" style="position:fixed;bottom:0;left:0;right:0;z-index:9999;padding:20px;background:rgba(0,0,0,0.95);border-top:1px solid rgba(255,255,255,0.1);">
    <div class="container-fluid container-1524 d-flex flex-wrap align-items-center justify-content-between gap-3">
        <p class="tp-ff-dm fw-400 fs-15 tp-text-grey-5 mb-0 flex-grow-1">
            {{ __('front.cookie.message') }}
            <a href="{{ route('page.show', 'privacy-policy') }}" class="tp-text-theme-primary hover-text-white fw-500">{{ __('front.cookie.policy') }}</a>
        </p>
        <div class="d-flex gap-2 flex-shrink-0">
            <button type="button" onclick="cookieConsent('declined')" class="tp-ff-inter fw-600 fs-14 tp-text-grey-5 bg-transparent border border-secondary rounded-3 px-4 py-2" style="cursor:pointer;">{{ __('front.cookie.decline') }}</button>
            <button type="button" onclick="cookieConsent('accepted')" class="tp-ff-inter fw-600 fs-14 tp-text-common-white tp-bg-theme-primary border-0 rounded-3 px-4 py-2" style="cursor:pointer;">{{ __('front.cookie.accept') }}</button>
        </div>
    </div>
</div>
<script>
(function(){
    if(localStorage.getItem('cookie_consent'))return;
    document.getElementById('cookie-consent').classList.remove('d-none');
})();
function cookieConsent(v){
    localStorage.setItem('cookie_consent',v);
    document.getElementById('cookie-consent').classList.add('d-none');
}
</script>
