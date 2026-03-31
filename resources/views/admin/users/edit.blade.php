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

                <form action="{{ route('admin.users.update', $user) }}" method="POST">
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
                            <label for="email" class="form-label fw-bold text-slate-700">Email Address</label>
                            <input type="email" name="email" id="email" class="form-control p-3 border-0 bg-light rounded-3" value="{{ old('email', $user->email) }}" required>
                            @error('email')
                            <div class="text-danger small mt-1">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="row gx-3">
                        <div class="col-md-6 mb-4">
                            <label for="password" class="form-label fw-bold text-slate-700">New Password</label>
                            <input type="password" name="password" id="password" class="form-control p-3 border-0 bg-light rounded-3" placeholder="Leave empty to keep current password">
                            @error('password')
                            <div class="text-danger small mt-1">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-md-6 mb-4">
                            <label for="password_confirmation" class="form-label fw-bold text-slate-700">Confirm New Password</label>
                            <input type="password" name="password_confirmation" id="password_confirmation" class="form-control p-3 border-0 bg-light rounded-3" placeholder="Repeat new password">
                        </div>
                    </div>
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

            // Disable page scroll while in edit mode
            document.body.style.overflow = 'hidden';
        });
    </script>
    @endpush
    @endsection