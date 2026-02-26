<?php

declare(strict_types=1);

namespace Database\Seeders;

use App\Models\HomepageSection;
use Illuminate\Database\Seeder;

class HomepageSectionSeeder extends Seeder
{
    public function run(): void
    {
        $sections = [
            [
                'slug' => 'hero',
                'title' => 'Hero',
                'sort_order' => 1,
                'content' => [
                    'title' => 'Film Production',
                    'description' => 'From concept to final cut, we bring bold visions to life through cinematic storytelling, cutting-edge production, and relentless creative ambition.',
                    'cta_text' => 'Scroll to Explore',
                    'cta_link' => '#awards',
                    'images' => [],
                ],
            ],
            [
                'slug' => 'video',
                'title' => 'Video',
                'sort_order' => 2,
                'content' => [
                    'video_url' => 'https://html.aqlova.com/videos/aleric/video-production.mp4',
                ],
            ],
            [
                'slug' => 'awards',
                'title' => 'Awards',
                'sort_order' => 3,
                'content' => [
                    'images' => [],
                ],
            ],
            [
                'slug' => 'services',
                'title' => 'Services',
                'sort_order' => 4,
                'content' => [
                    'headline' => 'What We Do',
                    'description' => 'From concept to screen, we deliver end-to-end production services that transform ideas into award-winning visual experiences.',
                    'items' => [
                        ['title' => 'Film & Television Production', 'image' => null, 'link' => '/film-television-production'],
                        ['title' => 'Scriptwriting & Storyboarding', 'image' => null, 'link' => '/scriptwriting-storyboarding'],
                        ['title' => 'Motion Graphics & Animation', 'image' => null, 'link' => '/motion-graphics-animation'],
                        ['title' => 'Brand & Commercial Content', 'image' => null, 'link' => '/brand-commercial-content'],
                        ['title' => 'Documentary & Lifestyle Films', 'image' => null, 'link' => '/documentary-lifestyle-films'],
                    ],
                ],
            ],
            [
                'slug' => 'portfolio',
                'title' => 'Portfolio',
                'sort_order' => 5,
                'content' => [
                    'headline' => 'Selected Works',
                    'description' => 'Every frame tells a story. Explore our latest work — where creative vision meets cinematic precision.',
                    'cta_text' => 'View All Works',
                    'cta_link' => '#',
                    'items' => [
                        ['title_top' => 'Diverse Industries', 'title_bottom' => 'One Visual Language', 'video_url' => 'https://player.vimeo.com/video/1099238062?background=1&loop=1&muted=1&controls=0&autoplay=0', 'link' => '/diverse-industries-one-visual-language'],
                        ['title_top' => 'Cinematic Quality', 'title_bottom' => 'Meets Strategic Goals', 'video_url' => 'https://player.vimeo.com/video/1099238103?background=1&loop=1&muted=1&controls=0&autoplay=0', 'link' => '/cinematic-quality-meets-strategic-goals'],
                        ['title_top' => 'Behind Every', 'title_bottom' => 'Frame A Purpose', 'video_url' => 'https://player.vimeo.com/video/1099238085?background=1&loop=1&muted=1&controls=0&autoplay=0', 'link' => '/behind-every-frame-a-purpose'],
                        ['title_top' => 'Stories That Move', 'title_bottom' => 'Audiences Forward', 'video_url' => 'https://player.vimeo.com/video/1099238062?background=1&loop=1&muted=1&controls=0&autoplay=0', 'link' => '/stories-that-move-audiences-forward'],
                    ],
                ],
            ],
            [
                'slug' => 'blog_section',
                'title' => 'Blog Section',
                'sort_order' => 6,
                'content' => [
                    'title' => 'Thoughts and Insights',
                ],
            ],
        ];

        foreach ($sections as $section) {
            HomepageSection::query()->updateOrCreate(
                ['slug' => $section['slug']],
                [
                    'title' => $section['title'],
                    'content' => $section['content'],
                    'is_active' => true,
                    'sort_order' => $section['sort_order'],
                ],
            );
        }
    }
}
