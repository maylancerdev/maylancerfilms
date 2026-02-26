<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Models\HomepageSection;
use Illuminate\View\View;

class PortfolioController extends Controller
{
    public function __invoke(): View
    {
        $portfolio = HomepageSection::query()
            ->where('slug', 'portfolio')
            ->active()
            ->first();

        $items = $portfolio?->content['items'] ?? [];

        return view('portfolio.index', compact('items'));
    }
}
