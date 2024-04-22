<?php

namespace App\Enums;

use Filament\Support\Contracts\HasColor;
use Filament\Support\Contracts\HasLabel;

enum RolesType: string implements HasLabel, HasColor
{
    case ADMIN = 'admin';
    case STAFF = 'staff';
    case KEMENTERIAN = 'kementerian';

    public function getLabel(): ?string
    {
        return match ($this) {
            self::ADMIN => 'Admin',
            self::STAFF => 'Staff',
            self::KEMENTERIAN => 'Kementerian',
        };
    }

    public function getColor(): string|array|null
    {
        return match ($this) {
            self::ADMIN => 'danger',
            self::STAFF => 'primary',
            self::KEMENTERIAN => 'success',
        };
    }
}
