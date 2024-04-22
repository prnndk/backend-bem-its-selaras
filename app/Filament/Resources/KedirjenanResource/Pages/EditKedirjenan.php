<?php

namespace App\Filament\Resources\KedirjenanResource\Pages;

use App\Filament\Resources\KedirjenanResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditKedirjenan extends EditRecord
{
    protected static string $resource = KedirjenanResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
