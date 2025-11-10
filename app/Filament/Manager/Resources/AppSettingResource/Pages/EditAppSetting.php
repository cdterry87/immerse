<?php

namespace App\Filament\Manager\Resources\AppSettingResource\Pages;

use App\Filament\Manager\Resources\AppSettingResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditAppSetting extends EditRecord
{
    protected static string $resource = AppSettingResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
