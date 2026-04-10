@extends('layouts.admin')

@section('title', 'Admission Review - ' . $admission->student_name)

@section('content')
<div class="row g-4">
    <!-- Header Summary -->
    <div class="col-12">
        <div class="p-4 bg-white border-bottom shadow-sm" style="border-radius: 16px;">
            <div class="row align-items-center">
                <div class="col-md-8 d-flex align-items-center gap-4">
                    @if($admission->image)
                        <img src="{{ asset('storage/app/public/' . $admission->image) }}" alt="Student Picture" class="rounded-circle shadow-sm border border-3 border-white" style="width: 100px; height: 100px; object-fit: cover; object-position: center 15%; flex-shrink: 0;">
                    @else
                        <div class="rounded-circle shadow-sm border border-3 border-white bg-light d-flex align-items-center justify-content-center" style="width: 100px; height: 100px; flex-shrink: 0;">
                            <i class="fa-solid fa-user text-secondary fs-2"></i>
                        </div>
                    @endif
                    <div>
                        <div class="d-flex align-items-center mb-2">
                            <span class="badge bg-brand text-black rounded-pill px-3 py-2 me-3 shadow-sm border border-dark">
                                ID: #{{ $admission->id }}
                            </span>
                            <span class="text-muted small">Submitted on {{ $admission->created_at->format('M d, Y') }}</span>
                        </div>
                        <h2 class="fw-bold mb-1 text-brand">{{ $admission->student_name }}</h2>
                        <p class="mb-0 text-muted fs-5">Applying for <span class="text-brand fw-bold">{{ $admission->course_selection }}</span></p>
                    </div>
                </div>
                <div class="col-md-4 text-md-end mt-4 mt-md-0 d-flex flex-column align-items-md-end gap-3 px-3">
                    @php
                        $statusColors = [
                            'Pending' => 'bg-warning text-dark',
                            'Approved' => 'bg-success text-white',
                            'Rejected' => 'bg-danger text-white'
                        ];
                        $statusColor = $statusColors[$admission->status] ?? 'bg-secondary';
                    @endphp
                    <div class="d-inline-block">
                        <span class="badge {{ $statusColor }} fs-5 px-4 py-2 rounded-3">
                            <i class="fa-solid fa-circle-dot me-2"></i>{{ $admission->status }}
                        </span>
                    </div>
                    <!-- New Print Slip Button -->
                    <a href="{{ route('admin.admissions.print', $admission) }}" target="_blank" class="btn btn-brand px-4 py-2 rounded-pill shadow-sm">
                        <i class="fa-solid fa-print me-2 text-warning"></i> Print Admission Slip
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row g-4 mt-1">
    <!-- Main Content -->
    <div class="col-lg-8">
        <!-- Section 1: Student Information -->
        <div class="bg-white p-4 mb-4 shadow-sm" style="border-radius: 12px; border: 1px solid #eee;">
            <h5 class="fw-bold mb-4 d-flex justify-content-between align-items-center border-bottom pb-2">
                <span class="text-brand">STUDENT INFORMATION</span>
                <span class="font-urdu text-muted small" dir="rtl">طالب علم کی معلومات</span>
            </h5>
            <div class="row g-4">
                <div class="col-md-6">
                    <label class="text-muted small fw-bold text-uppercase mb-1">Student Name</label>
                    <div class="fw-bold fs-6">{{ $admission->student_name }}</div>
                    <hr class="mt-2 mb-0 opacity-10">
                </div>
                <div class="col-md-6">
                    <label class="text-muted small fw-bold text-uppercase mb-1">Father Name</label>
                    <div class="fw-bold fs-6">{{ $admission->father_name }}</div>
                    <hr class="mt-2 mb-0 opacity-10">
                </div>
                <div class="col-md-4">
                    <label class="text-muted small fw-bold text-uppercase mb-1">Date of Birth</label>
                    <div class="fw-bold fs-6">{{ $admission->dob }}</div>
                    <hr class="mt-2 mb-0 opacity-10">
                </div>
                <div class="col-md-4">
                    <label class="text-muted small fw-bold text-uppercase mb-1">Age</label>
                    <div class="fw-bold fs-6">{{ $admission->age }} Years</div>
                    <hr class="mt-2 mb-0 opacity-10">
                </div>
                <div class="col-md-4">
                    <label class="text-muted small fw-bold text-uppercase mb-1">Gender</label>
                    <div class="fw-bold fs-6">{{ $admission->gender }}</div>
                    <hr class="mt-2 mb-0 opacity-10">
                </div>
                <div class="col-12">
                    <label class="text-muted small fw-bold text-uppercase mb-1">Residential Address</label>
                    <div class="fw-bold fs-6">{{ $admission->address }}, {{ $admission->city }}</div>
                    <hr class="mt-2 mb-0 opacity-10">
                </div>
            </div>
        </div>

        <!-- Section 2: Contact Information -->
        <div class="bg-white p-4 mb-4 shadow-sm" style="border-radius: 12px; border: 1px solid #eee;">
            <h5 class="fw-bold mb-4 d-flex justify-content-between align-items-center border-bottom pb-2">
                <span class="text-brand">CONTACT INFORMATION</span>
                <span class="font-urdu text-muted small" dir="rtl">رابطہ معلومات</span>
            </h5>
            <div class="row g-4">
                <div class="col-12">
                    <label class="text-muted small fw-bold text-uppercase mb-1">Parent/Guardian Name</label>
                    <div class="fw-bold fs-6">{{ $admission->parent_name }}</div>
                    <hr class="mt-2 mb-0 opacity-10">
                </div>
                <div class="col-md-6">
                    <label class="text-muted small fw-bold text-uppercase mb-1">Contact Number</label>
                    <div class="fw-bold fs-6 text-brand">{{ $admission->contact_number }}</div>
                    <hr class="mt-2 mb-0 opacity-10">
                </div>
                <div class="col-md-6">
                    <label class="text-muted small fw-bold text-uppercase mb-1">Alternate Contact</label>
                    <div class="fw-bold fs-6">{{ $admission->alternate_number ?: '---' }}</div>
                    <hr class="mt-2 mb-0 opacity-10">
                </div>
                <div class="col-md-6">
                    <label class="text-muted small fw-bold text-uppercase mb-1 text-danger">Emergency Contact</label>
                    <div class="fw-bold fs-6 text-danger">{{ $admission->emergency_contact }}</div>
                    <hr class="mt-2 mb-0 opacity-10">
                </div>
                <div class="col-md-6">
                    <label class="text-muted small fw-bold text-uppercase mb-1">B-Form Number</label>
                    <div class="fw-bold fs-6">{{ $admission->b_form ?: 'N/A' }}</div>
                    <hr class="mt-2 mb-0 opacity-10">
                </div>
            </div>
        </div>

        <div class="row g-4 mb-4">
            <div class="col-md-6">
                <!-- Section 3: Education Details -->
                <div class="bg-white p-4 h-100 shadow-sm" style="border-radius: 12px; border: 1px solid #eee;">
                    <h5 class="fw-bold mb-4 d-flex justify-content-between align-items-center border-bottom pb-2">
                        <span class="text-brand">EDUCATION</span>
                    </h5>
                    <div class="mb-3">
                        <label class="text-muted small fw-bold text-uppercase mb-1">Previous School</label>
                        <div class="fw-bold">{{ $admission->previous_school ?: 'N/A' }}</div>
                    </div>
                    <div class="mb-4">
                        <label class="text-muted small fw-bold text-uppercase mb-1">Last Passed</label>
                        <div class="fw-bold">{{ $admission->last_class_passed ?: 'N/A' }}</div>
                    </div>
                    <div class="d-flex flex-column gap-2 border-top pt-3">
                        <div class="d-flex justify-content-between align-items-center">
                            <span class="small fw-bold">Nazra Completed:</span>
                            <span class="badge {{ $admission->nazra_completed ? 'bg-success' : 'bg-light text-muted' }} rounded-pill">
                                {{ $admission->nazra_completed ? 'YES' : 'NO' }}
                            </span>
                        </div>
                        <div class="d-flex justify-content-between align-items-center">
                            <span class="small fw-bold">Hifz Completed:</span>
                            <span class="badge {{ $admission->hifz_completed ? 'bg-success' : 'bg-light text-muted' }} rounded-pill">
                                {{ $admission->hifz_completed ? 'YES' : 'NO' }}
                            </span>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-6">
                <!-- Section 4: Course Selection -->
                <div class="bg-white p-4 h-100 shadow-sm" style="border-radius: 12px; border: 1px solid #eee;">
                    <h5 class="fw-bold mb-4 d-flex justify-content-between align-items-center border-bottom pb-2">
                        <span class="text-brand">COURSE</span>
                    </h5>
                    <div class="mb-4">
                        <label class="text-muted small fw-bold text-uppercase mb-1">Selected Course</label>
                        <div class="fw-bold fs-5 text-brand">{{ $admission->course_selection }}</div>
                    </div>
                    <div class="alert alert-light border-0 small bg-light p-3" style="border-radius: 10px;">
                        <i class="fa-solid fa-circle-info me-2 text-muted"></i>
                        Student must adhere to the rules and regulations of the department.
                    </div>
                </div>
            </div>
        </div>

        <!-- Section 5: Additional Information -->
        <div class="bg-white p-4 shadow-sm" style="border-radius: 12px; border: 1px solid #eee;">
            <h5 class="fw-bold mb-4 d-flex justify-content-between align-items-center border-bottom pb-2 text-danger">
                <span>MEDICAL & REMARKS</span>
            </h5>
            <div class="p-3 bg-light border-start border-4 border-danger rounded-end">
                <p class="mb-0 text-dark">
                    {{ $admission->medical_condition ?: 'No specific medical conditions reported.' }}
                </p>
            </div>
        </div>
    </div>

    <!-- Office Use Sidebar -->
    <div class="col-lg-4">
        <div class="position-sticky" style="top: 100px;">
            <form action="{{ route('admin.admissions.update', $admission) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="bg-white p-4 shadow-sm border-top border-5 border-brand" style="border-radius: 16px;">
                    <h5 class="fw-bold mb-4 d-flex align-items-center text-brand">
                        <i class="fa-solid fa-stamp me-3 text-warning"></i>
                        OFFICE ACTIONS
                    </h5>

                    <div class="mb-4">
                        <label class="form-label small fw-bold text-uppercase text-muted">Application Status</label>
                        <select name="status" class="form-select border bg-light py-3 rounded-3 shadow-none">
                            <option value="Pending" {{ $admission->status === 'Pending' ? 'selected' : '' }}>🕒 Pending Review</option>
                            <option value="Approved" {{ $admission->status === 'Approved' ? 'selected' : '' }}>✅ Approve Admission</option>
                            <option value="Rejected" {{ $admission->status === 'Rejected' ? 'selected' : '' }}>❌ Reject Application</option>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label class="form-label small fw-bold text-uppercase text-muted">Admission No.</label>
                        <input type="text" name="admission_no" value="{{ old('admission_no', $admission->admission_no) }}" class="form-control border bg-light py-3 rounded-3 shadow-none" placeholder="DAR-2024-xxx">
                    </div>

                    <div class="mb-3">
                        <label class="form-label small fw-bold text-uppercase text-muted">Class / Section</label>
                        <input type="text" name="class_assigned" value="{{ old('class_assigned', $admission->class_assigned) }}" class="form-control border bg-light py-3 rounded-3 shadow-none" placeholder="e.g. Hifz Grade 1">
                    </div>

                    <div class="mb-4">
                        <label class="form-label small fw-bold text-uppercase text-muted">Monthly Fee (PKR)</label>
                        <input type="number" name="fee" value="{{ old('fee', $admission->fee) }}" class="form-control border bg-light py-3 rounded-3 shadow-none" placeholder="5000">
                    </div>

                    <div class="mb-4">
                        <label class="form-label small fw-bold text-uppercase text-muted">Internal Remarks</label>
                        <textarea name="remarks" class="form-control border bg-light py-3 rounded-3 shadow-none" rows="3" placeholder="Office notes...">{{ old('remarks', $admission->remarks) }}</textarea>
                    </div>

                    <div class="d-grid gap-2">
                        <button type="submit" class="btn btn-brand py-3 rounded-3 fw-bold shadow">
                            Update Admission File
                        </button>
                    </div>
                </div>
            </form>
            
            <div class="mt-4 p-4 bg-navy text-white" style="border-radius: 16px;">
                <p class="small opacity-75 mb-0">
                    <i class="fa-solid fa-lightbulb me-2 text-warning"></i>
                    Updates here will appear on the student's dashboard once approved.
                </p>
            </div>
        </div>
    </div>
</div>
@endsection

@push('styles')
<style>
    .bg-navy { background-color: #064e3b; }
    .text-brand { color: #064e3b !important; }
    .btn-brand { background-color: #064e3b; color: white; border: none; transition: 0.3s; }
    .btn-brand:hover { background-color: #043d2e; color: white; transform: translateY(-2px); }
    .font-urdu { font-family: 'Noto Nastaliq Urdu', serif !important; }
</style>
@endpush
