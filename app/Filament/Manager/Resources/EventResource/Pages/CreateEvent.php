<?php

namespace App\Filament\Manager\Resources\EventResource\Pages;

use Illuminate\Support\Str;
use Filament\Resources\Pages\CreateRecord;
use App\Traits\AssignsOrganizationOnCreate;
use App\Filament\Manager\Resources\EventResource;

class CreateEvent extends CreateRecord
{
    use AssignsOrganizationOnCreate;

    protected static string $resource = EventResource::class;
}
