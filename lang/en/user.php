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
        'navigation' => 'Users',

        // Form fields
        'name' => 'Name',
        'email' => 'Email',
        'password' => 'Password',
        'password_helper' => 'Leave empty to keep the current password.',

        // Permissions
        'is_admin' => 'Administrator',
        'is_admin_helper' => 'Administrators have full access to the admin panel.',

        // Form sections
        'section_account' => 'Account Information',
        'section_security' => 'Security',
        'section_permissions' => 'Permissions',

        // Table columns
        'col_name' => 'Name',
        'col_email' => 'Email',
        'col_admin' => 'Admin',
        'col_created_at' => 'Joined',
    ],

];
