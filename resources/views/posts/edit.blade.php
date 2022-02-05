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

    <div class="mb-3">
        <label for="category" class="form-label">Category</label>
        <select id="category" name="category_id" class="form-select" aria-label="Default select example">
            @foreach($categories as $category)
            <option {{$category->id === $post->category->id? 'selected' : ''}} value="{{$category->id}}"> {{$category->title}}
            </option>
            @endforeach
        </select>
    </div>
    <div class="mb-3">
        <label for="tags" class="form-label">Tags</label>
        <select name="tags[]" class="form-select" multiple aria-label="multiple select example">
            @foreach($tags as $tag)
            <option 
            @foreach($post->tags as $postTag) 
            {{$tag->id === $postTag->id? 'selected' : ''}} 
            @endforeach value="{{$tag->id}}">{{$tag->title}}</option>
            @endforeach
        </select>
    </div>
    <button type="submit" class="btn btn-primary">Update</button>
</form>
@endsection