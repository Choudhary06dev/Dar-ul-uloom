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
        $user = Auth::guard('admin')->user();

        if (! $user || ! $user->is_admin) {
            Auth::guard('admin')->logout();
            return redirect()->route('admin.login')->withErrors(['email' => 'Access denied. Admin only area.']);
        }

        return $next($request);
    }
}
