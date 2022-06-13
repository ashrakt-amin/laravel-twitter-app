@extends('profile.index')
@section('timelimeOrProfile')

@foreach(Auth::User()->notifications as $notification)

{{($notification->markAsRead())}}
<div class="card" style="margin-bottom: 10px;">
  <div class="card-header">
  {{$notification->data['title']}} 
  </div>

  <div class="card-body">
    <p class="card-text" style="display: inline">{{$notification->data['body']}} </p>
    <a href="{{$notification->data['action']}}" style="float:right;" class="btn btn-dark">show</a>
  </div>
</div>


@endforeach

@endsection