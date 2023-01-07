<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\InvitationMail;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class MailController extends Controller
{
    public function send(Request $request){
        $user = User::where('email',$request->email)->first(); 
        \Log::debug($user->id);
        \Log::debug(Auth::id());
        if($user->id=Auth::id()){
            return [
                'messege' => "同一ユーザーです"
            ];
        }else{
            // 
        }
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
