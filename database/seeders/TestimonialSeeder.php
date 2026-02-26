<?php

declare(strict_types=1);

namespace Database\Seeders;

use App\Models\Testimonial;
use Illuminate\Database\Seeder;

class TestimonialSeeder extends Seeder
{
    public function run(): void
    {
        $testimonials = [
            [
                'name' => 'Sarah Mitchell',
                'byline' => 'Marketing Director, Apex Brands',
                'quote' => 'Maylancer Films transformed our brand story into something truly cinematic. The quality of their work exceeded every expectation — our campaign engagement tripled within the first month.',
                'is_featured' => true,
                'sort_order' => 1,
            ],
            [
                'name' => 'David Chen',
                'byline' => 'CEO, Horizon Media Group',
                'quote' => 'Working with Maylancer was a game-changer for our content strategy. Their team brought creative ideas we never would have considered, and the execution was flawless from start to finish.',
                'is_featured' => true,
                'sort_order' => 2,
            ],
            [
                'name' => 'Amara Johnson',
                'byline' => 'Creative Lead, Pulse Agency',
                'quote' => 'What sets Maylancer apart is their obsession with storytelling. They don\'t just make beautiful videos — they craft narratives that genuinely move people. That\'s rare in this industry.',
                'is_featured' => true,
                'sort_order' => 3,
            ],
            [
                'name' => 'Marcus Rivera',
                'byline' => 'Head of Content, Luminary Studios',
                'quote' => 'From the initial concept meeting to the final delivery, Maylancer was professional, creative, and incredibly responsive. They made a complex multi-location shoot feel effortless.',
                'is_featured' => true,
                'sort_order' => 4,
            ],
            [
                'name' => 'Elena Volkov',
                'byline' => 'Brand Manager, Stellaris Fashion',
                'quote' => 'Our fashion campaign needed a production team that understood both style and substance. Maylancer delivered cinematic quality that elevated our brand presence across every platform.',
                'is_featured' => false,
                'sort_order' => 5,
            ],
            [
                'name' => 'James Okonkwo',
                'byline' => 'Executive Producer, Veritas Documentaries',
                'quote' => 'Maylancer brought a level of craft and dedication to our documentary that we rarely see. They treated our subject matter with respect and produced a film that truly honors the story.',
                'is_featured' => false,
                'sort_order' => 6,
            ],
        ];

        foreach ($testimonials as $testimonial) {
            Testimonial::query()->updateOrCreate(
                ['name' => $testimonial['name']],
                array_merge($testimonial, [
                    'is_active' => true,
                    'image' => null,
                ]),
            );
        }
    }
}
