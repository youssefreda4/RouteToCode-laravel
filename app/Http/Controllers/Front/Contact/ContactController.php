<?php

namespace App\Http\Controllers\Front\Contact;

use App\Models\Admin;
use App\Models\Message;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Notifications\MessageNotification;
use App\Http\Requests\Front\ContactRequest;

class ContactController extends Controller
{
    public function index()
    {
        return view('Front.pages.contact.index');
    }

    public function store(ContactRequest $requset)
    {
        $message = $requset->validated();
        $data = Message::create($message);
        
        $admins = Admin::all();
        foreach ($admins as $admin) {
            $admin->notify(new MessageNotification($data));
        }
        return back()->with('success', 'Message send successfully');
    }
}
