<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ListingController;
use App\Http\Controllers\VerificationController;

// Gọi các Livewire Component (Nhớ check kỹ đường dẫn namespace này nhen)
use App\Livewire\Clients\Home;
use App\Livewire\Clients\CreateListing;
use App\Livewire\Clients\ProductDetail;
use App\Livewire\Clients\VerifyListing;
use App\Livewire\Admin\ListingTable;

/*
|--------------------------------------------------------------------------
| Public Routes (Dành cho khách vãng lai)
|--------------------------------------------------------------------------
*/

Route::get('/', Home::class)->name('home');
Route::get('/detail/{id}', ProductDetail::class)->name('product.detail');

/*
|--------------------------------------------------------------------------
| Authenticated Routes (Phải đăng nhập mới được vào)
|--------------------------------------------------------------------------
*/

Route::middleware(['auth', 'verified'])->group(function () {

    // Trang cá nhân (Breeze mặc định)
    Route::view('profile', 'profile')->name('profile');

    // Quản lý Listing dành cho Client
    Route::get('/listings/create', CreateListing::class)->name('clients.create-listing');
    Route::get('/listings/{id}/verify', VerifyListing::class)->name('clients.verify-listing');

    // Các Route xử lý Controller (nếu ông vẫn dùng Controller song song với Livewire)
    Route::post('/listings/store', [ListingController::class, 'store'])->name('listings.store');
    Route::post('/listings/{id}/verify/check', [VerificationController::class, 'checkVerification'])->name('listings.check_now');

    /*
    |--------------------------------------------------------------------------
    | Admin Routes (Chỉ dành cho Admin - Dùng cái Middleware mình vừa tạo)
    |--------------------------------------------------------------------------
    */
    Route::middleware(['admin'])->prefix('admin')->name('admin.')->group(function () {
        Route::get('/listings', ListingTable::class)->name('listings');
        // Ông có thể thêm dashboard admin ở đây
        // Route::get('/dashboard', AdminDashboard::class)->name('dashboard');
    });

});

// Giữ lại file auth.php của Breeze để chạy Login/Register
require __DIR__ . '/auth.php';