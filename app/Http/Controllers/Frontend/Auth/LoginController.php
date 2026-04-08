<?php

namespace App\Http\Controllers\Frontend\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class LoginController extends Controller
{
    /**
     * Display the login view.
     */
    public function create(): View
    {
        return view('frontend.auth.login');
    }

    /**
     * Handle an incoming authentication request.
     */
    public function store(LoginRequest $request): RedirectResponse
    {
        // Try web (admin) authentication first to prevent overlap issues
        try {
            $request->authenticate('web', null);
        } catch (\Illuminate\Validation\ValidationException $e) {
            // If admin login fails, try student login
            try {
                $request->authenticate('student');
            } catch (\Illuminate\Validation\ValidationException $innerE) {
                // If both fail, throw the original exception
                throw $e;
            }
        }

        $request->session()->regenerate();

        if (Auth::guard('web')->check()) {
            $user = Auth::guard('web')->user();

            // Only allow 'Shared-Access' role on the frontend. 
            // All other roles (Admin-Only, Staff, Editor, etc.) are restricted to the Admin panel.
            if ($user->role && $user->role->slug !== 'shared-access') {
                Auth::guard('web')->logout();
                return back()->withErrors(['email' => 'Your account (' . $user->role->name . ') only has access to the Admin panel.']);
            }

            // All permitted web users (Admin/Staff/Shared) go to the new Frontend Dashboard
            return redirect()->intended(route('frontend.profile.dashboard', absolute: false));
        }

        // Redirect individual students directly to the admission page
        return redirect()->intended(route('frontend.admission.create', absolute: false));
    }

    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request): RedirectResponse
    {
        // Detect which guard to logout
        if (Auth::guard('student')->check()) {
            Auth::guard('student')->logout();
        } elseif (Auth::guard('web')->check()) {
            Auth::guard('web')->logout();
        }

        // Avoid session()->invalidate() to keep other guard sessions alive
        $request->session()->regenerateToken();

        return redirect(route('frontend.index'));
    }
}
