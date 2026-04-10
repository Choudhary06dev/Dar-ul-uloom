<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admission Slip - {{ $admission->student_name }}</title>
    
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;600;700&family=Noto+Nastaliq+Urdu:wght@400;700&display=swap" rel="stylesheet">
    
    <style>
        :root {
            --brand-navy: #000;
            --brand-gold: #c5a059;
        }
        
        @page {
            size: A4;
            margin: 1cm;
        }
        
        body {
            font-family: 'Plus Jakarta Sans', sans-serif;
            color: #000;
            background: #fff;
            margin: 0;
            padding: 0;
            font-size: 10pt;
            line-height: 1.4;
        }
        
        .font-urdu {
            font-family: 'Noto Nastaliq Urdu', serif;
            line-height: 1.8;
        }
        
        .container {
            width: 100%;
            max-width: 800px;
            margin: 0 auto;
        }
        
        /* Header Styling */
        .header {
            text-align: center;
            border-bottom: 2px solid #000;
            padding-bottom: 10px;
            margin-bottom: 20px;
        }
        
        .header h1 {
            margin: 0;
            font-size: 22pt;
            text-transform: uppercase;
        }
        
        .header h2 {
            margin: 5px 0;
            font-size: 18pt;
        }
        
        .header p {
            margin: 2px 0;
            font-size: 10pt;
        }
        
        /* Section Styling */
        .section {
            margin-bottom: 15px;
            border: 1px solid #000;
            page-break-inside: avoid;
        }
        
        .section-header {
            background: #f0f0f0;
            padding: 5px 10px;
            border-bottom: 1px solid #000;
            display: flex;
            justify-content: space-between;
            align-items: center;
            font-weight: bold;
        }
        
        .section-body {
            padding: 10px;
        }
        
        /* Grid Layout */
        .grid {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 10px 20px;
        }
        
        .field {
            border-bottom: 1px solid #eee;
            padding-bottom: 2px;
        }
        
        .label {
            font-size: 8pt;
            font-weight: 600;
            display: flex;
            justify-content: space-between;
            color: #444;
        }
        
        .value {
            font-weight: 700;
            font-size: 10pt;
            margin-top: 2px;
        }
        
        /* Signatures */
        .signature-row {
            margin-top: 30px;
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 40px;
            text-align: center;
        }
        
        .sig-box {
            border-top: 1px solid #000;
            padding-top: 5px;
        }
        
        /* Office Use */
        .office-use {
            margin-top: 20px;
            border: 2px solid #000;
            padding: 15px;
            background: #fafafa;
        }
        
        .office-header {
            text-align: center;
            font-weight: 900;
            text-decoration: underline;
            margin-bottom: 10px;
        }

        .no-print {
            display: block;
            text-align: center;
            padding: 20px;
            background: #fdf6e3;
            border-bottom: 1px solid #eee;
        }

        @media print {
            .no-print { display: none; }
            body { margin: 0; padding: 0; }
        }
    </style>
