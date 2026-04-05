<div class="max-w-4xl mx-auto py-20 px-6">
    {{-- Header --}}
    <div class="mb-16 text-center md:text-left">
        <h2 class="text-[10px] font-black text-amber-600 uppercase tracking-[0.5em] mb-2">Account Settings</h2>
        <h1 class="text-4xl font-black text-slate-900 uppercase tracking-tighter italic">Hồ sơ cá nhân</h1>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-12 gap-12">
       {{-- Avatar Section --}}
        <div class="md:col-span-4 flex flex-col items-center gap-6">
            {{-- 1. LỚP CHA: Chỉ làm nhiệm vụ giữ chỗ và định vị, HÔNG ĐƯỢC để overflow-hidden ở đây nhen sếp --}}
            <div class="relative w-32 h-32 group">
                
                {{-- 2. LỚP CON (KHUNG AVATAR): Lớp này mới là lớp bo tròn và cắt nội dung bên trong --}}
                <div class="w-full h-full rounded-[2.5rem] bg-slate-100 border-4 border-white shadow-2xl flex items-center justify-center overflow-hidden">
                    {{-- Chữ cái đầu của tên --}}
                    <span class="text-4xl font-black text-amber-500">{{ substr(auth()->user()->name, 0, 1) }}</span>
                    
                    {{-- Hiệu ứng Hover đổi Avatar --}}
                    <div class="absolute inset-0 bg-black/40 opacity-0 group-hover:opacity-100 transition-opacity flex items-center justify-center cursor-pointer">
                        <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 9a2 2 0 012-2h.93a2 2 0 001.664-.89l.812-1.22A2 2 0 0110.07 4h3.86a2 2 0 011.664.89l.812 1.22A2 2 0 0018.07 7H19a2 2 0 012 2v9a2 2 0 01-2 2H5a2 2 0 01-2-2V9z" />
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 13a3 3 0 11-6 0 3 3 0 016 0z" />
                        </svg>
                    </div>
                </div>

                {{-- 3. DẤU TICK EMERALD: Nằm ngoài lớp overflow-hidden nên nó mới thò ra ngoài viền được nhen má --}}
                @if(auth()->user()->kyc_status === 'verified')
                    <div 
                        class="absolute -bottom-2 -right-2 bg-emerald-500 rounded-full p-2 border-4 border-white shadow-lg z-20 scale-110"
                        wire:key="verified-tick">
                        <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7" />
                        </svg>
                    </div>
                @endif
            </div>

            {{-- Dòng chữ trạng thái --}}
            @if(auth()->user()->kyc_status === 'verified')
                <p class="text-[8px] font-black text-emerald-600 uppercase tracking-[0.3em]">Verified Member since 2026 ✅</p>
            @else
                <p class="text-[8px] font-black text-slate-400 uppercase tracking-[0.3em]">New Member since 2026 (Unverified)</p>
            @endif
        </div>

        {{-- Form Section --}}
        <div class="md:col-span-8 space-y-10">
            <div class="bg-white rounded-[2.5rem] p-10 border border-slate-100 shadow-sm">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-12">
                    {{-- Name --}}
                    <div class="group">
                        <label class="block text-[9px] font-black text-slate-400 uppercase tracking-[0.3em] mb-3">Họ và
                            tên</label>
                        <input type="text" wire:model="name"
                            class="w-full bg-transparent border-0 border-b border-slate-100 py-3 px-0 text-slate-900 font-black focus:ring-0 focus:border-amber-400 text-sm">
                    </div>

                    <div class="group">
                        <label
                            class="block text-[9px] font-black text-slate-500 uppercase tracking-widest mb-2 group-focus-within:text-amber-600 transition-colors">Địa
                            chỉ Email</label>
                        <input type="email" value="{{ auth()->user()->email }}" disabled
                            class="w-full bg-transparent border-0 border-b border-slate-100 py-2 px-0 text-slate-400 font-bold focus:ring-0 italic cursor-not-allowed">
                    </div>

                    {{-- Phone (Mới thêm nè sếp) --}}
                    <div class="group">
                        <label class="block text-[9px] font-black text-slate-400 uppercase tracking-[0.3em] mb-3">Số
                            điện thoại</label>
                        <input type="text" wire:model="phone" placeholder="Chưa cập nhật"
                            class="w-full bg-transparent border-0 border-b border-slate-100 py-3 px-0 text-slate-900 font-black focus:ring-0 focus:border-amber-400 text-sm">
                    </div>

                    {{-- KYC Status Badge --}}
                    {{-- Photo Upload Section --}}
                    <div class="md:col-span-2 mt-8">
                        <label class="block text-[9px] font-black text-slate-400 uppercase tracking-[0.3em] mb-4">
                            Tài liệu định danh (CCCD/Passport)
                        </label>

                        <div class="relative group">
                            {{-- Khung upload bo tròn theo style của bà --}}
                            <div class="w-full h-48 rounded-[2.5rem] bg-slate-50 border-2 border-dashed border-slate-100 flex flex-col items-center justify-center overflow-hidden relative transition-all group-hover:border-amber-400 group-hover:bg-amber-50/30">
                                
                                @if ($id_image)
                                    {{-- Preview ảnh mới chọn --}}
                                    <img src="{{ $id_image->temporaryUrl() }}" class="w-full h-full object-cover">
                                    <div class="absolute inset-0 bg-black/20 flex items-center justify-center opacity-0 group-hover:opacity-100 transition-opacity">
                                        <span class="text-[8px] font-black text-white uppercase tracking-widest">Thay đổi ảnh</span>
                                    </div>
                                @elseif (auth()->user()->id_image)
                                    {{-- Hiện ảnh cũ đã up --}}
                                    <img src="{{ asset('storage/' . auth()->user()->id_image) }}" class="w-full h-full object-cover opacity-50">
                                    <div class="absolute inset-0 flex items-center justify-center">
                                        <span class="text-[8px] font-black text-slate-400 uppercase tracking-widest">Đã có hồ sơ - Nhấp để thay đổi</span>
                                    </div>
                                @else
                                    {{-- Trạng thái chưa có gì --}}
                                    <svg class="w-6 h-6 text-slate-300 mb-2 group-hover:text-amber-500 transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                                    </svg>
                                    <span class="text-[8px] font-black text-slate-400 uppercase tracking-widest group-hover:text-amber-600">Nhấp để chọn ảnh mặt trước</span>
                                @endif

                                {{-- Input ẩn để giữ giao diện đẹp --}}
                                <input type="file" wire:model="id_image" class="absolute inset-0 opacity-0 cursor-pointer shadow-none">
                            </div>

                            {{-- Hiệu ứng loading khi ảnh đang bay lên --}}
                            <div wire:loading wire:target="id_image" class="absolute inset-0 bg-white/90 flex items-center justify-center rounded-[2.5rem]">
                                <div class="flex flex-col items-center">
                                    <div class="w-4 h-4 border-2 border-amber-500 border-t-transparent rounded-full animate-spin mb-2"></div>
                                    <span class="text-[8px] font-black text-amber-600 uppercase tracking-widest">Đang xử lý ảnh...</span>
                                </div>
                            </div>
                        </div>

                        @error('id_image') 
                            <span class="text-[9px] font-black text-red-500 uppercase tracking-widest mt-3 block italic">{{ $message }}</span> 
                        @enderror
                    </div>
                </div>

                <button 
                    wire:click="updateProfile" 
                    wire:loading.attr="disabled"
                    class="mt-12 w-full py-5 bg-slate-900 text-white rounded-2xl text-[10px] font-black uppercase tracking-[0.4em] hover:bg-amber-500 hover:text-black transition-all shadow-xl active:scale-95 disabled:opacity-50 disabled:cursor-not-allowed">
                    <span wire:loading.remove wire:target="updateProfile">Cập nhật thông tin ➔</span>
                    <span wire:loading wire:target="updateProfile">Đang lưu dữ liệu...</span>
                </button>
            </div>
        </div>
    </div>
</div>