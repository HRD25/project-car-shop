<?php

namespace App\Http\Controllers;

use App\Mail\EmailMessage;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class MailController extends Controller
{
    public function sendMessage(Request $req, User $user)
    {
        $email = $user->where('id', Auth::id())->select('email')->first();
        $details = [
            'title' => $req->title ?? 'Test',
            'message' => $req->message ?? 'This is clear',
            'email' => $email->email
        ];

        Mail::to("testrysiu@gmail.com")->send(new EmailMessage($details));
        return redirect()->route('home');
    }
}
