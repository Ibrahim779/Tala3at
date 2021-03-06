<?php

namespace App\Models;

use App\Services\FileStore\FileStoreService;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Http\UploadedFile;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasFactory, Notifiable, HasApiTokens;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $guarded = [];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function setPasswordAttribute($password)
    {
        return $this->attributes['password'] = Hash::make($password);
    }

    public function setAvatarAttribute(UploadedFile $avatar)
    {
        return $this->attributes['avatar'] = (new FileStoreService)
            ->handel($avatar, 'users', $this->avatar)->getFileName();
    }

    public function getImageAttribute()
    {
        return $this->avatar?url('storage/'.$this->avatar):'https://via.placeholder.com/150';
    }

    public function governorate()
    {
        return $this->belongsTo(Governorate::class);
    }

    public function city()
    {
        return $this->belongsTo(City::class);
    }

    public function chats()
    {
        return $this->belongsToMany(Chat::class);
    }

    public function meetings()
    {
        return $this->belongsToMany(Meeting::class);
    }

    public function devices()
    {
        return $this->hasMany(Device::class);
    }

    public function scopeWhereUserInMeeting($query, $meetingId)
    {
        return $query->whereHas('meetings', function ($q) use ($meetingId) {
            $q->whereMeetingId($meetingId);
        });
    }
}
