<?php

declare(strict_types=1);

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            HomepageSectionSeeder::class,
            SiteSettingSeeder::class,
            ServicePageSeeder::class,
            AboutPageSeeder::class,
            PortfolioPageSeeder::class,
            AdminUserSeeder::class,
            BlogPostSeeder::class,
            TestimonialSeeder::class,
            FaqSeeder::class,
            TeamMemberSeeder::class,
            LegalPageSeeder::class,
        ]);
    }
}
