<div class="relative py-16">
    <div class="relative max-w-6xl mx-auto px-6 tracking-wider py-16">

        {{-- Title --}}
        <div class="text-center font-bold m-4 sm:text-2xl md:text-3xl">
            <h1 class="my-1 text-gray-700">Danh sách tất cả</h1>
            <div class="inline-block px-4 py-3 mt-2 rounded-md bg-pink-500 text-white uppercase">MẪU WEBSITE</div>
        </div>

        {{-- Search + Filters --}}
        <div
            class="flex flex-col sm:flex-row items-stretch bg-white border-2 border-gray-300 rounded-lg shadow-sm mb-12">

            {{-- Search --}}
            <div class="relative flex flex-[2] items-center border-r border-gray-200 sm:p-0 p-2">
                <div class="mx-4 text-gray-400">🔍</div>
                <input wire:model.live.debounce.300ms="search" type="text" placeholder="Tìm mẫu website theo từ khoá"
                    class="flex-1 w-full py-3 outline-none text-gray-600 placeholder-gray-400" />
            </div>

            {{-- Category --}}
            <div class="relative flex-1 border-r border-gray-200">
                <details class="group w-full h-full">
                    <summary class="flex items-center justify-between gap-2 px-4 py-3 cursor-pointer h-full">
                        <span class="italic font-medium text-gray-700 truncate">
                            @if($filters['category'])
                                {{ $categories->firstWhere('id', $filters['category'])->name ?? 'Tất cả ngành' }}
                            @else
                                Tất cả ngành
                            @endif
                        </span>

                        <div class="text-purple-500 transition-transform group-open:rotate-180">
                            <svg width="20" height="20" fill="none" stroke="currentColor" stroke-width="2"
                                stroke-linecap="round" stroke-linejoin="round">
                                <path d="m6 9 6 6 6-6" />
                            </svg>
                        </div>
                    </summary>

                    <div
                        class="absolute top-full left-0 w-64 mt-1 p-2 z-50 bg-white border border-gray-100 rounded-b-xl shadow-2xl">
                        <div wire:click="setCategory('')"
                            class="px-4 py-2 text-sm text-gray-600 cursor-pointer hover:bg-pink-50 rounded-lg">
                            Tất cả ngành nghề
                        </div>
                        <hr class="my-1 border-gray-100">

                        @foreach($categories as $cat)
                            <div wire:click="setCategory('{{ $cat->id }}')"
                                class="px-4 py-2 text-sm cursor-pointer rounded-lg font-medium
                                                            {{ $filters['category'] == $cat->id ? 'bg-orange-100 text-orange-600' : 'text-gray-700 hover:bg-orange-50' }}">
                                {{ $cat->name }}
                            </div>
                        @endforeach
                    </div>
                </details>
            </div>

            {{-- Verified --}}
            <div class="relative flex-1 border-r border-gray-200">
                <select wire:model.live="filters.is_verified"
                    class="w-full h-full px-4 py-3 bg-transparent text-gray-700 font-medium outline-none cursor-pointer appearance-none">
                    <option value="">Tất cả tin</option>
                    <option value="1">🐝 Đã xác minh</option>
                    <option value="0">Chưa xác minh</option>
                </select>
            </div>

            {{-- Sort --}}
            <div class="relative flex-1 border-r border-gray-200">
                <select wire:model.live="sortField"
                    class="w-full h-full px-4 py-3 bg-transparent text-gray-700 font-medium outline-none cursor-pointer appearance-none">
                    <option value="created_at">Mới nhất</option>
                    <option value="monthly_profit">Lợi nhuận cao</option>
                    <option value="monthly_revenue">Doanh thu cao</option>
                </select>
            </div>

            {{-- Submit --}}
            <button
                class="px-8 py-4 font-bold text-white rounded-r-lg bg-gradient-to-r from-[#ff8c3a] to-[#ff4b2b] hover:opacity-90 transition">
                TÌM KIẾM
            </button>
        </div>

        {{-- Listing Grid --}}
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 gap-8">
            @forelse($listings as $item)
                @livewire('components.listing-card', ['listing' => $item], key('home-' . $item->id))
            @empty
                <div class="col-span-full text-center py-20">
                    <div class="text-6xl mb-4">🐝</div>
                    <p class="text-xl font-medium text-gray-400">Hông tìm thấy mẫu website nào khớp hết bà ơi!</p>
                </div>
            @endforelse
        </div>

        {{-- Load More --}}
        @if($listings->count() >= $perPage)
            <div class="flex justify-center mt-12">
                <button wire:click="loadMore"
                    class="flex items-center gap-2 px-10 py-3 font-bold text-pink-500 border-2 border-pink-500 rounded-full hover:bg-pink-500 hover:text-white transition-all shadow-lg">
                    XEM THÊM MẪU WEBSITE KHÁC ➔
                </button>
            </div>
        @endif
    </div>

    {{-- Banner Section --}}
    <div class="relative flex flex-col items-center py-24 mt-24 text-center bg-[#2D0353] overflow-hidden select-none"
        style="background: radial-gradient(circle at center, #41116b 0%, #2D0353 100%);">

        <img src="{{ asset('images/background_img/image.png') }}"
            class="absolute top-1/2 left-1/2 w-[180%] md:w-[120%] opacity-15 -translate-x-1/2 -translate-y-1/2 pointer-events-none" />

        <div class="relative z-10 flex flex-col items-center">

            <div class="hidden md:block absolute -left-20 md:-left-36 top-0 w-20 md:w-32 rotate-[-15deg] animate-pulse">
                <img src="{{ asset('images/component_img/free.png') }}" class="w-full h-auto" />
            </div>

            <span class="mb-5 text-sm md:text-lg font-semibold text-white tracking-wide opacity-90">
                Trải nghiệm trang trí website cho riêng bạn!
            </span>

            <h1 class="m-2 text-3xl sm:text-5xl font-bold text-white uppercase leading-[0.9] drop-shadow-xl">
                Test thoải mái
            </h1>

            <h1
                class="mt-3 text-3xl sm:text-5xl font-bold uppercase bg-gradient-to-b from-[#ffce3a] to-[#ff8c3a] bg-clip-text text-transparent drop-shadow-[0_10px_10px_rgba(0,0,0,0.3)] leading-[0.9]">
                Custom thả ga
            </h1>

            <h2 class="max-w-lg mt-6 text-white leading-relaxed">
                Với hàng trăm mẫu website chuẩn SEO cho bạn tha hồ lựa chọn, đến khi hài lòng thì thôi
            </h2>
        </div>

        {{-- Feature Blocks --}}
        <div class="relative z-10 flex flex-col sm:flex-row justify-center gap-10 mt-10 px-6 max-w-6xl">
            <div class="max-w-xs text-center text-white">
                <img src="{{ asset('images/component_img/screen.png') }}"
                    class="w-full h-auto mb-6 rounded-lg shadow-2xl" />
                <span class="block mb-3 font-bold text-yellow-400">Cơ hội trải nghiệm giao diện thực tế</span>
                <span class="text-sm opacity-80 leading-relaxed">Linh hoạt thay đổi visual, tính năng và giao diện chuẩn
                    responsive trên mọi thiết bị</span>
            </div>

            <div class="max-w-xs text-center text-white">
                <img src="{{ asset('images/component_img/page.png') }}"
                    class="w-full h-auto mb-6 rounded-lg shadow-2xl" />
                <span class="block mb-3 font-bold text-yellow-400">Website với đa dạng ngành nghề</span>
                <span class="text-sm opacity-80 leading-relaxed">Mẫu website đa dạng, chuyên biệt cho từng lĩnh vực, đáp
                    ứng mọi nhu cầu</span>
            </div>
        </div>

    </div>
</div>