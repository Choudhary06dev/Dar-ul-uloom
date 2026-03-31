@extends('layouts.admin')

@section('title', 'Manage Admissions')

@section('content')
<div class="card border-0 shadow-sm p-4" style="border-radius: 20px;">
    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <div class="d-flex justify-content-between align-items-center mb-4">
        <h5 class="fw-bold mb-0">Admission Applications</h5>
    </div>

    <div class="table-responsive">
        <table class="table table-hover align-middle">
            <thead class="table-light">
                <tr>
                    <th>ID</th>
                    <th>Date</th>
                    <th>Student Name</th>
                    <th>Course</th>
                    <th>Status</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse($admissions as $admission)
                <tr>
                    <td>#{{ $admission->id }}</td>
                    <td>{{ $admission->created_at->format('d M, Y') }}</td>
                    <td class="fw-bold">{{ $admission->student_name }}</td>
                    <td>{{ $admission->course_selection }}</td>
                    <td>
                        @if($admission->status === 'Pending')
                            <span class="badge bg-warning text-dark px-3 py-2 rounded-pill">Pending</span>
                        @elseif($admission->status === 'Approved')
                            <span class="badge bg-success px-3 py-2 rounded-pill">Approved</span>
                        @else
                            <span class="badge bg-danger px-3 py-2 rounded-pill">Rejected</span>
                        @endif
                    </td>
                    <td>
                        <a href="{{ route('admin.admissions.edit', $admission) }}" class="btn btn-sm btn-brand">
                            <i class="fa-solid fa-pen-to-square"></i> Review
                        </a>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="6" class="text-center py-4 text-muted">No admission applications found.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
    
    <div class="mt-4">
        {{ $admissions->links('pagination::bootstrap-5') }}
    </div>
</div>
@endsection
