<?php

namespace App\Livewire\Clients;

use Livewire\WithFileUploads;
use Livewire\Component;

use App\Models\Listing;
use App\Models\Category;

use Illuminate\Support\Str;

class CreateListing extends Component
{
    use WithFileUploads;

    // Khai báo các biến tương ứng với Form
    public $title, $domain, $founding_year, $programming_language, $cms, $hosting, $monthly_traffic, $traffic_source;
    public $users_id, $categories_id, $monthly_revenue = 0, $operating_cost = 0, $monthly_profit = 0;
    public $image;

    protected $rules = [
        'title' => 'required|min:5',
        'domain' => 'required|url',
        'categories_id' => 'required',
        'image' => 'nullable|image|max:2048',
        'monthly_revenue' => 'nullable|numeric',
        'operating_cost' => 'nullable|numeric',
        'monthly_profit' => 'nullable|numeric',
    ];

    public function save()
    {
        $this->validate();

        // Xử lý lưu ảnh
        $imagePath = $this->image ? $this->image->store('listings', 'public') : null;
        $listingId = 'LST-' . Str::random(10);
        $slug = Str::slug($this->title) . '-' . Str::random(5);
        $listing = Listing::create([
            'id' => $listingId,
            'title' => $this->title,
            'domain' => $this->domain,
            'founding_year' => $this->founding_year,
            'programming_language' => $this->programming_language,
            'cms' => $this->cms,
            'hosting' => $this->hosting,
            'monthly_traffic' => $this->monthly_traffic,
            'traffic_source' => $this->traffic_source,
            'is_verified' => false,
            'categories_id' => $this->categories_id,
            'monthly_revenue' => $this->monthly_revenue,
            'operating_cost' => $this->operating_cost,
            'monthly_profit' => $this->monthly_profit,
            'image' => $imagePath,
            'slug' => $slug,
            'users_id' => auth()->id() ?? 'USER01', // Gán ID người đang đăng nhập
            'status' => 'pending',     // Mặc định là chờ duyệt
        ]);

        return redirect()->route('livewire.clients.verify-listing', $listing->id)->with('success', 'Đăng tin thành công! Vui lòng làm theo các bước sau để xác minh sở hữu nha.');

    }

    public function render()
    {
        return view('livewire.clients.create-listing', [
            'categories' => Category::all()
        ])->layout('layouts.app');
    }
}