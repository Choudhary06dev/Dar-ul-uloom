@extends('layouts.frontend')

@section('title', 'Admin Dashboard')

@section('content')
<div class="bg-gray-50 min-h-screen py-12">
    <div class="container mx-auto px-4">
        
        <!-- Dashboard Header -->
        <div class="mb-10 flex flex-col md:flex-row md:items-end md:justify-between space-y-4 md:space-y-0">
            <div>
                <nav class="flex mb-4 text-sm text-gray-500 font-medium" aria-label="Breadcrumb">
                    <ol class="flex items-center space-x-2">
                        <li><a href="{{ route('frontend.index') }}" class="hover:text-gold transition">Home</a></li>
                        <li><i class="fas fa-chevron-right text-[10px] mx-1"></i></li>
                        <li class="text-gold font-bold">Admin Dashboard</li>
                    </ol>
                </nav>
                <h1 class="text-3xl md:text-4xl font-extrabold text-navy tracking-tight">System <span class="text-gold">Dashboard</span></h1>
                <p class="text-gray-500 mt-2 font-medium">Monitoring and managing {{ config('app.name') }} operations.</p>
            </div>
            <div class="flex items-center space-x-3">
                <div class="px-6 py-3 bg-emerald-500 text-white rounded-xl shadow-lg shadow-emerald-200 font-bold flex items-center">
                    <i class="fas fa-check-circle mr-2 text-white"></i> SYSTEM ONLINE
                </div>
            </div>
        </div>

        <!-- Quick Stats Grid -->
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6 mb-10">
            <!-- Total Admissions -->
            <div class="bg-white rounded-2xl p-6 shadow-xl border border-gray-100 flex items-center group hover:-translate-y-1 transition-all duration-300">
                <div class="w-14 h-14 rounded-full bg-blue-50 flex items-center justify-center text-blue-600 text-2xl mr-4 group-hover:bg-blue-600 group-hover:text-white transition-colors">
                    <i class="fas fa-graduation-cap"></i>
                </div>
                <div>
                    <p class="text-[10px] uppercase tracking-widest text-gray-400 font-bold mb-0.5">Total Admissions</p>
                    <h3 class="text-2xl font-black text-navy">{{ $stats['admissions'] }}</h3>
                </div>
            </div>

            <!-- Pending Admissions -->
            <div class="bg-white rounded-2xl p-6 shadow-xl border border-gray-100 flex items-center group hover:-translate-y-1 transition-all duration-300">
                <div class="w-14 h-14 rounded-full bg-amber-50 flex items-center justify-center text-amber-600 text-2xl mr-4 group-hover:bg-amber-600 group-hover:text-white transition-colors">
                    <i class="fas fa-clock"></i>
                </div>
                <div>
                    <p class="text-[10px] uppercase tracking-widest text-gray-400 font-bold mb-0.5">Pending Review</p>
                    <h3 class="text-2xl font-black text-navy">{{ $stats['pending_admissions'] }}</h3>
                </div>
            </div>

            <!-- Approved Admissions -->
            <div class="bg-white rounded-2xl p-6 shadow-xl border border-gray-100 flex items-center group hover:-translate-y-1 transition-all duration-300">
                <div class="w-14 h-14 rounded-full bg-emerald-50 flex items-center justify-center text-emerald-600 text-2xl mr-4 group-hover:bg-emerald-600 group-hover:text-white transition-colors">
                    <i class="fas fa-check-double"></i>
                </div>
                <div>
                    <p class="text-[10px] uppercase tracking-widest text-gray-400 font-bold mb-0.5">Approved</p>
                    <h3 class="text-2xl font-black text-navy">{{ $stats['approved_admissions'] }}</h3>
                </div>
            </div>

            <!-- System Users -->
            <div class="bg-white rounded-2xl p-6 shadow-xl border border-gray-100 flex items-center group hover:-translate-y-1 transition-all duration-300">
                <div class="w-14 h-14 rounded-full bg-indigo-50 flex items-center justify-center text-indigo-600 text-2xl mr-4 group-hover:bg-indigo-600 group-hover:text-white transition-colors">
                    <i class="fas fa-users-cog"></i>
                </div>
                <div>
                    <p class="text-[10px] uppercase tracking-widest text-gray-400 font-bold mb-0.5">System Staff</p>
                    <h3 class="text-2xl font-black text-navy">{{ $stats['users'] }}</h3>
                </div>
            </div>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
            <!-- Management Shortcut Grid -->
            <div class="lg:col-span-2 space-y-8">
                <div class="bg-white rounded-2xl shadow-xl border border-gray-100 p-8">
                    <h3 class="text-xl font-bold text-navy mb-8 flex items-center">
                        <i class="fas fa-th-large mr-3 text-gold"></i> Quick Management
                    </h3>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <!-- Manage Admissions -->
                        <a href="{{ route('frontend.management.admissions.index') }}" class="group p-6 rounded-2xl bg-gray-50 border border-transparent hover:border-gold/30 hover:bg-white hover:shadow-xl transition-all duration-300">
                            <div class="flex items-start justify-between mb-4">
                                <div class="w-12 h-12 rounded-xl bg-gold/10 flex items-center justify-center text-gold group-hover:bg-gold group-hover:text-white transition-colors">
                                    <i class="fas fa-clipboard-list text-xl"></i>
                                </div>
                                <i class="fas fa-arrow-right text-gray-300 group-hover:text-gold group-hover:translate-x-1 transition-all"></i>
                            </div>
                            <h4 class="text-lg font-bold text-navy mb-1">Admissions Management</h4>
                            <p class="text-xs text-gray-500 leading-relaxed">Review incoming applications, approve students, and assign classes.</p>
                        </a>

                        <!-- Manage Profile -->
                        <a href="{{ route('frontend.profile.edit') }}" class="group p-6 rounded-2xl bg-gray-50 border border-transparent hover:border-gold/30 hover:bg-white hover:shadow-xl transition-all duration-300">
                            <div class="flex items-start justify-between mb-4">
                                <div class="w-12 h-12 rounded-xl bg-navy/10 flex items-center justify-center text-navy group-hover:bg-navy group-hover:text-white transition-colors">
                                    <i class="fas fa-user-circle text-xl"></i>
                                </div>
                                <i class="fas fa-arrow-right text-gray-300 group-hover:text-gold group-hover:translate-x-1 transition-all"></i>
                            </div>
                            <h4 class="text-lg font-bold text-navy mb-1">Account Settings</h4>
                            <p class="text-xs text-gray-500 leading-relaxed">Update your login details, change password and manage your session.</p>
                        </a>

                        <!-- Site Settings (Placeholder/Future) -->
                        <div class="group p-6 rounded-2xl bg-white border border-gray-100 opacity-60">
                             <div class="flex items-start justify-between mb-4">
                                <div class="w-12 h-12 rounded-xl bg-gray-100 flex items-center justify-center text-gray-400">
                                    <i class="fas fa-cog text-xl"></i>
                                </div>
                            </div>
                            <h4 class="text-lg font-bold text-gray-400 mb-1">Site Settings</h4>
                            <p class="text-xs text-gray-400 leading-relaxed">Global configuration for banner, namaz times, and contact info.</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Profile Overview Side -->
            <div class="lg:col-span-1 space-y-8">
                 <div class="bg-white rounded-2xl shadow-xl border border-gray-100 overflow-hidden">
                    <div class="h-24 bg-navy relative">
                        <div class="absolute inset-0 bg-gold/5 opacity-50"></div>
                    </div>
                    <div class="px-6 pb-8 text-center -mt-12 relative z-10">
                        <div class="inline-flex p-1 bg-white rounded-full mb-4 shadow-lg">
                            <div class="w-20 h-20 bg-navy rounded-full flex items-center justify-center text-gold text-3xl font-bold border-2 border-gold/20">
                                {{ strtoupper(substr($user->name, 0, 1)) }}
                            </div>
                        </div>
                        <h2 class="text-xl font-bold text-navy">{{ $user->name }}</h2>
                        <span class="inline-flex items-center px-4 py-1.5 rounded-full text-[10px] font-black bg-gold/10 text-gold uppercase tracking-[2px] mb-6">
                            {{ $user->role->name ?? 'Staff' }}
                        </span>
                        
                        <div class="flex justify-center space-x-2 pt-6 border-t border-gray-100">
                             <span class="text-[10px] text-gray-400 font-bold uppercase tracking-widest">Active Session</span>
                             <div class="w-2 h-2 rounded-full bg-emerald-500 animate-pulse mt-0.5"></div>
                        </div>
                    </div>
                </div>

                <!-- Restricted Access Info -->
                <div class="bg-navy rounded-2xl p-8 text-white shadow-xl relative overflow-hidden">
                    <div class="absolute top-0 right-0 p-4 opacity-10">
                        <i class="fas fa-shield-alt text-7xl"></i>
                    </div>
                    <h3 class="text-xl font-bold mb-4">Official Controls</h3>
                    <p class="text-gray-400 text-sm mb-8 leading-relaxed">This dashboard provides all official management tools. All actions taken here are logged for security.</p>
                    <div class="w-full justify-center inline-flex items-center px-6 py-4 bg-gold/10 text-gold font-bold rounded-xl border border-gold/20 tracking-widest text-xs">
                        <i class="fas fa-user-shield mr-3"></i> AUTHORIZED PERSONNEL ONLY
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
