<?php

use Illuminate\Support\Facades\Route;

use App\Livewire\Clients\Home;
use App\Livewire\Clients\CreateListing;
use App\Livewire\Clients\ProductDetail;
use App\Livewire\Clients\VerifyListing;
use App\Livewire\Clients\Profile;
use App\Livewire\Clients\MyListings;
use App\Livewire\Clients\EditListing;



Route::get('/', Home::class)->name('home');
Route::get('/detail/{id}', ProductDetail::class)->name('product.detail');


Route::middleware(['auth', 'verified'])->group(function () {

    // Quản lý dành cho Client
    Route::get('/listings/create', CreateListing::class)->name('livewire.clients.create-listing');
    Route::get('/listings/{id}/verify', VerifyListing::class)->name('livewire.clients.verify-listing');

    Route::get('/profile', Profile::class)->name('profile');
    Route::get('/my-listings', MyListings::class)->name('my-listings');
    Route::get('/listings/{listing}/edit', EditListing::class)
        ->name('listings.edit')
        ->middleware(['auth', 'verified']);

    Route::middleware(['admin'])->prefix('admin')->name('admin.')->group(function () {
    });

});

// Giữ lại file auth.php của Breeze để chạy Login/Register
require __DIR__ . '/auth.php';