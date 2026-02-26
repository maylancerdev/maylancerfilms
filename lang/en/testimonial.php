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
        'navigation' => 'Testimonials',

        // Form fields
        'quote' => 'Quote',
        'name' => 'Name',
        'byline' => 'Byline',
        'byline_helper' => 'Role and company, e.g. "Director at Studio X".',
        'image' => 'Photo',
        'image_alt' => 'Photo Alt Text',
        'image_alt_helper' => 'Describe the photo for accessibility and SEO.',
        'is_featured' => 'Featured',
        'is_featured_helper' => 'The featured testimonial appears prominently with a large photo.',
        'is_active' => 'Active',
        'is_active_helper' => 'Inactive testimonials are hidden from the site.',
        'sort_order' => 'Sort Order',
        'sort_order_helper' => 'Lower numbers appear first.',

        // Table columns
        'col_name' => 'Name',
        'col_quote' => 'Quote',
        'col_featured' => 'Featured',
        'col_active' => 'Active',
        'col_sort_order' => 'Order',
    ],

    /*
    |--------------------------------------------------------------------------
    | Frontend
    |--------------------------------------------------------------------------
    */
    'frontend' => [
        'headline' => 'What Our Clients Say',
        'subheadline' => 'Hear from the brands and creatives we have had the privilege of working with.',
    ],

];
