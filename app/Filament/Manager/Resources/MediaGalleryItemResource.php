<?php

namespace App\Filament\Manager\Resources;

use App\Filament\Manager\Resources\MediaGalleryItemResource\Pages;
use App\Filament\Manager\Resources\MediaGalleryItemResource\RelationManagers;
use App\Models\MediaGalleryItem;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class MediaGalleryItemResource extends Resource
{
    protected static ?string $model = MediaGalleryItem::class;

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
            'index' => Pages\ListMediaGalleryItems::route('/'),
            'create' => Pages\CreateMediaGalleryItem::route('/create'),
            'edit' => Pages\EditMediaGalleryItem::route('/{record}/edit'),
        ];
    }
}
