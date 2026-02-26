<?php

namespace App\Providers;

use App\Models\HomepageSection;
use App\Models\Page;
use App\Models\SiteSetting;
use App\Models\Testimonial;
use App\Observers\CacheInvalidationObserver;
use App\View\Composers\SettingsComposer;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Vite;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Vite::macro('image', fn (string $asset) => $this->asset("resources/images/{$asset}"));
        Vite::macro('js', fn (string $asset) => $this->asset("resources/js/{$asset}"));

        View::composer('layouts.*', SettingsComposer::class);

        HomepageSection::observe(CacheInvalidationObserver::class);
        SiteSetting::observe(CacheInvalidationObserver::class);
        Page::observe(CacheInvalidationObserver::class);
        Testimonial::observe(CacheInvalidationObserver::class);
    }
}
