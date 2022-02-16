<?php

namespace App\Http\Controllers\Post;

use App\Http\Controllers\Controller;
use App\Http\Filters\PostFilter;
use App\Http\Requests\FilterRequest;
use App\Models\Category;
use App\Models\Post;
use App\Models\PostTag;
use App\Models\Tag;
use Doctrine\DBAL\Schema\View;
use Illuminate\Http\Request;

class IndexController extends BaseController
{
    public function __invoke(FilterRequest $request)
    {
        // $this->authorize('view', auth()->user());
        $data = $request->validated();

        $filter = app()->make(PostFilter::class, ['queryParams' => array_filter($data)]);
        $posts = Post::filter($filter)->paginate(1);

        //2
        // $data = $request->validated();
        // $query = Post::query();

        // if (isset($data['category_id'])) {
        //     $query->where('category_id', $data['category_id']);
        // }

        // if(isset($data['title']))
        // {
        //     $query->where('title', 'like', "%{$data['title']}%");
        // }

        // $posts = $query->get();
        // dd($posts);
        ///

        //1
        // $posts = Post::where('is_published', 1)
        // ->where('category_id', $data['category_id'])
        // ->get();
        ///


        return view('posts.index', compact('posts'));
    }
}
