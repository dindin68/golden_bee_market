{{-- Class 'group' bao ngoài là chìa khóa để xử lý hover cho các phần tử con --}}
<div
    class="group bg-white rounded-2xl shadow-sm hover:shadow-2xl transition-all duration-500 border border-gray-100 overflow-hidden flex flex-col h-full relative">

    {{-- PHẦN ẢNH VỚI HIỆU ỨNG HOVER --}}
    <div class="relative aspect-[4/3] overflow-hidden bg-gray-100">
        {{-- Ảnh sản phẩm --}}
        <img src="{{ $listing->image ? asset('storage/' . $listing->image) : 'https://placehold.co/600x400/FF8C3A/white?text=Golden+Bee' }}"
            alt="{{ $listing->title }}"
            class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-700">

        {{-- Tích xanh Verified (nếu có) - tui dời nó xuống góc để không bị che nút --}}
        @if($listing->is_verified)
            <div
                class="absolute bottom-3 right-3 z-10 bg-blue-500/90 backdrop-blur-sm text-white text-[10px] px-2.5 py-1 rounded-full font-bold shadow-lg flex items-center gap-1">
                <svg class="w-3 h-3" fill="currentColor" viewBox="0 0 20 20">
                    <path
                        d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293l-4 4a1 1 0 01-1.414 0l-2-2a1 1 0 111.414-1.414L9 10.586l3.293-3.293a1 1 0 111.414 1.414z">
                    </path>
                </svg>
                VERIFIED
            </div>
        @endif

        {{-- LỚP PHỦ CHỨA NÚT BẤM (Mặc định ẩn, group-hover sẽ hiện) --}}
        <div
            class="absolute inset-0 bg-black/60 flex flex-col items-center justify-center gap-4 p-6 opacity-0 group-hover:opacity-100 transition-opacity duration-300 z-20 backdrop-blur-[2px]">

            {{-- Nút 1: Xem Live (Màu cam y hình mẫu) --}}
            {{-- Chỗ này bà thay bằng link demo thực tế nha --}}
            <a href="{{ $listing->demo_url ?? '#' }}" target="_blank"
                class="flex items-center justify-center gap-2 bg-[#ff8c3a] text-white w-full py-3 rounded-xl font-bold hover:scale-105 transition active:scale-95 shadow-lg">
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none"
                    stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                    class="lucide lucide-monitor">
                    <rect width="20" height="14" x="2" y="3" rx="2" />
                    <line x1="8" x2="16" y1="21" y2="21" />
                    <line x1="12" x2="12" y1="17" y2="21" />
                </svg>
                Xem Live
            </a>

            {{-- Nút 2: Chi tiết web mẫu (Trong suốt bo viền y hình mẫu) --}}
            <a href="{{ route('product.detail', $listing->id) }}"
                class="flex items-center justify-center gap-2 border-2 border-white text-white w-full py-3 rounded-xl font-bold bg-white/10 hover:bg-white hover:text-gray-900 transition shadow-lg backdrop-blur-sm">
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none"
                    stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                    class="lucide lucide-arrow-right">
                    <path d="M5 12h14" />
                    <path d="m12 5 7 7-7 7" />
                </svg>
                Chi tiết web mẫu
            </a>
        </div>
    </div>

    {{-- PHẦN THÔNG TIN BÊN DƯỚI (Giữ nguyên cho đẹp) --}}
    <div class="p-5 flex-1 flex flex-col bg-white z-10 relative">
        <h3 class="font-bold text-gray-800 mb-3 text-lg line-clamp-2 uppercase leading-tight">{{ $listing->title }}</h3>

        {{-- Phần Tag Ngành nghề (Tui giả lập, bà ráp data thật vào nha) --}}
        <div class="flex flex-wrap gap-2 mb-4 mt-1">
            <span
                class="bg-gray-100 text-gray-600 text-[11px] px-2.5 py-1 rounded font-medium uppercase tracking-wider">
                {{ $listing->category->name ?? 'Mẫu Website' }}
            </span>
            {{-- Nếu bà có nhiều tag, lặp ở đây --}}
            <span
                class="bg-gray-100 text-gray-600 text-[11px] px-2.5 py-1 rounded font-medium uppercase tracking-wider">
                DỊCH VỤ
            </span>
        </div>

        <div class="mt-auto flex justify-between items-end border-t border-gray-100 pt-4">
            <div class="flex flex-col">
                <span class="text-xs text-gray-400 font-medium">Giá bán:</span>
                <span
                    class="text-[#ff4b2b] font-black text-xl leading-none mt-1">{{ number_format($listing->price) }}đ</span>
            </div>
        </div>
    </div>
</div>