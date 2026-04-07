<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;

class ProfileController extends Controller
{
    /**
     * Display the user's profile dashboard.
     */
    public function dashboard(Request $request)
    {
        if (auth('web')->check()) {
            return redirect()->route('frontend.management.admissions.index');
        }

        /** @var \App\Models\Student $user */
        $user = auth('student')->user();
        $latest_admission = $user ? $user->admissions()->latest()->first() : null;

        return view('frontend.profile.dashboard', [
            'user' => $user,
            'admission' => $latest_admission,
        ]);
    }

    /**
     * Display the user's profile form.
     */
    public function edit(Request $request)
    {
        $user = auth('student')->user() ?? auth('web')->user();
        return view('frontend.profile.edit', [
            'user' => $user,
        ]);
    }

    /**
     * Update the user's profile information.
     */
    public function update(Request $request)
    {
        $guard = auth('student')->check() ? 'student' : 'web';
        $user = auth($guard)->user();
        $table = $guard === 'student' ? 'students' : 'users';

        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:' . $table . ',email,' . $user->id],
        ]);

        $user->fill($validated);

        if ($user->isDirty('email')) {
            $user->email_verified_at = null;
        }

        $user->save();

        return redirect()->route('frontend.profile.edit')->with('status', 'profile-updated');
    }

    /**
     * Delete the user's account.
     */
    public function destroy(Request $request): RedirectResponse
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current_password'],
        ]);

        $guard = auth('student')->check() ? 'student' : 'web';
        $user = auth($guard)->user();

        Auth::guard($guard)->logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/');
    }

    /**
     * Update the user's password.
     */
    public function updatePassword(Request $request)
    {
        $validated = $request->validateWithBag('updatePassword', [
            'current_password' => ['required', 'current_password'],
            'password' => ['required', Password::defaults(), 'confirmed'],
        ]);

        $guard = auth('student')->check() ? 'student' : 'web';
        $user = auth($guard)->user();

        $user->update([
            'password' => Hash::make($validated['password']),
        ]);

        return back()->with('status', 'password-updated');
    }
}
