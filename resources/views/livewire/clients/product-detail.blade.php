<div class="bg-[#FAFBFC] min-h-screen pb-20 selection:bg-amber-200 text-slate-900">
    <div class="max-w-7xl mx-auto px-6 pt-10">
        <a href="{{ route('home') }}"
            class="inline-flex items-center italic text-slate-500 hover:text-amber-500 transition-all font-black group text-[15px] uppercase">
            <div
                class="p-2.5 bg-white rounded-xl shadow-sm border border-slate-100 mr-4 group-hover:border-amber-200 transition-colors">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none"
                    stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round">
                    <path d="m15 18-6-6 6-6" />
                </svg>
            </div>
            Trở về Nhà
        </a>
    </div>

    <main class="max-w-7xl mx-auto px-6 py-12">
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-12 items-start">

            {{-- CỘT TRÁI: VISUAL & CONTENT --}}
            <div class="lg:col-span-8 space-y-12">

                {{-- KHU VỰC TRƯNG BÀY ẢNH (Hiệu ứng cuộn Portfolio) --}}
                <div class="relative group">
                    <div
                        class="bg-white p-4 rounded-[1rem] shadow-[0_40px_100px_-20px_rgba(0,0,0,0.04)] border border-slate-100 relative z-10 overflow-hidden h-[480px]">
                        @if($listing->img_desktop)
                            <div
                                class="w-full h-full rounded-[1rem] overflow-hidden relative group/scroll border border-slate-50">
                                <img src="{{ asset('storage/' . $listing->img_desktop) }}"
                                    class="w-full h-auto transition-transform duration-[8000ms] ease-in-out group-hover/scroll:-translate-y-[calc(100%-448px)]">
                            </div>
                        @else
                            <div
                                class="w-full h-full bg-slate-50 rounded-[1 rem] flex items-center justify-center italic text-slate-400 font-black uppercase text-[10px]">
                                No Desktop Preview
                            </div>
                        @endif
                    </div>

                    {{-- Màn hình Mobile Overlay --}}
                    <div
                        class="absolute -bottom-10 -right-6 w-[210px] h-[420px] rounded-[2.5rem] overflow-hidden shadow-[0_40px_80px_rgba(0,0,0,0.12)] border-[10px] border-white bg-white z-20 hidden md:block group/mobile">
                        @if($listing->img_mobile)
                            <div class="w-full h-full overflow-hidden relative group/mscroll rounded-[2.2rem]">
                                <img src="{{ asset('storage/' . $listing->img_mobile) }}"
                                    class="w-full h-auto transition-transform duration-[6000ms] ease-in-out group-hover/mscroll:-translate-y-[calc(100%-400px)]">
                            </div>
                        @else
                            <div
                                class="w-full h-full bg-slate-50 flex items-center justify-center italic text-slate-300 text-[9px] font-black uppercase">
                                No Mobile</div>
                        @endif
                    </div>
                </div>

                {{-- NỘI DUNG CHI TIẾT --}}
                <div
                    class="bg-white rounded-[3.5rem] p-12 shadow-[0_4px_40px_rgba(0,0,0,0.01)] border border-slate-100">
                    <div class="flex items-center gap-3 mb-10">
                        <span class="px-5 py-2 bg-amber-400 text-black rounded-xl text-[9px] font-black uppercase ">
                            {{ $listing->category->name ?? 'Premium Web' }}
                        </span>
                        @if($listing->is_verified)
                            <span
                                class="px-5 py-2 bg-emerald-50 text-emerald-600 rounded-xl text-[9px] font-black uppercase  border border-emerald-100 flex items-center gap-2">
                                <svg class="w-3 h-3" fill="currentColor" viewBox="0 0 20 20">
                                    <path
                                        d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293l-4 4a1 1 0 01-1.414 0l-2-2a1 1 0 111.414-1.414L9 10.586l3.293-3.293a1 1 0 111.414 1.414z" />
                                </svg>
                                Verified
                            </span>
                        @endif
                    </div>

                    <h1
                        class="text-5xl font-black text-slate-900 leading-[1.1] uppercase italic mb-12 italic drop-shadow-sm">
                        {{ $listing->title }}
                    </h1>

                    {{-- Spec Grid - Phong cách nhãn trang Create --}}
                    <div class="grid grid-cols-2 md:grid-cols-4 gap-6 mb-16">
                        <div
                            class="p-6 rounded-[2rem] bg-slate-50/50 border border-slate-100 group hover:border-amber-400/30 transition-colors">
                            <span class="text-[9px] font-black text-slate-400 uppercase  block mb-3">Hệ
                                quản trị</span>
                            <span class="text-xs font-bold text-slate-700 ">{{ $listing->cms ?? 'Custom Code' }}</span>
                        </div>
                        <div
                            class="p-6 rounded-[2rem] bg-slate-50/50 border border-slate-100 group hover:border-amber-400/30 transition-colors">
                            <span class="text-[9px] font-black text-slate-400 uppercase  block mb-3">Hosting</span>
                            <span class="text-xs font-bold text-slate-700 ">{{ $listing->hosting ?? 'Global' }}</span>
                        </div>
                        <div
                            class="p-6 rounded-[2rem] bg-slate-50/50 border border-slate-100 group hover:border-amber-400/30 transition-colors">
                            <span class="text-[9px] font-black text-slate-400 uppercase  block mb-3">Stack</span>
                            <span
                                class="text-xs font-bold text-slate-700 ">{{ $listing->programming_language ?? 'PHP' }}</span>
                        </div>
                        <div
                            class="p-6 rounded-[2rem] bg-slate-50/50 border border-slate-100 group hover:border-amber-400/30 transition-colors">
                            <span class="text-[9px] font-black text-slate-400 uppercase  block mb-3">Traffic</span>
                            <span
                                class="text-xs font-bold text-slate-700 ">{{ $listing->traffic_source ?? 'Organic' }}</span>
                        </div>
                    </div>

                    <div class="space-y-8">
                        <h3 class="text-[10px] font-black text-amber-500 uppercase">Project description
                        </h3>
                        <div
                            class="text-slate-500 leading-relaxed text-lg font-medium whitespace-pre-line bg-slate-50/30 p-10 rounded-[2.5rem] border border-slate-100/50 italic">
                            {{ $listing->description ?? 'Website được thiết kế tối ưu, sẵn sàng bàn giao và vận hành ngay lập tức.' }}
                        </div>
                    </div>
                </div>
            </div>

            {{-- CỘT PHẢI: FINANCIALS --}}
            <div class="lg:col-span-4 space-y-8 lg:sticky lg:top-8">

                {{-- Card Giá --}}
                <div
                    class="bg-[#fffca3] rounded-[2rem] p-10 border border-slate-100 shadow-xl shadow-slate-200/40 relative overflow-hidden group">
                    <div class="absolute top-0 right-0 w-32 h-32 bg-amber-400/5 blur-[60px] rounded-full"></div>

                    <span class="text-slate-400 text-[11px] font-black uppercase  mb-6 block text-center">Giá
                        sở hữu trọn gói</span>
                    <div class="flex items-baseline justify-center gap-2 mb-6">
                        <span class="text-3xl font-black text-slate-900  italic">
                            {{ number_format($listing->monthly_profit * 24) }}
                        </span>
                        <span class="text-amber-500 font-black text-sm uppercase  italic">VNĐ</span>
                    </div>

                    <div class="space-y-4">
                        <button
                            class="w-full bg-gradient-to-r from-amber-400 to-orange-500 text-white py-2 rounded-2xl font-black text-[12px] uppercase  transition-all transform hover:shadow-[0_20px_50px_rgba(251,191,36,0.25)] hover:-translate-y-1 active:scale-95">
                            Giao dịch ngay ➔
                        </button>
                        <button
                            class="w-full bg-white border border-slate-200 text-slate-500 py-2 rounded-2xl font-black text-[12px] uppercase  transition-all hover:bg-slate-50">
                            Liên hệ thương lượng
                        </button>
                    </div>
                </div>

                {{-- Báo cáo vận hành --}}
                <div class="bg-white rounded-[3.5rem] p-10 border border-slate-100 shadow-sm space-y-10">
                    <h4 class="text-[9px] font-black text-slate-400 uppercase  flex items-center gap-3">
                        <span
                            class="w-2 h-2 bg-amber-400 rounded-full animate-pulse shadow-[0_0_10px_rgba(251,191,36,0.5)]"></span>
                        Analytics Report
                    </h4>

                    <div class="space-y-8">
                        <div class="flex justify-between items-center group">
                            <span class="text-slate-500 text-[10px] font-black uppercase ">Doanh
                                thu</span>
                            <span
                                class="font-black text-slate-900 text-xl ">+{{ number_format($listing->monthly_revenue) }}đ</span>
                        </div>
                        <div class="flex justify-between items-center group">
                            <span class="text-slate-500 text-[10px] font-black uppercase ">Chi
                                phí</span>
                            <span
                                class="font-black text-red-500 text-xl ">-{{ number_format($listing->operating_cost) }}đ</span>
                        </div>
                        <div class="pt-8 border-t border-slate-50 flex justify-between items-center">
                            <span class="text-amber-600 text-[10px] font-black uppercase ">Lợi nhuận
                                ròng</span>
                            <span
                                class="font-black text-3xl text-emerald-500 ">{{ number_format($listing->monthly_profit) }}đ</span>
                        </div>
                    </div>
                </div>

                {{-- Seller Profile --}}
                <div
                    class="bg-white rounded-[3rem] p-8 flex items-center gap-6 border border-slate-100 group hover:bg-slate-50/50 transition-colors">
                    <div class="flex items-center gap-4">
                        <x-user-avatar :user="$listing->user" size="w-16 h-16" textSize="text-2xl" />
                        <div>
                            <h3 class="font-black text-slate-900">{{ $listing->user->name }}</h3>
                            <p class="text-[10px] text-slate-400 uppercase tracking-widest">Người bán uy tín</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        {{-- 🐝 SECTION: RELATED PROJECTS --}}
        <div class="mt-20 pt-20 border-t border-slate-100">
            <div class="flex items-center justify-between mb-12">
                <div class="space-y-2">
                    <h2 class="text-[9px] font-black text-amber-500 uppercase tracking-[0.5em]">Discovery</h2>
                    <p class="text-3xl font-black text-slate-900 uppercase tracking-tighter italic">Sản phẩm liên quan
                    </p>
                </div>
                <a href="{{ route('home') }}"
                    class="text-[9px] font-black text-slate-400 uppercase tracking-[0.4em] hover:text-amber-500 transition-colors">
                    Xem tất cả ➔
                </a>
            </div>

            {{-- DÙNG COMPONENT CỦA BÀ ĐÂY NHEN MÁ --}}
            <div class="grid grid-cols-1 md:grid-cols-4 gap-10">
                @foreach($relatedListings as $item)
                    <livewire:components.listing-card :listing="$item" :key="$item->id" />
                @endforeach
            </div>
        </div>
    </main>

</div>