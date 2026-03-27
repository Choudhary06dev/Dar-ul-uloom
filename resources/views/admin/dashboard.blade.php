@extends('layouts.admin')

@section('title', 'Dashboard Overview')

@section('content')
<div class="row g-4">
    <!-- Welcome Section -->
    <div class="col-12">
        <div class="card border-0 bg-transparent mb-2">
            <h2 class="fw-bold text-slate-900">Assalam-o-Alaikum, {{ Auth::user()->name }}! 👋</h2>
            <p class="text-muted">Here is what's happening with Dar-ul-uloom today.</p>
        </div>
    </div>

    <!-- Stats Cards -->
    <div class="col-md-6 col-lg-3">
        <div class="card stat-card bg-white h-100">
            <div class="d-flex align-items-center mb-3">
                <div class="rounded-circle bg-success bg-opacity-10 p-3 me-3">
                    <i class="fa-solid fa-users text-success fs-4"></i>
                </div>
                <div>
                    <div class="text-muted small fw-bold text-uppercase tracking-wider">Total Users</div>
                    <h3 class="fw-bold mb-0">1,240</h3>
                </div>
            </div>
            <div class="mt-2">
                <span class="text-success fw-bold"><i class="fa-solid fa-arrow-up me-1"></i> 12%</span>
                <span class="text-muted small ms-1">since last month</span>
            </div>
        </div>
    </div>

    <div class="col-md-6 col-lg-3">
        <div class="card stat-card bg-white h-100">
            <div class="d-flex align-items-center mb-3">
                <div class="rounded-circle bg-warning bg-opacity-10 p-3 me-3">
                    <i class="fa-solid fa-graduation-cap text-warning fs-4"></i>
                </div>
                <div>
                    <div class="text-muted small fw-bold text-uppercase tracking-wider">Students</div>
                    <h3 class="fw-bold mb-0">458</h3>
                </div>
            </div>
            <div class="mt-2">
                <span class="text-warning fw-bold"><i class="fa-solid fa-circle me-1"></i> Active</span>
                <span class="text-muted small ms-1">currently enrolled</span>
            </div>
        </div>
    </div>

    <div class="col-md-6 col-lg-3">
        <div class="card stat-card bg-white h-100">
            <div class="d-flex align-items-center mb-3">
                <div class="rounded-circle bg-primary bg-opacity-10 p-3 me-3">
                    <i class="fa-solid fa-book-open text-primary fs-4"></i>
                </div>
                <div>
                    <div class="text-muted small fw-bold text-uppercase tracking-wider">Total Courses</div>
                    <h3 class="fw-bold mb-0">32</h3>
                </div>
            </div>
            <div class="mt-2">
                <span class="text-primary fw-bold"><i class="fa-solid fa-plus me-1"></i> 2 New</span>
                <span class="text-muted small ms-1">added this week</span>
            </div>
        </div>
    </div>

    <div class="col-md-6 col-lg-3">
        <div class="card stat-card bg-white h-100">
            <div class="d-flex align-items-center mb-3">
                <div class="rounded-circle bg-danger bg-opacity-10 p-3 me-3">
                    <i class="fa-solid fa-money-bill-wave text-danger fs-4"></i>
                </div>
                <div>
                    <div class="text-muted small fw-bold text-uppercase tracking-wider">Revenue</div>
                    <h3 class="fw-bold mb-0">PKR 85K</h3>
                </div>
            </div>
            <div class="mt-2">
                <span class="text-danger fw-bold"><i class="fa-solid fa-arrow-down me-1"></i> 5%</span>
                <span class="text-muted small ms-1">vs last month</span>
            </div>
        </div>
    </div>

    <!-- Quick Actions -->
    <div class="col-12 mt-5">
        <div class="card border-0 shadow-sm p-4" style="border-radius: 20px;">
            <h5 class="fw-bold mb-4">Quick Actions</h5>
            <div class="d-flex flex-wrap gap-3">
                <a href="{{ route('admin.users') }}" class="btn btn-brand px-4 py-3">
                    <i class="fa-solid fa-user-plus me-2"></i> Add New User
                </a>
                <button class="btn btn-outline-dark px-4 py-3 rounded-3" style="border-radius: 12px !important">
                    <i class="fa-solid fa-file-export me-2"></i> Export Reports
                </a>
                <a href="{{ route('frontend.index') }}" target="_blank" class="btn btn-outline-secondary px-4 py-3" style="border-radius: 12px !important">
                    <i class="fa-solid fa-eye me-2"></i> Preview Website
                </a>
            </div>
        </div>
    </div>
</div>
@endsection

