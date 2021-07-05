<?php


namespace App\Repositories\City;


use App\Models\City;
use App\Repositories\Repository;

class CityRepository extends Repository implements CityRepositoryInterface
{
    const PAGINATION = 10;

    public function __construct(City $city)
    {
        parent::__construct($city);
    }

    public function saveData($city, $request)
    {
        $city->name_ar  = $request->name_ar;
        $city->name_en  = $request->name_en;
        $city->save();
    }

}
