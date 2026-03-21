<div class="p-6">
    @if (session()->has('success'))
        <div class="bg-green-100 border-l-4 border-green-500 text-green-700 p-4 mb-4 rounded shadow-sm">
            {{ session('success') }}
        </div>
    @endif

    <div class="overflow-x-auto bg-white rounded-lg shadow">
        <table class="w-full text-left border-collapse">
            <thead>
                <tr class="bg-yellow-400 text-gray-800">
                    <th class="p-4 font-bold uppercase text-sm">Website</th>
                    <th class="p-4 font-bold uppercase text-sm">Xác minh sở hữu</th>
                    <th class="p-4 font-bold uppercase text-sm text-center">Thao tác</th>
                </tr>
            </thead>
            <tbody>
                @forelse($listings as $item)
                    <tr class="border-b hover:bg-orange-50 transition duration-150">
                        <td class="p-4">
                            <div class="font-bold text-gray-800">{{ $item->title }}</div>
                            <div class="text-xs text-blue-500 italic">{{ $item->domain }}</div>
                        </td>
                        <td class="p-4">
                            @if($item->is_verified)
                                <span class="bg-blue-600 text-white text-[10px] px-2 py-1 rounded-full font-bold animate-pulse">
                                    🐝 VERIFIED OWNER
                                </span>
                            @else
                                <span class="text-gray-400 text-xs italic">Chưa xác minh</span>
                            @endif
                        </td>
                        <td class="p-4 text-center">
                            <button wire:click="approve('{{ $item->id }}')"
                                class="bg-green-600 hover:bg-green-700 text-white font-bold py-2 px-6 rounded shadow-md transition transform active:scale-95 text-sm">
                                Duyệt Ngay
                            </button>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="3" class="p-10 text-center text-gray-400">
                            Chưa có tin nào mới bà ơi, thong thả uống trà đi! ☕
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>