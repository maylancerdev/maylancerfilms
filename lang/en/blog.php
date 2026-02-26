<?php

declare(strict_types=1);

return [

    /*
    |--------------------------------------------------------------------------
    | Admin
    |--------------------------------------------------------------------------
    */
    'admin' => [
        // Navigation
        'navigation' => 'Posts',

        // List tabs
        'tab_all' => 'All Posts',
        'tab_published' => 'Published',
        'tab_draft' => 'Drafts',
        'tab_scheduled' => 'Scheduled',

        // Nav badge
        'nav_badge_tooltip' => 'Draft posts',

        // Form tabs
        'tab_content' => 'Content',
        'tab_media' => 'Media',
        'tab_publishing' => 'Publishing',
        'tab_seo' => 'SEO',

        // Form fields
        'title' => 'Title',
        'slug' => 'Slug',
        'body' => 'Content',
        'excerpt' => 'Excerpt',
        'excerpt_helper' => 'A short summary shown on the blog listing page.',
        'cover_image' => 'Cover Image',
        'cover_image_alt' => 'Cover Image Alt Text',
        'cover_image_alt_helper' => 'Describe the image for accessibility and SEO.',
        'category' => 'Category',
        'tags_label' => 'Tags',
        'status' => 'Status',
        'is_featured' => 'Featured',
        'is_featured_helper' => 'Featured posts are highlighted on the blog page.',
        'published_at' => 'Publish Date',
        'published_at_helper' => 'Schedule a future publish date or leave empty to publish immediately.',
        'author' => 'Author',

        // Statuses
        'status_draft' => 'Draft',
        'status_published' => 'Published',
        'status_scheduled' => 'Scheduled',

        // SEO
        'meta_title' => 'Meta Title',
        'meta_title_helper' => 'Override the default page title for search engines.',
        'meta_description' => 'Meta Description',
        'meta_description_helper' => 'A brief description for search engine results.',

        // OG Preview
        'og_preview_label' => 'Social Media Preview',
        'og_preview_no_image' => 'No cover image',
        'og_preview_title_placeholder' => 'Post title will appear here',
        'og_preview_desc_placeholder' => 'Meta description or excerpt will appear here',

        // Filters
        'filter_status' => 'Status',
        'filter_category' => 'Category',

        // Table columns
        'col_title' => 'Title',
        'col_author' => 'Author',
        'col_category' => 'Category',
        'col_status' => 'Status',
        'col_featured' => 'Featured',
        'col_published_at' => 'Published',
    ],

    /*
    |--------------------------------------------------------------------------
    | Frontend
    |--------------------------------------------------------------------------
    */
    'frontend' => [
        'blog' => 'Blog',
        'all_posts' => 'Insights and updates from the :site_name team.',
        'featured' => 'Featured',
        'read_more' => 'Read more',
        'published_on' => ':date',
        'by_author' => 'By :name',
        'in_category' => 'in :category',
        'tagged_with' => 'Tagged with',
        'search_placeholder' => 'Search posts...',
        'all_categories' => 'All',
        'no_posts' => 'No posts found.',
        'tagged_posts' => 'Posts tagged ":name"',
        'clear_tag' => 'Clear filter',
        'back_to_blog' => 'Back to blog',
        'related_posts' => 'Related Posts',
        'page_title' => 'Blog',
        'meta_description' => 'Insights and updates from the :site_name team on video production, filmmaking, and creative storytelling.',
        'search_label' => 'Search',
        'search_button' => 'Search',
        'min_read' => ':min min read',
        'share' => 'Share',
        'share_twitter' => 'Share on X',
        'share_facebook' => 'Share on Facebook',
        'share_linkedin' => 'Share on LinkedIn',
        'copy_link' => 'Copy Link',
        'link_copied' => 'Link copied!',
        'prev_post' => 'Previous',
        'next_post' => 'Next',
    ],

];
