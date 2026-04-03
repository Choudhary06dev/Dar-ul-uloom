@extends('layouts.frontend')

@section('title', 'Profile Settings')

@section('content')
<div class="bg-gray-50 min-h-screen py-12">
    <div class="container mx-auto px-4 max-w-4xl">
        
        <!-- Page Header -->
        <div class="mb-10 flex flex-col md:flex-row md:items-end md:justify-between space-y-4 md:space-y-0">
            <div>
                <nav class="flex mb-4 text-sm text-gray-500 font-medium" aria-label="Breadcrumb">
                    <ol class="flex items-center space-x-2">
                        <li><a href="{{ route('frontend.index') }}" class="hover:text-gold transition text-gray-400">Home</a></li>
                        <li><i class="fas fa-chevron-right text-[10px] mx-1 text-gray-300"></i></li>
                        <li><a href="{{ route('frontend.profile.dashboard') }}" class="hover:text-gold transition text-gray-400">Dashboard</a></li>
                        <li><i class="fas fa-chevron-right text-[10px] mx-1 text-gray-300"></i></li>
                        <li class="text-gold font-bold">Settings</li>
                    </ol>
                </nav>
                <h1 class="text-3xl md:text-4xl font-extrabold text-navy tracking-tight">Account <span class="text-gold">Settings</span></h1>
                <p class="text-gray-500 mt-2 font-medium">Update your personal information and security preferences.</p>
            </div>
            <div>
                <a href="{{ route('frontend.profile.dashboard') }}" class="px-6 py-3 bg-navy text-white font-bold rounded-xl hover:bg-slate-800 transition shadow-lg flex items-center text-sm uppercase tracking-wider">
                    <i class="fas fa-arrow-left mr-2"></i> Back to Dashboard
                </a>
            </div>
        </div>

        @if (session('status') === 'profile-updated' || session('status') === 'password-updated')
            <div class="p-5 mb-8 rounded-2xl bg-emerald-50 border border-emerald-100 text-emerald-700 text-sm font-bold flex items-center shadow-sm">
                <i class="fas fa-check-circle mr-3 text-lg"></i>
                {{ session('status') === 'profile-updated' ? 'Profile information has been updated successfully.' : 'Your password has been changed successfully.' }}
            </div>
        @endif

        <div class="space-y-10 pb-12">
            
            <!-- Section 1: Profile Information -->
            <div class="bg-white rounded-2xl shadow-xl border border-gray-100 overflow-hidden">
                <div class="px-8 py-6 border-b border-gray-50 bg-white">
                    <h3 class="text-xl font-bold text-navy flex items-center">
                        <i class="fas fa-user-circle mr-3 text-gold"></i> Profile Information
                    </h3>
                    <p class="text-xs text-gray-400 mt-1 font-medium italic">Update your account's public name and email address.</p>
                </div>
                
                <div class="p-8">
                    <form method="post" action="{{ route('frontend.profile.update') }}" class="space-y-6">
                        @csrf
                        @method('patch')

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                            <!-- Name -->
                            <div>
                                <label for="name" class="block text-xs font-bold text-gray-500 uppercase tracking-widest mb-2 ml-1">Full Name</label>
                                <div class="relative group">
                                    <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none text-gray-400 group-focus-within:text-gold transition">
                                        <i class="fas fa-user text-sm"></i>
                                    </div>
                                    <input id="name" name="name" type="text" 
                                        class="block w-full pl-11 pr-4 py-3.5 rounded-xl border border-gray-200 bg-gray-50/30 focus:bg-white focus:border-gold focus:ring-4 focus:ring-gold/5 transition-all duration-300 outline-none text-navy font-semibold text-sm" 
                                        value="{{ old('name', $user->name) }}" required autofocus />
                                </div>
                                <x-input-error class="mt-2 text-xs" :messages="$errors->get('name')" />
                            </div>

                            <!-- Email -->
                            <div>
                                <label for="email" class="block text-xs font-bold text-gray-500 uppercase tracking-widest mb-2 ml-1">Email Address</label>
                                <div class="relative group">
                                    <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none text-gray-400 group-focus-within:text-gold transition">
                                        <i class="fas fa-envelope text-sm"></i>
                                    </div>
                                    <input id="email" name="email" type="email" 
                                        class="block w-full pl-11 pr-4 py-3.5 rounded-xl border border-gray-200 bg-gray-50/30 focus:bg-white focus:border-gold focus:ring-4 focus:ring-gold/5 transition-all duration-300 outline-none text-navy font-semibold text-sm" 
                                        value="{{ old('email', $user->email) }}" required />
                                </div>
                                <x-input-error class="mt-2 text-xs" :messages="$errors->get('email')" />
                            </div>
                        </div>

                        <div class="pt-4 flex justify-end">
                            <button type="submit" class="px-10 py-3.5 bg-gold text-white font-bold rounded-xl shadow-lg hover:shadow-gold/20 hover:-translate-y-1 transition duration-300 uppercase tracking-widest text-xs flex items-center">
                                <i class="fas fa-save mr-2"></i> Save Changes
                            </button>
                        </div>
                    </form>
                </div>
            </div>

            <!-- Section 2: Security / Password -->
            <div class="bg-white rounded-2xl shadow-xl border border-gray-100 overflow-hidden">
                <div class="px-8 py-6 border-b border-gray-50 bg-white">
                    <h3 class="text-xl font-bold text-navy flex items-center">
                        <i class="fas fa-shield-alt mr-3 text-gold"></i> Security Settings
                    </h3>
                    <p class="text-xs text-gray-400 mt-1 font-medium italic">Ensure your account is using a long, random password to stay secure.</p>
                </div>
                
                <div class="p-8">
                    <form method="post" action="{{ route('frontend.profile.password') }}" class="space-y-6">
                        @csrf
                        @method('put')

                        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                            <!-- Current Password -->
                            <div>
                                <label for="current_password" class="block text-xs font-bold text-gray-500 uppercase tracking-widest mb-2 ml-1">Current Password</label>
                                <div class="relative group">
                                    <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none text-gray-400 group-focus-within:text-gold transition">
                                        <i class="fas fa-lock text-sm"></i>
                                    </div>
                                    <input id="current_password" name="current_password" type="password" 
                                        class="block w-full pl-11 pr-4 py-3.5 rounded-xl border border-gray-200 bg-gray-50/30 focus:bg-white focus:border-gold focus:ring-4 focus:ring-gold/5 transition-all duration-300 outline-none text-navy font-semibold text-sm" 
                                        placeholder="••••••••" autocomplete="current-password" />
                                </div>
                                <x-input-error :messages="$errors->updatePassword->get('current_password')" class="mt-2 text-xs" />
                            </div>

                            <!-- New Password -->
                            <div>
                                <label for="password" class="block text-xs font-bold text-gray-500 uppercase tracking-widest mb-2 ml-1">New Password</label>
                                <div class="relative group">
                                    <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none text-gray-400 group-focus-within:text-gold transition">
                                        <i class="fas fa-key text-sm"></i>
                                    </div>
                                    <input id="password" name="password" type="password" 
                                        class="block w-full pl-11 pr-4 py-3.5 rounded-xl border border-gray-200 bg-gray-50/30 focus:bg-white focus:border-gold focus:ring-4 focus:ring-gold/5 transition-all duration-300 outline-none text-navy font-semibold text-sm" 
                                        placeholder="••••••••" autocomplete="new-password" />
                                </div>
                                <x-input-error :messages="$errors->updatePassword->get('password')" class="mt-2 text-xs" />
                            </div>

                            <!-- Confirm -->
                            <div>
                                <label for="password_confirmation" class="block text-xs font-bold text-gray-500 uppercase tracking-widest mb-2 ml-1">Confirm New Password</label>
                                <div class="relative group">
                                    <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none text-gray-400 group-focus-within:text-gold transition">
                                        <i class="fas fa-check-double text-sm"></i>
                                    </div>
                                    <input id="password_confirmation" name="password_confirmation" type="password" 
                                        class="block w-full pl-11 pr-4 py-3.5 rounded-xl border border-gray-200 bg-gray-50/30 focus:bg-white focus:border-gold focus:ring-4 focus:ring-gold/5 transition-all duration-300 outline-none text-navy font-semibold text-sm" 
                                        placeholder="••••••••" autocomplete="new-password" />
                                </div>
                                <x-input-error :messages="$errors->updatePassword->get('password_confirmation')" class="mt-2 text-xs" />
                            </div>
                        </div>

                        <div class="pt-4 flex justify-end">
                            <button type="submit" class="px-10 py-3.5 bg-navy text-white font-bold rounded-xl shadow-lg hover:bg-slate-800 hover:-translate-y-1 transition duration-300 uppercase tracking-widest text-xs flex items-center">
                                <i class="fas fa-shield-alt mr-2 text-gold"></i> Update Password
                            </button>
                        </div>
                    </form>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection
