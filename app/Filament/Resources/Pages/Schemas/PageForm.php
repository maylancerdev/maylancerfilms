<?php

declare(strict_types=1);

namespace App\Filament\Resources\Pages\Schemas;

use App\Enums\PageStatus;
use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\MarkdownEditor;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Components\ToggleButtons;
use Filament\Forms\Components\ViewField;
use Filament\Schemas\Components\Tabs;
use Filament\Schemas\Components\Tabs\Tab;
use Filament\Schemas\Components\Utilities\Get;
use Filament\Schemas\Components\Utilities\Set;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Illuminate\Support\Str;

class PageForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Tabs::make('Page')
                    ->schema([
                        Tab::make(__('page.admin.tab_content'))
                            ->icon(Heroicon::PencilSquare)
                            ->schema([
                                TextInput::make('title')
                                    ->label(__('page.admin.title'))
                                    ->required()
                                    ->maxLength(255)
                                    ->live(onBlur: true)
                                    ->afterStateUpdated(function (string $operation, ?string $state, Set $set): void {
                                        if ($operation !== 'create') {
                                            return;
                                        }

                                        $set('slug', Str::slug($state));
                                    }),

                                TextInput::make('slug')
                                    ->label(__('page.admin.slug'))
                                    ->disabled()
                                    ->dehydrated()
                                    ->required()
                                    ->maxLength(255)
                                    ->unique(ignoreRecord: true),

                                MarkdownEditor::make('body')
                                    ->label(__('page.admin.body'))
                                    ->required()
                                    ->fileAttachmentsDirectory('pages/attachments')
                                    ->columnSpanFull(),

                                Textarea::make('excerpt')
                                    ->label(__('page.admin.excerpt'))
                                    ->rows(3)
                                    ->maxLength(500)
                                    ->helperText(__('page.admin.excerpt_helper'))
                                    ->columnSpanFull(),
                            ]),

                        Tab::make(__('page.admin.tab_media'))
                            ->icon(Heroicon::Photo)
                            ->schema([
                                FileUpload::make('cover_image')
                                    ->label(__('page.admin.cover_image'))
                                    ->image()
                                    ->disk('public')
                                    ->directory('pages/covers')
                                    ->visibility('public')
                                    ->imageEditor()
                                    ->imageResizeMode('cover')
                                    ->imageResizeTargetWidth('1200')
                                    ->imageResizeTargetHeight('630')
                                    ->maxSize(5120),

                                TextInput::make('cover_image_alt')
                                    ->label(__('page.admin.cover_image_alt'))
                                    ->helperText(__('page.admin.cover_image_alt_helper'))
                                    ->maxLength(255),
                            ]),

                        Tab::make(__('page.admin.tab_settings'))
                            ->icon(Heroicon::Cog6Tooth)
                            ->columns(2)
                            ->schema([
                                ToggleButtons::make('status')
                                    ->label(__('page.admin.status'))
                                    ->options(PageStatus::class)
                                    ->inline()
                                    ->required()
                                    ->default(PageStatus::Draft)
                                    ->columnSpanFull(),

                                DateTimePicker::make('published_at')
                                    ->label(__('page.admin.published_at'))
                                    ->helperText(__('page.admin.published_at_helper')),

                                TextInput::make('sort_order')
                                    ->label(__('page.admin.sort_order'))
                                    ->numeric()
                                    ->default(0)
                                    ->helperText(__('page.admin.sort_order_helper')),

                                Toggle::make('show_in_header')
                                    ->label(__('page.admin.show_in_header'))
                                    ->default(false)
                                    ->helperText(__('page.admin.show_in_header_helper')),

                                Toggle::make('show_in_footer')
                                    ->label(__('page.admin.show_in_footer'))
                                    ->default(false)
                                    ->live()
                                    ->helperText(__('page.admin.show_in_footer_helper')),

                                Select::make('footer_position')
                                    ->label(__('page.admin.footer_position'))
                                    ->options([
                                        'nav' => __('page.admin.footer_position_nav'),
                                        'legal' => __('page.admin.footer_position_legal'),
                                    ])
                                    ->default('nav')
                                    ->visible(fn (Get $get): bool => (bool) $get('show_in_footer'))
                                    ->helperText(__('page.admin.footer_position_helper')),
                            ]),

                        Tab::make(__('page.admin.tab_seo'))
                            ->icon(Heroicon::MagnifyingGlass)
                            ->columns(2)
                            ->schema([
                                TextInput::make('meta_title')
                                    ->label(__('page.admin.meta_title'))
                                    ->maxLength(60)
                                    ->helperText(__('page.admin.meta_title_helper')),

                                Textarea::make('meta_description')
                                    ->label(__('page.admin.meta_description'))
                                    ->rows(3)
                                    ->maxLength(160)
                                    ->helperText(__('page.admin.meta_description_helper'))
                                    ->columnSpanFull(),

                                ViewField::make('og_preview')
                                    ->view('filament.forms.og-preview')
                                    ->dehydrated(false)
                                    ->afterStateHydrated(fn (ViewField $component) => $component->state($component->getRecord()?->cover_image))
                                    ->columnSpanFull(),
                            ]),
                    ])
                    ->columnSpanFull(),
            ]);
    }
}
