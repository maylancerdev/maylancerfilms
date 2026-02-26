<?php

declare(strict_types=1);

namespace Database\Seeders;

use App\Enums\PageStatus;
use App\Models\Page;
use Illuminate\Database\Seeder;

class AboutPageSeeder extends Seeder
{
    public function run(): void
    {
        Page::query()->updateOrCreate(
            ['slug' => 'about-us'],
            [
                'title' => 'About Us',
                'body' => <<<'MD'
## Who We Are

Maylancer Films is a bold, global media and film production company dedicated to the art of visual storytelling. From our roots in advertising and branded content, we have evolved into a premier creative studio delivering award-winning stories, campaigns, and visual experiences for brands and audiences worldwide.

### Our Mission

We exist to transform ideas into powerful visual narratives. Every project we take on — whether it's a feature film, a brand campaign, or a documentary — is driven by the same commitment to creative excellence, technical precision, and authentic storytelling.

### What Sets Us Apart

- **Creative Vision** — We approach every project as storytellers first. Strategy, concept, and narrative always lead the creative process
- **End-to-End Production** — From scriptwriting and storyboarding through filming, post-production, and delivery, we handle every stage in-house
- **Cinematic Quality** — We hold every piece of content to the same standard, whether it's a 15-second social clip or a feature-length documentary
- **Global Perspective** — Our team brings diverse perspectives and cultural fluency to every project, creating content that resonates across borders

### Our Team

Our crew includes award-winning directors, cinematographers, editors, colorists, motion designers, and producers. Each brings deep expertise in their craft and a shared passion for pushing creative boundaries.

We believe the best work comes from collaboration — between our team and our clients, between disciplines, and between bold creative ideas and rigorous execution.

### Our Values

| Value | What It Means |
|-------|--------------|
| Storytelling First | Every decision starts with the narrative |
| Relentless Quality | We never compromise on craft |
| Authentic Connection | We create content that feels real and resonates |
| Creative Courage | We push boundaries and challenge conventions |
| Client Partnership | We succeed when our clients succeed |

### Let's Create Something Extraordinary

Whether you're looking for a production partner for your next campaign, a creative team to bring your brand story to life, or a studio to produce your next film — we'd love to hear from you.
MD,
                'excerpt' => 'A bold, global media and film production company dedicated to crafting award-winning stories, campaigns, and visual experiences for brands worldwide.',
                'status' => PageStatus::Published,
                'published_at' => now(),
                'show_in_header' => true,
                'show_in_footer' => true,
                'sort_order' => 1,
                'meta_title' => 'About Us — Maylancer Films',
                'meta_description' => 'Learn about Maylancer Films — a global media and film production company delivering award-winning visual storytelling for brands worldwide.',
            ],
        );
    }
}
