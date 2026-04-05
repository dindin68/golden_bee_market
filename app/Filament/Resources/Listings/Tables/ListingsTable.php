<?php

namespace App\Filament\Resources\Listings\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Actions\ViewAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class ListingsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('id')
                    ->label('ID')
                    ->searchable(),
                TextColumn::make('title')
                    ->searchable(),
                TextColumn::make('domain')
                    ->searchable(),
                TextColumn::make('founding_year'),
                TextColumn::make('programming_language')
                    ->searchable(),
                TextColumn::make('cms')
                    ->searchable(),
                TextColumn::make('hosting')
                    ->searchable(),
                TextColumn::make('monthly_traffic')
                    ->numeric()
                    ->sortable(),
                TextColumn::make('traffic_source')
                    ->searchable(),
                TextColumn::make('is_verified')
                    ->numeric()
                    ->sortable(),
                TextColumn::make('operating_cost')
                    ->money()
                    ->sortable(),
                TextColumn::make('monthly_profit')
                    ->numeric()
                    ->sortable(),
                TextColumn::make('status')
                    ->badge(),
                TextColumn::make('sales_count')
                    ->numeric()
                    ->sortable(),
                TextColumn::make('monthly_revenue')
                    ->numeric()
                    ->sortable(),
                TextColumn::make('slug')
                    ->searchable(),
                TextColumn::make('img_desktop')
                    ->searchable(),
                TextColumn::make('img_mobile')
                    ->searchable(),
                TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('categories_id')
                    ->searchable(),
                TextColumn::make('users_id')
                    ->searchable(),
            ])
            ->filters([
                //
            ])
            ->recordActions([
                ViewAction::make(),
                EditAction::make(),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }
}
