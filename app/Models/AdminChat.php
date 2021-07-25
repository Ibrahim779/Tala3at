<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AdminChat extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function messages()
    {
        return $this->hasMany(AdminMessage::class);
    }

    public function receiver()
    {
        return $this->belongsTo(Admin::class, $this->getReceiverForeignKey());
    }

    public function latestMessage()
    {
        return $this->messages()->latest()->first()->message;
    }

    public function latestMessageCreatedAt()
    {
        return $this->messages()->latest()->first()->created_at->diffForHumans();
    }

    public function scopeMyChats($query)
    {
        return $query->whereFromAdminId(auth()->id())->orWhere('to_admin_id', auth()->id());
    }

    public function getReceiverForeignKey()
    {
       return $this->from_admin_id != auth()->id() ? 'from_admin_id' : 'to_admin_id';
    }
}
