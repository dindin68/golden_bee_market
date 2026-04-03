<?php
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Livewire\Attributes\Layout;
use Livewire\Volt\Component;

new #[Layout('components.layouts.app')] class extends Component {
    public string $name = '';
    public string $email = '';
    public string $password = '';
    public string $password_confirmation = '';

    public function register(): void
    {
        $validated = $this->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:' . User::class],
            'password' => ['required', 'string', 'confirmed', Rules\Password::defaults()],
        ]);

        $validated['password'] = Hash::make($validated['password']);

        event(new Registered($user = User::create($validated)));

        Auth::login($user);

        $this->redirect(route('home', absolute: false), navigate: true);
    }
}; ?>

<div class="min-h-screen relative overflow-hidden bg-[#0B1120]">

    {{-- 1. Background Gradient huyền ảo (Đồng bộ với Login) --}}
    <div class="fixed inset-0 z-0" style="background: radial-gradient(circle at 50% 50%, #1E293B 0%, #0B1120 100%);">
        <div class="absolute top-1/4 left-1/4 w-96 h-96 bg-blue-500/5 blur-[130px] rounded-full"></div>
        <div class="absolute bottom-1/4 right-1/4 w-96 h-96 bg-amber-500/5 blur-[130px] rounded-full"></div>
    </div>

    {{-- 2. Form Card (Glassmorphism) --}}
    <div class="relative z-10 min-h-screen flex items-center justify-center p-6">
        <div
            class="w-full max-w-[460px] bg-white/[0.03] backdrop-blur-2xl rounded-[0.5rem] border border-white/10 p-10 shadow-[0_20px_50px_rgba(0,0,0,0.3)]">

            {{-- Header tinh tế --}}
            <div class="text-center mb-10">
                <h2 class="text-white text-xl font-light tracking-[0.3em] uppercase">Đăng Ký</h2>
                <p class="text-gray-500 text-[10px] mt-2 tracking-widest font-medium italic">Trở thành một phần của
                    Golden Bee nhen!</p>
            </div>

            <form wire:submit="register" class="space-y-5">
                {{-- Input Name --}}
                <div class="space-y-2 group">
                    <label
                        class="block text-[10px] font-bold text-gray-500 uppercase tracking-[0.2em] ml-1 group-focus-within:text-amber-400 transition-colors">Họ
                        và Tên</label>
                    <div class="relative">
                        <input wire:model="name" type="text" required autofocus
                            class="w-full bg-white/[0.03] border border-white/10 rounded-2xl py-3.5 px-5 text-white text-sm font-light placeholder-gray-800 focus:border-amber-400/50 focus:ring-1 focus:ring-amber-400/20 transition-all duration-300"
                            placeholder="Tên của bà nè...">
                    </div>
                    <x-input-error :messages="$errors->get('name')"
                        class="mt-2 text-[10px] text-red-400/70 lowercase tracking-wider italic" />
                </div>

                {{-- Input Email --}}
                <div class="space-y-2 group">
                    <label
                        class="block text-[10px] font-bold text-gray-500 uppercase tracking-[0.2em] ml-1 group-focus-within:text-amber-400 transition-colors">Địa
                        chỉ Email</label>
                    <div class="relative">
                        <input wire:model="email" type="email" required
                            class="w-full bg-white/[0.03] border border-white/10 rounded-2xl py-3.5 px-5 text-white text-sm font-light placeholder-gray-700 focus:border-amber-400/50 focus:ring-1 focus:ring-amber-400/20 transition-all duration-300"
                            placeholder="email@example.com">
                    </div>
                    <x-input-error :messages="$errors->get('email')"
                        class="mt-2 text-[10px] text-red-400/70 lowercase tracking-wider italic" />
                </div>

                {{-- Password Grid --}}
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                    {{-- Mật khẩu --}}
                    <div class="space-y-2 group">
                        <label
                            class="block text-[10px] font-bold text-gray-500 uppercase tracking-[0.2em] ml-1 group-focus-within:text-amber-400 transition-colors">Mật
                            mã</label>
                        <input wire:model="password" type="password" required
                            class="w-full bg-white/[0.03] border border-white/10 rounded-2xl py-3.5 px-5 text-white text-sm font-light placeholder-gray-700 focus:border-amber-400/50 focus:ring-1 focus:ring-amber-400/20 transition-all duration-300"
                            placeholder="••••••••">
                    </div>
                    {{-- Xác nhận mật khẩu --}}
                    <div class="space-y-2 group">
                        <label
                            class="block text-[10px] font-bold text-gray-500 uppercase tracking-[0.2em] ml-1 group-focus-within:text-amber-400 transition-colors">Xác
                            nhận</label>
                        <input wire:model="password_confirmation" type="password" required
                            class="w-full bg-white/[0.03] border border-white/10 rounded-2xl py-3.5 px-5 text-white text-sm font-light placeholder-gray-700 focus:border-amber-400/50 focus:ring-1 focus:ring-amber-400/20 transition-all duration-300"
                            placeholder="••••••••">
                    </div>
                </div>
                <x-input-error :messages="$errors->get('password')"
                    class="mt-1 text-[10px] text-red-400/70 lowercase tracking-wider italic" />

                {{-- Nút Register Vàng --}}
                <div class="pt-6">
                    <button type="submit"
                        class="w-full py-4 rounded-2xl bg-gradient-to-r from-amber-400 to-orange-400 text-black font-black uppercase tracking-[0.2em] text-[11px] hover:shadow-[0_10px_30px_rgba(251,191,36,0.3)] hover:-translate-y-0.5 transition-all duration-300 active:scale-95">
                        Tạo Tài Khoản Ngay ➔
                    </button>
                </div>
            </form>

            {{-- Footer --}}
            <div class="mt-10 text-center">
                <a href="{{ route('login') }}" wire:navigate
                    class="text-[10px] font-bold text-gray-500 hover:text-white transition-colors uppercase tracking-[0.2em] border-b border-white/5 hover:border-amber-400/50 pb-1 italic">
                    Đã là thành viên? Đăng nhập nhen
                </a>
            </div>
        </div>
    </div>

</div>