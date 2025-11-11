<?php

namespace App\Filament\Manager\Resources;

use Filament\Forms;
use Filament\Tables;
use Filament\Forms\Form;
use Filament\Tables\Table;
use App\Models\Organization;
use Filament\Resources\Resource;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Forms\Components\SpatieMediaLibraryFileUpload;
use App\Filament\Manager\Resources\OrganizationResource\Pages;
use App\Filament\Manager\Resources\OrganizationResource\RelationManagers;

class OrganizationResource extends Resource
{
    protected static ?string $model = Organization::class;

    protected static ?string $navigationIcon = 'heroicon-o-building-office';

    /**
     * Managers may create an organization only if they don't already have one.
     */
    public static function canCreate(): bool
    {
        $user = auth('manager')->user();

        return $user && ! (bool) $user->organization_id;
    }

    /**
     * Managers cannot delete an organization.
     */
    public static function canDelete(Model $record): bool
    {
        return false;
    }

    /**
     * Managers can edit only their organization record.
     *
     * Use the Eloquent Model type in the signature to match Filament/Laravel expectations.
     */
    public static function canEdit(Model $record): bool
    {
        $user = auth('manager')->user();

        return $user && $user->organization_id === $record->id;
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('name')
                    ->required()
                    ->maxLength(255),
                Forms\Components\Textarea::make('description'),
                SpatieMediaLibraryFileUpload::make('logo')
                    ->collection('logos')
                    ->disk('public')
                    ->image()
                    ->maxSize(1024)
                    ->label('Organization Logo'),
                SpatieMediaLibraryFileUpload::make('image')
                    ->collection('images')
                    ->disk('public')
                    ->image()
                    ->maxSize(2048)
                    ->label('Organization Image'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')->searchable(),
                Tables\Columns\TextColumn::make('created_at')->dateTime(),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([]);
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
            'index' => Pages\ListOrganizations::route('/'),
            'create' => Pages\CreateOrganization::route('/create'),
            'edit' => Pages\EditOrganization::route('/{record}/edit'),
        ];
    }
}
