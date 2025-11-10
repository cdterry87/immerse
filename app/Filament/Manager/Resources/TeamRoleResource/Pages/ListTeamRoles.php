<?php

namespace App\Filament\Manager\Resources\TeamRoleResource\Pages;

use App\Filament\Manager\Resources\TeamRoleResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListTeamRoles extends ListRecords
{
    protected static string $resource = TeamRoleResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
