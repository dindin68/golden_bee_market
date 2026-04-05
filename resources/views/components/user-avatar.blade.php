@props(['user', 'size' => 'w-12 h-12', 'textSize' => 'text-xl'])

<div class="relative {{ $size }} group">
    {{-- Khung Avatar --}}
    <div class="w-full h-full rounded-[35%] bg-slate-100 border-2 border-white shadow-md flex items-center justify-center overflow-hidden">
        @if($user->avatar) {{-- Nếu bà có làm chức năng up avatar --}}
            <img src="{{ asset('storage/' . $user->avatar) }}" class="w-full h-full object-cover">
        @else
            <span class="{{ $textSize }} font-black text-amber-500 uppercase">
                {{ substr($user->name, 0, 1) }}
            </span>
        @endif
    </div>

    {{-- Dấu tick quyền lực --}}
    @if($user->kyc_status === 'verified')
        <div class="absolute -bottom-1 -right-1 bg-emerald-500 rounded-full p-0.5 border-2 border-white shadow-sm z-10">
            <svg class="w-3 h-3 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="4" d="M5 13l4 4L19 7" />
            </svg>
        </div>
    @endif
</div>