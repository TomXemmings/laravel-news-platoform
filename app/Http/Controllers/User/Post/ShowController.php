<?php

namespace App\Http\Controllers\User\Post;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;

class ShowController extends Controller
{
    public function __invoke(Post $post)
    {
        $post->views++;
        $post->save();
        $categories = Category::all();
        return view('user.showPost')
            ->with(compact('post'))
            ->with(compact('categories'));
    }
}
