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
        'navigation' => 'FAQs',

        // Form fields
        'question' => 'Question',
        'answer' => 'Answer',
        'answer_helper' => 'The answer shown when the question is expanded.',
        'is_active' => 'Active',
        'is_active_helper' => 'Inactive FAQs are hidden from the site.',
        'sort_order' => 'Sort Order',
        'sort_order_helper' => 'Lower numbers appear first.',

        // Table columns
        'col_question' => 'Question',
        'col_active' => 'Active',
        'col_sort_order' => 'Order',
    ],

    /*
    |--------------------------------------------------------------------------
    | Frontend
    |--------------------------------------------------------------------------
    */
    'frontend' => [
        'headline' => 'Questions & Answers',
        'subheadline' => 'Everything you need to know about working with us.',
    ],

];
