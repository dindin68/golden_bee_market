<?php

namespace App\Filament\Resources\Messages\Schemas;

use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Schema;

class MessageInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextEntry::make('id')
                    ->label('ID'),
                TextEntry::make('sender_id'),
                TextEntry::make('receiver_id'),
                TextEntry::make('is_read')
                    ->numeric()
                    ->placeholder('-'),
                TextEntry::make('content')
                    ->placeholder('-')
                    ->columnSpanFull(),
                TextEntry::make('listing_id'),
                TextEntry::make('created_at')
                    ->placeholder('-'),
            ]);
    }
}
