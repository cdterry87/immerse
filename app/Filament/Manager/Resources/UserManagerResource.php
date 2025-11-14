<?php

namespace App\Filament\Manager\Resources;

use Filament\Tables;
use Filament\Forms\Form;
use Filament\Tables\Table;
use App\Models\UserManager;
use App\Enums\ManagerPermission;
use Filament\Resources\Resource;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Components\Section;
use Filament\Tables\Columns\TextColumn;
use Illuminate\Database\Eloquent\Model;
use Filament\Forms\Components\TextInput;
use Illuminate\Database\Eloquent\Builder;
use Filament\Forms\Components\CheckboxList;
use App\Filament\Hr\Resources\UserHrResource\Pages;
use App\Filament\Manager\Resources\UserManagerResource\Pages\EditUserManager;
use App\Filament\Manager\Resources\UserManagerResource\Pages\ListUserManagers;
use App\Filament\Manager\Resources\UserManagerResource\Pages\CreateUserManager;

class UserManagerResource extends Resource
{
    protected static ?string $model = UserManager::class;

    protected static ?string $navigationIcon = 'heroicon-o-users';
    protected static ?string $navigationGroup = 'Organization Management';
    protected static ?string $label = 'Manage User';
    protected static ?string $pluralLabel = 'Manage Users';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Section::make('User Details')
                    ->description('Please provide the following information. This user will be granted permission to log in and manage organization details based on the permissions you set below.')
                    ->collapsible()
                    ->schema([
                        TextInput::make('email')
                            ->required()
                            ->email(),
                        TextInput::make('name')
                            ->required(),
                        Toggle::make('active')
                            ->label('Active')
                            ->default(true)
                            ->hintIcon('heroicon-o-exclamation-circle')
                            ->helperText('Inactive users cannot log in or access the system.')
                            ->columnSpanFull(),
                    ])->columns(1),
                Section::make('Permissions')
                    ->description('Set the permissions for this user by selecting from the options below.')
                    ->collapsible()
                    ->schema([
                        CheckboxList::make('permissions')
                            ->label('Available Permissions')
                            ->options(ManagerPermission::options())
                            ->searchable()
                            ->bulkToggleable()
                            ->columns(3)
                    ])->columnSpanFull(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('name')->searchable()->sortable(),
                TextColumn::make('email')->searchable()->sortable(),
                TextColumn::make('active')
                    ->label('Active')
                    ->badge()
                    ->sortable()
                    ->formatStateUsing(fn($state) => $state ? 'Active' : 'Inactive')
                    ->colors([
                        'success' => 1,
                        'danger' => 0,
                    ]),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => ListUserManagers::route('/'),
            'create' => CreateUserManager::route('/create'),
            'edit' => EditUserManager::route('/{record}/edit'),
        ];
    }

    // public static function canViewAny(): bool
    // {
    //     return auth('manager')->user()->can(ManagerPermission::VIEW_MANAGER_USERS->value);
    // }

    // public static function canCreate(): bool
    // {
    //     return auth('manager')->user()->can(ManagerPermission::MANAGE_MANAGER_USERS->value);
    // }

    // public static function canEdit(Model $record): bool
    // {
    //     return auth('manager')->user()->can(ManagerPermission::MANAGE_MANAGER_USERS->value);
    // }

    // public static function canDelete(Model $record): bool
    // {
    //     return auth('manager')->user()->can(ManagerPermission::DELETE_MANAGER_USERS->value);
    // }

    // public static function canView(Model $record): bool
    // {
    //     return auth('manager')->user()->can(ManagerPermission::VIEW_MANAGER_USERS->value);
    // }

    public static function getEloquentQuery(): Builder
    {
        return parent::getEloquentQuery()->forManager();
    }
}
