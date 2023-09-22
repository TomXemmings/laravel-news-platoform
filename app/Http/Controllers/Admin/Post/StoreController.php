<?php

namespace App\Http\Controllers\Admin\Post;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class StoreController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function __invoke(Request $request)
    {
        $extension = $request->file('photo')->extension();
        $fileName = time() . '.' . $extension;
        $request->file('photo')->storeAs('post', $fileName, 'public');
        $requestPhoto = route('user.index') . '/storage/post/' . $fileName;
        Post::create([
            'title' => $request->title,
            'body' => $request->body,
            'views' => 0,
            'status' => 4,
            'photo' => $requestPhoto,
            'privilege' => 2,
            'category_id' => 3,
            'user_id' => Auth::user()->id,
            'region_id' => 1,
            'city_id' => 1,
            'district_id' => 1,
        ]);
        return redirect()->route('admin.posts')
            ->with('status', '200')
            ->with('message', 'Успешно создан');
    }
}
