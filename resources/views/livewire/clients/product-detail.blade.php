<div class="bg-[#F8FAFC] min-h-screen font-['Be_Vietnam_Pro'] pb-20">
    {{-- Navigation Quay lại xịn sò --}}
    <div class="max-w-6xl mx-auto px-6 pt-10">
        <a href="{{ route('home') }}"
            class="inline-flex items-center text-gray-600 hover:text-emerald-600 transition-all font-bold group">
            <div class="p-2.5 bg-white rounded-lg shadow-sm mr-3 group-hover:bg-emerald-50 transition-colors">
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none"
                    stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round">
                    <path d="m15 18-6-6 6-6" />
                </svg>
            </div>
            Quay lại danh sách website
        </a>
    </div>

    <main class="max-w-6xl mx-auto px-6 py-12">
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-12 items-start">

            {{-- CỘT TRÁI: Hai màn hình đẹp chet người & Mô tả (2/3) --}}
            <div class="lg:col-span-2 space-y-12">
                {{-- Khu vực trưng bày ảnh 2 màn hình --}}
                <div class="bg-white p-3 rounded-[2.5rem] shadow-xl shadow-gray-200/50 border border-white relative">

                    {{-- Ảnh chính (Nền phía dưới) --}}
                    <div
                        class="rounded-[2rem] overflow-hidden shadow-inner border border-slate-100 aspect-video bg-slate-50">
                        @if($listing->image)
                            <img src="{{ asset('storage/' . $listing->image) }}" alt="Desktop View"
                                class="w-full h-full object-cover">
                        @else
                            <img src="https://placehold.co/180x360/FF8C3A/white?text=Golden+Bee"
                                class="w-full h-full object-cover opacity-40">
                        @endif
                    </div>

                    {{-- Ảnh overlay (Màn hình Desktop phía trên - Bay ra ngoài) --}}
                    {{-- MÀN HÌNH PHONE (Màu trắng/Silver) --}}
                    <div
                        class="absolute -bottom-8 -right-4 w-[190px] h-[380px] rounded-[2.8rem] overflow-hidden shadow-[0_25px_60px_rgba(0,0,0,0.2)] border-[7px] border-white bg-white group hover:-translate-y-2 transition-transform duration-500 ring-1 ring-gray-100">

                        {{-- Loa thoại giả lập màu trắng/xám nhạt --}}
                        <div
                            class="absolute top-0 left-1/2 -translate-x-1/2 w-22 h-5 bg-white border-x border-b border-gray-100 rounded-b-2xl z-20 shadow-sm">
                            <div class="absolute top-1.5 left-1/2 -translate-x-1/2 w-8 h-1 bg-gray-200 rounded-full">
                            </div>
                        </div>

                        @if($listing->image_mobile)
                            <img src="{{ asset('storage/' . $listing->image_mobile) }}" alt="Mobile View"
                                class="w-full h-full object-cover rounded-[2rem]">
                        @else
                            {{-- Ảnh dự phòng nếu chưa có ảnh mobile --}}
                            <img src="{{ $listing->image ? asset('storage/' . $listing->image) : 'https://placehold.co/180x360/FF8C3A/white?text=Golden+Bee' }}"
                                class="w-full h-full object-cover rounded-[2rem] {{ !$listing->image_mobile ? 'grayscale opacity-40' : '' }}">
                        @endif
                    </div>
                </div>

                {{-- Nội dung chi tiết & Công nghệ --}}
                <div class="bg-white rounded-[2.5rem] p-10 shadow-sm border border-gray-100">
                    <div class="flex items-center gap-3 mb-6">
                        <span
                            class="px-4 py-1.5 bg-emerald-50 text-emerald-700 rounded-full text-xs font-black uppercase tracking-widest border border-emerald-100">
                            {{ $listing->category->name ?? 'Mẫu Website' }}
                        </span>
                        <span
                            class="px-4 py-1.5 bg-yellow-50 text-yellow-700 rounded-full text-xs font-black uppercase tracking-widest border border-yellow-100">
                            EST. {{ $listing->founding_year ?? '2026' }}
                        </span>
                    </div>

                    <h1 class="text-4xl font-black text-gray-900 leading-tight uppercase mb-8">{{ $listing->title }}
                    </h1>

                    <div class="prose prose-slate max-w-none">
                        <h3 class="text-xl font-bold text-gray-800 mb-4">📖 Mô tả chi tiết dự án</h3>
                        <div class="text-gray-600 leading-relaxed text-lg whitespace-pre-line">
                            {{ $listing->description ?? 'Mẫu website này được thiết kế với cấu trúc chuẩn SEO, tốc độ tải trang cực nhanh và giao diện hiện đại, phù hợp cho nhiều loại hình kinh doanh khác nhau.' }}
                        </div>
                    </div>

                    {{-- Stack Công nghệ --}}
                    <div class="mt-12 pt-8 border-t border-gray-100">
                        <h3 class="text-lg font-bold text-gray-800 mb-4">Tech stack chuyển giao:</h3>
                        <div class="flex flex-wrap gap-3">
                            {{-- Sếp có thể thay đổi cách lấy dữ liệu stack ở đây --}}
                            <span
                                class="px-5 py-2 bg-slate-50 border border-slate-100 rounded-2xl text-sm font-bold text-slate-600">Laravel
                                11</span>
                            <span
                                class="px-5 py-2 bg-slate-50 border border-slate-100 rounded-2xl text-sm font-bold text-slate-600">Tailwind
                                CSS v4</span>
                            <span
                                class="px-5 py-2 bg-slate-50 border border-slate-100 rounded-2xl text-sm font-bold text-slate-600">MySQL
                                Database</span>
                        </div>
                    </div>
                </div>
            </div>

            {{-- CỘT PHẢI: Giá, Stats & Seller (1/3) --}}
            <div class="space-y-6 lg:sticky lg:top-8">

                {{-- Card Giá & Actions --}}
                <div
                    class="bg-white rounded-[2.5rem] p-8 shadow-2xl shadow-emerald-100 border border-emerald-50 relative overflow-hidden">
                    <div class="absolute -top-10 -right-10 w-32 h-32 bg-emerald-50 rounded-full opacity-50"></div>

                    <label class="text-gray-400 text-xs font-black uppercase tracking-widest mb-2 block">Giá chuyển
                        nhượng</label>
                    <div class="flex items-baseline gap-1 mb-8">
                        <span
                            class="text-5xl font-black text-transparent bg-clip-text bg-gradient-to-br from-emerald-600 to-green-700">
                            {{ number_format($listing->price) }}
                        </span>
                        <span class="text-2xl font-bold text-green-600">đ</span>
                    </div>

                    <div class="space-y-4 relative z-10">
                        <button
                            class="w-full bg-gradient-to-r from-emerald-500 to-green-600 text-white py-5 rounded-[1.5rem] font-black shadow-lg shadow-emerald-200 hover:shadow-emerald-300 hover:-translate-y-1 transition-all text-lg uppercase tracking-wider">
                            MUA NGAY BÂY GIỜ
                        </button>
                        <a href="/demo/{{ $listing->id }}"
                            class="w-full flex items-center justify-center gap-2.5 border-2 border-slate-100 py-5 rounded-[1.5rem] font-bold text-slate-600 hover:bg-slate-50 transition-all">
                            🌐 Xem demo thực tế ➔
                        </a>
                    </div>
                </div>

                {{-- Card Chỉ số Kinh doanh đen --}}
                <div class="bg-slate-900 rounded-[2.5rem] p-8 text-white shadow-xl shadow-slate-200">
                    <h3
                        class="text-xs font-black text-slate-400 uppercase tracking-[0.2em] mb-8 flex items-center gap-2">
                        <span class="w-2 h-2 bg-yellow-400 rounded-full animate-pulse"></span>
                        Chỉ số vận hành hàng tháng
                    </h3>

                    <div class="space-y-6">
                        <div class="flex justify-between items-center group">
                            <span class="text-slate-400 text-sm group-hover:text-white transition-colors">Doanh
                                thu</span>
                            <span
                                class="font-black text-xl text-green-400">+{{ number_format($listing->monthly_revenue ?? 0) }}đ</span>
                        </div>
                        <div class="h-[1px] bg-slate-800"></div>
                        <div class="flex justify-between items-center group">
                            <span class="text-slate-400 text-sm group-hover:text-white transition-colors">Lợi nhuận
                                ròng</span>
                            <span
                                class="font-black text-xl text-yellow-400">+{{ number_format($listing->monthly_profit ?? 0) }}đ</span>
                        </div>
                        <div class="h-[1px] bg-slate-800"></div>
                        <div class="flex justify-between items-center group">
                            <span class="text-slate-400 text-sm group-hover:text-white transition-colors">Traffic
                                (Lượt/tháng)</span>
                            <span class="font-black text-xl">{{ $listing->traffic ?? '1.2k+' }} lượt/tháng</span>
                        </div>
                    </div>
                </div>

                {{-- Card Người bán xịn sò --}}
                <div class="bg-white rounded-[2.5rem] p-8 shadow-sm border border-slate-100">
                    <h3 class="text-[10px] font-black text-slate-400 uppercase tracking-widest mb-6">Thông tin người bán
                    </h3>
                    <div class="flex items-center gap-5">
                        <div
                            class="w-16 h-16 rounded-2xl bg-gradient-to-br from-emerald-300 to-green-400 flex items-center justify-center font-black text-white text-2xl shadow-lg shadow-emerald-100 rotate-3">
                            {{ substr($listing->user->name ?? 'G', 0, 1) }}
                        </div>
                        <div>
                            <div class="font-black text-slate-900 text-lg flex items-center gap-1">
                                {{ $listing->user->name ?? 'Người bán' }}
                                <svg class="w-5 h-5 text-blue-500" fill="currentColor" viewBox="0 0 20 20">
                                    <path
                                        d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293l-4 4a1 1 0 01-1.414 0l-2-2a1 1 0 111.414-1.414L9 10.586l3.293-3.293a1 1 0 111.414 1.414z">
                                    </path>
                                </svg>
                            </div>
                            <div class="text-xs text-slate-400 mt-1">
                                📅 Đăng: {{ $listing->created_at?->format('d/m/Y') ?? 'Vừa xong' }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
</div>