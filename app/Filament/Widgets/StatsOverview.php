<?php

declare(strict_types=1);

namespace App\Filament\Widgets;

use App\Models\Contact;
use App\Models\Page;
use App\Models\Post;
use App\Models\Testimonial;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class StatsOverview extends BaseWidget
{
    protected static ?int $sort = 1;

    protected function getStats(): array
    {
        return [
            Stat::make(__('blog.admin.navigation'), Post::count())
                ->description(__('blog.admin.tab_published').': '.Post::published()->count())
                ->icon('heroicon-o-document-text')
                ->color('primary'),
            Stat::make(__('page.admin.navigation'), Page::count())
                ->icon('heroicon-o-document')
                ->color('info'),
            Stat::make(__('testimonial.admin.navigation'), Testimonial::active()->count())
                ->icon('heroicon-o-chat-bubble-left-right')
                ->color('success'),
            Stat::make(__('contact.admin.navigation'), Contact::count())
                ->description(Contact::where('status', 'new')->count().' '.__('contact.admin.status_new'))
                ->icon('heroicon-o-envelope')
                ->color('warning'),
        ];
    }
}
