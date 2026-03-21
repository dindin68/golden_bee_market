<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;


class ListingController extends Controller
{
    public function index()
    {
        return view('admin.listings.index');
    }
}
