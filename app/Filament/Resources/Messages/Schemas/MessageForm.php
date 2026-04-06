<?php

namespace App\Filament\Resources\Messages\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Schemas\Schema;

class MessageForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('sender_id')
                    ->required(),
                TextInput::make('receiver_id')
                    ->required(),
                TextInput::make('is_read')
                    ->numeric()
                    ->default(0),
                Textarea::make('content')
                    ->default(null)
                    ->columnSpanFull(),
                TextInput::make('listing_id')
                    ->required(),
            ]);
    }
}
