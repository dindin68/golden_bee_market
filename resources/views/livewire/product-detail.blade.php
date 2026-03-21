<div class="bg-[#f1fcf9] min-h-screen font-['Be_Vietnam_Pro'] pb-20">
    {{-- Thanh quay lại --}}
    <div class="max-w-6xl mx-auto px-6 pt-10">
        <a href="{{ route('home') }}"
            class="inline-flex items-center text-gray-600 hover:text-pink-600 transition-colors font-bold uppercase text-sm">
            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none"
                stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round" class="mr-2">
                <path d="m15 18-6-6 6-6" />
            </svg>
            Quay lại danh sách
        </a>
    </div>

    <main class="max-w-6xl mx-auto px-6 py-12">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-start">
            {{-- Ảnh Website --}}
            <div class="bg-white p-2 rounded-2xl shadow-xl border border-gray-100 overflow-hidden">
                <img src="{{ asset('storage/' . $listing->image) }}" alt="{{ $listing->title }}"
                    class="w-full h-auto rounded-xl">
            </div>

            {{-- Thông tin chi tiết --}}
            <div class="space-y-6">
                <div
                    class="inline-block px-4 py-1 bg-pink-100 text-pink-600 rounded-full text-xs font-bold uppercase tracking-widest">
                    {{ $listing->category->name ?? 'Mẫu Website' }}
                </div>

                <h1 class="text-4xl font-black text-gray-900 leading-tight uppercase">{{ $listing->title }}</h1>

                <div class="flex items-center gap-4 py-4 border-y border-gray-200">
                    <span class="text-3xl font-black text-[#ff4b2b]">{{ number_format($listing->price) }}đ</span>
                    @if($listing->is_verified)
                        <span
                            class="bg-blue-100 text-blue-600 px-3 py-1 rounded-lg text-xs font-bold flex items-center gap-1">
                            <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                                <path
                                    d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293l-4 4a1 1 0 01-1.414 0l-2-2a1 1 0 111.414-1.414L9 10.586l3.293-3.293a1 1 0 111.414 1.414z">
                                </path>
                            </svg>
                            ĐÃ XÁC MINH
                        </span>
                    @endif
                </div>

                <p class="text-gray-600 leading-relaxed text-lg">
                    {{ $listing->description ?? 'Mẫu website được thiết kế chuẩn SEO, giao diện hiện đại, dễ dàng tùy chỉnh theo nhu cầu doanh nghiệp.' }}
                </p>

                <div class="grid grid-cols-2 gap-4 pt-6">
                    <button
                        class="bg-gradient-to-r from-[#ff8c3a] to-[#ff4b2b] text-white py-4 rounded-xl font-bold shadow-lg hover:scale-105 transition-all">
                        MUA NGAY BÂY GIỜ
                    </button>
                    {{-- Chỗ này bà có thể link tới file demo.html cũ nè --}}
                    <a href="/demo/{{ $listing->id }}"
                        class="flex items-center justify-center border-2 border-gray-300 py-4 rounded-xl font-bold hover:bg-white transition-all text-gray-700">
                        XEM DEMO THỰC TẾ
                    </a>
                </div>
            </div>
        </div>

        {{-- Website cùng chuyên mục --}}
        <div class="mt-24 border-t border-gray-200 pt-16">
            <h3 class="text-2xl font-bold text-pink-500 mb-8 uppercase tracking-wider">Mẫu website cùng chuyên mục</h3>
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 gap-6">
                @foreach($relatedListings as $rel)
                    <a href="/detail/{{ $rel->id }}"
                        class="group bg-white rounded-xl shadow-sm hover:shadow-lg border border-gray-100 overflow-hidden transition-all">
                        <div class="aspect-video bg-gray-100 overflow-hidden">
                            <img src="{{ asset('storage/' . $rel->image) }}"
                                class="w-full h-full object-cover group-hover:scale-110 transition-duration-500">
                        </div>
                        <div class="p-4">
                            <h4 class="font-bold text-gray-800 line-clamp-1 uppercase text-sm">{{ $rel->title }}</h4>
                            <p class="text-pink-500 font-bold mt-2">{{ number_format($rel->price) }}đ</p>
                        </div>
                    </a>
                @endforeach
            </div>
        </div>
    </main>
</div>