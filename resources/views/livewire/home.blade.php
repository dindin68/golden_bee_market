<div class="relative py-16">
    <div class="relative items-center max-w-6xl mx-auto px-6 tracking-wider py-16">
        <div class="text-center font-bold sm:text-2xl m-4 md:text-3xl">
            <h1 class="my-1 text-gray-700">Danh sách tất cả</h1>
            <div class="rounded-md text-white bg-pink-500 inline-block px-4 py-3 uppercase">MẪU WEBSITE</div>
        </div>

        <div class="flex sm:flex-row flex-col items-stretch border-2 border-gray-300 rounded-lg bg-white shadow-sm">
            <div class="relative flex flex-1 items-center sm:p-0 p-2 border-r border-gray-200">
                <div class="mx-4 text-gray-400">🔍</div>
                <div class="flex-1">
                    <input wire:model.live.debounce.300ms="search" type="text"
                        placeholder="Tìm mẫu website theo từ khoá"
                        class="w-full outline-none text-gray-600 placeholder-gray-400 py-3" />
                </div>
            </div>

            <div class="relative mx-auto justify-end sm:p-0 p-2 min-w-[200px]">
                <details class="group">
                    <summary class="flex items-center gap-2 cursor-pointer px-4 py-3 list-none">
                        <span class="text-gray-700 font-medium italic">
                            @if($categories_id)
                                {{ $categories->firstWhere('id', $categories_id)->name ?? 'Tất cả ngành' }}
                            @else
                                Tất cả ngành
                            @endif
                        </span>
                        <div class="transition-transform group-open:rotate-180 text-purple-500">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24"
                                fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round">
                                <path d="m6 9 6 6 6-6" />
                            </svg>
                        </div>
                    </summary>

                    <div
                        class="absolute top-full right-0 w-full md:w-64 bg-white shadow-2xl rounded-b-xl z-50 p-2 mt-1 border border-gray-100">
                        <div wire:click="setCategory('')"
                            class="px-4 py-2 hover:bg-pink-50 rounded-lg cursor-pointer text-sm text-gray-600">
                            Tất cả ngành nghề
                        </div>

                        <hr class="my-1 border-gray-100">

                        @foreach($categories as $cat)
                            <div wire:click="setCategory({{ $cat->id }})"
                                class="px-4 py-2 hover:bg-orange-50 rounded-lg cursor-pointer text-sm text-gray-700 font-medium {{ $categories_id == $cat->id ? 'bg-orange-100 text-orange-600' : '' }}">
                                {{ $cat->name }}
                            </div>
                        @endforeach
                    </div>
                </details>
            </div>

            <button
                class="bg-gradient-to-r from-[#ff8c3a] to-[#ff4b2b] text-white px-8 py-4 rounded-r-lg font-bold hover:opacity-90 transition">
                TÌM KIẾM
            </button>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 gap-6 mt-12">
            @forelse($listings as $item)
                <div
                    class="group bg-white rounded-xl shadow-sm hover:shadow-xl transition-all border border-gray-100 overflow-hidden">
                    <div class="relative aspect-video bg-gray-200">
                        <img src="{{ asset('storage/' . $item->image) }}" class="w-full h-full object-cover">
                        @if($item->is_verified)
                            <span
                                class="absolute top-2 right-2 bg-blue-500 text-white text-[10px] px-2 py-1 rounded-full font-bold">VERIFIED</span>
                        @endif
                    </div>
                    <div class="p-4">
                        <h3 class="font-bold text-gray-800 mb-2 truncate">{{ $item->title }}</h3>
                        <div class="flex justify-between items-center">
                            <span class="text-pink-500 font-bold">{{ number_format($item->price) }}đ</span>
                            <a href="{{ route('product.detail', $item->id) }}"
                                class="text-xs bg-gray-100 px-3 py-1 rounded hover:bg-orange-500 hover:text-white transition">
                                Chi tiết
                            </a>
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-span-full text-center py-10 text-gray-400">Hông có website nào hết bà ơi! 🐝</div>
            @endforelse
        </div>

        @if($listings->count() >= $perPage)
            <div class="text-center mt-12 flex justify-center">
                <button wire:click="loadMore"
                    class="flex items-center gap-2 px-10 py-3 border-2 border-pink-500 text-pink-500 font-bold rounded-full hover:bg-pink-500 hover:text-white transition-all shadow-lg">
                    XEM THÊM MẪU WEBSITE KHÁC ➔
                </button>
            </div>
        @endif
    </div>

    <div class="relative items-center text-center py-24 mt-24 bg-[#2D0353] flex flex-col overflow-hidden select-none"
        style="background: radial-gradient(circle at center, #41116b 0%, #2D0353 100%);">

        {{-- Ảnh Background nền --}}
        <img src="{{ asset('images/background_img/image.png') }}" alt="background image"
            class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 w-[180%] md:w-[120%] max-w-none opacity-15 pointer-events-none" />

        <div class="relative z-10 flex flex-col items-center">
            {{-- Ảnh nhãn Free bay lơ lửng --}}
            <div class="hidden md:block absolute -left-20 md:-left-35 top-0 w-20 md:w-32 rotate-[-15deg] animate-pulse">
                <img src="{{ asset('images/component_img/free.png') }}" alt="Free" class="w-full h-auto">
            </div>

            <span class="text-white text-sm md:text-lg font-semibold mb-5 opacity-90 tracking-wide">
                Trải nghiệm trang trí website cho riêng bạn!
            </span>

            <h1 class="text-white text-3xl sm:text-5xl font-bold uppercase leading-[0.9] drop-shadow-xl m-2">
                Test thoải mái
            </h1>

            <h1
                class="bg-gradient-to-b from-[#ffce3a] to-[#ff8c3a] bg-clip-text text-transparent text-3xl sm:text-5xl font-bold uppercase leading-[0.9] mt-3 drop-shadow-[0_10px_10px_rgba(0,0,0,0.3)]">
                Custom thả ga
            </h1>

            <h2 class="m-6 text-white max-w-lg leading-relaxed">
                Với hàng trăm mẫu website chuẩn SEO cho bạn tha hồ lựa chọn, đến khi hài lòng thì thôi
            </h2>
        </div>

        {{-- Khối tính năng mô tả (Ảnh Screen & Page) --}}
        <div class="relative z-10 flex sm:flex-row flex-col justify-center gap-10 mt-10 px-6 max-w-6xl">
            <div class="text-white text-center max-w-xs">
                <img src="{{ asset('images/component_img/screen.png') }}" alt="Screen"
                    class="w-full h-auto mb-6 shadow-2xl rounded-lg">
                <span class="font-bold mb-3 block text-yellow-400">Cơ hội trải nghiệm giao diện thực tế</span>
                <span class="text-sm opacity-80 leading-relaxed">Linh hoạt thay đổi visual, tính năng và giao diện chuẩn
                    responsive trên mọi thiết bị</span>
            </div>

            <div class="text-white text-center max-w-xs">
                <img src="{{ asset('images/component_img/page.png') }}" alt="Page"
                    class="w-full h-auto mb-6 shadow-2xl rounded-lg">
                <span class="font-bold mb-3 block text-yellow-400">Website với đa dạng ngành nghề</span>
                <span class="text-sm opacity-80 leading-relaxed">Mẫu website đa dạng, chuyên biệt cho từng lĩnh vực, đảm
                    bảo đáp ứng đa dạng nhu cầu</span>
            </div>
        </div>
    </div>
</div>