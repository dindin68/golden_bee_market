<div class="relative min-h-screen">
    <div class="text-center bg-gradient-to-b from-[#231d00] to-[#594f3c] mb-10 py-16">
        <h1 class="text-gray-400 font-bold uppercase tracking-[0.2em] text-sm mb-3">Khám phá kho giao diện</h1>
        <div class="inline-block text-4xl md:text-5xl font-black text-white uppercase tracking-tighter mb-10">
            Tất cả
            <span class="text-transparent bg-clip-text bg-gradient-to-r from-[#ffce3a] to-[#ff8c3a]">Mẫu Website</span>
        </div>

        {{-- 2. Search + Filters--}}
        <div
            class="flex flex-col lg:flex-row items-stretch bg-white/5 backdrop-blur-md border border-white/10 rounded-[1.5rem] overflow-hidden shadow-2xl mx-22">

            {{-- 1. Search Section --}}
            <div
                class="relative flex flex-[2.5] items-center group px-6 border-b lg:border-b-0 lg:border-r border-white/10">
                <div class="mr-3 text-amber-400/80 group-focus-within:text-amber-400 transition-colors duration-500">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="1.5">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M21 21l-5.197-5.197m0 0A7.5 7.5 0 105.196 5.196a7.5 7.5 0 0010.607 10.607z" />
                    </svg>
                </div>
                <input wire:model.live.debounce.300ms="search" type="text" placeholder="Tìm kiếm mẫu website..."
                    class="flex-1 bg-transparent border-none outline-none focus:ring-0 text-white placeholder-gray-600 font-light tracking-wide text-md py-4" />
            </div>

            {{-- 2. Category Section --}}
            <div class="relative flex-1 flex px-1 items-center border-b lg:border-b-0 lg:border-r border-white/10">
                <select wire:model.live="filters.category"
                    class="w-full bg-transparent border-none text-gray-400 font-medium text-sm outline-none cursor-pointer appearance-none focus:ring-0">
                    <option value="" class="bg-[#1E293B]">Tất cả ngành nghề</option>
                    @foreach($categories as $cat)
                        <option value="{{ $cat->id }}" class="bg-[#1E293B]">{{ $cat->name }}</option>
                    @endforeach
                </select>
            </div>

            {{-- 3. Verified Section --}}
            <div class="relative flex-1 px-2 items-center hidden lg:flex lg:border-r border-white/10">
                <select wire:model.live="filters.is_verified"
                    class="w-full bg-transparent border-none text-amber-400/80 font-medium text-sm outline-none cursor-pointer appearance-none focus:ring-0">
                    <option value="" class="bg-[#1E293B]">Mọi trạng thái</option>
                    <option value="1" class="bg-[#1E293B]">Đã xác minh</option>
                </select>
            </div>

            {{-- 4. Nút Tìm kiếm--}}
            <button
                class="px-12 bg-gradient-to-r from-[#ffce3a] to-[#ff8c3a] text-white font-black uppercase tracking-[0.2em] text-[15px] hover:opacity-90 transition-all active:scale-95 flex items-center justify-center">
                TÌM KIẾM
            </button>
        </div>
    </div>

    <div class="relative max-w-6xl mx-auto px-20 tracking-tight py-2">
        {{-- 3. Listing Grid --}}
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 gap-8">
            @forelse($listings as $item)
                @livewire('components.listing-card', ['listing' => $item], key('home-' . $item->id))
            @empty
                <div class="col-span-full text-center py-20 bg-white/5 rounded-[3rem] border border-dashed border-white/10">
                    <div class="text-6xl mb-6 opacity-30">🐝</div>
                    <p class="text-xl font-bold text-gray-500 uppercase tracking-widest">Hông tìm thấy con ong nào hết bà
                        ơi!</p>
                </div>
            @endforelse
        </div>

        {{-- Load More --}}
        @if($listings->count() >= $perPage)
            <div class="flex justify-center mt-20">
                <button wire:click="loadMore"
                    class="group flex items-center gap-4 px-12 py-4 font-black text-white border-2 border-white/10 rounded-full hover:bg-white hover:text-black transition-all duration-500 shadow-xl">
                    XEM THÊM MẪU WEBSITE <span class="group-hover:translate-x-2 transition-transform">➔</span>
                </button>
            </div>
        @endif
    </div>

    {{-- 4. Banner Section --}}
    <div class="relative flex flex-col items-center py-32 mt-32 text-center overflow-hidden"
        style="background: radial-gradient(circle at center, #41116b 0%, #2D0353 100%);">

        {{-- Quầng sáng --}}
        <div
            class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 w-full h-full bg-blue-500/5 blur-[150px] pointer-events-none">
        </div>

        <div class="relative z-10 space-y-4">
            <span class="text-amber-400 font-black tracking-[0.3em] uppercase text-xs">Customization Experience</span>
            <h1 class="text-4xl md:text-6xl font-black text-white uppercase tracking-tighter drop-shadow-2xl">
                Test thoải mái <br>
                <span class="text-transparent bg-clip-text bg-gradient-to-b from-[#ffce3a] to-[#ff8c3a]">Custom thả
                    ga</span>
            </h1>
            <p class="max-w-xl mx-auto text-gray-300 font-medium leading-relaxed opacity-80 pt-4">
                Với hàng trăm mẫu website chuẩn SEO cho bạn tha hồ lựa chọn, <br>đồng hành cùng bạn đến khi hài lòng thì
                thôi.
            </p>

            {{-- Feature Blocks--}}
            <div class="flex flex-col md:flex-row justify-center gap-8 mt-16 px-6 max-w-5xl mx-auto">
                <div
                    class="flex-1 bg-white/5 backdrop-blur-md border border-white/10 p-8 rounded-[2.5rem] hover:bg-white/10 transition-all group">
                    <img src="{{ asset('images/component_img/screen.png') }}"
                        class="w-full h-auto mb-6 rounded-2xl shadow-2xl group-hover:scale-105 transition-transform" />
                    <h4 class="font-black text-amber-400 uppercase tracking-widest text-sm mb-2">Trải nghiệm thực tế
                    </h4>
                    <p class="text-xs text-gray-400 leading-relaxed">Linh hoạt thay đổi visual và tính năng chuẩn
                        Responsive trên mọi thiết bị.</p>
                </div>
                <div
                    class="flex-1 bg-white/5 backdrop-blur-md border border-white/10 p-8 rounded-[2.5rem] hover:bg-white/10 transition-all group">
                    <img src="{{ asset('images/component_img/page.png') }}"
                        class="w-full h-auto mb-6 rounded-2xl shadow-2xl group-hover:scale-105 transition-transform" />
                    <h4 class="font-black text-amber-400 uppercase tracking-widest text-sm mb-2">Đa dạng ngành nghề</h4>
                    <p class="text-xs text-gray-400 leading-relaxed">Mẫu website chuyên biệt cho từng lĩnh vực, đáp ứng
                        mọi nhu cầu kinh doanh.</p>
                </div>
            </div>
        </div>
    </div>
</div>