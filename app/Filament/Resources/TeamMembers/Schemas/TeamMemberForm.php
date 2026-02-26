<?php

declare(strict_types=1);

namespace App\Filament\Resources\TeamMembers\Schemas;

use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class TeamMemberForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make()
                    ->schema([
                        TextInput::make('name')
                            ->label(__('team.admin.name'))
                            ->required()
                            ->maxLength(255),

                        TextInput::make('role')
                            ->label(__('team.admin.role'))
                            ->required()
                            ->maxLength(255)
                            ->helperText(__('team.admin.role_helper')),

                        Textarea::make('bio')
                            ->label(__('team.admin.bio'))
                            ->rows(3)
                            ->maxLength(500)
                            ->helperText(__('team.admin.bio_helper'))
                            ->columnSpanFull(),

                        FileUpload::make('image')
                            ->label(__('team.admin.image'))
                            ->image()
                            ->disk('public')
                            ->directory('team')
                            ->visibility('public')
                            ->imageResizeMode('cover')
                            ->imageResizeTargetWidth('400')
                            ->imageResizeTargetHeight('400')
                            ->maxSize(5120)
                            ->columnSpanFull(),

                        TextInput::make('image_alt')
                            ->label(__('team.admin.image_alt'))
                            ->maxLength(255),

                        Toggle::make('is_active')
                            ->label(__('team.admin.is_active'))
                            ->helperText(__('team.admin.is_active_helper'))
                            ->default(true),

                        TextInput::make('sort_order')
                            ->label(__('team.admin.sort_order'))
                            ->numeric()
                            ->default(0),
                    ]),
            ]);
    }
}
