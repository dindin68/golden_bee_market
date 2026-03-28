<div class="container py-5">
    <div class="card shadow-sm border-0 rounded-3">
        <div class="card-body p-5">
            <h2 class="mb-4 text-warning fw-bold">🐝 Đăng bán Website mới</h2>

            {{-- Thông báo thành công --}}
            @if (session()->has('success'))
                <div class="alert alert-success border-0 shadow-sm mb-4">
                    {{ session('success') }}
                </div>
            @endif

            {{-- wire:submit.prevent giúp chặn load lại trang, gọi thẳng hàm save() --}}
            <form wire:submit.prevent="save">
                <div class="row">
                    {{-- Tiêu đề --}}
                    <div class="col-md-6 mb-3">
                        <label class="form-label fw-bold text-secondary">Tiêu đề tin đăng</label>
                        <input type="text" wire:model="title" class="form-control @error('title') is-invalid @enderror"
                            placeholder="Ví dụ: Web bán mật ong 2 năm tuổi">
                        @error('title') <div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div>

                    {{-- Tên miền --}}
                    <div class="col-md-6 mb-3">
                        <label class="form-label fw-bold text-secondary">Tên miền (Domain)</label>
                        <input type="text" wire:model="domain"
                            class="form-control @error('domain') is-invalid @enderror" placeholder="abc.com">
                        @error('domain') <div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div>

                    {{-- Năm thành lập --}}
                    <div class="col-md-4 mb-3">
                        <label class="form-label fw-bold text-secondary">Năm thành lập</label>
                        <input type="number" wire:model="founding_year" class="form-control" placeholder="2024">
                    </div>

                    {{-- Tech Stack --}}
                    <div class="col-md-4 mb-3">
                        <label class="form-label fw-bold text-secondary">Ngôn ngữ/Tech stack</label>
                        <input type="text" wire:model="programming_language" class="form-control"
                            placeholder="PHP, Laravel...">
                    </div>

                    {{-- Danh mục --}}
                    <div class="col-md-4 mb-3">
                        <label class="form-label fw-bold text-secondary">Danh mục</label>
                        <select wire:model="categories_id"
                            class="form-select @error('categories_id') is-invalid @enderror">
                            <option value="">-- Chọn danh mục --</option>
                            @foreach($categories as $cat)
                                <option value="{{ $cat->id }}">{{ $cat->name }}</option>
                            @endforeach
                        </select>
                        @error('categories_id') <div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div>
                    <div class="col-md-6 mb-3">
                        <label class="form-label fw-bold">Ảnh đại diện Website</label>
                        <input type="file" wire:model="image" class="form-control @error('image') is-invalid @enderror">

                        {{-- PHẢI CÓ DÒNG NÀY NÈ MÁ --}}
                        @error('image')
                            <div class="text-danger small mt-1">{{ $message }}</div>
                        @enderror
                    </div>

                    <hr class="my-4 opacity-25">

                    {{-- Tài chính --}}
                    <div class="col-md-4 mb-3">
                        <label class="form-label fw-bold text-secondary">Doanh thu tháng ($)</label>
                        <input type="number" wire:model="monthly_revenue" class="form-control">
                    </div>
                    <div class="col-md-4 mb-3">
                        <label class="form-label fw-bold text-secondary">Chi phí vận hành ($)</label>
                        <input type="number" wire:model="operating_cost" class="form-control">
                    </div>
                    <div class="col-md-4 mb-3">
                        <label class="form-label fw-bold text-secondary">Lợi nhuận ròng ($)</label>
                        <input type="number" wire:model="monthly_profit" class="form-control">
                    </div>
                </div>

                {{-- Nút bấm --}}
                <div class="mt-4">
                    <button type="submit"
                        class="btn btn-warning w-100 fw-bold py-3 shadow-sm text-white uppercase tracking-wider">
                        <span wire:loading.remove>ĐĂNG TIN NGAY</span>
                        <span wire:loading>ĐANG XỬ LÝ... 🐝</span>
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>