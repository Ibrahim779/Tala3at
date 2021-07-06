<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use App\Http\Requests\UserRequest;
use App\Http\Resources\UserResource;
use App\Models\User;
use Illuminate\Support\Facades\Storage;

class AuthController extends Controller
{

    public function register(UserRequest $request)
    {
        $user = new User;

        User::create($user, $request);

        auth()->login($user);

        $token = $this->createToken();

        return response()->json(['token' => $token], 201);
    }

    public function login(LoginRequest $request)
    {
        if (!auth()->attempt($request->only(['email', 'password']))) {
            return response()->json(['error' => 'email or password is not correct'], 400);
        }

        $token = $this->createToken();

        $user = new UserResource(auth()->user());

        return response()->json(['user' => $user, 'token' => $token], 200);
    }

    public function logout()
    {
        auth()->user()->tokens()->delete();

        auth()->logout();

        return response(['message' => 'Thanks for visit our app'], 204);
    }

    private function createToken()
    {
        return auth()->user()->createToken('token')->plainTextToken;
    }

}
