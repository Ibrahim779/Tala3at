<?php


namespace App\Repositories\Meeting;


use App\Models\Category;
use App\Models\City;
use App\Models\Governorate;
use App\Models\Meeting;
use App\Models\User;
use App\Notifications\NewMeetingNotification;
use App\Repositories\Repository;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Notification;
use Illuminate\Support\Facades\Storage;

class MeetingRepository extends Repository implements MeetingRepositoryInterface
{
    const PAGINATION = 10;

    public function __construct(Meeting $meeting)
    {
        parent::__construct($meeting);
    }

    public function create($request)
    {
        $meeting = parent::create($request->merge(['created_by' => auth()->id()])->except('users'));

        $meeting->users()->attach(array_merge($request->users, [auth()->id()]));

        return $meeting;
    }

    public function sendNewMeetingNotification(Meeting $meeting)
    {
        Notification::send($meeting->users()->get() ,new NewMeetingNotification($meeting));
    }

    public function update(Model $meeting, $request)
    {
        parent::update($meeting, $request->except('users'));

        $meeting->users()->detach();

        $meeting->users()->attach($request->users);

        return $meeting;
    }

    public function joinUser(Model $meeting, $userId)
    {
        $meeting->users()->attach($userId);
    }
    /*
     * helper method to get Data
     * */
    public function getData()
    {
        $categories = Category::select('id', 'name_ar', 'name_en')->get();

        $users = User::select('id', 'name')->get();

        $governorates = Governorate::select('id', 'governorate_name_ar', 'governorate_name_en')->get();

        $cities = City::select('id', 'city_name_ar', 'city_name_en')->get();

        $attendancesCountArray = Meeting::getAttendancesCountArray();

        return [
            'categories' => $categories,
            'users' => $users,
            'governorates' => $governorates,
            'cities' => $cities,
            'attendancesCountArray' => $attendancesCountArray
        ];
    }

}
