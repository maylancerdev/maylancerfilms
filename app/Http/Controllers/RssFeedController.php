<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\SiteSetting;
use Illuminate\Http\Response;

class RssFeedController extends Controller
{
    public function __invoke(): Response
    {
        $posts = Post::published()->latestPublished()->with('author')->limit(20)->get();
        $siteName = SiteSetting::get('site_name', config('app.name'));

        $content = view('feed', compact('posts', 'siteName'))->render();

        return response($content, 200, [
            'Content-Type' => 'application/rss+xml',
        ]);
    }
}
