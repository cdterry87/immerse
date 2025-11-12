<?php

namespace App\Filament\Manager\Resources\MediaGalleryResource\Pages;

use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;
use App\Traits\AssignsOrganizationOnCreate;
use App\Filament\Manager\Resources\MediaGalleryResource;

class CreateMediaGallery extends CreateRecord
{
    use AssignsOrganizationOnCreate;

    protected static string $resource = MediaGalleryResource::class;
}
