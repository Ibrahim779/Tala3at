<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Meeting extends Model
{
    use HasFactory;

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

    public function getTitleAttribute()
    {
        //Todo:: use app getLocale
        return $this->title_en;
    }

    public function getDescriptionAttribute()
    {
        //Todo:: use app getLocale
        return $this->description_en;
    }

    public function getImageAttribute()
    {
        return $this->img;
    }
}
