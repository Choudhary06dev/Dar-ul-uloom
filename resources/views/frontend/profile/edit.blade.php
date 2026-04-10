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

        @if (session('status') === 'profile-updated' || session('status') === 'password-updated' || session('status') === 'image-updated')
        <div class="p-5 mb-8 rounded-2xl bg-emerald-50 border border-emerald-100 text-emerald-700 text-sm font-bold flex items-center shadow-sm">
            <i class="fas fa-check-circle mr-3 text-lg"></i>
            @if(session('status') === 'profile-updated') Profile information has been updated successfully.
            @elseif(session('status') === 'password-updated') Your password has been changed successfully.
            @else Profile picture has been updated successfully.
            @endif
        </div>
        @endif

        @if(session('error'))
        <div class="p-5 mb-8 rounded-2xl bg-red-50 border border-red-100 text-red-700 text-sm font-bold flex items-center shadow-sm">
            <i class="fas fa-exclamation-circle mr-3 text-lg"></i> {{ session('error') }}
        </div>
        @endif

        <div class="space-y-10 pb-12">

            {{-- Profile Picture Section (Students with admission only) --}}
            @if(auth('student')->check())
            <div class="bg-white rounded-2xl shadow-xl border border-gray-100 overflow-hidden">
                <div class="px-8 py-6 border-b border-gray-50 bg-white">
                    <h3 class="text-xl font-bold text-navy flex items-center">
                        <i class="fas fa-camera mr-3 text-gold"></i> Profile Picture
                    </h3>
                    <p class="text-xs text-gray-400 mt-1 font-medium italic">Update your profile photo shown across the site.</p>
                </div>

                <div class="p-8">
                    @if(isset($admission) && $admission)
                    <form method="post" action="{{ route('frontend.profile.image') }}" enctype="multipart/form-data" class="flex flex-col sm:flex-row items-center gap-8">
                        @csrf
                        @method('patch')

                        {{-- Current preview --}}
                        <div class="shrink-0">
                            <div id="img-preview-wrapper" class="w-28 h-28 rounded-full overflow-hidden border-4 border-gold/20 shadow-lg relative group cursor-pointer" onclick="document.getElementById('profile_image_input').click()">
                                @if($admission->image)
                                    <img id="img-preview" src="{{ asset('storage/app/public/' . $admission->image) }}" alt="Profile" class="w-full h-full object-cover" style="object-position: center 10%;">
                                @else
                                    <div id="img-preview" class="w-full h-full bg-gold/10 flex items-center justify-center text-gold text-4xl font-bold">
                                        {{ strtoupper(substr($user->name, 0, 1)) }}
                                    </div>
                                @endif
                                <div class="absolute inset-0 bg-black/50 flex items-center justify-center opacity-0 group-hover:opacity-100 transition-opacity rounded-full">
                                    <i class="fas fa-camera text-white text-xl"></i>
                                </div>
                            </div>
                        </div>

                        {{-- Upload controls --}}
                        <div class="flex-1 w-full">
                            <label class="block text-xs font-bold text-gray-500 uppercase tracking-widest mb-3 ml-1">Choose New Photo</label>
                            <div class="relative">
                                <input id="profile_image_input" name="profile_image" type="file" accept="image/jpeg,image/png,image/jpg"
                                    class="block w-full text-sm text-gray-600 file:mr-4 file:py-3 file:px-6 file:rounded-xl file:border-0 file:text-xs file:font-bold file:bg-gold/10 file:text-gold hover:file:bg-gold/20 file:transition cursor-pointer border border-gray-200 rounded-xl p-2 bg-gray-50/50 focus:outline-none focus:border-gold"
                                    onchange="previewImage(this)">
                            </div>
                            <p class="text-[10px] text-gray-400 mt-2 ml-1">Accepted formats: JPG, PNG &bull; Max size: 2MB</p>
                            <x-input-error class="mt-2 text-xs" :messages="$errors->get('profile_image')" />

                            <div class="mt-5">
                                <button type="submit" class="px-8 py-3 bg-gold text-white font-bold rounded-xl shadow-lg hover:shadow-gold/20 hover:-translate-y-0.5 transition duration-300 uppercase tracking-widest text-xs flex items-center">
                                    <i class="fas fa-upload mr-2"></i> Upload Photo
                                </button>
                            </div>
                        </div>
                    </form>
                    @else
                    <div class="flex items-center p-5 bg-amber-50 rounded-xl border border-amber-100 text-amber-700">
                        <i class="fas fa-info-circle mr-3 text-xl"></i>
                        <div>
                            <p class="text-sm font-bold">No Admission Record Found</p>
                            <p class="text-xs mt-1">You need to submit an admission application before you can upload a profile picture.</p>
                        </div>
                    </div>
                    @endif
                </div>
            </div>
            @endif

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

@push('scripts')
<script>
    function previewImage(input) {
        if (input.files && input.files[0]) {
            const reader = new FileReader();
            const wrapper = document.getElementById('img-preview-wrapper');
            reader.onload = function(e) {
                // replace inner content with actual img
                wrapper.innerHTML = `
                    <img id="img-preview" src="${e.target.result}" class="w-full h-full object-cover" style="object-position: center 10%;">
                    <div class="absolute inset-0 bg-black/50 flex items-center justify-center opacity-0 group-hover:opacity-100 transition-opacity rounded-full">
                        <i class="fas fa-camera text-white text-xl"></i>
                    </div>`;
            };
            reader.readAsDataURL(input.files[0]);
        }
    }
</script>
@endpush