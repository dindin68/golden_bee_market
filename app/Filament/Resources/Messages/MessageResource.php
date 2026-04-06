<?php

namespace App\Filament\Resources\Messages;

use App\Filament\Resources\Messages\Pages\CreateMessage;
use App\Filament\Resources\Messages\Pages\EditMessage;
use App\Filament\Resources\Messages\Pages\ListMessages;
use App\Filament\Resources\Messages\Pages\ViewMessage;
use App\Filament\Resources\Messages\Schemas\MessageForm;
use App\Filament\Resources\Messages\Schemas\MessageInfolist;
use App\Filament\Resources\Messages\Tables\MessagesTable;
use App\Models\Message;
use BackedEnum;
use Filament\Resources\Resource;

use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
use Filament\Tables\Columns\TextColumn;
use Filament\Schemas\Schema;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Components\Grid;
use Filament\Infolists\Components\TextEntry;

class MessageResource extends Resource
{
    protected static ?string $model = Message::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    protected static ?string $recordTitleAttribute = 'id';

    public static function form(Schema $schema): Schema
    {
        return MessageForm::configure($schema);
    }

    public static function infolist(Schema $schema): Schema
    {
        return $schema->components([
            Section::make('Chi tiết cuộc hội thoại')
                ->schema([
                    Grid::make(2)
                        ->schema([
                            TextEntry::make('sender.name')->label('Từ:'),
                            TextEntry::make('receiver.name')->label('Đến:'),
                        ]),
                    TextEntry::make('listing.title')->label('Về sạp hàng:'),
                    TextEntry::make('message')
                        ->label('Nội dung tin nhắn')
                        ->prose() // Cho phép xuống dòng tự nhiên
                        ->columnSpanFull(),
                ]),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('sender.name')
                    ->label('Người gửi')
                    ->badge()
                    ->color('info'),

                TextColumn::make('receiver.name')
                    ->label('Người nhận')
                    ->badge()
                    ->color('amber'),

                TextColumn::make('listing.title')
                    ->label('Sản phẩm quan tâm')
                    ->limit(20),

                TextColumn::make('content')
                    ->label('Nội dung')
                    ->limit(50)
                    ->searchable(),

                TextColumn::make('created_at')
                    ->label('Thời gian')
                    ->dateTime()
                    ->sortable(),
            ])
            ->filters([

            ]);
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
            'index' => ListMessages::route('/'),
            'create' => CreateMessage::route('/create'),
            'view' => ViewMessage::route('/{record}'),
            'edit' => EditMessage::route('/{record}/edit'),
        ];
    }
}
