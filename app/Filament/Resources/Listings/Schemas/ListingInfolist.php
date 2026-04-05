<?php

namespace App\Filament\Resources\Listings\Schemas;

use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Schema;

class ListingInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextEntry::make('id')
                    ->label('ID'),
                TextEntry::make('title')
                    ->placeholder('-'),
                TextEntry::make('domain')
                    ->placeholder('-'),
                TextEntry::make('founding_year')
                    ->placeholder('-'),
                TextEntry::make('programming_language')
                    ->placeholder('-'),
                TextEntry::make('cms')
                    ->placeholder('-'),
                TextEntry::make('hosting')
                    ->placeholder('-'),
                TextEntry::make('monthly_traffic')
                    ->numeric()
                    ->placeholder('-'),
                TextEntry::make('traffic_source')
                    ->placeholder('-'),
                TextEntry::make('is_verified')
                    ->numeric()
                    ->placeholder('-'),
                TextEntry::make('operating_cost')
                    ->money()
                    ->placeholder('-'),
                TextEntry::make('monthly_profit')
                    ->numeric()
                    ->placeholder('-'),
                TextEntry::make('status')
                    ->badge()
                    ->placeholder('-'),
                TextEntry::make('sales_count')
                    ->numeric()
                    ->placeholder('-'),
                TextEntry::make('monthly_revenue')
                    ->numeric()
                    ->placeholder('-'),
                TextEntry::make('slug')
                    ->placeholder('-'),
                TextEntry::make('img_desktop')
                    ->placeholder('-'),
                TextEntry::make('img_mobile')
                    ->placeholder('-'),
                TextEntry::make('created_at')
                    ->dateTime()
                    ->placeholder('-'),
                TextEntry::make('categories_id'),
                TextEntry::make('users_id'),
            ]);
    }
}
