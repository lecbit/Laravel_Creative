<?php

namespace App\Http\Controllers\Post;

use App\Http\Controllers\Controller;
use App\Http\Requests\UpdateRequest;
use App\Models\Category;
use App\Models\Post;
use App\Models\PostTag;
use App\Models\Tag;
use Doctrine\DBAL\Schema\View;
use Illuminate\Http\Request;

class UpdateController extends BaseController
{
    public function __invoke(UpdateRequest $request ,Post $post)
    {
        $data = $request->validated();

        $this->service->update($post, $data);

        lplplpl

        return redirect()->route('posts.show', $post->id);
    }
}
