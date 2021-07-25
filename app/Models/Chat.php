<?php

namespace App\Models;

use App\Services\FileStore\FileStoreService;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Chat extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $with = ['users'];

    public function users()
    {
        return $this->belongsToMany(User::class);
    }

    public function meeting()
    {
        return $this->belongsTo(Meeting::class);
    }

    public function getTitleAttribute()
    {
        return $this->{'title_'.app()->getLocale()};
    }

    public function setImgAttribute($img)
    {
        return $this->attributes['img'] = (new FileStoreService)
            ->handel($img, 'chats', $this->img)->getFileName();
    }

    public function getImageAttribute()
    {
        return $this->img?url('storage/'.$this->img):'https://via.placeholder.com/150';
    }

    public function scopeMyChats($query)
    {
        return $query->whereHas('users', function ($q) {
           $q->whereUserId(auth()->id());
        });
    }
}
