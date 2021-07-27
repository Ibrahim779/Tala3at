<?php

namespace App\Models;

use App\Services\FileStore\FileStoreService;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Meeting extends Model
{
    use HasFactory;

    const ATTENDANCE_INDETERMINATE = 0;

    const ATTENDAnCES_FROM_1_TO_20 = 1;

    const ATTENDAnCES_FROM_20_TO_40 = 2;

    const ATTENDAnCES_FROM_40_TO_60 = 3;

    protected $guarded = [];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function governorate()
    {
        return $this->belongsTo(Governorate::class);
    }

    public function city()
    {
        return $this->belongsTo(City::class);
    }

    public function users()
    {
        return $this->belongsToMany(User::class);
    }

    public function scopeUserMeetings($query, $userId)
    {
        return $query->whereHas('users', function ($q) use ($userId) {
            $q->whereUserId($userId);
        });
    }

    public function getTitleAttribute()
    {
        return $this->{'title_'.app()->getLocale()};
    }

    public function getDescriptionAttribute()
    {
        return $this->{'description_'.app()->getLocale()};
    }

    public function setImgAttribute($img)
    {
        return $this->attributes['img'] = (new FileStoreService)
            ->handel($img, 'meetings', $this->img)->getFileName();
    }

    public function getImageAttribute()
    {
        return $this->img?url('storage/'.$this->img):'https://via.placeholder.com/150';
    }

    public static function getAttendancesCountArray()
    {
        return [
            __('admin.indeterminate') => self::ATTENDANCE_INDETERMINATE,
            '1-20'          => self::ATTENDAnCES_FROM_1_TO_20,
            '20-40'         => self::ATTENDAnCES_FROM_20_TO_40,
            '40-60'         => self::ATTENDAnCES_FROM_40_TO_60,
        ];
    }
}
