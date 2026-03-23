<div>
    {{-- Thông báo thành công --}}
    @if (session()->has('success'))
        <div class="alert alert-success border-0 shadow-sm mb-4 animate__animated animate__fadeIn">
            {{ session('success') }}
        </div>
    @endif

    <div class="table-responsive bg-white rounded-4 shadow-sm">
        <table class="table table-hover align-middle mb-0">
            <thead class="bg-light text-secondary uppercase small fw-bold">
                <tr>
                    <th class="ps-4">Sản phẩm</th>
                    <th>Xác minh</th>
                    <th>Ngày đăng</th>
                    <th class="text-end pe-4">Thao tác</th>
                </tr>
            </thead>
            <tbody>
                @forelse($listings as $item)
                    <tr>
                        <td class="ps-4">
                            <div class="d-flex align-items-center">
                                <img src="{{ $item->image ? asset('storage/' . $item->image) : 'https://via.placeholder.com/50' }}"
                                    class="rounded-3 me-3" style="width: 45px; height: 45px; object-fit: cover;">
                                <div>
                                    <div class="fw-bold text-dark">{{ $item->title }}</div>
                                    <small class="text-muted">{{ $item->domain }}</small>
                                </div>
                            </div>
                        </td>
                        <td>
                            @if($item->is_verified)
                                <span class="badge bg-warning-subtle text-warning border border-warning-subtle rounded-pill">
                                    🐝 Đã xác minh
                                </span>
                            @else
                                <span class="badge bg-light text-secondary rounded-pill">Chưa xác minh</span>
                            @endif
                        </td>
                        <td class="text-muted small">
                            {{ $item->created_at->format('d/m/Y') }}
                        </td>
                        <td class="text-end pe-4">
                            <div class="btn-group shadow-sm rounded-3">
                                <button wire:click="approve('{{ $item->id }}')"
                                    class="btn btn-sm btn-success px-3">Duyệt</button>
                                <button wire:click="reject('{{ $item->id }}')"
                                    class="btn btn-sm btn-outline-danger px-3">Hủy</button>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="4" class="text-center py-5 text-muted">
                            <div class="fs-1">😴</div>
                            Hết tin chờ duyệt rồi má ơi, đi nghỉ ngơi thôi!
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>