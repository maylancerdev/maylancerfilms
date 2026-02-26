<?php

declare(strict_types=1);

namespace App\Filament\Resources\Testimonials\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class TestimonialsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                ImageColumn::make('image')
                    ->label('')
                    ->circular()
                    ->visibility('public')
                    ->toggleable(),
                TextColumn::make('name')
                    ->label(__('testimonial.admin.col_name'))
                    ->searchable()
                    ->sortable()
                    ->weight('bold'),
                TextColumn::make('byline')
                    ->label(__('testimonial.admin.byline'))
                    ->toggleable(),
                IconColumn::make('is_featured')
                    ->label(__('testimonial.admin.col_featured'))
                    ->boolean(),
                IconColumn::make('is_active')
                    ->label(__('testimonial.admin.col_active'))
                    ->boolean(),
                TextColumn::make('sort_order')
                    ->label(__('testimonial.admin.col_sort_order'))
                    ->sortable(),
            ])
            ->defaultSort('sort_order', 'asc')
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
