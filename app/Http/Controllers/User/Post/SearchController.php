<?php

namespace App\Http\Controllers\User\Post;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Post;

class SearchController extends Controller
{
    public function __invoke(Request $request)
    {
        $search = $request->search;
        $posts = Post::latest('id')
            ->with('category')
            ->where('title', 'LIKE', '%' . $search . '%')
            ->orWhere('body', 'LIKE', '%' . $search . '%');
        $posts = $posts->where('status', 1)->get();
        if ($posts->isEmpty()) {
            return view('user.search')
                ->with(compact('posts'))
                ->with(compact('search'))
                ->with('status', '404')
                ->with('message', 'Посты не найдены');
        } else {
            return view('user.search')
                ->with(compact('posts'))
                ->with(compact('search'));
        }
    }
}
