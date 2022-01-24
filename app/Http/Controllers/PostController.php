<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::where("is_published", 0)->first(); // ->get()
        dump($posts->title);
        // foreach($posts as $post){
        //     dump($post->title);
        // }
        dd("end");
    }

    public function create()
    {
        $postsArr = [
            [

                'title' => 'title of post IDE',
                'content' => 'content of post IDE',
                'image' => 'imgIDE.png',
                'likes' => 20,
                'is_published' => 1,
            ],
            [
                'title' => 'another title of post IDE',
                'content' => 'another content of post IDE',
                'image' => 'anotherimgIDE.png',
                'likes' => 20,
                'is_published' => 1
            ],
        ];

        foreach ($postsArr as $item) {
            POST::create($item);
        }

        dd("created");
    }

    public function update()
    {
        $post = Post::find(6);
        $post->update([
            'title' => 'updated2',
            'content' => 'updated2',
        ]);
        dd("updated");
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
