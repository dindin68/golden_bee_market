<div class="min-h-screen relative py-12 px-6 bg-[#0B1120] font-sans selection:bg-amber-400/30"
    x-data="{ copied: false, code: '{{ $verification->id }}' }"> {{-- Thêm Alpine.js cho nút Copy --}}

    {{-- 1. Quầng sáng Spotlight --}}
    <div class="fixed inset-0 z-0 pointer-events-none">
        <div class="absolute top-[-10%] right-[-10%] w-[600px] h-[600px] bg-blue-500/10 blur-[130px] rounded-full">
        </div>
        <div class="absolute bottom-[10%] left-[-10%] w-[700px] h-[700px] bg-amber-500/10 blur-[160px] rounded-full">
        </div>
    </div>

    <div class="relative z-10 max-w-4xl mx-auto">
        {{-- Header Security --}}
        <div class="text-center mb-12 space-y-3">
            <div
                class="inline-flex items-center justify-center w-16 h-16 rounded-3xl bg-gradient-to-br from-amber-400/20 to-orange-500/10 border border-amber-400/20 backdrop-blur-2xl mb-4 shadow-[0_0_30px_rgba(251,191,36,0.1)]">
                <svg class="w-8 h-8 text-amber-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                        d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z" />
                </svg>
            </div>
            <h2 class="text-4xl font-black text-white uppercase tracking-tighter italic">Xác minh chính chủ</h2>
            <p class="text-slate-500 text-[10px] font-bold uppercase tracking-[0.5em]">Golden Bee Verification Protocol
            </p>
        </div>

        {{-- LISTING SUMMARY CARD --}}
        <div
            class="mb-10 bg-white/[0.03] border border-white/10 backdrop-blur-3xl rounded-[2.5rem] p-6 flex flex-col md:flex-row items-center gap-8 shadow-2xl relative overflow-hidden group">
            <div
                class="absolute inset-0 bg-gradient-to-r from-amber-400/5 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-700">
            </div>

            <div
                class="w-full md:w-48 h-28 rounded-[1.5rem] overflow-hidden flex-shrink-0 border border-white/10 shadow-lg relative">
                <img src="{{ $listing->img_desktop ? asset('storage/' . $listing->img_desktop) : 'https://placehold.co/400x300/1e293b/white?text=No+Preview' }}"
                    class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-700"
                    alt="Preview">
                <div class="absolute inset-0 bg-black/20"></div>
            </div>

            <div class="flex-1 text-center md:text-left space-y-2 relative z-10">
                <div class="flex items-center justify-center md:justify-start gap-3">
                    <h3 class="text-white font-black text-xl uppercase tracking-tight">{{ $listing->title }}</h3>
                </div>
                <p
                    class="text-amber-400 font-mono text-xs tracking-widest opacity-80 underline underline-offset-4 decoration-amber-400/30">
                    {{ $listing->domain }}
                </p>

                <div class="flex flex-wrap justify-center md:justify-start gap-3 mt-4">
                    <div
                        class="px-4 py-1.5 rounded-xl bg-white/5 border border-white/10 text-[9px] font-black text-slate-400 uppercase tracking-widest flex items-center gap-2">
                        <span
                            class="w-1.5 h-1.5 rounded-full bg-emerald-400 shadow-[0_0_10px_rgba(52,211,153,0.5)]"></span>
                        Lợi nhuận: <span class="text-white">${{ number_format($listing->monthly_profit) }}</span>
                    </div>
                    <div
                        class="px-4 py-1.5 rounded-xl bg-white/5 border border-white/10 text-[9px] font-black text-slate-400 uppercase tracking-widest flex items-center gap-2">
                        <span
                            class="w-1.5 h-1.5 rounded-full bg-blue-400 shadow-[0_0_10px_rgba(96,165,250,0.5)]"></span>
                        Truy cập: <span class="text-white">{{ number_format($listing->monthly_traffic) }}</span>
                    </div>
                </div>
            </div>

            <div class="hidden md:block px-8 border-l border-white/10">
                <span
                    class="text-[8px] font-black text-slate-500 uppercase tracking-[0.4em] block mb-2 text-right">Trạng
                    thái</span>
                <div class="relative">
                    <span class="absolute inset-0 bg-amber-400/20 blur-lg rounded-full animate-pulse"></span>
                    <span
                        class="relative px-5 py-2 rounded-xl bg-amber-400 text-black text-[10px] font-black uppercase tracking-widest shadow-xl">
                        Chờ xác minh
                    </span>
                </div>
            </div>
        </div>

        {{-- MAIN INSTRUCTION CARD --}}
        <div
            class="bg-white/[0.04] backdrop-blur-3xl rounded-[3.5rem] border border-white/10 p-10 md:p-16 shadow-2xl relative">
            <div class="absolute top-0 right-0 p-10 opacity-[0.03] select-none pointer-events-none">
                <span class="text-[12rem] font-black text-white leading-none">03</span>
            </div>

            <div class="space-y-12 relative z-10">
                {{-- Bước 1 --}}
                <div class="flex gap-8 group">
                    <div class="flex flex-col items-center">
                        <div
                            class="flex-shrink-0 w-12 h-12 rounded-2xl bg-slate-900 border border-white/10 flex items-center justify-center text-sm font-black text-amber-400 group-hover:bg-amber-400 group-hover:text-black transition-all duration-500 shadow-xl">
                            1</div>
                        <div class="w-px h-full bg-gradient-to-b from-white/10 to-transparent mt-4"></div>
                    </div>
                    <div class="py-2 space-y-3">
                        <h4 class="text-white font-black text-md tracking-widest uppercase">Khởi tạo file định danh</h4>
                        <p class="text-slate-400 text-xs leading-relaxed max-w-md">
                            Tạo một file văn bản thô (.txt) mới với tên chính xác là:
                            <code
                                class="bg-amber-400/10 px-3 py-1 rounded-lg text-amber-300 font-mono text-[11px] border border-amber-400/20 ml-1">verification.txt</code>
                        </p>
                    </div>
                </div>

                {{-- Bước 2 --}}
                <div class="flex gap-8 group">
                    <div class="flex flex-col items-center">
                        <div
                            class="flex-shrink-0 w-12 h-12 rounded-2xl bg-slate-900 border border-white/10 flex items-center justify-center text-sm font-black text-amber-400 group-hover:bg-amber-400 group-hover:text-black transition-all duration-500 shadow-xl">
                            2</div>
                        <div class="w-px h-full bg-gradient-to-b from-white/10 to-transparent mt-4"></div>
                    </div>
                    <div class="py-2 space-y-5 w-full">
                        <h4 class="text-white font-black text-md tracking-widest uppercase">Cấp mã xác thực</h4>
                        <p class="text-slate-400 text-xs leading-relaxed max-w-md">Sao chép mã token duy nhất dưới đây
                            và dán vào bên trong file vừa tạo (không kèm khoảng trắng):</p>

                        <div class="relative max-w-md group/code">
                            <div class="bg-black/60 rounded-2xl p-6 border border-white/10 font-mono text-amber-400 text-xl tracking-[0.2em] text-center shadow-inner group-hover/code:border-amber-400/40 transition-all duration-500"
                                id="copy-text">
                                {{ $verification->id }}
                            </div>
                            {{-- Nút Copy tích hợp Alpine.js --}}
                            <button
                                @click="navigator.clipboard.writeText(code); copied = true; setTimeout(() => copied = false, 2000)"
                                class="absolute top-1/2 -right-4 -translate-y-1/2 w-12 h-12 bg-amber-400 rounded-2xl flex items-center justify-center text-black shadow-2xl hover:scale-110 active:scale-90 transition-all group-hover/code:right-[-1rem]">
                                <svg x-show="!copied" class="w-5 h-5" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M8 7v8a2 2 0 002 2h6M8 7V5a2 2 0 012-2h4.586a1 1 0 01.707.293l4.414 4.414a1 1 0 01.293.707V15a2 2 0 01-2 2h-2M8 7H6a2 2 0 00-2 2v10a2 2 0 002 2h8a2 2 0 002-2v-2" />
                                </svg>
                                <svg x-show="copied" x-cloak class="w-5 h-5" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M5 13l4 4L19 7" />
                                </svg>
                            </button>
                            <span x-show="copied" x-cloak x-transition
                                class="absolute -bottom-8 left-1/2 -translate-x-1/2 text-[10px] font-black text-amber-400 uppercase tracking-widest">Đã
                                sao chép!</span>
                        </div>
                    </div>
                </div>

                {{-- Bước 3 --}}
                <div class="flex gap-8 group">
                    <div
                        class="flex-shrink-0 w-12 h-12 rounded-2xl bg-slate-900 border border-white/10 flex items-center justify-center text-sm font-black text-amber-400 group-hover:bg-amber-400 group-hover:text-black transition-all duration-500 shadow-xl">
                        3</div>
                    <div class="py-2 space-y-4">
                        <h4 class="text-white font-black text-md tracking-widest uppercase">Phát hành lên Server</h4>
                        <p class="text-slate-400 text-xs leading-relaxed max-w-md">Upload file lên thư mục gốc (root)
                            của website bà. Hệ thống sẽ truy vấn tại:</p>
                        <div
                            class="inline-flex items-center gap-2 bg-white/5 px-5 py-2.5 rounded-2xl text-slate-300 font-mono text-[11px] border border-white/5 mt-2">
                            <span class="text-amber-400 opacity-50">{{ $listing->domain }}/</span>
                            <span class="font-black">verification.txt</span>
                        </div>
                    </div>
                </div>

                {{-- Status & Action --}}
                <div class="pt-12 border-t border-white/5 text-center space-y-8">
                    @if ($statusMessage)
                        <div
                            class="inline-block px-8 py-4 rounded-[2rem] @if($statusType == 'success') bg-emerald-500/10 text-emerald-400 border-emerald-400/20 @else bg-red-500/10 text-red-400 border-red-500/20 @endif border text-[11px] font-black uppercase tracking-[0.2em] shadow-2xl animate-bounce">
                            {{ $statusMessage }}
                        </div>
                    @endif

                    <div class="flex flex-col items-center gap-6">
                        @if (!$listing->is_verified)
                            <button wire:click="checkNow" wire:loading.attr="disabled"
                                class="relative overflow-hidden group/btn px-16 py-6 rounded-[2rem] bg-gradient-to-r from-amber-400 to-orange-500 text-black font-black uppercase tracking-[0.4em] text-[12px] hover:shadow-[0_20px_50px_rgba(251,191,36,0.4)] transition-all duration-500 active:scale-95">
                                <span wire:loading.remove class="relative z-10 flex items-center gap-3">
                                    Bắt đầu quét Website ➔
                                </span>
                                <span wire:loading class="relative z-10 flex items-center justify-center gap-4">
                                    <svg class="animate-spin h-5 w-5" fill="none" viewBox="0 0 24 24">
                                        <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor"
                                            stroke-width="4"></circle>
                                        <path class="opacity-75" fill="currentColor"
                                            d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z">
                                        </path>
                                    </svg>
                                    Đang truy vấn dữ liệu...
                                </span>
                            </button>
                        @else
                            <div
                                class="px-10 py-5 rounded-[2rem] bg-emerald-500/10 text-emerald-400 border border-emerald-500/20 text-sm font-black uppercase tracking-[0.3em] flex items-center gap-4 shadow-2xl">
                                <span class="w-3 h-3 rounded-full bg-emerald-400 animate-ping"></span>
                                Đã xác minh thành công
                            </div>
                        @endif

                        <a href="/"
                            class="text-[9px] font-black text-slate-600 uppercase tracking-[0.5em] hover:text-amber-400 transition-colors duration-300">Quay
                            về trang chủ</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>