@extends('layouts.frontend')

@section('title', 'Admission Form / داخلہ فارم')

@section('content')
<!-- Page Header -->
<div class="bg-navy py-16 text-center text-white islamic-pattern relative">
    <div class="container mx-auto px-4 relative z-10">
        <h1 class="text-4xl md:text-5xl font-bold mb-4">Admission Form</h1>
        <h2 class="text-2xl md:text-3xl font-urdu mb-4" dir="rtl">مدرسہ طلباء داخلہ فارم</h2>
        <div class="w-20 h-1 bg-gold mx-auto mb-4"></div>
        <p class="text-gold uppercase tracking-widest text-sm mb-2">Dar-ul-Uloom Anwaar-e-Mustafa BOR</p>
        <p class="font-urdu text-base" dir="rtl">وَلَقَدْ يَسَّرْنَا الْقُرْآنَ لِلذِّكْرِ فَهَلْ مِن مُّدَّكِرٍ</p>
        <p class="font-urdu text-sm mt-1" dir="rtl">اور بے شک ہم نے قرآن کو نصیحت کے لیے آسان بنا دیا ہے، تو ہے کوئی نصیحت حاصل کرنے والا؟</p>
    </div>
</div>

<section class="py-16 bg-gray-50">
    <div class="container mx-auto px-4 max-w-4xl">
        

        @if(session('error'))
            <div class="bg-red-100 border-l-4 border-red-500 text-red-700 p-4 mb-8 rounded shadow-sm" role="alert">
                <p class="font-bold">{{ session('error') }}</p>
            </div>
        @endif

        @if(session('success'))
            <div class="bg-green-100 border-l-4 border-green-500 text-green-700 p-4 mb-8 rounded shadow-sm" role="alert">
                <p class="font-bold">{{ session('success') }}</p>
            </div>
        @endif

        @if($errors->any())
            <div class="bg-red-100 border-l-4 border-red-500 text-red-700 p-4 mb-8 rounded shadow-sm">
                <div class="font-bold mb-2">Please correct the following errors:</div>
                <ul class="list-disc pl-5">
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        @php
            $isLocked = $admission && in_array($admission->status, ['Approved', 'Rejected']);
            $formAction = $admission ? route('frontend.admission.update', $admission->id) : route('frontend.admission.store');
        @endphp

        @if($isLocked)
            <div class="bg-white p-8 md:p-12 rounded-xl shadow-lg border-t-4 {{ $admission->status == 'Approved' ? 'border-green-500' : 'border-red-500' }} text-center">
                <div class="mb-6">
                    @if($admission->status == 'Approved')
                        <div class="w-20 h-20 bg-green-100 text-green-600 rounded-full flex items-center justify-center mx-auto mb-4">
                            <svg class="w-12 h-12" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                            </svg>
                        </div>
                        <h3 class="text-2xl font-bold text-gray-800 mb-2">Admission Approved!</h3>
                        <p class="text-gray-600 mb-6">Congratulations! Your admission has been approved by the management. / مبارک ہو! آپ کا داخلہ انتظامیہ کی طرف سے منظور کر لیا گیا ہے۔</p>
                        
                        <div class="bg-gray-50 p-6 rounded-lg mb-6 text-left max-w-md mx-auto border border-gray-100">
                            <h4 class="font-bold text-navy border-b pb-2 mb-3">Admission Details</h4>
                            <div class="space-y-2 text-sm">
                                <p><span class="font-semibold text-gray-500">Student Name:</span> {{ $admission->student_name }}</p>
                                <p><span class="font-semibold text-gray-500">Admission No:</span> {{ $admission->admission_no ?? 'Pending' }}</p>
                                <p><span class="font-semibold text-gray-500">Class Assigned:</span> {{ $admission->class_assigned ?? 'Pending' }}</p>
                                <p><span class="font-semibold text-gray-500">Course:</span> {{ $admission->course_selection }}</p>
                            </div>
                        </div>

                        <div class="flex flex-col sm:flex-row gap-4 justify-center">
                            <a href="{{ route('frontend.admission.print', $admission->id) }}" target="_blank" class="bg-navy text-white px-8 py-3 rounded-lg font-bold hover:bg-opacity-90 transition flex items-center justify-center">
                                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 17h2a2 2 0 002-2v-4a2 2 0 00-2-2H5a2 2 0 00-2 2v4a2 2 0 002 2h2m2 4h6a2 2 0 002-2v-4a2 2 0 00-2-2H9a2 2 0 00-2 2v4a2 2 0 002 2zm8-12V5a2 2 0 00-2-2H9a2 2 0 00-2 2v4h10z"></path>
                                </svg>
                                Print Admission Slip / سلپ ڈاؤن لوڈ کریں
                            </a>
                            <a href="{{ route('frontend.profile.dashboard') }}" class="bg-gray-200 text-gray-800 px-8 py-3 rounded-lg font-bold hover:bg-gray-300 transition">
                                Go to Dashboard / ڈیش بورڈ پر جائیں
                            </a>
                        </div>
                    @else
                        <div class="w-20 h-20 bg-red-100 text-red-600 rounded-full flex items-center justify-center mx-auto mb-4">
                            <svg class="w-12 h-12" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                            </svg>
                        </div>
                        <h3 class="text-2xl font-bold text-gray-800 mb-2">Admission Rejected</h3>
                        <p class="text-gray-600 mb-6">We regret to inform you that your admission could not be processed at this time. / ہمیں افسوس ہے کہ اس وقت آپ کا داخلہ قبول نہیں کیا جا سکا۔</p>
                        
                        @if($admission->remarks)
                            <div class="bg-red-50 p-4 rounded-lg mb-6 text-left max-w-md mx-auto border border-red-100">
                                <h4 class="font-bold text-red-800 mb-1">Remarks:</h4>
                                <p class="text-red-700 text-sm italic">{{ $admission->remarks }}</p>
                            </div>
                        @endif

                        <a href="{{ route('frontend.contact') }}" class="btn-gold px-8 py-3 inline-block font-bold">
                            Contact Management / رابطہ کریں
                        </a>
                    @endif
                </div>
            </div>
        @else

        <form action="{{ $formAction }}" method="POST" enctype="multipart/form-data" class="bg-white p-5 md:p-12 rounded-xl shadow-lg border-t-4 border-gold">
            @csrf
            @if($admission)
                @method('PUT')
            @endif
            
            <!-- Section 1: Student Information -->
            <div class="mb-10">
                <h3 class="text-xl font-bold text-navy mb-6 flex flex-col sm:flex-row justify-between border-b pb-2 gap-2">
                    <span>Student Information</span>
                    <span class="font-urdu text-base sm:text-lg" dir="rtl">طالب علم کی معلومات</span>
                </h3>
                
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4 lg:gap-6">
                    <div>
                        <label class="block text-gray-700 font-medium mb-1 flex flex-wrap justify-between gap-1 leading-tight">
                            <span>Student Name <span class="text-red-500">*</span></span>
                            <span class="font-urdu text-sm" dir="rtl">طالب علم کا نام</span>
                        </label>
                        <input type="text" name="student_name" value="{{ old('student_name', $admission->student_name ?? '') }}" required class="w-full px-4 py-2 border border-gray-300 rounded focus:ring-gold focus:border-gold outline-none transition" {{ $isLocked ? 'disabled' : '' }}>
                    </div>
                    
                    <div>
                        <label class="block text-gray-700 font-medium mb-1 flex flex-wrap justify-between gap-1 leading-tight">
                            <span>Father Name <span class="text-red-500">*</span></span>
                            <span class="font-urdu text-sm" dir="rtl">والد کا نام</span>
                        </label>
                        <input type="text" name="father_name" value="{{ old('father_name', $admission->father_name ?? '') }}" required class="w-full px-4 py-2 border border-gray-300 rounded focus:ring-gold focus:border-gold outline-none transition" {{ $isLocked ? 'disabled' : '' }}>
                    </div>

                    <div>
                        <label class="block text-gray-700 font-medium mb-1 flex flex-wrap justify-between gap-1 leading-tight">
                            <span>Age <span class="text-red-500">*</span></span>
                            <span class="font-urdu text-sm" dir="rtl">عمر</span>
                        </label>
                        <input type="number" name="age" value="{{ old('age', $admission->age ?? '') }}" required class="w-full px-4 py-2 border border-gray-300 rounded focus:ring-gold focus:border-gold outline-none transition" {{ $isLocked ? 'disabled' : '' }}>
                    </div>

                    <div>
                        <label class="block text-gray-700 font-medium mb-1 flex flex-wrap justify-between gap-1 leading-tight">
                            <span>Date of Birth <span class="text-red-500">*</span></span>
                            <span class="font-urdu text-sm" dir="rtl">تاریخ پیدائش</span>
                        </label>
                        <input type="date" name="dob" value="{{ old('dob', $admission->dob ?? '') }}" required class="w-full px-4 py-2 border border-gray-300 rounded focus:ring-gold focus:border-gold outline-none transition" {{ $isLocked ? 'disabled' : '' }}>
                    </div>

                    <div>
                        <label class="block text-gray-700 font-medium mb-2 flex flex-wrap justify-between gap-1 leading-tight">
                            <span>Gender <span class="text-red-500">*</span></span>
                            <span class="font-urdu text-sm" dir="rtl">جنس</span>
                        </label>
                        <div class="flex space-x-6 bg-gray-50 p-2 rounded border border-gray-100">
                            @php $gender = old('gender', $admission->gender ?? ''); @endphp
                            <label class="inline-flex items-center">
                                <input type="radio" name="gender" value="Male" class="text-gold focus:ring-gold" {{ $gender == 'Male' ? 'checked' : '' }} required {{ $isLocked ? 'disabled' : '' }}>
                                <span class="ml-2 mr-2">Male</span> <span class="font-urdu text-xs" dir="rtl">مرد</span>
                            </label>
                            <label class="inline-flex items-center">
                                <input type="radio" name="gender" value="Female" class="text-gold focus:ring-gold" {{ $gender == 'Female' ? 'checked' : '' }} {{ $isLocked ? 'disabled' : '' }}>
                                <span class="ml-2 mr-2">Female</span> <span class="font-urdu text-xs" dir="rtl">عورت</span>
                            </label>
                        </div>
                    </div>

                    <div>
                        <label class="block text-gray-700 font-medium mb-1 flex flex-wrap justify-between gap-1 leading-tight">
                            <span>B-Form / Bay Form No</span>
                            <span class="font-urdu text-sm" dir="rtl">ب فارم نمبر</span>
                        </label>
                        <input type="text" name="b_form" value="{{ old('b_form', $admission->b_form ?? '') }}" class="w-full px-4 py-2 border border-gray-300 rounded focus:ring-gold focus:border-gold outline-none transition" placeholder="Optional" {{ $isLocked ? 'disabled' : '' }}>
                    </div>

                    <div>
                        <label class="block text-gray-700 font-medium mb-1 flex flex-wrap justify-between gap-1 leading-tight">
                            <span>Student Image</span>
                            <span class="font-urdu text-sm" dir="rtl">طالب علم کی تصویر</span>
                        </label>
                        <input type="file" name="image" accept="image/*" class="w-full px-4 py-2 border border-gray-300 rounded focus:ring-gold focus:border-gold outline-none transition bg-white file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-gold/10 file:text-gold hover:file:bg-gold/20" {{ $isLocked ? 'disabled' : '' }}>
                        @if($admission && $admission->image)
                            <p class="text-xs text-gray-500 mt-1 italic">Current: {{ basename($admission->image) }}</p>
                        @endif
                    </div>
                </div>
            </div>

            <!-- Section 2: Contact Information -->
            <div class="mb-10">
                <h3 class="text-xl font-bold text-navy mb-6 flex flex-col sm:flex-row justify-between border-b pb-2 gap-2">
                    <span>Contact Information</span>
                    <span class="font-urdu text-base sm:text-lg" dir="rtl">رابطہ معلومات</span>
                </h3>
                
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4 lg:gap-6">
                    <div class="md:col-span-2">
                        <label class="block text-gray-700 font-medium mb-1 flex flex-wrap justify-between gap-1 leading-tight">
                            <span>Parent/Guardian Name <span class="text-red-500">*</span></span>
                            <span class="font-urdu text-sm" dir="rtl">سرپرست کا نام</span>
                        </label>
                        <input type="text" name="parent_name" value="{{ old('parent_name', $admission->parent_name ?? '') }}" required class="w-full px-4 py-2 border border-gray-300 rounded focus:ring-gold focus:border-gold outline-none transition" {{ $isLocked ? 'disabled' : '' }}>
                    </div>

                    <div>
                        <label class="block text-gray-700 font-medium mb-1 flex flex-wrap justify-between gap-1 leading-tight">
                            <span>Contact Number <span class="text-red-500">*</span></span>
                            <span class="font-urdu text-sm" dir="rtl">رابطہ نمبر</span>
                        </label>
                        <input type="text" name="contact_number" value="{{ old('contact_number', $admission->contact_number ?? '') }}" required class="w-full px-4 py-2 border border-gray-300 rounded focus:ring-gold focus:border-gold outline-none transition" {{ $isLocked ? 'disabled' : '' }}>
                    </div>

                    <div>
                        <label class="block text-gray-700 font-medium mb-1 flex flex-wrap justify-between gap-1 leading-tight">
                            <span>Alternate Contact</span>
                            <span class="font-urdu text-sm" dir="rtl">متبادل نمبر</span>
                        </label>
                        <input type="text" name="alternate_number" value="{{ old('alternate_number', $admission->alternate_number ?? '') }}" class="w-full px-4 py-2 border border-gray-300 rounded focus:ring-gold focus:border-gold outline-none transition" {{ $isLocked ? 'disabled' : '' }}>
                    </div>

                    <div class="md:col-span-2">
                        <label class="block text-gray-700 font-medium mb-1 flex flex-wrap justify-between gap-1 leading-tight">
                            <span>Address <span class="text-red-500">*</span></span>
                            <span class="font-urdu text-sm" dir="rtl">پتہ</span>
                        </label>
                        <textarea name="address" required class="w-full px-4 py-2 border border-gray-300 rounded focus:ring-gold focus:border-gold outline-none transition" rows="2" {{ $isLocked ? 'disabled' : '' }}>{{ old('address', $admission->address ?? '') }}</textarea>
                    </div>

                    <div class="md:col-span-2">
                        <label class="block text-gray-700 font-medium mb-1 flex flex-wrap justify-between gap-1 leading-tight">
                            <span>City <span class="text-red-500">*</span></span>
                            <span class="font-urdu text-sm" dir="rtl">شہر</span>
                        </label>
                        <input type="text" name="city" value="{{ old('city', $admission->city ?? '') }}" required class="w-full px-4 py-2 border border-gray-300 rounded focus:ring-gold focus:border-gold outline-none transition" {{ $isLocked ? 'disabled' : '' }}>
                    </div>
                </div>
            </div>

            <!-- Section 3: Education Details -->
            <div class="mb-10">
                <h3 class="text-xl font-bold text-navy mb-6 flex flex-col sm:flex-row justify-between border-b pb-2 gap-2">
                    <span>Education Details</span>
                    <span class="font-urdu text-base sm:text-lg" dir="rtl">تعلیمی معلومات</span>
                </h3>
                
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4 lg:gap-6">
                    <div>
                        <label class="block text-gray-700 font-medium mb-1 flex flex-wrap justify-between gap-1 leading-tight">
                            <span>Previous School/Madrasa</span>
                            <span class="font-urdu text-sm" dir="rtl">سابقہ مدرسہ یا اسکول</span>
                        </label>
                        <input type="text" name="previous_school" value="{{ old('previous_school', $admission->previous_school ?? '') }}" class="w-full px-4 py-2 border border-gray-300 rounded focus:ring-gold focus:border-gold outline-none transition" {{ $isLocked ? 'disabled' : '' }}>
                    </div>
                    
                    <div>
                        <label class="block text-gray-700 font-medium mb-1 flex flex-wrap justify-between gap-1 leading-tight">
                            <span>Last Class Passed</span>
                            <span class="font-urdu text-sm" dir="rtl">آخری پاس شدہ جماعت</span>
                        </label>
                        <input type="text" name="last_class_passed" value="{{ old('last_class_passed', $admission->last_class_passed ?? '') }}" class="w-full px-4 py-2 border border-gray-300 rounded focus:ring-gold focus:border-gold outline-none transition" {{ $isLocked ? 'disabled' : '' }}>
                    </div>

                    <div class="flex items-center mt-2 bg-gray-50 p-3 rounded">
                        <input type="checkbox" name="nazra_completed" id="nazra" class="w-5 h-5 text-gold focus:ring-gold border-gray-300 rounded" {{ old('nazra_completed', $admission->nazra_completed ?? false) ? 'checked' : '' }} {{ $isLocked ? 'disabled' : '' }}>
                        <label for="nazra" class="ml-3 text-gray-700 font-medium flex justify-between w-full text-sm leading-tight">
                            <span>Nazra Completed?</span>
                            <span class="font-urdu" dir="rtl">کیا ناظرہ مکمل ہے؟</span>
                        </label>
                    </div>

                    <div class="flex items-center mt-2 bg-gray-50 p-3 rounded">
                        <input type="checkbox" name="hifz_completed" id="hifz" class="w-5 h-5 text-gold focus:ring-gold border-gray-300 rounded" {{ old('hifz_completed', $admission->hifz_completed ?? false) ? 'checked' : '' }} {{ $isLocked ? 'disabled' : '' }}>
                        <label for="hifz" class="ml-3 text-gray-700 font-medium flex justify-between w-full text-sm leading-tight">
                            <span>Hifz Completed?</span>
                            <span class="font-urdu" dir="rtl">کیا حفظ مکمل ہے؟</span>
                        </label>
                    </div>
                </div>
            </div>

            <!-- Section 4: Course Selection -->
            <div class="mb-10">
                <h3 class="text-xl font-bold text-navy mb-6 flex flex-col sm:flex-row justify-between border-b pb-2 gap-2">
                    <span>Course Selection <span class="text-red-500">*</span></span>
                    <span class="font-urdu text-base sm:text-lg" dir="rtl">کورس کا انتخاب</span>
                </h3>
                
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-3 md:gap-4">
                    @php $course = old('course_selection', $admission->course_selection ?? ''); @endphp
                    <label class="flex items-center p-3 border rounded-lg hover:bg-gray-50 cursor-pointer transition">
                        <input type="radio" name="course_selection" value="Nazra Quran" required class="text-gold focus:ring-gold w-4 h-4" {{ $course == 'Nazra Quran' ? 'checked' : '' }} {{ $isLocked ? 'disabled' : '' }}>
                        <div class="ml-3 flex-1 flex justify-between items-center text-xs sm:text-sm font-medium">
                            <span>Nazra Quran</span>
                            <span class="font-urdu" dir="rtl">ناظرہ قرآن</span>
                        </div>
                    </label>

                    <label class="flex items-center p-3 border rounded-lg hover:bg-gray-50 cursor-pointer transition">
                        <input type="radio" name="course_selection" value="Hifz-ul-Quran" required class="text-gold focus:ring-gold w-4 h-4" {{ $course == 'Hifz-ul-Quran' ? 'checked' : '' }} {{ $isLocked ? 'disabled' : '' }}>
                        <div class="ml-3 flex-1 flex justify-between items-center text-xs sm:text-sm font-medium">
                            <span>Hifz-ul-Quran</span>
                            <span class="font-urdu" dir="rtl">حفظ القرآن</span>
                        </div>
                    </label>

                    <label class="flex items-center p-3 border rounded-lg hover:bg-gray-50 cursor-pointer transition">
                        <input type="radio" name="course_selection" value="Dars-e-Nizami" required class="text-gold focus:ring-gold w-4 h-4" {{ $course == 'Dars-e-Nizami' ? 'checked' : '' }} {{ $isLocked ? 'disabled' : '' }}>
                        <div class="ml-3 flex-1 flex justify-between items-center text-xs sm:text-sm font-medium">
                            <span>Dars-e-Nizami</span>
                            <span class="font-urdu" dir="rtl">درس نظامی</span>
                        </div>
                    </label>

                    <label class="flex items-center p-3 border rounded-lg hover:bg-gray-50 cursor-pointer transition">
                        <input type="radio" name="course_selection" value="Basic Islamic Education" required class="text-gold focus:ring-gold w-4 h-4" {{ $course == 'Basic Islamic Education' ? 'checked' : '' }} {{ $isLocked ? 'disabled' : '' }}>
                        <div class="ml-3 flex-1 flex justify-between items-center text-xs sm:text-sm font-medium">
                            <span>Basic Islamic Ed.</span>
                            <span class="font-urdu" dir="rtl">بنیادی اسلامی تعلیم</span>
                        </div>
                    </label>

                    <label class="flex items-center p-3 border rounded-lg hover:bg-gray-50 cursor-pointer transition md:col-span-2 lg:col-span-1">
                        <input type="radio" name="course_selection" value="Others" required class="text-gold focus:ring-gold w-4 h-4" {{ $course == 'Others' ? 'checked' : '' }} {{ $isLocked ? 'disabled' : '' }} onclick="document.getElementById('other_course_input').focus()">
                        <div class="ml-3 flex-1 flex justify-between items-center text-xs sm:text-sm font-medium">
                            <span>Others</span>
                            <span class="font-urdu" dir="rtl">دیگر</span>
                        </div>
                    </label>
                </div>
                <div class="mt-4">
                    <input type="text" name="other_course" id="other_course_input" value="{{ old('other_course', $admission->other_course ?? '') }}" placeholder="If Others, please specify / اگر دیگر ہے تو تفصیل لکھیں" class="w-full px-4 py-2 border border-gray-300 rounded focus:ring-gold focus:border-gold outline-none transition font-urdu text-right" dir="auto" {{ $isLocked ? 'disabled' : '' }}>
                </div>
            </div>

            <!-- Section 5: Additional Information -->
            <div class="mb-10">
                <h3 class="text-xl font-bold text-navy mb-6 flex justify-between border-b pb-2">
                    <span>Additional Information</span>
                    <span class="font-urdu" dir="rtl">اضافی معلومات</span>
                </h3>
                
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div class="md:col-span-2">
                        <label class="block text-gray-700 font-medium mb-1 flex justify-between">
                            <span>Medical Condition (if any)</span>
                            <span class="font-urdu" dir="rtl">طبی معلومات (اگر کوئی ہو)</span>
                        </label>
                        <textarea name="medical_condition" class="w-full px-4 py-2 border border-gray-300 rounded focus:ring-gold focus:border-gold outline-none transition" rows="2" {{ $isLocked ? 'disabled' : '' }}>{{ old('medical_condition', $admission->medical_condition ?? '') }}</textarea>
                    </div>

                    <div class="md:col-span-2">
                        <label class="block text-gray-700 font-medium mb-1 flex justify-between">
                            <span>Emergency Contact <span class="text-red-500">*</span></span>
                            <span class="font-urdu" dir="rtl">ہنگامی رابطہ</span>
                        </label>
                        <input type="text" name="emergency_contact" value="{{ old('emergency_contact', $admission->emergency_contact ?? '') }}" required class="w-full px-4 py-2 border border-gray-300 rounded focus:ring-gold focus:border-gold outline-none transition" {{ $isLocked ? 'disabled' : '' }}>
                    </div>
                </div>
            </div>
            
            <!-- Declaration -->
            <div class="bg-gray-50 p-6 rounded-lg mb-8 border border-gray-200">
                <h4 class="font-bold text-navy mb-4 border-b pb-2 flex justify-between">
                    <span>Declaration</span>
                    <span class="font-urdu" dir="rtl">اقرار نامہ</span>
                </h4>
                <div class="flex items-start">
                    <div class="flex-shrink-0 mt-1">
                        <input type="checkbox" required class="w-5 h-5 text-gold focus:ring-gold border-gray-300 rounded" {{ $admission ? 'checked' : '' }} {{ $isLocked ? 'disabled' : '' }}>
                    </div>
                    <div class="ml-3">
                        <p class="text-gray-700 font-medium mb-1">I hereby declare that the above information is correct.</p>
                        <p class="font-urdu text-base text-gray-800" dir="rtl">میں تصدیق کرتا/کرتی ہوں کہ اوپر دی گئی تمام معلومات درست ہیں۔</p>
                    </div>
                </div>
            </div>

            <div class="text-center">
                @if($isLocked)
                    <div class="bg-gray-100 text-gray-600 px-12 py-4 text-lg font-bold w-full md:w-auto inline-block rounded cursor-not-allowed">
                        FORM SUBMISSION LOCKED / فارم جمع کرنا بند ہے
                    </div>
                @else
                    <button type="submit" class="btn-gold px-12 py-4 text-lg font-bold w-full md:w-auto">
                        {{ $admission ? 'UPDATE REGISTRATION / فارم اپ ڈیٹ کریں' : 'SUBMIT REGISTRATION / فارم جمع کریں' }}
                    </button>
                @endif
            </div>
            
        </form>
        @endif
    </div>
</section>
@endsection
