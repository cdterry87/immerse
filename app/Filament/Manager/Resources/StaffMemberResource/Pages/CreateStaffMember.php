<?php

namespace App\Filament\Manager\Resources\StaffMemberResource\Pages;

use Filament\Actions;
use Illuminate\Support\Str;
use Filament\Resources\Pages\CreateRecord;
use App\Traits\AssignsOrganizationOnCreate;
use App\Filament\Manager\Resources\StaffMemberResource;

class CreateStaffMember extends CreateRecord
{
    use AssignsOrganizationOnCreate;

    protected static string $resource = StaffMemberResource::class;
}
