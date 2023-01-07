<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\FollowUser;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class InvitationController extends Controller
{
    public function invitation(Request $request){
        $following_user_id = $request->following_user_id;
        FollowUser::create([
            'followed_user_id' => Auth::id(),
            'following_user_id' => $following_user_id,
        ]);
    }
}
