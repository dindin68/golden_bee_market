<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\ListingController;
use App\Http\Controllers\VerificationController;

use App\Livewire\Home;
use App\Livewire\ProductDetail;

Route::get('/', Home::class)->name('home');

Route::get('/listings/create', [ListingController::class, 'create'])->name('listings.create');
Route::post('/listings/store', [ListingController::class, 'store'])->name('listings.store');

Route::get('/listings/{id}/verify', [VerificationController::class, 'show'])->name('listings.show_verify');
Route::post('/listings/{id}/verify/check', [VerificationController::class, 'checkVerification'])->name('listings.check_now');
// Cac route cho admin
Route::get('/admin/listings', [App\Http\Controllers\Admin\ListingController::class, 'index']);

// Cac route chi tiet san pham
Route::get('/detail/{id}', ProductDetail::class)->name('product.detail');