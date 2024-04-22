<?php

namespace App\Filament\Resources\KedirjenanResource\Pages;

use App\Filament\Resources\KedirjenanResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListKedirjenans extends ListRecords
{
    protected static string $resource = KedirjenanResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
