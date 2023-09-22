<?php

namespace App\Http\Controllers\Admin\Post;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function __invoke()
    {
        $posts = Post::where('status', 1)->get();
        $categories = Category::all();
        return view('admin.posts')
            ->with(compact('posts'))
            ->with(compact('categories'));
    }
}
