@extends('layouts.admin')

@section('title', 'Manage Users')

@section('content')
<div class="card border-0 shadow-sm" style="border-radius: 20px;">
    <div class="card-body p-4 p-md-5">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h3 class="fw-bold mb-0">System Users</h3>
            <a href="{{ route('admin.users.create') }}" class="btn btn-brand px-4 py-2 shadow-sm">
                <i class="fa-solid fa-plus me-2"></i> Add New User
            </a>
        </div>

        @if (session('status'))
            <div class="alert alert-success alert-dismissible fade show border-0 rounded-3 shadow-sm mb-4" role="alert">
                <i class="fa-solid fa-check-circle me-2"></i> {{ session('status') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        @endif

        @if (session('error'))
            <div class="alert alert-danger alert-dismissible fade show border-0 rounded-3 shadow-sm mb-4" role="alert">
                <i class="fa-solid fa-triangle-exclamation me-2"></i> {{ session('error') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        @endif

        <div class="table-responsive">
            <table class="table table-hover align-middle shadow-sm rounded-3 overflow-hidden" style="border: 1px solid #f1f5f9">
                <thead class="bg-light text-muted uppercase tracking-wider" style="font-size: 0.75rem">
                    <tr>
                        <th class="px-4 py-3">ID</th>
                        <th class="px-4 py-3">Name</th>
                        <th class="px-4 py-3">Email Address</th>
                        <th class="px-4 py-3 text-end">Actions</th>
                    </tr>
                </thead>
                <tbody class="border-0">
                    @forelse ($users as $user)
                        <tr>
                            <td class="px-4 font-monospace small text-muted">#{{ str_pad($user->id, 4, '0', STR_PAD_LEFT) }}</td>
                            <td class="px-4">
                                <div class="fw-bold text-slate-700">{{ $user->name }}</div>
                            </td>
                            <td class="px-4 text-muted">{{ $user->email }}</td>
                            <td class="px-4 text-end">
                                <div class="d-flex justify-content-end gap-2">
                                    <a href="{{ route('admin.users.show', $user) }}" class="btn btn-sm btn-light p-2 px-3 border rounded-3" title="View Profile">
                                        <i class="fa-solid fa-eye text-success"></i>
                                    </a>
                                    <a href="{{ route('admin.users.edit', $user) }}" class="btn btn-sm btn-light p-2 px-3 border rounded-3" title="Edit User">
                                        <i class="fa-solid fa-pen-to-square text-primary"></i>
                                    </a>

                                    
                                    <form action="{{ route('admin.users.destroy', $user) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this user?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-light p-2 px-3 border rounded-3" title="Delete User" {{ auth()->id() === $user->id ? 'disabled opacity-50' : '' }}>
                                            <i class="fa-solid fa-trash-can text-danger"></i>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" class="text-center py-5 text-muted">No users found in the system.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <div class="mt-4">
            {{ $users->links() }}
        </div>
    </div>
</div>
@endsection
