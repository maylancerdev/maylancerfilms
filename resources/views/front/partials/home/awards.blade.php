@if(!isset($sections['awards']) || ($sections['awards']['is_active'] ?? true))
@php
    $awardsImages = $sections['awards']['images'] ?? [];
    $awardsFallbacks = ['awards/vp/aw01-black.jpg','awards/vp/aw02-black.jpg','awards/vp/aw03-black.jpg','awards/vp/aw04-black.jpg','awards/vp/aw05-black.jpg','awards/vp/aw06-black.jpg'];
    $awardsSources = !empty($awardsImages)
        ? collect($awardsImages)->map(fn($img) => '/storage/'.$img)->all()
        : collect($awardsFallbacks)->map(fn($f) => Vite::image($f))->all();
    $awardsParallax = [
        ['start' => 'top 120%', 'stop' => '600%'],
        ['start' => 'top 90%', 'stop' => '1100%'],
        ['start' => 'top 90%', 'stop' => '400%'],
        ['start' => 'top 120%', 'stop' => '600%'],
        ['start' => 'top 100%', 'stop' => '750%'],
        ['start' => 'top 40%', 'stop' => '300%'],
    ];
@endphp
<div id="awards" class="tp-awards-vp-content-row text-align-center dark-section" data-bgcolor="#0c0c0c">
    <div class="tp-awards-vp-move-thumbs-wrapper">
        <div class="tp-awards-vp-start-thumbs-wrapper">
            @foreach($awardsSources as $i => $src)
            <div class="tp-awards-vp-start-move-thumb" data-start="{{ $awardsParallax[$i % count($awardsParallax)]['start'] }}" data-stop="{{ $awardsParallax[$i % count($awardsParallax)]['stop'] }}">
                <div class="tp-awards-vp-move-thumb-inner">
                    <div class="tp-awards-vp-section-image">
                        <img src="{{ $src }}" class="item-image" alt="" loading="lazy">
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        <div class="tp-awards-vp-end-thumbs-wrapper">
            @foreach($awardsSources as $src)
            <div class="tp-awards-vp-end-move-thumb"></div>
            @endforeach
        </div>
    </div>
</div>
@endif
