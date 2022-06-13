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

<form class="row g-3" action="{{route('timelime.update',$tweet->id)}}" enctype="multipart/form-data" method="POST" style="padding-top:10px" >
   @csrf
   @method('PUT')

  <div class="mb-3">
  <textarea name ="body" value=""  class="form-control" style="border:none"  rows="3">
  {{old('body',$tweet->body)}}</textarea>
  </div>

  <div class="mb-3">
  <input class="form-control" type="file" name="file" id="formFile">
  </div>

 <div class="mb-3">
    <button type="submit" class="btn btn-primary mb-3">Tweet</button>
  </div>
</form>
</div>
</div>

</div>
@endsection
