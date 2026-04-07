<x-guest-layout>
    <div class="mb-6 text-center">
        <h2 class="text-3xl font-extrabold text-slate-900 tracking-tight">Create an account</h2>
        <p class="text-slate-500 mt-2 font-medium">Join Anwaar-e-Mustafa today</p>
    </div>

    <form method="POST" action="{{ request()->routeIs('admin.*') ? route('admin.register') : route('register') }}" class="space-y-4">
        @csrf

        <div class="grid grid-cols-1 md:grid-cols-2 gap-x-6 gap-y-4">
            <!-- Name -->
            <div>
                <label for="name" class="block text-sm font-semibold text-slate-700 mb-1">Full Name</label>
                <input id="name" class="block w-full px-4 py-2.5 rounded-xl border-slate-200 bg-slate-50/50 focus:bg-white focus:border-emerald-600 focus:ring-4 focus:ring-emerald-600/10 transition-all duration-200 outline-none" type="text" name="name" value="{{ old('name') }}" required autofocus placeholder="Your Full Name" />
                <x-input-error :messages="$errors->get('name')" class="mt-1" />
            </div>

            <!-- Father's Name -->
            <div>
                <label for="father_name" class="block text-sm font-semibold text-slate-700 mb-1">Father's Name</label>
                <input id="father_name" class="block w-full px-4 py-2.5 rounded-xl border-slate-200 bg-slate-50/50 focus:bg-white focus:border-emerald-600 focus:ring-4 focus:ring-emerald-600/10 transition-all duration-200 outline-none" type="text" name="father_name" value="{{ old('father_name') }}" required placeholder="Father's Name" />
                <x-input-error :messages="$errors->get('father_name')" class="mt-1" />
            </div>

            <!-- Email Address -->
            <div>
                <label for="email" class="block text-sm font-semibold text-slate-700 mb-1">Email Address</label>
                <input id="email" class="block w-full px-4 py-2.5 rounded-xl border-slate-200 bg-slate-50/50 focus:bg-white focus:border-emerald-600 focus:ring-4 focus:ring-emerald-600/10 transition-all duration-200 outline-none" type="email" name="email" value="{{ old('email') }}" required placeholder="name@email.com" />
                <x-input-error :messages="$errors->get('email')" class="mt-1" />
            </div>

            <!-- Phone -->
            <div>
                <label for="phone" class="block text-sm font-semibold text-slate-700 mb-1">Phone Number</label>
                <input id="phone" class="block w-full px-4 py-2.5 rounded-xl border-slate-200 bg-slate-50/50 focus:bg-white focus:border-emerald-600 focus:ring-4 focus:ring-emerald-600/10 transition-all duration-200 outline-none" type="text" name="phone" value="{{ old('phone') }}" placeholder="03XXXXXXXXX" />
                <x-input-error :messages="$errors->get('phone')" class="mt-1" />
            </div>

          

            <!-- Password -->
            <div>
                <label for="password" class="block text-sm font-semibold text-slate-700 mb-1">Password</label>
                <div class="relative">
                    <input id="password" class="block w-full px-4 py-2.5 rounded-xl border-slate-200 bg-slate-50/50 focus:bg-white focus:border-emerald-600 focus:ring-4 focus:ring-emerald-600/10 transition-all duration-200 outline-none pr-12"
                                    type="password"
                                    name="password"
                                    required placeholder="••••••••" />
                    <button type="button" onclick="togglePassword('password')" class="absolute right-4 top-1/2 -translate-y-1/2 text-slate-400 hover:text-emerald-600 transition-colors focus:outline-none">
                        <i class="fa-solid fa-eye" id="password-icon"></i>
                    </button>
                </div>
                <x-input-error :messages="$errors->get('password')" class="mt-1" />
            </div>

            <!-- Confirm Password -->
            <div>
                <label for="password_confirmation" class="block text-sm font-semibold text-slate-700 mb-1">Confirm Password</label>
                <div class="relative">
                    <input id="password_confirmation" class="block w-full px-4 py-2.5 rounded-xl border-slate-200 bg-slate-50/50 focus:bg-white focus:border-emerald-600 focus:ring-4 focus:ring-emerald-600/10 transition-all duration-200 outline-none pr-12"
                                    type="password"
                                    name="password_confirmation" required placeholder="••••••••" />
                    <button type="button" onclick="togglePassword('password_confirmation')" class="absolute right-4 top-1/2 -translate-y-1/2 text-slate-400 hover:text-emerald-600 transition-colors focus:outline-none">
                        <i class="fa-solid fa-eye" id="password_confirmation-icon"></i>
                    </button>
                </div>
                <x-input-error :messages="$errors->get('password_confirmation')" class="mt-1" />
            </div>
        </div>
          <!-- Address -->
            <div class="md:col-span-2">
                <label for="address" class="block text-sm font-semibold text-slate-700 mb-1">Address (Optional)</label>
                <textarea id="address" rows="2" class="block w-full px-4 py-2.5 rounded-xl border-slate-200 bg-slate-50/50 focus:bg-white focus:border-emerald-600 focus:ring-4 focus:ring-emerald-600/10 transition-all duration-200 outline-none resize-none" name="address" placeholder="Your current home address">{{ old('address') }}</textarea>
                <x-input-error :messages="$errors->get('address')" class="mt-1" />
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

        <div>
            <button type="submit" class="w-full flex justify-center items-center px-6 py-4 rounded-xl primary-btn text-sm font-bold shadow-xl active:scale-[0.98]">
                Create your account
            </button>
        </div>

        <div class="pt-4 text-center">
            <p class="text-sm text-slate-500 font-medium">
                Already registered? 
                <a href="{{ route('login') }}" class="text-emerald-700 font-bold hover:text-emerald-600 underline-offset-4 hover:underline">Log in here</a>
            </p>
        </div>
    </form>
</x-guest-layout>


