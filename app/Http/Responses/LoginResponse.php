<?php

namespace App\Http\Responses;

use Laravel\Fortify\Contracts\LoginResponse as LoginResponseContract;
use Illuminate\Support\Facades\Auth;

class LoginResponse implements LoginResponseContract
{
    public function toResponse($request)
    {
        $user = Auth::user();

        if ($user && method_exists($user, 'getRoleNames')) {
            $roles = $user->getRoleNames();

            if ($roles->contains('admin')) {
                return redirect()->intended('/admin/dashboard');
            }
        }

        return redirect()->intended('/dashboard');
    }
}