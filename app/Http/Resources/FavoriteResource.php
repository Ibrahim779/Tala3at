<?php

namespace App\Http\Resources;

use App\Models\Meeting;
use App\Models\User;
use Illuminate\Http\Resources\Json\JsonResource;

class FavoriteResource extends JsonResource
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
            'id'        => $this->id,
            'meeting'   => new MeetingResource(Meeting::find($this->meeting_id)),
            'user'      => new UserResource(User::find($this->user_id)),
        ];
    }
}
