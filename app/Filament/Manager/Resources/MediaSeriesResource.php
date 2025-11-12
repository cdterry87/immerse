<?php

namespace App\Filament\Manager\Resources;

use App\Models\MediaSeries;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Forms\Components\SpatieMediaLibraryFileUpload;
use Filament\Tables\Columns\SpatieMediaLibraryImageColumn;
use Illuminate\Database\Eloquent\Builder;
use App\Filament\Manager\Resources\MediaSeriesResource\Pages;

class MediaSeriesResource extends Resource
{
    protected static ?string $model = MediaSeries::class;
    protected static ?string $navigationIcon = 'heroicon-o-film';
    protected static ?string $navigationGroup = 'Media Management';
    protected static ?string $navigationLabel = 'Media Series';
    protected static ?string $pluralLabel = 'Media Series';

    public static function form(Form $form): Form
    {
        return $form->schema([
            Forms\Components\Section::make('Series Details')
                ->schema([
                    Forms\Components\TextInput::make('title')
                        ->label('Series Title')
                        ->required()
                        ->maxLength(255)
                        ->columnSpanFull(),

                    Forms\Components\Textarea::make('description')
                        ->label('Description')
                        ->rows(4)
                        ->columnSpanFull(),
                ]),
            Forms\Components\Section::make('Series Cover')
                ->schema([
                    SpatieMediaLibraryFileUpload::make('series_cover')
                        ->collection('series')
                        ->label('Cover Image')
                        ->image()
                        ->imagePreviewHeight('200')
                        ->openable()
                        ->downloadable()
                        ->maxSize(2048)
                        ->columnSpanFull(),
                ]),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                SpatieMediaLibraryImageColumn::make('series')->collection('series')->label('Cover'),
                Tables\Columns\TextColumn::make('title')->searchable()->sortable(),
                Tables\Columns\TextColumn::make('description')->limit(50),
                Tables\Columns\TextColumn::make('created_at')->dateTime(),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            // We'll add MediaItemRelationManager later
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListMediaSeries::route('/'),
            'create' => Pages\CreateMediaSeries::route('/create'),
            'edit' => Pages\EditMediaSeries::route('/{record}/edit'),
        ];
    }

    public static function getEloquentQuery(): Builder
    {
        return parent::getEloquentQuery()->forManager();
    }
}
