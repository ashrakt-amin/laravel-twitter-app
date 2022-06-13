@extends('profile.index')
@section('timelimeOrProfile')
<div class="container border" style="margin-bottom:10px;padding:10px">
<div class="row " style="margin:0px;padding:0">

<div class="col-md-2" style="margin-top:10px;padding:0">
<a href="/ashrakt_amin" role="link" class="">
  <img class="rounded-circle" style="height:50px; width:50px;">
 </a>
</div>

<div class="col-md-10">

<form class="row g-3" action="{{route('timelime.store')}}" enctype="multipart/form-data" method="POST" style="padding-top:10px" >
   {{csrf_field()}}
  <div class="mb-3">
  <textarea name ="body" class="form-control" style="border:none" placeholder="What's Happening ?" rows="3"></textarea>
  </div>

  <div class="mb-3">
  <input class="form-control" type="file" name="file" >
  </div>
 

 <div class="mb-3">
    <button type="submit" class="btn btn-primary mb-3">Tweet</button>
  </div>
</form>
</div>
</div>

</div>

@foreach($tweets as $tweet)

<div class="card-group" style="margin-bottom:10px">
  <div class="card">
    <div class="card-body">

     <div  style="margin:10px 0px;padding:0" >
      <a href="/ashrakt_amin" role="link" class="">
        <img class="rounded-circle " style="height:50px; width:50px;display:inline;margin-right:10px" src={{$tweet->profile_photo_path_url}}/>
        <h6 style="display:inline">{{$tweet->user->name}}</h6>
      </a>
     </div>

    <div class=" d-flex justify-content-center" >
      <div class="card">
    <div class="card-body">

      <p class="card-text" >{{$tweet->body}}</p>
    </div>
      @if($tweet->file !== null)
      <img src="{{$tweet->file_url}}"  style="width:400px ;height:200px;display:block" alt="...">
      @endif

    </div>
    </div>

   
    <div class="d-flex justify-content-center" style="margin-top:20px">
        <a href="{{route('reply.show',$tweet->id)}}"><svg style="display:inline ;margin-right:20px"  xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-chat" viewBox="0 0 16 16"><path d="M2.678 11.894a1 1 0 0 1 .287.801 10.97 10.97 0 0 1-.398 2c1.395-.323 2.247-.697 2.634-.893a1 1 0 0 1 .71-.074A8.06 8.06 0 0 0 8 14c3.996 0 7-2.807 7-6 0-3.192-3.004-6-7-6S1 4.808 1 8c0 1.468.617 2.83 1.678 3.894zm-.493 3.905a21.682 21.682 0 0 1-.713.129c-.2.032-.352-.176-.273-.362a9.68 9.68 0 0 0 .244-.637l.003-.01c.248-.72.45-1.548.524-2.319C.743 11.37 0 9.76 0 8c0-3.866 3.582-7 8-7s8 3.134 8 7-3.582 7-8 7a9.06 9.06 0 0 1-2.347-.306c-.52.263-1.639.742-3.468 1.105z"/></svg></a>
        <a href=""><svg style="display:inline ;margin-right:20px" xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-arrow-down-up" viewBox="0 0 16 16"><path fill-rule="evenodd" d="M11.5 15a.5.5 0 0 0 .5-.5V2.707l3.146 3.147a.5.5 0 0 0 .708-.708l-4-4a.5.5 0 0 0-.708 0l-4 4a.5.5 0 1 0 .708.708L11 2.707V14.5a.5.5 0 0 0 .5.5zm-7-14a.5.5 0 0 1 .5.5v11.793l3.146-3.147a.5.5 0 0 1 .708.708l-4 4a.5.5 0 0 1-.708 0l-4-4a.5.5 0 0 1 .708-.708L4 13.293V1.5a.5.5 0 0 1 .5-.5z"/></svg></a>
        <form action="{{route('like')}}"  method="POST">
          @csrf
            <input type="hidden" name ="tweet_id" class="form-control" value ="{{$tweet->id}}" style="border:none" >
            <input type="hidden" name ="tweeting_id" class="form-control" value ="{{$tweet->user_id}}" style="border:none" >
            <input type="hidden" name ="user_id" class="form-control" value ="{{auth()->user()->id}}" style="border:none" >
            <button type="submit"style="background-color:white" >
            <svg  style="display:inline "  xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-heart" viewBox="0 0 16 16"><path d="m8 2.748-.717-.737C5.6.281 2.514.878 1.4 3.053c-.523 1.023-.641 2.5.314 4.385.92 1.815 2.834 3.989 6.286 6.357 3.452-2.368 5.365-4.542 6.286-6.357.955-1.886.838-3.362.314-4.385C13.486.878 10.4.28 8.717 2.01L8 2.748zM8 15C-7.333 4.868 3.279-3.04 7.824 1.143c.06.055.119.112.176.171a3.12 3.12 0 0 1 .176-.17C12.72-3.042 23.333 4.867 8 15z" />
            </svg> {{$likes}}
          
           

           
           
           
            
            
           
</button>
          </form>

      </div> 


    </div>
  </div>
</div>
@endforeach
@endsection



@section('media')
<form action={{route('user.index')}} class="form-inline" method="GET">


<div class="row g-2 ">
  <div class="col-sm d-flex justify-content-center">
    <input type="text" name="name" class="form-control" placeholder="#explore" aria-label="State">
  </div>

  <div class="col-sm d-flex justify-content-center" style="margin-top: 5px;">
  <button type="submit" class="btn btn-primary">Find</button>
  </div>

</div>
</form>

@foreach($users as $user)
<div class="card-group" style="margin:10px">
   <a href="{{route('user.show', $user->id ) }}" role="link" class="">
   <img class="rounded-circle" style="height:50px; width:50px;display:inline;margin-right:10px" />
   <h6 style="display:inline">{{$user->name}}</h6>
   </a>
</div>
@endforeach
@endsection

