<?php

namespace App\Http\Controllers\User\Post;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function __invoke(Request $request)
    {
        $category = $request->category;
        $posts = Post::with('category')
            ->whereHas('category', function ($query) use ($category) {
                $query->where('name', 'LIKE', $category);
            })->get();
        return view('user.search')
            ->with(compact('posts'))
            ->with(compact('category'));
    }
}
