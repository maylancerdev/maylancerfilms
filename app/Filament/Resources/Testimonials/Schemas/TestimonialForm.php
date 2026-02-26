<?php

declare(strict_types=1);

namespace App\Filament\Resources\Testimonials\Schemas;

use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class TestimonialForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make()
                    ->schema([
                        Textarea::make('quote')
                            ->label(__('testimonial.admin.quote'))
                            ->required()
                            ->rows(4)
                            ->columnSpanFull(),

                        TextInput::make('name')
                            ->label(__('testimonial.admin.name'))
                            ->required()
                            ->maxLength(255),

                        TextInput::make('byline')
                            ->label(__('testimonial.admin.byline'))
                            ->maxLength(255)
                            ->helperText(__('testimonial.admin.byline_helper')),

                        FileUpload::make('image')
                            ->label(__('testimonial.admin.image'))
                            ->image()
                            ->disk('public')
                            ->directory('testimonials')
                            ->visibility('public')
                            ->imageResizeMode('cover')
                            ->imageResizeTargetWidth('400')
                            ->imageResizeTargetHeight('400')
                            ->maxSize(5120)
                            ->columnSpanFull(),

                        TextInput::make('image_alt')
                            ->label(__('testimonial.admin.image_alt'))
                            ->helperText(__('testimonial.admin.image_alt_helper'))
                            ->maxLength(255),

                        Toggle::make('is_featured')
                            ->label(__('testimonial.admin.is_featured'))
                            ->helperText(__('testimonial.admin.is_featured_helper'))
                            ->default(false),

                        Toggle::make('is_active')
                            ->label(__('testimonial.admin.is_active'))
                            ->helperText(__('testimonial.admin.is_active_helper'))
                            ->default(true),

                        TextInput::make('sort_order')
                            ->label(__('testimonial.admin.sort_order'))
                            ->numeric()
                            ->default(0),
                    ]),
            ]);
    }
}
