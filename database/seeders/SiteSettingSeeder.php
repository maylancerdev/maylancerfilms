<?php

declare(strict_types=1);

namespace Database\Seeders;

use App\Models\SiteSetting;
use Illuminate\Database\Seeder;

class SiteSettingSeeder extends Seeder
{
    public function run(): void
    {
        $settings = [
            'site_name' => 'Maylancer Films',
            'site_description' => 'A bold, global media and film production company crafting award-winning stories, campaigns, and visual experiences for brands worldwide.',
            'phone' => '+1 (800) 555-0199',
            'email' => 'hello@maylancerfilms.com',
            'address' => '1200 Creative Boulevard, Suite 400, Los Angeles, CA 90028',
            'social_twitter' => '#',
            'social_instagram' => '#',
            'social_linkedin' => '#',
            'social_dribbble' => '#',
            'default_meta_title' => 'Maylancer Films — Film Production & Creative Storytelling',
            'default_meta_description' => 'From concept to final cut, Maylancer Films delivers award-winning video production, cinematic storytelling, and creative content for brands worldwide.',
            'copyright' => 'Copyright :year Maylancer Films, All Rights Reserved.',
            'privacy_url' => '#',
            'terms_url' => '#',
            'logo' => '',
            'favicon' => '',
        ];

        foreach ($settings as $key => $value) {
            SiteSetting::query()->updateOrCreate(
                ['key' => $key],
                ['value' => $value],
            );
        }
    }
}
