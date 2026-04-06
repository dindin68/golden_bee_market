<?php

namespace App\Livewire\Clients;

use App\Models\Listing;
use App\Models\Verification;
use Illuminate\Support\Facades\Storage;
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
        // Tìm tin đăng của đúng ông chủ đang đăng nhập
        $listing = Listing::where('id', $id)
            ->where('users_id', Auth::id())
            ->first();

        if ($listing) {
            // Dọn dẹp hết mấy đứa con bám đuôi nè má
            $listing->verifications()->delete(); // Xóa xác minh
            $listing->messages()->delete();      // Xóa tin nhắn
            $listing->transactions()->delete();  // Xóa giao dịch

            $listing->delete();

            session()->flash('message', 'Đã dẹp tiệm website thành công! 🐝');
        } else {
            session()->flash('error', 'Có gì đó sai sai, không xóa được ời!');
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