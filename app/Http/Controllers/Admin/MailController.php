<?php

namespace App\Http\Controllers\Admin;

use App\Mail\MailTemplate;
use Mail;

use Illuminate\Http\Request;

class MailController extends Controller
{
    //
    public function sendEmail(User $user){

        Mail::to($user->email)->send(new MailTemplate());
        return back();
      }
}
