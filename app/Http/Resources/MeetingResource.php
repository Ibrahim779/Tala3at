<?php

namespace App\Http\Resources;

use App\Models\Category;
use App\Models\City;
use App\Models\Governorate;
use App\Models\User;
use Illuminate\Http\Resources\Json\JsonResource;

class MeetingResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id'                => $this->id,
            'title'             => $this->title,
            'img'               => $this->image,
            'date'              => $this->date,
            'time'              => $this->time,
            'description'       => $this->description,
            'attendance_count'  => $this->attendance_count,
            'category'          => new CategoryResource(Category::find($this->category_id)),
            'governorate'       => new GovernorateResource(Governorate::find($this->governorate_id)),
            'city'              => new CityResource(City::find($this->city_id)),
            'users'             => UserResource::collection(User::whereUserInMeeting($this->id)->get()),
        ];
    }

}
