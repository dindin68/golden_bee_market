<?php

namespace App\Filament\Resources\Users\Schemas;

use Filament\Infolists\Components\ImageEntry;
use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Components\Grid;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class UserInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                // Chia vùng: Thông tin cơ bản
                Section::make('Thông tin cá nhân')
                    ->description('Thông tin định danh cơ bản của người dùng trên sàn.')
                    ->schema([
                        Grid::make(3) // Chia làm 3 cột 
                            ->schema([
                                TextEntry::make('id')
                                    ->label('Mã định danh (ID)')
                                    ->copyable(), // Cho phép copy ID nhanh 

                                TextEntry::make('name')
                                    ->label('Họ tên')
                                    ->weight('bold'),

                                TextEntry::make('role')
                                    ->label('Vai trò')
                                    ->badge()
                                    ->color(fn ($state) => $state === 'admin' ? 'danger' : 'success'),
                            ]),

                        Grid::make(2)
                            ->schema([
                                TextEntry::make('email')
                                    ->label('Địa chỉ Email')
                                    ->icon('heroicon-m-envelope'), 

                                TextEntry::make('phone')
                                    ->label('Số điện thoại')
                                    ->icon('heroicon-m-phone'),
                            ]),
                    ])->collapsible(), // Cho phép đóng/mở vùng này nhen

                //  Chia vùng: Hồ sơ KYC 
                Section::make('Hồ sơ xác minh (KYC)')
                    ->description('Hình ảnh và trạng thái phê duyệt định danh.')
                    ->schema([
                        Grid::make(2)
                            ->schema([
                                TextEntry::make('kyc_status')
                                    ->label('Trạng thái hiện tại')
                                    ->badge()
                                    ->color(fn (string|null $state): string => match ($state) {
                                        'pending'  => 'warning',
                                        'verified' => 'success',
                                        default    => 'gray',
                                    })
                                    ->formatStateUsing(fn (string|null $state): string => match ($state) {
                                        'pending'  => 'Đang chờ duyệt ⏳',
                                        'verified' => 'Đã xác minh ✅',
                                        default    => 'Chưa có hồ sơ ⚪',
                                    }),

                                TextEntry::make('rating')
                                    ->label('Đánh giá uy tín')
                                    ->numeric()
                                    ->suffix(' / 5 ⭐') // Thêm cái đuôi cho đúng chất đánh giá
                                    ->placeholder('Chưa có đánh giá'),
                            ]),

                        ImageEntry::make('id_image')
                            ->label('Ảnh CCCD / Passport')
                            ->disk('public')
                            ->size(400) // Cho ảnh to lên để bà soi cho kỹ trước khi duyệt nhen!
                            ->extraImgAttributes(['class' => 'rounded-lg shadow-md']), // Bo góc, đổ bóng cho chanh sả
                    ]),
            ]);
    }
}