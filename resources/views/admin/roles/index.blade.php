@extends('layouts.admin')

@section('title', 'System Roles')

@section('content')
<div class="card border-0 shadow-sm" style="border-radius: 20px;">
    <div class="card-body p-4 p-md-5">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <div>
                <h3 class="fw-bold mb-1">Access Roles</h3>
                <p class="text-muted small mb-0">System roles and permissions levels</p>
            </div>
            <button type="button" class="btn btn-brand px-4 py-2 shadow-sm" data-bs-toggle="modal" data-bs-target="#addRoleModal">
                <i class="fa-solid fa-plus me-2"></i> Add New Role
            </button>
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
            <table class="table align-middle">
                <thead class="bg-light text-muted uppercase tracking-wider" style="font-size: 0.75rem">
                    <tr>
                        <th class="px-4 py-3">Role Name</th>
                        <th class="px-4 py-3">Slug</th>
                        <th class="px-4 py-3 text-center">Assigned Users</th>
                        <th class="px-4 py-3">Access Level & Permissions</th>
                        <th class="px-4 py-3 text-end">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($roles as $role)
                    <tr>
                        <td class="px-4">
                            <div class="fw-bold text-slate-700">{{ $role->name }}</div>
                        </td>
                        <td class="px-4"><code class="bg-light px-2 py-1 rounded small text-danger">{{ $role->slug }}</code></td>
                        <td class="px-4 text-center">
                            <span class="badge bg-primary bg-opacity-10 text-primary border border-primary border-opacity-10 px-3 py-2 rounded-3">
                                {{ $role->users_count }} Users
                            </span>
                        </td>
                        <td class="px-4">
                            @if(in_array($role->slug, ['super-admin', 'admin', 'admin-only']))
                                <span class="text-primary small fw-bold d-block mb-1"><i class="fa-solid fa-crown me-1 text-warning"></i> Full Admin</span>
                                <span class="badge bg-primary bg-opacity-10 text-primary border border-primary border-opacity-10">All Permissions</span>
                            @elseif($role->slug === 'shared-access')
                                <span class="text-success small fw-bold d-block mb-1"><i class="fa-solid fa-shuffle me-1"></i> Dual Access</span>
                                <span class="badge bg-success bg-opacity-10 text-success border border-success border-opacity-10">All Permissions</span>
                            @else
                                <span class="text-muted small fw-bold d-block mb-1"><i class="fa-solid fa-user me-1"></i> Custom Role</span>
                                <div class="d-flex flex-wrap gap-1 mt-1">
                                    @forelse($role->permissions ?? [] as $perm)
                                        <span class="badge bg-secondary bg-opacity-10 text-secondary border border-secondary border-opacity-10 px-2">{{ ucwords(str_replace('_', ' ', $perm)) }}</span>
                                    @empty
                                        <span class="badge bg-danger bg-opacity-10 text-danger border border-danger border-opacity-10 px-2 italic">No modules assigned</span>
                                    @endforelse
                                </div>
                            @endif
                        </td>
                        <td class="px-4 text-end">
                            @if(!in_array($role->slug, ['admin-only', 'shared-access']))
                                <div class="d-flex justify-content-end gap-2">
                                    <button type="button" class="btn btn-sm btn-light p-2 px-3 border rounded-3 btn-edit-role"
                                        data-bs-toggle="modal" 
                                        data-bs-target="#editRoleModal"
                                        data-id="{{ $role->id }}"
                                        data-name="{{ $role->name }}"
                                        data-action="{{ route('admin.roles.update', $role) }}"
                                        data-permissions="{{ json_encode($role->permissions ?? []) }}">
                                        <i class="fa-solid fa-pen-to-square text-primary"></i>
                                    </button>
                                    <form action="{{ route('admin.roles.destroy', $role) }}" method="POST" class="d-inline" onsubmit="return confirm('Are you sure you want to delete this custom role?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-light p-2 px-3 border rounded-3" title="Delete Custom Role">
                                            <i class="fa-solid fa-trash-can text-danger"></i>
                                        </button>
                                    </form>
                                </div>
                            @else
                                <span class="text-muted small italic">Core Role</span>
                            @endif
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        
        <div class="alert alert-info border-0 rounded-4 mt-4 shadow-sm">
            <div class="d-flex">
                <i class="fa-solid fa-circle-info mt-1 me-3 fs-5 text-primary"></i>
                <div>
                    <h6 class="fw-bold mb-1">About System Roles</h6>
                    <p class="small mb-0 opacity-75">Admin-Only and Shared-Access are core system roles and cannot be deleted. Any newly created custom roles will be automatically granted baseline access to the admin dashboard.</p>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Add Role Modal -->
