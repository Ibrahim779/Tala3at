<?php

namespace App\Http\Controllers\Admin;

use App\Models\Setting;
use App\Traits\SaveData\SettingSaveData;
use App\Http\Controllers\Controller;

class SettingController extends Controller
{
    use SettingSaveData;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $settings = Setting::paginate(self::PAGINATION);
        return view('admin.settings.index', compact('settings'));
    }
    public function create()
    {
        return view('admin.settings.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store()
    {
        $this->saveData(new Setting());
        return redirect()->route('settings.index');
    }

    public function edit(Setting $setting)
    {
        return view('admin.settings.edit', compact('setting'));
    }

    /**
     * Update the specified resource in storage.
     * @param Setting $setting
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Setting $setting)
    {
        $this->saveData($setting);
        return redirect()->route('settings.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Setting $setting
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy(Setting $setting)
    {
        $setting->delete();
        return redirect()->route('settings.index');
    }
}
