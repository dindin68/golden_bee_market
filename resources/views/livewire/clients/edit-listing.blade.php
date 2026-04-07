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
    <div class="max-w-5xl mx-auto px-6 py-12">
        {{-- Header chính --}}
        <div class="flex flex-col md:flex-row md:items-end justify-between gap-6 mb-10">
            <div class="px-12">
                <h2 class="text-[10px] font-black text-amber-600 uppercase tracking-[0.5em]">Editor Mode</h2>
                <h1 class="text-4xl font-black text-slate-900 uppercase tracking-tighter italic">Cập nhật tin đăng</h1>
                <span class="text-slate-400 text-[10px] font-bold tracking-widest uppercase italic">
                    #ID: {{ $listing->id }}
                </span>
            </div>

            {{-- Trạng thái xác thực (Badge xịn) --}}
            <div class="flex items-center">
                @if($listing->is_verified)
                    <div
                        class="flex items-center gap-3 bg-emerald-50 border border-emerald-100 px-6 py-3 rounded-2xl shadow-sm">
                        <div class="w-2 h-2 bg-emerald-500 rounded-full animate-pulse"></div>
                        <span class="text-[10px] font-black uppercase tracking-widest text-emerald-700">Đã xác thực sở
                            hữu</span>
                        <svg class="w-4 h-4 text-emerald-500" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd"
                                d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                clip-rule="evenodd" />
                        </svg>
                    </div>
                @else
                    <div
                        class="flex items-center gap-3 bg-slate-100 border border-slate-200 px-6 py-3 rounded-2xl shadow-sm opacity-60">
                        <div class="w-2 h-2 bg-slate-400 rounded-full"></div>
                        <span class="text-[10px] font-black uppercase tracking-widest text-slate-500">Chưa xác thực sở
                            hữu</span>
                    </div>
                @endif
            </div>
        </div>

        {{-- Alert Box: Lưu ý thay đổi --}}
        <div class="relative overflow-hidden bg-slate-900 rounded-[2rem] p-8 shadow-2xl border-l-8 border-amber-400">
            {{-- Trang trí icon con ong mờ mờ ở góc --}}
            <div class="absolute top-[-20px] right-[-20px] opacity-10 text-white transform rotate-12">
                <svg class="w-40 h-40" fill="currentColor" viewBox="0 0 24 24">
                    <path d="M12 2L4.5 20.29l.71.71L12 18l6.79 3 .71-.71z" />
                </svg>
            </div>

            <div class="relative z-10 flex flex-col md:flex-row md:items-start gap-6">
                <div class="flex-shrink-0 bg-amber-400 p-3 rounded-2xl shadow-lg shadow-amber-400/20">
                    <svg class="w-6 h-6 text-black" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" />
                    </svg>
                </div>

                <div class="space-y-3">
                    <h4 class="text-xs font-black uppercase tracking-[0.2em] text-amber-400">Hệ thống bảo mật Golden Bee
                    </h4>
                    <p class="text-slate-300 text-sm font-medium leading-relaxed max-w-2xl">
                        Để đảm bảo tính minh bạch, trạng thái <span class="text-white font-bold">Xác thực sở hữu</span>
                        sẽ
                        tự động bị hủy & cần chờ <span class="text-white font-bold"> Admin duyệt tin</span> để đăng tin
                        lại nếu
                        bạn thay đổi các thông tin cốt lõi sau:
                    </p>

                    <div class="flex flex-wrap gap-3 mt-4">
                        <span
                            class="px-4 py-2 bg-slate-800 text-[9px] font-black uppercase tracking-widest text-slate-100 rounded-xl border border-slate-700 flex items-center gap-2">
                            <span class="w-1.5 h-1.5 bg-amber-400 rounded-full"></span> Tên miền (Domain)
                        </span>
                        <span
                            class="px-4 py-2 bg-slate-800 text-[9px] font-black uppercase tracking-widest text-slate-100 rounded-xl border border-slate-700 flex items-center gap-2">
                            <span class="w-1.5 h-1.5 bg-amber-400 rounded-full"></span> Ngôn ngữ lập trình
                        </span>
                        <span
                            class="px-4 py-2 bg-slate-800 text-[9px] font-black uppercase tracking-widest text-slate-100 rounded-xl border border-slate-700 flex items-center gap-2">
                            <span class="w-1.5 h-1.5 bg-amber-400 rounded-full"></span> Tiêu đề Website
                        </span>
                    </div>
                </div>
            </div>
        </div>
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