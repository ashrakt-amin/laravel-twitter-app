<?php

namespace App\Http\Controllers;

use App\Models\Like;
use App\Models\User;
use App\Models\Tweet;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Symfony\Component\Console\Input\Input;

class TweetController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       
        $likes = Like::count('tweet_id');
        $tweets = Tweet::with('user')->latest()->get();
        $users = User::paginate(10);
        // dd($users);
        return view('tweet.timelime',[
             'tweets'=>$tweets,
             'users' => $users ,
             'likes'=>$likes]);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {                

      
            $request->validate([
                   'body'=>'max:255',
                   'file'=>'image|mimes:jpg,jpeg,bmp,png|max:1000',

                ]);

            $data = $request->except('file');
            $file = $request->file('file');
          

            if(isset($file) && $file->isValid()){
            $filename = time().".".$file->getClientOriginalName();
            $data['file'] = $file->storeAs('Body',$filename,'uploads');

            }

            $data['user_id'] = Auth::user()->id;
            Tweet::create($data);
            

            return redirect()->route('timelime.index');
     
           
         }
    

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
       
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit( Tweet $tweets , $id)
    { 
        $tweet= $tweets->findOrFail($id);
        return view('tweet.edit',["tweet"=> $tweet]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {

        $request->validate([
               'body'=>'sometimes|max:255',
               'file'=>'file'
        ]);

        $data = $request->except('file');
        $file = $request->file('file');

        if(isset($file) && $file->isValid()){
        $filename = time().".".$file->getClientOriginalName();
        $data['file'] = $file->storeAs('Body',$filename,'uploads');

        }
        $data['user_id'] = Auth::user()->id;
        $tweet = Tweet::findOrfail($id);

        $tweet->update($data);

        return redirect()->route('timelime.index');
 
       
     }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $tweet = Tweet::findOrFail($id);
        $tweet->delete();
        return Redirect::back();
    }
}
