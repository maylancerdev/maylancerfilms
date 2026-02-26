<?php

declare(strict_types=1);

namespace App\Observers;

use Illuminate\Support\Facades\Cache;

class CacheInvalidationObserver
{
    public function saved($model): void
    {
        $this->flush($model);
    }

    public function deleted($model): void
    {
        $this->flush($model);
    }

    private function flush($model): void
    {
        $class = class_basename($model);

        match ($class) {
            'HomepageSection' => Cache::forget('homepage_sections'),
            'SiteSetting' => Cache::forget('site_settings'),
            'Page' => $this->flushPages(),
            'Testimonial' => Cache::forget('homepage_testimonials'),
            default => null,
        };
    }

    private function flushPages(): void
    {
        Cache::forget('header_pages');
        Cache::forget('footer_pages');
    }
}
