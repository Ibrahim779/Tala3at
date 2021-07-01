<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\AdminLoginRequest;
use App\Http\Requests\LoginRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login(LoginRequest $request)
    {
        if (!Auth::guard('admin')->attempt($request->only(['email', 'password']))) {
            return back()->withErrors('email or password is not correct');
        }
        //todo: redirect to dashboard
    }

    public function logout()
    {
        Auth::guard('admin')->logout();
        //todo: redirect to login form
    }
}
