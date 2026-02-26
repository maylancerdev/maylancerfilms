<?php

declare(strict_types=1);

namespace Database\Seeders;

use App\Enums\PageStatus;
use App\Models\Page;
use Illuminate\Database\Seeder;

class ServicePageSeeder extends Seeder
{
    public function run(): void
    {
        $pages = [
            [
                'slug' => 'film-television-production',
                'title' => 'Film & Television Production',
                'body' => <<<'MD'
## From Script to Screen

Our film and television production services cover every stage of the creative pipeline — from initial concept development and pre-production planning through principal photography, post-production, and final delivery.

### What We Offer

We work across a wide range of formats and genres, delivering cinematic-quality content for broadcast, streaming platforms, and theatrical release.

- **Feature Films** — Full-length narrative productions with world-class cinematography and storytelling
- **Television Series** — Episodic content for broadcast networks and streaming platforms
- **Short Films** — Compelling narratives crafted for film festivals and digital distribution
- **Music Videos** — Visually striking productions that amplify the artist's vision

### Our Process

| Phase | What Happens |
|-------|-------------|
| Development | Script review, storyboarding, location scouting, casting |
| Pre-Production | Crew assembly, equipment planning, scheduling, budgeting |
| Production | Principal photography with full crew and equipment |
| Post-Production | Editing, color grading, sound design, visual effects |
| Delivery | Final mastering, format conversion, distribution support |

### Why Work With Us

We bring together experienced directors, cinematographers, and production crews who understand how to translate creative vision into powerful visual storytelling. Every project receives dedicated attention from concept through final delivery, ensuring consistent quality and on-time completion.

Our state-of-the-art equipment and post-production facilities allow us to deliver broadcast-ready and cinema-grade content that meets the highest industry standards.
MD,
                'excerpt' => 'End-to-end film and television production — from script development and principal photography to post-production and final delivery.',
                'meta_title' => 'Film & Television Production Services',
                'meta_description' => 'Professional film and television production services covering development, filming, post-production, and delivery for features, series, shorts, and music videos.',
            ],
            [
                'slug' => 'scriptwriting-storyboarding',
                'title' => 'Scriptwriting & Storyboarding',
                'body' => <<<'MD'
## Stories That Move Audiences

Great productions start with great stories. Our scriptwriting and storyboarding team works closely with clients to develop compelling narratives that resonate with their target audience and bring their creative vision to life.

### Scriptwriting Services

Whether you need a brand film script, a commercial screenplay, or a full-length feature, our writers craft narratives that are emotionally engaging and strategically sound.

- **Original Screenplays** — From concept to completed script with multiple revision rounds
- **Script Doctoring** — Refining and strengthening existing scripts for maximum impact
- **Commercial Scripts** — Concise, punchy scripts designed for advertising and branded content
- **Documentary Treatments** — Structured outlines and narration for non-fiction productions

### Storyboarding

Storyboards bridge the gap between script and screen. Our visual artists create detailed frame-by-frame illustrations that map out every shot, camera angle, and transition — giving everyone on the production team a clear picture of the final product before a single frame is filmed.

### Why Storyboarding Matters

| Benefit | Impact |
|---------|--------|
| Visual clarity | Everyone sees the same creative vision before production begins |
| Cost efficiency | Identify and resolve creative decisions before they become expensive on-set changes |
| Time savings | Streamlined production with a clear shot list and visual reference |
| Better collaboration | Directors, cinematographers, and clients align on the creative direction |

### Our Approach

We believe the best scripts come from deep collaboration. Our writers take the time to understand your brand, your audience, and your objectives — then craft stories that connect on an emotional level while delivering your message with precision and impact.
MD,
                'excerpt' => 'Professional scriptwriting and storyboarding services — from original screenplays and commercial scripts to detailed visual storyboards.',
                'meta_title' => 'Scriptwriting & Storyboarding Services',
                'meta_description' => 'Expert scriptwriting and storyboarding services for films, commercials, and branded content. We craft compelling narratives and detailed visual plans.',
            ],
            [
                'slug' => 'motion-graphics-animation',
                'title' => 'Motion Graphics & Animation',
                'body' => <<<'MD'
## Bringing Ideas to Life Through Motion

Motion graphics and animation allow us to tell stories that live-action alone cannot. From sleek title sequences and explainer videos to fully animated productions, our team creates dynamic visual content that captivates audiences and communicates complex ideas with clarity.

### Our Capabilities

- **2D Animation** — Character animation, explainer videos, and illustrated narratives
- **3D Animation** — Product visualizations, architectural walkthroughs, and cinematic sequences
- **Motion Graphics** — Title sequences, lower thirds, data visualizations, and branded elements
- **Visual Effects (VFX)** — Compositing, green screen work, particle effects, and environment creation

### Where Motion Graphics Shine

| Application | Use Case |
|-------------|----------|
| Brand films | Animated logos, transitions, and branded visual elements |
| Explainer videos | Simplifying complex products, services, or processes |
| Social media | Eye-catching animated content optimized for every platform |
| Presentations | Dynamic slides and data visualizations for corporate events |
| Title sequences | Cinematic opening sequences for films and series |

### Tools & Technology

Our artists work with industry-standard tools including After Effects, Cinema 4D, Blender, and Houdini — giving us the flexibility to handle any style, from clean corporate motion design to highly stylized artistic animation.

### From Concept to Delivery

Every animation project begins with a detailed creative brief and mood board. We develop style frames, get your approval on the visual direction, then move into full production — with regular check-ins to ensure the final product exceeds expectations.
MD,
                'excerpt' => 'Dynamic motion graphics and animation services — 2D, 3D, VFX, and motion design for films, brands, and digital platforms.',
                'meta_title' => 'Motion Graphics & Animation Services',
                'meta_description' => 'Professional motion graphics and animation services including 2D, 3D, VFX, and motion design for brand films, explainers, and cinematic productions.',
            ],
            [
                'slug' => 'brand-commercial-content',
                'title' => 'Brand & Commercial Content',
                'body' => <<<'MD'
## Content That Builds Brands

In a world saturated with content, brands need video that stands out. We create commercial and branded content that not only looks cinematic but drives real business results — from awareness and engagement to conversions and loyalty.

### What We Produce

- **TV Commercials** — Broadcast-ready spots crafted for maximum impact in 15, 30, or 60 seconds
- **Digital Ads** — Video content optimized for social media, pre-roll, and programmatic campaigns
- **Brand Films** — Long-form narrative content that tells your brand story with emotional depth
- **Product Videos** — Sleek, compelling showcases that highlight features and drive purchase decisions
- **Corporate Films** — Internal communications, recruitment videos, and investor presentations

### Our Strategic Approach

Great commercial content starts with strategy. Before we pick up a camera, we work with your team to understand your brand positioning, target audience, competitive landscape, and campaign objectives.

| Phase | Deliverable |
|-------|------------|
| Discovery | Brand audit, audience analysis, creative brief |
| Concept | Treatment, script, mood board, and storyboard |
| Production | Full-service filming with professional crew and equipment |
| Post-Production | Editing, color grading, sound design, and graphics |
| Optimization | Format versioning for TV, digital, social, and out-of-home |

### Platform Expertise

Every platform has its own language. A TV commercial requires different storytelling than an Instagram Reel or a YouTube pre-roll. We craft content that speaks fluently on every platform — maintaining brand consistency while optimizing for each format's unique strengths.

### Results-Driven

We measure success not just in production quality but in business outcomes. Our content is designed to perform — driving the awareness, engagement, and conversions your brand needs to grow.
MD,
                'excerpt' => 'Strategic brand and commercial video content — TV spots, digital ads, brand films, and product videos that drive real business results.',
                'meta_title' => 'Brand & Commercial Content Production',
                'meta_description' => 'Premium brand and commercial video production — TV commercials, digital ads, brand films, and corporate content designed to build brands and drive results.',
            ],
            [
                'slug' => 'documentary-lifestyle-films',
                'title' => 'Documentary & Lifestyle Films',
                'body' => <<<'MD'
## Real Stories, Beautifully Told

Documentaries and lifestyle films capture the world as it is — raw, authentic, and deeply human. Our team specializes in crafting non-fiction narratives that inform, inspire, and move audiences through powerful visual storytelling and genuine human connection.

### Documentary Production

We produce documentaries that tackle compelling subjects with journalistic integrity and cinematic craft. Whether it's a feature-length documentary, a short-form piece, or a multi-episode docu-series, we bring the same level of care and artistry to every project.

- **Feature Documentaries** — In-depth explorations of compelling subjects for theatrical and streaming release
- **Short Documentaries** — Focused narratives ideal for film festivals, social impact campaigns, and digital platforms
- **Docu-Series** — Multi-episode formats that allow deeper exploration of complex subjects
- **Corporate Documentaries** — Brand heritage films, founder stories, and behind-the-scenes content

### Lifestyle & Culture

Lifestyle films celebrate the people, places, and passions that define culture. We create aspirational content that connects brands with audiences through shared values and authentic experiences.

| Format | Application |
|--------|------------|
| Travel & destination | Tourism boards, hospitality brands, lifestyle publications |
| Food & culinary | Restaurants, food brands, culinary publications |
| Fashion & beauty | Fashion houses, beauty brands, editorial content |
| Sports & wellness | Athletic brands, fitness platforms, wellness retreats |
| Arts & culture | Cultural institutions, artists, creative communities |

### Our Documentary Approach

We believe the best documentaries emerge from deep immersion and genuine connection with the subject matter. Our filmmakers spend time understanding the story before they start filming — building trust, identifying key moments, and developing a narrative structure that serves the material.

### Impact & Distribution

Beyond production, we help our clients develop distribution strategies that maximize the impact of their documentary work — from film festival submissions and broadcast licensing to digital distribution and social impact campaigns.
MD,
                'excerpt' => 'Authentic documentary and lifestyle film production — feature documentaries, docu-series, and lifestyle content that captures real stories with cinematic craft.',
                'meta_title' => 'Documentary & Lifestyle Film Production',
                'meta_description' => 'Professional documentary and lifestyle film production — from feature documentaries and docu-series to travel, fashion, and cultural content.',
            ],
        ];

        foreach ($pages as $page) {
            Page::query()->updateOrCreate(
                ['slug' => $page['slug']],
                [
                    'title' => $page['title'],
                    'body' => $page['body'],
                    'excerpt' => $page['excerpt'],
                    'status' => PageStatus::Published,
                    'published_at' => now(),
                    'show_in_header' => false,
                    'show_in_footer' => false,
                    'sort_order' => 0,
                    'meta_title' => $page['meta_title'],
                    'meta_description' => $page['meta_description'],
                ],
            );
        }
    }
}
