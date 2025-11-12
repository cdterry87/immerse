<?php

namespace App\Filament\Manager\Resources\OrganizationResource\Pages;

use App\Filament\Manager\Resources\OrganizationResource;
use App\Models\Organization;
use Filament\Resources\Pages\EditRecord;

class ManageOrganization extends EditRecord
{
    protected static string $resource = OrganizationResource::class;

    public function mount($record = null): void
    {
        $organizationId = auth('manager')->user()->organization_id;

        // Ensure they’re actually tied to an organization
        if (! $organizationId) {
            abort(403, 'You are not assigned to an organization.');
        }

        $this->record = Organization::findOrFail($organizationId);

        // Pass the record ID instead of the model
        parent::mount($this->record->getKey());
    }

    protected function getHeaderActions(): array
    {
        return []; // No Create/Delete buttons
    }
}
