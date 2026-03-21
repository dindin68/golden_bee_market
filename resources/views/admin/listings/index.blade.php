@extends('layouts.admin')

@section('content')
    <div class="min-h-screen bg-gray-100 py-8">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

            {{-- Tiêu đề trang --}}
            <div class="mb-6 flex items-center justify-between">
                <div>
                    <h1 class="text-3xl font-bold text-gray-900 flex items-center">
                        <span class="mr-2">🐝</span> Trạm Điều Hành Golden Bee
                    </h1>
                    <p class="mt-1 text-sm text-gray-500">
                        Nơi Admin phê duyệt các website "xịn" lên sàn giao dịch.
                    </p>
                </div>

                {{-- Badge thống kê nhanh (nếu thích) --}}
                <div class="bg-yellow-100 text-yellow-800 px-4 py-2 rounded-lg font-semibold shadow-sm">
                    Quyền Admin: Cao nhất 👑
                </div>
            </div>

            {{-- GỌI COMPONENT LIVEWIRE THẦN THÁNH RA ĐÂY --}}
            <div class="bg-white rounded-xl shadow-lg overflow-hidden border border-gray-200">
                <livewire:admin.listing-table />
            </div>

        </div>
    </div>
@endsection