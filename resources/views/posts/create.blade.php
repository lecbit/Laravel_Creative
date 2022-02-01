@extends('layouts.main')
@section('content')
<div>
    <form action="{{route('posts.store')}}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="title" class="form-label">Title</label>
            <input type="text" name="title" class="form-control" id="title">
        </div>
        <div class="mb-3">
            <label for="content" class="form-label">Content</label>
            <textarea type="text" name="content" class="form-control" id="content"></textarea>
        </div>
        <div class="mb-3">
            <label for="image" class="form-label">Image</label>
            <input type="text" name="image" class="form-control" id="image">
        </div>

        <div class="mb-3">
            <label for="category" class="form-label">Category</label>
            <select id="category" name="category_id" class="form-select" aria-label="Default select example">
                @foreach($categories as $category)
                <option value="{{$category->id}}"> {{$category->title}}
                </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
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