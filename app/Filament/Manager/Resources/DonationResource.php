<?php

namespace App\Filament\Manager\Resources;

use Carbon\Carbon;
use Filament\Tables;
use App\Models\Donation;
use Filament\Tables\Table;
use Filament\Resources\Resource;
use Filament\Tables\Filters\SelectFilter;
use Illuminate\Database\Eloquent\Builder;
use App\Filament\Manager\Resources\DonationResource\Pages\ViewDonation;
use App\Filament\Manager\Resources\DonationResource\Pages\ListDonations;

class DonationResource extends Resource
{
    protected static ?string $model = Donation::class;
    protected static ?string $navigationIcon = 'heroicon-o-banknotes';
    protected static ?string $navigationGroup = 'Donations';
    protected static ?string $navigationLabel = 'Donations';
    protected static ?string $modelLabel = 'Donation';

    public static function table(Table $table): Table
    {
        return $table
            ->columns([

                Tables\Columns\TextColumn::make('userMember.name')
                    ->label('Donor')
                    ->sortable()
                    ->searchable(),

                Tables\Columns\TextColumn::make('donationType.name')
                    ->label('Type')
                    ->sortable()
                    ->searchable(),

                Tables\Columns\TextColumn::make('amount')
                    ->label('Amount')
                    ->money('USD')
                    ->sortable(),

                Tables\Columns\TextColumn::make('created_at')
                    ->label('Date')
                    ->date()
                    ->sortable(),
            ])

            ->filters([
                SelectFilter::make('date_range')
                    ->label('Date Range')
                    ->options([
                        '1'  => 'Last Month',
                        '6'  => 'Last 6 Months',
                        '12' => 'Last 12 Months',
                        '36' => 'Last 36 Months',
                        '60' => 'Last 60 Months',
                    ])
                    ->default('12')
                    ->query(function (Builder $query, $data) {
                        $months = (int) $data['value'];
                        if ($months === 0) {
                            return;
                        }
                        $fromDate = now()->subMonths($months);
                        $query->where('created_at', '>=', $fromDate);
                    }),
            ])

            ->actions([
                Tables\Actions\ViewAction::make(),
            ])

            ->bulkActions([]);
    }

    public static function getPages(): array
    {
        return [
            'index' => ListDonations::route('/'),
            'view'  => ViewDonation::route('/{record}'),
        ];
    }

    public static function getEloquentQuery(): \Illuminate\Database\Eloquent\Builder
    {
        $query = parent::getEloquentQuery();

        $user = auth('manager')->user();

        if ($user && $user->organization_id) {
            $query->where('organization_id', $user->organization_id);
        }

        return $query;
    }
}
