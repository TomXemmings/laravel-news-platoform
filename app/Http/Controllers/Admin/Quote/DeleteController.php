<?php

namespace App\Http\Controllers\Admin\Quote;

use App\Http\Controllers\Controller;
use App\Models\Quote;
use Illuminate\Http\Request;

class DeleteController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function __invoke(Quote $quote)
    {
        $quote->delete();
        return redirect()->back()
            ->with('status', '200')
            ->with('message', 'Успешно удалено');
    }
}
