<?php

namespace App\Http\Controllers\Admin\Deleted;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;

class UpdateController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function __invoke(Post $post)
    {
        $post->restore();
        $post->save();
        return redirect()->back()
            ->with('status', '200')
            ->with('message', 'Успешно восстановлено');
    }
}
