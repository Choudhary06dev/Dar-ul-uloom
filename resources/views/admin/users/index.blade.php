@extends('layouts.admin')

@section('title', 'Manage Users')

@push('styles')
<style>
    .modal-content-blur {
        background: rgba(255, 255, 255, 0.7);
        backdrop-filter: blur(15px);
        -webkit-backdrop-filter: blur(15px);
        border: 1px solid rgba(255, 255, 255, 0.2);
        border-radius: 20px;
    }
    .modal-backdrop.show {
        opacity: 0.15;
        backdrop-filter: blur(8px);
        -webkit-backdrop-filter: blur(8px);
        background-color: var(--primary-green);
    }
    .modal.fade .modal-dialog {
        transform: scale(0.9);
        transition: transform 0.3s ease-out;
    }
    .modal.show .modal-dialog {
        transform: scale(1);
    }
    .bg-soft-success { background: rgba(25, 135, 84, 0.1); }
    .bg-light-subtle { background: #f8fafc; }
</style>
@endpush

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
                                    <button type="button" class="btn btn-sm btn-light p-2 px-3 border rounded-3 btn-user-modal-instant" 
                                            data-type="show"
                                            data-id="{{ str_pad($user->id, 4, '0', STR_PAD_LEFT) }}"
                                            data-name="{{ $user->name }}"
                                            data-email="{{ $user->email }}"
                                            data-joined="{{ $user->created_at->format('M d, Y') }}"
                                            title="View Profile">
                                        <i class="fa-solid fa-eye text-success"></i>
                                    </button>
                                    <button type="button" class="btn btn-sm btn-light p-2 px-3 border rounded-3 btn-user-modal-instant" 
                                            data-type="edit"
                                            data-id="{{ $user->id }}"
                                            data-name="{{ $user->name }}"
                                            data-email="{{ $user->email }}"
                                            data-admin="{{ $user->is_admin ? '1' : '0' }}"
                                            data-self="{{ auth()->id() === $user->id ? '1' : '0' }}"
                                            data-action="{{ route('admin.users.update', $user) }}"
                                            title="Edit User">
                                        <i class="fa-solid fa-pen-to-square text-primary"></i>
                                    </button>

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

<!-- Dynamic Modal -->
<div class="modal fade" id="userDynamicModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content modal-content-blur shadow-lg">
            <div class="modal-header border-0 pb-0">
                <h5 class="modal-title fw-bold" id="userDynamicModalTitle">User Information</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body p-4" id="userDynamicModalBody">
                <!-- Templates will be injected here instantly -->
            </div>
        </div>
    </div>
</div>

<!-- Template for View -->
<template id="template-show">
    <div class="user-details-content p-2">
        <div class="text-center mb-4">
            <div class="bg-light rounded-circle d-inline-flex align-items-center justify-content-center text-primary fw-bold shadow-sm mb-3" style="width: 80px; height: 80px; font-size: 2rem; border: 4px solid #fff">
                <span class="user-initial"></span>
            </div>
            <h4 class="fw-bold mb-1 user-name"></h4>
            <span class="badge bg-soft-success text-success px-3 py-2 rounded-pill">
                <i class="fa-solid fa-shield-halved me-1"></i> Administrator
            </span>
        </div>

        <div class="row g-3 text-start">
            <div class="col-12">
                <div class="p-3 rounded-4 border bg-light-subtle">
                    <label class="text-muted small text-uppercase fw-bold mb-1 d-block" style="letter-spacing: 0.5px">Full Name</label>
                    <div class="fw-semibold user-name"></div>
                </div>
            </div>
            <div class="col-12">
                <div class="p-3 rounded-4 border bg-light-subtle">
                    <label class="text-muted small text-uppercase fw-bold mb-1 d-block" style="letter-spacing: 0.5px">Email Address</label>
                    <div class="fw-semibold text-break user-email"></div>
                </div>
            </div>
            <div class="col-6">
                <div class="p-3 rounded-4 border bg-light-subtle">
                    <label class="text-muted small text-uppercase fw-bold mb-1 d-block" style="letter-spacing: 0.5px">Account ID</label>
                    <div class="fw-semibold font-monospace user-id"></div>
                </div>
            </div>
            <div class="col-6">
                <div class="p-3 rounded-4 border bg-light-subtle">
                    <label class="text-muted small text-uppercase fw-bold mb-1 d-block" style="letter-spacing: 0.5px">Joined Date</label>
                    <div class="fw-semibold user-joined"></div>
                </div>
            </div>
        </div>
    </div>
</template>

<!-- Template for Edit -->
<template id="template-edit">
    <form method="POST" id="editUserForm">
        @csrf
        @method('PATCH')
        
        <div class="user-edit-content p-2">
            <div class="row g-3 text-start">
                <div class="col-12">
                    <div class="p-3 rounded-4 border bg-white shadow-sm">
                        <label class="form-label text-muted small text-uppercase fw-bold mb-1 d-block">Full Name</label>
                        <div class="input-group input-group-lg border rounded-3 overflow-hidden">
                            <span class="input-group-text border-0 bg-transparent text-muted"><i class="fa-solid fa-user-tag"></i></span>
                            <input type="text" name="name" class="form-control border-0 px-2 edit-name" required>
                        </div>
                    </div>
                </div>
                
                <div class="col-12">
                    <div class="p-3 rounded-4 border bg-white shadow-sm">
                        <label class="form-label text-muted small text-uppercase fw-bold mb-1 d-block">Email Address</label>
                        <div class="input-group input-group-lg border rounded-3 overflow-hidden">
                            <span class="input-group-text border-0 bg-transparent text-muted"><i class="fa-solid fa-envelope"></i></span>
                            <input type="email" name="email" class="form-control border-0 px-2 edit-email" required>
                        </div>
                    </div>
                </div>
                
                <div class="col-12">
                    <div class="p-3 rounded-4 border bg-white shadow-sm">
                        <label class="form-label text-muted small text-uppercase fw-bold mb-1 d-block">New Password (optional)</label>
                        <div class="input-group input-group-lg border rounded-3 overflow-hidden">
                            <span class="input-group-text border-0 bg-transparent text-muted"><i class="fa-solid fa-key"></i></span>
                            <input type="password" name="password" class="form-control border-0 px-2" placeholder="Leave blank to keep current">
                        </div>
                    </div>
                </div>

                <div class="col-12">
                    <div class="p-3 rounded-4 border bg-white shadow-sm">
                        <label class="form-label text-muted small text-uppercase fw-bold mb-1 d-block">Confirm Password</label>
                        <div class="input-group input-group-lg border rounded-3 overflow-hidden">
                            <span class="input-group-text border-0 bg-transparent text-muted"><i class="fa-solid fa-lock"></i></span>
                            <input type="password" name="password_confirmation" class="form-control border-0 px-2" placeholder="Repeat new password">
                        </div>
                    </div>
                </div>

                <div class="col-12 is-admin-wrapper">
                    <div class="form-check form-switch p-3 border rounded-4 bg-light bg-opacity-50">
                        <input class="form-check-input ms-0 me-3 edit-admin" type="checkbox" name="is_admin" value="1" id="edit_is_admin">
                        <label class="form-check-label fw-bold text-slate-700" for="edit_is_admin">Admin Privileges</label>
                    </div>
                </div>
            </div>
            
            <div class="d-grid mt-4">
                <button type="submit" class="btn btn-brand py-3 rounded-3 fw-bold">
                    <i class="fa-solid fa-save me-2"></i> Update User
                </button>
            </div>
        </div>
    </form>
</template>

@endsection

@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const userModal = new bootstrap.Modal(document.getElementById('userDynamicModal'));
        const modalBody = document.getElementById('userDynamicModalBody');
        const modalTitle = document.getElementById('userDynamicModalTitle');
        const instantButtons = document.querySelectorAll('.btn-user-modal-instant');

        instantButtons.forEach(button => {
            button.addEventListener('click', function() {
                const type = this.getAttribute('data-type');
                const name = this.getAttribute('data-name');
                const email = this.getAttribute('data-email');
                const id = this.getAttribute('data-id');
                const joined = this.getAttribute('data-joined');
                const action = this.getAttribute('data-action');
                
                if (type === 'show') {
                    modalTitle.innerText = 'User Details';
                    const template = document.getElementById('template-show').content.cloneNode(true);
                    template.querySelector('.user-initial').innerText = name.substring(0, 1);
                    template.querySelectorAll('.user-name').forEach(el => el.innerText = name);
                    template.querySelector('.user-email').innerText = email;
                    template.querySelector('.user-id').innerText = '#' + id;
                    template.querySelector('.user-joined').innerText = joined;
                    
                    modalBody.innerHTML = '';
                    modalBody.appendChild(template);
                } else {
                    modalTitle.innerText = 'Edit User Info';
                    const template = document.getElementById('template-edit').content.cloneNode(true);
                    const isAdmin = this.getAttribute('data-admin');
                    const isSelf = this.getAttribute('data-self');
                    
                    modalBody.innerHTML = '';
                    modalBody.appendChild(template);
                    
                    const editForm = modalBody.querySelector('#editUserForm');
                    editForm.action = action;
                    editForm.querySelector('.edit-name').value = name;
                    editForm.querySelector('.edit-email').value = email;
                    
                    if (isSelf === '1') {
                        editForm.querySelector('.is-admin-wrapper').style.display = 'none';
                    } else {
                        editForm.querySelector('.edit-admin').checked = (isAdmin === '1');
                    }
                }
                
                userModal.show();
            });
        });
    });
</script>
@endpush
