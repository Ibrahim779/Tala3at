<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\CityResource;
use App\Models\City;
use App\Models\Governorate;
use Illuminate\Http\Request;

class GovernorateCitiesController extends Controller
{

    public function index(Governorate $governorate)
    {
        return CityResource::collection(City::whereGovernorateId($governorate->id)->get());
    }

}
