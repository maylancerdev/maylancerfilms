<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Enums\PageStatus;
use App\Models\Page;
use App\Models\TeamMember;
use Illuminate\View\View;

class PageController extends Controller
{
    public function show(Page $page): View
    {
        abort_unless(
            $page->status === PageStatus::Published && $page->published_at?->lte(now()),
            404,
        );

        $data = ['page' => $page];

        if ($page->slug === 'about-us') {
            $data['teamMembers'] = TeamMember::query()->active()->ordered()->get();
        }

        return view('pages.show', $data);
    }
}
