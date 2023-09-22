<?php

namespace App\Http\Controllers\User\Post;

use App\Models\Category;
use App\Models\Post;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function __invoke(Request $request)
    {
        $posts = Post::latest('id')->where('status', 1)->where('privilege', 3)->get();
        return view('user.index')
            ->with(compact('posts'));
    }
}
