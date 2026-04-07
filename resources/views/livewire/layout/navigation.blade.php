<div>
    <?php
use App\Livewire\Actions\Logout;
use Livewire\Volt\Component;

new class extends Component {
    public function logout(Logout $logout): void
    {
        $logout();
        $this->redirect('/', navigate: true);
    }
}; ?>

    <nav x-data="{ open: false, profileOpen: false }"
        class="fixed top-0 left-0 right-0 z-[100] border-b border-slate-100 bg-white/80 backdrop-blur-xl px-8 py-2">

        <div class="max-w-7xl mx-auto flex items-center justify-between">

            {{-- LEFT: LOGO & LINKS --}}
            <div class="flex items-center gap-12">
                <a href="{{ route('home') }}" wire:navigate class="flex items-center gap-2 group">
                    <x-application-logo class="h-10 w-auto" />
                </a>

                {{-- DESKTOP LINKS --}}
                <div class="hidden md:flex items-center gap-8">
                    <a href="{{ route('home') }}" wire:navigate class="group inline-flex items-center gap-2.5 text-[18px] font-black uppercase tracking-[0.4em] transition-all
                               {{ request()->routeIs('home') ? 'text-[#FFD43B]' : 'text-slate-400' }}">

                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 640"
                            class="w-5 h-5 mb-0.5 transition-colors duration-300 group-hover:text-[#FFD43B]">
                            {{-- fill="currentColor" để nó lấy màu từ class text của svg nhen sếp --}}
                            <path fill="currentColor"
                                d="M341.8 72.6C329.5 61.2 310.5 61.2 298.3 72.6L74.3 280.6C64.7 289.6 61.5 303.5 66.3 315.7C71.1 327.9 82.8 336 96 336L112 336L112 512C112 547.3 140.7 576 176 576L464 576C499.3 576 528 547.3 528 512L528 336L544 336C557.2 336 569 327.9 573.8 315.7C578.6 303.5 575.4 289.5 565.8 280.6L341.8 72.6zM304 384L336 384C362.5 384 384 405.5 384 432L384 528L256 528L256 432C256 405.5 277.5 384 304 384z" />
                        </svg>

                        {{-- 📝 CHỮ: Hover lên là đổi sang màu vàng y chang icon --}}
                        <span class="transition-colors duration-300 group-hover:text-[#FFD43B]">
                            Nhà
                        </span>
                    </a>
                    <a href="{{ route('livewire.clients.create-listing') }}" wire:navigate
                        class="text-[15px] font-black {{ request()->routeIs('livewire.clients.create-listing') ? 'text-amber-600' : 'text-slate-400' }} hover:text-slate-900 uppercase tracking-[0.4em] transition-colors">
                        Niêm yết
                    </a>
                </div>
            </div>

            {{-- 👤 RIGHT: AUTH SECTION --}}
            <div class="flex items-center gap-6">
                @auth
                    <div class="relative">
                        <button @click="profileOpen = !profileOpen" @click.away="profileOpen = false"
                            class="flex items-center gap-3 group px-3 py-1.5 rounded-full hover:bg-slate-50 transition-all">
                            <span
                                class="text-[9px] font-black text-slate-700 uppercase tracking-widest group-hover:text-amber-600 transition-colors">
                                {{ auth()->user()->name }}
                            </span>
                            <div>
                                <x-user-avatar :user="auth()->user()" size="w-10 h-10" textSize="text-sm" />
                            </div>
                        </button>

                        {{-- LIGHT DROPDOWN --}}
                        <div x-show="profileOpen" x-cloak x-transition:enter="transition ease-out duration-200"
                            x-transition:enter-start="opacity-0 scale-95 translate-y-2"
                            x-transition:enter-end="opacity-100 scale-100 translate-y-0"
                            class="absolute right-0 mt-4 w-52 bg-white border border-slate-100 rounded-[1.5rem] shadow-[0_20px_50px_rgba(0,0,0,0.1)] p-2 z-[110]">

                            <a href="{{ route('profile') }}" wire:navigate
                                class="block px-4 py-3 text-[9px] font-black text-slate-500 hover:text-amber-600 hover:bg-amber-50 rounded-xl uppercase tracking-widest transition-all">
                                Hồ sơ cá nhân
                            </a>
                            <a href="{{ route('my-listings') }}" wire:navigate
                                class="block px-4 py-3 text-[9px] font-black text-slate-500 hover:text-amber-600 hover:bg-amber-50 rounded-xl uppercase tracking-widest transition-all">
                                Website của tôi
                            </a>

                            <div class="h-px bg-slate-100 my-2 mx-2"></div>

                            <button wire:click="logout"
                                class="w-full text-left px-4 py-3 text-[9px] font-black text-red-500 hover:bg-red-50 rounded-xl uppercase tracking-widest transition-all">
                                Đăng xuất
                            </button>
                        </div>
                    </div>
                @else
                    <div class="flex items-center gap-8">
                        <a href="{{ route('login') }}" wire:navigate
                            class="text-[9px] font-black text-slate-400 hover:text-slate-900 uppercase tracking-[0.4em] transition-colors">Đăng
                            nhập</a>
                        <a href="{{ route('register') }}" wire:navigate
                            class="text-[9px] font-black text-amber-600 hover:text-amber-700 uppercase tracking-[0.4em] transition-colors underline underline-offset-8 decoration-amber-200">Đăng
                            ký</a>
                    </div>
                @endauth

                {{-- Mobile Hamburger --}}
                <button @click="open = !open" class="md:hidden text-slate-600">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path x-show="!open" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M4 12h16M4 6h16M4 18h16" />
                        <path x-show="open" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>

        {{-- MOBILE MENU (Light) --}}
        <div x-show="open" x-collapse class="md:hidden pt-8 pb-4 space-y-6">
            <a href="{{ route('home') }}" wire:navigate
                class="block text-[9px] font-black text-slate-500 uppercase tracking-[0.4em]">Sàn giao dịch</a>
            <a href="{{ route('livewire.clients.create-listing') }}" wire:navigate
                class="block text-[9px] font-black text-slate-500 uppercase tracking-[0.4em]">Niêm yết</a>
            @auth
                <div class="h-px bg-slate-100"></div>
                <a href="{{ route('profile') }}" wire:navigate
                    class="block text-[9px] font-black text-amber-600 uppercase tracking-[0.4em]">Profile</a>
                <button wire:click="logout" class="block text-[9px] font-black text-red-500 uppercase tracking-[0.4em]">Đăng
                    xuất</button>
            @endauth
        </div>
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <x-flash-message />
        </div>
    </nav>

</div>