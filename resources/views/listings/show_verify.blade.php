<div class="max-w-2xl mx-auto mt-10 p-6 bg-white shadow-md rounded-lg">
    <h2 class="text-2xl font-bold text-gray-800 mb-4">🐝 Bước cuối: Xác minh website của bạn</h2>
    @if(session('success'))
        <div style="background: #d4edda; color: #155724; padding: 10px; margin-bottom: 20px; border-radius: 5px;">
            {{ session('success') }}
        </div>
    @endif

    @if(session('error'))
        <div style="background: #f8d7da; color: #721c24; padding: 10px; margin-bottom: 20px; border-radius: 5px;">
            {{ session('error') }}
        </div>
    @endif
    <p class="mb-4">Để đảm bảo tin đăng là thật, vui lòng thực hiện 3 bước sau:</p>

    <div class="bg-gray-100 p-4 rounded-md mb-6">
        <ol class="list-decimal ml-5 space-y-2">
            <li>Tạo một file văn bản tên là: <span class="font-mono font-bold text-red-600">verification.txt</span></li>
            <li>Dán chính xác mã này vào nội dung file:
                <div class="mt-2 p-2 bg-yellow-200 text-center font-bold text-xl border border-yellow-400 rounded">
                    {{ $verification->id }}
                </div>
            </li>
            <li>Upload file này lên thư mục gốc của website: <span class="underline">{{ $listing->domain }}</span></li>
        </ol>
    </div>

    <div class="flex justify-between">
        <a href="/" class="text-gray-500 py-2">Để sau cũng được</a>
        <form action="{{ route('listings.check_now', $listing->id) }}" method="POST">
            @csrf
            <button type="submit" class="bg-blue-600 text-white px-6 py-2 rounded-md hover:bg-blue-700">
                Tôi đã upload, kiểm tra ngay!
            </button>
        </form>
    </div>
</div>