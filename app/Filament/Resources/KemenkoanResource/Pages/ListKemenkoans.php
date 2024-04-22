<?php

namespace App\Filament\Resources\KemenkoanResource\Pages;

use App\Filament\Resources\KemenkoanResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListKemenkoans extends ListRecords
{
    protected static string $resource = KemenkoanResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make()->label('Tambah Kemenkoan')->icon('heroicon-s-plus'),
        ];
    }
}
