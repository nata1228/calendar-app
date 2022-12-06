<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\InvitationMail;

class MailController extends Controller
{
    public function send(){
        $name = 'test_user';
        $email = 'test@example.com';

        Mail::send(new InvitationMail($name, $email));

        return view('welcome');
    }
}
