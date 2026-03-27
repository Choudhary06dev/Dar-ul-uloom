<x-guest-layout>
    <div class="mb-10 text-center">
        <h2 class="text-3xl font-extrabold text-slate-900 tracking-tight">Reset password</h2>
        <p class="text-slate-500 mt-2 font-medium">We'll send you a link to your email</p>
    </div>

    @if (session('status'))
        <div class="mb-6 p-4 rounded-xl bg-emerald-50 border border-emerald-100 text-emerald-700 text-sm font-medium animate-in fade-in slide-in-from-top-4 duration-300">
            {{ session('status') }}
        </div>
    @endif

    <form method="POST" action="{{ route('password.email') }}" class="space-y-6">
        @csrf

        <!-- Email Address -->
        <div>
            <label for="email" class="block text-sm font-semibold text-slate-700 mb-2">Email Address</label>
            <input id="email" class="block w-full px-4 py-3 rounded-xl border-slate-200 bg-slate-50/50 focus:bg-white focus:border-emerald-600 focus:ring-4 focus:ring-emerald-600/10 transition-all duration-200 outline-none" type="email" name="email" value="{{ old('email') }}" required autofocus placeholder="name@company.com" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <div>
            <button type="submit" class="w-full flex justify-center items-center px-6 py-4 rounded-xl primary-btn text-sm font-bold shadow-xl active:scale-[0.98]">
                Send reset link
            </button>
        </div>

        <div class="pt-4 text-center">
            <a href="{{ route('login') }}" class="text-sm font-bold text-emerald-700 hover:text-emerald-600 underline-offset-4 hover:underline">
                Back to login
            </a>
        </div>
    </form>

</x-guest-layout>


