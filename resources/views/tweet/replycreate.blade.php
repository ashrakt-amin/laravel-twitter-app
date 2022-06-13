@extends('profile.index')
@section('timelimeOrProfile')

<div class="card-group" style="margin-bottom:10px">
  <div class="card">
    <div class="card-body">

     <div  style="margin:10px 0px;padding:0" >
      <a href="/ashrakt_amin" role="link" class="">
        <img class="rounded-circle " style="height:50px; width:50px;display:inline;margin-right:10px" src=/>
        <h6 style="display:inline">{{$tweet->user->name}}</h6>
      </a>
     </div>

    <div class=" d-flex justify-content-center" style="margin-bottom: 20px;">
      <div class="card">
       <div class="card-body">
         <p class="card-text" >{{$tweet->body}}</p>
       </div>
       @if($tweet->file !== null)
       <img src="{{$tweet->file_url}}"  style="width:400px ;height:200px;display:block" alt="...">
       @endif
       </div>
       </div>
<!-- start arrray of replies -->
@foreach($replies as $reply)
<div class="container border" style="margin-bottom:10px;padding:10px">
<div class="row " style="margin:0px;padding:0">

<div  style="margin-top:10px;padding:0">
 <a href="/ashrakt_amin" role="link" class="">
  <img class="rounded-circle" style="height:50px; width:50px;display:inline;margin-right:10px" src="">
  <h6 style="display:inline">{{$reply->user->name}}</h6>
 </a>
</div>

    <div class="card-body">
         <p class="card-text" >{{$reply->body}}</p>
    </div>

    </div>
 </div>
 @endforeach
 <!-- end arrray of replies -->

  
 </div>
    </div>
    </div>
   
<!-- end parent tweet -->


    <!-- start save reply -->
<div class="d-flex justify-content-center">

<div class="container border" style="margin:10px 0px ;padding:10px">
<div class="row " style="margin:0px;padding:0">

<div  class="col-md-4" style="margin:10px ;padding:0">
 <a href="/ashrakt_amin" role="link" class="">
  <img class="rounded-circle" style="height:50px; width:50px;display:inline;margin-right:10px" src="">
  <h6 style="display:inline">{{auth()->user()->name}}</h6>

 </a>
</div>
 
<div class="" > 
  <form class="g-3"  action="{{route('reply.store')}}" enctype="multipart/form-data" method="POST" style="padding-top:10px" >
    {{csrf_field()}}

    <input type="hidden" name ="tweet_id" value ="{{$tweet->id}}" >
    <input type="hidden" name ="user_id"  value ="{{auth()->user()->id}}" >

    <div class="mb-3 d-flex justify-content-center">
    <textarea name ="body" class="form-control" value ="old(body)" placeholder="reply" rows="3"></textarea>
    </div>

  <div class="d-flex justify-content-center">
      <button type="submit" class="btn btn-primary mb-3">Tweet</button>
    </div>
  </form>
</div>

</div>

</div>
 </div>
    <!-- end save reply -->




@endsection

