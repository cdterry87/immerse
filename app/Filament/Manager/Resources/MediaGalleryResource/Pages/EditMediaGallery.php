<?php

namespace App\Filament\Manager\Resources\MediaGalleryResource\Pages;

use App\Filament\Manager\Resources\MediaGalleryResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditMediaGallery extends EditRecord
{
    protected static string $resource = MediaGalleryResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
