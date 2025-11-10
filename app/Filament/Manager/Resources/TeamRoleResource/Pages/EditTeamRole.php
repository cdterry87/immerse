<?php

namespace App\Filament\Manager\Resources\TeamRoleResource\Pages;

use App\Filament\Manager\Resources\TeamRoleResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditTeamRole extends EditRecord
{
    protected static string $resource = TeamRoleResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
