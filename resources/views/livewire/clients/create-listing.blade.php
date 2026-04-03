<div class="min-h-screen relative py-12 px-6 bg-[#0B1120]">
    {{-- 1. Quầng sáng Spotlight --}}
    <div class="fixed inset-0 z-0 pointer-events-none">
        <div class="absolute top-[-10%] left-[-10%] w-[600px] h-[600px] bg-blue-500/20 blur-[130px] rounded-full"></div>
        <div class="absolute bottom-[10%] right-[-10%] w-[700px] h-[700px] bg-amber-500/15 blur-[160px] rounded-full">
        </div>
    </div>

    <div class="relative z-10 max-w-6xl mx-auto">
        {{-- Header --}}
        <div class="text-center mb-12">
            <h1
                class="text-4xl font-black text-transparent bg-clip-text bg-gradient-to-r from-amber-300 to-orange-500 uppercase tracking-tighter">
                Niêm yết Website</h1>
            <p class="text-slate-500 text-[10px] font-bold uppercase tracking-[0.4em] mt-2 italic">Hệ thống đăng tin
                Golden Bee Market</p>
        </div>

        <form wire:submit.prevent="save" class="grid grid-cols-1 lg:grid-cols-12 gap-8">

            {{-- CỘT TRÁI: THÔNG TIN CHI TIẾT --}}
            <div class="lg:col-span-8 space-y-8">

                {{-- Block 1: Định danh --}}
                <div class="bg-white/[0.03] backdrop-blur-3xl border border-white/10 rounded-[2.5rem] p-10 shadow-2xl">
                    <div class="flex items-center gap-3 mb-10">
                        <span
                            class="w-8 h-8 rounded-lg bg-amber-400 flex items-center justify-center text-black font-black text-xs">01</span>
                        <h3 class="text-white font-bold tracking-widest uppercase text-sm">Định danh & Nội dung</h3>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-12">
                        <div class="group relative">
                            <label
                                class="block text-[9px] font-black text-slate-500 uppercase tracking-widest mb-2 group-focus-within:text-amber-400 transition-colors">Tiêu
                                đề dự án</label>
                            <input type="text" wire:model="title"
                                class="w-full bg-transparent border-0 border-b border-white/10 py-2 px-0 text-white focus:ring-0 focus:border-amber-400 transition-all placeholder-slate-700"
                                placeholder="Ví dụ: Web bán mật ong 2 năm tuổi...">
                            @error('title') <p
                                class="text-[8px] text-red-400/90 mt-1 italic font-bold uppercase tracking-widest">
                                {{ $message }}
                            </p> @enderror
                        </div>
                        <div class="group relative">
                            <label
                                class="block text-[9px] font-black text-slate-500 uppercase tracking-widest mb-2 group-focus-within:text-amber-400">Tên
                                miền (Domain)</label>
                            <input type="text" wire:model="domain"
                                class="w-full bg-transparent border-0 border-b border-white/10 py-2 px-0 text-white focus:ring-0 focus:border-amber-400 transition-all placeholder-slate-700"
                                placeholder="abc.com">
                            @error('domain') <p
                                class="text-[8px] text-red-400/90 mt-1 italic font-bold uppercase tracking-widest">
                                {{ $message }}
                            </p> @enderror
                        </div>
                        <div class="group relative">
                            <label
                                class="block text-[9px] font-black text-slate-500 uppercase tracking-widest mb-2">Danh
                                mục ngành nghề</label>
                            <select wire:model="categories_id"
                                class="w-full bg-transparent border-0 border-b border-white/10 py-2 px-0 text-slate-400 focus:ring-0 focus:border-amber-400 appearance-none">
                                <option value="" class="bg-slate-900">-- Chọn danh mục --</option>
                                @foreach($categories as $cat)
                                    <option value="{{ $cat->id }}" class="bg-slate-900 text-white">{{ $cat->name }}</option>
                                @endforeach
                            </select>
                            @error('categories_id') <p
                                class="text-[8px] text-red-400/90 mt-1 italic font-bold uppercase tracking-widest">
                                {{ $message }}
                            </p> @enderror
                        </div>
                        <div class="group relative">
                            <label
                                class="block text-[9px] font-black text-slate-500 uppercase tracking-widest mb-2 group-focus-within:text-amber-400">Hệ
                                quản trị (CMS)</label>
                            <input type="text" wire:model="cms"
                                class="w-full bg-transparent border-0 border-b border-white/10 py-2 px-0 text-white focus:ring-0 focus:border-amber-400 transition-all placeholder-slate-700"
                                placeholder="WordPress, Code tay, Laravel...">
                            @error('cms') <p
                                class="text-[8px] text-red-400/90 mt-1 italic font-bold uppercase tracking-widest">
                                {{ $message }}
                            </p> @enderror

                        </div>
                    </div>
                </div>

                {{-- Block 2: Kỹ thuật & Phân tích --}}
                <div class="bg-white/[0.03] backdrop-blur-3xl border border-white/10 rounded-[2.5rem] p-10 shadow-2xl">
                    <div class="flex items-center gap-3 mb-10">
                        <span
                            class="w-8 h-8 rounded-lg bg-blue-500 flex items-center justify-center text-white font-black text-xs">02</span>
                        <h3 class="text-white font-bold tracking-widest uppercase text-sm">Kỹ thuật & Truy cập</h3>
                    </div>
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-10">
                        <div class="group">
                            <label class="block text-[9px] font-black text-slate-500 uppercase tracking-widest mb-2">Năm
                                thành lập</label>
                            <input type="number" wire:model="founding_year"
                                class="w-full bg-transparent border-0 border-b border-white/10 py-2 px-0 text-white focus:ring-0 focus:border-amber-400"
                                placeholder="2024">
                            @error('founding_year') <p
                                class="text-[8px] text-red-400/90 mt-1 italic font-bold uppercase tracking-widest">
                                {{ $message }}
                            </p> @enderror

                        </div>
                        <div class="group">
                            <label
                                class="block text-[9px] font-black text-slate-500 uppercase tracking-widest mb-2">Công
                                nghệ/Ngôn ngữ</label>
                            <input type="text" wire:model="programming_language"
                                class="w-full bg-transparent border-0 border-b border-white/10 py-2 px-0 text-white focus:ring-0 focus:border-amber-400"
                                placeholder="PHP, React, Node.js...">
                            @error('programming_language') <p
                                class="text-[8px] text-red-400/90 mt-1 italic font-bold uppercase tracking-widest">
                                {{ $message }}
                            </p> @enderror

                        </div>
                        <div class="group">
                            <label class="block text-[9px] font-black text-slate-500 uppercase tracking-widest mb-2">Đơn
                                vị Hosting</label>
                            <input type="text" wire:model="hosting"
                                class="w-full bg-transparent border-0 border-b border-white/10 py-2 px-0 text-white focus:ring-0 focus:border-amber-400"
                                placeholder="AWS, Vultr, TinoHost...">
                            @error('hosting') <p
                                class="text-[8px] text-red-400/90 mt-1 italic font-bold uppercase tracking-widest">
                                {{ $message }}
                            </p> @enderror
                        </div>
                    </div>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-10 mt-10">
                        <div class="group">
                            <label
                                class="block text-[9px] font-black text-slate-500 uppercase tracking-widest mb-2">Lượt
                                truy cập/tháng</label>
                            <input type="number" wire:model="monthly_traffic"
                                class="w-full bg-transparent border-0 border-b border-white/10 py-2 px-0 text-white focus:ring-0 focus:border-amber-400"
                                placeholder="Ví dụ: 50000">
                            @error('monthly_traffic') <p
                                class="text-[8px] text-red-400/90 mt-1 italic font-bold uppercase tracking-widest">
                                {{ $message }}
                            </p> @enderror
                        </div>
                        <div class="group">
                            <label
                                class="block text-[9px] font-black text-slate-500 uppercase tracking-widest mb-2">Nguồn
                                truy cập chính</label>
                            <input type="text" wire:model="traffic_source"
                                class="w-full bg-transparent border-0 border-b border-white/10 py-2 px-0 text-white focus:ring-0 focus:border-amber-400"
                                placeholder="Tự nhiên, Mạng xã hội, Quảng cáo...">
                            @error('traffic_source') <p
                                class="text-[8px] text-red-400/90 mt-1 italic font-bold uppercase tracking-widest">
                                {{ $message }}
                            </p> @enderror
                        </div>
                    </div>
                </div>
            </div>

            {{-- CỘT PHẢI: TÀI CHÍNH & PUBLISH --}}
            <div class="lg:col-span-4 space-y-8">

                {{-- Financial Dashboard (Giữ nguyên phong cách cũ) --}}
                <div
                    class="bg-slate-950/50 backdrop-blur-3xl border border-white/10 rounded-[2.5rem] p-8 shadow-2xl overflow-hidden relative group">
                    <div
                        class="absolute top-0 right-0 w-32 h-32 bg-amber-400/10 blur-3xl rounded-full -translate-y-10 translate-x-10">
                    </div>

                    <h3 class="text-white font-bold tracking-widest uppercase text-xs mb-8 flex items-center gap-2">
                        <svg class="w-4 h-4 text-amber-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                        Chỉ số Tài chính
                    </h3>

                    <div class="space-y-8">
                        <div class="space-y-2">
                            <label class="text-[8px] font-black text-slate-500 uppercase tracking-[0.3em]">Doanh thu
                                tháng</label>
                            <div class="flex items-center gap-2 text-2xl font-black text-white">
                                <span class="text-amber-400 font-light">$</span>
                                <input type="number" wire:model.live="monthly_revenue"
                                    class="w-full bg-transparent border-none p-0 focus:ring-0 text-2xl font-black">
                            </div>
                        </div>

                        <div class="space-y-2">
                            <label class="text-[8px] font-black text-slate-500 uppercase tracking-[0.3em]">Chi phí vận
                                hành</label>
                            <div class="flex items-center gap-2 text-2xl font-black text-red-400/80">
                                <span class="font-light">$</span>
                                <input type="number" wire:model.live="operating_cost"
                                    class="w-full bg-transparent border-none p-0 focus:ring-0 text-2xl font-black">
                            </div>
                        </div>

                        <div class="pt-6 border-t border-white/5">
                            <div class="flex justify-between items-end mb-2">
                                <label class="text-[8px] font-black text-amber-400 uppercase tracking-[0.3em]">Lợi nhuận
                                    ròng</label>
                                <span class="text-white font-black text-xl">${{ number_format($monthly_profit) }}</span>
                            </div>

                            @if($monthly_profit > 0)
                                <div
                                    class="bg-amber-400/10 rounded-2xl p-4 mt-4 border border-amber-400/20 shadow-[0_0_20px_rgba(251,191,36,0.1)]">
                                    <p
                                        class="text-[9px] font-bold text-amber-400 uppercase tracking-widest leading-relaxed text-center">
                                        ✨ Giá đề xuất:<br>
                                        <span
                                            class="text-lg text-white font-black">${{ number_format($monthly_profit * 24) }}</span>
                                    </p>
                                </div>
                            @endif
                        </div>
                    </div>

                    {{-- PHẦN UPLOAD 2 ẢNH --}}
                    <div class="space-y-2">
                        <label
                            class="block text-[8px] font-black text-slate-500 uppercase tracking-[0.3em] text-center">Ảnh
                            Giao diện Desktop</label>
                        {{-- 📸 ẢNH DESKTOP (Bản chuẩn đã sửa) --}}
                        <div
                            class="relative group/scroll h-32 w-full border border-white/10 rounded-2xl bg-white/[0.02] overflow-hidden cursor-pointer hover:border-amber-400/30 transition-colors">
                            @if($img_desktop)
                                {{-- Dán trực tiếp transition vào thẻ img nhen má --}}
                                <img src="{{ $img_desktop->temporaryUrl() }}"
                                    class="w-full h-auto transition-transform duration-[4000ms] ease-in-out group-hover/scroll:-translate-y-[calc(100%-8rem)]">

                                {{-- Lớp phủ gradient cho sang --}}
                                <div
                                    class="absolute inset-0 bg-gradient-to-t from-[#0B1120]/50 to-transparent pointer-events-none">
                                </div>
                            @else
                                <div class="flex flex-col items-center justify-center h-full">
                                    <svg class="w-5 h-5 text-slate-600 mb-1" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                            d="M9.75 17L9 21h6l-.75-4M3 13h18M5 17h14a2 2 0 002-2V5a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                                    </svg>
                                    <span class="text-[7px] font-bold text-slate-500 uppercase tracking-widest">Tải ảnh
                                        Desktop</span>
                                </div>
                            @endif
                            <input type="file" wire:model="img_desktop"
                                class="absolute inset-0 opacity-0 cursor-pointer z-20">
                        </div>
                        <x-input-error :messages="$errors->get('img_desktop')"
                            class="text-[8px] text-red-400/80 italic text-center" />
                    </div>

                    {{-- ẢNH MOBILE --}}
                    <div class="space-y-2">
                        <label
                            class="block text-[8px] font-black text-slate-500 uppercase tracking-[0.3em] text-center">Ảnh
                            Giao diện Mobile</label>
                        <div
                            class="relative group/scroll h-32 w-full border border-white/10 rounded-2xl bg-white/[0.02] overflow-hidden cursor-pointer hover:border-amber-400/30 transition-colors">
                            @if($img_mobile)
                                <img src="{{ $img_mobile->temporaryUrl() }}"
                                    class="w-full h-auto transition-transform duration-[4000ms] ease-in-out group-hover/scroll:-translate-y-[calc(100%-8rem)]">

                                <div
                                    class="absolute inset-0 bg-gradient-to-t from-[#0B1120]/50 to-transparent pointer-events-none">
                                </div>
                            @else
                                <div class="flex flex-col items-center justify-center h-full">
                                    <svg class="w-5 h-5 text-slate-600 mb-1" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                            d="M12 18h.01M8 21h8a2 2 0 002-2V5a2 2 0 00-2-2H8a2 2 0 00-2 2v14a2 2 0 002 2z" />
                                    </svg>
                                    <span class="text-[7px] font-bold text-slate-500 uppercase tracking-widest">Tải ảnh
                                        Mobile</span>
                                </div>
                            @endif
                            <input type="file" wire:model="img_mobile"
                                class="absolute inset-0 opacity-0 cursor-pointer z-20">
                        </div>
                        <x-input-error :messages="$errors->get('img_mobile')"
                            class="text-[8px] text-red-400/80 italic text-center" />
                    </div>
                    {{-- Chỗ cuối Form, ngay trên nút Submit hoặc dưới nút Submit tùy sếp nhen --}}
                    <div class="mt-8 space-y-3">
                        <label class="flex items-center justify-center gap-3 cursor-pointer group/terms">
                            <div class="relative">
                                {{-- Checkbox ẩn nhưng vẫn hoạt động --}}
                                <input type="checkbox" wire:model.live="terms" class="peer sr-only">

                                {{-- Ô vuông Custom phong cách Golden Bee --}}
                                <div
                                    class="w-5 h-5 border-2 border-white/10 rounded-lg bg-white/[0.02] peer-checked:bg-amber-400 peer-checked:border-amber-400 transition-all duration-300 flex items-center justify-center shadow-lg">
                                    {{-- Dấu tích hiện ra khi check --}}
                                    <svg class="w-3 h-3 text-black scale-0 peer-checked:scale-100 transition-transform duration-300"
                                        fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="4">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7"></path>
                                    </svg>
                                </div>
                            </div>

                            <span
                                class="text-[9px] font-bold text-slate-500 uppercase tracking-widest group-hover/terms:text-slate-300 transition-colors">
                                Tôi đồng ý với <span
                                    class="text-amber-400/80 underline decoration-amber-400/20 underline-offset-4">chính
                                    sách bảo mật</span> của Golden Bee
                            </span>
                        </label>

                        {{-- Hiện lỗi nếu sếp cố tình bấm Submit mà chưa tick --}}
                        @error('terms')
                            <p
                                class="text-center text-[8px] text-red-400 italic animate-bounce font-bold uppercase tracking-widest">
                                {{ $message }}
                            </p>
                        @enderror
                    </div>

                    {{-- Nút Submit --}}
                    <button type="submit"
                        class="w-full mt-5 py-5 rounded-2xl bg-gradient-to-r from-amber-400 to-orange-500 text-black font-black uppercase tracking-[0.3em] text-[10px] hover:shadow-[0_0_30px_rgba(251,191,36,0.4)] transition-all active:scale-95 group">
                        <span wire:loading.remove>Bắt đầu niêm yết ➔</span>
                        <span wire:loading>Đang xử lý... 🐝</span>
                    </button>
                </div>


            </div>
        </form>
    </div>
</div>