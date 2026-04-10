@extends('layouts.frontend')

@section('title', 'Admission Review - ' . $admission->student_name)

@section('content')
<div class="bg-gray-50 min-h-screen py-8">
    <div class="container mx-auto px-4">
        
        <!-- Flash Messages -->
        @if(session('success'))
            <div class="mb-6 p-4 bg-emerald-50 border-l-4 border-emerald-500 text-emerald-700 rounded-r-xl shadow-sm flex items-center">
                <i class="fas fa-check-circle mr-3 text-emerald-500"></i>
                <p class="font-bold">{{ session('success') }}</p>
            </div>
        @endif

        <div class="flex flex-col gap-6">
            <!-- Header Summary Card -->
            <div class="w-full bg-white border-b shadow-sm rounded-[16px] p-6 lg:p-8">
                <div class="flex flex-col md:flex-row md:items-center justify-between gap-6">
                    <div class="flex-1">
                        <div class="flex items-center gap-3 mb-3">
                            <span class="inline-block bg-[#064e3b] text-white text-[10px] font-black uppercase tracking-widest px-3 py-1.5 rounded-full shadow-sm border border-black/10">
                                ID: #{{ $admission->id }}
                            </span>
                            <span class="text-gray-400 text-xs font-medium">Submitted on {{ $admission->created_at->format('M d, Y') }}</span>
                        </div>
                        <h2 class="text-3xl font-black text-[#064e3b] mb-1 tracking-tight">{{ $admission->student_name }}</h2>
                        <p class="text-gray-500 text-lg font-medium">Applying for <span class="text-[#064e3b] font-black underline decoration-[#c5a059] decoration-2 underline-offset-4">{{ $admission->course_selection }}</span></p>
                    </div>
                    <div class="flex flex-col items-start md:items-end gap-4">
                        @php
                            $statusColors = [
                                'Pending' => 'bg-amber-400 text-black',
                                'Approved' => 'bg-emerald-500 text-white',
                                'Rejected' => 'bg-rose-500 text-white'
                            ];
                            $statusColor = $statusColors[$admission->status] ?? 'bg-gray-400 text-white';
                        @endphp
                        <div class="inline-flex items-center px-6 py-2.5 rounded-xl {{ $statusColor }} text-sm font-black uppercase tracking-widest shadow-lg shadow-black/5">
                            <i class="fa-solid fa-circle-dot me-2 animate-pulse"></i>
                            {{ $admission->status }}
                        </div>
                        
                        <a href="{{ route('frontend.admission.print', $admission) }}" target="_blank" class="flex items-center px-6 py-3 bg-[#064e3b] text-white rounded-full font-bold text-sm shadow-xl shadow-[#064e3b]/20 hover:bg-[#043d2e] transition-all transform hover:-translate-y-1 active:scale-95">
                            <i class="fa-solid fa-print me-2 text-[#c5a059]"></i> Print Admission Slip
                        </a>
                    </div>
                </div>
            </div>

            <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
                <!-- Main Content -->
                <div class="lg:col-span-2 flex flex-col gap-6">
                    
                    <!-- Section 1: Student Information -->
                    <div class="bg-white p-6 lg:p-8 rounded-[12px] shadow-sm border border-gray-200">
                        <h5 class="font-black mb-6 flex justify-between items-center border-b border-gray-200 pb-4">
                            <span class="text-[#064e3b] text-sm uppercase tracking-[3px]">STUDENT INFORMATION</span>
                            <span class="font-urdu text-gray-400 text-sm font-normal" dir="rtl">طالب علم کی معلومات</span>
                        </h5>
                        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-x-8 gap-y-6">
                            @if($admission->image)
                            <div class="col-span-full flex items-center gap-4 mb-2">
                                <img src="{{ asset('storage/app/public/' . $admission->image) }}" alt="Student Picture" class="w-32 h-32 object-cover rounded-xl shadow-sm border border-gray-100" style="object-position: center 15%;">
                            </div>
                            @endif
                            <div class="col-span-full md:col-span-1">
                                <label class="text-gray-400 text-[10px] uppercase font-black tracking-widest block mb-1">Student Name</label>
                                <div class="font-black text-gray-800 text-base">{{ $admission->student_name }}</div>
                                <div class="mt-2 h-[1px] bg-black opacity-10"></div>
                            </div>
                            <div class="col-span-full md:col-span-1">
                                <label class="text-gray-400 text-[10px] uppercase font-black tracking-widest block mb-1">Father Name</label>
                                <div class="font-black text-gray-800 text-base">{{ $admission->father_name }}</div>
                                <div class="mt-2 h-[1px] bg-black opacity-10"></div>
                            </div>
                            <div class="col-span-full md:col-span-1">
                                <label class="text-gray-400 text-[10px] uppercase font-black tracking-widest block mb-1">Date of Birth</label>
                                <div class="font-black text-gray-800 text-base">{{ \Carbon\Carbon::parse($admission->dob)->format('d M, Y') }}</div>
                                <div class="mt-2 h-[1px] bg-black opacity-10"></div>
                            </div>
                            <div>
                                <label class="text-gray-400 text-[10px] uppercase font-black tracking-widest block mb-1">Age</label>
                                <div class="font-black text-gray-800 text-base">{{ $admission->age }} Years</div>
                                <div class="mt-2 h-[1px] bg-black opacity-10"></div>
                            </div>
                            <div>
                                <label class="text-gray-400 text-[10px] uppercase font-black tracking-widest block mb-1">Gender</label>
                                <div class="font-black text-gray-800 text-base">{{ $admission->gender }}</div>
                                <div class="mt-2 h-[1px] bg-black opacity-10"></div>
                            </div>
                            <div class="md:col-span-2 lg:col-span-3">
                                <label class="text-gray-400 text-[10px] uppercase font-black tracking-widest block mb-1">Residential Address</label>
                                <div class="font-black text-gray-800 text-base leading-relaxed">{{ $admission->address }}, {{ $admission->city }}</div>
                                <div class="mt-2 h-[1px] bg-black opacity-10"></div>
                            </div>
                        </div>
                    </div>

                    <!-- Section 2: Contact Information -->
                    <div class="bg-white p-6 lg:p-8 rounded-[12px] shadow-sm border border-gray-200">
                        <h5 class="font-black mb-6 flex justify-between items-center border-b border-gray-200 pb-4">
                            <span class="text-[#064e3b] text-sm uppercase tracking-[3px]">CONTACT INFORMATION</span>
                            <span class="font-urdu text-gray-400 text-sm font-normal" dir="rtl">رابطہ معلومات</span>
                        </h5>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-x-8 gap-y-6">
                            <div class="md:col-span-2">
                                <label class="text-gray-400 text-[10px] uppercase font-black tracking-widest block mb-1">Parent/Guardian Name</label>
                                <div class="font-black text-gray-800 text-base">{{ $admission->parent_name }}</div>
                                <div class="mt-2 h-[1px] bg-black opacity-10"></div>
                            </div>
                            <div>
                                <label class="text-gray-400 text-[10px] uppercase font-black tracking-widest block mb-1">Contact Number</label>
                                <div class="font-black text-[#064e3b] text-lg">{{ $admission->contact_number }}</div>
                                <div class="mt-2 h-[1px] bg-black opacity-10"></div>
                            </div>
                            <div>
                                <label class="text-gray-400 text-[10px] uppercase font-black tracking-widest block mb-1">Alternate Contact</label>
                                <div class="font-black text-gray-800 text-base">{{ $admission->alternate_number ?: '---' }}</div>
                                <div class="mt-2 h-[1px] bg-black opacity-10"></div>
                            </div>
                            <div>
                                <label class="text-rose-500 text-[10px] uppercase font-black tracking-widest block mb-1">Emergency Contact</label>
                                <div class="font-black text-rose-600 text-base">{{ $admission->emergency_contact }}</div>
                                <div class="mt-2 h-[1px] bg-black opacity-10"></div>
                            </div>
                            <div>
                                <label class="text-gray-400 text-[10px] uppercase font-black tracking-widest block mb-1">B-Form / CNIC Number</label>
                                <div class="font-black text-gray-800 text-base">{{ $admission->b_form ?: 'N/A' }}</div>
                                <div class="mt-2 h-[1px] bg-black opacity-10"></div>
                            </div>
                        </div>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <!-- Section 3: Education Details -->
                        <div class="bg-white p-6 lg:p-8 rounded-[12px] shadow-sm border border-gray-200 h-full">
                            <h5 class="font-black mb-6 flex justify-between items-center border-b border-gray-200 pb-4">
                                <span class="text-[#064e3b] text-sm uppercase tracking-[3px]">EDUCATION</span>
                            </h5>
                            <div class="space-y-4">
                                <div>
                                    <label class="text-gray-400 text-[10px] uppercase font-black tracking-widest block mb-1">Previous School</label>
                                    <div class="font-black text-gray-800">{{ $admission->previous_school ?: 'N/A' }}</div>
                                    <div class="mt-2 h-[1px] bg-black opacity-10"></div>
                                </div>
                                <div>
                                    <label class="text-gray-400 text-[10px] uppercase font-black tracking-widest block mb-1">Last Passed</label>
                                    <div class="font-black text-gray-800">{{ $admission->last_class_passed ?: 'N/A' }}</div>
                                    <div class="mt-2 h-[1px] bg-black opacity-10"></div>
                                </div>
                                <div class="pt-4 border-t border-gray-50 flex flex-col gap-3">
                                    <div class="flex justify-between items-center">
                                        <span class="text-xs font-black text-gray-500 uppercase tracking-wider">Nazra Completed:</span>
                                        <span class="px-3 py-1 rounded-full text-[10px] font-black {{ $admission->nazra_completed ? 'bg-emerald-100 text-emerald-700' : 'bg-gray-100 text-gray-400' }}">
                                            {{ $admission->nazra_completed ? 'YES' : 'NO' }}
                                        </span>
                                    </div>
                                    <div class="flex justify-between items-center">
                                        <span class="text-xs font-black text-gray-500 uppercase tracking-wider">Hifz Completed:</span>
                                        <span class="px-3 py-1 rounded-full text-[10px] font-black {{ $admission->hifz_completed ? 'bg-emerald-100 text-emerald-700' : 'bg-gray-100 text-gray-400' }}">
                                            {{ $admission->hifz_completed ? 'YES' : 'NO' }}
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Section 4: Course Selection -->
                        <div class="bg-white p-6 lg:p-8 rounded-[12px] shadow-sm border border-gray-200 h-full">
                            <h5 class="font-black mb-6 flex justify-between items-center border-b border-gray-200 pb-4">
                                <span class="text-[#064e3b] text-sm uppercase tracking-[3px]">COURSE</span>
                            </h5>
                            <div class="space-y-6">
                                <div>
                                    <label class="text-gray-400 text-[10px] uppercase font-black tracking-widest block mb-1">Selected Course</label>
                                    <div class="font-black text-xl text-[#064e3b]">{{ $admission->course_selection }}</div>
                                <div class="mt-2 h-[1px] bg-black opacity-10"></div>
                                </div>
                                <div class="bg-blue-50/50 p-4 rounded-xl border border-blue-100/50 text-blue-700 text-xs leading-relaxed">
                                    <div class="flex gap-3">
                                        <i class="fa-solid fa-circle-info text-blue-400 mt-0.5"></i>
                                        <span>Student must adhere to the rules and regulations of the department.</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Section 5: Medical & Remarks -->
                    <div class="bg-white p-6 lg:p-8 rounded-[12px] shadow-sm border border-gray-200">
                        <h5 class="font-black mb-6 flex justify-between items-center border-b border-gray-200 pb-4">
                            <span class="text-rose-500 text-sm uppercase tracking-[3px]">MEDICAL & REMARKS</span>
                        </h5>
                        <div class="p-5 bg-rose-50/30 border-l-4 border-rose-500 rounded-r-xl">
                            <p class="text-gray-800 font-bold italic leading-relaxed">
                                {{ $admission->medical_condition ?: 'No specific medical conditions reported.' }}
                            </p>
                        </div>
                    </div>
                </div>

                <!-- Office Use Sidebar -->
                <div class="lg:col-span-1">
                    <div class="sticky top-24 flex flex-col gap-6">
                        <form action="{{ route('frontend.management.admissions.update', $admission) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="bg-white p-6 lg:p-8 shadow-2xl rounded-[16px] border-t-[6px] border-[#064e3b]">
                                <h5 class="font-black text-lg mb-8 flex items-center text-[#064e3b]">
                                    <i class="fa-solid fa-stamp me-3 text-[#c5a059]"></i>
                                    OFFICE ACTIONS
                                </h5>

                                <div class="space-y-6">
                                    <div>
                                        <label class="block text-[10px] font-black uppercase text-gray-400 tracking-widest mb-2">Application Status</label>
                                        <select name="status" class="w-full bg-gray-100 border border-gray-200 rounded-xl px-4 py-3.5 text-sm font-bold text-[#064e3b] focus:bg-white focus:ring-2 focus:ring-[#064e3b] focus:border-transparent transition-all uppercase tracking-wider">
                                            <option value="Pending" {{ $admission->status === 'Pending' ? 'selected' : '' }}>🕒 Pending Review</option>
                                            <option value="Approved" {{ $admission->status === 'Approved' ? 'selected' : '' }}>✅ Approve Admission</option>
                                            <option value="Rejected" {{ $admission->status === 'Rejected' ? 'selected' : '' }}>❌ Reject Application</option>
                                        </select>
                                    </div>

                                    <div>
                                        <label class="block text-[10px] font-black uppercase text-gray-400 tracking-widest mb-2">Admission No.</label>
                                        <input type="text" name="admission_no" value="{{ old('admission_no', $admission->admission_no) }}" class="w-full bg-gray-100 border border-gray-200 rounded-xl px-4 py-3.5 text-sm font-bold text-[#064e3b] focus:bg-white focus:ring-2 focus:ring-[#064e3b] focus:border-transparent transition-all" placeholder="DAR-2024-xxx">
                                    </div>

                                    <div>
                                        <label class="block text-[10px] font-black uppercase text-gray-400 tracking-widest mb-2">Class / Section</label>
                                        <input type="text" name="class_assigned" value="{{ old('class_assigned', $admission->class_assigned) }}" class="w-full bg-gray-100 border border-gray-200 rounded-xl px-4 py-3.5 text-sm font-bold text-[#064e3b] focus:bg-white focus:ring-2 focus:ring-[#064e3b] focus:border-transparent transition-all" placeholder="e.g. Hifz Grade 1">
                                    </div>

                                    <div>
                                        <label class="block text-[10px] font-black uppercase text-gray-400 tracking-widest mb-2">Monthly Fee (PKR)</label>
                                        <div class="relative">
                                            <span class="absolute left-4 top-1/2 -translate-y-1/2 text-gray-400 font-bold text-sm">Rs.</span>
                                            <input type="number" name="fee" value="{{ old('fee', $admission->fee) }}" class="w-full bg-gray-100 border border-gray-200 rounded-xl pl-12 pr-4 py-3.5 text-sm font-black text-[#064e3b] focus:bg-white focus:ring-2 focus:ring-[#064e3b] focus:border-transparent transition-all" placeholder="5000">
                                        </div>
                                    </div>

                                    <div>
                                        <label class="block text-[10px] font-black uppercase text-gray-400 tracking-widest mb-2">Internal Remarks</label>
                                        <textarea name="remarks" class="w-full bg-gray-100 border border-gray-200 rounded-xl px-4 py-3.5 text-sm font-medium text-[#064e3b] focus:bg-white focus:ring-2 focus:ring-[#064e3b] focus:border-transparent transition-all" rows="3" placeholder="Office notes...">{{ old('remarks', $admission->remarks) }}</textarea>
                                    </div>

                                    <button type="submit" class="w-full bg-[#064e3b] text-white py-4 rounded-xl font-black text-xs uppercase tracking-widest shadow-xl shadow-[#064e3b]/20 hover:bg-[#043d2e] transition-all transform active:scale-95">
                                        Update Admission File
                                    </button>
                                </div>
                            </div>
                        </form>
                        
                        <div class="p-6 bg-[#064e3b] rounded-[16px] text-white shadow-xl relative overflow-hidden">
                            <div class="absolute -right-8 -bottom-8 opacity-10 pointer-events-none transform rotate-12">
                                <i class="fa-solid fa-graduation-cap text-8xl"></i>
                            </div>
                            <div class="flex gap-4 relative z-10">
                                <div class="bg-amber-400/20 p-2 rounded-lg text-amber-400 h-fit">
                                    <i class="fa-solid fa-lightbulb"></i>
                                </div>
                                <p class="text-[11px] leading-relaxed font-medium text-emerald-50">
                                    Updates here will appear on the student's dashboard once approved. They will also receive a notification.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@push('styles')
<style>
    .font-urdu { font-family: 'Noto Nastaliq Urdu', serif !important; }
</style>
@endpush
@endsection
