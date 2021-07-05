<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserRequest;
use App\Models\User;
use App\Repositories\User\UserRepository;

class UserController extends Controller
{

    protected $userRepository;

    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function index()
    {
        $users = $this->userRepository->getWithPagination();

        return view('admin.users.index', compact('users'));
    }

    public function create()
    {
        $governorates = $this->userRepository->getData()['governorates'];

        $cities = $this->userRepository->getData()['cities'];

        return view('admin.users.create',
            compact( 'governorates', 'cities'));
    }

    public function store(UserRequest $request)
    {
        $this->userRepository->createOrUpdate(new User, $request);

        return redirect()->route('admin.users.index');
    }

    public function edit(User $user)
    {
        $governorates = $this->userRepository->getData()['governorates'];

        $cities = $this->userRepository->getData()['cities'];

        return view('admin.users.edit',
            compact('user','governorates', 'cities'));
    }

    public function update(User $user, UserRequest $request)
    {
        $this->userRepository->createOrUpdate($user, $request);

        return redirect()->route('admin.users.index');
    }

    public function destroy(User $user)
    {
        $this->userRepository->delete($user);

        return back();
    }


}
