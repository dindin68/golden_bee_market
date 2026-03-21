<?php

namespace App\Livewire\Admin;

use Livewire\Component;

use App\Models\Listing;

class ListingTable extends Component
{
    // Phương thức để xử lý việc duyệt tin
    public function approve($id)
    {
        $listing = Listing::findOrFail($id);
        $listing->update(['status' => Listing::STATUS_ACTIVE]);
        session()->flash('success', 'Đã duyệt tin thành công!');
    }
    public function render()
    {
        $listings = Listing::where('status', 'pending')
            ->orderBy('is_verified', 'desc')
            ->orderBy('created_at', 'desc')
            ->get();

        return view('livewire.admin.listing-table', ['listings' => $listings]);
    }
}
