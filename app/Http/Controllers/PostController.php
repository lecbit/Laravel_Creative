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
        
        foreach($postsArr as $item)
        {
            POST::create($item);
        }

        dd("created");
    }
}
