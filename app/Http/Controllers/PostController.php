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
}