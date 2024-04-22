<?php

namespace App\Filament\Resources\KementerianResource\Pages;

use App\Filament\Resources\KementerianResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditKementerian extends EditRecord
{
    protected static string $resource = KementerianResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
