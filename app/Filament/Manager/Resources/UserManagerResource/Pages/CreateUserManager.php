<?php

namespace App\Filament\Manager\Resources\UserManagerResource\Pages;

use App\Filament\Manager\Resources\UserManagerResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateUserManager extends CreateRecord
{
    protected static string $resource = UserManagerResource::class;
}
