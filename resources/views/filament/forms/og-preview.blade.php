<div>
    <p class="text-sm font-medium text-gray-400 mb-3">{{ __('blog.admin.og_preview_label') }}</p>
    <div style="max-width: 600px; border: 1px solid rgba(255,255,255,0.1); border-radius: 12px; overflow: hidden; background: #1a1a1a;">
        {{-- Image --}}
        <div style="width: 100%; height: 200px; background: #111; display: flex; align-items: center; justify-content: center; overflow: hidden;">
            @if($getState() && is_string($getState()))
                <img src="{{ Storage::disk('public')->url($getState()) }}" style="width: 100%; height: 100%; object-fit: cover;" alt="">
            @else
                <span style="color: #555; font-size: 14px;">{{ __('blog.admin.og_preview_no_image') }}</span>
            @endif
        </div>
        {{-- Text --}}
        <div style="padding: 14px 16px;">
            <p style="font-size: 12px; color: #666; margin: 0 0 4px;">{{ request()->getHost() }}</p>
            <p style="font-size: 15px; font-weight: 600; color: #e4e4e4; margin: 0 0 4px; line-height: 1.3;">
                {{ $getRecord()?->meta_title ?: $getRecord()?->title ?: __('blog.admin.og_preview_title_placeholder') }}
            </p>
            <p style="font-size: 13px; color: #888; margin: 0; line-height: 1.4; display: -webkit-box; -webkit-line-clamp: 2; -webkit-box-orient: vertical; overflow: hidden;">
                {{ $getRecord()?->meta_description ?: $getRecord()?->excerpt ?: __('blog.admin.og_preview_desc_placeholder') }}
            </p>
        </div>
    </div>
</div>
