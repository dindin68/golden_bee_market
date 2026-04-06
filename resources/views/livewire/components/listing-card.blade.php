{{-- Khung ngoài: bóp gọn h-full và bo góc lại tí cho thanh thoát --}}
<div
    class="group bg-white rounded-[1rem] shadow-sm hover:shadow-xl transition-all duration-500 border border-slate-100 overflow-hidden flex flex-col relative">

    {{-- PHẦN ẢNH: Tui đổi sang aspect-[3/4] để giảm chiều cao --}}
    <div class="relative aspect-[6/5] overflow-hidden bg-slate-50">
        @if($listing->img_desktop)
            <div class="w-full h-full rounded-[1rem] overflow-hidden relative group/scroll border border-slate-50">
                <img src="{{ asset('storage/' . $listing->img_desktop) }}"
                    class="w-full h-auto transition-transform duration-[8000ms] ease-in-out group-hover/scroll:-translate-y-[calc(100%-448px)]">
            </div>
        @else
            <img src="{{ $listing->image ? asset('storage/' . $listing->image) : 'https://placehold.co/600x800/FF8C3A/white?text=Golden+Bee' }}"
                alt="{{ $listing->title }}"
                class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-1000">
        @endif
        {{-- Badge Verified --}}
        @if($listing->is_verified)
            <div
                class="absolute top-3 right-3 z-10 bg-blue-500 text-white text-[8px] px-2 py-1 rounded-full font-black shadow-md tracking-wider">
                VERIFIED
            </div>
        @else
            <span
                class="absolute top-3 right-3 z-10 bg-amber-500 text-white text-[8px] px-2 py-1 rounded-full font-black shadow-md tracking-wider">PENDING</span>
        @endif

        {{-- Lớp phủ nút bấm--}}
        <div
            class="absolute inset-0 bg-black/40 flex flex-col items-center justify-center gap-2 p-6 opacity-0 group-hover:opacity-100 transition-opacity duration-500 z-20 backdrop-blur-[2px]">
            <a href="{{ $listing->demo_url ?? '#' }}" target="_blank"
                class="flex items-center justify-center gap-2 bg-amber-400 text-black w-full py-2.5 rounded-xl font-black text-[9px] uppercase tracking-widest hover:bg-white transition shadow-xl">
                Xem Live
            </a>
            <a href="{{ route('product.detail', $listing->id) }}"
                class="flex items-center justify-center gap-2 border border-white/30 text-white w-full py-2.5 rounded-xl font-bold text-[9px] uppercase tracking-widest bg-white/10 hover:bg-white/20 transition backdrop-blur-md">
                Chi tiết
            </a>
        </div>
    </div>

    {{-- PHẦN THÔNG TIN --}}
    <div class="p-4 flex flex-col bg-white">
        <div class="mb-2">
            <h3
                class="font-black text-slate-800 text-xs line-clamp-1 uppercase tracking-tight group-hover:text-amber-500 transition-colors">
                {{ $listing->title }}
            </h3>
            <p class="text-[9px] text-slate-400 font-bold uppercase tracking-widest mt-0.5">
                {{ $listing->category->name ?? 'Mẫu Website' }}
            </p>
        </div>

        <div class="flex justify-between items-center pt-3 border-t border-slate-50">
            <div class="flex flex-col">
                <span class="text-[8px] text-slate-400 font-black uppercase tracking-tighter leading-none">Price</span>
                <span
                    class="text-slate-900 font-black text-base tracking-tighter">{{ number_format($listing->monthly_profit * 24) }}đ</span>
            </div>
            {{-- Icon nhỏ gọn --}}
            <div
                class="w-7 h-7 rounded-full border border-slate-100 flex items-center justify-center text-slate-300 group-hover:border-amber-400 group-hover:text-amber-500 transition-all">
                <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M17 8l4 4m0 0l-4 4m4-4H3" />
                </svg>
            </div>
        </div>
    </div>
</div>