<?php

namespace App\Filament\Manager\Resources;

use Filament\Forms;
use Filament\Tables;
use App\Models\Group;
use Filament\Forms\Form;
use Filament\Tables\Table;
use Filament\Resources\Resource;
use App\Traits\BelongsToOrganization;
use App\Filament\Manager\Resources\GroupResource\Pages;
use Filament\Tables\Columns\SpatieMediaLibraryImageColumn;
use Filament\Forms\Components\SpatieMediaLibraryFileUpload;

class GroupResource extends Resource
{
    protected static ?string $model = Group::class;
    protected static ?string $navigationIcon = 'heroicon-o-rectangle-group';
    protected static ?string $navigationGroup = 'Organization Management';
    protected static ?string $slug = 'groups';
    protected static ?string $label = 'Group';
    protected static ?string $pluralLabel = 'Groups';

    use BelongsToOrganization;

    public static function form(Form $form): Form
    {
        return $form->schema([
            Forms\Components\Section::make('Group Information')
                ->schema([
                    Forms\Components\TextInput::make('name')
                        ->label('Group Name')
                        ->required()
                        ->maxLength(255),

                    Forms\Components\RichEditor::make('description')
                        ->label('Description')
                        ->nullable(),
                ]),
            Forms\Components\Section::make('Media')
                ->schema([
                    SpatieMediaLibraryFileUpload::make('image')
                        ->collection('groups')
                        ->label('Image')
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
                SpatieMediaLibraryImageColumn::make('image')
                    ->collection('groups')
                    ->label('Image'),
                Tables\Columns\TextColumn::make('name')->searchable()->sortable(),
                Tables\Columns\TextColumn::make('description')
                    ->limit(50)
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime('M d, Y')
                    ->sortable(),
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
            'index' => Pages\ListGroups::route('/'),
            'create' => Pages\CreateGroup::route('/create'),
            'edit' => Pages\EditGroup::route('/{record}/edit'),
        ];
    }
}
