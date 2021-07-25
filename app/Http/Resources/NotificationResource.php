<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\App;

class NotificationResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        $title = 'title_' . App::getLocale();
        $body = 'body_' . App::getLocale();

        return [
            'id' => $this->id,
            'title' => $this->data[$title],
            'body' => $this->data[$body],
            'url'  => $this->data['url']
        ];
    }
}
