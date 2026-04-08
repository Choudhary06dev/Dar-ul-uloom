<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use App\Models\User;
use App\Models\Role;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class AdminController extends Controller
{
    public function index(): View
    {
        return view('admin.index');
    }

    public function dashboard(): View
    {
        $stats = [
            'users' => \App\Models\User::count(),
            'admissions' => \App\Models\Admission::count(),
            'pending_admissions' => \App\Models\Admission::where('status', 'Pending')->count(),
            'approved_admissions' => \App\Models\Admission::where('status', 'Approved')->count(),
        ];
        return view('admin.dashboard', compact('stats'));
    }

    /**
     * Display listing of users.
     */
    public function users(): View
    {
        $users = User::with('role')->latest()->paginate(10);
        $roles = Role::all();
        return view('admin.users.index', compact('users', 'roles'));
    }

    /**
     * Show the form to create a new user.
     */
    public function createUser(): View
    {
        $roles = Role::all();
        return view('admin.users.create', compact('roles'));
    }

    /**
     * Store a newly created user.
     */
    public function storeUser(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'father_name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'phone' => 'required|string|max:20',
            'address' => 'nullable|string|max:500',
            'password' => 'required|string|min:8|confirmed',
            'role_id' => 'required|exists:roles,id',
        ]);

        $role = Role::findOrFail($request->role_id);

        User::create([
            'name' => $request->name,
            'father_name' => $request->father_name,
            'email' => $request->email,
            'phone' => $request->phone,
            'address' => $request->address,
            'password' => bcrypt($request->password),
            'role_id' => $request->role_id,
            'is_admin' => true, // Any defined role grants some level of admin panel access
        ]);

        return redirect()->route('admin.users')->with('status', 'New user created successfully.');
    }

    /**
     * Display a specific user's details.
     */
    public function showUser(Request $request, User $user): View
    {
        return view('admin.users.show', compact('user'));
    }

    /**
     * Show edit form for a specific user.
     */
    public function editUser(Request $request, User $user): View
    {
        $roles = Role::all();
        return view('admin.users.edit', compact('user', 'roles'));
    }

    /**
     * Update user details.
     */
    public function updateUser(Request $request, User $user): RedirectResponse
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'father_name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $user->id,
            'phone' => 'required|string|max:20',
            'address' => 'nullable|string|max:500',
            'password' => 'nullable|string|min:8|confirmed',
            'role_id' => 'required|exists:roles,id',
        ]);

        $data = $request->only('name', 'father_name', 'email', 'phone', 'address', 'role_id');

        if ($request->filled('password')) {
            $data['password'] = bcrypt($request->password);
        }

        // Handle role and is_admin sync
        $role = Role::findOrFail($request->role_id);
        $data['is_admin'] = true; // Any defined role grants some level of admin panel access

        $user->update($data);

        return redirect()->route('admin.users')->with('status', 'User updated successfully!');
    }

    /**
     * Delete a user.
     */
    public function destroyUser(User $user): RedirectResponse
    {
        if (Auth::id() === $user->id) {
            return back()->with('error', 'You cannot delete yourself!');
        }

        $user->delete();

        return redirect()->route('admin.users')->with('status', 'User deleted successfully!');
    }

    /**
     * Display a listing of roles.
     */
    public function roles(): View
    {
        $roles = Role::withCount('users')->get();
        return view('admin.roles.index', compact('roles'));
    }

    /**
     * Display a listing of registered students.
     */
    public function students(): View
    {
        $students = Student::latest()->paginate(15);
        return view('admin.students.index', compact('students'));
    }
    /**
     * Store a newly created role in storage.
     */
    public function storeRole(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'slug' => 'required|string|max:255|unique:roles,slug',
            'permissions' => 'nullable|array',
            'permissions.*' => 'string'
        ]);

        Role::create([
            'name' => $request->name,
            'slug' => \Illuminate\Support\Str::slug($request->slug),
            'permissions' => $request->permissions ?? [],
        ]);

        return redirect()->route('admin.roles.index')->with('status', 'New role created successfully!');
    }

    /**
     * Update the specified role in storage.
     */
    public function updateRole(Request $request, Role $role): RedirectResponse
    {
        if (in_array($role->slug, ['admin-only', 'shared-access'])) {
            return back()->with('error', 'Core system roles cannot be modified.');
        }

        $request->validate([
            'name' => 'required|string|max:255',
            'permissions' => 'nullable|array',
            'permissions.*' => 'string'
        ]);

        $role->update([
            'name' => $request->name,
            'permissions' => $request->permissions ?? [],
        ]);

        return redirect()->route('admin.roles.index')->with('status', 'Role updated successfully!');
    }

    /**
     * Remove the specified role from storage.
     */
    public function destroyRole(Role $role): RedirectResponse
    {
        if (in_array($role->slug, ['admin-only', 'shared-access'])) {
            return back()->with('error', 'You cannot delete core system roles.');
        }

        if ($role->users()->count() > 0) {
            return back()->with('error', 'Cannot delete role because users are still assigned to it. Please reassign them first.');
        }

        $role->delete();

        return redirect()->route('admin.roles.index')->with('status', 'Role deleted successfully!');
    }
}
