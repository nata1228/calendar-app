<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\InvitationMail;
use App\Models\User;

class MailController extends Controller
{
    public function send(Request $request){
        $email = User::find($request->input('email'));

        $name = 'test_user';
        // $email = 'test@example.com';

        Mail::send(new InvitationMail($name, $email));

        return view('welcome');
    }
}
