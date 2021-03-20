@extends('layouts.app')

@section('title')Create Page @endsection

@section('content')
<form method="POST" action="{{route('posts.store')}}">
    @csrf
    <div class="form-group">
      <label for="title">Title</label>
      <input type="text" class="form-control" id="title" aria-describedby="emailHelp" value={{ $post['title'] }}>
    </div>
    <div class="form-group">
      <label for="description">Description</label>
      <textarea class="form-control" id="description"> {{ $post['description'] }}</textarea>
    </div>
    <div class="form-group">
      <label  for="post_creator">Post Creator</label>
      <select class="form-control" id="post_creator">
          <option>{{ $post['posted_by'] }}</option>
      </select>
     
        
      
    </div>
    <button type="submit" class="btn btn-success">update Post</button>
  </form>

@endsection