<div class="max-w-7xl mx-auto py-20 px-6">

    {{-- Header & Stats --}}
    <div class="flex flex-col md:flex-row justify-between items-end mb-16 gap-8">
        <div class="px-12">
            <h2 class="text-[10px] font-black text-amber-600 uppercase tracking-[0.5em]">Inventory Management</h2>
            <h1 class="text-4xl font-black text-slate-900 uppercase tracking-tighter italic">Website của tôi</h1>
        </div>

        <div class="flex gap-4">
            <div class="bg-slate-800 border border-slate-100 px-5 py-2 rounded-2xl shadow-sm text-center">
                <span class="block text-[12px] font-black text-amber-300 uppercase tracking-widest">Tổng tin</span>
                <span class="text-2xl font-black text-amber-300">{{ count($myListings) }}</span>
            </div>
            <a href="{{ route('livewire.clients.create-listing') }}" wire:navigate
                class="px-5 py-2 bg-amber-300 text-blue-500 rounded-2xl text-[12px] font-black uppercase tracking-[0.2em] shadow-lg shadow-amber-200 hover:-translate-y-1 transition-all  flex flex-col items-center justify-center gap-2">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-auto"
                    viewBox="0 0 448 512"><!--!Font Awesome Free v7.2.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2026 Fonticons, Inc.-->
                    <path fill="rgb(0, 152, 255)"
                        d="M256 64c0-17.7-14.3-32-32-32s-32 14.3-32 32l0 160-160 0c-17.7 0-32 14.3-32 32s14.3 32 32 32l160 0 0 160c0 17.7 14.3 32 32 32s32-14.3 32-32l0-160 160 0c17.7 0 32-14.3 32-32s-14.3-32-32-32l-160 0 0-160z" />
                </svg>
                Tạo tin mới
            </a>

        </div>
    </div>

    {{-- Grid Listings --}}
    @if(count($myListings) > 0)
        <div class="grid grid-cols-1 md:grid-cols-3 gap-10">
            @foreach($myListings as $item)
                <div class="relative group">

                    {{-- Gọi Component ListCard thần thánh --}}
                    @livewire('components.listing-card', ['listing' => $item], key($item->id))

                    {{-- Nút điều khiển nhanh (Edit/Delete) --}}
                    <div class="mt-4 flex gap-2 opacity-0 group-hover:opacity-100 transition-opacity">
                        <a href="{{ route('listings.edit', $item->id) }}" wire:navigate
                            class="flex-1 py-3 bg-slate-100 text-center text-slate-600 rounded-xl text-[8px] font-black uppercase tracking-widest hover:bg-slate-200 transition-all">
                            Sửa tin
                        </a>
                        <button wire:click="deleteListing('{{ $item->id }}')"
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
            <p class="text-[10px] font-black text-slate-400 uppercase tracking-[0.5em]">Hiện bạn không có tin nào</p>
            <a href="{{ route('livewire.clients.create-listing') }}"
                class="mt-6 inline-block text-amber-600 font-black text-sm uppercase underline decoration-2 underline-offset-8">Bắt
                đầu ngay ➔</a>

        </div>
    @endif
</div>