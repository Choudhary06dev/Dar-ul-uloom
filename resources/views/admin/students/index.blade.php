@extends('layouts.admin')

@section('title', 'Manage Students')

@section('content')
<div class="card border-0 shadow-sm" style="border-radius: 20px;">
    <div class="card-body p-4 p-md-5">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <div>
                <h3 class="fw-bold mb-1">Registered Students</h3>
                <p class="text-muted small mb-0">List of all students registered through the frontend</p>
            </div>
        </div>

        <div class="table-responsive">
            <table class="table table-hover align-middle">
                <thead class="bg-light text-muted uppercase tracking-wider" style="font-size: 0.75rem">
                    <tr>
                        <th class="px-4 py-3">ID</th>
                        <th class="px-4 py-3">Full Name</th>
                        <th class="px-4 py-3">Email Address</th>
                        <th class="px-4 py-3">Joined Date</th>
                        <th class="px-4 py-3 text-end">Account Status</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($students as $student)
                    <tr>
                        <td class="px-4 font-monospace small text-muted">#STU-{{ str_pad($student->id, 4, '0', STR_PAD_LEFT) }}</td>
                        <td class="px-4">
                            <div class="d-flex align-items-center">
                                <div class="bg-primary bg-opacity-10 text-primary rounded-circle d-flex align-items-center justify-content-center me-3" style="width: 35px; height: 35px; font-weight: bold;">
                                    {{ substr($student->name, 0, 1) }}
                                </div>
                                <div class="fw-bold text-slate-700">{{ $student->name }}</div>
                            </div>
                        </td>
                        <td class="px-4 text-muted">{{ $student->email }}</td>
                        <td class="px-4 text-muted small">{{ $student->created_at->format('M d, Y') }}</td>
                        <td class="px-4 text-end">
                            <span class="badge bg-soft-success text-success px-3 py-2 rounded-pill">
                                <i class="fa-solid fa-check-circle me-1"></i> Active
                            </span>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="5" class="text-center py-5 text-muted">No students registered yet.</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <div class="mt-4">
            {{ $students->links() }}
        </div>
    </div>
</div>
@endsection
