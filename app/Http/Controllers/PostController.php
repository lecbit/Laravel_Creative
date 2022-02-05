<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use App\Models\PostTag;
use App\Models\Tag;
use Doctrine\DBAL\Schema\View;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
        // $category = Category::find(2);
        // $post = Post::find(1);
        // dd($category->posts);

        $posts = Post::all();
        return view('posts.index', compact('posts'));
    }

    public function create()
    {
        $categories = Category::all();
        $tags = Tag::all();


        return View('posts.create', compact('categories', 'tags'));
    }

    public function store()
    {
        $data = request()->validate([
            'title' => '',
            'content' => '',
            'image' => '',
            'category_id' => '',
            'tags' => ''
        ]);

        $tags = $data['tags'];
        unset($data['tags']);

        $post = Post::create($data);
        $post->tag()->attach($tags);
        // foreach($tags as $tag)
        // {
        //     PostTag::firstOrCreate([
        //         'tag_id' => $tag,
        //         'post_id' => $post->id
        //     ]);
        // }

        return redirect()->route('posts.index');
    }

    public function show(Post $post)
    {
        return view('posts.show', compact('post'));
    }

    public function edit(Post $post)
    {
        $categories = Category::all();
        $tags = Tag::all();
        return view('posts.edit', compact('post', 'categories', 'tags'));
    }

    public function update(Post $post)
    {
        $data = request()->validate([
            'title' => '',
            'content' => '',
            'image' => '',
            'category_id' => '',
            'tags' => ''

        ]);

        $tags = $data['tags'];
        unset($data['tags']);

        $post->update($data);
        $post->tag()->sync($tags);

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
