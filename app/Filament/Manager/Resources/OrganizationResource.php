<?php

namespace App\Filament\Manager\Resources;

use Filament\Forms;
use Filament\Forms\Form;
use App\Models\Organization;
use Filament\Resources\Resource;
use Filament\Forms\Components\SpatieMediaLibraryFileUpload;
use App\Filament\Manager\Resources\OrganizationResource\Pages\ManageOrganization;

class OrganizationResource extends Resource
{
    protected static ?string $model = Organization::class;
    protected static ?string $navigationIcon = 'heroicon-o-building-library';
    protected static ?string $navigationGroup = 'Organization Management';
    protected static ?string $slug = 'organization';
    protected static ?string $label = 'Organization';
    protected static ?string $pluralLabel = 'Organization';

    public static function form(Form $form): Form
    {
        return $form->schema([
            Forms\Components\Section::make('General Information')
                ->schema([
                    Forms\Components\TextInput::make('name')
                        ->label('Organization Name')
                        ->required()
                        ->columnSpanFull(),

                    Forms\Components\RichEditor::make('description')
                        ->label('Description')
                        ->columnSpanFull(),
                ])->columns(2),
            Forms\Components\Section::make('Images')
                ->schema([
                    SpatieMediaLibraryFileUpload::make('logo')
                        ->collection('logos')
                        ->disk('public')
                        ->image()
                        ->maxSize(1024)
                        ->label('Organization Logo')
                        ->columnSpanFull(),
                    SpatieMediaLibraryFileUpload::make('image')
                        ->collection('images')
                        ->disk('public')
                        ->image()
                        ->maxSize(2048)
                        ->label('Organization Image')
                        ->columnSpanFull(),
                ])->columns(2),


        ]);
    }

    public static function canCreate(): bool
    {
        return false;
    }

    public static function canDelete($record): bool
    {
        return false;
    }

    public static function getPages(): array
    {
        return [
            'index' => ManageOrganization::route('/'),
        ];
    }
}
