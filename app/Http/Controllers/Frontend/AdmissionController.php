<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admission;

class AdmissionController extends Controller
{
    public function create()
    {
        $admission = null;
        if (auth('student')->check()) {
            /** @var \App\Models\Student $student */
            $student = auth('student')->user();
            $admission = $student->admissions()->latest()->first();
        }
        return view('frontend.admission', compact('admission'));
    }

    public function store(Request $request)
    {
        // If student already has an admission, block new submission
        if (auth('student')->check()) {
            /** @var \App\Models\Student $student */
            $student = auth('student')->user();
            if ($student->admissions()->exists()) {
                return redirect()->route('frontend.admission.create')
                    ->with('error', 'You have already submitted an admission form. Please edit your existing application.');
            }
        }

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
            'image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('admissions/images', 'public');
            $validated['image'] = $imagePath;
        }

        $validated['nazra_completed'] = $request->has('nazra_completed');
        $validated['hifz_completed'] = $request->has('hifz_completed');
        $validated['student_id'] = auth('student')->id();

        Admission::create($validated);

        return redirect()->route('frontend.admission.create')
            ->with('success', 'Your admission form has been submitted successfully! / آپ کا داخلہ فارم کامیابی کے ساتھ جمع ہو گیا ہے!');
    }

    /**
     * Student updates their own pending admission.
     */
    public function studentUpdate(Request $request, Admission $admission)
    {
        // Security: ensure student owns this admission
        if (!auth('student')->check() || $admission->student_id !== auth('student')->id()) {
            abort(403, 'Unauthorized.');
        }

        // Block editing if already approved/rejected
        if (in_array($admission->status, ['Approved', 'Rejected'])) {
            return redirect()->route('frontend.admission.create')
                ->with('error', 'Your admission has been ' . $admission->status . ' and can no longer be edited.');
        }

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
            'image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        if ($request->hasFile('image')) {
            // Delete old image if exists
            if ($admission->image && \Illuminate\Support\Facades\Storage::disk('public')->exists($admission->image)) {
                \Illuminate\Support\Facades\Storage::disk('public')->delete($admission->image);
            }
            $validated['image'] = $request->file('image')->store('admissions/images', 'public');
        }

        $validated['nazra_completed'] = $request->has('nazra_completed');
        $validated['hifz_completed'] = $request->has('hifz_completed');

        $admission->update($validated);

        return redirect()->route('frontend.admission.create')
            ->with('success', 'Your admission form has been updated successfully! / آپ کا فارم کامیابی سے اپ ڈیٹ ہو گیا!');
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
