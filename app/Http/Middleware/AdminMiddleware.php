<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminMiddleware
{
    /**
     * Handle an incoming request.
     */
    public function handle(Request $request, Closure $next)
    {
        // Try both guards since frontend admin login uses 'web' and backend uses 'admin'
        $user = Auth::guard('admin')->user() ?? Auth::guard('web')->user();

        // Check if user exists and has is_admin flag
        if (! $user || ! $user->is_admin) {
            return redirect()->route('admin.login')->withErrors(['email' => 'Access denied. You do not have permission to access the administrative area.']);
        }

        return $next($request);
    }
}
