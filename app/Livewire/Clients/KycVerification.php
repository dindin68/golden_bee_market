<?php

namespace App\Livewire\Clients;

use Livewire\Component;
use Livewire\WithFileUploads; // 🚀 BẮT BUỘC phải có cái này để up ảnh nhen má
use Livewire\Attributes\Layout;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;

class KycVerification extends Component
{
    use WithFileUploads;

    public $idImage; // Biến tạm chứa ảnh sếp chọn từ máy

    #[Layout('components.layouts.app')] // Hộ khẩu chuẩn sếp mới sửa nãy nè
    public function render()
    {
        return view('livewire.clients.kyc-verification');
    }

    public function submitKyc()
    {
        // 1. Kiểm tra "hàng" trước khi nhận nhen sếp
        $this->validate([
            'idImage' => 'required|image|max:2048', // Ảnh tối đa 2MB nhen
        ], [
            'idImage.required' => 'Bà chưa chọn ảnh mà bấm gửi gì má!',
            'idImage.image' => 'Phải là file ảnh (jpg, png) mới chịu nhen.',
            'idImage.max' => 'Ảnh nặng quá (quá 2MB), máy chủ nó gánh hông nổi!',
        ]);

        $user = Auth::user();

        // 2. Dọn dẹp ảnh cũ nếu có (Tránh đầy dung lượng máy chủ Golden Bee)
        if ($user->id_image) {
            Storage::disk('public')->delete($user->id_image);
        }

        // 3. Lưu ảnh vào folder 'kyc-images' trong public
        $path = $this->idImage->store('kyc-images', 'public');

        // 4. Cập nhật "Hộ khẩu" cho User
         /** @var \App\Models\User $user */
        $user = Auth::user();
        $user->update([
            'id_image' => $path,
            'kyc_status' => 'pending', // Chuyển trạng thái sang đợi sếp duyệt nhen!
        ]);

        // 5. Bắn tin vui cho User
        session()->flash('message', 'Hồ sơ đã được gửi! Chờ bà trùm duyệt nhen sếp. 🐝');
    }
}