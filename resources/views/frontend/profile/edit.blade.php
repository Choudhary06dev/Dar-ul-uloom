@extends('layouts.frontend')

@section('title', 'My Profile')

@section('content')
<div class="py-12 bg-gray-50/50" style="min-height: calc(100vh - 100px);">
    <div class="container mx-auto px-4 max-w-4xl space-y-8">

        <!-- Page Header -->
        <div class="mb-8">
            <h2 class="text-3xl font-extrabold text-slate-900 tracking-tight">My Profile</h2>
            <p class="text-slate-500 mt-2 font-medium">Manage your personal information and security settings.</p>
        </div>

        @if (session('status') === 'profile-updated')
            <div class="p-4 mb-4 rounded-xl bg-emerald-50 border border-emerald-100 text-emerald-700 text-sm font-medium">
                Profile updated successfully.
            </div>
        @endif

        @if (session('status') === 'password-updated')
            <div class="p-4 mb-4 rounded-xl bg-emerald-50 border border-emerald-100 text-emerald-700 text-sm font-medium">
                Password updated successfully.
            </div>
        @endif

        <!-- Profile Information -->
        <div class="p-6 sm:p-8 bg-white shadow-sm sm:rounded-xl border border-gray-100">
            <div class="max-w-xl">
                <section>
                    <header>
                        <h2 class="text-xl font-bold text-gray-900">
                            Profile Information
                        </h2>
                        <p class="mt-1 text-sm text-gray-600">
                            Update your account's profile information and email address.
                        </p>
                    </header>

                    <form method="post" action="{{ route('frontend.profile.update') }}" class="mt-6 space-y-6">
                        @csrf
                        @method('patch')

                        <div>
                            <label for="name" class="block text-sm font-semibold text-slate-700 mb-2">Name</label>
                            <input id="name" name="name" type="text" class="block w-full px-4 py-3 rounded-xl border-slate-200 bg-slate-50/50 focus:bg-white focus:border-emerald-600 focus:ring-4 focus:ring-emerald-600/10 transition-all duration-200 outline-none" value="{{ old('name', $user->name) }}" required autofocus />
                            <x-input-error class="mt-2" :messages="$errors->get('name')" />
                        </div>

                        <div>
                            <label for="email" class="block text-sm font-semibold text-slate-700 mb-2">Email</label>
                            <input id="email" name="email" type="email" class="block w-full px-4 py-3 rounded-xl border-slate-200 bg-slate-50/50 focus:bg-white focus:border-emerald-600 focus:ring-4 focus:ring-emerald-600/10 transition-all duration-200 outline-none" value="{{ old('email', $user->email) }}" required />
                            <x-input-error class="mt-2" :messages="$errors->get('email')" />
                        </div>

                        <div class="flex items-center gap-4">
                            <button type="submit" class="px-6 py-3 rounded-xl primary-btn text-sm font-bold shadow-lg active:scale-[0.98]">
                                Save Changes
                            </button>
                        </div>
                    </form>
                </section>
            </div>
        </div>

        <!-- Update Password -->
        <div class="p-6 sm:p-8 bg-white shadow-sm sm:rounded-xl border border-gray-100">
            <div class="max-w-xl">
                <section>
                    <header>
                        <h2 class="text-xl font-bold text-gray-900">
                            Update Password
                        </h2>
                        <p class="mt-1 text-sm text-gray-600">
                            Ensure your account is using a long, random password to stay secure.
                        </p>
                    </header>

                    <form method="post" action="{{ route('frontend.profile.password') }}" class="mt-6 space-y-6">
                        @csrf
                        @method('put')

                        <div>
                            <label for="current_password" class="block text-sm font-semibold text-slate-700 mb-2">Current Password</label>
                            <input id="current_password" name="current_password" type="password" class="block w-full px-4 py-3 rounded-xl border-slate-200 bg-slate-50/50 focus:bg-white focus:border-emerald-600 focus:ring-4 focus:ring-emerald-600/10 transition-all duration-200 outline-none" autocomplete="current-password" />
                            <x-input-error :messages="$errors->updatePassword->get('current_password')" class="mt-2" />
                        </div>

                        <div>
                            <label for="password" class="block text-sm font-semibold text-slate-700 mb-2">New Password</label>
                            <input id="password" name="password" type="password" class="block w-full px-4 py-3 rounded-xl border-slate-200 bg-slate-50/50 focus:bg-white focus:border-emerald-600 focus:ring-4 focus:ring-emerald-600/10 transition-all duration-200 outline-none" autocomplete="new-password" />
                            <x-input-error :messages="$errors->updatePassword->get('password')" class="mt-2" />
                        </div>

                        <div>
                            <label for="password_confirmation" class="block text-sm font-semibold text-slate-700 mb-2">Confirm Password</label>
                            <input id="password_confirmation" name="password_confirmation" type="password" class="block w-full px-4 py-3 rounded-xl border-slate-200 bg-slate-50/50 focus:bg-white focus:border-emerald-600 focus:ring-4 focus:ring-emerald-600/10 transition-all duration-200 outline-none" autocomplete="new-password" />
                            <x-input-error :messages="$errors->updatePassword->get('password_confirmation')" class="mt-2" />
                        </div>

                        <div class="flex items-center gap-4">
                            <button type="submit" class="px-6 py-3 rounded-xl primary-btn text-sm font-bold shadow-lg active:scale-[0.98]">
                                Update Password
                            </button>
                        </div>
                    </form>
                </section>
            </div>
        </div>

    </div>
</div>
@endsection
