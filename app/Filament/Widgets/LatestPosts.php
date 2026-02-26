<?php

declare(strict_types=1);

namespace App\Filament\Widgets;

use App\Models\Post;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Filament\Widgets\TableWidget as BaseWidget;

class LatestPosts extends BaseWidget
{
    protected static ?int $sort = 3;

    protected int|string|array $columnSpan = 'full';

    protected static ?string $heading = 'Latest Blog Posts';

    public function table(Table $table): Table
    {
        return $table
            ->query(Post::query()->latest('published_at')->limit(5))
            ->columns([
                TextColumn::make('title')
                    ->label(__('blog.admin.title'))
                    ->limit(50),
                TextColumn::make('category.name')
                    ->label(__('blog.admin.category'))
                    ->badge(),
                TextColumn::make('status')
                    ->label(__('blog.admin.status'))
                    ->badge()
                    ->color(fn (string $state): string => match ($state) {
                        'published' => 'success',
                        'draft' => 'warning',
                        'scheduled' => 'info',
                        default => 'gray',
                    }),
                TextColumn::make('published_at')
                    ->label(__('blog.admin.published_at'))
                    ->since(),
            ])
            ->paginated(false);
    }
}
