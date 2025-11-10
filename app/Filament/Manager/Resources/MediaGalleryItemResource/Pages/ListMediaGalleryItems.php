<?php

namespace App\Filament\Manager\Resources\MediaGalleryItemResource\Pages;

use App\Filament\Manager\Resources\MediaGalleryItemResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListMediaGalleryItems extends ListRecords
{
    protected static string $resource = MediaGalleryItemResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
