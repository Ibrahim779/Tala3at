<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserRequest;
use App\Http\Requests\UserUpdateRequest;
use App\Http\Resources\UserResource;
use App\Models\User;
use App\Repositories\User\UserRepository;
use Illuminate\Http\Request;

class UserController extends Controller
{

    private $userRepository;

    /**
     * UserController constructor.
     * @param $userRepository
     */
    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function show(User $user)
    {
        return new UserResource($user);
    }

    public function update(User $user, UserUpdateRequest $request)
    {
        $this->userRepository->update($user, $request->all());

        return new UserResource($user);
    }

}
