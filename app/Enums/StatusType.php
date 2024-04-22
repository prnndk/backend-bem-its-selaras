<?php

namespace App\Enums;

use Filament\Support\Contracts\HasColor;
use Filament\Support\Contracts\HasIcon;
use Filament\Support\Contracts\HasLabel;

enum StatusType: string implements HasLabel, HasIcon, HasColor
{
    case DRAFT = 'draft';
    case REVISED = 'revised';
    case PUBLISHED = 'published';
    case ACCEPTED = 'accepted';
    case REJECTED = 'rejected';

    public function getLabel(): ?string
    {
        return match ($this) {
            self::DRAFT => 'Draft',
            self::REVISED => 'Revised',
            self::PUBLISHED => 'Published',
            self::ACCEPTED => 'Accepted',
            self::REJECTED => 'Rejected',
        };
    }

    public function getColor(): string|array|null
    {
        return match ($this) {
            self::DRAFT => 'primary',
            self::REVISED => 'warning',
            self::PUBLISHED, self::ACCEPTED => 'success',
            self::REJECTED => 'danger',
        };
    }

    public function getIcon(): ?string
    {
        return match ($this) {
            self::DRAFT => 'heroicon-o-document-text',
            self::REVISED => 'heroicon-o-arrow-path',
            self::PUBLISHED => "heroicon-o-document-arrow-up",
            self::ACCEPTED => 'heroicon-o-document-check',
            self::REJECTED => 'heroicon-o-x-circle',
        };
    }
}
