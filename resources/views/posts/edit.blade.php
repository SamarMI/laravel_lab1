@extends('layouts.app')
{{$post->user->name}}
@section('title')Create Page @endsection

@section('content')
@if ($errors->any())
<div class="alert alert-danger">
  <ul>
    @foreach ($errors->all() as $error)
    <li>{{ $error }}</li>
    @endforeach
  </ul>
</div>
@endif
<form method="POST" action="{{route('posts.update',['post' => $post->id])}}">
    @csrf
    <div class="form-group">
      <label for="title">Title</label>
      <input type="text" name="title" class="form-control" id="title" aria-describedby="emailHelp" value={{ $post->title }}>
    </div>
    <div class="form-group">
      <label for="description">Description</label>
      <textarea class="form-control" name="description" id="description"> {{ $post->description }}</textarea>
    </div>
    <div class="form-group">
      <label  for="post_creator">Post Creator</label>
      <select name="user_id" class="form-control" id="post_creator" >
        @foreach ($users as $user)
              <option value="{{$user->id}}"  {{$user->id == $post->user->id ? "selected": ""}}>{{$user->name}}</option>  
              {{-- @if($user->id == $post->user->id) selected @endif --}}
        @endforeach
      </select>
    </div>
    <button type="submit" class="btn btn-success">update Post</button>
  </form>

@endsection