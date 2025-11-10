<?php

namespace App\Filament\Manager\Resources\MediaSeriesItemResource\Pages;

use App\Filament\Manager\Resources\MediaSeriesItemResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListMediaSeriesItems extends ListRecords
{
    protected static string $resource = MediaSeriesItemResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
