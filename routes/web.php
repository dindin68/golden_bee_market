<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\ListingController;

use App\Livewire\Clients\Home;
use App\Livewire\Clients\CreateListing;
use App\Livewire\Clients\ProductDetail;
use App\Livewire\Clients\VerifyListing;
use App\Livewire\Admin\ListingTable;


Route::get('/', Home::class)->name('home');

Route::get('/listings/create', CreateListing::class)->name('clients.create-listing');

Route::get('/listings/{id}/verify', VerifyListing::class)->name('livewire.clients.verify-listing');
// Cac route cho admin
Route::get('/admin/listings', ListingTable::class)->name('admin.listings');

// Cac route chi tiet san pham
Route::get('/detail/{id}', ProductDetail::class)->name('product.detail');