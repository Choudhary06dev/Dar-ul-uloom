@extends('layouts.admin')

@section('title', 'Review Admission Application')

@section('content')
<div class="row">
    <!-- Student Information Summary -->
    <div class="col-lg-8">
        <div class="card border-0 shadow-sm p-4 mb-4" style="border-radius: 20px;">
            <h5 class="fw-bold mb-4 border-bottom pb-2">Student Information</h5>
            
            <div class="row g-3 mb-4">
                <div class="col-md-6">
                    <label class="text-muted small fw-bold">Student Name</label>
                    <div class="fs-5">{{ $admission->student_name }}</div>
                </div>
                <div class="col-md-6">
                    <label class="text-muted small fw-bold">Father Name</label>
                    <div class="fs-5">{{ $admission->father_name }}</div>
                </div>
                <div class="col-md-4">
                    <label class="text-muted small fw-bold">Date of Birth</label>
                    <div>{{ $admission->dob }}</div>
                </div>
                <div class="col-md-4">
                    <label class="text-muted small fw-bold">Age</label>
                    <div>{{ $admission->age }}</div>
                </div>
                <div class="col-md-4">
                    <label class="text-muted small fw-bold">Gender</label>
                    <div>{{ $admission->gender }}</div>
                </div>
            </div>

            <h5 class="fw-bold mb-4 border-bottom pb-2 mt-4">Contact Information</h5>
            <div class="row g-3 mb-4">
                <div class="col-md-6">
                    <label class="text-muted small fw-bold">Parent/Guardian Name</label>
                    <div>{{ $admission->parent_name }}</div>
                </div>
                <div class="col-md-6">
                    <label class="text-muted small fw-bold">Contact Number</label>
                    <div>{{ $admission->contact_number }}</div>
                </div>
                <div class="col-12">
                    <label class="text-muted small fw-bold">Address</label>
                    <div>{{ $admission->address }}, {{ $admission->city }}</div>
                </div>
            </div>

            <h5 class="fw-bold mb-4 border-bottom pb-2 mt-4">Education & Course</h5>
            <div class="row g-3 mb-2">
                <div class="col-md-6">
                    <label class="text-muted small fw-bold">Course Selected</label>
                    <div class="fs-5 fw-bold text-success">{{ $admission->course_selection }}</div>
                </div>
                <div class="col-md-6">
                    <label class="text-muted small fw-bold">Previous Education</label>
                    <div>Last Class: {{ $admission->last_class_passed ?: 'N/A' }}</div>
                </div>
                <div class="col-md-6">
                    <span class="badge {{ $admission->nazra_completed ? 'bg-success' : 'bg-secondary' }}">
                        <i class="fa-solid {{ $admission->nazra_completed ? 'fa-check' : 'fa-xmark' }}"></i> Nazra
                    </span>
                    <span class="badge {{ $admission->hifz_completed ? 'bg-success' : 'bg-secondary' }} ms-2">
                        <i class="fa-solid {{ $admission->hifz_completed ? 'fa-check' : 'fa-xmark' }}"></i> Hifz
                    </span>
                </div>
            </div>
        </div>
    </div>

    <!-- Office Use Form -->
    <div class="col-lg-4">
        <form action="{{ route('admin.admissions.update', $admission) }}" method="POST">
            @csrf
            @method('PUT')
            
            <div class="card border-0 shadow-sm p-4" style="border-radius: 20px; background-color: #f8fafc; border-top: 4px solid var(--accent-gold) !important;">
                <h5 class="fw-bold mb-4 border-bottom pb-2">Office Use Only</h5>
                
                <div class="mb-3">
                    <label class="form-label fw-bold">Status</label>
                    <select name="status" class="form-select border-0 shadow-sm">
                        <option value="Pending" {{ $admission->status === 'Pending' ? 'selected' : '' }}>Pending</option>
                        <option value="Approved" {{ $admission->status === 'Approved' ? 'selected' : '' }}>Approved</option>
                        <option value="Rejected" {{ $admission->status === 'Rejected' ? 'selected' : '' }}>Rejected</option>
                    </select>
                </div>
                
                <div class="mb-3">
                    <label class="form-label fw-bold">Admission No.</label>
                    <input type="text" name="admission_no" value="{{ old('admission_no', $admission->admission_no) }}" class="form-control border-0 shadow-sm" placeholder="e.g. ADM-2024-001">
                </div>
                
                <div class="mb-3">
                    <label class="form-label fw-bold">Class Assigned</label>
                    <input type="text" name="class_assigned" value="{{ old('class_assigned', $admission->class_assigned) }}" class="form-control border-0 shadow-sm">
                </div>
                
                <div class="mb-3">
                    <label class="form-label fw-bold">Fee Details</label>
                    <input type="text" name="fee" value="{{ old('fee', $admission->fee) }}" class="form-control border-0 shadow-sm" placeholder="e.g. 5000">
                </div>
                
                <div class="mb-4">
                    <label class="form-label fw-bold">Remarks</label>
                    <textarea name="remarks" class="form-control border-0 shadow-sm" rows="3">{{ old('remarks', $admission->remarks) }}</textarea>
                </div>
                
                <div class="d-grid mt-4">
                    <button type="submit" class="btn btn-brand py-2">
                        <i class="fa-solid fa-save me-2"></i> Save Record
                    </button>
                    <a href="{{ route('admin.admissions.index') }}" class="btn btn-light mt-2">Cancel</a>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection
