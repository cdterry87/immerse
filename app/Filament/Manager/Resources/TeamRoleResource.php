<?php

namespace App\Filament\Manager\Resources;

use Filament\Forms;
use Filament\Tables;
use App\Models\TeamRole;
use Filament\Forms\Form;
use Filament\Tables\Table;
use Filament\Resources\Resource;
use Filament\Forms\Components\Section;
use App\Filament\Manager\Resources\TeamRoleResource\Pages;

class TeamRoleResource extends Resource
{
    protected static ?string $model = TeamRole::class;
    protected static ?string $navigationIcon = 'heroicon-o-wrench-screwdriver';
    protected static ?string $navigationGroup = 'Teams';
    protected static ?string $navigationLabel = 'Team Roles';
    protected static ?string $modelLabel = 'Team Role';

    public static function form(Form $form): Form
    {
        return $form->schema([
            Section::make('Role Details')
                ->schema([
                    Forms\Components\Select::make('team_id')
                        ->label('Team')
                        ->required()
                        ->relationship('team', 'name')
                        ->searchable(),

                    Forms\Components\TextInput::make('name')
                        ->label('Role Name')
                        ->required()
                        ->maxLength(255),

                    Forms\Components\Textarea::make('description')
                        ->label('Description')
                        ->rows(3)
                        ->nullable(),
                ])
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')->searchable()->sortable(),
                Tables\Columns\TextColumn::make('team.name')->label('Team')->sortable(),
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
            'index'  => Pages\ListTeamRoles::route('/'),
            'create' => Pages\CreateTeamRole::route('/create'),
            'edit'   => Pages\EditTeamRole::route('/{record}/edit'),
        ];
    }

    public static function getEloquentQuery(): \Illuminate\Database\Eloquent\Builder
    {
        return parent::getEloquentQuery()->forManager();
    }
}
