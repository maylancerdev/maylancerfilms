<?php

declare(strict_types=1);

namespace App\Filament\Resources\Contacts\Schemas;

use App\Enums\ContactStatus;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class ContactForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make()
                    ->schema([
                        TextInput::make('name')
                            ->label(__('contact.admin.name'))
                            ->disabled()
                            ->columnSpanFull(),

                        TextInput::make('email')
                            ->label(__('contact.admin.email'))
                            ->disabled()
                            ->columnSpanFull(),

                        TextInput::make('phone')
                            ->label(__('contact.admin.phone'))
                            ->disabled()
                            ->columnSpanFull(),

                        TextInput::make('subject')
                            ->label(__('contact.admin.subject'))
                            ->disabled()
                            ->columnSpanFull(),

                        Textarea::make('message')
                            ->label(__('contact.admin.message'))
                            ->disabled()
                            ->rows(6)
                            ->columnSpanFull(),

                        Select::make('status')
                            ->label(__('contact.admin.status'))
                            ->options(ContactStatus::class)
                            ->required(),
                    ]),
            ]);
    }
}
