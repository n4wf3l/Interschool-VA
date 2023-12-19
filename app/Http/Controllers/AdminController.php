<?php

namespace App\Http\Controllers;

use App\Mail\NotificationMail;
use App\Models\User;
use Illuminate\Support\Facades\Mail;
use App\Models\teams;
use App\Models\players;
use Illuminate\Http\Request;
use Notification;

class AdminController extends Controller
{
    public function index()
    {
        $teams = Teams::all();

        return view('admins.index', compact('teams'));
    }

    public function sendMessageToAllUsers(Request $request)
    {
        $messageContent = $request->input('notif');

        User::chunk(200, function ($users) use ($messageContent) {
            foreach ($users as $user) {
                Mail::to($user->email)->send(new NotificationMail($messageContent));
            }
        });

        return back()->with('success', 'Message sent to all users.');
    }


}