<div class="modal fade" id="addRoleModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content shadow-lg border-0" style="border-radius: 20px;">
            <div class="modal-header border-0 pb-0 pt-4 px-4">
                <h5 class="modal-title fw-bold">Create New Role</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('admin.roles.store') }}" method="POST">
                @csrf
                <div class="modal-body p-4">
                    <div class="mb-3">
                        <label for="name" class="form-label fw-bold text-slate-700 small uppercase tracking-wider">Role Display Name</label>
                        <input type="text" class="form-control p-3 bg-light border-0" id="name" name="name" placeholder="e.g. Editor, Moderator" required>
                    </div>
                    <div class="mb-4">
                        <label for="slug" class="form-label fw-bold text-slate-700 small uppercase tracking-wider">System Slug</label>
                        <input type="text" class="form-control p-3 bg-light border-0" id="slug" name="slug" placeholder="e.g. editor, content-moderator" required>
                        <div class="form-text mt-2 small">This identifier is used internally and should be lowercase without spaces.</div>
                    </div>
                    
                    <label class="form-label fw-bold text-slate-700 small uppercase tracking-wider border-bottom pb-2 w-100">Module Permissions</label>
                    <div class="row g-3 mt-1">
                        <div class="col-md-6">
                            <div class="form-check p-3 bg-light rounded-3 border">
                                <input class="form-check-input ms-0 me-2" type="checkbox" name="permissions[]" value="manage_users" id="perm_users">
                                <label class="form-check-label fw-bold" for="perm_users">Manage Users</label>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-check p-3 bg-light rounded-3 border">
                                <input class="form-check-input ms-0 me-2" type="checkbox" name="permissions[]" value="manage_students" id="perm_students">
                                <label class="form-check-label fw-bold" for="perm_students">Manage Students</label>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-check p-3 bg-light rounded-3 border">
                                <input class="form-check-input ms-0 me-2" type="checkbox" name="permissions[]" value="manage_roles" id="perm_roles">
                                <label class="form-check-label fw-bold" for="perm_roles">System Roles</label>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-check p-3 bg-light rounded-3 border">
                                <input class="form-check-input ms-0 me-2" type="checkbox" name="permissions[]" value="manage_admissions" id="perm_admissions">
                                <label class="form-check-label fw-bold" for="perm_admissions">Admissions Module</label>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer border-0 pt-0 pb-4 px-4">
                    <button type="button" class="btn btn-light rounded-3 px-4" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-brand rounded-3 px-4">Create Role</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Edit Role Modal -->
<div class="modal fade" id="editRoleModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content shadow-lg border-0" style="border-radius: 20px;">
            <div class="modal-header border-0 pb-0 pt-4 px-4">
                <h5 class="modal-title fw-bold">Edit Role Permissions</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form id="editRoleForm" method="POST">
                @csrf
                @method('PUT')
                <div class="modal-body p-4">
                    <div class="mb-4">
                        <label for="edit_name" class="form-label fw-bold text-slate-700 small uppercase tracking-wider">Role Display Name</label>
                        <input type="text" class="form-control p-3 bg-light border-0" id="edit_name" name="name" required>
                    </div>
                    
                    <label class="form-label fw-bold text-slate-700 small uppercase tracking-wider border-bottom pb-2 w-100">Module Permissions</label>
                    <div class="row g-3 mt-1">
                        <div class="col-md-6">
                            <div class="form-check p-3 bg-light rounded-3 border">
                                <input class="form-check-input ms-0 me-2 edit-perm" type="checkbox" name="permissions[]" value="manage_users" id="e_perm_users">
                                <label class="form-check-label fw-bold" for="e_perm_users">Manage Users</label>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-check p-3 bg-light rounded-3 border">
                                <input class="form-check-input ms-0 me-2 edit-perm" type="checkbox" name="permissions[]" value="manage_students" id="e_perm_students">
                                <label class="form-check-label fw-bold" for="e_perm_students">Manage Students</label>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-check p-3 bg-light rounded-3 border">
                                <input class="form-check-input ms-0 me-2 edit-perm" type="checkbox" name="permissions[]" value="manage_roles" id="e_perm_roles">
                                <label class="form-check-label fw-bold" for="e_perm_roles">System Roles</label>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-check p-3 bg-light rounded-3 border">
                                <input class="form-check-input ms-0 me-2 edit-perm" type="checkbox" name="permissions[]" value="manage_admissions" id="e_perm_admissions">
                                <label class="form-check-label fw-bold" for="e_perm_admissions">Admissions Module</label>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer border-0 pt-0 pb-4 px-4">
                    <button type="button" class="btn btn-light rounded-3 px-4" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-brand rounded-3 px-4">Update Role</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const editButtons = document.querySelectorAll('.btn-edit-role');
        editButtons.forEach(button => {
            button.addEventListener('click', function() {
                const name = this.getAttribute('data-name');
                const action = this.getAttribute('data-action');
                let permissions = [];
                try {
                    permissions = JSON.parse(this.getAttribute('data-permissions')) || [];
                } catch(e) {}

                document.getElementById('editRoleForm').action = action;
                document.getElementById('edit_name').value = name;
                
                // Reset checkboxes
                document.querySelectorAll('.edit-perm').forEach(cb => cb.checked = false);
                
                // Check mapped permissions
                permissions.forEach(perm => {
                    const checkbox = document.querySelector(`.edit-perm[value="${perm}"]`);
                    if(checkbox) checkbox.checked = true;
                });
            });
        });
    });
</script>
@endpush
