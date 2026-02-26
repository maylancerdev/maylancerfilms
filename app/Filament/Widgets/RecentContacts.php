<?php

declare(strict_types=1);

namespace App\Filament\Widgets;

use App\Models\Contact;
use Filament\Tables;
use Filament\Tables\Columns\BadgeColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Filament\Widgets\TableWidget as BaseWidget;

class RecentContacts extends BaseWidget
{
    protected static ?int $sort = 2;

    protected int|string|array $columnSpan = 'full';

    protected static ?string $heading = 'Recent Contact Submissions';

    public function table(Table $table): Table
    {
        return $table
            ->query(Contact::query()->latest()->limit(5))
            ->columns([
                TextColumn::make('name')
                    ->label(__('contact.admin.name')),
                TextColumn::make('email')
                    ->label(__('contact.admin.email')),
                TextColumn::make('subject')
                    ->label(__('contact.admin.subject'))
                    ->limit(40)
                    ->placeholder('—'),
                TextColumn::make('status')
                    ->label(__('contact.admin.status'))
                    ->badge()
                    ->color(fn (string $state): string => match ($state) {
                        'new' => 'warning',
                        'reviewed' => 'info',
                        'resolved' => 'success',
                        default => 'gray',
                    }),
                TextColumn::make('created_at')
                    ->label(__('contact.admin.col_date'))
                    ->since(),
            ])
            ->paginated(false);
    }
}
