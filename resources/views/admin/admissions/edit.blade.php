@extends('layouts.admin')

@section('title', 'Admission Review - ' . $admission->student_name)

@section('content')
<div class="row g-4">
    <!-- Header Summary -->
    <div class="col-12">
        <div class="card border-0 shadow-sm p-4 overflow-hidden" style="border-radius: 24px; background: linear-gradient(135deg, #064e3b 0%, #065f46 100%);">
            <div class="row align-items-center position-relative" style="z-index: 1;">
                <div class="col-md-8 text-white">
                    <div class="d-flex align-items-center mb-2">
                        <span class="badge bg-white text-dark rounded-pill px-3 py-2 me-3 shadow-sm">
                            ID: #{{ $admission->id }}
                        </span>
                        <span class="text-white-50 small">Submitted on {{ $admission->created_at->format('M d, Y') }}</span>
                    </div>
                    <h2 class="fw-bold mb-1">{{ $admission->student_name }}</h2>
                    <p class="mb-0 opacity-75 fs-5">Applying for <span class="text-warning fw-bold">{{ $admission->course_selection }}</span></p>
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
                    <div class="d-inline-block p-2 bg-white bg-opacity-10 rounded-4">
                        <span class="badge {{ $statusColor }} fs-5 px-4 py-2 rounded-3 shadow-lg">
                            <i class="fa-solid fa-circle-dot me-2"></i>{{ $admission->status }}
                        </span>
                    </div>
                    <button onclick="window.print()" class="btn btn-light btn-sm px-3 py-2 rounded-pill shadow-sm d-print-none">
                        <i class="fa-solid fa-print me-2"></i> Print Application
                    </button>
                </div>
            </div>
        </div>
    </div>

    <!-- Main Content -->
    <div class="col-lg-8">
        <!-- Personal Details -->
        <div class="card border-0 shadow-sm mb-4" style="border-radius: 20px;">
            <div class="card-header bg-white border-0 py-4 px-4">
                <h5 class="fw-bold mb-0 d-flex align-items-center">
                    <div class="rounded-circle bg-success bg-opacity-10 p-2 me-3">
                        <i class="fa-solid fa-user text-success fs-6"></i>
                    </div>
                    Student & Family Information
                </h5>
            </div>
            <div class="card-body px-4 pb-4 pt-0">
                <div class="row g-4">
                    <div class="col-md-6">
                        <div class="p-3 border rounded-4 bg-light bg-opacity-50">
                            <label class="text-muted small fw-bold text-uppercase mb-1 d-block">Father Name</label>
                            <div class="fw-bold fs-6">{{ $admission->father_name }}</div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="p-3 border rounded-4">
                            <label class="text-muted small fw-bold text-uppercase mb-1 d-block">Guardian Name</label>
                            <div class="fw-bold fs-6">{{ $admission->parent_name }}</div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="p-3 border rounded-4">
                            <label class="text-muted small fw-bold text-uppercase mb-1 d-block">Date of Birth</label>
                            <div class="fw-bold fs-6">{{ $admission->dob }}</div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="p-3 border rounded-4">
                            <label class="text-muted small fw-bold text-uppercase mb-1 d-block">Age</label>
                            <div class="fw-bold fs-6">{{ $admission->age }} Years</div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="p-3 border rounded-4">
                            <label class="text-muted small fw-bold text-uppercase mb-1 d-block">Gender</label>
                            <div class="fw-bold fs-6">
                                <i class="fa-solid {{ $admission->gender == 'Male' ? 'fa-mars text-primary' : 'fa-venus text-danger' }} me-1"></i>
                                {{ $admission->gender }}
                            </div>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="p-3 border rounded-4">
                            <label class="text-muted small fw-bold text-uppercase mb-1 d-block"><i class="fa-solid fa-map-location-dot me-1"></i> Residential Address</label>
                            <div class="fw-bold fs-6">{{ $admission->address }}, <span class="text-success">{{ $admission->city }}</span></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Contact & Education Details -->
        <div class="row">
            <div class="col-md-6">
                <div class="card border-0 shadow-sm h-100" style="border-radius: 20px;">
                    <div class="card-header bg-white border-0 py-4 px-4">
                        <h5 class="fw-bold mb-0 d-flex align-items-center">
                            <div class="rounded-circle bg-primary bg-opacity-10 p-2 me-3">
                                <i class="fa-solid fa-phone text-primary fs-6"></i>
                            </div>
                            Contact Info
                        </h5>
                    </div>
                    <div class="card-body px-4 pb-4 pt-0">
                        <div class="list-group list-group-flush border-0">
                            <div class="list-group-item px-0 py-3 d-flex justify-content-between align-items-center">
                                <span class="text-muted">Primary Number</span>
                                <span class="fw-bold">{{ $admission->contact_number }}</span>
                            </div>
                            <div class="list-group-item px-0 py-3 d-flex justify-content-between align-items-center">
                                <span class="text-muted">Alternate</span>
                                <span class="fw-bold text-muted">{{ $admission->alternate_number ?: '---' }}</span>
                            </div>
                            <div class="list-group-item px-0 py-3 d-flex justify-content-between align-items-center">
                                <span class="text-muted">Emergency</span>
                                <span class="fw-bold text-danger">{{ $admission->emergency_contact }}</span>
                            </div>
                            <div class="list-group-item px-0 py-3 d-flex justify-content-between align-items-center">
                                <span class="text-muted">B-Form No.</span>
                                <span class="badge bg-light text-dark fw-bold">{{ $admission->b_form ?: 'N/A' }}</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-6">
                <div class="card border-0 shadow-sm h-100" style="border-radius: 20px;">
                    <div class="card-header bg-white border-0 py-4 px-4">
                        <h5 class="fw-bold mb-0 d-flex align-items-center">
                            <div class="rounded-circle bg-warning bg-opacity-10 p-2 me-3">
                                <i class="fa-solid fa-graduation-cap text-warning fs-6"></i>
                            </div>
                            Education Status
                        </h5>
                    </div>
                    <div class="card-body px-4 pb-4 pt-0">
                        <div class="p-3 rounded-4 border mb-3 bg-light bg-opacity-50">
                            <label class="text-muted small fw-bold text-uppercase mb-1 d-block">Previous School</label>
                            <div class="fw-bold">{{ $admission->previous_school ?: 'N/A' }}</div>
                        </div>
                        <div class="p-3 rounded-4 border mb-4">
                            <label class="text-muted small fw-bold text-uppercase mb-1 d-block">Last Class Passed</label>
                            <div class="fw-bold">{{ $admission->last_class_passed ?: 'N/A' }}</div>
                        </div>
                        <div class="d-flex gap-2 text-center">
                            <div class="flex-grow-1 p-2 rounded-3 border {{ $admission->nazra_completed ? 'bg-success text-white border-success' : 'bg-light text-muted' }}">
                                <i class="fa-solid {{ $admission->nazra_completed ? 'fa-check-circle' : 'fa-circle-xmark' }} mb-1 d-block fs-5"></i>
                                <small class="fw-bold d-block">Nazra</small>
                            </div>
                            <div class="flex-grow-1 p-2 rounded-3 border {{ $admission->hifz_completed ? 'bg-success text-white border-success' : 'bg-light text-muted' }}">
                                <i class="fa-solid {{ $admission->hifz_completed ? 'fa-check-circle' : 'fa-circle-xmark' }} mb-1 d-block fs-5"></i>
                                <small class="fw-bold d-block">Hifz</small>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Medical Info -->
        <div class="card border-0 shadow-sm mt-4 overflow-hidden" style="border-radius: 20px;">
             <div class="card-header bg-white border-0 py-4 px-4">
                <h5 class="fw-bold mb-0 d-flex align-items-center text-danger">
                    <div class="rounded-circle bg-danger bg-opacity-10 p-2 me-3">
                        <i class="fa-solid fa-notes-medical text-danger fs-6"></i>
                    </div>
                    Medical Condition & Background
                </h5>
            </div>
            <div class="card-body p-4 pt-0">
                <div class="rounded-4 p-4 {{ $admission->medical_condition ? 'bg-danger bg-opacity-10' : 'bg-light' }}">
                    <p class="mb-0 text-dark opacity-75">
                        {{ $admission->medical_condition ?: 'No specific medical conditions or dietary requirements reported by the parent/guardian for this student.' }}
                    </p>
                </div>
            </div>
        </div>
    </div>

    <div class="col-lg-4" id="office-sidebar">
        <div class="position-sticky" style="top: 100px;">
            <form action="{{ route('admin.admissions.update', $admission) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="card border-0 shadow p-4" style="border-radius: 24px; border-top: 6px solid var(--accent-gold) !important;">
                    <h5 class="fw-bold mb-4 d-flex align-items-center">
                        <div class="rounded-circle bg-warning bg-opacity-10 p-2 me-3">
                            <i class="fa-solid fa-stamp text-warning fs-6"></i>
                        </div>
                        Administrative Action
                    </h5>

                    <div class="mb-4">
                        <label class="form-label small fw-bold text-uppercase text-muted">Application Status</label>
                        <select name="status" class="form-select border shadow-none py-3 rounded-4 d-print-none">
                            <option value="Pending" {{ $admission->status === 'Pending' ? 'selected' : '' }}>🕒 Pending Review</option>
                            <option value="Approved" {{ $admission->status === 'Approved' ? 'selected' : '' }}>✅ Approve Admission</option>
                            <option value="Rejected" {{ $admission->status === 'Rejected' ? 'selected' : '' }}>❌ Reject Application</option>
                        </select>
                        <div class="print-value d-none">{{ $admission->status }}</div>
                    </div>

                    <div class="mb-3">
                        <label class="form-label small fw-bold text-uppercase text-muted">Admission No.</label>
                        <div class="input-group d-print-none">
                            <span class="input-group-text bg-white border-end-0 rounded-start-4"><i class="fa-solid fa-hashtag text-muted"></i></span>
                            <input type="text" name="admission_no" value="{{ old('admission_no', $admission->admission_no) }}" class="form-control border-start-0 py-3 rounded-end-4" placeholder="e.g. DAR-2024-001">
                        </div>
                        <div class="print-value d-none">{{ $admission->admission_no ?: 'Waiting' }}</div>
                    </div>

                    <div class="mb-3">
                        <label class="form-label small fw-bold text-uppercase text-muted">Class / Section</label>
                        <input type="text" name="class_assigned" value="{{ old('class_assigned', $admission->class_assigned) }}" class="form-control py-3 rounded-4 d-print-none" placeholder="e.g. Hifz Grade 1">
                        <div class="print-value d-none">{{ $admission->class_assigned ?: 'Not assigned yet' }}</div>
                    </div>

                    <div class="mb-3">
                        <label class="form-label small fw-bold text-uppercase text-muted">Monthly Fee (PKR)</label>
                        <div class="input-group d-print-none">
                            <span class="input-group-text bg-white border-end-0 rounded-start-4">Rs</span>
                            <input type="number" name="fee" value="{{ old('fee', $admission->fee) }}" class="form-control border-start-0 py-3 rounded-end-4" placeholder="5000">
                        </div>
                        <div class="print-value d-none">PKR {{ $admission->fee ?: '0' }}</div>
                    </div>

                    <div class="mb-4">
                        <label class="form-label small fw-bold text-uppercase text-muted">Internal Remarks</label>
                        <textarea name="remarks" class="form-control py-3 rounded-4 d-print-none" rows="4" placeholder="Add notes for office record...">{{ old('remarks', $admission->remarks) }}</textarea>
                        <div class="print-value d-none" style="min-height: 60px;">{{ $admission->remarks ?: 'No additional remarks.' }}</div>
                    </div>

                    <div class="d-grid gap-2">
                        <button type="submit" class="btn btn-brand py-3 rounded-4 fw-bold shadow">
                            <i class="fa-solid fa-cloud-arrow-up me-2"></i> Update Admission File
                        </button>
                        <a href="{{ route('admin.admissions.index') }}" class="btn btn-light py-3 rounded-4 text-muted">
                            <i class="fa-solid fa-chevron-left me-2"></i> Back to List
                        </a>
                    </div>
                </div>
            </form>
            
            <div class="mt-4 p-4 rounded-4 border-start border-4 border-warning bg-white shadow-sm decorative-tip">
                <h6 class="fw-bold mb-2 small"><i class="fa-solid fa-lightbulb text-warning me-2"></i> Quick Tip</h6>
                <p class="small text-muted mb-0">Changes saved here will be reflected in the student directory and financial module.</p>
            </div>
        </div>
    </div>
