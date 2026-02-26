<?php

namespace App\Http\Controllers;

use App\Models\HomepageSection;
use App\Models\Post;
use App\Models\Testimonial;
use Illuminate\Support\Facades\Cache;

class FrontController extends Controller
{
    public function __invoke()
    {
        $sections = Cache::remember('homepage_sections', 3600, fn () => HomepageSection::query()
            ->active()
            ->ordered()
            ->get()
            ->keyBy('slug')
            ->map->content);

        $latestPosts = Post::query()
            ->published()
            ->latestPublished()
            ->with(['author', 'category'])
            ->limit(3)
            ->get();

        $testimonials = Cache::remember('homepage_testimonials', 3600, fn () => Testimonial::query()
            ->active()
            ->featured()
            ->ordered()
            ->get());

        return view('front.index', compact('sections', 'latestPosts', 'testimonials'));
    }
}
