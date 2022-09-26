<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\FollowUser;

class FollowUserController extends Controller
{
    // フォロー機能
    public function follow(User $user){
        $follow = FollowUser::create([
            // フォローを行うユーザーは認証ユーザー
            'follow_user_id' => \Auth::user()->id,
            // フォローするユーザーのidを取得
            'followed_user_id' => $user->id,
        ]);
        $followCount = (FollowUser::where('followed_user_id', $user->id)->get());
        return response()->json(['followCount' => $followCount]);
    }

    // FollowUserインスタンスを取得して削除する機能
    public function unfollow(User $user){
        $follow = FollowUser::where('follow_user_id', \Auth::user()->id)->where('followed_user_id', $user->id)->first();
        $follow->delete();
        $followCount = count(FollowUser::where('followed_user_id', $user->id)->get());

        return response()->json(['followCount' => $followCount]);
    }
}
