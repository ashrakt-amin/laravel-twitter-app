
<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ReplyController;
use App\Http\Controllers\TweetController;
use App\Http\Controllers\FollowsController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RetweetController;
use App\Http\Controllers\LikeTweetController;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');


Route::group(
    [
        'prefix' => LaravelLocalization::setLocale(),
        'middleware' => [ 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath','auth' ]
    ], function(){ 
        Route::resource('user',ProfileController::class);
        Route::resource('timelime',TweetController::class);
        Route::resource('reply',ReplyController::class);
        Route::post('/profiles/{user:id}/follow',[FollowsController::class,'store']);
        Route::post('/like',[LikeTweetController::class,'store'])->name('like');
        Route::get('/notification',[LikeTweetController::class,'index'])->name('index.notification');
        // Route::get('/notification/{id}',[NotificationsController::class,'read'])->name('notification');
        Route::post('/retweet/{id}',[RetweetController::class,'store'])->name('retweet.store');
        Route::delete('/delete/{id}',[RetweetController::class,'destroy'])->name('retweet.destroy');


    });

    

