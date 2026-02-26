<?php echo '<?xml version="1.0" encoding="UTF-8"?>'; ?>

<rss version="2.0" xmlns:atom="http://www.w3.org/2005/Atom">
    <channel>
        <title>{{ $siteName }} — Blog</title>
        <link>{{ route('blog.index') }}</link>
        <description>{{ __('blog.frontend.meta_description', ['site_name' => $siteName]) }}</description>
        <language>{{ app()->getLocale() }}</language>
        <atom:link href="{{ url('/blog/feed') }}" rel="self" type="application/rss+xml"/>
        @foreach($posts as $post)
        <item>
            <title>{{ $post->title }}</title>
            <link>{{ route('blog.show', $post->slug) }}</link>
            <guid isPermaLink="true">{{ route('blog.show', $post->slug) }}</guid>
            <pubDate>{{ $post->published_at->toRssString() }}</pubDate>
            @if($post->author)
            <author>{{ $post->author->email }} ({{ $post->author->name }})</author>
            @endif
            <description><![CDATA[{{ $post->excerpt ?? Str::limit(strip_tags($post->body), 300) }}]]></description>
        </item>
        @endforeach
    </channel>
</rss>
