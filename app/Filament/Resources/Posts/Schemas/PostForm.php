<?php

declare(strict_types=1);

namespace App\Filament\Resources\Posts\Schemas;

use App\Enums\PostStatus;
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

class PostForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Tabs::make('Post')
                    ->schema([
                        Tab::make(__('blog.admin.tab_content'))
                            ->icon(Heroicon::PencilSquare)
                            ->schema([
                                TextInput::make('title')
                                    ->label(__('blog.admin.title'))
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
                                    ->label(__('blog.admin.slug'))
                                    ->disabled()
                                    ->dehydrated()
                                    ->required()
                                    ->maxLength(255)
                                    ->unique(ignoreRecord: true),

                                MarkdownEditor::make('body')
                                    ->label(__('blog.admin.body'))
                                    ->required()
                                    ->fileAttachmentsDirectory('blog/attachments')
                                    ->columnSpanFull(),

                                Textarea::make('excerpt')
                                    ->label(__('blog.admin.excerpt'))
                                    ->rows(3)
                                    ->maxLength(500)
                                    ->helperText(__('blog.admin.excerpt_helper'))
                                    ->columnSpanFull(),
                            ]),

                        Tab::make(__('blog.admin.tab_media'))
                            ->icon(Heroicon::Photo)
                            ->schema([
                                FileUpload::make('cover_image')
                                    ->label(__('blog.admin.cover_image'))
                                    ->image()
                                    ->disk('public')
                                    ->directory('blog/covers')
                                    ->visibility('public')
                                    ->imageEditor()
                                    ->imageResizeMode('cover')
                                    ->imageResizeTargetWidth('1200')
                                    ->imageResizeTargetHeight('630')
                                    ->maxSize(5120),

                                TextInput::make('cover_image_alt')
                                    ->label(__('blog.admin.cover_image_alt'))
                                    ->helperText(__('blog.admin.cover_image_alt_helper'))
                                    ->maxLength(255),
                            ]),

                        Tab::make(__('blog.admin.tab_publishing'))
                            ->icon(Heroicon::Clock)
                            ->columns(2)
                            ->schema([
                                ToggleButtons::make('status')
                                    ->label(__('blog.admin.status'))
                                    ->options(PostStatus::class)
                                    ->inline()
                                    ->required()
                                    ->default(PostStatus::Draft)
                                    ->columnSpanFull(),

                                DateTimePicker::make('published_at')
                                    ->label(__('blog.admin.published_at'))
                                    ->helperText(__('blog.admin.published_at_helper')),

                                Toggle::make('is_featured')
                                    ->label(__('blog.admin.is_featured'))
                                    ->default(false)
                                    ->helperText(__('blog.admin.is_featured_helper')),

                                Select::make('category_id')
                                    ->label(__('blog.admin.category'))
                                    ->relationship('category', 'name')
                                    ->searchable()
                                    ->preload()
                                    ->createOptionForm([
                                        TextInput::make('name')
                                            ->required()
                                            ->maxLength(255),
                                        TextInput::make('slug')
                                            ->required()
                                            ->maxLength(255)
                                            ->unique('categories', 'slug'),
                                    ]),

                                Select::make('user_id')
                                    ->label(__('blog.admin.author'))
                                    ->relationship('author', 'name')
                                    ->default(fn (): ?int => auth()->id())
                                    ->required()
                                    ->searchable()
                                    ->preload(),

                                Select::make('tags')
                                    ->label(__('blog.admin.tags_label'))
                                    ->relationship('tags', 'name')
                                    ->multiple()
                                    ->searchable()
                                    ->preload()
                                    ->createOptionForm([
                                        TextInput::make('name')
                                            ->required()
                                            ->maxLength(255),
                                        TextInput::make('slug')
                                            ->required()
                                            ->maxLength(255)
                                            ->unique('tags', 'slug'),
                                    ])
                                    ->columnSpanFull(),
                            ]),

                        Tab::make(__('blog.admin.tab_seo'))
                            ->icon(Heroicon::MagnifyingGlass)
                            ->columns(2)
                            ->schema([
                                TextInput::make('meta_title')
                                    ->label(__('blog.admin.meta_title'))
                                    ->maxLength(60)
                                    ->helperText(__('blog.admin.meta_title_helper')),

                                Textarea::make('meta_description')
                                    ->label(__('blog.admin.meta_description'))
                                    ->rows(3)
                                    ->maxLength(160)
                                    ->helperText(__('blog.admin.meta_description_helper'))
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
