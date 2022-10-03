<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\FollowUser;

class FollowUserController extends Controller
{
    public function get_user(){
        $followed_user_id = FollowUser::where('followed_user_id',1)->pluck('followed_user_id');
        $user = User::whereIn('id',$followed_user_id)->get();
        return response()->json($user);
    }
}
