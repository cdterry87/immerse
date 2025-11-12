<?php

namespace App\Filament\Manager\Resources\DonationTypeResource\Pages;

use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;
use App\Traits\AssignsOrganizationOnCreate;
use App\Filament\Manager\Resources\DonationTypeResource;

class CreateDonationType extends CreateRecord
{
    use AssignsOrganizationOnCreate;

    protected static string $resource = DonationTypeResource::class;
}
