@extends('layouts.frontend')

@section('title', 'Management - Admissions')

@section('content')
<div class="bg-gray-50 min-h-screen py-12">
    <div class="container mx-auto px-4">
        
        <!-- Page Header -->
        <div class="mb-10 flex flex-col md:flex-row md:items-end md:justify-between space-y-4 md:space-y-0">
            <div>
                <nav class="flex mb-4 text-sm text-gray-500 font-medium" aria-label="Breadcrumb">
                    <ol class="flex items-center space-x-2">
                        <li><a href="{{ route('frontend.index') }}" class="hover:text-gold transition">Home</a></li>
                        <li><i class="fas fa-chevron-right text-[10px] mx-1"></i></li>
                        <li><a href="{{ route('frontend.profile.dashboard') }}" class="hover:text-gold transition">Dashboard</a></li>
                        <li><i class="fas fa-chevron-right text-[10px] mx-1"></i></li>
                        <li class="text-gold font-bold">Admissions Management</li>
                    </ol>
                </nav>
                <h1 class="text-3xl md:text-4xl font-extrabold text-navy tracking-tight">Admissions <span class="text-gold">Records</span></h1>
                <p class="text-gray-500 mt-2 font-medium">Review and manage all student admission applications.</p>
            </div>
            
            <div class="flex space-x-3">
                <div class="bg-white px-5 py-3 rounded-2xl shadow-sm border border-gray-100 flex items-center">
                    <div class="w-10 h-10 bg-gold/10 rounded-full flex items-center justify-center text-gold mr-3">
                        <i class="fas fa-users-cog"></i>
                    </div>
                    <div>
                        <p class="text-[10px] uppercase font-bold text-gray-400 leading-none mb-1">Total</p>
                        <p class="text-lg font-bold text-navy leading-none">{{ $stats['total'] }}</p>
                    </div>
                </div>
                <div class="bg-white px-5 py-3 rounded-2xl shadow-sm border border-gray-100 flex items-center">
                    <div class="w-10 h-10 bg-emerald-50 rounded-full flex items-center justify-center text-emerald-500 mr-3">
                        <i class="fas fa-check-circle"></i>
                    </div>
                    <div>
                        <p class="text-[10px] uppercase font-bold text-gray-400 leading-none mb-1">Approved</p>
                        <p class="text-lg font-bold text-navy leading-none">{{ $stats['approved'] }}</p>
                    </div>
                </div>
                <div class="bg-white px-5 py-3 rounded-2xl shadow-sm border border-gray-100 flex items-center">
                    <div class="w-10 h-10 bg-amber-50 rounded-full flex items-center justify-center text-amber-500 mr-3">
                        <i class="fas fa-clock"></i>
                    </div>
                    <div>
                        <p class="text-[10px] uppercase font-bold text-gray-400 leading-none mb-1">Pending</p>
                        <p class="text-lg font-bold text-navy leading-none">{{ $stats['pending'] }}</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Desktop Table View -->
        <div class="bg-white rounded-3xl shadow-xl border border-gray-100 overflow-hidden">
            <div class="overflow-x-auto">
                <table class="w-full text-left border-collapse">
                    <thead>
                        <tr class="bg-gray-50/50 border-b border-gray-100">
                            <th class="px-8 py-5 text-[11px] font-bold text-gray-400 uppercase tracking-widest">Student / ID</th>
                            <th class="px-8 py-5 text-[11px] font-bold text-gray-400 uppercase tracking-widest">Course / Dept</th>
                            <th class="px-8 py-5 text-[11px] font-bold text-gray-400 uppercase tracking-widest">Parent / Contact</th>
                            <th class="px-8 py-5 text-[11px] font-bold text-gray-400 uppercase tracking-widest text-center">Status</th>
                            <th class="px-8 py-5 text-[11px] font-bold text-gray-400 uppercase tracking-widest text-right">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-50">
                        @forelse($admissions as $admission)
                            <tr class="hover:bg-gray-50/50 transition-colors group">
                                <td class="px-8 py-6">
                                    <div class="flex items-center">
                                        @if($admission->image)
                                            <img src="{{ asset('storage/' . $admission->image) }}" alt="Student Picture" class="w-10 h-10 rounded-full object-cover mr-4 border border-navy/10" style="object-position: center 15%; flex-shrink: 0;">
                                        @else
                                            <div class="w-10 h-10 bg-navy/5 rounded-full flex items-center justify-center text-navy font-bold mr-4 border border-navy/10" style="flex-shrink: 0;">
                                                {{ strtoupper(substr($admission->student_name, 0, 1)) }}
                                            </div>
                                        @endif
                                        <div>
                                            <div class="text-sm font-bold text-navy group-hover:text-gold transition">{{ $admission->student_name }}</div>
                                            <div class="text-[10px] text-gray-400 font-bold uppercase mt-0.5">#ADM-{{ str_pad($admission->id, 5, '0', STR_PAD_LEFT) }}</div>
                                        </div>
                                    </div>
                                </td>
                                <td class="px-8 py-6">
                                    <div class="text-sm font-bold text-gray-700">{{ $admission->course_selection }}</div>
                                    <div class="text-[10px] text-gray-400 font-medium italic mt-0.5">Assigned: {{ $admission->class_assigned ?? 'Pending' }}</div>
                                </td>
                                <td class="px-8 py-6">
                                    <div class="text-sm font-bold text-gray-700">{{ $admission->parent_name }}</div>
                                    <div class="text-[10px] text-gray-400 font-bold mt-0.5">{{ $admission->contact_number }}</div>
                                </td>
                                <td class="px-8 py-6 text-center">
                                    @php
                                        $statusClass = 'bg-gray-100 text-gray-500';
                                        if($admission->status == 'Approved') $statusClass = 'bg-emerald-50 text-emerald-600';
                                        if($admission->status == 'Rejected') $statusClass = 'bg-red-50 text-red-600';
                                        if($admission->status == 'Pending') $statusClass = 'bg-amber-50 text-amber-600';
                                    @endphp
                                    <span class="inline-flex items-center px-3 py-1 rounded-full text-[10px] font-bold uppercase tracking-wider {{ $statusClass }}">
                                        {{ $admission->status }}
                                    </span>
                                </td>
                                <td class="px-8 py-6 text-right">
                                    <a href="{{ route('frontend.management.admissions.show', $admission) }}" class="inline-flex items-center justify-center w-8 h-8 rounded-lg bg-white border border-gray-200 text-gray-400 hover:border-gold hover:text-gold hover:shadow-lg hover:shadow-gold/20 transition-all">
                                        <i class="fas fa-eye text-xs"></i>
                                    </a>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="px-8 py-12 text-center">
                                    <div class="w-16 h-16 bg-gray-50 rounded-full flex items-center justify-center text-gray-300 mx-auto mb-4">
                                        <i class="fas fa-folder-open text-2xl"></i>
                                    </div>
                                    <p class="text-gray-500 font-medium">No admission records found.</p>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            @if($admissions->hasPages())
                <div class="px-8 py-6 bg-gray-50/50 border-t border-gray-100">
                    {{ $admissions->links() }}
                </div>
            @endif
        </div>
    </div>
</div>
@endsection
