<?php

namespace App\Filament\Resources\PostReviewResource\Pages;

use App\Filament\Resources\PostReviewResource;
use Filament\Actions;
use Filament\Resources\Pages\ViewRecord;

class ViewPostReview extends ViewRecord
{
    protected static string $resource = PostReviewResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\EditAction::make(),
        ];
    }
}
