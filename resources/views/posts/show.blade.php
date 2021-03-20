@extends('layouts.app')

@section('title')Show Page @endsection

@section('content')
<div class="card">
    <div class="card-header">
      Post Info
    </div>
    <div class="card-body">
      <h5 class="card-title">Title:</h5>
      <p class="card-text">{{ $post['title'] }}</p>
      <h5 class="card-title">Description:</h5>
      <p class="card-text">{{ $post['description'] }}</p>
    </div>
</div>
</br>
<div class="card">
    <div class="card-header">
      Post creator info 
    </div>
    <div class="card-body">
         <h5 > Name:-  {{ $post['posted_by'] }} </h5> 
     
      <h5 >Email : {{ $post['email'] }} </h5>
      <h5 >Created at  : {{ $post['created_at'] }} </h5>
     
    </div>
</div>
@endsection