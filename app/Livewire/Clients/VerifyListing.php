<?php

namespace App\Livewire\Clients;

use App\Models\Listing;
use App\Models\Verification; // Nhớ import model này nha má
use Livewire\Component;
use Illuminate\Support\Facades\Http;

class VerifyListing extends Component
{
    public $listing;
    public $verification;
    public $statusMessage = '';
    public $statusType = '';

    public function mount($id)
    {
        $this->listing = Listing::findOrFail($id);

        // Tìm yêu cầu xác minh đang chờ (Logic của bà)
        $this->verification = $this->listing->verifications()->where('status', 'pending')->first();

        // Check bảo mật: Chỉ chủ nhân mới được vào trang này
        // if (!$this->verification || $this->listing->users_id !== auth()->id()) {
        //     return redirect()->route('home')->with('error', 'Hông tìm thấy yêu cầu xác minh hợp lệ nha bà.');
        // }
    }

    public function checkNow()
    {
        $domain = str_replace(['http://', 'https://'], '', $this->listing->domain);
        $domain = explode('/', $domain)[0];
        $protocols = ['http://', 'https://'];
        $success = false;

        foreach ($protocols as $protocol) {
            try {
                $url = $protocol . $domain . '/verification.txt';
                $response = Http::timeout(2)->withoutVerifying()->get($url);
                if ($response->ok() && trim($response->body()) === (string) $this->verification->id) {
                    $success = true;
                    break;
                }
            } catch (\Exception $e) {
                continue;
            }
        }

        if ($success) {
            $this->listing->update(['is_verified' => true]);
            $this->verification->update(['status' => 'success']);

            $this->statusMessage = "✅ Xác minh thành công! Mẫu website đã được gắn tích xanh 🐝.";
            $this->statusType = "success";

            return redirect()->route('home')->with('success', 'Xác minh thành công!');
        }

        $this->statusMessage = "❌ Hông tìm thấy file hoặc mã hông khớp trên cả HTTP/HTTPS. Bà check lại file verification.txt nhen!";
        $this->statusType = "danger";
    }

    public function render()
    {
        return view('livewire.clients.verify-listing')->layout('components.layouts.app');
    }
}