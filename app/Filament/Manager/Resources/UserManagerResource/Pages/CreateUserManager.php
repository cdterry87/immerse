<?php

namespace App\Filament\Manager\Resources\UserManagerResource\Pages;

use Filament\Actions;
use Illuminate\Support\Str;
use Filament\Resources\Pages\CreateRecord;
use App\Filament\Manager\Resources\UserManagerResource;

class CreateUserManager extends CreateRecord
{
    protected static string $resource = UserManagerResource::class;

    protected function mutateFormDataBeforeCreate(array $data): array
    {
        // Remove permissions from data to avoid mass assignment issues
        unset($data['permissions']);

        // Make sure organization_id is set the same as the logged-in manager user if not provided
        if (auth('manager')->check() && (!isset($data['organization_id']) || empty($data['organization_id']))) {
            $data['organization_id'] = auth('manager')->user()->organization_id;
        }

        // Generate a random password for the HR user
        $data['password'] = bcrypt(Str::random(12));

        return $data;
    }

    protected function afterCreate(): void
    {
        $this->record->syncPermissions($this->data['permissions'] ?? []);
    }
}
