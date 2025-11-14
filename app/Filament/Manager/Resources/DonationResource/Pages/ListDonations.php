<?php

namespace App\Filament\Manager\Resources\DonationResource\Pages;

use App\Filament\Manager\Resources\DonationResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListDonations extends ListRecords
{
    protected static string $resource = DonationResource::class;
}
