<?php

namespace App\Http\Controllers;

use App\Models\Listing;
use App\Models\Category;

use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ListingController extends Controller
{
    // Display a listing of the resource.
    public function create()
    {
        $categories = Category::all();
        return view('listings.create', compact('categories'));
    }
    // Store a newly created resource in storage.
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|max:255',
            'domain' => 'required',
            // 'categories_id' => 'required',
        ]);

        $listingId = 'LST-' . Str::random(10);
        $listing = Listing::create(
            [
                'id' => $listingId,
                'title' => $request->title,
                'domain' => $request->domain,
                'founding_year' => $request->founding_year,
                'programming_language' => $request->programming_language,
                'cms' => $request->cms,
                'hosting' => $request->hosting,
                'monthly_traffic' => $request->monthly_traffic,
                'traffic_source' => $request->traffic_source,
                'is_verified' => false,
                'operating_cost' => $request->operating_cost,
                'monthly_profit' => $request->monthly_profit,
                'status' => 'pending',
                'monthly_revenue' => $request->monthly_revenue,
                'slug' => Str::slug($request->title) . '-' . Str::random(5),
                'categories_id' => $request->categories_id,
                'users_id' => auth()->id() ?? 'USER01',
            ]
        );
        return redirect()->route('listings.show_verify', $listing->id)->with('success', 'Đăng tin thành công! Vui lòng làm theo các bước sau để xác minh sở hữu nha.');
    }
}
