<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\GovernorateRequest;
use App\Models\Governorate;
use App\Repositories\Governorate\GovernorateRepository;

class GovernorateController extends Controller
{

    protected $governorateRepository;

    public function __construct(GovernorateRepository $governorateRepository)
    {
        $this->governorateRepository = $governorateRepository;
    }

    public function index()
    {
        $governorates = $this->governorateRepository->getWithPagination();

        return view('admin.governorates.index', compact('governorates'));
    }

    public function create()
    {
        return view('admin.governorates.create');
    }

    public function store(GovernorateRequest $request)
    {
        $this->governorateRepository->createOrUpdate(new Governorate, $request);

        return redirect()->route('admin.governorates.index');
    }

    public function edit(Governorate $governorate)
    {
        return view('admin.governorates.edit', compact('governorate'));
    }

    public function update(Governorate $governorate, GovernorateRequest $request)
    {
        $this->governorateRepository->createOrUpdate($governorate, $request);

        return redirect()->route('admin.governorates.index');
    }

    public function destroy(Governorate $governorate)
    {
        $this->governorateRepository->delete($governorate);

        return back();
    }


}
