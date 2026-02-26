<?php

declare(strict_types=1);

namespace App\View\Composers;

use App\Models\Page;
use App\Models\SiteSetting;
use Illuminate\Support\Facades\Cache;
use Illuminate\View\View;

class SettingsComposer
{
    public function compose(View $view): void
    {
        $view->with([
            'settings' => Cache::remember('site_settings', 3600, fn () => SiteSetting::query()->pluck('value', 'key')->toArray()),
            'headerPages' => Cache::remember('header_pages', 3600, fn () => Page::headerPages()->ordered()->get()),
            'footerPages' => Cache::remember('footer_nav_pages', 3600, fn () => Page::footerNavPages()->ordered()->get()),
            'footerLegalPages' => Cache::remember('footer_legal_pages', 3600, fn () => Page::footerLegalPages()->ordered()->get()),
        ]);
    }
}
