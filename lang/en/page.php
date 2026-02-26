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
        'navigation' => 'Pages',

        // List tabs
        'tab_all' => 'All',
        'tab_published' => 'Published',
        'tab_draft' => 'Draft',

        // Nav badge
        'nav_badge_tooltip' => 'Draft pages',

        // Form tabs
        'tab_content' => 'Content',
        'tab_media' => 'Media',
        'tab_settings' => 'Settings',
        'tab_seo' => 'SEO',

        // Form fields
        'title' => 'Title',
        'slug' => 'Slug',
        'body' => 'Content',
        'excerpt' => 'Excerpt',
        'excerpt_helper' => 'A short summary displayed in search results and page previews.',
        'cover_image' => 'Cover Image',
        'cover_image_alt' => 'Cover Image Alt Text',
        'cover_image_alt_helper' => 'Describe the image for accessibility and SEO.',
        'status' => 'Status',
        'published_at' => 'Publish Date',
        'published_at_helper' => 'Leave empty to publish immediately when status is set to published.',
        'sort_order' => 'Sort Order',
        'sort_order_helper' => 'Lower numbers appear first in menus.',
        'show_in_header' => 'Show in Header',
        'show_in_header_helper' => 'Display this page as a link in the main navigation header.',
        'show_in_footer' => 'Show in Footer',
        'show_in_footer_helper' => 'Display this page as a link in the site footer.',
        'footer_position' => 'Footer Position',
        'footer_position_nav' => 'Footer Navigation',
        'footer_position_legal' => 'Footer Copyright Row',
        'footer_position_helper' => 'Choose where this page link appears in the footer.',

        // Statuses
        'status_draft' => 'Draft',
        'status_published' => 'Published',

        // SEO
        'meta_title' => 'Meta Title',
        'meta_title_helper' => 'Recommended: 60 characters or fewer for search engines.',
        'meta_description' => 'Meta Description',
        'meta_description_helper' => 'Recommended: 160 characters or fewer for search engines.',

        // Table columns
        'col_title' => 'Title',
        'col_status' => 'Status',
        'col_header' => 'Header',
        'col_footer' => 'Footer',
        'col_sort_order' => 'Order',
        'col_published_at' => 'Published',
    ],

    /*
    |--------------------------------------------------------------------------
    | Frontend
    |--------------------------------------------------------------------------
    */
    'frontend' => [
        'page_title' => ':title - :site_name',
        'back_to_home' => 'Back to home',
    ],

];
