@if (session()->has('message'))
    <div x-data="{ show: true }" x-show="show" x-init="setTimeout(() => show = false, 4000)"
        class="fixed top-10 right-10 z-50 flex items-center gap-4 p-4 shadow-2xl bg-slate-900 text-amber-400 rounded-2xl border border-amber-400/20 animate-bounce">

        <div class="p-2 text-black bg-amber-400 rounded-lg">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z" />
            </svg>
        </div>

        <div>
            <p class="text-[10px] font-black uppercase tracking-widest opacity-50">Hệ thống Golden Bee</p>
            <p class="text-sm font-bold text-white">{{ session('message') }}</p>
        </div>

        <button @click="show = false" class="ml-4 text-slate-500 hover:text-white">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path d="M6 18L18 6M6 6l12 12" />
            </svg>
        </button>
    </div>
@endif