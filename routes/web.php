<?php

use Illuminate\Support\Facades\Route;

use App\Livewire\Clients\Home;
use App\Livewire\Clients\CreateListing;
use App\Livewire\Clients\ProductDetail;
use App\Livewire\Clients\VerifyListing;
use App\Livewire\Admin\ListingTable;
use App\Livewire\Clients\Profile;
use App\Livewire\Clients\MyListings;

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

    // Quản lý Listing dành cho Client
    Route::get('/listings/create', CreateListing::class)->name('livewire.clients.create-listing');
    Route::get('/listings/{id}/verify', VerifyListing::class)->name('livewire.clients.verify-listing');

    Route::get('/profile', Profile::class)->name('profile');
    Route::get('/my-listings', MyListings::class)->name('my-listings');

    // Admin Routes (Dành riêng cho admin, nhớ middleware 'admin' để bảo vệ route này)
    Route::middleware(['admin'])->prefix('admin')->name('admin.')->group(function () {
        // Route::get('/dashboard', AdminDashboard::class)->name('dashboard');
    });

});

// Giữ lại file auth.php của Breeze để chạy Login/Register
require __DIR__ . '/auth.php';