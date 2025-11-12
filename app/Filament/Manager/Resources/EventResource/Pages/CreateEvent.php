<?php

namespace App\Filament\Manager\Resources\EventResource\Pages;

use App\Filament\Manager\Resources\EventResource;
use Filament\Resources\Pages\CreateRecord;
use Illuminate\Support\Str;

class CreateEvent extends CreateRecord
{
    protected static string $resource = EventResource::class;

    protected function mutateFormDataBeforeCreate(array $data): array
    {
        $data['uuid'] = Str::uuid()->toString();
        $data['organization_id'] = auth('manager')->user()->organization_id;

        return $data;
    }
}
