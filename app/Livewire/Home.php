<?php

namespace App\Livewire;

use Livewire\Component;

use App\Models\Listing;
use App\Models\Category;

class Home extends Component
{
    public $search = '';
    public $categories_id = '';

    public $perPage = 8;

    public function setCategory($id)
    {
        $this->categories_id = $id;
        $this->perPage = 8; // Reset lại số trang khi đổi ngành
    }

    public function loadMore()
    {
        $this->perPage += 4;
    }

    public function render()
    {
        $query = Listing::where('status', Listing::STATUS_ACTIVE);

        if ($this->search) {
            $query->where('title', 'like', '%' . $this->search . '%');
        }

        if ($this->categories_id) {
            $query->where('categories_id', $this->categories_id);
        }

        $listings = $query->latest()->take($this->perPage)->get();

        return view('livewire.home', ['listings' => $listings, 'categories' => Category::all()]);
    }
}
