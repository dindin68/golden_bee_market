<?php

namespace App\Filament\Resources\Verifications;

use App\Filament\Resources\Verifications\Pages\CreateVerification;
use App\Filament\Resources\Verifications\Pages\EditVerification;
use App\Filament\Resources\Verifications\Pages\ListVerifications;
use App\Filament\Resources\Verifications\Pages\ViewVerification;
use App\Filament\Resources\Verifications\Schemas\VerificationForm;
use App\Filament\Resources\Verifications\Schemas\VerificationInfolist;
use App\Filament\Resources\Verifications\Tables\VerificationsTable;
use App\Models\Verification;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class VerificationResource extends Resource
{
    protected static ?string $model = Verification::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    protected static ?string $recordTitleAttribute = 'id';

    public static function form(Schema $schema): Schema
    {
        return VerificationForm::configure($schema);
    }

    public static function infolist(Schema $schema): Schema
    {
        return VerificationInfolist::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return VerificationsTable::configure($table);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => ListVerifications::route('/'),
            'create' => CreateVerification::route('/create'),
            'view' => ViewVerification::route('/{record}'),
            'edit' => EditVerification::route('/{record}/edit'),
        ];
    }
}
