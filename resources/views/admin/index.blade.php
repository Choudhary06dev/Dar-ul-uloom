@extends('layouts.admin')

@section('title', 'Admin - Login Required')

@section('content')
<div class="container-fluid mt-4">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    <h1>Admin Panel</h1>
                </div>
                <div class="card-body">
                    @guest
                    <p>Please login to access the admin panel.</p>
                    <a href="{{ route('login') }}" class="btn btn-primary">Login</a>
                    <a href="{{ route('register') }}" class="btn btn-secondary">Register</a>
                    @else
                    <p>Welcome back, {{ Auth::user()->name }}!</p>
                    <a href="{{ route('admin.dashboard') }}" class="btn btn-primary">Go to Dashboard</a>
                    @endguest
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
