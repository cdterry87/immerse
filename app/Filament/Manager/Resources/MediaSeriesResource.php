<?php

namespace App\Filament\Manager\Resources;

use App\Filament\Manager\Resources\MediaSeriesResource\Pages;
use App\Filament\Manager\Resources\MediaSeriesResource\RelationManagers;
use App\Models\MediaSeries;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class MediaSeriesResource extends Resource
{
    protected static ?string $model = MediaSeries::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                //
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                //
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
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
            'index' => Pages\ListMediaSeries::route('/'),
            'create' => Pages\CreateMediaSeries::route('/create'),
            'edit' => Pages\EditMediaSeries::route('/{record}/edit'),
        ];
    }
}
