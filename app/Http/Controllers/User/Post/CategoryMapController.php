<?php

namespace App\Http\Controllers\User\Post;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\URL;

class CategoryMapController extends Controller
{
    public function __invoke(Request $request)
    {
        $category = $request->id;
        if ($request->id == 0) {
            $category = null;
        }
        $region = app('request')->input('region');
        $district = app('request')->input('district');
        $city = app('request')->input('city');
        if ($region && !$district && !$city) {
            $posts = Post::latest('id')
                ->where('status', 1)
                ->where('region_id', $region)
                ->with('category')
                ->whereHas('category', function ($query) use ($category) {
                    $query->where('id', 'LIKE', $category);
                })->get();
        } else if ($region && $district && !$city) {
            $posts = Post::latest('id')
                ->where('status', 1)
                ->where('region_id', $region)
                ->where('district_id', $district)
                ->with('category')
                ->whereHas('category', function ($query) use ($category) {
                    $query->where('id', 'LIKE', $category);
                })->get();
        } else if ($region && $district && $city) {
            $posts = Post::latest('id')
                ->where('status', 1)
                ->where('region_id', $region)
                ->where('district_id', $district)
                ->where('city_id', $city)
                ->with('category')
                ->whereHas('category', function ($query) use ($category) {
                    $query->where('id', 'LIKE', $category);
                })->get();
        } else {
            $posts = Post::latest('id')
                ->where('status', 1)
                ->with('category')
                ->whereHas('category', function ($query) use ($category) {
                    $query->where('id', 'LIKE', $category);
                })->get();
        }
        return response()->json($posts);
    }
}
