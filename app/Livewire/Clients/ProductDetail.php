<?php

namespace App\Livewire\Clients;

use Livewire\Component;

use App\Models\Listing;

class ProductDetail extends Component
{
    public $listing;
    public function mount($id)
    {
        $this->listing = Listing::with('category')->findOrFail($id);
        // Lấy thông tin sản phẩm dựa trên $id nếu cần thiết
    }
    public function render()
    {
        $relatedListings = Listing::where('categories_id', $this->listing->categories_id)
            ->where('id', '!=', $this->listing->id)
            ->where('status', 'active')
            ->take(4)
            ->get();

        return view('livewire.clients.product-detail', [
            'relatedListings' => $relatedListings
        ]);
    }
}
