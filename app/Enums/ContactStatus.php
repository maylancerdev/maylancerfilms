<?php

declare(strict_types=1);

namespace App\Enums;

use Filament\Support\Contracts\HasLabel;

enum ContactStatus: string implements HasLabel
{
    case New = 'new';
    case Reviewed = 'reviewed';
    case Resolved = 'resolved';

    public function getLabel(): string
    {
        return match ($this) {
            self::New => __('contact.admin.status_new'),
            self::Reviewed => __('contact.admin.status_reviewed'),
            self::Resolved => __('contact.admin.status_resolved'),
        };
    }
}
