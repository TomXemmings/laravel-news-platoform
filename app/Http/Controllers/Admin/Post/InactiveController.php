<?php

namespace App\Http\Controllers\Admin\Post;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;

class InactiveController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function __invoke()
    {
        if(auth()->user()->role_id == 1) {
            $posts = Post::where('status', 2)->get();
        } elseif(auth()->user()->role_id == 2) {
            $posts = Post::where('status', 3)->get();
        } elseif(auth()->user()->role_id == 3) {
            $posts = Post::where('status', 4)->get();
        }
        return view('admin.index')->with(compact('posts'));
    }
}
