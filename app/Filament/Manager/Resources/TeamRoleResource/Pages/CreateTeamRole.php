<?php

namespace App\Filament\Manager\Resources\TeamRoleResource\Pages;

use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;
use App\Traits\AssignsOrganizationOnCreate;
use App\Filament\Manager\Resources\TeamRoleResource;

class CreateTeamRole extends CreateRecord
{
    use AssignsOrganizationOnCreate;

    protected static string $resource = TeamRoleResource::class;
}
