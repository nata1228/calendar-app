<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\InvitationMail;
use App\Models\User;

class MailController extends Controller
{
    public function send(Request $request){
        $user = User::where('email',$request->get('email'))->get('email'); 
        \Log::debug($user);
        $name = 'test_user';
        // $email = $user->'email';
        // $email = User::find($request->input('email'));
            if($user){
                Mail::send(new InvitationMail($name, $user));
            }else{
                return redirect('/localhost');
            }
    }
}
