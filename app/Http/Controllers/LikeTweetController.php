<?php

namespace App\Http\Controllers;

use App\Models\Like;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Notifications\LikeNotification;
use Illuminate\Support\Facades\Notification;

class LikeTweetController extends Controller
{
    public function store(Request $request){
       $like = Like::create($request->all());
       $user =User::findOrFail($like->tweeting_id);
       Notification::send($user , new LikeNotification( $like));
         return back();
}

// public function show($id){
//   $notifications = DB::select("select * from notifications where notifiable_id = $id");

  
//   return view('profile.notification',['notifications'=>$notifications]);
// }
public function index(){

  
  return view('profile.notification');
}
}
