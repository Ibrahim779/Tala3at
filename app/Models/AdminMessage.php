<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AdminMessage extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function chat()
    {
        return $this->belongsTo(AdminChat::class, 'admin_chat_id');
    }

    public function admin()
    {
        return $this->belongsTo(Admin::class, 'admin_id');
    }

    public function scopeReceiverMessages($query, $chatId)
    {
        return $query->whereAdminChatId($chatId)->where('admin_id', '!=' , auth()->id());
    }

    public function getSendAtAttribute()
    {
        return $this->created_at->format('d M Y, h:m a');
    }
}
