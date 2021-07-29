<?php

namespace App\Models;

use App\Services\FileStore\FileStoreService;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function getValueAttribute()
    {
        return $this->image?:$this->{'value_'.app()->getLocale()};
    }

    public function setImgAttribute($img)
    {
        return $this->attributes['img'] = (new FileStoreService)
            ->handel($img, 'settings', $this->img)->getFileName();
    }

    public function getImageAttribute()
    {
        return $this->img?url('storage/'.$this->img):'https://via.placeholder.com/150';
    }
}
