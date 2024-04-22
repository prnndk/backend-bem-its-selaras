<?php

namespace App\Filament\Resources\KementerianResource\Pages;

use App\Filament\Resources\KementerianResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListKementerians extends ListRecords
{
    protected static string $resource = KementerianResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
