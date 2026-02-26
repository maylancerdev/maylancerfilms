<?php

declare(strict_types=1);

namespace App\Filament\Pages;

use App\Models\SiteSetting;
use BackedEnum;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Notifications\Notification;
use Filament\Pages\Page;
use Illuminate\Support\Facades\Cache;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;

/**
 * @property-read Schema $form
 */
class ManageSiteSettings extends Page
{
    protected string $view = 'filament.pages.manage-site-settings';

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedCog6Tooth;

    protected static ?int $navigationSort = 1;

    /**
     * @var array<string, mixed>|null
     */
    public ?array $data = [];

    public static function getNavigationGroup(): ?string
    {
        return __('admin.nav.groups.administration');
    }

    public static function getNavigationLabel(): string
    {
        return __('setting.admin.navigation');
    }

    public function getTitle(): string
    {
        return __('setting.admin.navigation');
    }

    public function mount(): void
    {
        $settings = SiteSetting::query()->pluck('value', 'key')->toArray();

        $this->form->fill($settings);
    }

    public function form(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make(__('setting.admin.general'))
                    ->schema([
                        TextInput::make('site_name')
                            ->label(__('setting.admin.site_name'))
                            ->helperText(__('setting.admin.site_name_helper'))
                            ->maxLength(255),

                        Textarea::make('site_description')
                            ->label(__('setting.admin.site_description'))
                            ->helperText(__('setting.admin.site_description_helper'))
                            ->rows(3)
                            ->maxLength(500),
                    ])
                    ->columns(2),

                Section::make(__('setting.admin.branding'))
                    ->schema([
                        FileUpload::make('logo')
                            ->label(__('setting.admin.logo'))
                            ->helperText(__('setting.admin.logo_helper'))
                            ->image()
                            ->disk('public')
                            ->directory('settings')
                            ->visibility('public')
                            ->imageResizeMode('contain')
                            ->imageResizeTargetWidth('400')
                            ->imageResizeTargetHeight('120')
                            ->maxSize(2048),

                        FileUpload::make('logo_dark')
                            ->label(__('setting.admin.logo_dark'))
                            ->helperText(__('setting.admin.logo_dark_helper'))
                            ->image()
                            ->disk('public')
                            ->directory('settings')
                            ->visibility('public')
                            ->imageResizeMode('contain')
                            ->imageResizeTargetWidth('400')
                            ->imageResizeTargetHeight('120')
                            ->maxSize(2048),

                        FileUpload::make('favicon')
                            ->label(__('setting.admin.favicon'))
                            ->helperText(__('setting.admin.favicon_helper'))
                            ->image()
                            ->disk('public')
                            ->directory('settings')
                            ->visibility('public')
                            ->imageResizeMode('contain')
                            ->imageResizeTargetWidth('64')
                            ->imageResizeTargetHeight('64')
                            ->maxSize(1024),

                        FileUpload::make('og_image')
                            ->label(__('setting.admin.og_image'))
                            ->helperText(__('setting.admin.og_image_helper'))
                            ->image()
                            ->disk('public')
                            ->directory('settings')
                            ->visibility('public')
                            ->imageResizeMode('cover')
                            ->imageResizeTargetWidth('1200')
                            ->imageResizeTargetHeight('630')
                            ->maxSize(5120),
                    ])
                    ->columns(2),

                Section::make(__('setting.admin.contact_info'))
                    ->schema([
                        TextInput::make('phone')
                            ->label(__('setting.admin.phone'))
                            ->tel()
                            ->maxLength(255),

                        TextInput::make('email')
                            ->label(__('setting.admin.email'))
                            ->email()
                            ->maxLength(255),

                        Textarea::make('address')
                            ->label(__('setting.admin.address'))
                            ->rows(2)
                            ->maxLength(500)
                            ->columnSpanFull(),
                    ])
                    ->columns(2),

                Section::make(__('setting.admin.social_media'))
                    ->schema([
                        TextInput::make('social_twitter')
                            ->label(__('setting.admin.social_twitter'))
                            ->helperText(__('setting.admin.social_twitter_helper'))
                            ->url()
                            ->maxLength(255),

                        TextInput::make('social_instagram')
                            ->label(__('setting.admin.social_instagram'))
                            ->helperText(__('setting.admin.social_instagram_helper'))
                            ->url()
                            ->maxLength(255),

                        TextInput::make('social_linkedin')
                            ->label(__('setting.admin.social_linkedin'))
                            ->helperText(__('setting.admin.social_linkedin_helper'))
                            ->url()
                            ->maxLength(255),

                        TextInput::make('social_dribbble')
                            ->label(__('setting.admin.social_dribbble'))
                            ->helperText(__('setting.admin.social_dribbble_helper'))
                            ->url()
                            ->maxLength(255),
                    ])
                    ->columns(2),

                Section::make(__('setting.admin.seo_defaults'))
                    ->schema([
                        TextInput::make('default_meta_title')
                            ->label(__('setting.admin.default_meta_title'))
                            ->helperText(__('setting.admin.default_meta_title_helper'))
                            ->maxLength(255),

                        Textarea::make('default_meta_description')
                            ->label(__('setting.admin.default_meta_description'))
                            ->helperText(__('setting.admin.default_meta_description_helper'))
                            ->rows(3)
                            ->maxLength(500)
                            ->columnSpanFull(),
                    ]),

                Section::make(__('setting.admin.analytics'))
                    ->schema([
                        Textarea::make('analytics_code')
                            ->label(__('setting.admin.analytics_code'))
                            ->helperText(__('setting.admin.analytics_code_helper'))
                            ->rows(6)
                            ->columnSpanFull(),
                    ]),

                Section::make(__('setting.admin.footer'))
                    ->schema([
                        Textarea::make('copyright')
                            ->label(__('setting.admin.copyright'))
                            ->helperText(__('setting.admin.copyright_helper'))
                            ->rows(3)
                            ->columnSpanFull(),
                    ]),
            ])
            ->statePath('data');
    }

    public function save(): void
    {
        $data = $this->form->getState();

        foreach ($data as $key => $value) {
            SiteSetting::set($key, $value);
        }

        Cache::forget('site_settings');

        Notification::make()
            ->title(__('setting.saved'))
            ->success()
            ->send();
    }
}
