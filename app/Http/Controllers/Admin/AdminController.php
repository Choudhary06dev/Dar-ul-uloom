<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
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
        $users = User::latest()->paginate(10);
        return view('admin.users.index', compact('users'));
    }

    /**
     * Display a specific user's details.
     */
    public function showUser(User $user): View
    {
        return view('admin.users.show', compact('user'));
    }

    /**
     * Show edit form for a specific user.
     */
    public function editUser(User $user): View
    {
        return view('admin.users.edit', compact('user'));
    }

    /**
     * Update user details.
     */
    public function updateUser(Request $request, User $user): RedirectResponse
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $user->id,
        ]);

        $user->update($request->only('name', 'email'));

        return redirect()->route('admin.users')->with('status', 'User updated successfully!');
    }

    /**
     * Delete a user.
     */
    public function destroyUser(User $user): RedirectResponse
    {
        if (auth()->id() === $user->id) {
            return back()->with('error', 'You cannot delete yourself!');
        }

        $user->delete();

        return redirect()->route('admin.users')->with('status', 'User deleted successfully!');
    }
}
