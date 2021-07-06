<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Favorite extends Model
{
    use HasFactory;

    protected $guarded = [];

    public static function exist($meetingId)
    {
        if (self::whereUserId(auth()->id())->whereMeetingId($meetingId)->count())
            return true;
        return false;
    }
}
