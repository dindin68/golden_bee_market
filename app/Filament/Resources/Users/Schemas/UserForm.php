<?php

namespace App\Filament\Resources\Users\Schemas;

use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class UserForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('name')
                    ->default(null),
                TextInput::make('phone')
                    ->tel()
                    ->default(null),
                TextInput::make('email')
                    ->label('Email address')
                    ->email()
                    ->default(null),
                TextInput::make('password')
                    ->password()
                    ->default(null),
                TextInput::make('kyc_status')
                    ->default(null),
                FileUpload::make('id_image')
                    ->image(),
                TextInput::make('role')
                    ->default(null),
                TextInput::make('rating')
                    ->numeric()
                    ->default(null),
            ]);
    }
}
