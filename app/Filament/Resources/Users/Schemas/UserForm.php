<?php

declare(strict_types=1);

namespace App\Filament\Resources\Users\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;
use Filament\Support\Enums\Operation;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;

class UserForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make(__('user.admin.section_account'))
                    ->schema([
                        TextInput::make('name')
                            ->label(__('user.admin.name'))
                            ->required()
                            ->maxLength(255),
                        TextInput::make('email')
                            ->label(__('user.admin.email'))
                            ->email()
                            ->required()
                            ->unique(ignoreRecord: true)
                            ->maxLength(255),
                    ])
                    ->columns(2),

                Section::make(__('user.admin.section_security'))
                    ->schema([
                        TextInput::make('password')
                            ->label(__('user.admin.password'))
                            ->password()
                            ->revealable()
                            ->required()
                            ->visibleOn(Operation::Create)
                            ->rule(Password::defaults())
                            ->dehydrateStateUsing(fn (string $state): string => Hash::make($state)),
                        TextInput::make('password')
                            ->label(__('user.admin.password'))
                            ->password()
                            ->revealable()
                            ->visibleOn(Operation::Edit)
                            ->rule(Password::defaults())
                            ->dehydrateStateUsing(fn (?string $state): ?string => filled($state) ? Hash::make($state) : null)
                            ->dehydrated(fn (?string $state): bool => filled($state))
                            ->helperText(__('user.admin.password_helper')),
                    ]),

                Section::make(__('user.admin.section_permissions'))
                    ->schema([
                        Toggle::make('is_admin')
                            ->label(__('user.admin.is_admin'))
                            ->helperText(__('user.admin.is_admin_helper'))
                            ->default(false),
                    ]),
            ]);
    }
}
