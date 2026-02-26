<?php

declare(strict_types=1);

return [

    /*
    |--------------------------------------------------------------------------
    | Admin -- Site Settings
    |--------------------------------------------------------------------------
    */
    'admin' => [
        // Navigation
        'navigation' => 'Site Settings',
        'brand_name' => 'Admin Panel',

        // General section
        'general' => 'General',
        'site_name' => 'Site Name',
        'site_name_helper' => 'Displayed in the browser tab and panel header.',
        'site_description' => 'Site Description',
        'site_description_helper' => 'Used in meta tags and dashboard descriptions.',

        // Branding section
        'branding' => 'Branding',
        'logo' => 'Logo (Light)',
        'logo_helper' => 'Used on dark backgrounds (header, footer). Recommended size: 200x50px.',
        'logo_dark' => 'Logo (Dark)',
        'logo_dark_helper' => 'Used on light backgrounds (offcanvas sidebar). Recommended size: 200x50px.',
        'favicon' => 'Favicon',
        'favicon_helper' => 'Browser tab icon. Recommended size: 32x32px.',
        'og_image' => 'OG Image',
        'og_image_helper' => 'Default image used when sharing pages on social media. Recommended size: 1200x630px.',

        // Contact Info section
        'contact_info' => 'Contact Info',
        'phone' => 'Phone',
        'email' => 'Email',
        'address' => 'Address',

        // Social Media section
        'social_media' => 'Social Media',
        'social_twitter' => 'Twitter URL',
        'social_twitter_helper' => 'Leave blank to hide the Twitter icon in the footer.',
        'social_instagram' => 'Instagram URL',
        'social_instagram_helper' => 'Leave blank to hide the Instagram icon in the footer.',
        'social_linkedin' => 'LinkedIn URL',
        'social_linkedin_helper' => 'Leave blank to hide the LinkedIn icon in the footer.',
        'social_dribbble' => 'Dribbble URL',
        'social_dribbble_helper' => 'Leave blank to hide the Dribbble icon in the footer.',

        // SEO Defaults section
        'seo_defaults' => 'SEO Defaults',
        'default_meta_title' => 'Default Meta Title',
        'default_meta_title_helper' => 'Used when no page-specific meta title is set.',
        'default_meta_description' => 'Default Meta Description',
        'default_meta_description_helper' => 'Used when no page-specific meta description is set.',

        // Analytics section
        'analytics' => 'Analytics',
        'analytics_code' => 'Analytics Code',
        'analytics_code_helper' => 'Paste your Google Analytics, Plausible, or any tracking script here. It will be added to the <head> of every page.',

        // Footer section
        'footer' => 'Footer',
        'copyright' => 'Copyright Text',
        'copyright_helper' => 'Displayed in the site footer.',
        'privacy_url' => 'Privacy Policy URL',
        'terms_url' => 'Terms of Use URL',
    ],

    // Actions
    'save' => 'Save Settings',
    'saved' => 'Settings saved.',

];
