<?php

namespace App\Http\Controllers\Admin\Message;

use App\Http\Controllers\Controller;
use App\Models\Message;
use Illuminate\Http\Request;

class MessageController extends Controller
{
    public function index()
    {
        $messages = Message::orderBy('id','DESC')
        ->paginate(12);
        return view('Admin.pages.messages.index',compact('messages'));
    }
}
