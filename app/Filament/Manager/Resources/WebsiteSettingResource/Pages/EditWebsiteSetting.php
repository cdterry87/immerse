<?php

namespace App\Filament\Manager\Resources\WebsiteSettingResource\Pages;

use App\Filament\Manager\Resources\WebsiteSettingResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditWebsiteSetting extends EditRecord
{
    protected static string $resource = WebsiteSettingResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
