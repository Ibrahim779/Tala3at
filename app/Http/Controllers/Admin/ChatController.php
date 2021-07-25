<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\AdminChat;
use Illuminate\Http\Request;

class ChatController extends Controller
{

    public function index()
    {
        return view('admin.chats.index');
    }

}
