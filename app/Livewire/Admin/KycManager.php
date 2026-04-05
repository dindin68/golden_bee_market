<?php

namespace App\Livewire\Admin;

use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Support\Facades\Storage;

class KycManager extends Component
{
    use WithPagination;

    // Hàm phê duyệt
    public function approve($userId)
    {
        $user = User::findOrFail($userId);
        $user->update(['kyc_status' => 'verified']);

        session()->flash('message', "Đã cấp 'thẻ xanh' cho {$user->name}! ✅");
    }

    // Hàm từ chối (Xóa ảnh luôn cho sạch server)
    public function reject($userId)
    {
        $user = User::findOrFail($userId);

        if ($user->id_image) {
            Storage::disk('public')->delete($user->id_image);
        }

        $user->update([
            'kyc_status' => null,
            'id_image' => null
        ]);

        session()->flash('error', "Đã đuổi khứa {$user->name} về làm lại hồ sơ! ❌");
    }

    public function render()
    {
        $pendingUsers = User::where('kyc_status', 'pending')
            ->latest()
            ->paginate(10);

        return view('livewire.admin.kyc-manager', [
            'users' => $pendingUsers
        ])->layout('components.layouts.app');
    }
}