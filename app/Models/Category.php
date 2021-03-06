<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function meetings()
    {
        return $this->hasMany(Meeting::class);
    }

    public function getNameAttribute()
    {
        return $this->{'name_'.app()->getLocale()};
    }
}
