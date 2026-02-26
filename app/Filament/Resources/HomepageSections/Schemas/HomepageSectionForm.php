<?php

declare(strict_types=1);

namespace App\Filament\Resources\HomepageSections\Schemas;

use App\Models\HomepageSection;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Components\Tabs;
use Filament\Schemas\Components\Tabs\Tab;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;

class HomepageSectionForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Tabs::make('HomepageSection')
                    ->schema(fn (?HomepageSection $record): array => match ($record?->slug) {
                        'hero' => static::heroTabs(),
                        'video' => static::videoTabs(),
                        'awards' => static::awardsTabs(),
                        'services' => static::servicesTabs(),
                        'portfolio' => static::portfolioTabs(),
                        'blog_section' => static::blogSectionTabs(),
                        default => [static::settingsTab()],
                    })
                    ->columnSpanFull(),
            ]);
    }

    /**
     * @return array<Tab>
     */
    private static function heroTabs(): array
    {
        return [
            Tab::make(__('homepage.admin.tab_content'))
                ->icon(Heroicon::PencilSquare)
                ->schema([
                    TextInput::make('content.title')
                        ->label(__('homepage.admin.hero_title'))
                        ->maxLength(255)
                        ->columnSpanFull(),

                    Textarea::make('content.description')
                        ->label(__('homepage.admin.hero_description'))
                        ->rows(3)
                        ->maxLength(500)
                        ->columnSpanFull(),

                    TextInput::make('content.cta_text')
                        ->label(__('homepage.admin.hero_cta_text'))
                        ->maxLength(255),

                    TextInput::make('content.cta_link')
                        ->label(__('homepage.admin.hero_cta_link'))
                        ->maxLength(255),
                ]),

            Tab::make(__('homepage.admin.tab_media'))
                ->icon(Heroicon::Photo)
                ->schema([
                    FileUpload::make('content.images')
                        ->label(__('homepage.admin.hero_images'))
                        ->image()
                        ->multiple()
                        ->reorderable()
                        ->disk('public')
                        ->directory('homepage/hero')
                        ->visibility('public')
                        ->imageResizeMode('cover')
                        ->imageResizeTargetWidth('800')
                        ->imageResizeTargetHeight('1000')
                        ->maxSize(5120)
                        ->columnSpanFull(),
                ]),

            static::settingsTab(),
        ];
    }

    /**
     * @return array<Tab>
     */
    private static function videoTabs(): array
    {
        return [
            Tab::make(__('homepage.admin.tab_content'))
                ->icon(Heroicon::PencilSquare)
                ->schema([
                    TextInput::make('content.video_url')
                        ->label(__('homepage.admin.video_url'))
                        ->url()
                        ->maxLength(255)
                        ->columnSpanFull(),
                ]),

            static::settingsTab(),
        ];
    }

    /**
     * @return array<Tab>
     */
    private static function awardsTabs(): array
    {
        return [
            Tab::make(__('homepage.admin.tab_media'))
                ->icon(Heroicon::Photo)
                ->schema([
                    FileUpload::make('content.images')
                        ->label(__('homepage.admin.awards_images'))
                        ->image()
                        ->multiple()
                        ->reorderable()
                        ->disk('public')
                        ->directory('homepage/awards')
                        ->visibility('public')
                        ->imageResizeMode('contain')
                        ->imageResizeTargetWidth('600')
                        ->imageResizeTargetHeight('400')
                        ->maxSize(5120)
                        ->columnSpanFull(),
                ]),

            static::settingsTab(),
        ];
    }

    /**
     * @return array<Tab>
     */
    private static function servicesTabs(): array
    {
        return [
            Tab::make(__('homepage.admin.tab_content'))
                ->icon(Heroicon::PencilSquare)
                ->schema([
                    TextInput::make('content.headline')
                        ->label(__('homepage.admin.services_headline'))
                        ->maxLength(255)
                        ->columnSpanFull(),

                    Textarea::make('content.description')
                        ->label(__('homepage.admin.services_description'))
                        ->rows(3)
                        ->maxLength(500)
                        ->columnSpanFull(),
                ]),

            Tab::make(__('homepage.admin.tab_items'))
                ->icon(Heroicon::ListBullet)
                ->schema([
                    Repeater::make('content.items')
                        ->label(__('homepage.admin.services_items'))
                        ->schema([
                            TextInput::make('title')
                                ->label(__('homepage.admin.services_item_title'))
                                ->required()
                                ->maxLength(255),

                            FileUpload::make('image')
                                ->label(__('homepage.admin.services_item_image'))
                                ->image()
                                ->disk('public')
                                ->directory('homepage/services')
                                ->visibility('public')
                                ->imageResizeMode('cover')
                                ->imageResizeTargetWidth('800')
                                ->imageResizeTargetHeight('600')
                                ->maxSize(5120),

                            TextInput::make('image_alt')
                                ->label(__('homepage.admin.services_item_image_alt'))
                                ->maxLength(255),

                            TextInput::make('link')
                                ->label(__('homepage.admin.services_item_link'))
                                ->maxLength(255),
                        ])
                        ->defaultItems(0)
                        ->reorderable()
                        ->columnSpanFull(),
                ]),

            static::settingsTab(),
        ];
    }

    /**
     * @return array<Tab>
     */
    private static function portfolioTabs(): array
    {
        return [
            Tab::make(__('homepage.admin.tab_content'))
                ->icon(Heroicon::PencilSquare)
                ->schema([
                    TextInput::make('content.headline')
                        ->label(__('homepage.admin.portfolio_headline'))
                        ->maxLength(255)
                        ->columnSpanFull(),

                    Textarea::make('content.description')
                        ->label(__('homepage.admin.portfolio_description'))
                        ->rows(3)
                        ->maxLength(500)
                        ->columnSpanFull(),

                    TextInput::make('content.cta_text')
                        ->label(__('homepage.admin.portfolio_cta_text'))
                        ->maxLength(255),

                    TextInput::make('content.cta_link')
                        ->label(__('homepage.admin.portfolio_cta_link'))
                        ->maxLength(255),
                ]),

            Tab::make(__('homepage.admin.tab_items'))
                ->icon(Heroicon::ListBullet)
                ->schema([
                    Repeater::make('content.items')
                        ->label(__('homepage.admin.portfolio_items'))
                        ->schema([
                            TextInput::make('title_top')
                                ->label(__('homepage.admin.portfolio_item_title_top'))
                                ->required()
                                ->maxLength(255),

                            TextInput::make('title_bottom')
                                ->label(__('homepage.admin.portfolio_item_title_bottom'))
                                ->required()
                                ->maxLength(255),

                            TextInput::make('video_url')
                                ->label(__('homepage.admin.portfolio_item_video_url'))
                                ->required()
                                ->maxLength(255),

                            TextInput::make('link')
                                ->label(__('homepage.admin.portfolio_item_link'))
                                ->maxLength(255),
                        ])
                        ->defaultItems(0)
                        ->reorderable()
                        ->columnSpanFull(),
                ]),

            static::settingsTab(),
        ];
    }

    /**
     * @return array<Tab>
     */
    private static function blogSectionTabs(): array
    {
        return [
            Tab::make(__('homepage.admin.tab_content'))
                ->icon(Heroicon::PencilSquare)
                ->schema([
                    TextInput::make('content.title')
                        ->label(__('homepage.admin.blog_section_title'))
                        ->maxLength(255)
                        ->columnSpanFull(),
                ]),

            static::settingsTab(),
        ];
    }

    private static function settingsTab(): Tab
    {
        return Tab::make(__('homepage.admin.tab_settings'))
            ->icon(Heroicon::Cog6Tooth)
            ->schema([
                Toggle::make('is_active')
                    ->label(__('homepage.admin.is_active'))
                    ->helperText(__('homepage.admin.is_active_helper'))
                    ->default(true),

                TextInput::make('sort_order')
                    ->label(__('homepage.admin.sort_order'))
                    ->numeric()
                    ->default(0),
            ]);
    }
}
