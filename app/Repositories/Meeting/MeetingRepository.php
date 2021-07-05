<?php


namespace App\Repositories\Meeting;


use App\Models\Category;
use App\Models\City;
use App\Models\Governorate;
use App\Models\Meeting;
use App\Models\User;
use App\Repositories\Repository;
use Illuminate\Support\Facades\Storage;

class MeetingRepository extends Repository implements MeetingRepositoryInterface
{
    const PAGINATION = 10;

    public function __construct(Meeting $meeting)
    {
        parent::__construct($meeting);
    }

    public function getData()
    {
        $categories = Category::select('id', 'name_ar', 'name_en')->get();

        $users = User::select('id', 'name')->get();

        $governorates = Governorate::select('id', 'name_ar', 'name_en')->get();

        $cities = City::select('id', 'name_ar', 'name_en')->get();

        return [
            'categories' => $categories,
            'users' => $users,
            'governorates' => $governorates,
            'cities' => $cities,
        ];
    }

    public function saveData($meeting, $request)
    {
        $meeting->title_ar          = $request->title_ar;
        $meeting->title_en          = $request->title_en;
        $meeting->date              = $request->date;
        $meeting->time              = $request->time;
        $meeting->description_ar    = $request->description_ar;
        $meeting->description_en    = $request->description_en;
        $meeting->attendance_count  = $request->attendance_count;
        $meeting->category_id       = $request->category_id;
        $meeting->governorate_id    = $request->governorate_id;
        $meeting->city_id           = $request->city_id;
        if ($request->img) {
            if ($meeting->img){
                Storage::disk('public')->delete($meeting->img);
                $meeting->img = $request->img->store('meetings', 'public');
            } else {
                $meeting->img = $request->img->store('meetings', 'public');
            }
        }
        $meeting->save();
        $meeting->users()->attach($request->users);
    }

}
