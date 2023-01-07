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
            if($user){
                Mail::send(new InvitationMail($user));
                return [
                    'statas' => 200,
                ];
            }else{
                return [
                    'statas' => 500,
                    'messege' => "ユーザーが存在しません"
                ];
            }
    }
}
