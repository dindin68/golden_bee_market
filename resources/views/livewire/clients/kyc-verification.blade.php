<div class="max-w-md mx-auto mt-10 p-6 bg-white rounded-lg shadow-xl border-t-4 border-amber-500">
    <h2 class="text-2xl font-bold text-gray-800 mb-4">🐝 Xác thực danh tính</h2>

    @if (session()->has('message'))
        <div class="p-3 mb-4 text-green-700 bg-green-100 rounded-lg">
            {{ session('message') }}
        </div>
    @endif

    <form wire:submit.prevent="submitKyc">
        <div class="mb-4">
            <label class="block text-gray-700 text-sm font-bold mb-2">Ảnh CCCD hoặc Passport:</label>
            
            <input type="file" wire:model="idImage" 
                class="w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-amber-50 file:text-amber-700 hover:file:bg-amber-100" />
            
            @error('idImage') <span class="text-red-500 text-xs italic">{{ $message }}</span> @enderror
        </div>

        @if ($idImage)
            <div class="mb-4">
                <p class="text-xs text-gray-500 mb-1">Ảnh bà vừa chọn nè:</p>
                <img src="{{ $idImage->temporaryUrl() }}" class="w-full rounded-lg shadow-md border-2 border-dashed border-amber-200">
            </div>
        @endif

        <button type="submit" wire:loading.attr="disabled"
            class="w-full bg-amber-500 hover:bg-amber-600 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline transition duration-150">
            <span wire:loading.remove>Gửi yêu cầu xác thực</span>
            <span wire:loading>Đang "bay" lên máy chủ... 🐝</span>
        </button>
    </form>
</div>