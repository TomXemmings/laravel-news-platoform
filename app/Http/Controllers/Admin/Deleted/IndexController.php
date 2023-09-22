<?php

namespace App\Http\Controllers\Admin\Deleted;

use App\Http\Controllers\Controller;
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
        $posts = Post::onlyTrashed()->get();
        return view('admin.deleted')->with(compact('posts'));
    }
}
