<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Resources\CityResource;
use App\Models\City;
use App\Models\Governorate;
use Illuminate\Http\Request;

class GovernorateCityController extends Controller
{
    public function index($governorateId)
    {
        $cities = City::whereGovernorateId($governorateId)->get();

        return CityResource::collection($cities);
    }
}
