@extends('layouts.admin')

@section('title', 'Admin Profile')

@section('content')
<div class="row justify-content-center">
    <div class="col-lg-10">
        <!-- Profile Header -->
        <div class="card border-0 shadow-sm mb-4 overflow-hidden" style="border-radius: 24px;">
            <div class="card-body p-0">
                <div class="bg-brand p-5 text-white position-relative" style="background: linear-gradient(135deg, var(--primary-green) 0%, #065f46 100%);">
                    <div class="position-absolute top-0 end-0 p-4 opacity-10">
                        <i class="fa-solid fa-shield-halved display-1"></i>
                    </div>
                    <div class="d-flex align-items-center position-relative z-1">
                        <div class="rounded-circle d-flex align-items-center justify-content-center bg-white text-brand fw-bold shadow-lg me-4" style="width: 100px; height: 100px; font-size: 2.5rem; border: 5px solid rgba(255,255,255,0.2)">
                            {{ substr($user->name, 0, 1) }}
                        </div>
                        <div>
                            <h2 class="fw-bold mb-0">{{ $user->name }}</h2>
                            <p class="mb-0 opacity-75 fw-medium text-uppercase tracking-widest small">
                                <i class="fa-solid fa-crown me-2"></i> {{ $user->role->name ?? 'Administrator' }}
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row g-4">
            <!-- Left Column: Settings -->
            <div class="col-md-8">
                <!-- Profile Information Card -->
                <div class="card border-0 shadow-sm mb-4" style="border-radius: 20px;">
                    <div class="card-body p-4 p-md-5">
                        <div class="d-flex align-items-center mb-4">
                            <div class="bg-soft-success p-3 rounded-4 me-3">
                                <i class="fa-solid fa-id-card text-success fs-4"></i>
                            </div>
                            <h4 class="fw-bold mb-0">Profile Information</h4>
                        </div>

                        <form method="post" action="{{ route('admin.profile.update') }}" class="space-y-4">
                            @csrf
                            @method('patch')

                            <div class="row g-4">
                                <div class="col-md-6">
                                    <div class="p-2 rounded-4 border bg-light shadow-sm">
                                        <label class="form-label text-muted small text-uppercase fw-bold mb-1 d-block">Full Name</label>
                                        <div class="input-group border-0">
                                            <span class="input-group-text border-0 bg-transparent text-muted"><i class="fa-solid fa-user"></i></span>
                                            <input type="text" name="name" class="form-control border-0 bg-transparent px-0" value="{{ old('name', $user->name) }}" required autofocus>
                                        </div>
                                    </div>
                                    @error('name') <div class="text-danger small mt-1 px-2">{{ $message }}</div> @enderror
                                </div>

                                <div class="col-md-6">
                                    <div class="p-2 rounded-4 border bg-light shadow-sm">
                                        <label class="form-label text-muted small text-uppercase fw-bold mb-1 d-block">Email Address</label>
                                        <div class="input-group border-0">
                                            <span class="input-group-text border-0 bg-transparent text-muted"><i class="fa-solid fa-envelope"></i></span>
                                            <input type="email" name="email" class="form-control border-0 bg-transparent px-0" value="{{ old('email', $user->email) }}" required>
                                        </div>
                                    </div>
                                    @error('email') <div class="text-danger small mt-1 px-2">{{ $message }}</div> @enderror
                                </div>
                            </div>

                            <div class="mt-4 pt-2">
                                <button type="submit" class="btn btn-brand px-5 py-3 rounded-3 fw-bold">
                                    <i class="fa-solid fa-save me-2"></i> Update Profile
                                </button>

                                @if (session('status') === 'profile-updated')
                                    <span class="ms-3 text-success small fw-bold">
                                        <i class="fa-solid fa-circle-check me-1"></i> Saved successfully!
                                    </span>
                                @endif
                            </div>
                        </form>
                    </div>
                </div>

                <!-- Update Password Card -->
                <div class="card border-0 shadow-sm" style="border-radius: 20px;">
                    <div class="card-body p-4 p-md-5">
                        <div class="d-flex align-items-center mb-4">
                            <div class="bg-soft-success p-3 rounded-4 me-3">
                                <i class="fa-solid fa-key text-success fs-4"></i>
                            </div>
                            <h4 class="fw-bold mb-0">Change Password</h4>
                        </div>

                        <form method="post" action="{{ route('admin.password.update') }}" class="space-y-4">
                            @csrf
                            @method('put')

                            <div class="mb-4 shadow-sm p-3 rounded-4 bg-light border border-warning border-opacity-25" style="background-color: #fffbeb;">
                                <p class="mb-0 text-amber-800 small">
                                    <i class="fa-solid fa-circle-info me-2 text-warning"></i>
                                    Ensure your account is using a long, random password to stay secure.
                                </p>
                            </div>

                            <div class="row g-4">
                                <div class="col-12">
                                    <div class="p-2 rounded-4 border bg-light shadow-sm">
                                        <label class="form-label text-muted small text-uppercase fw-bold mb-1 d-block">Current Password</label>
                                        <div class="input-group border-0">
                                            <span class="input-group-text border-0 bg-transparent text-muted"><i class="fa-solid fa-lock"></i></span>
                                            <input type="password" name="current_password" class="form-control border-0 bg-transparent px-0" required>
                                        </div>
                                    </div>
                                    @error('current_password', 'updatePassword') <div class="text-danger small mt-1 px-2">{{ $message }}</div> @enderror
                                </div>

                                <div class="col-md-6">
                                    <div class="p-2 rounded-4 border bg-light shadow-sm">
                                        <label class="form-label text-muted small text-uppercase fw-bold mb-1 d-block">New Password</label>
                                        <div class="input-group border-0">
                                            <span class="input-group-text border-0 bg-transparent text-muted"><i class="fa-solid fa-shield-halved"></i></span>
                                            <input type="password" name="password" class="form-control border-0 bg-transparent px-0" required>
                                        </div>
                                    </div>
                                    @error('password', 'updatePassword') <div class="text-danger small mt-1 px-2">{{ $message }}</div> @enderror
                                </div>

                                <div class="col-md-6">
                                    <div class="p-2 rounded-4 border bg-light shadow-sm">
                                        <label class="form-label text-muted small text-uppercase fw-bold mb-1 d-block">Confirm Password</label>
                                        <div class="input-group border-0">
                                            <span class="input-group-text border-0 bg-transparent text-muted"><i class="fa-solid fa-check-double"></i></span>
                                            <input type="password" name="password_confirmation" class="form-control border-0 bg-transparent px-0" required>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="mt-4 pt-2">
                                <button type="submit" class="btn btn-outline-brand px-5 py-3 rounded-3 fw-bold">
                                    <i class="fa-solid fa-lock-open me-2"></i> Update Password
                                </button>

                                @if (session('status') === 'password-updated')
                                    <span class="ms-3 text-success small fw-bold">
                                        <i class="fa-solid fa-circle-check me-1"></i> Password changed!
                                    </span>
                                @endif
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <!-- Right Column: Sidebar Stats/Info -->
            <div class="col-md-4">
                <div class="card border-0 shadow-sm mb-4" style="border-radius: 20px;">
                    <div class="card-body p-4">
                        <h5 class="fw-bold mb-4">Account Overview</h5>
                        
                        <div class="d-flex justify-content-between mb-3">
                            <span class="text-muted">Status</span>
                            <span class="badge bg-soft-success text-success rounded-pill px-3">Active</span>
                        </div>
                        <div class="d-flex justify-content-between mb-3">
                            <span class="text-muted">Member Since</span>
                            <span class="fw-semibold">{{ $user->created_at->format('M Y') }}</span>
                        </div>
                        <hr class="opacity-10">
                        <div class="d-flex justify-content-between">
                            <span class="text-muted">Two-Factor</span>
                            <span class="text-danger small fw-bold">Disabled</span>
                        </div>
                    </div>
                </div>

                <div class="card border-0 shadow-sm overflow-hidden" style="border-radius: 20px; background: #fff5f5;">
                    <div class="card-body p-4 text-center">
                        <div class="bg-white rounded-circle d-flex align-items-center justify-content-center mx-auto mb-3 shadow-sm" style="width: 50px; height: 50px;">
                            <i class="fa-solid fa-trash-can text-danger fs-5"></i>
                        </div>
                        <h6 class="fw-bold text-danger mb-2">Delete Account</h6>
                        <p class="text-muted small mb-3">Once deleted, all data will be permanently removed.</p>
                        
                        <button type="button" class="btn btn-danger btn-sm w-100 py-2 rounded-3 fw-bold" data-bs-toggle="modal" data-bs-target="#deleteAccountModal">
                            Delete My Account
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Delete Account Modal -->
<div class="modal fade" id="deleteAccountModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content border-0 shadow-lg" style="border-radius: 20px;">
            <div class="modal-header border-0 pb-0">
                <h5 class="modal-title fw-bold text-danger">Are you absolutely sure?</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form method="post" action="{{ route('admin.profile.destroy') }}">
                @csrf
                @method('delete')
                <div class="modal-body p-4">
                    <p class="text-muted mb-4">Please enter your password to confirm you would like to permanently delete your account.</p>
                    
                    <div class="p-2 rounded-4 border bg-light shadow-sm">
                        <label class="form-label text-muted small text-uppercase fw-bold mb-1 d-block">Your Password</label>
                        <input type="password" name="password" class="form-control border-0 bg-transparent px-2" required placeholder="Enter password">
                    </div>
                </div>
                <div class="modal-footer border-0 pt-0 mt-2">
                    <button type="button" class="btn btn-light px-4 py-2 fw-bold" data-bs-list="modal">Cancel</button>
                    <button type="submit" class="btn btn-danger px-4 py-2 fw-bold">Delete Account</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

@push('styles')
<style>
    .bg-soft-success { background-color: rgba(25, 135, 84, 0.1); }
    .btn-brand { background-color: var(--primary-green); color: white; border-radius: 12px; }
    .btn-brand:hover { background-color: #043d2e; color: white; }
    .btn-outline-brand { border: 2px solid var(--primary-green); color: var(--primary-green); border-radius: 12px; }
    .btn-outline-brand:hover { background-color: var(--primary-green); color: white; }
    .text-brand { color: var(--primary-green); }
    .form-control:focus { box-shadow: none; border-color: transparent; }
</style>
@endpush
