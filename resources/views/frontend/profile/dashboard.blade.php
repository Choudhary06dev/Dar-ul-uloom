@extends('layouts.frontend')

@section('title', 'My Dashboard')

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
                        <li class="text-gold font-bold">Dashboard</li>
                    </ol>
                </nav>
                <h1 class="text-3xl md:text-4xl font-extrabold text-navy tracking-tight">Welcome Back, <span class="text-gold">{{ $user->name }}</span>!</h1>
                <p class="text-gray-500 mt-2 font-medium">Manage your profile and track your academic journey.</p>
            </div>

        </div>

        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">

            <!-- Left Column: User Overview -->
            <div class="lg:col-span-1 space-y-8">
                <!-- Profile Card -->
                <div class="bg-white rounded-2xl shadow-xl border border-gray-100 overflow-hidden">
                    <div class="h-24 bg-gradient-to-r from-navy to-slate-800"></div>
                    <div class="px-6 pb-8 text-center -mt-12">
                        <div class="inline-flex p-1 bg-white rounded-full mb-4 shadow-lg relative z-10 transition-transform hover:scale-105">
                            @if(isset($admission) && $admission->image)
                            <img src="{{ asset('storage/' . $admission->image) }}" alt="Profile Picture" class="w-28 h-28 rounded-full object-cover border-2 border-gold/20" style="object-position: center 10%;">
                            @else
                            <div class="w-28 h-28 bg-gold/10 rounded-full flex items-center justify-center text-gold text-4xl font-bold border-2 border-gold/20">
                                {{ strtoupper(substr($user->name, 0, 1)) }}
                            </div>
                            @endif
                        </div>
                        <h2 class="text-xl font-bold text-navy">{{ $user->name }}</h2>
                        <p class="text-gray-500 text-sm mb-6">{{ $user->email }}</p>

                        <div class="grid grid-cols-2 gap-4 pt-6 border-t border-gray-100">
                            <div>
                                <p class="text-[10px] uppercase tracking-wider text-gray-400 font-bold mb-1 leading-none">Account Type</p>
                                <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-[10px] font-bold bg-blue-50 text-blue-700 uppercase">
                                    Student
                                </span>
                            </div>
                            <div>
                                <p class="text-[10px] uppercase tracking-wider text-gray-400 font-bold mb-1 leading-none">Member Since</p>
                                <p class="text-sm font-bold text-navy">{{ $user->created_at->format('M Y') }}</p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Support Box -->
                <div class="bg-navy rounded-2xl p-6 text-white shadow-xl relative overflow-hidden">
                    <div class="absolute -right-8 -bottom-8 opacity-10 text-9xl">
                        <i class="fas fa-question-circle"></i>
                    </div>
                    <h3 class="text-lg font-bold mb-3 relative z-10">Need Help?</h3>
                    <p class="text-gray-400 text-sm mb-6 relative z-10 leading-relaxed">Have questions about your admission or need technical support? Our team is here 24/7.</p>
                    <a href="{{ route('frontend.contact') }}" class="inline-flex items-center text-gold font-bold text-sm hover:translate-x-2 transition-transform duration-300">
                        Contact Support <i class="fas fa-arrow-right ml-2"></i>
                    </a>
                </div>
            </div>

            <!-- Right Column: Admission Status & Content -->
            <div class="lg:col-span-2 space-y-8">

                @if($admission)
                <!-- Application Roadmap Section -->
                <div class="bg-white rounded-2xl shadow-xl border border-gray-100 p-8 lg:p-12">

                    <div class="flex flex-col md:flex-row md:items-center justify-between mb-10 space-y-4 md:space-y-0">
                        <div class="flex items-center space-x-4">
                            <h3 class="text-2xl font-extrabold text-navy flex items-center">
                                <i class="fas fa-graduation-cap text-gold mr-3 text-3xl"></i> Admission Status
                            </h3>
                            @php
                            $badgeClass = 'bg-amber-50 text-amber-600 border border-amber-200';
                            if($admission->status == 'Approved') $badgeClass = 'bg-emerald-50 text-emerald-600 border border-emerald-200';
                            if($admission->status == 'Rejected') $badgeClass = 'bg-red-50 text-red-600 border border-red-200';
                            @endphp
                            <span class="px-3 py-1 text-[11px] uppercase font-bold tracking-widest rounded-full shadow-sm {{ $badgeClass }}">
                                {{ $admission->status }}
                            </span>
                        </div>
                        <div class="flex items-center space-x-3">
                            @if($admission->status == 'Approved')
                            <a href="{{ route('frontend.admission.print', $admission) }}" target="_blank" class="px-4 py-1.5 bg-navy text-white rounded-xl shadow-lg shadow-navy/20 text-[10px] font-bold hover:bg-gold transition-all flex items-center">
                                <i class="fas fa-print mr-2 text-gold"></i> PRINT SLIP
                            </a>
                            @endif
                            <div class="bg-gray-100 text-gray-500 text-[11px] font-bold px-4 py-2 rounded-full tracking-wider border border-gray-200 shadow-inner">
                                APPLICATION ID: <span class="text-navy">#ADM-{{ str_pad($admission->id, 5, '0', STR_PAD_LEFT) }}</span>
                            </div>
                        </div>
                    </div>

                    <!-- Status Timeline -->
                    <div class="relative max-w-2xl mx-auto py-4">
                        <!-- Background line -->
                        <div class="absolute top-5 left-0 w-full h-1 bg-gray-100 rounded-full"></div>

                        <!-- Active Line -->
                        @php
                        $status_width = '15%'; // just reaching the first dot
                        if($admission->status == 'Pending') $status_width = '50%'; // reaches the second dot
                        if(in_array($admission->status, ['Approved', 'Rejected'])) $status_width = '100%'; // reaches end
                        @endphp
                        <div class="absolute top-5 left-0 h-1 bg-gold rounded-full transition-all duration-1000 shadow-[0_0_10px_rgba(202,165,70,0.5)]" style="width: {{ $status_width }}"></div>

                        <div class="relative flex justify-between">
                            <!-- Step 1: Submitted -->
                            <div class="text-center group w-1/3">
                                <div class="w-10 h-10 rounded-full flex items-center justify-center mx-auto mb-3 border-2 transition-colors duration-300 bg-gold border-gold text-white shadow-lg shadow-gold/30">
                                    <i class="fas fa-file-alt text-sm"></i>
                                </div>
                                <p class="text-xs font-bold text-navy">Submitted</p>
                                <p class="text-[10px] text-gray-400 mt-1">{{ $admission->created_at->format('d M') }}</p>
                            </div>

                            <!-- Step 2: Processing (Review) -->
                            <div class="text-center group w-1/3">
                                <div class="w-10 h-10 rounded-full flex items-center justify-center mx-auto mb-3 border-2 transition-colors duration-300 {{ in_array($admission->status, ['Pending', 'Approved', 'Rejected']) ? 'bg-gold border-gold text-white shadow-lg shadow-gold/30' : 'bg-white border-gray-200 text-gray-400' }}">
                                    <i class="fas fa-sync text-sm {{ $admission->status == 'Pending' ? 'fa-spin' : '' }}"></i>
                                </div>
                                <p class="text-xs font-bold {{ in_array($admission->status, ['Pending', 'Approved', 'Rejected']) ? 'text-navy' : 'text-gray-400' }}">In Review</p>
                                @if($admission->status == 'Pending')
                                <p class="text-[10px] text-amber-500 font-bold mt-1 tracking-wider uppercase">Current</p>
                                @endif
                            </div>

                            <!-- Step 3: Final Status -->
                            <div class="text-center group w-1/3">
                                <div class="w-10 h-10 rounded-full flex items-center justify-center mx-auto mb-3 border-2 transition-colors duration-300 
                                        @if($admission->status == 'Approved') bg-emerald-500 border-emerald-500 text-white shadow-emerald-200 shadow-lg
                                        @elseif($admission->status == 'Rejected') bg-red-500 border-red-500 text-white shadow-red-200 shadow-lg
                                        @else bg-white border-gray-200 text-gray-400 @endif">
                                    <i class="fas {{ $admission->status == 'Rejected' ? 'fa-times' : ($admission->status == 'Approved' ? 'fa-check' : 'fa-flag-checkered') }} text-sm"></i>
                                </div>
                                <p class="text-xs font-bold 
                                        @if($admission->status == 'Approved') text-emerald-600
                                        @elseif($admission->status == 'Rejected') text-red-600
                                        @else text-gray-400 @endif">
                                    {{ in_array($admission->status, ['Approved', 'Rejected']) ? $admission->status : 'Decision' }}
                                </p>
                            </div>
                        </div>
                    </div>

                    <!-- Admission Details Summary -->
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-x-12 gap-y-6 mt-8 bg-gray-50 rounded-2xl p-8 border border-gray-100">
                        <div>
                            <label class="text-[10px] uppercase font-bold text-gray-400 tracking-widest block mb-1">Student Name / طالب کا نام</label>
                            <p class="text-sm font-bold text-navy">{{ $admission->student_name }}</p>
                        </div>
                        <div>
                            <label class="text-[10px] uppercase font-bold text-gray-400 tracking-widest block mb-1">Applied Course / کورس</label>
                            <p class="text-sm font-bold text-navy">{{ $admission->course_selection }}</p>
                        </div>
                        <div>
                            <label class="text-[10px] uppercase font-bold text-gray-400 tracking-widest block mb-1">Father Name / والد کا نام</label>
                            <p class="text-sm font-bold text-navy">{{ $admission->father_name }}</p>
                        </div>
                        <div>
                            <label class="text-[10px] uppercase font-bold text-gray-400 tracking-widest block mb-1">Assigned Class / کلاس</label>
                            <p class="text-sm font-bold text-navy {{ !$admission->class_assigned ? 'italic text-gray-400 font-medium' : '' }}">{{ $admission->class_assigned ?? 'Not assigned yet' }}</p>
                        </div>
                    </div>

                    @if($admission->remarks)
                    <div class="mt-6 p-5 bg-gold/5 border-l-4 border-gold rounded-r-2xl">
                        <label class="text-[10px] uppercase font-bold text-gold tracking-widest block mb-1">Remarks from Office</label>
                        <p class="text-sm text-navy italic leading-relaxed">{{ $admission->remarks }}</p>
                    </div>
                    @else
                    <div class="mt-6 flex items-center text-xs text-gray-500 bg-gray-50 p-4 rounded-xl border border-gray-100">
                        <i class="fas fa-info-circle mr-3 text-gold"></i>
                        <span>Your application is currently being reviewed by our office. You will be notified once a class is assigned.</span>
                    </div>
                    @endif

                    <!-- Detailed Info Toggle (Optional for cleaner UI) -->
                    <div class="mt-10 pt-6 border-t border-gray-100">
                        <h4 class="text-sm font-bold text-navy mb-4 uppercase tracking-wider">Application Details</h4>
                        <div class="grid grid-cols-2 md:grid-cols-4 gap-6">
                            <div>
                                <p class="text-[10px] text-gray-400 font-bold uppercase">Date of Birth</p>
                                <p class="text-xs font-bold text-navy">{{ \Carbon\Carbon::parse($admission->dob)->format('d M, Y') }} ({{ $admission->age }} yrs)</p>
                            </div>
                            <div>
                                <p class="text-[10px] text-gray-400 font-bold uppercase">Gender</p>
                                <p class="text-xs font-bold text-navy">{{ $admission->gender }}</p>
                            </div>
                            <div>
                                <p class="text-[10px] text-gray-400 font-bold uppercase">B-Form / CNIC</p>
                                <p class="text-xs font-bold text-navy">{{ $admission->b_form ?? 'Not provided' }}</p>
                            </div>
                            <div>
                                <p class="text-[10px] text-gray-400 font-bold uppercase">City</p>
                                <p class="text-xs font-bold text-navy">{{ $admission->city }}</p>
                            </div>
                        </div>
                    </div>
                </div>
                @else
                <!-- Empty State: No Admission -->
                <div class="bg-white rounded-2xl shadow-xl border-2 border-dashed border-gray-200 p-12 text-center transition-all hover:border-gold/30">
                    <div class="w-20 h-20 bg-gold/10 rounded-full flex items-center justify-center text-gold text-3xl mx-auto mb-6">
                        <i class="fas fa-clipboard-list"></i>
                    </div>
                    <h3 class="text-2xl font-bold text-navy mb-4">No Admission Forms Found</h3>
                    <p class="text-gray-500 max-w-md mx-auto mb-8 leading-relaxed font-medium">You haven't submitted any admission forms yet. Start your journey with Anwaar-e-Mustafa BOR today!</p>
                    <a href="{{ route('frontend.admission.create') }}" class="inline-flex items-center px-10 py-4 bg-gold text-white font-bold rounded-xl shadow-lg hover:shadow-gold/30 hover:-translate-y-1 transition duration-300 uppercase tracking-widest text-sm">
                        <i class="fas fa-plus mr-2"></i> Apply for Admission Now
                    </a>
                </div>
                @endif

                <!-- Profile Information Card -->
                <div class="bg-white rounded-2xl shadow-xl border border-gray-100 overflow-hidden">
                    <div class="px-8 py-6 border-b border-gray-50 flex items-center justify-between bg-white">
                        <h3 class="text-xl font-bold text-navy flex items-center">
                            <i class="fas fa-user-edit mr-3 text-gold"></i> Personal Information
                        </h3>
                        <a href="{{ route('frontend.profile.edit') }}" class="text-gold font-bold text-sm hover:underline flex items-center">
                            Edit Profile <i class="fas fa-chevron-right ml-1 text-[10px]"></i>
                        </a>
                    </div>
                    <div class="p-8">
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                            <div class="flex items-center space-x-4">
                                <div class="w-12 h-12 rounded-2xl bg-gray-50 flex items-center justify-center text-gray-400 group-hover:bg-gold/10 group-hover:text-gold transition">
                                    <i class="fas fa-signature text-lg"></i>
                                </div>
                                <div>
                                    <p class="text-[10px] uppercase tracking-wider text-gray-400 font-bold mb-0.5 leading-none">Full Name</p>
                                    <p class="text-sm font-bold text-navy">{{ $user->name }}</p>
                                </div>
                            </div>
                            <div class="flex items-center space-x-4">
                                <div class="w-12 h-12 rounded-2xl bg-gray-50 flex items-center justify-center text-gray-400">
                                    <i class="fas fa-envelope text-lg"></i>
                                </div>
                                <div>
                                    <p class="text-[10px] uppercase tracking-wider text-gray-400 font-bold mb-0.5 leading-none">Email Address</p>
                                    <p class="text-sm font-bold text-navy">{{ $user->email }}</p>
                                </div>
                            </div>
                            <div class="flex items-center space-x-4">
                                <div class="w-12 h-12 rounded-2xl bg-gray-50 flex items-center justify-center text-gray-400">
                                    <i class="fas fa-clock text-lg"></i>
                                </div>
                                <div>
                                    <p class="text-[10px] uppercase tracking-wider text-gray-400 font-bold mb-0.5 leading-none">Registration Date</p>
                                    <p class="text-sm font-bold text-navy">{{ $user->created_at->format('d F, Y') }}</p>
                                </div>
                            </div>
                            <div class="flex items-center space-x-4">
                                <div class="w-12 h-12 rounded-2xl bg-gray-50 flex items-center justify-center text-gray-400">
                                    <i class="fas fa-shield-alt text-lg"></i>
                                </div>
                                <div>
                                    <p class="text-[10px] uppercase tracking-wider text-gray-400 font-bold mb-0.5 leading-none">Account Status</p>
                                    <span class="inline-flex items-center px-2 py-0.5 rounded text-[10px] font-bold bg-emerald-50 text-emerald-700 leading-none pb-1 uppercase">
                                        <i class="fas fa-check-circle text-[8px] mr-1 mt-0.5"></i> Verified
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
@endsection