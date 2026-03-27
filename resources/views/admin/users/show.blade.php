@extends('layouts.admin')

@section('title', 'User Details')

@section('content')
<div class="row justify-content-center">
    <div class="col-lg-8">
        <div class="card border-0 shadow-sm" style="border-radius: 20px;">
            <div class="card-body p-4 p-md-5">
                <div class="d-flex justify-content-between align-items-center mb-4">
                    <div>
                        <h3 class="fw-bold mb-0">User Profile</h3>
                        <p class="text-muted">Viewing details for {{ $user->name }}</p>
                    </div>
                    <a href="{{ route('admin.users') }}" class="btn btn-light border px-4 py-2">
                        <i class="fa-solid fa-arrow-left me-2"></i> Back to List
                    </a>
                </div>

                <div class="row g-4 mt-2">
                    <div class="col-md-4 text-center border-end">
                        <div class="rounded-circle d-inline-flex align-items-center justify-content-center text-white mb-3" 
                             style="width: 100px; height: 100px; background: var(--primary-green); font-size: 2.5rem">
                            {{ substr($user->name, 0, 1) }}
                        </div>
                        <h5 class="fw-bold mb-1">{{ $user->name }}</h5>
                        <p class="badge bg-success bg-opacity-10 text-success rounded-pill px-3">System Administrator</p>
                    </div>
                    
                    <div class="col-md-8 px-md-5">
                        <h6 class="text-uppercase text-muted fw-bold small tracking-widest mb-4">Account Information</h6>
                        
                        <div class="mb-4">
                            <label class="text-muted small mb-1">Full Name</label>
                            <div class="fw-bold text-slate-800">{{ $user->name }}</div>
                        </div>

                        <div class="mb-4">
                            <label class="text-muted small mb-1">Email Address</label>
                            <div class="fw-bold text-slate-800">{{ $user->email }}</div>
                        </div>

                        <div class="mb-4">
                            <label class="text-muted small mb-1">Account Created</label>
                            <div class="fw-bold text-slate-800">{{ $user->created_at->format('M d, Y - h:i A') }}</div>
                        </div>

                        <div class="d-flex gap-3 pt-4">
                            <a href="{{ route('admin.users.edit', $user) }}" class="btn btn-brand px-4 py-2">
                                <i class="fa-solid fa-pen-to-square me-2"></i> Edit Account
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
