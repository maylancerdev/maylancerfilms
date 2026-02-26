<?php

declare(strict_types=1);

namespace App\Filament\Resources\Posts\Tables;

use App\Enums\PostStatus;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Table;

class PostsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                ImageColumn::make('cover_image')
                    ->label('')
                    ->circular()
                    ->visibility('public')
                    ->toggleable(),
                TextColumn::make('title')
                    ->label(__('blog.admin.col_title'))
                    ->searchable()
                    ->sortable()
                    ->weight('bold')
                    ->limit(50),
                TextColumn::make('author.name')
                    ->label(__('blog.admin.col_author'))
                    ->sortable()
                    ->toggleable(),
                TextColumn::make('category.name')
                    ->label(__('blog.admin.col_category'))
                    ->badge()
                    ->sortable()
                    ->toggleable(),
                TextColumn::make('status')
                    ->label(__('blog.admin.col_status'))
                    ->badge()
                    ->sortable(),
                IconColumn::make('is_featured')
                    ->label(__('blog.admin.col_featured'))
                    ->boolean()
                    ->sortable()
                    ->toggleable(),
                TextColumn::make('published_at')
                    ->label(__('blog.admin.col_published_at'))
                    ->dateTime()
                    ->sortable()
                    ->toggleable(),
            ])
            ->defaultSort('created_at', 'desc')
            ->filters([
                SelectFilter::make('status')
                    ->options(PostStatus::class),
                SelectFilter::make('category')
                    ->relationship('category', 'name'),
            ])
            ->recordActions([
                EditAction::make(),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }
}
