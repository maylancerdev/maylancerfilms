<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Models\Page;
use App\Models\Post;
use Illuminate\Http\Response;

class SitemapController extends Controller
{
    public function __invoke(): Response
    {
        $pages = Page::published()->ordered()->get();
        $posts = Post::published()->latestPublished()->get();

        $content = view('sitemap', compact('pages', 'posts'))->render();

        return response($content, 200, [
            'Content-Type' => 'application/xml',
        ]);
    }
}
