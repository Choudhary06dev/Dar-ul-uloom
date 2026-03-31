<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admission;

class AdmissionController extends Controller
{
    public function index()
    {
        $admissions = Admission::orderBy('created_at', 'desc')->paginate(15);
        return view('admin.admissions.index', compact('admissions'));
    }

    public function edit(Admission $admission)
    {
        return view('admin.admissions.edit', compact('admission'));
    }

    public function update(Request $request, Admission $admission)
    {
        $validated = $request->validate([
            'admission_no' => 'nullable|string|max:255',
            'class_assigned' => 'nullable|string|max:255',
            'fee' => 'nullable|string|max:255',
            'remarks' => 'nullable|string',
            'status' => 'required|string|in:Pending,Approved,Rejected',
        ]);

        $admission->update($validated);

        return redirect()->back()->with('success', 'Admission record updated successfully.');
    }

    public function print(Admission $admission)
    {
        return view('admin.admissions.print', compact('admission'));
    }
}
