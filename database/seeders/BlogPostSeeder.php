<?php

declare(strict_types=1);

namespace Database\Seeders;

use App\Enums\PostStatus;
use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
use App\Models\User;
use Illuminate\Database\Seeder;

class BlogPostSeeder extends Seeder
{
    public function run(): void
    {
        $admin = User::where('is_admin', true)->first();
        if (! $admin) {
            return;
        }

        // Create categories
        $categories = [
            ['name' => 'Production', 'slug' => 'production', 'description' => 'Behind the scenes of film and video production.', 'sort_order' => 1],
            ['name' => 'Storytelling', 'slug' => 'storytelling', 'description' => 'The art and craft of narrative storytelling.', 'sort_order' => 2],
            ['name' => 'Industry', 'slug' => 'industry', 'description' => 'Trends and insights from the media industry.', 'sort_order' => 3],
        ];

        foreach ($categories as $cat) {
            Category::query()->updateOrCreate(
                ['slug' => $cat['slug']],
                $cat,
            );
        }

        // Create tags
        $tagNames = ['filmmaking', 'cinematography', 'post-production', 'branding', 'creative-direction', 'video-marketing'];
        $tags = [];
        foreach ($tagNames as $name) {
            $tags[$name] = Tag::query()->updateOrCreate(
                ['slug' => $name],
                ['name' => str_replace('-', ' ', ucwords($name, '-'))],
            );
        }

        // Create posts
        $posts = [
            [
                'title' => 'Behind the Scenes of Great Storytelling',
                'slug' => 'behind-the-scenes-of-great-storytelling',
                'category' => 'storytelling',
                'tags' => ['filmmaking', 'creative-direction'],
                'published_at' => now()->subDays(3),
                'is_featured' => true,
                'excerpt' => 'Every great film starts with a story worth telling. We explore the creative process behind our most compelling projects and what makes a narrative truly resonate with audiences.',
                'body' => <<<'MD'
## The Heart of Every Project

At the core of everything we create is a story. Whether it's a 30-second commercial or a feature-length documentary, the narrative drives every creative decision — from the first frame to the final cut.

### Finding the Story

The best stories often aren't the most obvious ones. When a client approaches us with a brief, we look beyond the surface-level message. What's the emotional truth? What will make the audience feel something genuine?

We spend time in the discovery phase understanding not just what our clients want to say, but why it matters to their audience.

### The Writer's Room

Our scriptwriting process is deeply collaborative. We bring together writers, directors, and strategists to develop narratives that are both emotionally compelling and strategically sound.

Every script goes through multiple rounds of refinement:

- **First draft** — Getting the core idea on paper
- **Table read** — Hearing the words spoken aloud to test rhythm and authenticity
- **Client review** — Aligning the narrative with brand objectives
- **Final polish** — Refining every word for maximum impact

### Visual Storytelling

A script is only the beginning. The real magic happens when words become images. Our directors work with cinematographers to translate narrative beats into visual language — choosing angles, lighting, and movement that amplify the story's emotional impact.

### The Edit

Post-production is where a good film becomes a great one. Our editors aren't just assemblers — they're storytellers who understand pacing, rhythm, and the power of what you choose not to show.

Great storytelling is a craft. And like any craft, it demands both creativity and discipline.
MD,
                'meta_title' => 'Behind the Scenes of Great Storytelling — Maylancer Films',
                'meta_description' => 'Explore the creative process behind compelling visual storytelling — from script development to final edit.',
            ],
            [
                'title' => 'The Future of Video in Digital Marketing',
                'slug' => 'future-of-video-in-digital-marketing',
                'category' => 'industry',
                'tags' => ['video-marketing', 'branding'],
                'published_at' => now()->subDays(10),
                'is_featured' => false,
                'excerpt' => 'Video content continues to dominate digital marketing. Here is what brands need to know about the evolving landscape and how to stay ahead of the curve.',
                'body' => <<<'MD'
## Video is No Longer Optional

In 2026, video isn't just part of the marketing mix — it is the marketing mix. Audiences consume more video content than ever, and platforms are rewarding brands that invest in quality video production.

### The Numbers Speak

Research consistently shows that video content outperforms every other format:

| Metric | Video vs. Static |
|--------|-----------------|
| Engagement rate | 3x higher |
| Time on page | 2.6x longer |
| Conversion rate | 80% improvement |
| Social shares | 12x more |

### Short-Form vs. Long-Form

The rise of short-form video on platforms like TikTok and Instagram Reels has changed how brands think about content. But long-form video — brand films, documentaries, and explainer content — remains essential for deeper engagement and brand building.

The smartest brands are doing both: short-form content for discovery and reach, long-form content for connection and conversion.

### Authenticity Wins

Audiences are increasingly sophisticated. They can spot inauthenticity instantly. The brands that succeed with video are the ones that tell genuine stories — not polished corporate messages, but real narratives that reflect their values and connect with their audience on a human level.

### What This Means for Brands

Invest in video production that prioritizes story over spectacle. Work with production partners who understand both the creative and strategic dimensions of video content. And remember: the best video marketing doesn't feel like marketing at all.
MD,
                'meta_title' => 'The Future of Video in Digital Marketing — Maylancer Films',
                'meta_description' => 'How video content is transforming digital marketing and what brands need to know to stay competitive.',
            ],
            [
                'title' => 'Trends Shaping Modern Video Production',
                'slug' => 'trends-shaping-modern-video-production',
                'category' => 'production',
                'tags' => ['filmmaking', 'cinematography', 'post-production'],
                'published_at' => now()->subDays(18),
                'is_featured' => false,
                'excerpt' => 'From virtual production stages to AI-assisted editing, the tools and techniques of video production are evolving rapidly. Here are the trends defining the industry.',
                'body' => <<<'MD'
## The Production Landscape is Changing

The tools, techniques, and workflows of professional video production have evolved dramatically. Understanding these trends helps brands make informed decisions about their content investments.

### Virtual Production

LED volume stages — the technology behind The Mandalorian — are becoming accessible to productions of all sizes. Virtual production allows filmmakers to create photorealistic environments in real time, reducing location costs and expanding creative possibilities.

### Drone Cinematography

Aerial footage has gone from luxury to standard. Modern drone technology delivers cinematic aerial shots that were previously only achievable with helicopter rigs costing tens of thousands of dollars per day.

### AI-Assisted Post-Production

Artificial intelligence is transforming post-production workflows:

- **Automated color matching** across different cameras and lighting setups
- **Intelligent audio cleanup** removing background noise and enhancing dialogue
- **Smart editing assistants** that identify the best takes and suggest edit points
- **Upscaling and stabilization** improving footage quality in post

### High Frame Rate

Shooting at 120fps or higher gives editors incredible flexibility for slow-motion sequences and provides a buttery-smooth look for action-oriented content.

### Vertical and Multi-Format

Productions now plan for multiple aspect ratios from the outset. A single shoot might produce content for cinema (2.39:1), television (16:9), social media (9:16), and web (1:1) — all requiring careful composition and framing strategies.

### The Human Element

Despite all the technological advancement, the fundamentals haven't changed. Great production still requires talented people with creative vision, technical skill, and the ability to tell stories that move audiences.
MD,
                'meta_title' => 'Trends Shaping Modern Video Production — Maylancer Films',
                'meta_description' => 'Explore the latest trends in video production — from virtual production and drone cinematography to AI-assisted editing.',
            ],
            [
                'title' => 'Why Every Brand Needs a Visual Identity on Film',
                'slug' => 'why-every-brand-needs-visual-identity-on-film',
                'category' => 'storytelling',
                'tags' => ['branding', 'creative-direction', 'video-marketing'],
                'published_at' => now()->subDays(25),
                'is_featured' => false,
                'excerpt' => 'Your brand lives in motion. A strong visual identity on film creates recognition, builds trust, and communicates your values faster than any other medium.',
                'body' => <<<'MD'
## Beyond the Logo

A visual identity isn't just a logo and a color palette. On film, your brand identity encompasses everything the audience sees and feels — the cinematography style, color grading, pacing, music, typography, and tone of voice.

### Consistency Creates Recognition

The most iconic brands in the world have a visual language that's instantly recognizable. Think of Apple's clean minimalism, Nike's dynamic energy, or National Geographic's warm documentary style.

When your video content has a consistent visual identity, audiences begin to recognize your brand before they even see your logo.

### The Elements of Visual Identity on Film

- **Color palette** — Consistent color grading across all content creates a signature look
- **Cinematography style** — Handheld vs. stabilized, wide vs. intimate, natural vs. stylized
- **Pacing and rhythm** — Fast cuts for energy, long takes for intimacy, or a signature editing pattern
- **Typography and graphics** — Consistent use of fonts, lower thirds, and motion graphics
- **Sound design** — Music style, sound effects, and audio treatment that reinforce the brand

### Building Your Film Identity

The process starts with understanding who you are as a brand. What do you stand for? How do you want people to feel when they watch your content?

From there, we develop a visual language guide that ensures every piece of content — whether it's a 15-second social ad or a 10-minute brand film — feels unmistakably yours.

### The Long Game

Building a visual identity on film is an investment. It takes time for audiences to associate your visual language with your brand. But once that connection is established, it becomes one of your most powerful marketing assets.
MD,
                'meta_title' => 'Why Every Brand Needs a Visual Identity on Film',
                'meta_description' => 'How a strong visual identity on film creates brand recognition, builds trust, and communicates your values faster than any other medium.',
            ],
            [
                'title' => 'The Art of Color Grading in Cinematic Production',
                'slug' => 'art-of-color-grading-cinematic-production',
                'category' => 'production',
                'tags' => ['cinematography', 'post-production'],
                'published_at' => now()->subDays(32),
                'is_featured' => false,
                'excerpt' => 'Color grading is where footage becomes cinema. We break down the art and science of color grading and how it shapes the emotional impact of every frame.',
                'body' => <<<'MD'
## More Than Making It Look Pretty

Color grading is one of the most powerful yet misunderstood aspects of filmmaking. It's not just about making footage look "cinematic" — it's about using color to tell stories, guide emotions, and create visual coherence across an entire production.

### What Color Grading Does

At its core, color grading serves three purposes:

1. **Technical correction** — Ensuring consistent exposure, white balance, and color across different shots and cameras
2. **Creative enhancement** — Establishing mood, atmosphere, and visual tone through deliberate color choices
3. **Narrative support** — Using color shifts to mark time changes, emotional beats, or different storylines

### The Psychology of Color

Every color evokes specific psychological responses:

| Color | Emotional Association | Common Use |
|-------|----------------------|-----------|
| Warm tones (orange/amber) | Comfort, nostalgia, warmth | Flashbacks, intimate scenes |
| Cool tones (blue/teal) | Isolation, technology, calm | Corporate content, sci-fi |
| Desaturated | Bleakness, reality, gravity | Documentary, drama |
| High saturation | Energy, youth, vibrancy | Fashion, lifestyle, music |

### Our Grading Process

We grade in DaVinci Resolve — the industry standard for professional colorists. Our process involves:

- **Primary correction** — Balancing exposure and neutralizing color casts
- **Secondary isolation** — Targeting specific elements (skin tones, skies, products) for precise adjustment
- **Creative look development** — Building the signature grade that defines the project's visual identity
- **Shot matching** — Ensuring visual consistency across every cut

### The Invisible Art

The best color grading is invisible. The audience should feel the emotional impact without consciously noticing the color choices. When grading calls attention to itself, it's usually overdone.

Our colorists understand this balance — enhancing the story without overwhelming it.
MD,
                'meta_title' => 'The Art of Color Grading in Cinematic Production',
                'meta_description' => 'How professional color grading transforms footage into cinema — the art, science, and emotional impact of color in film production.',
            ],
        ];

        $categoryMap = Category::all()->pluck('id', 'slug');

        foreach ($posts as $postData) {
            $post = Post::query()->updateOrCreate(
                ['slug' => $postData['slug']],
                [
                    'user_id' => $admin->id,
                    'category_id' => $categoryMap[$postData['category']] ?? null,
                    'title' => $postData['title'],
                    'body' => $postData['body'],
                    'excerpt' => $postData['excerpt'],
                    'status' => PostStatus::Published,
                    'is_featured' => $postData['is_featured'],
                    'published_at' => $postData['published_at'],
                    'meta_title' => $postData['meta_title'],
                    'meta_description' => $postData['meta_description'],
                ],
            );

            $tagIds = collect($postData['tags'])->map(fn ($t) => $tags[$t]->id)->all();
            $post->tags()->syncWithoutDetaching($tagIds);
        }
    }
}
