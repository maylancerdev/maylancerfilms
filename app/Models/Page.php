<?php

declare(strict_types=1);

namespace App\Models;

use App\Enums\PageStatus;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Cache;

class Page extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'slug',
        'body',
        'excerpt',
        'cover_image',
        'cover_image_alt',
        'status',
        'show_in_header',
        'show_in_footer',
        'footer_position',
        'sort_order',
        'meta_title',
        'meta_description',
        'published_at',
    ];

    protected function casts(): array
    {
        return [
            'status' => PageStatus::class,
            'show_in_header' => 'boolean',
            'show_in_footer' => 'boolean',
            'sort_order' => 'integer',
            'published_at' => 'datetime',
        ];
    }

    protected static function booted(): void
    {
        $clearCache = function () {
            Cache::forget('header_pages');
            Cache::forget('footer_nav_pages');
            Cache::forget('footer_legal_pages');
        };

        static::saved($clearCache);
        static::deleted($clearCache);
    }

    // ── Scopes ──

    public function scopePublished(Builder $query): Builder
    {
        return $query->where('status', PageStatus::Published)
            ->where('published_at', '<=', now());
    }

    public function scopeHeaderPages(Builder $query): Builder
    {
        return $query->published()->where('show_in_header', true);
    }

    public function scopeFooterPages(Builder $query): Builder
    {
        return $query->published()->where('show_in_footer', true);
    }

    public function scopeFooterNavPages(Builder $query): Builder
    {
        return $query->published()->where('show_in_footer', true)->where('footer_position', 'nav');
    }

    public function scopeFooterLegalPages(Builder $query): Builder
    {
        return $query->published()->where('show_in_footer', true)->where('footer_position', 'legal');
    }

    public function scopeOrdered(Builder $query): Builder
    {
        return $query->orderBy('sort_order');
    }
}
