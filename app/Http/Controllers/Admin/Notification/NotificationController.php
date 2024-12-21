<?php

namespace App\Http\Controllers\Admin\Notification;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class NotificationController extends Controller
{
    public function markAsRead($notification)
    {
        $notification = Auth::guard('admin')->user()->notifications->find($notification);
        if ($notification) {
            $notification->markAsRead();
        }
        return back();
    }
}
