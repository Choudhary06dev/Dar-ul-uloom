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
        $validated['student_id'] = auth('student')->id();

        Admission::create($validated);

        return redirect()->back()->with('success', 'Your admission form has been submitted successfully! / آپ کا داخلہ فارم کامیابی کے ساتھ جمع ہو گیا ہے!');
    }

    /**
     * Display a listing of all admissions for management.
     */
    public function managementIndex(Request $request)
    {
        if (!auth('web')->check()) {
            abort(403, 'Unauthorized access.');
        }

        $admissions = Admission::with('student')->latest()->paginate(15);
        
        $stats = [
            'total' => Admission::count(),
            'pending' => Admission::where('status', 'Pending')->count(),
            'approved' => Admission::where('status', 'Approved')->count(),
        ];

        return view('frontend.management.admissions.index', compact('admissions', 'stats'));
    }

    /**
     * Display the specified admission for management.
     */
    public function managementShow(Admission $admission)
    {
        if (!auth('web')->check()) {
            abort(403, 'Unauthorized access.');
        }

        return view('frontend.management.admissions.show', compact('admission'));
    }

    /**
     * Update the specified admission for management.
     */
    public function managementUpdate(Request $request, Admission $admission)
    {
        if (!auth('web')->check()) {
            abort(403, 'Unauthorized access.');
        }

        $validated = $request->validate([
            'status' => 'required|string|in:Pending,Approved,Rejected',
            'admission_no' => 'nullable|string|max:255',
            'class_assigned' => 'nullable|string|max:255',
            'fee' => 'nullable|numeric',
            'remarks' => 'nullable|string',
        ]);

        $admission->update($validated);

        return redirect()->back()->with('success', 'Admission record updated successfully! / داخلہ کا ریکارڈ کامیابی کے ساتھ اپ ڈیٹ کر دیا گیا hai!');
    }

    /**
     * Display the printable version of the admission.
     */
    public function print(Admission $admission)
    {
        $isAdmin = auth('web')->check() && auth('web')->user()->is_admin;
        $isOwner = auth('student')->check() && $admission->student_id === auth('student')->id();

        if (!$isAdmin && !$isOwner) {
            abort(403, 'Unauthorized access.');
        }

        // Reuse the admin print view as it's a standalone template
        return view('admin.admissions.print', compact('admission'));
    }
}
