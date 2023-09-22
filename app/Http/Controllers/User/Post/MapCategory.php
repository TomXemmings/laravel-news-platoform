<?php

namespace App\Http\Controllers\User\Post;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;

class MapCategory extends Controller
{
    public function __invoke()
    {
        $posts = Post::latest('id')->where('status', 1)->where('privilege', 3)->get();
        return view('user.map')
            ->with(compact('posts'));
    }
}
