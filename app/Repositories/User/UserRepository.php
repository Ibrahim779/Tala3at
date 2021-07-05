<?php


namespace App\Repositories\User;


use App\Models\City;
use App\Models\Governorate;
use App\Models\User;
use App\Repositories\Repository;
use Illuminate\Support\Facades\Storage;

class UserRepository extends Repository implements UserRepositoryInterface
{
    const PAGINATION = 10;

    public function __construct(User $user)
    {
        parent::__construct($user);
    }

    public function getData()
    {
        $governorates = Governorate::select('id', 'name_ar', 'name_en')->get();

        $cities = City::select('id', 'name_ar', 'name_en')->get();

        return [
            'governorates' => $governorates,
            'cities' => $cities,
        ];
    }

    public function saveData($user, $request)
    {
        $user->name             = $request->name;
        $user->phone            = $request->phone;
        $user->email            = $request->email;
        $user->gender           = $request->gender;
        $user->date_of_birth    = $request->date_of_birth;
        $user->governorate_id   = $request->governorate_id;
        $user->city_id          = $request->city_id;
        if ($request->avatar) {
            if ($user->avatar){
                Storage::disk('public')->delete($user->avatar);
                $user->avatar = $request->avatar->store('users', 'public');
            } else {
                $user->avatar = $request->avatar->store('users', 'public');
            }
        }
        $user->save();
    }

}
