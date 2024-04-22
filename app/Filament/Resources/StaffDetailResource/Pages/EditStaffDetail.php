<?php

namespace App\Filament\Resources\StaffDetailResource\Pages;

use App\Filament\Resources\StaffDetailResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditStaffDetail extends EditRecord
{
    protected static string $resource = StaffDetailResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\ViewAction::make(),
            Actions\DeleteAction::make(),
        ];
    }
}
