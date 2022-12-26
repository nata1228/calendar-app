<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\InvitationMail;
use App\Models\User;

class MailController extends Controller
{
    public function send(Request $request){
        $user = User::where('email',$request->email)->first(); 
        $name = $user->name;
        $email = $user->email;
            if(!$user){
                return ([
                    'statas' => 500,
                    'messege' => "ユーザーが存在しません"
                ]);
            }else{
                Mail::send(new InvitationMail($name, $email));
            }
    }
}
