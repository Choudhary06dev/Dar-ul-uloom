<x-guest-layout>
    <div class="mb-6 text-center">
        <h2 class="text-3xl font-extrabold text-slate-900 tracking-tight">Welcome back</h2>
        <p class="text-slate-500 mt-1 font-medium">Please enter your details to sign in</p>
    </div>

    @if (session('status'))
        <div class="mb-6 p-4 rounded-xl bg-emerald-50 border border-emerald-100 text-emerald-700 text-sm font-medium animate-in fade-in slide-in-from-top-4 duration-300">
            {{ session('status') }}
        </div>
    @endif

    <form method="POST" action="{{ route('admin.login') }}" class="space-y-6">
        @csrf

        <!-- Email Address -->
        <div>
            <label for="email" class="block text-sm font-semibold text-slate-700 mb-1.5">Email Address</label>
            <input id="email" class="block w-full px-4 py-2.5 rounded-xl border-slate-200 bg-slate-50/50 focus:bg-white focus:border-emerald-600 focus:ring-4 focus:ring-emerald-600/10 transition-all duration-200 outline-none" type="email" name="email" value="{{ old('email') }}" required autofocus placeholder="name@company.com" />
            <x-input-error :messages="$errors->get('email')" class="mt-1.5" />
        </div>

        <!-- Password -->
        <div>
            <div class="flex items-center justify-between mb-1.5">
                <label for="password" class="block text-sm font-semibold text-slate-700">Password</label>
                @if (Route::has('password.request'))
                    <a class="text-xs font-bold text-emerald-700 hover:text-emerald-600 transition-colors" href="{{ route('password.request') }}">
                        Forgot password?
                    </a>
                @endif
            </div>
            <div class="relative">
                <input id="password" class="block w-full px-4 py-2.5 rounded-xl border-slate-200 bg-slate-50/50 focus:bg-white focus:border-emerald-600 focus:ring-4 focus:ring-emerald-600/10 transition-all duration-200 outline-none pr-12"
                                type="password"
                                name="password"
                                required placeholder="••••••••" />
                <button type="button" onclick="togglePassword('password')" class="absolute right-4 top-1/2 -translate-y-1/2 text-slate-400 hover:text-emerald-600 transition-colors focus:outline-none">
                    <i class="fa-solid fa-eye" id="password-icon"></i>
                </button>
            </div>
            <x-input-error :messages="$errors->get('password')" class="mt-1.5" />
        </div>

        @push('scripts')
        <script>
            function togglePassword(inputId) {
                const passwordInput = document.getElementById(inputId);
                const icon = document.getElementById(inputId + '-icon');
                
                if (passwordInput.type === 'password') {
                    passwordInput.type = 'text';
                    icon.classList.remove('fa-eye');
                    icon.classList.add('fa-eye-slash');
                } else {
                    passwordInput.type = 'password';
                    icon.classList.remove('fa-eye-slash');
                    icon.classList.add('fa-eye');
                }
            }
        </script>
        @endpush

        <!-- Remember Me -->
        <div class="flex items-center">
            <input id="remember_me" type="checkbox" class="w-5 h-5 rounded-md border-slate-300 text-emerald-600 focus:ring-emerald-600 transition-all cursor-pointer" name="remember">
            <label for="remember_me" class="ml-3 text-sm font-medium text-slate-600 cursor-pointer select-none">Remember this device</label>
        </div>

        <div>
            <button type="submit" class="w-full flex justify-center items-center px-6 py-3.5 rounded-xl primary-btn text-sm font-bold shadow-xl active:scale-[0.98]">
                Sign in to account
            </button>
        </div>

        <div class="pt-4 text-center">
            <p class="text-sm text-slate-500 font-medium">
                Don't have an admin account? 
                <a href="{{ route('admin.register') }}" class="text-emerald-700 font-bold hover:text-emerald-600 underline-offset-4 hover:underline">Register here</a>
            </p>
        </div>
    </form>
</x-guest-layout>


