<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use App\Http\Requests\UserRequest;
use App\Http\Resources\UserResource;
use App\Models\Device;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{

    public function register(UserRequest $request)
    {
        $user = User::create($request->except('device_token'));

        auth()->login($user);

        $this->storeUserDevice($request);

        $token = $this->createToken();

        return response()->json(['user' => new UserResource(auth()->user()), 'token' => $token], 201);
    }

    public function login(LoginRequest $request)
    {
        if (!auth()->attempt($request->only(['email', 'password']))) {
            return response()->json(['error' => 'email or password is not correct'], 400);
        }

        $token = $this->createToken();

        $this->storeUserDevice($request);

        $user = new UserResource(auth()->user());

        return response()->json(['user' => $user, 'token' => $token], 200);
    }

    public function logout()
    {
        auth()->user()->tokens()->delete();

        Auth::guard('web')->logout();

        return response()->json(null, 204);
    }

    private function createToken()
    {
        return auth()->user()->createToken('token')->plainTextToken;
    }

    private function storeUserDevice($request)
    {
        if ($request->device_token) {
            $device = new Device;
            $device->token = $request->device_token;
            $device->user_id = auth()->id();
            $device->save();

        }
    }

}
