<?php

namespace App\Http\Controllers\Admin\Post;

use App\Http\Controllers\Controller;
use App\Http\Filters\PostFilter;
use App\Http\Requests\FilterRequest;
use App\Models\Category;
use App\Models\Post;
use App\Models\PostTag;
use App\Models\Tag;
use Doctrine\DBAL\Schema\View;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function __invoke(FilterRequest $request)
    {
        $data = $request->validated();

        $filter = app()->make(PostFilter::class, ['queryParams' => array_filter($data)]);
        $posts = Post::filter($filter)->paginate(2);

        return view('admin.post.index', compact('posts'));
    }
}
