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
        $governorates = Governorate::select('id', 'governorate_name_ar', 'governorate_name_en')->get();

        $cities = City::select('id', 'city_name_ar', 'city_name_en')->get();

        return [
            'governorates' => $governorates,
            'cities' => $cities,
        ];
    }

}
