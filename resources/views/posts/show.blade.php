@extends('layouts.main')
@section('content')
<div>
    {{$post->id}}.{{$post->title}}
</div>
<div>
    <form action='{{route("posts.destroy", $post->id)}}' method="POST">
        @csrf
        @method('DELETE')
        <input type="submit" class="btn btn-danger" value="Удалить">
    </form>
</div>
<div><a href="{{route('posts.index')}}">Back</a></div>
@endsection