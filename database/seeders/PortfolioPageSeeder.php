<?php

declare(strict_types=1);

namespace Database\Seeders;

use App\Enums\PageStatus;
use App\Models\Page;
use Illuminate\Database\Seeder;

class PortfolioPageSeeder extends Seeder
{
    public function run(): void
    {
        $pages = [
            [
                'slug' => 'diverse-industries-one-visual-language',
                'title' => 'Diverse Industries, One Visual Language',
                'excerpt' => 'A multi-brand campaign demonstrating how cinematic visual storytelling can unify messaging across vastly different industries.',
                'body' => <<<'MD'
## Project Overview

This campaign brought together clients from healthcare, technology, finance, and consumer goods — each with distinct audiences and objectives — under a unified visual language that elevated every brand while maintaining a cohesive cinematic identity.

### The Challenge

How do you create content for brands in completely different sectors that still feels like it comes from the same creative DNA? Each brand needed content that spoke authentically to their audience while sharing a visual consistency that reinforced quality and craftsmanship.

### Our Approach

We developed a visual framework — a set of cinematography principles, color palettes, and editing rhythms — that could flex across industries while maintaining a signature look.

- **Shared color science** — A warm, desaturated base grade that adapted to each brand's palette
- **Consistent camera language** — Deliberate, composed framing with subtle movement
- **Unified pacing** — A measured editing rhythm that let moments breathe
- **Signature transitions** — Custom-designed transitions that linked each piece visually

### The Results

The campaign delivered over 40 individual content pieces across 6 brands, all sharing the same cinematic DNA. Client satisfaction was unanimous, with multiple brands extending their contracts for ongoing content production.

### Services Delivered

- Creative direction
- Cinematography
- Color grading
- Motion graphics
- Sound design
- Multi-format delivery
MD,
                'meta_title' => 'Diverse Industries, One Visual Language — Maylancer Films',
                'meta_description' => 'A multi-brand cinematic campaign unifying visual storytelling across healthcare, technology, finance, and consumer goods.',
            ],
            [
                'slug' => 'cinematic-quality-meets-strategic-goals',
                'title' => 'Cinematic Quality Meets Strategic Goals',
                'excerpt' => 'A brand film series proving that beautiful cinematography and measurable business outcomes are not mutually exclusive.',
                'body' => <<<'MD'
## Project Overview

This project challenged the conventional wisdom that brand films must choose between looking beautiful and driving business results. We set out to prove that cinematic production quality actually amplifies strategic impact.

### The Challenge

Our client needed content that would work simultaneously as premium brand storytelling and high-performing digital advertising. The brief demanded cinema-grade production with measurable ROI — a combination that many agencies consider contradictory.

### Our Approach

We designed a production pipeline that optimized for both quality and performance from day one:

- **Dual-purpose shooting** — Every setup was framed for both wide cinematic delivery and tight social crops
- **Performance-informed scripting** — Narrative beats aligned with proven engagement patterns
- **Modular editing** — A single shoot yielded a 3-minute hero film, 6 platform-specific cuts, and 15 social assets
- **Data-integrated review** — We refined cuts based on real-time performance data from initial releases

### Production Highlights

| Element | Detail |
|---------|--------|
| Shoot days | 4 |
| Locations | 7 across 2 cities |
| Final deliverables | 22 unique assets |
| Formats | Cinema, broadcast, social, web |

### The Results

The hero film achieved a 4.2x higher engagement rate than the brand's previous campaign content, while the social cuts outperformed platform benchmarks by 280%. The campaign demonstrated that audiences respond to quality — and that quality drives business results.

### Services Delivered

- Strategic planning
- Scriptwriting
- Full production
- Post-production
- Multi-format optimization
- Performance analysis
MD,
                'meta_title' => 'Cinematic Quality Meets Strategic Goals — Maylancer Films',
                'meta_description' => 'A brand film series proving that cinematic production quality and measurable business outcomes go hand in hand.',
            ],
            [
                'slug' => 'behind-every-frame-a-purpose',
                'title' => 'Behind Every Frame, A Purpose',
                'excerpt' => 'A documentary project exploring the intentionality behind great filmmaking — every frame serves the story.',
                'body' => <<<'MD'
## Project Overview

This documentary project was born from a simple observation: the difference between good filmmaking and great filmmaking lies in intentionality. Every frame, every cut, every sound choice should serve a purpose.

### The Concept

We followed three different creative projects — a feature film, a commercial campaign, and a documentary — from inception to completion, capturing the thousands of deliberate decisions that shape the final product.

### What We Explored

- **The director's eye** — How experienced directors make split-second decisions on set that define the final film
- **The editor's rhythm** — The invisible art of pacing, timing, and the power of what you leave on the cutting room floor
- **The colorist's palette** — How subtle color shifts guide audience emotions scene by scene
- **The sound designer's world** — Building immersive audio landscapes that audiences feel more than hear

### Production Approach

We used an observational documentary style — minimal narration, no staged interviews. We captured the creative process as it naturally unfolded, letting the work speak for itself.

The film was shot over 6 months across multiple productions, resulting in over 200 hours of raw footage that was distilled into a 45-minute documentary.

### Impact

The documentary premiered at a regional film festival and has since been used as an educational resource for film schools and emerging filmmakers. It reinforced our reputation as a studio that takes craft seriously — not just as a marketing claim, but as a documented philosophy.

### Services Delivered

- Documentary direction
- Long-form cinematography
- Observational sound recording
- Editorial and post-production
- Festival submission and distribution
MD,
                'meta_title' => 'Behind Every Frame, A Purpose — Maylancer Films',
                'meta_description' => 'A documentary exploring the intentionality behind great filmmaking — how every frame, cut, and sound choice serves the story.',
            ],
            [
                'slug' => 'stories-that-move-audiences-forward',
                'title' => 'Stories That Move Audiences Forward',
                'excerpt' => 'A social impact campaign using the power of film to drive awareness, empathy, and real-world action.',
                'body' => <<<'MD'
## Project Overview

This social impact campaign harnessed the power of cinematic storytelling to drive awareness and action around a cause that mattered. The goal wasn't just to inform — it was to move audiences to act.

### The Challenge

Our partner organization needed content that would cut through the noise of digital media and create genuine emotional impact. Previous campaigns had delivered information effectively but hadn't translated awareness into action.

### Our Approach

We shifted the narrative from statistics to stories. Instead of leading with data, we led with real people — their experiences, their challenges, and their resilience.

- **Character-driven narratives** — Real people telling their own stories in their own words
- **Cinematic production values** — Treating every subject with the same visual care as a feature film
- **Strategic distribution** — Platform-specific edits designed to maximize reach and engagement
- **Clear calls to action** — Every piece ended with a specific, achievable action the viewer could take

### The Campaign

The campaign included:

| Piece | Format | Purpose |
|-------|--------|---------|
| Hero documentary | 12 minutes | Anchor piece for events and earned media |
| Portrait series | 3 x 3 minutes | Individual stories for web and social |
| Social cuts | 8 x 30 seconds | Platform-optimized awareness content |
| Event trailer | 90 seconds | Live event and fundraising screenings |

### Impact

The campaign generated significant organic reach and drove a measurable increase in engagement with the partner organization's mission. Most importantly, it demonstrated that well-crafted storytelling can be the most powerful tool for social impact.

### Services Delivered

- Creative strategy
- Documentary filmmaking
- Portrait-style cinematography
- Multi-format post-production
- Distribution strategy
MD,
                'meta_title' => 'Stories That Move Audiences Forward — Maylancer Films',
                'meta_description' => 'A social impact campaign using cinematic storytelling to drive awareness, empathy, and real-world action.',
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
