<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Auth\Events\Verified;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Http\RedirectResponse;

class VerifyEmailController extends Controller
{
    /**
     * Mark the authenticated user's email address as verified.
     */
    public function __invoke(EmailVerificationRequest $request): RedirectResponse
    {
        if ($request->user()->hasVerifiedEmail()) {
            return redirect()->intended($this->afterVerificationRedirect($request->user()->is_admin));
        }

        if ($request->user()->markEmailAsVerified()) {
            event(new Verified($request->user()));
        }

        return redirect()->intended($this->afterVerificationRedirect($request->user()->is_admin));
    }

    private function afterVerificationRedirect(bool $isAdmin): string
    {
        return $isAdmin
            ? route('admin.dashboard', absolute: false).'?verified=1'
            : route('frontend.index', absolute: false).'?verified=1';
    }
}
