<?php

namespace App\Filament\Manager\Resources\MediaGalleryItemResource\Pages;

use App\Filament\Manager\Resources\MediaGalleryItemResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditMediaGalleryItem extends EditRecord
{
    protected static string $resource = MediaGalleryItemResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
