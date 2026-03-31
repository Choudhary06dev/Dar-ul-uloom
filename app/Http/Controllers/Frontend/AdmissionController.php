<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admission;

class AdmissionController extends Controller
{
    public function create()
    {
        return view('frontend.admission');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'student_name' => 'required|string|max:255',
            'father_name' => 'required|string|max:255',
            'dob' => 'required|date',
            'age' => 'required|integer',
            'gender' => 'required|string',
            'b_form' => 'nullable|string|max:255',
            'parent_name' => 'required|string|max:255',
            'contact_number' => 'required|string|max:255',
            'alternate_number' => 'nullable|string|max:255',
            'address' => 'required|string',
            'city' => 'required|string|max:255',
            'previous_school' => 'nullable|string|max:255',
            'last_class_passed' => 'nullable|string|max:255',
            'course_selection' => 'required|string|max:255',
            'other_course' => 'nullable|string|max:255',
            'medical_condition' => 'nullable|string',
            'emergency_contact' => 'required|string|max:255',
        ]);

        $validated['nazra_completed'] = $request->has('nazra_completed');
        $validated['hifz_completed'] = $request->has('hifz_completed');

        Admission::create($validated);

        return redirect()->back()->with('success', 'Your admission form has been submitted successfully! / آپ کا داخلہ فارم کامیابی کے ساتھ جمع ہو گیا ہے!');
    }
}
