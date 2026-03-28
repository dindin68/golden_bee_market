<div class="bg-gray-50 min-h-screen font-['Be_Vietnam_Pro'] pb-20">
    {{-- Navigation Quay lại --}}
    <div class="max-w-7xl mx-auto px-6 pt-8">
        <a href="{{ route('home') }}"
            class="flex items-center text-gray-500 hover:text-pink-600 font-bold text-sm uppercase tracking-widest">
            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
            </svg>
            Quay lại chợ website
        </a>
    </div>

    <main class="max-w-7xl mx-auto px-6 py-10">
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-10">

            {{-- CỘT TRÁI: Hình ảnh & Mô tả chi tiết (Chiếm 2 phần) --}}
            <div class="lg:col-span-2 space-y-8">
                {{-- Ảnh chính --}}
                <div class="bg-white p-3 rounded-3xl shadow-sm border border-gray-100">
                    <img src="{{ asset('storage/' . $listing->image) }}" class="w-full h-auto rounded-2xl shadow-inner">
                </div>

                {{-- Tab thông tin (Mô tả, Tính năng, Quy trình chuyển giao) --}}
                <div class="bg-white rounded-3xl p-8 shadow-sm border border-gray-100">
                    <h2 class="text-2xl font-bold text-gray-800 mb-6 border-b pb-4">Tổng quan dự án</h2>
                    <div class="prose prose-pink max-w-none text-gray-600 leading-relaxed">
                        {!! nl2br(e($listing->description)) !!}
                    </div>

                    <h2 class="text-2xl font-bold text-gray-800 mt-12 mb-6 border-b pb-4">Công nghệ sử dụng</h2>
                    <div class="flex flex-wrap gap-3">
                        {{-- Ví dụ bà lấy từ DB hoặc giả lập --}}
                        <span class="px-4 py-2 bg-gray-100 rounded-xl text-sm font-medium text-gray-700">#Laravel</span>
                        <span
                            class="px-4 py-2 bg-gray-100 rounded-xl text-sm font-medium text-gray-700">#TailwindCSS</span>
                        <span class="px-4 py-2 bg-gray-100 rounded-xl text-sm font-medium text-gray-700">#MySQL</span>
                    </div>
                </div>
            </div>

            {{-- CỘT PHẢI: Giá, Chỉ số & Người bán (Chiếm 1 phần - Sticky) --}}
            <div class="space-y-6 lg:sticky lg:top-8">

                {{-- Card Giá & Mua --}}
                <div class="bg-white rounded-3xl p-8 shadow-xl border border-pink-100 relative overflow-hidden">
                    <div class="absolute top-0 right-0 w-20 h-20 bg-pink-500/5 rounded-full -mr-10 -mt-10"></div>

                    <div class="text-gray-500 text-sm font-bold uppercase mb-2">Giá chuyển nhượng</div>
                    <div class="text-4xl font-black text-pink-600 mb-6">{{ number_format($listing->price) }} <span
                            class="text-lg">đ</span></div>

                    <div class="space-y-3">
                        <button
                            class="w-full bg-gradient-to-r from-pink-500 to-rose-600 text-white py-4 rounded-2xl font-black shadow-lg shadow-pink-200 hover:scale-[1.02] transition-all">
                            MUA NGAY BÂY GIỜ
                        </button>
                        <a href="#"
                            class="w-full flex items-center justify-center gap-2 border-2 border-gray-100 py-4 rounded-2xl font-bold text-gray-600 hover:bg-gray-50 transition-all">
                            💬 Nhắn tin thương lượng
                        </a>
                    </div>
                </div>

                {{-- Card Chỉ số Kinh doanh --}}
                <div class="bg-gray-900 rounded-3xl p-8 text-white">
                    <h3 class="text-sm font-bold text-gray-400 uppercase tracking-widest mb-6">Chỉ số hàng tháng</h3>
                    <div class="grid grid-cols-1 gap-6">
                        <div class="flex items-center justify-between">
                            <span class="text-gray-400 text-sm">Doanh thu</span>
                            <span
                                class="font-bold text-green-400">+{{ number_format($listing->monthly_revenue ?? 0) }}đ</span>
                        </div>
                        <div class="flex items-center justify-between border-t border-gray-800 pt-4">
                            <span class="text-gray-400 text-sm">Lợi nhuận</span>
                            <span
                                class="font-bold text-yellow-400">+{{ number_format($listing->monthly_profit ?? 0) }}đ</span>
                        </div>
                        <div class="flex items-center justify-between border-t border-gray-800 pt-4">
                            <span class="text-gray-400 text-sm">Traffic</span>
                            <span class="font-bold uppercase">{{ $listing->traffic ?? '1.2k' }} lượt/tháng</span>
                        </div>
                    </div>
                </div>

                {{-- Card Người bán --}}
                <div class="bg-white rounded-3xl p-6 shadow-sm border border-gray-100">
                    <h3 class="text-xs font-bold text-gray-400 uppercase mb-4">Thông tin người bán</h3>
                    <div class="flex items-center gap-4 mb-4">
                        <div
                            class="w-12 h-12 rounded-full bg-yellow-400 flex items-center justify-center font-bold text-white text-xl shadow-inner">
                            {{ substr($listing->user->name, 0, 1) }}
                        </div>
                        <div>
                            <div class="font-bold text-gray-900 flex items-center gap-1">
                                {{ $listing->user->name }}
                                <svg class="w-4 h-4 text-blue-500" fill="currentColor" viewBox="0 0 20 20">
                                    <path
                                        d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293l-4 4a1 1 0 01-1.414 0l-2-2a1 1 0 111.414-1.414L9 10.586l3.293-3.293a1 1 0 111.414 1.414z">
                                    </path>
                                </svg>
                            </div>
                            <div class="text-xs text-gray-400">
                                Đăng ngày: {{ $listing->created_at?->format('d/m/Y') ?? 'Vừa xong' }}
                            </div>
                        </div>
                    </div>
                    <a href="#" class="block text-center text-sm font-bold text-pink-500 hover:underline">Xem tất cả tin
                        đăng của người này ➔</a>
                </div>

            </div>
        </div>
    </main>
</div>