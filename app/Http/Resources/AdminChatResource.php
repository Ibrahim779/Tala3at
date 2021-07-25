<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class AdminChatResource extends JsonResource
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
            'last_message' => $this->latestMessage(),
            'last_message_created_at' => $this->latestMessageCreatedAt(),
            'receiver_name' => $this->receiver->name,
            'receiver_image' => $this->receiver->image,
        ];
    }
}
