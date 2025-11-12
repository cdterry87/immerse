<?php

namespace App\Filament\Manager\Resources;

use Filament\Forms;
use Filament\Tables;
use App\Models\Event;
use App\Models\Location;
use Filament\Forms\Form;
use Filament\Tables\Table;
use Filament\Resources\Resource;
use Illuminate\Database\Eloquent\Builder;
use App\Filament\Manager\Resources\EventResource\Pages;
use Filament\Tables\Columns\SpatieMediaLibraryImageColumn;
use Filament\Forms\Components\SpatieMediaLibraryFileUpload;

class EventResource extends Resource
{
    protected static ?string $model = Event::class;

    protected static ?string $navigationIcon = 'heroicon-o-calendar';
    protected static ?string $navigationGroup = 'Organization Management';
    protected static ?string $navigationLabel = 'Events';

    public static function form(Form $form): Form
    {
        return $form->schema([
            Forms\Components\Section::make('Event Details')
                ->schema([
                    Forms\Components\TextInput::make('name')
                        ->label('Event Name')
                        ->required()
                        ->maxLength(255)
                        ->columnSpanFull(),

                    Forms\Components\RichEditor::make('description')
                        ->label('Description')
                        ->columnSpanFull(),

                    Forms\Components\Select::make('location_id')
                        ->label('Location')
                        ->relationship(
                            'location',
                            'name',
                            fn($query) =>
                            $query->forManager()
                        )
                        ->required()
                        ->columnSpanFull(),

                    Forms\Components\DateTimePicker::make('starts_at')
                        ->label('Start Date & Time')
                        ->required(),

                    Forms\Components\DateTimePicker::make('ends_at')
                        ->label('End Date & Time')
                        ->required(),
                ])
                ->columns(2),

            Forms\Components\Section::make('Media')
                ->schema([
                    SpatieMediaLibraryFileUpload::make('image')
                        ->collection('events')
                        ->label('Event Image')
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
                    ->collection('events')
                    ->label('Image'),

                Tables\Columns\TextColumn::make('name')->searchable()->sortable(),

                Tables\Columns\TextColumn::make('location.name')
                    ->label('Location'),

                Tables\Columns\TextColumn::make('starts_at')->dateTime()->sortable(),

                Tables\Columns\TextColumn::make('ends_at')->dateTime()->sortable(),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListEvents::route('/'),
            'create' => Pages\CreateEvent::route('/create'),
            'edit' => Pages\EditEvent::route('/{record}/edit'),
        ];
    }

    public static function getEloquentQuery(): Builder
    {
        return parent::getEloquentQuery()->forManager();
    }
}
