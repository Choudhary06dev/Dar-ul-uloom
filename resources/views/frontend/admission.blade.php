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

        <form action="{{ route('frontend.admission.store') }}" method="POST" class="bg-white p-8 md:p-12 rounded-xl shadow-lg border-t-4 border-gold">
            @csrf
            
            <!-- Section 1: Student Information -->
            <div class="mb-10">
                <h3 class="text-xl font-bold text-navy mb-6 flex justify-between border-b pb-2">
                    <span>Student Information</span>
                    <span class="font-urdu" dir="rtl">طالب علم کی معلومات</span>
                </h3>
                
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label class="block text-gray-700 font-medium mb-1 flex justify-between">
                            <span>Student Name <span class="text-red-500">*</span></span>
                            <span class="font-urdu" dir="rtl">طالب علم کا نام</span>
                        </label>
                        <input type="text" name="student_name" value="{{ old('student_name') }}" required class="w-full px-4 py-2 border border-gray-300 rounded focus:ring-gold focus:border-gold outline-none transition">
                    </div>
                    
                    <div>
                        <label class="block text-gray-700 font-medium mb-1 flex justify-between">
                            <span>Father Name <span class="text-red-500">*</span></span>
                            <span class="font-urdu" dir="rtl">والد کا نام</span>
                        </label>
                        <input type="text" name="father_name" value="{{ old('father_name') }}" required class="w-full px-4 py-2 border border-gray-300 rounded focus:ring-gold focus:border-gold outline-none transition">
                    </div>

                    <div>
                        <label class="block text-gray-700 font-medium mb-1 flex justify-between">
                            <span>Date of Birth <span class="text-red-500">*</span></span>
                            <span class="font-urdu" dir="rtl">تاریخ پیدائش</span>
                        </label>
                        <input type="date" name="dob" value="{{ old('dob') }}" required class="w-full px-4 py-2 border border-gray-300 rounded focus:ring-gold focus:border-gold outline-none transition">
                    </div>

                    <div>
                        <label class="block text-gray-700 font-medium mb-1 flex justify-between">
                            <span>Age <span class="text-red-500">*</span></span>
                            <span class="font-urdu" dir="rtl">عمر</span>
                        </label>
                        <input type="number" name="age" value="{{ old('age') }}" required class="w-full px-4 py-2 border border-gray-300 rounded focus:ring-gold focus:border-gold outline-none transition">
                    </div>

                    <div>
                        <label class="block text-gray-700 font-medium mb-2 flex justify-between">
                            <span>Gender <span class="text-red-500">*</span></span>
                            <span class="font-urdu" dir="rtl">جنس</span>
                        </label>
                        <div class="flex space-x-6">
                            <label class="inline-flex items-center">
                                <input type="radio" name="gender" value="Male" class="text-gold focus:ring-gold" {{ old('gender') == 'Male' ? 'checked' : '' }} required>
                                <span class="ml-2 mr-2">Male</span> <span class="font-urdu" dir="rtl">مرد</span>
                            </label>
                            <label class="inline-flex items-center">
                                <input type="radio" name="gender" value="Female" class="text-gold focus:ring-gold" {{ old('gender') == 'Female' ? 'checked' : '' }}>
                                <span class="ml-2 mr-2">Female</span> <span class="font-urdu" dir="rtl">عورت</span>
                            </label>
                        </div>
                    </div>

                    <div>
                        <label class="block text-gray-700 font-medium mb-1 flex justify-between">
                            <span>B-Form / Bay Form No</span>
                            <span class="font-urdu" dir="rtl">ب فارم نمبر</span>
                        </label>
                        <input type="text" name="b_form" value="{{ old('b_form') }}" class="w-full px-4 py-2 border border-gray-300 rounded focus:ring-gold focus:border-gold outline-none transition" placeholder="Optional">
                    </div>
                </div>
            </div>

            <!-- Section 2: Contact Information -->
            <div class="mb-10">
                <h3 class="text-xl font-bold text-navy mb-6 flex justify-between border-b pb-2">
                    <span>Contact Information</span>
                    <span class="font-urdu" dir="rtl">رابطہ معلومات</span>
                </h3>
                
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div class="md:col-span-2">
                        <label class="block text-gray-700 font-medium mb-1 flex justify-between">
                            <span>Parent/Guardian Name <span class="text-red-500">*</span></span>
                            <span class="font-urdu" dir="rtl">سرپرست کا نام</span>
                        </label>
                        <input type="text" name="parent_name" value="{{ old('parent_name') }}" required class="w-full px-4 py-2 border border-gray-300 rounded focus:ring-gold focus:border-gold outline-none transition">
                    </div>

                    <div>
                        <label class="block text-gray-700 font-medium mb-1 flex justify-between">
                            <span>Contact Number <span class="text-red-500">*</span></span>
                            <span class="font-urdu" dir="rtl">رابطہ نمبر</span>
                        </label>
                        <input type="text" name="contact_number" value="{{ old('contact_number') }}" required class="w-full px-4 py-2 border border-gray-300 rounded focus:ring-gold focus:border-gold outline-none transition">
                    </div>

                    <div>
                        <label class="block text-gray-700 font-medium mb-1 flex justify-between">
                            <span>Alternate Contact</span>
                            <span class="font-urdu" dir="rtl">متبادل نمبر</span>
                        </label>
                        <input type="text" name="alternate_number" value="{{ old('alternate_number') }}" class="w-full px-4 py-2 border border-gray-300 rounded focus:ring-gold focus:border-gold outline-none transition">
                    </div>

                    <div class="md:col-span-2">
                        <label class="block text-gray-700 font-medium mb-1 flex justify-between">
                            <span>Address <span class="text-red-500">*</span></span>
                            <span class="font-urdu" dir="rtl">پتہ</span>
                        </label>
                        <textarea name="address" required class="w-full px-4 py-2 border border-gray-300 rounded focus:ring-gold focus:border-gold outline-none transition" rows="2">{{ old('address') }}</textarea>
                    </div>

                    <div>
                        <label class="block text-gray-700 font-medium mb-1 flex justify-between">
                            <span>City <span class="text-red-500">*</span></span>
                            <span class="font-urdu" dir="rtl">شہر</span>
                        </label>
                        <input type="text" name="city" value="{{ old('city') }}" required class="w-full px-4 py-2 border border-gray-300 rounded focus:ring-gold focus:border-gold outline-none transition">
                    </div>
                </div>
            </div>

            <!-- Section 3: Education Details -->
            <div class="mb-10">
                <h3 class="text-xl font-bold text-navy mb-6 flex justify-between border-b pb-2">
                    <span>Education Details</span>
                    <span class="font-urdu" dir="rtl">تعلیمی معلومات</span>
                </h3>
                
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label class="block text-gray-700 font-medium mb-1 flex justify-between">
                            <span>Previous School/Madrasa</span>
                            <span class="font-urdu" dir="rtl">سابقہ مدرسہ یا اسکول</span>
                        </label>
                        <input type="text" name="previous_school" value="{{ old('previous_school') }}" class="w-full px-4 py-2 border border-gray-300 rounded focus:ring-gold focus:border-gold outline-none transition">
                    </div>
                    
                    <div>
                        <label class="block text-gray-700 font-medium mb-1 flex justify-between">
                            <span>Last Class Passed</span>
                            <span class="font-urdu" dir="rtl">آخری پاس شدہ جماعت</span>
                        </label>
                        <input type="text" name="last_class_passed" value="{{ old('last_class_passed') }}" class="w-full px-4 py-2 border border-gray-300 rounded focus:ring-gold focus:border-gold outline-none transition">
                    </div>

                    <div class="flex items-center mt-2">
                        <input type="checkbox" name="nazra_completed" id="nazra" class="w-5 h-5 text-gold focus:ring-gold border-gray-300 rounded" {{ old('nazra_completed') ? 'checked' : '' }}>
                        <label for="nazra" class="ml-3 text-gray-700 font-medium flex justify-between w-full">
                            <span>Nazra Completed?</span>
                            <span class="font-urdu" dir="rtl">کیا ناظرہ مکمل ہے؟</span>
                        </label>
                    </div>

                    <div class="flex items-center mt-2">
                        <input type="checkbox" name="hifz_completed" id="hifz" class="w-5 h-5 text-gold focus:ring-gold border-gray-300 rounded" {{ old('hifz_completed') ? 'checked' : '' }}>
                        <label for="hifz" class="ml-3 text-gray-700 font-medium flex justify-between w-full">
                            <span>Hifz Completed?</span>
                            <span class="font-urdu" dir="rtl">کیا حفظ مکمل ہے؟</span>
                        </label>
                    </div>
                </div>
            </div>

            <!-- Section 4: Course Selection -->
            <div class="mb-10">
                <h3 class="text-xl font-bold text-navy mb-6 flex justify-between border-b pb-2">
                    <span>Course Selection <span class="text-red-500">*</span></span>
                    <span class="font-urdu" dir="rtl">کورس کا انتخاب</span>
                </h3>
                
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
                    <label class="flex items-center p-3 border rounded-lg hover:bg-gray-50 cursor-pointer transition">
                        <input type="radio" name="course_selection" value="Nazra Quran" required class="text-gold focus:ring-gold w-4 h-4" {{ old('course_selection') == 'Nazra Quran' ? 'checked' : '' }}>
                        <div class="ml-3 flex-1 flex justify-between items-center text-sm font-medium">
                            <span>Nazra Quran</span>
                            <span class="font-urdu" dir="rtl">ناظرہ قرآن</span>
                        </div>
                    </label>

                    <label class="flex items-center p-3 border rounded-lg hover:bg-gray-50 cursor-pointer transition">
                        <input type="radio" name="course_selection" value="Hifz-ul-Quran" required class="text-gold focus:ring-gold w-4 h-4" {{ old('course_selection') == 'Hifz-ul-Quran' ? 'checked' : '' }}>
                        <div class="ml-3 flex-1 flex justify-between items-center text-sm font-medium">
                            <span>Hifz-ul-Quran</span>
                            <span class="font-urdu" dir="rtl">حفظ القرآن</span>
                        </div>
                    </label>

                    <label class="flex items-center p-3 border rounded-lg hover:bg-gray-50 cursor-pointer transition">
                        <input type="radio" name="course_selection" value="Dars-e-Nizami" required class="text-gold focus:ring-gold w-4 h-4" {{ old('course_selection') == 'Dars-e-Nizami' ? 'checked' : '' }}>
                        <div class="ml-3 flex-1 flex justify-between items-center text-sm font-medium">
                            <span>Dars-e-Nizami</span>
                            <span class="font-urdu" dir="rtl">درس نظامی</span>
                        </div>
                    </label>

                    <label class="flex items-center p-3 border rounded-lg hover:bg-gray-50 cursor-pointer transition">
                        <input type="radio" name="course_selection" value="Basic Islamic Education" required class="text-gold focus:ring-gold w-4 h-4" {{ old('course_selection') == 'Basic Islamic Education' ? 'checked' : '' }}>
                        <div class="ml-3 flex-1 flex justify-between items-center text-sm font-medium">
                            <span>Basic Islamic Ed.</span>
                            <span class="font-urdu" dir="rtl">بنیادی اسلامی تعلیم</span>
                        </div>
                    </label>

                    <label class="flex items-center p-3 border rounded-lg hover:bg-gray-50 cursor-pointer transition md:col-span-2 lg:col-span-1">
                        <input type="radio" name="course_selection" value="Others" required class="text-gold focus:ring-gold w-4 h-4" {{ old('course_selection') == 'Others' ? 'checked' : '' }} onclick="document.getElementById('other_course_input').focus()">
                        <div class="ml-3 flex-1 flex justify-between items-center text-sm font-medium">
                            <span>Others</span>
                            <span class="font-urdu" dir="rtl">دیگر</span>
                        </div>
                    </label>
                </div>
                <div class="mt-4">
                    <input type="text" name="other_course" id="other_course_input" value="{{ old('other_course') }}" placeholder="If Others, please specify / اگر دیگر ہے تو تفصیل لکھیں" class="w-full px-4 py-2 border border-gray-300 rounded focus:ring-gold focus:border-gold outline-none transition font-urdu text-right" dir="auto">
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
                        <textarea name="medical_condition" class="w-full px-4 py-2 border border-gray-300 rounded focus:ring-gold focus:border-gold outline-none transition" rows="2">{{ old('medical_condition') }}</textarea>
                    </div>

                    <div class="md:col-span-2">
                        <label class="block text-gray-700 font-medium mb-1 flex justify-between">
                            <span>Emergency Contact <span class="text-red-500">*</span></span>
                            <span class="font-urdu" dir="rtl">ہنگامی رابطہ</span>
                        </label>
                        <input type="text" name="emergency_contact" value="{{ old('emergency_contact') }}" required class="w-full px-4 py-2 border border-gray-300 rounded focus:ring-gold focus:border-gold outline-none transition">
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
                        <input type="checkbox" required class="w-5 h-5 text-gold focus:ring-gold border-gray-300 rounded">
                    </div>
                    <div class="ml-3">
                        <p class="text-gray-700 font-medium mb-1">I hereby declare that the above information is correct.</p>
                        <p class="font-urdu text-base text-gray-800" dir="rtl">میں تصدیق کرتا/کرتی ہوں کہ اوپر دی گئی تمام معلومات درست ہیں۔</p>
                    </div>
                </div>
            </div>

            <div class="text-center">
                <button type="submit" class="btn-gold px-12 py-4 text-lg font-bold w-full md:w-auto">
                    SUBMIT REGISTRATION / فارم جمع کریں
                </button>
            </div>
            
        </form>
    </div>
</section>
@endsection
