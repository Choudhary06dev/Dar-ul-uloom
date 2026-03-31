<x-guest-layout>
    <div class="mb-6 text-center">
        <h2 class="text-3xl font-extrabold text-slate-900 tracking-tight">Create an account</h2>
        <p class="text-slate-500 mt-1 font-medium">Join Dar-ul-uloom for Admission & More</p>
    </div>

    <form method="POST" action="{{ route('register') }}" class="space-y-4">
        @csrf

        <div class="grid grid-cols-1 md:grid-cols-2 gap-x-6 gap-y-4">
            <!-- Name -->
            <div>
                <label for="name" class="block text-sm font-semibold text-slate-700 mb-1">Full Name</label>
                <input id="name" class="block w-full px-4 py-2.5 rounded-xl border-slate-200 bg-slate-50/50 focus:bg-white focus:border-emerald-600 focus:ring-4 focus:ring-emerald-600/10 transition-all duration-200 outline-none" type="text" name="name" value="{{ old('name') }}" required autofocus placeholder="John Doe" />
                <x-input-error :messages="$errors->get('name')" class="mt-1" />
            </div>

            <!-- Email Address -->
            <div>
                <label for="email" class="block text-sm font-semibold text-slate-700 mb-1">Email Address</label>
                <input id="email" class="block w-full px-4 py-2.5 rounded-xl border-slate-200 bg-slate-50/50 focus:bg-white focus:border-emerald-600 focus:ring-4 focus:ring-emerald-600/10 transition-all duration-200 outline-none" type="email" name="email" value="{{ old('email') }}" required placeholder="your@email.com" />
                <x-input-error :messages="$errors->get('email')" class="mt-1" />
            </div>

            <!-- Password -->
            <div>
                <label for="password" class="block text-sm font-semibold text-slate-700 mb-1">Password</label>
                <input id="password" class="block w-full px-4 py-2.5 rounded-xl border-slate-200 bg-slate-50/50 focus:bg-white focus:border-emerald-600 focus:ring-4 focus:ring-emerald-600/10 transition-all duration-200 outline-none"
                                type="password"
                                name="password"
                                required placeholder="••••••••" />
                <x-input-error :messages="$errors->get('password')" class="mt-1" />
            </div>

            <!-- Confirm Password -->
            <div>
                <label for="password_confirmation" class="block text-sm font-semibold text-slate-700 mb-1">Confirm Password</label>
                <input id="password_confirmation" class="block w-full px-4 py-2.5 rounded-xl border-slate-200 bg-slate-50/50 focus:bg-white focus:border-emerald-600 focus:ring-4 focus:ring-emerald-600/10 transition-all duration-200 outline-none"
                                type="password"
                                name="password_confirmation" required placeholder="••••••••" />
                <x-input-error :messages="$errors->get('password_confirmation')" class="mt-1" />
            </div>
        </div>

        <div>
            <button type="submit" class="w-full flex justify-center items-center px-6 py-4 rounded-xl primary-btn text-sm font-bold shadow-xl active:scale-[0.98]">
                Register
            </button>
        </div>

        <div class="pt-4 text-center">
            <p class="text-sm text-slate-500 font-medium">
                Already registered? 
                <a href="{{ route('login') }}" class="text-emerald-700 font-bold hover:text-emerald-600 underline-offset-4 hover:underline">Log in instead</a>
            </p>
        </div>
    </form>
</x-guest-layout>
