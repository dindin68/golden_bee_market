<div class="max-w-6xl mx-auto">
    <div class="max-w-7xl mx-auto pt-10">
        <a href="{{ route('my-listings') }}"
            class="inline-flex items-center italic text-slate-500 hover:text-amber-500 transition-all font-black group text-[15px] uppercase">
            <div
                class="p-2.5 bg-white rounded-xl shadow-sm border border-slate-100 mr-4 group-hover:border-amber-200 transition-colors">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none"
                    stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round">
                    <path d="m15 18-6-6 6-6" />
                </svg>
            </div>
            Trở về danh sách tin đăng
        </a>
    </div>
    {{-- Header --}}
    <div class="px-12 my-12">
        <h2 class="text-[10px] font-black text-amber-600 uppercase tracking-[0.5em] mb-2">Editor Mode</h2>
        <h1 class="text-4xl font-black text-slate-900 uppercase tracking-tighter italic">Cập nhật tin đăng</h1>
        <p class="text-slate-400 text-[10px] uppercase font-bold mt-2 tracking-widest">ID: {{ $listing->id }}</p>
    </div>
    {{-- PHẦN MEDIA - DÀN HÀNG NGANG CHUYÊN NGHIỆP --}}
    <div class="my-12">
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8 items-start">

            {{-- CỘT TRÁI: DESKTOP (Chiếm 2/3 bề ngang trên màn hình lớn) --}}
            <div class="lg:col-span-2 space-y-4">
                <div class="flex items-center px-2">
                    <h3 class="text-[11px] font-black uppercase tracking-[0.3em] text-slate-900 flex items-center">
                        <span class="w-8 h-[2px] bg-amber-400 mr-3"></span>
                        Desktop View
                    </h3>
                </div>

                <div
                    class="group relative w-full h-[450px] rounded-[2rem] overflow-hidden bg-white border border-slate-100 shadow-xl transition-all hover:shadow-amber-200/40">
                    {{-- Browser Header --}}
                    <div class="bg-slate-100 px-4 py-3 border-b border-slate-200 flex items-center gap-2">
                        <div class="flex gap-1">
                            <div class="w-2 h-2 rounded-full bg-red-400"></div>
                            <div class="w-2 h-2 rounded-full bg-amber-400"></div>
                            <div class="w-2 h-2 rounded-full bg-emerald-400"></div>
                        </div>
                        <div
                            class="mx-auto bg-white rounded-md text-[8px] text-slate-400 px-4 py-1 truncate w-2/3 text-center shadow-sm font-mono">
                            {{ $domain ?: 'https://golden-bee.com' }}
                        </div>
                    </div>

                    {{-- Khung ảnh chạy Desktop --}}
                    <div class="relative w-full aspect-video overflow-hidden cursor-ns-resize">
                        @if ($new_img_desktop)
                            <img src="{{ $new_img_desktop->temporaryUrl() }}"
                                class="w-full absolute top-0 left-0 transition-transform duration-[6000ms] ease-in-out group-hover:translate-y-[calc(-100%+320px)]">
                        @elseif ($img_desktop)
                            <img src="{{ asset('storage/' . $img_desktop) }}"
                                class="w-full absolute top-0 left-0 transition-transform duration-[6000ms] ease-in-out group-hover:translate-y-[calc(-100%+320px)]">
                        @else
                            <div
                                class="w-full h-full flex items-center justify-center bg-slate-50 italic text-[10px] text-slate-300 font-black uppercase">
                                No Desktop Image</div>
                        @endif

                        {{-- Loading --}}
                        <div wire:loading wire:target="new_img_desktop"
                            class="absolute inset-0 bg-slate-900/60 backdrop-blur-sm flex items-center justify-center z-20">
                            <div
                                class="w-6 h-6 border-2 border-amber-400 border-t-transparent rounded-full animate-spin">
                            </div>
                        </div>
                    </div>

                    {{-- Nút chọn file --}}
                    <label class="absolute bottom-4 right-4 z-10 scale-0 group-hover:scale-100 transition-transform">
                        <div
                            class="bg-slate-900 text-white px-4 py-2 rounded-xl text-[8px] font-black uppercase tracking-widest cursor-pointer hover:bg-amber-400 hover:text-black shadow-2xl">
                            Change Desktop
                        </div>
                        <input type="file" wire:model="new_img_desktop" class="hidden" accept="image/*">
                    </label>
                </div>
            </div>

            {{-- CỘT PHẢI: MOBILE (Chiếm 1/3 bề ngang trên màn hình lớn) --}}
            <div class="lg:col-span-1 space-y-4">
                <div class="flex items-center px-2">
                    <h3 class="text-[11px] font-black uppercase tracking-[0.3em] text-slate-900 flex items-center">
                        <span class="w-8 h-[2px] bg-blue-400 mr-3"></span> Mobile View
                    </h3>
                </div>

                <div class="flex justify-center">
                    <div
                        class="group relative w-auto h-[450px] max-w-[260px] aspect-[9/18] bg-white rounded-[2rem] p-2.5 shadow-2xl border-[0.1px] border-slate-800 ring-1 ring-slate-700/50 overflow-hidden cursor-ns-resize">
                        {{-- Notch giả lập --}}
                        <div class="absolute top-0 left-1/2 -translate-x-1/2 w-16 h-4 bg-slate-800 rounded-b-xl z-20">
                        </div>

                        <div class="w-full h-full rounded-[1.5rem] overflow-hidden relative">
                            @if ($new_img_mobile)
                                <img src="{{ $new_img_mobile->temporaryUrl() }}"
                                    class="w-full absolute top-0 left-0 transition-transform duration-[6000ms] ease-in-out group-hover:translate-y-[calc(-100%+450px)]">
                            @elseif ($img_mobile)
                                <img src="{{ asset('storage/' . $img_mobile) }}"
                                    class="w-full absolute top-0 left-0 transition-transform duration-[6000ms] ease-in-out group-hover:translate-y-[calc(-100%+450px)]">
                            @else
                                <div
                                    class="w-full h-full flex items-center justify-center bg-slate-50 italic text-[10px] text-slate-300 font-black uppercase">
                                    No Mobile</div>
                            @endif

                            {{-- Loading --}}
                            <div wire:loading wire:target="new_img_mobile"
                                class="absolute inset-0 bg-slate-900/80 backdrop-blur-sm flex items-center justify-center z-20">
                                <span class="animate-pulse">🐝...</span>
                            </div>
                        </div>

                        {{-- Nút chọn file --}}
                        <label
                            class="absolute bottom-4 right-4 z-10 scale-0 group-hover:scale-100 transition-transform">
                            <div
                                class="bg-slate-900 text-white px-4 py-2 rounded-xl text-[8px] font-black uppercase tracking-widest cursor-pointer hover:bg-amber-400 hover:text-black shadow-2xl">
                                Thay ảnh Mobile
                            </div>
                            <input type="file" wire:model="new_img_mobile" class="hidden" accept="image/*">
                        </label>
                    </div>
                </div>
                @error('new_img_mobile') <span class="error-custom text-center block">{{ $message }}</span> @enderror
            </div>

        </div>
    </div>

    <form wire:submit="update" class="space-y-8">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-8">

            {{--Thông tin chung & Tech Stack --}}
            <div class="grid grid-cols-1 gap-5 border bg-amber-300 border-slate-100 rounded-[2rem] p-8">
                <h3
                    class="text-[11px] font-black uppercase tracking-widest text-slate-900 border-b border-slate-800 pb-4">
                    Thông tin chung & Tech Stack
                </h3>
                <div>
                    <label class="label-custom text-white font-bold">Tiêu đề Website</label>
                    <input type="text" wire:model="title"
                        class="input-custom !bg-yellow-200 !text-amber-800 placeholder:text-slate-500 rounded px-1"
                        placeholder="null">
                    @error('title') <span class="error-custom">{{ $message }}</span> @enderror
                </div>

                {{-- Domain --}}
                <div>
                    <label class="label-custom text-white font-bold">Tên miền (Domain)</label>
                    <input type="text" wire:model="domain"
                        class="input-custom !bg-yellow-200 !text-amber-800 placeholder:text-slate-500 rounded px-1"
                        placeholder="null">
                    @error('domain') <span class="error-custom">{{ $message }}</span> @enderror
                </div>

                {{-- Năm & Ngôn ngữ --}}
                <div class="grid grid-cols-2 gap-4">
                    <div>
                        <label class="label-custom text-white font-bold">Năm thành lập</label>
                        <input type="number" wire:model="founding_year"
                            class="input-custom !bg-yellow-200 !text-amber-800 placeholder:text-slate-500 rounded px-1"
                            placeholder="null">
                        @error('founding_year') <span class="error-custom">{{ $message }}</span> @enderror
                    </div>
                    <div>
                        <label class="label-custom text-white font-bold">Ngôn ngữ lập trình</label>
                        <input type="text" wire:model="programming_language"
                            class="input-custom !bg-yellow-200 !text-amber-800 placeholder:text-slate-500 rounded px-1"
                            placeholder="null">
                    </div>
                </div>

                {{-- CMS & Hosting --}}
                <div class="grid grid-cols-2 gap-4">
                    <div>
                        <label class="label-custom text-white font-bold">CMS</label>
                        <input type="text" wire:model="cms"
                            class="input-custom !bg-yellow-200 !text-amber-800 placeholder:text-slate-500 rounded px-1"
                            placeholder="null">
                    </div>
                    <div>
                        <label class="label-custom text-white font-bold">Hosting</label>
                        <input type="text" wire:model="hosting"
                            class="input-custom !bg-yellow-200 !text-amber-800 placeholder:text-slate-500 rounded px-1"
                            placeholder="null">
                    </div>
                </div>
            </div>

            {{-- Tài chính & Traffic --}}
            <div class="space-y-6 bg-slate-900 p-8 rounded-[2rem] shadow-xl text-white">
                <h3
                    class="text-[11px] font-black uppercase tracking-widest text-amber-400 border-b border-slate-800 pb-4">
                    Thông số kinh doanh
                </h3>

                <div class="grid grid-cols-1 gap-4">
                    {{-- Nguồn Traffic --}}
                    <div>
                        <label class="label-custom !text-slate-400 m-1 font-bold">Nguồn Traffic chính</label>
                        <input type="text" wire:model="traffic_source"
                            class="input-custom !bg-slate-800 !text-white placeholder:text-slate-500 rounded px-1"
                            placeholder="Null"> {{-- Hiện
                        null nếu trống --}}
                    </div>

                    {{-- Traffic hàng tháng --}}
                    <div>
                        <label class="label-custom !text-slate-400 m-1 font-bold">Traffic hàng tháng</label>
                        <input type="number" wire:model="monthly_traffic"
                            class="input-custom !bg-slate-800 !text-white placeholder:text-slate-500 rounded px-1"
                            placeholder="null">
                    </div>

                    {{-- Grid Doanh thu & Chi phí --}}
                    <div class="grid grid-cols-2 gap-4 pt-4 border-t border-slate-800">
                        <div>
                            <label class="label-custom !text-slate-400 font-bold">Doanh thu (VND)</label>
                            <input type="number" wire:model="monthly_revenue"
                                class="input-custom !bg-slate-800 !text-white border-emerald-500/30 placeholder:text-slate-500 rounded px-1"
                                placeholder="null">
                        </div>
                        <div>
                            <label class="label-custom !text-slate-400 font-bold">Chi phí (VND)</label>
                            <input type="number" wire:model="operating_cost"
                                class="input-custom !bg-slate-800 !text-white border-red-500/30 placeholder:text-slate-500 rounded px-1"
                                placeholder="null">
                        </div>
                    </div>
                </div>
            </div>
        </div>

        {{-- Nút điều hướng --}}
        <div class="flex items-center justify-between pt-8">
            <a href="{{ route('my-listings') }}" wire:navigate
                class="text-[10px] font-black uppercase tracking-widest text-slate-400 hover:text-red-500 transition-all">
                ← Hủy bỏ thay đổi
            </a>

            <button type="submit"
                class="px-12 py-5 bg-amber-400 text-black rounded-2xl text-[10px] font-black uppercase tracking-[0.3em] shadow-lg shadow-amber-200 hover:-translate-y-1 transition-all">
                Xác nhận cập nhật
            </button>
        </div>
    </form>

    {{-- CSS nội bộ --}}
    <style>
        .label-custom {
            @apply block text-[9px] font-black uppercase tracking-widest text-slate-400 mb-2;
        }

        .input-custom {
            @apply w-full bg-slate-50 border-none rounded-xl p-4 focus:ring-2 focus:ring-amber-400 transition-all text-sm font-bold text-slate-700;
        }

        .error-custom {
            @apply text-red-500 text-[9px] mt-1 font-bold italic;
        }
    </style>
</div>