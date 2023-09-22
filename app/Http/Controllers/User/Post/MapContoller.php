<?php

namespace App\Http\Controllers\User\Post;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;

class MapContoller extends Controller
{
    public function __invoke(Request $request)
    {
        $search = $request->postmap;
        $posts = Post::latest('id')
            ->with('category')
            ->where('region_id', 'LIKE', '%' . $search . '%')
            ->orWhere('city_id', 'LIKE', '%' . $search . '%')
            ->orWhere('district_id', 'LIKE', '%' . $search . '%');
        return view('user.map.post')
            ->with(compact('posts'));
    }
}
