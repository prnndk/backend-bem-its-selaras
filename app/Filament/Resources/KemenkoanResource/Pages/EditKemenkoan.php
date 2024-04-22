<?php

namespace App\Filament\Resources\KemenkoanResource\Pages;

use App\Filament\Resources\KemenkoanResource;
use Filament\Actions;
use Filament\Actions\Action;
use Filament\Resources\Pages\EditRecord;

class EditKemenkoan extends EditRecord
{
    protected static string $resource = KemenkoanResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Action::make('Back to Kemenkoan')
                ->url('../')
                ->icon('heroicon-s-arrow-small-left'),
            Actions\DeleteAction::make(),
            Actions\ViewAction::make()
        ];
    }
}
