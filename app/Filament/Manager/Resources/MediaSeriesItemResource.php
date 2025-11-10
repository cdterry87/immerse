<?php

namespace App\Filament\Manager\Resources;

use App\Filament\Manager\Resources\MediaSeriesItemResource\Pages;
use App\Filament\Manager\Resources\MediaSeriesItemResource\RelationManagers;
use App\Models\MediaSeriesItem;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class MediaSeriesItemResource extends Resource
{
    protected static ?string $model = MediaSeriesItem::class;

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
            'index' => Pages\ListMediaSeriesItems::route('/'),
            'create' => Pages\CreateMediaSeriesItem::route('/create'),
            'edit' => Pages\EditMediaSeriesItem::route('/{record}/edit'),
        ];
    }
}
