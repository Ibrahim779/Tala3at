<?php

namespace App\Http\Controllers\Api\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use App\Http\Resources\UserResource;
use App\Traits\Api\Auth\CreateToken;
use App\Traits\Api\Auth\StoreDeviceToken;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    use CreateToken, StoreDeviceToken;

    public function login(LoginRequest $request)
    {
        if (!auth()->attempt($request->only(['email', 'password']))) {
            return response()->json(['error' => 'email or password is not correct'], 400);
        }

        $this->storeUserDevice($request->device_token);

        return response()->json([
            'user' => new UserResource(auth()->user()), 'token' => $this->createToken()], 200);
    }

}
