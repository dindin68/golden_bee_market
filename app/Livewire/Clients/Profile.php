<?php

namespace App\Livewire\Clients;

use Livewire\Attributes\Layout;
use Livewire\Component;
use Livewire\WithFileUploads; 

use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;

class Profile extends Component
{
    use WithFileUploads;
    public $name;
    public $email;
    public $phone;
    public $id_image; // Biến tạm chứa ảnh sếp chọn từ máy

    public function mount()
    {
        /** @var \App\Models\User $user */
        $user = Auth::user();
        // Đổ dữ liệu cũ vào form
        $this->name = $user->name;
        $this->email = $user->email;
        $this->phone = $user->phone;
    }

    public function updateProfile()
    {
        // 1. Kiểm tra "hàng" trước khi cho nhập kho
        $this->validate([
            'name' => 'required|min:3|max:50',
            'phone' => 'nullable|numeric|digits_between:10,11',
            'id_image' => 'nullable|image|max:2048', // Ảnh tối đa 2MB nhen má
        ], [
            'id_image.image' => 'Phải là file ảnh (jpg, png) mới chịu nhen.',
            'id_image.max' => 'Ảnh nặng quá 2MB rồi, máy chủ Golden Bee gánh hông nổi!',
        ]);

        /** @var \App\Models\User $user */
        $user = Auth::user();

        // 2. Cập nhật thông tin cơ bản
        $user->name = $this->name;
        $user->phone = $this->phone;

        // 3. Xử lý ảnh KYC (Nếu sếp có chọn ảnh mới)
        if ($this->id_image) {
            // Xóa ảnh cũ cho sạch server nhen má
            if ($user->id_image) {
                Storage::disk('public')->delete($user->id_image);
            }

            // Lưu ảnh mới vào folder 'kyc-images'
            $path = $this->id_image->store('kyc-images', 'public');
            
            $user->id_image = $path;
            $user->kyc_status = 'pending'; // Tự động đưa về trạng thái "Đợi duyệt"
        }

        $user->save(); // Lưu tất cả vào Database

        // 4. Xóa biến tạm để giao diện hông bị nặng nhen
        $this->reset('id_image');

        session()->flash('message', 'Hồ sơ đã được cập nhật! Đang đợi bà trùm duyệt KYC nhen. 🐝');
    }

    #[Layout('components.layouts.app')]
    public function render()
    {
        return view('livewire.clients.profile');
    }
}