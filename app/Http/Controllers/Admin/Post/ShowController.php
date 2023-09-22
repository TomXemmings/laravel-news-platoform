<?php

namespace App\Http\Controllers\Admin\Post;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;

class ShowController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function __invoke(Post $post)
    {
        $categories = Category::all();
        return view('admin.post')
            ->with(compact('categories'))
            ->with(compact('post'));
    }
}
