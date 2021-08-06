<?php

namespace App\Http\Controllers\Api\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LogoutController extends Controller
{

    public function logout()
    {
        auth()->user()->tokens()->delete();

        Auth::guard('web')->logout();

        return response()->json(null, 204);
    }

}
