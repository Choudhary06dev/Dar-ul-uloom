@extends('layouts.admin')

@section('title', 'Edit User')

@section('content')
<div class="row justify-content-center">
    <div class="col-lg-6">
        <div class="card border-0 shadow-sm" style="border-radius: 20px;">
            <div class="card-body p-4 p-md-5">
                <div class="mb-4">
                    <h3 class="fw-bold mb-0">Edit User Details</h3>
                    <p class="text-muted">Update the information for {{ $user->name }}</p>
                </div>

                <form action="{{ route('admin.users.update', $user) }}" method="POST">
                    @csrf
                    @method('PATCH')

                    <!-- Name -->
                    <div class="mb-4">
                        <label for="name" class="form-label fw-bold text-slate-700">Full Name</label>
                        <input type="text" name="name" id="name" class="form-control p-3 border-0 bg-light rounded-3" value="{{ old('name', $user->name) }}" required>
                        @error('name')
                            <div class="text-danger small mt-1">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Email -->
                    <div class="mb-4">
                        <label for="email" class="form-label fw-bold text-slate-700">Email Address</label>
                        <input type="email" name="email" id="email" class="form-control p-3 border-0 bg-light rounded-3" value="{{ old('email', $user->email) }}" required>
                        @error('email')
                            <div class="text-danger small mt-1">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="d-flex gap-3 pt-3">
                        <button type="submit" class="btn btn-brand px-4 py-2 flex-grow-1">
                            <i class="fa-solid fa-save me-2"></i> Update User
                        </button>
                        <a href="{{ route('admin.users') }}" class="btn btn-light border px-4 py-2">
                            Cancel
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
