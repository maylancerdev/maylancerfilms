<?php

declare(strict_types=1);

namespace App\Enums;

use Filament\Support\Contracts\HasLabel;

enum PostStatus: string implements HasLabel
{
    case Draft = 'draft';
    case Published = 'published';
    case Scheduled = 'scheduled';

    public function getLabel(): string
    {
        return match ($this) {
            self::Draft => __('blog.admin.status_draft'),
            self::Published => __('blog.admin.status_published'),
            self::Scheduled => __('blog.admin.status_scheduled'),
        };
    }
}
