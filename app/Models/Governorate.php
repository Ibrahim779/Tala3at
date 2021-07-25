<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Governorate extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function cities()
    {
        return $this->hasMany(City::class);
    }

    public function getNameAttribute()
    {
        return $this->{'governorate_name_'.app()->getLocale()};
    }
}
