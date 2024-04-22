<?php

namespace App\Filament\Resources\StaffDetailResource\Pages;

use App\Filament\Resources\StaffDetailResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListStaffDetails extends ListRecords
{
    protected static string $resource = StaffDetailResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
