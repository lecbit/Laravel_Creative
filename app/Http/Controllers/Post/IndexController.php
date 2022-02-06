<?php

namespace App\Http\Controllers\Post;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Post;
use App\Models\PostTag;
use App\Models\Tag;
use Doctrine\DBAL\Schema\View;
use Illuminate\Http\Request;

class IndexController extends BaseController
{
    public function __invoke()
    {
        // $category = Category::find(2);
        // $post = Post::find(1);
        // dd($category->posts);

        $posts = Post::all();
        return view('posts.index', compact('posts'));
    }
}
