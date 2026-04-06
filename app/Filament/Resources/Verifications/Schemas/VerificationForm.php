<?php

namespace App\Filament\Resources\Verifications\Schemas;

use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class VerificationForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Select::make('status')
                    ->options(['pending' => 'Pending', 'success' => 'Success', 'failed' => 'Failed'])
                    ->default('pending'),
                TextInput::make('listing_id')
                    ->required(),
            ]);
    }
}
