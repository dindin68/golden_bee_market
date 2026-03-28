<?php

namespace App\Livewire\Components;

use Livewire\Component;

use App\Models\Listing;

class ListingCard extends Component
{
    public $listing;
    public function render()
    {
        return view('livewire.components.listing-card');
    }
}
