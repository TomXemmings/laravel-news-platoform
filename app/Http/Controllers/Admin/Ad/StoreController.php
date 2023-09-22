<?php

namespace App\Http\Controllers\Admin\Ad;

use App\Http\Controllers\Controller;
use App\Models\Ad;
use Illuminate\Http\Request;

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
        Ad::create([
            'title' => $request->title,
            'body' => $request->body,
            'photo' => $requestPhoto,
        ]);
        return redirect()->back()
            ->with('status', '200')
            ->with('message', 'Успешно добавлено');
    }
}
