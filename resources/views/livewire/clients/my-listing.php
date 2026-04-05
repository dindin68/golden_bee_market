<div class="max-w-7xl mx-auto py-20 px-6">
    {{-- Header & Stats --}}
    <div class="flex flex-col md:flex-row justify-between items-end mb-16 gap-8">
        <div class="space-y-2">
            <h2 class="text-[10px] font-black text-amber-600 uppercase tracking-[0.5em]">Inventory Management</h2>
            <h1 class="text-4xl font-black text-slate-900 uppercase tracking-tighter italic">Website của tôi</h1>
        </div>

        <div class="flex gap-4">
            <div class="bg-white border border-slate-100 px-8 py-4 rounded-2xl shadow-sm text-center">
                <span class="block text-[8px] font-black text-slate-400 uppercase tracking-widest mb-1">Tổng tin</span>
                <span class="text-xl font-black text-slate-900">{{ count($myListings) }}</span>
            </div>
            <a href="{{ route('listings.create') }}" wire:navigate
                class="px-8 py-5 bg-amber-400 text-black rounded-2xl text-[10px] font-black uppercase tracking-[0.3em] shadow-lg shadow-amber-200 hover:-translate-y-1 transition-all">
                + Niêm yết mới
            </a>
        </div>
    </div>

    {{-- Grid Listings --}}
    @if(count($myListings) > 0)
    <div class="grid grid-cols-1 md:grid-cols-3 gap-10">
        @foreach($myListings as $item)
        <div class="relative group">
            {{-- Badge Trạng thái --}}
            <div class="absolute top-8 left-8 z-20">
                @if($item->is_verified)
                <span
                    class="px-3 py-1 bg-emerald-500 text-white rounded-lg text-[8px] font-black uppercase tracking-widest shadow-lg">Verified</span>
                @else
                <span
                    class="px-3 py-1 bg-amber-500 text-white rounded-lg text-[8px] font-black uppercase tracking-widest shadow-lg">Pending</span>
                @endif
            </div>

            {{-- Gọi Component ListCard thần thánh --}}
            <livewire:clients.list-card :listing="$item" :key="$item->id" />

            {{-- Nút điều khiển nhanh (Edit/Delete) --}}
            <div class="mt-4 flex gap-2 opacity-0 group-hover:opacity-100 transition-opacity">
                <button
                    class="flex-1 py-3 bg-slate-100 text-slate-600 rounded-xl text-[8px] font-black uppercase tracking-widest hover:bg-slate-200 transition-all">Sửa
                    tin</button>
                <button
                    class="px-4 py-3 bg-red-50 text-red-500 rounded-xl hover:bg-red-500 hover:text-white transition-all">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                    </svg>
                </button>
            </div>
        </div>
        @endforeach
    </div>
    @else
    <div class="py-32 text-center bg-slate-50 rounded-[3rem] border border-dashed border-slate-200">
        <p class="text-[10px] font-black text-slate-400 uppercase tracking-[0.5em]">Bà chưa có website nào được niêm yết
            hết má ơi!</p>
        <a href="{{ route('listings.create') }}"
            class="mt-6 inline-block text-amber-600 font-black text-sm uppercase underline decoration-2 underline-offset-8">Bắt
            đầu ngay ➔</a>
    </div>
    @endif
</div>