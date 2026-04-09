<div class="max-w-7xl mx-auto h-[calc(100vh-65px)]" wire:poll.5s>
    <div class="flex bg-white  md:shadow-2xl  md:border-slate-100 h-full overflow-hidden relative">
        
        {{-- CỘT TRÁI: DANH SÁCH  --}}
        <div class="w-full md:w-[380px] border-r border-slate-50 flex-col bg-slate-50/30 {{ $selectedListingId ? 'hidden md:flex' : 'flex' }}">
            <div class="p-8 border-b border-slate-100 flex flex-col justify-between items-start bg-white/50">
                <h1 class="text-3xl font-black text-slate-900 uppercase tracking-tighter italic mt-1">Chat</h1>
                <h2 class="flex flex-row text-[10px] font-black text-amber-600 uppercase tracking-[0.2em]">Thương lượng với nhau ở đây nho mấy người
                                    đẹp 
                    <svg xmlns="http://www.w3.org/2000/svg" width="40" height="auto" fill="currentColor" class="bi bi-balloon-heart text-red-600"
                        viewBox="0 0 16 16">
                        <path fill-rule="evenodd"
                            d="m8 2.42-.717-.737c-1.13-1.161-3.243-.777-4.01.72-.35.685-.451 1.707.236 3.062C4.16 6.753 5.52 8.32 8 10.042c2.479-1.723 3.839-3.29 4.491-4.577.687-1.355.587-2.377.236-3.061-.767-1.498-2.88-1.882-4.01-.721zm-.49 8.5c-10.78-7.44-3-13.155.359-10.063q.068.062.132.129.065-.067.132-.129c3.36-3.092 11.137 2.624.357 10.063l.235.468a.25.25 0 1 1-.448.224l-.008-.017c.008.11.02.202.037.29.054.27.161.488.419 1.003.288.578.235 1.15.076 1.629-.157.469-.422.867-.588 1.115l-.004.007a.25.25 0 1 1-.416-.278c.168-.252.4-.6.533-1.003.133-.396.163-.824-.049-1.246l-.013-.028c-.24-.48-.38-.758-.448-1.102a3 3 0 0 1-.052-.45l-.04.08a.25.25 0 1 1-.447-.224l.235-.468ZM6.013 2.06c-.649-.18-1.483.083-1.85.798-.131.258-.245.689-.08 1.335.063.244.414.198.487-.043.21-.697.627-1.447 1.359-1.692.217-.073.304-.337.084-.398" />
                    </svg>
                </h2>
            </div>
            
            <div class="relative flex-1 overflow-y-auto p-3 space-y-2">
                @foreach($conversations as $listingId => $partners)
                    @foreach($partners as $partnerId => $msgs)
                        @php 
                            $last = $msgs->first();
        $partner = ($last->sender_id === auth()->id()) ? $last->receiver : $last->sender;
        $isActive = ($selectedListingId == $listingId && $selectedPartnerId == $partnerId);
        $isUnread = (!$last->is_read && $last->receiver_id === auth()->id());
                        @endphp

                        <button wire:click="selectConversation('{{ $listingId }}', '{{ $partnerId }}')"
                            class="w-full text-left p-4 rounded-2xl transition-all flex items-center gap-4 border {{ $isActive
            ? 'bg-amber-400/10 border-amber-400 shadow-[0_8px_30px_rgb(251,191,36,0.1)]'
            : 'bg-white/40 border-transparent hover:bg-white/80'}}">

                            @if($isUnread)
                                <span class="absolute right-4 top-4 h-2.5 w-2.5 bg-amber-500 rounded-full shadow-[0_0_10px_rgba(245,158,11,0.5)] animate-pulse"></span>
                            @endif
                            <div class="w-12 h-12 rounded-full bg-amber-400 flex items-center justify-center font-black text-black shrink-0 shadow-sm">
                                {{ substr($partner->name, 0, 1) }}
                            </div>

                            <div class="flex-1 min-w-0">
                                <div class="flex justify-between items-baseline">
                                    <h4 class="uppercase truncate italic {{ $isUnread ? 'font-black text-slate-900 text-[11px]' : 'font-bold text-slate-500 text-[10px]' }}">
                                    {{ $partner->name }}
                                    </h4>
                                    <span class="text-[8px] font-bold {{ $isUnread ? 'text-amber-600' : 'text-slate-300' }} italic">
                                    {{ $last->created_at->diffForHumans(short: true) }}
                                    </span>                                                                
                                </div>
                                <p class="truncate {{ $isUnread ? 'text-slate-900 font-black text-[10px]' : 'text-slate-400 font-medium text-[10px]' }}">
                                {{ $last->content }}
                                </p>
                                <div class="mt-1">
                                    <a href="{{ route('product.detail', $last->listing_id) }} "
                                    wire:navigate
                                    onClick="event.stopPropagation()"
                                    class="text-[7px] px-1.5 py-0.5 rounded font-black uppercase tracking-tighter italic
                                    {{ $isActive ? 'bg-amber-400 text-black' : 'bg-slate-100 text-slate-400' }}" >
                                    #{{ Str::limit($last->listing->title, 15) }}
                                    </a>
                                </div>
                            </div>
                        </button>
                    @endforeach
                @endforeach
            </div>
        </div>

        {{-- CỘT PHẢI: NỘI DUNG CHAT (Ẩn trên mobile khi chưa chọn chat) --}}
        <div class="flex-1 flex-col bg-white h-full {{ $selectedListingId ? 'flex' : 'hidden md:flex' }}">
            @if($selectedListingId)
                {{-- Header --}}
                <div class="p-4 md:p-7 border-b border-slate-50 flex items-center gap-4">
                    {{-- Nút quay lại chỉ hiện trên Mobile --}}
                    <button wire:click="closeChat" class="md:hidden p-2 text-slate-400">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" /></svg>
                    </button>

                    <div class="w-10 h-10 rounded-full bg-slate-900 flex items-center justify-center font-black text-amber-400 shadow-lg">
                        {{ substr(\App\Models\User::find($selectedPartnerId)->name, 0, 1) }}
                    </div>
                    <div class="flex-1 min-w-0">
                        <h3 class="font-black text-slate-900 uppercase text-xs italic">{{ \App\Models\User::find($selectedPartnerId)->name }}</h3>
                        <a class="text-[9px] font-bold text-amber-600 uppercase tracking-widest mt-1" 
                            href="{{ route('product.detail', $selectedListingId) }}" wire:navigate
                            onClick="event.stopPropagation()">
                            Dự án: 
                            #{{ Str::limit(\App\Models\Listing::find($selectedListingId)->title, 30) }}
                        </a>
                    </div>
                    <div class="flex items-center gap-2">
                        <button title="Yêu cầu Admin điều phối" 
                                class="w-10 h-10 rounded-full flex items-center justify-center text-slate-400 hover:bg-amber-50 hover:text-amber-500 transition-all group">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-shield-lock-fill" viewBox="0 0 16 16">
                                <path fill-rule="evenodd" d="M8 0c-.69 0-1.843.265-2.928.56-1.11.3-2.229.655-2.887.87a1.54 1.54 0 0 0-1.044 1.262c-.596 4.477.787 7.795 2.465 9.99a11.8 11.8 0 0 0 2.517 2.453c.386.273.744.482 1.048.625.28.132.581.24.829.24s.548-.108.829-.24a7 7 0 0 0 1.048-.625 11.8 11.8 0 0 0 2.517-2.453c1.678-2.195 2.961-5.513 2.465-9.99a1.54 1.54 0 0 0-1.044-1.263 63 63 0 0 0-2.887-.87C9.843.266 8.69 0 8 0m0 5a1.5 1.5 0 0 1 .5 2.915l.385 1.99a.5.5 0 0 1-.491.595h-.788a.5.5 0 0 1-.49-.595l.384-1.99A1.5 1.5 0 0 1 8 5"/>
                            </svg>
                        </button>

                        {{-- Nút xem thông tin --}}
                        <button class="w-10 h-10 rounded-full flex items-center justify-center text-slate-400 hover:bg-slate-100 transition-all">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-info-circle-fill" viewBox="0 0 16 16">
                                <path d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16m.93-9.412-1 4.705c-.07.34.029.533.304.533.194 0 .487-.07.686-.246l-.088.416c-.287.346-.92.598-1.465.598-.703 0-1.002-.422-.808-1.319l.738-3.468c.064-.293.006-.399-.287-.47l-.451-.081.082-.381 2.29-.287zM8 5.5a1 1 0 1 1 0-2 1 1 0 0 1 0 2"/>
                            </svg>
                        </button>
                    </div>
                </div>

                {{-- Tin nhắn --}}
                <div class="flex-1 overflow-y-auto p-6 space-y-4 flex flex-col bg-slate-50/20">
                    @foreach($chatMessages as $msg)
                        @php $isMe = ($msg->sender_id === auth()->id()); @endphp
                        <div class="flex {{ $isMe ? 'justify-end' : 'justify-start' }}">
                            @if(!$isMe)
                                <div class="shrink-0 mb-4 transition-transform hover:scale-110 mr-1">
                                    {{-- Dùng lại component avatar cho nó chuyên nghiệp nhen má --}}
                                    <x-user-avatar 
                                        :user="$msg->sender" 
                                        size="w-9 h-9" 
                                        textSize="text-[10px]" 
                                        class="shadow-sm border-2 border-white ring-1 ring-slate-100" 
                                    />
                                </div>
                            @endif
                            <div class="max-w-[85%] md:max-w-[70%]">
                                <div class="p-2 rounded-[1rem] text-sm shadow-sm 
                                    {{ $isMe ? 'bg-slate-900 text-white rounded-br-none' : 'bg-white text-slate-900 border border-slate-100 rounded-bl-none' }}">
                                    {{ $msg->content }}
                                </div>
                                <span class="text-[9px] font-bold text-slate-300 mt-1.5 block px-3 uppercase italic">
                                    @if($msg->created_at->isToday())
                                        {{ $msg->created_at->format('H:i') }}
                                    @else
                                        {{ $msg->created_at->format('d/m H:i') }}
                                    @endif
                                </span>
                            </div>
                        </div>
                    @endforeach
                </div>

                {{-- Input --}}
                <div class="p-6 bg-white border-t border-slate-50">
                    <div class="flex gap-3 items-center">
                        <input wire:model.defer="replyContent" wire:keydown.enter="sendReply"
                            placeholder="Nhập tin nhắn..."
                            class="flex-1 bg-slate-100 border-none rounded-2xl px-6 py-3 text-sm focus:ring-2 focus:ring-amber-400">
                        <button wire:click="sendReply" class="w-12 h-12 bg-slate-900 text-amber-400 rounded-2xl flex items-center justify-center hover:bg-amber-400 hover:text-black transition-all">
                            <svg class="w-5 h-5 rotate-90" fill="currentColor" viewBox="0 0 20 20"><path d="M10.894 2.553a1 1 0 00-1.788 0l-7 14a1 1 0 001.169 1.409l5-1.429A1 1 0 009 15.571V11a1 1 0 112 0v4.571a1 1 0 00.725.962l5 1.428a1 1 0 001.17-1.408l-7-14z" /></svg>
                        </button>
                    </div>
                </div>
            @else
                {{-- Empty State --}}
                <div class="h-full flex flex-col items-center justify-center text-center p-20 opacity-20 select-none">
                    <svg class="w-20 h-20 mb-4" fill="currentColor" viewBox="0 0 24 24"><path d="M20 2H4c-1.1 0-2 .9-2 2v18l4-4h14c1.1 0 2-.9 2-2V4c0-1.1-.9-2-2-2z"/></svg>
                    <p class="font-black uppercase italic text-[10px] tracking-[0.3em]">Chọn một dự án để bắt đầu chốt đơn</p>
                </div>
            @endif
        </div>
    </div>
</div>