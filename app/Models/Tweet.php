<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tweet extends Model
{
    use HasFactory;
    protected $fillable =['body' , 'file' ,'user_id'];

    public function user(){
        return $this->belongsTo(User::class ,'user_id','id');
    }


   public function getFileUrlAttribute(){
      
        return ($this->file !== null) ? asset('storage/'.$this->file) : null;

       } 

       public function replies(){
        return $this->hasMany(Reply::class ,'tweet_id' ,'id');
     }

     public function likes(){
        return $this->hasMany(Like::class ,'tweet_id' ,'id');
    }

    public function retweets(){
        return $this->hasMany(Retweet::class,'tweet_id' ,'id');
    }
   }

