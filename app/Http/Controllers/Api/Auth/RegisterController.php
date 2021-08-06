<?php

namespace App\Http\Controllers\Api\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserRequest;
use App\Http\Resources\UserResource;
use App\Models\User;
use App\Traits\Api\Auth\CreateToken;
use App\Traits\Api\Auth\StoreDeviceToken;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    use CreateToken, StoreDeviceToken;

    public function register(UserRequest $request)
    {
        $user = User::create($request->except('device_token'));

        auth()->login($user);

        $this->storeUserDevice($request->device_token);

        return response()->json([
            'user' => new UserResource(auth()->user()), 'token' => $this->createToken()], 201);
    }

}
