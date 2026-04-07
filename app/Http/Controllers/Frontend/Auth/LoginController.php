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
        // Try student authentication first
        try {
            $request->authenticate('student');
        } catch (\Illuminate\Validation\ValidationException $e) {
            // If student login fails, try web (admin/staff) login
            try {
                $request->authenticate('web');
            } catch (\Illuminate\Validation\ValidationException $innerE) {
                // If both fail, throw the original exception
                throw $e;
            }
        }

        $request->session()->regenerate();

        if (Auth::guard('web')->check()) {
            return redirect()->route('frontend.management.admissions.index');
        }

        return redirect()->intended(route('frontend.profile.dashboard', absolute: false));
    }

    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request): RedirectResponse
    {
        // Logout of all possible frontend guards
        Auth::guard('student')->logout();
        Auth::guard('web')->logout();
        Auth::guard('admin')->logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect(route('frontend.index'));
    }
}
