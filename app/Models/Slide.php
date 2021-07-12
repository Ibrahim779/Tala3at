<?php

namespace App\Models;

use App\Services\FileStore\FileStoreService;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Slide extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function getTitleAttribute()
    {
        return $this->{'title_'.app()->getLocale()};
    }

    public function getTextAttribute()
    {
        return $this->{'text'.app()->getLocale()};
    }

    public function setImgAttribute($img)
    {
        return $this->attributes['img'] = (new FileStoreService)
            ->handel($img, 'slides', $this->img)->getFileName();
    }

    public function getImageAttribute()
    {
        return $this->img?url('storage/'.$this->img):'https://via.placeholder.com/150';
    }
}
