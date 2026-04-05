<?php

namespace App\Filament\Resources\Listings\Schemas;

use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class ListingForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('title')
                    ->default(null),
                TextInput::make('domain')
                    ->default(null),
                TextInput::make('founding_year')
                    ->default(null),
                TextInput::make('programming_language')
                    ->default(null),
                TextInput::make('cms')
                    ->default(null),
                TextInput::make('hosting')
                    ->default(null),
                TextInput::make('monthly_traffic')
                    ->numeric()
                    ->default(null),
                TextInput::make('traffic_source')
                    ->default(null),
                TextInput::make('is_verified')
                    ->numeric()
                    ->default(0),
                TextInput::make('operating_cost')
                    ->numeric()
                    ->default(null)
                    ->prefix('$'),
                TextInput::make('monthly_profit')
                    ->numeric()
                    ->default(null),
                Select::make('status')
                    ->options(['pending' => 'Pending', 'active' => 'Active', 'hidden' => 'Hidden', 'rejected' => 'Rejected'])
                    ->default('pending'),
                TextInput::make('sales_count')
                    ->numeric()
                    ->default(0),
                TextInput::make('monthly_revenue')
                    ->numeric()
                    ->default(null),
                TextInput::make('slug')
                    ->default(null),
                TextInput::make('img_desktop')
                    ->default(null),
                TextInput::make('img_mobile')
                    ->default(null),
                TextInput::make('categories_id')
                    ->required(),
                TextInput::make('users_id')
                    ->required(),
            ]);
    }
}
