<div class="container py-5">
    <div class="card shadow-sm border-0 rounded-4 p-4">
        <h2 class="fw-bold text-dark mb-4">🛡️ Xác minh chính chủ</h2>

        <div class="alert alert-warning border-0">
            <strong>Bước 1:</strong> Tạo một file tên là <code
                class="bg-white px-2 py-1 rounded">verification.txt</code>
        </div>

        <div class="alert alert-warning border-0">
            <strong>Bước 2:</strong> Dán mã dưới đây vào file đó và lưu lại:
            <div class="bg-dark text-warning p-3 mt-2 rounded-3 font-monospace">
                {{ $verification->id }}
            </div>
        </div>

        <div class="alert alert-warning border-0">
            <strong>Bước 3:</strong> Upload file lên thư mục gốc website của bà (ví dụ:
            <code>{{ $listing->domain }}/verification.txt</code>)
        </div>

        <div class="text-center mt-5">
            @if ($statusMessage)
                <div class="alert alert-{{ $statusType }} mb-4 animate__animated animate__fadeIn">
                    {{ $statusMessage }}
                </div>
            @endif

            @if (!$listing->is_verified)
                <button wire:click="checkNow" wire:loading.attr="disabled"
                    class="btn btn-warning btn-lg fw-bold px-5 py-3 shadow-sm">
                    <span wire:loading.remove>BẤM ĐỂ KIỂM TRA NGAY 🐝</span>
                    <span wire:loading>ĐANG ĐI QUÉT WEBSITE CỦA BÀ...</span>
                </button>
            @endif
        </div>
    </div>
</div>