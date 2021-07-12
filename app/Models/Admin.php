<?php

namespace App\Models;

use App\Services\FileStore\FileStoreService;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Traits\HasRoles;

class Admin extends Authenticatable
{
    use HasFactory, HasRoles;

    protected $guarded = [];


    public function setPasswordAttribute($password)
    {
        return $this->attributes['password'] = Hash::make($password);
    }

    public function setImgAttribute($img)
    {
        return $this->attributes['img'] = (new FileStoreService)
            ->handel($img, 'admins', $this->img)->getFileName();
    }

    public function getImageAttribute()
    {
        return $this->img ? url('storage/'.$this->img) : 'https://via.placeholder.com/150';
    }
}
