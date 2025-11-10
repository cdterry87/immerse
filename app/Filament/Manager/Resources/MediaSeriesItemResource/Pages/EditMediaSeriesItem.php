<?php

namespace App\Filament\Manager\Resources\MediaSeriesItemResource\Pages;

use App\Filament\Manager\Resources\MediaSeriesItemResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditMediaSeriesItem extends EditRecord
{
    protected static string $resource = MediaSeriesItemResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
