<?php

namespace App\Filament\Manager\Resources\LocationResource\Pages;

use Filament\Actions;
use Illuminate\Support\Str;
use Filament\Resources\Pages\CreateRecord;
use App\Traits\AssignsOrganizationOnCreate;
use App\Filament\Manager\Resources\LocationResource;

class CreateLocation extends CreateRecord
{
    use AssignsOrganizationOnCreate;

    protected static string $resource = LocationResource::class;
}
