<?php

declare(strict_types=1);

namespace Database\Seeders;

use App\Models\Faq;
use Illuminate\Database\Seeder;

class FaqSeeder extends Seeder
{
    public function run(): void
    {
        $faqs = [
            [
                'question' => 'What types of video production do you offer?',
                'answer' => 'We offer a full range of production services including film and television production, brand and commercial content, documentaries, motion graphics and animation, scriptwriting and storyboarding, and social media video content. Every project is tailored to your specific goals and audience.',
                'sort_order' => 1,
            ],
            [
                'question' => 'How long does a typical production take?',
                'answer' => 'Timelines vary depending on the scope and complexity of the project. A short commercial might take 3-4 weeks from concept to delivery, while a brand film or documentary can take 2-3 months. We provide a detailed timeline during the proposal phase so you know exactly what to expect.',
                'sort_order' => 2,
            ],
            [
                'question' => 'Do you handle the entire production process?',
                'answer' => 'Yes. We are a full-service production company handling everything from initial concept development, scriptwriting, and storyboarding through filming, post-production, color grading, sound design, and final delivery. You get a single dedicated team from start to finish.',
                'sort_order' => 3,
            ],
            [
                'question' => 'What is your pricing structure?',
                'answer' => 'Every project is unique, so we provide custom proposals based on the scope of work, production requirements, and deliverables. We are transparent about costs from the beginning and work within your budget to maximize production value. Contact us for a free consultation.',
                'sort_order' => 4,
            ],
            [
                'question' => 'Can you produce content for multiple platforms?',
                'answer' => 'Absolutely. We plan for multi-platform delivery from the outset. A single production can yield assets for cinema, broadcast television, social media (Instagram, TikTok, YouTube), websites, and digital advertising — all optimized for each platform\'s specifications.',
                'sort_order' => 5,
            ],
            [
                'question' => 'Do you work with clients internationally?',
                'answer' => 'Yes, we work with brands and organizations worldwide. Our team has production experience across multiple countries and we are equipped to manage remote collaboration, international crew coordination, and multi-location shoots.',
                'sort_order' => 6,
            ],
            [
                'question' => 'What happens after the project is delivered?',
                'answer' => 'We provide all final files in your requested formats along with any raw footage if agreed upon in the contract. We also offer ongoing support for content updates, additional edits, and future productions. Many of our clients return for long-term content partnerships.',
                'sort_order' => 7,
            ],
            [
                'question' => 'How do we get started?',
                'answer' => 'Simply reach out through our contact page or email us directly. We will schedule a discovery call to understand your vision, goals, and requirements. From there, we develop a proposal with creative direction, timeline, and budget. Once approved, we get to work bringing your project to life.',
                'sort_order' => 8,
            ],
        ];

        foreach ($faqs as $faq) {
            Faq::query()->updateOrCreate(
                ['question' => $faq['question']],
                array_merge($faq, ['is_active' => true]),
            );
        }
    }
}
