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
        'navigation' => 'Contacts',

        // Form fields
        'name' => 'Name',
        'email' => 'Email',
        'phone' => 'Phone',
        'subject' => 'Subject',
        'message' => 'Message',
        'status' => 'Status',

        // Statuses
        'status_new' => 'New',
        'status_reviewed' => 'Reviewed',
        'status_resolved' => 'Resolved',

        // Table columns
        'col_name' => 'Name',
        'col_email' => 'Email',
        'col_message' => 'Message',
        'col_status' => 'Status',
        'col_date' => 'Date',
    ],

    /*
    |--------------------------------------------------------------------------
    | Mail — Admin Notification
    |--------------------------------------------------------------------------
    */
    'mail' => [
        'subject' => 'New contact message from :name',
        'heading' => 'New Contact Form Submission',
        'intro' => 'You have received a new message through the contact form on your website.',
        'from_label' => 'From',
        'email_label' => 'Email',
        'message_label' => 'Message',
        'view_in_admin' => 'View in Admin Panel',
        'regards' => 'Best regards',

        // Auto-reply to user
        'auto_reply_subject' => 'We received your message — :site_name',
        'auto_reply_greeting' => 'Hello :name,',
        'auto_reply_body' => 'Thank you for reaching out to :site_name. We appreciate you taking the time to contact us.',
        'auto_reply_confirmation' => 'Your message has been received and a member of our team will review it shortly. We typically respond within 24–48 business hours.',
        'auto_reply_your_message' => 'Your message',
        'auto_reply_meanwhile' => 'In the meantime, feel free to reach us directly:',
        'auto_reply_phone' => 'Phone',
        'auto_reply_email' => 'Email',
        'auto_reply_warm_regards' => 'Warm regards',
        'auto_reply_team' => 'The :site_name Team',
        'all_rights' => 'All rights reserved.',
    ],

    /*
    |--------------------------------------------------------------------------
    | Frontend
    |--------------------------------------------------------------------------
    */
    'frontend' => [
        'page_title' => 'Contact Us',
        'meta_description' => 'Get in touch with the :site_name team. We\'d love to hear from you.',
        'headline' => 'Get In Touch',
        'subheadline' => 'Have a project in mind or want to collaborate? We\'d love to hear from you. Drop us a message and our team will get back to you shortly.',
        'name' => 'Your Name',
        'email' => 'Email Address',
        'phone' => 'Phone Number (Optional)',
        'subject' => 'Subject',
        'message' => 'Message',
        'message_placeholder' => 'Tell us about your project or how we can help...',
        'submit' => 'Send Message',

        // Contact info labels
        'info_title' => 'Contact Information',
        'info_description' => 'Reach out to us through any of the channels below, or fill in the form and we\'ll get back to you within 24 hours.',
        'info_phone' => 'Phone',
        'info_email' => 'Email',
        'info_address' => 'Address',
        'info_follow' => 'Follow Us',

        // Success
        'success_title' => 'Message Sent Successfully!',
        'success_message' => 'Thank you for contacting us. We\'ve received your message and sent a confirmation to your email. Our team will review your inquiry and get back to you within 24–48 business hours.',
        'success_cta' => 'Back to Home',
        'error_message' => 'Something went wrong. Please try again.',
    ],

];
