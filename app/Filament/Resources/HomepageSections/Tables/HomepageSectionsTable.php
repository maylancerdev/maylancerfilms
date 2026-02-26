<?php

declare(strict_types=1);

namespace App\Filament\Resources\HomepageSections\Tables;

use Filament\Actions\EditAction;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class HomepageSectionsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('title')
                    ->label(__('homepage.admin.col_title'))
                    ->weight('bold'),
                TextColumn::make('slug')
                    ->label(__('homepage.admin.col_slug'))
                    ->badge()
                    ->color('info'),
                IconColumn::make('is_active')
                    ->label(__('homepage.admin.col_active'))
                    ->boolean(),
                TextColumn::make('sort_order')
                    ->label(__('homepage.admin.col_sort_order'))
                    ->sortable(),
            ])
            ->defaultSort('sort_order', 'asc')
            ->recordActions([
                EditAction::make(),
            ]);
    }
}
