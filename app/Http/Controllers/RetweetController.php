<?php

namespace App\Http\Controllers;

use App\Models\Tweet;
use App\Models\Retweet;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Notifications\RetweetNotification;
use Illuminate\Support\Facades\Notification;

class RetweetController extends Controller
{
    public function store(Request $request,$id){
      

         $retweet =Retweet::create([
             "body"=>$request->body,
             "tweet_id"=>$id,
             'user_id'=>Auth::user()->id
             ]);
             dd($retweet->tweet()->get());
         $retweet->save();
         Notification::send($user , new RetweetNotification( $like));

         return redirect()->back();
    
        }


        public function destroy($id){
           $retweet = Retweet::findOrFail($id);
           $retweet->delete();
            return redirect()->back();
       
           }
}
