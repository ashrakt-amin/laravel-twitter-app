@extends('profile.index')
@section('data')

<a href="{{ route('data.create')}}">update</a>

@unless(!auth()->user()->is($user))
<a href="{{route('data.edit',$user->id)}}">update</a>
@endunless

<div class="card mb-3">
  <img src="..." class="card-img-top" alt="...">
  <div class="card-body">
    <h5 class="card-title">{{$user->name}}</h5>
    <p class="card-text">user name</p>
    <p class="card-text"><small class="text-muted">bio</small></p>

  
  </div>
</div>
@endsection