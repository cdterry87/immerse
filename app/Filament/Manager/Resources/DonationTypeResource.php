<?php

namespace App\Filament\Manager\Resources;

use Filament\Forms;
use Filament\Tables;
use Filament\Forms\Form;
use Filament\Tables\Table;
use App\Models\DonationType;
use Filament\Resources\Resource;
use Illuminate\Database\Eloquent\Builder;
use Filament\Tables\Columns\SpatieMediaLibraryImageColumn;
use Filament\Forms\Components\SpatieMediaLibraryFileUpload;
use App\Filament\Manager\Resources\DonationTypeResource\Pages;

class DonationTypeResource extends Resource
{
    protected static ?string $model = DonationType::class;
    protected static ?string $navigationIcon = 'heroicon-o-currency-dollar';
    protected static ?string $navigationGroup = 'Donations';
    protected static ?string $navigationLabel = 'Donation Types';
    protected static ?string $modelLabel = 'Donation Type';

    public static function form(Form $form): Form
    {
        return $form->schema([
            Forms\Components\Section::make('Donation Type Details')
                ->schema([
                    Forms\Components\TextInput::make('name')
                        ->label('Donation Type')
                        ->required()
                        ->maxLength(255),

                    Forms\Components\Textarea::make('description')
                        ->label('Description')
                        ->rows(3)
                        ->nullable(),
                ]),
            Forms\Components\Section::make('Media')
                ->schema([
                    SpatieMediaLibraryFileUpload::make('image')
                        ->collection('donation_types')
                        ->label('Donation Type Image')
                        ->image()
                        ->maxSize(2048)
                        ->openable()
                        ->downloadable()
                        ->columnSpanFull(),
                ]),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                SpatieMediaLibraryImageColumn::make('image')
                    ->collection('donation_types')
                    ->label('Image'),
                Tables\Columns\TextColumn::make('name')->searchable()->sortable(),
                Tables\Columns\TextColumn::make('description')->limit(50),
                Tables\Columns\TextColumn::make('created_at')->dateTime(),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index'  => Pages\ListDonationTypes::route('/'),
            'create' => Pages\CreateDonationType::route('/create'),
            'edit'   => Pages\EditDonationType::route('/{record}/edit'),
        ];
    }

    public static function getEloquentQuery(): Builder
    {
        return parent::getEloquentQuery()->forManager();
    }
}
