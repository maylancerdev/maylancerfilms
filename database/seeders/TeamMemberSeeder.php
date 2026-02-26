<?php

declare(strict_types=1);

namespace Database\Seeders;

use App\Models\TeamMember;
use Illuminate\Database\Seeder;

class TeamMemberSeeder extends Seeder
{
    public function run(): void
    {
        $members = [
            [
                'name' => 'Alex Morgan',
                'role' => 'Creative Director',
                'bio' => 'With over 15 years in visual storytelling, Alex leads our creative vision and ensures every project exceeds expectations.',
                'sort_order' => 1,
            ],
            [
                'name' => 'Jordan Lee',
                'role' => 'Lead Cinematographer',
                'bio' => 'Jordan brings a cinematic eye to every shoot, combining technical expertise with artistic intuition to capture stunning visuals.',
                'sort_order' => 2,
            ],
            [
                'name' => 'Sam Rivera',
                'role' => 'Post-Production Lead',
                'bio' => 'Sam transforms raw footage into polished masterpieces through expert editing, color grading, and sound design.',
                'sort_order' => 3,
            ],
            [
                'name' => 'Taylor Chen',
                'role' => 'Producer',
                'bio' => 'Taylor keeps every production running smoothly, managing timelines, budgets, and client relationships with precision.',
                'sort_order' => 4,
            ],
        ];

        foreach ($members as $member) {
            TeamMember::updateOrCreate(
                ['name' => $member['name']],
                $member,
            );
        }
    }
}