</head>
<body>
    <div class="no-print">
        <button onclick="window.print()" style="padding: 10px 20px; cursor: pointer; background: #064e3b; color: #fff; border: none; border-radius: 5px; font-weight: bold;">
            PRINT SLIP / سلپ پرنٹ کریں
        </button>
        <p style="margin-top: 10px; font-size: 0.9rem;">Check your printer settings (Margins: None, Scale: 100%) for best results.</p>
    </div>

    <div class="container">
        <!-- Header -->
        <div class="header" style="position: relative;">
            <h1>Admission Form</h1>
            <h2 class="font-urdu" dir="rtl">مدرسہ طلباء داخلہ فارم</h2>
            <p style="font-weight: 700;">Dar-ul-Uloom Anwaar-e-Mustafa BOR</p>
            <p class="font-urdu" dir="rtl" style="font-size: 12pt;">وَلَقَدْ يَسَّرْنَا الْقُرْآنَ لِلذِّكْرِ فَهَلْ مِن مُّدَّکِرٍ</p>
            <p class="font-urdu" dir="rtl" style="font-size: 9pt;">اور بے شک ہم نے قرآن کو نصیحت کے لیے آسان بنا دیا ہے، تو ہے کوئی نصیحت حاصل کرنے والا؟</p>
            
            <!-- Passport Size Photo -->
            @if($admission->image)
            <div style="position: absolute; top: 0; left: 0; width: 110px; height: 140px; border: 2px solid #000; padding: 3px; background: #fff;">
                <img src="{{ asset('storage/app/public/' . $admission->image) }}" alt="Student Picture" style="width: 100%; height: 100%; object-fit: cover; object-position: center 15%; display: block;">
            </div>
            @else
            <div style="position: absolute; top: 0; left: 0; width: 110px; height: 140px; border: 1px dashed #666; padding: 3px; background: #fdfdfd; display: flex; align-items: center; justify-content: center;">
                <span class="font-urdu" style="color: #ccc;">تصویر چسپاں کریں</span>
            </div>
            @endif
        </div>

        <!-- Section 1: Personal -->
        <div class="section">
            <div class="section-header">
                <span>STUDENT INFORMATION</span>
                <span class="font-urdu" dir="rtl">طالب علم کی معلومات</span>
            </div>
            <div class="section-body">
                <div class="grid">
                    <div class="field">
                        <div class="label"><span>Student Name</span> <span class="font-urdu" dir="rtl">نام</span></div>
                        <div class="value">{{ $admission->student_name }}</div>
                    </div>
                    <div class="field">
                        <div class="label"><span>Father Name</span> <span class="font-urdu" dir="rtl">والد کا نام</span></div>
                        <div class="value">{{ $admission->father_name }}</div>
                    </div>
                    <div class="field">
                        <div class="label"><span>Date of Birth</span> <span class="font-urdu" dir="rtl">تاریخ پیدائش</span></div>
                        <div class="value">{{ $admission->dob }}</div>
                    </div>
                    <div class="field">
                        <div class="label"><span>Age</span> <span class="font-urdu" dir="rtl">عمر</span></div>
                        <div class="value">{{ $admission->age }} Years</div>
                    </div>
                    <div class="field">
                        <div class="label"><span>Gender</span> <span class="font-urdu" dir="rtl">جنس</span></div>
                        <div class="value">{{ $admission->gender }}</div>
                    </div>
                    <div class="field">
                        <div class="label"><span>B-Form No.</span> <span class="font-urdu" dir="rtl">ب فارم نمبر</span></div>
                        <div class="value">{{ $admission->b_form ?: 'N/A' }}</div>
                    </div>
                    <div class="field" style="grid-column: span 2;">
                        <div class="label"><span>Residential Address</span> <span class="font-urdu" dir="rtl">پتہ</span></div>
                        <div class="value">{{ $admission->address }}, {{ $admission->city }}</div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Section 2: Contact -->
        <div class="section">
            <div class="section-header">
                <span>CONTACT INFORMATION</span>
                <span class="font-urdu" dir="rtl">رابطہ معلومات</span>
            </div>
            <div class="section-body">
                <div class="grid">
                    <div class="field">
                        <div class="label"><span>Guardian Name</span> <span class="font-urdu" dir="rtl">سرپرست کا نام</span></div>
                        <div class="value">{{ $admission->parent_name }}</div>
                    </div>
                    <div class="field">
                        <div class="label"><span>Primary Number</span> <span class="font-urdu" dir="rtl">نمبر</span></div>
                        <div class="value">{{ $admission->contact_number }}</div>
                    </div>
                    <div class="field">
                        <div class="label"><span>Alternate Number</span> <span class="font-urdu" dir="rtl">متبادل نمبر</span></div>
                        <div class="value">{{ $admission->alternate_number ?: '---' }}</div>
                    </div>
                    <div class="field">
                        <div class="label"><span>Emergency Contact</span> <span class="font-urdu" dir="rtl">ہنگامی رابطہ</span></div>
                        <div class="value" style="color: red;">{{ $admission->emergency_contact }}</div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Section 3 & 4 (Combined Row) -->
        <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 15px;">
            <div class="section">
                <div class="section-header">
                    <span>ACADEMIC</span>
                    <span class="font-urdu" dir="rtl">تعلیمی</span>
                </div>
                <div class="section-body">
                    <div class="field" style="margin-bottom: 8px;">
                        <div class="label"><span>Previous School</span></div>
                        <div class="value">{{ $admission->previous_school ?: 'N/A' }}</div>
                    </div>
                    <div class="field">
                        <div class="label"><span>Last Passed</span></div>
                        <div class="value">{{ $admission->last_class_passed ?: 'N/A' }}</div>
                    </div>
                </div>
            </div>
            <div class="section">
                <div class="section-header">
                    <span>COURSE</span>
                    <span class="font-urdu" dir="rtl">کورس</span>
                </div>
                <div class="section-body">
                    <div class="field" style="margin-bottom: 8px;">
                        <div class="label"><span>Applied For</span></div>
                        <div class="value" style="font-size: 11pt;">{{ $admission->course_selection }}</div>
                    </div>
                    <div class="field">
                        <div class="label"><span>Hifz/Nazra</span></div>
                        <div class="value">
                            {{ $admission->nazra_completed ? 'Nazra √' : '' }} 
                            {{ $admission->hifz_completed ? 'Hifz √' : '' }}
                            @if(!$admission->nazra_completed && !$admission->hifz_completed) Not Done @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Section 5: Medical -->
        <div class="section">
            <div class="section-header">
                <span>MEDICAL & REMARKS</span>
                <span class="font-urdu" dir="rtl">طبی معلومات</span>
            </div>
            <div class="section-body" style="font-size: 9pt;">
                {{ $admission->medical_condition ?: 'No specific medical conditions reported.' }}
            </div>
        </div>

        <!-- Declaration -->
        <div style="padding: 10px; border: 1px dashed #000; margin-bottom: 15px;">
            <div class="label"><span>DECLARATION</span> <span class="font-urdu" dir="rtl">اقرار نامہ</span></div>
            <p style="font-size: 8pt; margin: 5px 0;">I declare that all information provided is correct. میں تصدیق کرتا ہوں کہ تمام معلومات درست ہیں۔</p>
            <div class="signature-row" style="margin-top: 60px;">
                <div class="sig-box">Guardian Signature / سرپرست کے دستخط</div>
                <div class="sig-box">Applicant Signature / طالب علم کے دستخط</div>
            </div>
        </div>

        <!-- Office Use Only (Shifted to 2nd Page) -->
        <div class="office-use" style="page-break-before: always;">
            <div class="office-header">صرف دفتری استعمال کے لیے / FOR OFFICE USE ONLY</div>
            <div class="grid">
                <div class="field">
                    <div class="label"><span>Admission Status</span></div>
                    <div class="value">{{ $admission->status }}</div>
                </div>
                <div class="field">
                    <div class="label"><span>Roll Number / ID</span></div>
                    <div class="value">{{ $admission->admission_no ?: '_______________' }}</div>
                </div>
                <div class="field">
                    <div class="label"><span>Class Assigned</span></div>
                    <div class="value">{{ $admission->class_assigned ?: '_______________' }}</div>
                </div>
                <div class="field">
                    <div class="label"><span>Monthly Fee</span></div>
                    <div class="value">PKR {{ $admission->fee ?: '_______' }}</div>
                </div>
            </div>
            <div class="signature-row" style="margin-top: 60px;">
                <div class="sig-box">Authorized Administrator Signature</div>
                <div class="sig-box">Principal Signature / Stamp</div>
            </div>
        </div>
    </div>

    <script>
        // Optional: Auto-print on load if needed
        // window.onload = function() { window.print(); }
    </script>
</body>
</html>
