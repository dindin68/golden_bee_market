<?php

namespace App\Traits;

trait WithFiltering
{
    public $search = '';

    public $filters = [
        'category' => '',
        'status' => '',
        'is_verified' => '',
    ];

    // Reset trang về 1 khi người dùng gõ tìm kiếm hoặc chọn lọc
    public function updatingSearch()
    {
        $this->resetPage();
    }
    public function updatingFilters()
    {
        $this->resetPage();
    }

    // Hàm reset sạch sành sanh các bộ lọc
    public function clearFilters()
    {
        $this->reset(['search', 'filters']);
    }
}