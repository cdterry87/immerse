<?php

namespace App\Filament\Manager\Resources\StaffMemberResource\Pages;

use App\Filament\Manager\Resources\StaffMemberResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListStaffMembers extends ListRecords
{
    protected static string $resource = StaffMemberResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
