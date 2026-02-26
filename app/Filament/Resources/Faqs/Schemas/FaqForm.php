<?php

declare(strict_types=1);

namespace App\Filament\Resources\Faqs\Schemas;

use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class FaqForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make()
                    ->schema([
                        TextInput::make('question')
                            ->label(__('faq.admin.question'))
                            ->required()
                            ->maxLength(255)
                            ->columnSpanFull(),

                        Textarea::make('answer')
                            ->label(__('faq.admin.answer'))
                            ->required()
                            ->rows(4)
                            ->helperText(__('faq.admin.answer_helper'))
                            ->columnSpanFull(),

                        Toggle::make('is_active')
                            ->label(__('faq.admin.is_active'))
                            ->helperText(__('faq.admin.is_active_helper'))
                            ->default(true),

                        TextInput::make('sort_order')
                            ->label(__('faq.admin.sort_order'))
                            ->numeric()
                            ->default(0)
                            ->helperText(__('faq.admin.sort_order_helper')),
                    ]),
            ]);
    }
}
