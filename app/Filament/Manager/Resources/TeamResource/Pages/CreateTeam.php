<?php

namespace App\Filament\Manager\Resources\TeamResource\Pages;

use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;
use App\Traits\AssignsOrganizationOnCreate;
use App\Filament\Manager\Resources\TeamResource;

class CreateTeam extends CreateRecord
{
    use AssignsOrganizationOnCreate;

    protected static string $resource = TeamResource::class;
}
