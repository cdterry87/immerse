<?php

namespace App\Filament\Manager\Resources;

use App\Models\MediaGallery;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Forms\Components\SpatieMediaLibraryFileUpload;
use Filament\Tables\Columns\SpatieMediaLibraryImageColumn;
use Illuminate\Database\Eloquent\Builder;
use App\Filament\Manager\Resources\MediaGalleryResource\Pages;

class MediaGalleryResource extends Resource
{
    protected static ?string $model = MediaGallery::class;

    protected static ?string $navigationIcon = 'heroicon-o-photo';
    protected static ?string $navigationGroup = 'Media Management';
    protected static ?string $navigationLabel = 'Media Galleries';
    protected static ?string $pluralLabel = 'Media Galleries';

    public static function form(Form $form): Form
    {
        return $form->schema([
            Forms\Components\Section::make('Gallery Info')
                ->schema([
                    Forms\Components\TextInput::make('title')
                        ->required()
                        ->maxLength(255),

                    Forms\Components\Textarea::make('description')
                        ->nullable()
                        ->rows(3),
                ]),

            Forms\Components\Section::make('Media')
                ->schema([
                    SpatieMediaLibraryFileUpload::make('cover_photo')
                        ->collection('gallery_covers')
                        ->label('Cover Photo')
                        ->image()
                        ->required()
                        ->maxSize(5120),

                    SpatieMediaLibraryFileUpload::make('gallery_images')
                        ->collection('gallery_images')
                        ->label('Gallery Images')
                        ->multiple()
                        ->image()
                        ->reorderable()
                        ->panelLayout('grid')
                        ->maxSize(5120),

                    SpatieMediaLibraryFileUpload::make('videos')
                        ->collection('gallery_videos')
                        ->label('Videos')
                        ->multiple()
                        ->acceptedFileTypes(['video/mp4', 'video/mov', 'video/avi'])
                        ->maxSize(102400),
                ]),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\SpatieMediaLibraryImageColumn::make('cover_photo')
                    ->label('Cover')
                    ->collection('gallery_covers')
                    ->conversion('thumb'),

                Tables\Columns\TextColumn::make('title')->sortable()->searchable(),

                Tables\Columns\TextColumn::make('created_at')
                    ->date('M d, Y')
                    ->sortable(),
            ])
            ->actions([
                Tables\Actions\ViewAction::make(),
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ]);
    }

    public static function getRelations(): array
    {
        return [];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListMediaGalleries::route('/'),
            'create' => Pages\CreateMediaGallery::route('/create'),
            'edit' => Pages\EditMediaGallery::route('/{record}/edit'),
        ];
    }

    public static function getEloquentQuery(): Builder
    {
        return parent::getEloquentQuery()->where('organization_id', auth('manager')->user()->organization_id);
    }
}
