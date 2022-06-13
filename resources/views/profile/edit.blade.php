@extends('profile.index')
@section('timelimeOrProfile')
<div class="bb">

<form class="form mx-auto " action="{{route('data.update',$user->id)}}" enctype="multipart/form-data" method="POST" style="padding-top:10px" >
@csrf
   @method('PUT')
    
    <div class="form-group col-md-9">
      <input type="file" value="" name="avatar" class="form-control" placeholder="avatar">
    </div>
    
    <div class="form-group col-md-9">
      <input type="text" value="{{old('user_name',$user->user_name)}}" name="user_name" class="form-control" placeholder="user name">
    </div>

    <div class="form-group col-md-9">
      <input type="text" value="{{old('bio',$user->bio)}}" name="bio" class="form-control" placeholder="bio">
    </div>

    <div class="col-xs-12 col-sm-12 col-md-12 text-center">
       <button type="submit" class="btn btn-primary ">Create</button>
    </div>


</form>
</div>
@endsection