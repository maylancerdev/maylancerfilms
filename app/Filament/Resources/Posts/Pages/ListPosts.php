<?php

declare(strict_types=1);

namespace App\Filament\Resources\Posts\Pages;

use App\Enums\PostStatus;
use App\Filament\Resources\Posts\PostResource;
use App\Models\Post;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;
use Filament\Schemas\Components\Tabs\Tab;
use Illuminate\Database\Eloquent\Builder;

class ListPosts extends ListRecords
{
    protected static string $resource = PostResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }

    public function getTabs(): array
    {
        return [
            'all' => Tab::make(__('blog.admin.tab_all'))
                ->badge(fn () => Post::query()->count()),
            'published' => Tab::make(__('blog.admin.tab_published'))
                ->icon('heroicon-o-check-circle')
                ->modifyQueryUsing(fn (Builder $query) => $query->where('status', PostStatus::Published))
                ->badge(fn () => Post::query()->where('status', PostStatus::Published)->count())
                ->badgeColor('success'),
            'draft' => Tab::make(__('blog.admin.tab_draft'))
                ->icon('heroicon-o-pencil-square')
                ->modifyQueryUsing(fn (Builder $query) => $query->where('status', PostStatus::Draft))
                ->badge(fn () => Post::query()->where('status', PostStatus::Draft)->count())
                ->badgeColor('gray'),
            'scheduled' => Tab::make(__('blog.admin.tab_scheduled'))
                ->icon('heroicon-o-clock')
                ->modifyQueryUsing(fn (Builder $query) => $query->where('status', PostStatus::Scheduled))
                ->badge(fn () => Post::query()->where('status', PostStatus::Scheduled)->count())
                ->badgeColor('warning'),
        ];
    }
}
