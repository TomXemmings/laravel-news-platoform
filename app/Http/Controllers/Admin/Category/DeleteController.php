<?php

namespace App\Http\Controllers\Admin\Category;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class DeleteController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function __invoke(Category $category)
    {
        $category->delete();
        return redirect()->back()
            ->with('status', '200')
            ->with('message', 'Успешно удалено');
    }
}
