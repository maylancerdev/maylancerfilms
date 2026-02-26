<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Enums\PostStatus;
use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\View\View;

class BlogController extends Controller
{
    public function index(Request $request): View
    {
        $query = Post::query()
            ->latestPublished()
            ->with(['author', 'category', 'tags']);

        if ($search = $request->string('search')->trim()->value()) {
            $query->where(function ($q) use ($search) {
                $q->where('title', 'like', '%'.$search.'%')
                    ->orWhere('excerpt', 'like', '%'.$search.'%')
                    ->orWhere('body', 'like', '%'.$search.'%');
            });
        }

        $activeCategory = $request->string('category')->trim()->value();
        if ($activeCategory) {
            $query->whereHas('category', fn ($q) => $q->where('slug', $activeCategory));
        }

        $categories = Category::query()
            ->ordered()
            ->withCount(['posts' => fn ($q) => $q->published()])
            ->get();

        return view('blog.index', [
            'posts' => $query->paginate(9)->withQueryString(),
            'categories' => $categories,
            'activeCategory' => $activeCategory ?: null,
        ]);
    }

    public function tag(Tag $tag): View
    {
        $posts = $tag->posts()
            ->latestPublished()
            ->with(['author', 'category', 'tags'])
            ->paginate(9);

        $categories = Category::query()
            ->ordered()
            ->withCount(['posts' => fn ($q) => $q->published()])
            ->get();

        return view('blog.index', [
            'posts' => $posts,
            'categories' => $categories,
            'activeCategory' => null,
            'activeTag' => $tag,
        ]);
    }

    public function show(Post $post): View
    {
        abort_unless(
            $post->status === PostStatus::Published && $post->published_at?->lte(now()),
            404,
        );

        $post->load(['author', 'category', 'tags']);

        $relatedPosts = Post::query()
            ->published()
            ->where('category_id', $post->category_id)
            ->where('id', '!=', $post->id)
            ->latestPublished()
            ->with(['author', 'category'])
            ->limit(3)
            ->get();

        $prevPost = Post::query()
            ->published()
            ->where('published_at', '<', $post->published_at)
            ->orderByDesc('published_at')
            ->first(['id', 'title', 'slug']);

        $nextPost = Post::query()
            ->published()
            ->where('published_at', '>', $post->published_at)
            ->orderBy('published_at')
            ->first(['id', 'title', 'slug']);

        return view('blog.show', [
            'post' => $post,
            'relatedPosts' => $relatedPosts,
            'prevPost' => $prevPost,
            'nextPost' => $nextPost,
        ]);
    }
}
