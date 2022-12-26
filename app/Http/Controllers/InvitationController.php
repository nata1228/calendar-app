<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\FollowUser;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class InvitationController extends Controller
{
    public function invitation(Request $request){
        $user = User::where('email',$request->email)->first();
        $following_user_id = $user->id;
        \Log::debug($following_user_id);
        FollowUser::crate([
            'followed_user_id' => Auth::id(),
            'following_user_id' => $following_user_id,
        ]);
    }
}
