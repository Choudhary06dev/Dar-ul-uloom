@extends('layouts.admin')

@section('title', 'Edit User')

@section('content')
<div class="row justify-content-center">
    <div class="col-lg-10">
        <div class="card border-0 shadow-sm" style="border-radius: 20px;">
            <div class="card-body p-4 p-md-5">
                <div class="mb-4">
                    <h3 class="fw-bold mb-0">Edit User Details</h3>
                    <p class="text-muted">Update the information for {{ $user->name }}</p>
                </div>

                <form action="{{ route('admin.users.update', $user) }}" method="POST" id="user-edit-form">
                    @csrf
                    @method('PATCH')
                    <div class="row gx-3">
                        <div class="col-md-6 mb-4">
                            <label for="name" class="form-label fw-bold text-slate-700">Full Name</label>
                            <input type="text" name="name" id="name" class="form-control p-3 border-0 bg-light rounded-3" value="{{ old('name', $user->name) }}" required>
                            @error('name')
                            <div class="text-danger small mt-1">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-md-6 mb-4">
                            <label for="father_name" class="form-label fw-bold text-slate-700">Father's Name</label>
                            <input type="text" name="father_name" id="father_name" class="form-control p-3 border-0 bg-light rounded-3" value="{{ old('father_name', $user->father_name) }}" required>
                            @error('father_name')
                            <div class="text-danger small mt-1">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-md-6 mb-4">
                            <label for="email" class="form-label fw-bold text-slate-700">Email Address</label>
                            <input type="email" name="email" id="email" class="form-control p-3 border-0 bg-light rounded-3" value="{{ old('email', $user->email) }}" required>
                            @error('email')
                            <div class="text-danger small mt-1">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-md-6 mb-4">
                            <label for="phone" class="form-label fw-bold text-slate-700">Phone Number</label>
                            <input type="text" name="phone" id="phone" class="form-control p-3 border-0 bg-light rounded-3" value="{{ old('phone', $user->phone) }}" required>
                            @error('phone')
                            <div class="text-danger small mt-1">{{ $message }}</div>
                            @enderror
                        </div>

                       
                    </div>

                    <div class="row gx-3">
                        <div class="col-md-6 mb-4">
                            <label for="password" class="form-label fw-bold text-slate-700">New Password</label>
                            <div class="input-group">
                                <input type="password" name="password" id="password" class="form-control p-3 bg-light" placeholder="Leave empty to keep current password" style="border-right: 0;">
                                <span class="input-group-text bg-light border-start-0" style="cursor: pointer; border-color: #ced4da;" onclick="togglePassword('password')">
                                    <i class="fa-solid fa-eye text-slate-400" id="password-icon"></i>
                                </span>
                            </div>
                            @error('password')
                            <div class="text-danger small mt-1">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-md-6 mb-4">
                            <label for="password_confirmation" class="form-label fw-bold text-slate-700">Confirm New Password</label>
                            <div class="input-group">
                                <input type="password" name="password_confirmation" id="password_confirmation" class="form-control p-3 bg-light" placeholder="Repeat new password" style="border-right: 0;">
                                <span class="input-group-text bg-light border-start-0" style="cursor: pointer; border-color: #ced4da;" onclick="togglePassword('password_confirmation')">
                                    <i class="fa-solid fa-eye text-slate-400" id="password_confirmation-icon"></i>
                                </span>
                            </div>
                        </div>

                         <div class="col-12 mb-4">
                            <label for="address" class="form-label fw-bold text-slate-700">Full Address (Optional)</label>
                            <textarea name="address" id="address" class="form-control p-3 border-0 bg-light rounded-3" rows="2">{{ old('address', $user->address) }}</textarea>
                            @error('address')
                            <div class="text-danger small mt-1">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    @if(auth()->id() !== $user->id)
                    <div class="col-md-6 mb-4">
                        <label for="role_id" class="form-label fw-bold text-slate-700">User Role</label>
                        <select name="role_id" id="role_id" class="form-select p-3 border-0 bg-light rounded-3" required>
                            @foreach($roles as $role)
                                <option value="{{ $role->id }}" {{ old('role_id', $user->role_id) == $role->id ? 'selected' : '' }}>
                                    {{ $role->name }}
                                </option>
                            @endforeach
                        </select>
                        <div class="form-text mt-2">Roles define what parts of the system this user can access.</div>
                    </div>
                    @else
                        <input type="hidden" name="role_id" value="{{ $user->role_id }}">
                    @endif
                </form>
                <div class="d-flex justify-content-end gap-3">
                    <a href="{{ route('admin.users') }}" class="btn btn-outline-secondary px-4 py-2 rounded-3">
                        <i class="fa-solid fa-arrow-left me-2"></i> Back to Users
                    </a>
                    <button type="submit" form="user-edit-form" class="btn btn-brand px-5 py-2 font-weight-bold">
                        <i class="fa-solid fa-floppy-disk me-2"></i> Save Changes
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>

@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const form = document.querySelector('form');
        if (!form) return;

        const storedScroll = sessionStorage.getItem('adminUserEditScroll');
        if (storedScroll !== null) {
            window.scrollTo(0, parseInt(storedScroll, 10));
            sessionStorage.removeItem('adminUserEditScroll');
        }

        form.addEventListener('submit', function() {
            sessionStorage.setItem('adminUserEditScroll', window.scrollY);
        });
    });
</script>
@endpush
@endsection