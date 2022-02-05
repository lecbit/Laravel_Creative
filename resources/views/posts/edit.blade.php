@extends('layouts.main')
@section('content')
<form action="{{route('posts.update', $post->id)}}" method="POST">
        @csrf
        @method('PATCH')
        <div class="mb-3">
            <label for="title" class="form-label">Title</label>
            <input type="text" name="title" class="form-control" id="title" value="{{$post->title}}">
        </div>
        <div class="mb-3">
            <label for="content" class="form-label">Content</label>
            <textarea type="text" name="content" class="form-control" id="content">{{$post->content}}</textarea>
        </div>
        <div class="mb-3">
            <label for="image" class="form-label">Image</label>
            <input type="text" name="image" class="form-control" id="image" value="{{$post->image}}">
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
    </form>
@endsection