<?php

namespace App\Http\Controllers\Admin\Category;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class StoreController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function __invoke(Request $request)
    {
        Category::create([
            'name' => $request->name,
            'color' => $request->color,
        ]);
        return redirect()->back()
            ->with('status', '200')
            ->with('message', 'Успешно добавлено');
    }
}
