@extends('layouts.main')
@section('content')
<div>
    <form action="{{route('posts.store')}}" method="POST">
        @csrf
        <div class="form-group">
            <label for="title">Title</label>
            <input type="text" name="title" class="form-control" id="title" value="{{old('title')}}">
            @error('title')
            <p class="text-danger">{{$message}}</p>
            @enderror
        </div>
        <div class="form-group">
            <label for="content" class="form-label">Content</label>
            <textarea type="text" name="content" class="form-control" id="content">{{old('title')}}</textarea>
            @error('content')
            <p class="text-danger">{{$message}}</p>
            @enderror
        </div>
        <div class="form-group">
            <label for="image" class="form-label">Image</label>
            <input type="text" name="image" class="form-control" id="image" value="{{old('title')}}">
            @error('image')
            <p class="text-danger">{{$message}}</p>
            @enderror
        </div>

        <div class="form-group">
            <label for="category" class="form-label">Category</label>
            <select id="category" name="category_id" class="form-select" aria-label="Default select example">
                @foreach($categories as $category)
                <option {{old('category_id') == $category->id ? 'selected' : ''}} value="{{$category->id}}"> {{$category->title}}
                </option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="tag" class="form-label">Tags</label>
            <select id="tag" name="tags[]" class="form-select" multiple aria-label="multiple select example">
                @foreach($tags as $tag)
                <option value="{{$tag->id}}">{{$tag->title}}</option>
                @endforeach
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Create</button>
    </form>
</div>
@endsection