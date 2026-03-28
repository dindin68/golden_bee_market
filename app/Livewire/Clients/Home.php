<?php

namespace App\Livewire\Clients;

use App\Traits\WithFiltering;

use Livewire\WithPagination;
use Livewire\Component;

use App\Models\Listing;
use App\Models\Category;


class Home extends Component
{
    use WithPagination, WithFiltering;

    public $perPage = 8;
    public $sortField = 'created_at';

    public function setCategory($id)
    {
        $this->filters['category'] = $id;
        $this->resetPage();
    }

    public function loadMore()
    {
        $this->perPage += 4;
    }

    // Tự động chạy khi biến search thay đổi
    public function updatedSearch()
    {
        $this->perPage = 8;
    }

    // Tự động chạy khi mảng filters thay đổi
    public function updatedFilters()
    {
        $this->perPage = 8;
    }

    public function render()
    {

        $query = Listing::with('category')
            ->where('status', Listing::STATUS_ACTIVE);

        $query->search($this->search)
            ->filter($this->filters);

        $listings = $query->latest()->take($this->perPage)->get();

        return view('livewire.clients.home', [
            'listings' => $listings,
            'categories' => Category::all()
        ]);
    }
}
