@extends('layouts.admin')

@section('title', 'Create New User')

@section('content')
<div class="card border-0 shadow-sm" style="border-radius: 20px;">
    <div class="card-body p-4 p-md-5">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h3 class="fw-bold mb-0">Create New User</h3>
            <a href="{{ route('admin.users') }}" class="btn btn-outline-secondary px-4 py-2 rounded-3">
                <i class="fa-solid fa-arrow-left me-2"></i> Back to Users
            </a>
        </div>

        @if($errors->any())
            <div class="alert alert-danger">
                <ul class="mb-0">
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form method="POST" action="{{ route('admin.users.store') }}" class="row g-4">
            @csrf

            <div class="col-12 col-md-6">
                <label for="name" class="form-label font-semibold">Full Name</label>
                <input type="text" id="name" name="name" value="{{ old('name') }}" class="form-control px-4 py-2.5 rounded-3 border-slate-200" required placeholder="Full Name">
            </div>

            <div class="col-12 col-md-6">
                <label for="father_name" class="form-label font-semibold">Father's Name</label>
                <input type="text" id="father_name" name="father_name" value="{{ old('father_name') }}" class="form-control px-4 py-2.5 rounded-3 border-slate-200" required placeholder="Father's Name">
            </div>

            <div class="col-12 col-md-6">
                <label for="email" class="form-label font-semibold">Email Account</label>
                <input type="email" id="email" name="email" value="{{ old('email') }}" class="form-control px-4 py-2.5 rounded-3 border-slate-200" required placeholder="example@email.com">
            </div>

            <div class="col-12 col-md-6">
                <label for="phone" class="form-label font-semibold">Phone Number</label>
                <input type="text" id="phone" name="phone" value="{{ old('phone') }}" class="form-control px-4 py-2.5 rounded-3 border-slate-200" required placeholder="03XXXXXXXXX">
            </div>


            <div class="col-12 col-md-6">
                <label for="password" class="form-label">Password</label>
                <div class="input-group">
                    <input type="password" id="password" name="password" class="form-control" required style="border-right: 0;">
                    <span class="input-group-text bg-white border-start-0" style="cursor: pointer;" onclick="togglePassword('password')">
                        <i class="fa-solid fa-eye text-muted" id="password-icon"></i>
                    </span>
                </div>
            </div>

            <div class="col-12 col-md-6">
                <label for="password_confirmation" class="form-label">Confirm Password</label>
                <div class="input-group">
                    <input type="password" id="password_confirmation" name="password_confirmation" class="form-control" required style="border-right: 0;">
                    <span class="input-group-text bg-white border-start-0" style="cursor: pointer;" onclick="togglePassword('password_confirmation')">
                        <i class="fa-solid fa-eye text-muted" id="password_confirmation-icon"></i>
                    </span>
                </div>
            </div>

            
            <div class="col-12">
                <label for="address" class="form-label font-semibold">Full Address (Optional)</label>
                <textarea id="address" name="address" rows="2" class="form-control px-4 py-2.5 rounded-3 border-slate-200" placeholder="Street, City, Country">{{ old('address') }}</textarea>
            </div>

            <div class="col-12">
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="1" id="is_admin" name="is_admin" {{ old('is_admin') ? 'checked' : '' }}>
                    <label class="form-check-label" for="is_admin">Admin Privileges</label>
                </div>
            </div>

            <div class="col-12">
                <button type="submit" class="btn btn-brand px-5 py-2 font-weight-bold">Create User</button>
            </div>
        </form>
    </div>
</div>
@endsection
