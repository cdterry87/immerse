<?php

namespace App\Traits;

use Illuminate\Support\Str;

trait AssignsOrganizationOnCreate
{
    protected function mutateFormDataBeforeCreate(array $data): array
    {
        $user = auth('manager')->user();

        $data['uuid'] = Str::uuid()->toString();
        $data['organization_id'] = $user->organization_id;

        return $data;
    }
}
