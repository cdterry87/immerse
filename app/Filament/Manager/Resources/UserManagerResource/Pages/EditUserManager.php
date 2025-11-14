<?php

namespace App\Filament\Manager\Resources\UserManagerResource\Pages;

use Filament\Actions;
use Filament\Actions\Action;
use App\Enums\ManagerPermission;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;
use App\Filament\Manager\Resources\UserManagerResource;

class EditUserManager extends EditRecord
{
    protected static string $resource = UserManagerResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Action::make('emailInvite')
                ->label('Email Invite')
                ->action(function () {
                    $user = $this->record;

                    // Mail::to($user->email)->send(new UserInviteMail($user));

                    \Filament\Notifications\Notification::make()
                        ->title('Invite email sent successfully.')
                        ->success()
                        ->send();
                })
                ->requiresConfirmation()
                ->icon('heroicon-o-envelope'),
            Action::make('resetPassword')
                ->label('Reset Password')
                ->action(function () {
                    $user = $this->record;
                    $resetUrl = route('filament.hr.auth.password-reset.request');

                    // Mail::to($user->email)->send(new PasswordResetRequestMail($user, $resetUrl));

                    \Filament\Notifications\Notification::make()
                        ->title('Password reset request email sent successfully.')
                        ->success()
                        ->send();
                })
                ->requiresConfirmation()
                ->icon('heroicon-o-lock-closed')
                ->color('info'),
            DeleteAction::make()
                ->label('Delete')
                ->requiresConfirmation()
                ->icon('heroicon-o-trash')
                ->color('danger')
                ->visible(function () {
                    return auth('manager')->user()->can(ManagerPermission::DELETE_MANAGER_USERS->value);
                }),
        ];
    }

    protected function mutateFormDataBeforeFill(array $data): array
    {
        $data['permissions'] = $this->record
            ->permissions
            ->pluck('name')
            ->toArray();

        return $data;
    }

    protected function mutateFormDataBeforeSave(array $data): array
    {
        // Remove permissions from data to avoid mass assignment issues
        unset($data['permissions']);

        return $data;
    }

    protected function afterSave(): void
    {
        $this->record->syncPermissions($this->data['permissions'] ?? []);
    }
}
