<?php
use App\Livewire\Forms\LoginForm;
use Illuminate\Support\Facades\Session;
use Livewire\Attributes\Layout;
use Livewire\Volt\Component;

new #[Layout('components.layouts.app')] class extends Component {
    public LoginForm $form;

    public function login(): void
    {
        $this->validate();
        $this->form->authenticate();
        Session::regenerate();
        $this->redirectIntended(default: route('home', absolute: false), navigate: true);
    }
}; ?>

<div class="min-h-screen relative overflow-hidden bg-[#0B1120]">

    {{-- 1. Background Gradient huyền ảo --}}
    <div class="fixed inset-0 z-0" style="background: radial-gradient(circle at 50% 50%, #1E293B 0%, #0B1120 100%);">
        <div class="absolute top-1/4 left-1/4 w-96 h-96 bg-blue-500/5 blur-[130px] rounded-full"></div>
        <div class="absolute bottom-1/4 right-1/4 w-96 h-96 bg-amber-500/5 blur-[130px] rounded-full"></div>
    </div>

    {{-- 2. Form Card (Glassmorphism) --}}
    <div class="relative z-10 min-h-screen flex items-center justify-center p-6">
        <div
            class="w-full max-w-[420px] bg-white/[0.03] backdrop-blur-2xl rounded-[0.5rem] border border-white/10 p-10 shadow-[0_20px_50px_rgba(0,0,0,0.3)]">

            {{-- Header tinh tế --}}
            <div class="text-center mb-12">
                <h2 class="text-white text-xl font-light tracking-[0.3em] uppercase">Đăng Nhập</h2>
                <p class="text-gray-500 text-[10px] mt-2 tracking-widest font-medium italic">Chào mừng bà quay lại!</p>
            </div>

            <x-auth-session-status class="mb-6 text-sm text-amber-400/80" :status="session('status')" />

            <form wire:submit="login" class="space-y-6">
                {{-- Input Email - Thiết kế mới mướt hơn --}}
                <div class="space-y-2 group">
                    <label
                        class="block text-[10px] font-bold text-gray-500 uppercase tracking-[0.2em] ml-1 group-focus-within:text-amber-400 transition-colors">Tài
                        khoản</label>
                    <div class="relative">
                        <input wire:model="form.email" type="email" required autofocus
                            class="w-full bg-white/[0.03] border border-white/10 rounded-2xl py-4 px-5 text-white text-sm font-light placeholder-gray-700 focus:border-amber-400/50 focus:ring-1 focus:ring-amber-400/20 transition-all duration-300"
                            placeholder="Nhập email của bà nhen...">
                    </div>
                    <x-input-error :messages="$errors->get('form.email')"
                        class="mt-2 text-[10px] text-red-400/70 lowercase tracking-wider italic" />
                </div>

                {{-- Input Mật khẩu --}}
                <div class="space-y-2 group">
                    <label
                        class="block text-[10px] font-bold text-gray-500 uppercase tracking-[0.2em] ml-1 group-focus-within:text-amber-400 transition-colors">Mật
                        mã</label>
                    <div class="relative">
                        <input wire:model="form.password" type="password" required
                            class="w-full bg-white/[0.03] border border-white/10 rounded-2xl py-4 px-5 text-white text-sm font-light placeholder-gray-700 focus:border-amber-400/50 focus:ring-1 focus:ring-amber-400/20 transition-all duration-300"
                            placeholder="••••••••">
                    </div>
                    <x-input-error :messages="$errors->get('form.password')"
                        class="mt-2 text-[10px] text-red-400/70 lowercase tracking-wider italic" />
                </div>

                {{-- Link phụ --}}
                <div
                    class="flex items-center justify-between text-[10px] font-bold uppercase tracking-widest text-gray-600 px-1">
                    <label class="flex items-center cursor-pointer group hover:text-gray-400 transition-colors">
                        <input wire:model="form.remember" type="checkbox"
                            class="w-3.5 h-3.5 rounded border-white/10 bg-transparent text-amber-500 focus:ring-0 focus:ring-offset-0 transition-all">
                        <span class="ml-2">Duy trì</span>
                    </label>
                    <a href="#" class="hover:text-amber-400 transition-colors underline-offset-4 hover:underline">Quên
                        mật mã?</a>
                </div>

                {{-- Nút Login Vàng - Điểm nhấn rực rỡ --}}
                <div class="pt-4">
                    <button type="submit"
                        class="w-full py-4 rounded-2xl bg-gradient-to-r from-amber-400 to-orange-400 text-black font-black uppercase tracking-[0.2em] text-[11px] hover:shadow-[0_10px_30px_rgba(251,191,36,0.3)] hover:-translate-y-0.5 transition-all duration-300 active:scale-95">
                        Xác Nhận Đăng Nhập ➔
                    </button>
                </div>
            </form>

            {{-- Footer --}}
            <div class="mt-12 text-center">
                <a href="{{ route('register') }}" wire:navigate
                    class="text-[10px] font-bold text-gray-500 hover:text-white transition-colors uppercase tracking-[0.2em] border-b border-white/5 hover:border-amber-400/50 pb-1 italic">
                    Tạo tài khoản mới
                </a>
            </div>
        </div>
    </div>

</div>