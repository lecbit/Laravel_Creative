<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Doctrine\DBAL\Schema\View;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::all();
        return view('posts.index', compact('posts'));
    }

    public function create()
    {
        return View('posts.create');
    }

    public function store()
    {
        $data = request()->validate([
            'title' => '',
            'content' => '',
            'image' => ''
        ]);
        Post::create($data);
        return redirect()->route('posts.index');
    }

    public function show(Post $post)
    {
        return view('posts.show', compact('post'));
    }

    public function edit(Post $post)
    {
        return view('posts.edit', compact('post'));
    }

    public function update(Post $post)
    {
        $data = request()->validate([
            'title' => '',
            'content' => '',
            'image' => ''
        ]);

        $post->update($data);

        return redirect()->route('posts.show', $post->id);
    }

    public function destroy(Post $post)
    {
        $post->delete();

        return redirect()->route('posts.index');
    }

    public function delete()
    {
        // $post = Post::find(2);
        // $post->delete();
        $post = Post::withTrashed()->find(2);
        $post->restore();
        dd("deleted");
    }

    public function firstOrCreate()
    {
        $post = Post::firstOrCreate(['title' => 'title update NEW2'], [
            'title' => 'title update NEW2',
            'content' => 'content update NEW',
            'image' => 'imgIDE.png',
            'likes' => 20,
            'is_published' => 1,
        ]);
        dd($post);
    }

    public function updateOrCreate()
    {
        $post = Post::updateOrCreate(['title' => 'title update NEW'], [
            'title' => 'title of post IDE',
            'content' => 'content update NEW',
            'image' => 'imgIDE.png',
            'likes' => 20,
            'is_published' => 1,
        ]);
        dd($post);
    }
}
