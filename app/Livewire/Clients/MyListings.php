<?php

namespace App\Livewire\Clients;

use App\Models\Listing;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithPagination;
use Livewire\Attributes\Layout;

class MyListings extends Component
{
    use WithPagination;

    // Hàm xóa tin đăng nếu bà muốn thêm tính năng này
    public function deleteListing($id)
    {
        $listing = Listing::where('id', $id)->where('users_id', Auth::id())->first();
        
        if ($listing) {
            $listing->delete();
            session()->flash('message', 'Đã dẹp tiệm website này thành công! 🐝');
        }
    }
#[Layout('components.layouts.app')]
    public function render()
    {
        // Lấy danh sách website của chính ông chủ (auth user)
        $myListings = Listing::where('users_id', Auth::id())
            ->latest()
            ->get();

        return view('livewire.clients.my-listings', [
            'myListings' => $myListings
        ]);
    }
}