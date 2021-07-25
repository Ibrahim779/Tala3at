<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class MessageResource extends JsonResource
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
            'id' => $this->id,
            'message' => $this->message,
            'created_at' => $this->created_at->format('d M Y, h:m a'),
            'user_image' => $this->user->image,
            'from_receiver' => $this->user_id == auth()->id() ? false : true,
        ];
    }
}
