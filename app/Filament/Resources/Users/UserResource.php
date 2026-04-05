<?php

namespace App\Filament\Resources\Users;

use App\Filament\Resources\Users\Pages\CreateUser;
use App\Filament\Resources\Users\Pages\EditUser;
use App\Filament\Resources\Users\Pages\ListUsers;
use App\Filament\Resources\Users\Pages\ViewUser;
use App\Filament\Resources\Users\Schemas\UserForm;
use App\Filament\Resources\Users\Schemas\UserInfolist;
use App\Filament\Resources\Users\Tables\UsersTable;
use App\Models\User;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Select;
use Illuminate\Contracts\Support\Htmlable;
use Illuminate\Support\Facades\Storage;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\ImageColumn;
use Filament\Actions\ViewAction;
use Filament\Actions\EditAction;
use Filament\Actions\Action;
use Filament\Actions\ActionGroup;


class UserResource extends Resource
{
    protected static ?string $model = User::class;

    protected static ?string $navigationLabel = 'Người dùng & KYC';

    // 2. Icon: Riêng cái này thì v4 lại cho phép BackedEnum (để dùng Enum icon)
    protected static string | \BackedEnum | null $navigationIcon = 'heroicon-o-users';

    protected static ?string $recordTitleAttribute = 'name';

    public static function form(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('name')
                    ->label('Họ tên')
                    ->required(),

                TextInput::make('email')
                    ->email()
                    ->required(),

                TextInput::make('phone')
                    ->label('Số điện thoại'),

                Select::make('role')
                    ->label('Vai trò')
                    ->options([
                        'admin' => 'Quản trị viên',
                        'user'  => 'Người dùng',
                    ])
                    ->required(),
            ]);
    }

    public static function infolist(Schema $schema): Schema
    {
        return UserInfolist::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('name')
                    ->label('Họ tên')
                    ->searchable()
                    ->sortable(),

                TextColumn::make('email')
                    ->label('Email')
                    ->copyable(),

                // 📸 Soi ảnh CCCD trực tiếp trên bảng
                ImageColumn::make('id_image')
                    ->label('Ảnh định danh')
                    ->disk('public')
                    ->size(80)
                    ->rounded()
                    ->placeholder('Chưa có ảnh'),

                // 🏷 Trạng thái KYC - Màu Amber cho đúng chất con ong nhen sếp
                TextColumn::make('kyc_status')
                    ->label('Trạng thái KYC')
                    ->badge()
                    ->color(fn (string|null $state): string => match ($state) {
                        'pending'  => 'warning',
                        'verified' => 'success',
                        default    => 'gray',
                    })
                    ->formatStateUsing(fn (string|null $state): string => match ($state) {
                        'pending'  => 'Đợi duyệt ⏳',
                        'verified' => 'Đã xác minh ✅',
                        default    => 'Chưa gửi ⚪',
                    }),
            ])
            ->actions([
                ViewAction::make(), // Nút hình con mắt để soi hồ sơ chi tiết
                EditAction::make(),

                // 🐝 NHÓM HÀNH ĐỘNG DUYỆT HỒ SƠ
                ActionGroup::make([
                    Action::make('approve_kyc')
                        ->label('Duyệt KYC')
                        ->icon('heroicon-m-check-badge')
                        ->color('success')
                        ->requiresConfirmation()
                        ->modalHeading('Xác minh người dùng?')
                        ->hidden(fn ($record) => $record->kyc_status !== 'pending')
                        ->action(fn ($record) => $record->update(['kyc_status' => 'verified'])),

                    Action::make('reject_kyc')
                        ->label('Từ chối')
                        ->icon('heroicon-m-x-circle')
                        ->color('danger')
                        ->requiresConfirmation()
                        ->modalHeading('Từ chối hồ sơ này?')
                        ->hidden(fn ($record) => $record->kyc_status !== 'pending')
                        ->action(function ($record) {
                            // Xóa ảnh cũ cho sạch server nhen má
                            if ($record->id_image) {
                                Storage::disk('public')->delete($record->id_image);
                            }
                            $record->update([
                                'kyc_status' => null,
                                'id_image'   => null,
                            ]);
                        }),
                ])
                ->label('Xử lý KYC')
                ->icon('heroicon-m-cog-6-tooth'),
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
            'index' => ListUsers::route('/'),
            'create' => CreateUser::route('/create'),
            'view' => ViewUser::route('/{record}'),
            'edit' => EditUser::route('/{record}/edit'),
        ];
    }
}
