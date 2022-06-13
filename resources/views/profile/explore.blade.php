
@extends('profile.index')

@section('media')
<form action={{route('user.index')}} class="form-inline" method="GET">

<div class="row g-2">
  <div class="col-sm">
    <input type="text" name="name" class="form-control" placeholder="#explore" aria-label="State">
  </div>

  <div class="col-sm">
  <button type="submit" class="btn btn-primary">Find</button>
  </div>

</div>
</form>

@foreach($user as $u)
<div class="card-group" style="margin:10px">
   <a href="/ashrakt_amin" role="link" class="">
   <img class="rounded-circle" style="height:50px; width:50px;display:inline;margin-right:10px" />
   <span>{{$u->name}}</span>
   </a>
</div>
@endforeach
@endsection
