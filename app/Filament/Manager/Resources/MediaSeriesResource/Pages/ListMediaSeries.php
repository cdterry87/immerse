<?php

namespace App\Filament\Manager\Resources\MediaSeriesResource\Pages;

use App\Filament\Manager\Resources\MediaSeriesResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListMediaSeries extends ListRecords
{
    protected static string $resource = MediaSeriesResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
