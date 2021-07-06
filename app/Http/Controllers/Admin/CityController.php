<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CityRequest;
use App\Models\City;
use App\Repositories\City\CityRepository;

class CityController extends Controller
{

    protected $cityRepository;

    public function __construct(CityRepository $cityRepository)
    {
        $this->cityRepository = $cityRepository;
    }

    public function index()
    {
        $cities = $this->cityRepository->paginate(self::PAGINATION);

        return view('admin.cities.index', compact('cities'));
    }

    public function create()
    {
        return view('admin.cities.create');
    }

    public function store(CityRequest $request)
    {
        $this->cityRepository->create($request->all());

        return redirect()->route('admin.cities.index');
    }

    public function edit(City $city)
    {
        return view('admin.cities.edit', compact('city'));
    }

    public function update(City $city, CityRequest $request)
    {
        $this->cityRepository->update($city, $request->all());

        return redirect()->route('admin.cities.index');
    }

    public function destroy(City $city)
    {
        $this->cityRepository->delete($city);

        return back();
    }


}
