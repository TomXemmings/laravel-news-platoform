<?php

namespace App\Http\Controllers\Admin\User;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class StoreController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function __invoke(Request $request)
    {
        User::create([
            'name' => $request->name,
            'surname' => $request->surname,
            'lastname' => $request->lastname,
            'number' => $request->number,
            'password' => $request->password,
            'role_id' => $request->role_id,
        ]);
        return redirect()->back()
            ->with('status', '200')
            ->with('message', 'Успешно создан');
    }
}
