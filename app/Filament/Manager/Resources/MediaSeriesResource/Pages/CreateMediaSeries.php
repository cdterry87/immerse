<?php

namespace App\Filament\Manager\Resources\MediaSeriesResource\Pages;

use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;
use App\Traits\AssignsOrganizationOnCreate;
use App\Filament\Manager\Resources\MediaSeriesResource;

class CreateMediaSeries extends CreateRecord
{
    use AssignsOrganizationOnCreate;

    protected static string $resource = MediaSeriesResource::class;
}
