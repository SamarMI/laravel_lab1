@extends('layouts.app')


@section('title')Show Page @endsection

@section('content')
<div class="card">
    <div class="card-header">
      Post Info
    </div>
    <div class="card-body">
      <h5 class="card-title">Title:</h5>
      <p class="card-text">{{ $post->title }}</p>
      <h5 class="card-title">Description:</h5>
      <p class="card-text">{{ $post->description }}</p>
    </div>
</div>
</br>
<div class="card">
    <div class="card-header">
      Post creator info 
    </div>
    <div class="card-body">
         <h5 > Name:-  {{  $post->user->name }} </h5> 
     
      <h5 >Email : {{ $post->user->email }} </h5>
      <!--  <h5 >Created at  : {{ $post->user->created_at }} </h5> -->
      <h5 >Created at  : {{Carbon\Carbon::parse($post->created_at)->Format('Do d \of M Y, h:m:s a')}} </h5>
     
    </div>
</div>
@endsection