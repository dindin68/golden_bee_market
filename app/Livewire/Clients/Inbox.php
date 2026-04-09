<?php

namespace App\Livewire\Clients;

use App\Models\Message;
use App\Models\Listing;
use Livewire\Component;
use Livewire\Attributes\Layout;
use Illuminate\Support\Facades\Auth;

class Inbox extends Component
{
    public $selectedListingId;
    public $selectedPartnerId;
    public $replyContent;

    // Lấy thông tin từ URL nếu có (ví dụ khi từ trang Detail nhảy qua)
    public function mount()
    {
        $this->selectedListingId = request()->query('about');
        $this->selectedPartnerId = request()->query('chat_with');
    }

    public function selectConversation($listingId, $partnerId)
    {
        $this->selectedListingId = $listingId;
        $this->selectedPartnerId = $partnerId;

        // Đánh dấu đã đọc khi bấm vào xem
        Message::where('listing_id', $listingId)
            ->where('sender_id', $partnerId)
            ->where('receiver_id', Auth::id())
            ->update(['is_read' => true]);
    }

    public function sendReply()
    {
        $this->validate(['replyContent' => 'required|min:1']);

        Message::create([
            'listing_id' => $this->selectedListingId,
            'sender_id' => Auth::id(),
            'receiver_id' => $this->selectedPartnerId,
            'content' => $this->replyContent,
            'is_read' => false
        ]);

        $this->reset('replyContent');
    }
    public function closeChat()
    {
        $this->selectedListingId = null;
        $this->selectedPartnerId = null;
    }

    #[Layout('components.layouts.app')]
    public function render()
    {
        // Lấy danh sách bên trái (Sidebar)
        $allMessages = Message::where('sender_id', Auth::id())
            ->orWhere('receiver_id', Auth::id())
            ->with(['sender', 'receiver', 'listing'])
            ->latest()
            ->get();

        $conversations = $allMessages->groupBy('listing_id')->map(function ($msgs) {
            return $msgs->groupBy(function ($item) {
                return $item->sender_id === Auth::id() ? $item->receiver_id : $item->sender_id;
            });
        });

        // Lấy nội dung chat bên phải (nếu đã chọn)
        $chatMessages = [];
        if ($this->selectedListingId && $this->selectedPartnerId) {
            $chatMessages = Message::where('listing_id', $this->selectedListingId)
                ->where(function ($q) {
                    $q->where(function ($sq) {
                        $sq->where('sender_id', Auth::id())->where('receiver_id', $this->selectedPartnerId);
                    })->orWhere(function ($sq) {
                        $sq->where('sender_id', $this->selectedPartnerId)->where('receiver_id', Auth::id());
                    });
                })
                ->oldest()
                ->get();
        }

        return view('livewire.clients.inbox', [
            'conversations' => $conversations,
            'chatMessages' => $chatMessages
        ]);
    }
}