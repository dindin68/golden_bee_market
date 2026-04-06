<?php

namespace App\Livewire\Clients;

use App\Models\Listing;
use Livewire\Component;
use Livewire\Attributes\Layout;
use Illuminate\Support\Facades\Auth;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Storage;

class EditListing extends Component
{
    use WithFileUploads;
    public Listing $listing;

    // Properties
    public $title, $domain, $founding_year, $programming_language, $cms, $hosting;
    public $monthly_traffic, $traffic_source, $categories_id;
    public $monthly_revenue, $operating_cost, $monthly_profit;
    public $img_desktop, $img_mobile;
    public $new_img_desktop, $new_img_mobile; // Dùng để lưu ảnh mới nếu có

    public function mount(Listing $listing)
    {
        // Check chủ sở hữu
        if ($listing->users_id !== Auth::id()) {
            abort(403);
        }

        $this->listing = $listing;

        // Đổ dữ liệu vào form
        $this->fill($listing->toArray());
    }

    public function update()
    {
        $this->validate([
            'title' => 'required|min:5',
            'domain' => 'required|url',
            'founding_year' => 'required|integer|min:1900|max:' . date('Y'),
            'programming_language' => 'required',
            'cms' => 'required',
            'hosting' => 'required',
            'monthly_traffic' => 'required|integer|min:0',
            'traffic_source' => 'required',
            'monthly_revenue' => 'required|numeric|min:0',
            'operating_cost' => 'required|numeric|min:0',
            'new_img_desktop' => 'nullable|image',
            'new_img_mobile' => 'nullable|image',
        ]);

        // Xử lý upload ảnh Desktop mới
        if ($this->new_img_desktop) {
            // Xóa ảnh cũ trong thư mục storage cho sạch máy
            if ($this->listing->img_desktop) {
                Storage::disk('public')->delete($this->listing->img_desktop);
            }
            // Lưu ảnh mới và lấy đường dẫn
            $this->img_desktop = $this->new_img_desktop->store('listings', 'public');
        }

        // Xử lý upload ảnh Mobile mới
        if ($this->new_img_mobile) {
            if ($this->listing->img_mobile) {
                Storage::disk('public')->delete($this->listing->img_mobile);
            }
            $this->img_mobile = $this->new_img_mobile->store('listings', 'public');
        }

        // Tự tính lợi nhuận trước khi lưu
        $this->monthly_profit = $this->monthly_revenue - $this->operating_cost;

        $this->listing->update([
            'title' => $this->title,
            'domain' => $this->domain,
            'founding_year' => $this->founding_year,
            'programming_language' => $this->programming_language,
            'cms' => $this->cms,
            'hosting' => $this->hosting,
            'monthly_traffic' => $this->monthly_traffic,
            'traffic_source' => $this->traffic_source,
            'monthly_revenue' => $this->monthly_revenue,
            'operating_cost' => $this->operating_cost,
            'monthly_profit' => $this->monthly_profit,
            'img_desktop' => $this->img_desktop,
            'img_mobile' => $this->img_mobile,

        ]);

        session()->flash('message', 'Đã cập nhật hệ thống thành công! ✨');
        return $this->redirectRoute('my-listings', navigate: true);
    }

    #[Layout('components.layouts.app')]
    public function render()
    {
        return view('livewire.clients.edit-listing');
    }
}