<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Fortify\TwoFactorAuthenticatable;
use Laravel\Jetstream\HasProfilePhoto;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens;
    use HasFactory;
    use HasProfilePhoto;
    use Notifiable;
    use TwoFactorAuthenticatable;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
        'two_factor_recovery_codes',
        'two_factor_secret',
    ];
    public function tweets(){
        return $this->hasMany(Tweet::class,'user_id' ,'id');
    }

    public function retweets(){
        return $this->hasMany(Retweet::class,'user_id' ,'id');
     }

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * The accessors to append to the model's array form.
     *
     * @var array
     */
    protected $appends = [
        'profile_photo_url',
    ];

    public function data(){
        return $this->hasOne(Image::class,'user_id' ,'id');
    }
    

   public function follows(){
    return $this->belongsToMany(User::class,'follows','user_id','following_user_id');
}


public function following(User $user){

    return $this->follows()->where('following_user_id',$user->id)->exists();
 }


public function toggleFollow(User $user){
    $this->follows()->toggle($user);
}

public function replies(){
    return $this->belongsTo(Reply::class,'id','tweet_id' );
 }

 public function  likes(){
    return $this->hasMany(Like::class ,'user_id' ,'id');
}
public function liked(User $user){
    return $this->likes()->where('user_id',$user->id)->exists();
}
}