</div>
@endsection

@push('styles')
<style>
    @media print {
        /* Hide UI & Input components */
        #sidebar, .topbar, .d-print-none, .btn-brand, .btn-light, .decorative-tip, i, 
        select, input, textarea, button {
            display: none !important;
        }
        
        /* Layout adjustments */
        #main-content {
            margin-left: 0 !important;
            padding: 0 !important;
            background: white !important;
        }
        .container {
            max-width: 100% !important;
            width: 100% !important;
            padding: 10mm !important;
        }
        .row {
            margin: 0 !important;
            display: flex !important;
            flex-wrap: wrap !important;
        }
        #office-sidebar {
            display: block !important;
            width: 100% !important;
            margin-top: 20px !important;
        }
        #office-sidebar .card {
            background: #fff !important;
            border: 2px solid #000 !important;
        }
        
        /* Official Document Look */
        .card {
            border: none !important;
            border-bottom: 1px solid #000 !important;
            box-shadow: none !important;
            margin-bottom: 15px !important;
            border-radius: 0 !important;
            page-break-inside: avoid !important;
        }
        .card-header {
            padding: 5px 0 !important;
            border-bottom: 2px solid #000 !important;
            background: transparent !important;
            color: #000 !important;
            text-transform: uppercase !important;
            font-weight: 900 !important;
        }
        .card-body {
            padding: 10px 0 !important;
        }

        /* Value Display for Print */
        .print-value {
            display: block !important;
            font-weight: bold !important;
            border-bottom: 1px dotted #000 !important;
            min-height: 1.2em !important;
            margin-top: 2px !important;
        }
        
        /* Hide original background cards and use simple borders */
        .col-lg-8, .col-lg-4 {
            width: 100% !important;
            padding: 0 !important;
        }
        .col-md-4, .col-md-6 {
            width: 33.33% !important;
            float: left !important;
            padding: 5px !important;
        }
        .col-12 {
            width: 100% !important;
            padding: 5px !important;
        }

        /* Simplified Header */
        .card[style*="linear-gradient"] {
            background: #fff !important;
            color: #000 !important;
            border: 2px solid #000 !important;
            padding: 10px !important;
            margin-bottom: 20px !important;
            text-align: center !important;
        }
        .card[style*="linear-gradient"] * {
            color: #000 !important;
        }
        .card[style*="linear-gradient"] .badge {
            border: 1px solid #000 !important;
        }

        /* Font optimization */
        body {
            font-size: 12px !important;
            line-height: 1.4 !important;
            color: #000 !important;
        }
        label { 
            font-size: 9pt !important;
            color: #444 !important;
            margin-bottom: 0 !important;
            display: block !important;
        }
    }
</style>
@endpush
