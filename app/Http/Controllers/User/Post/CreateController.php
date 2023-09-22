<?php

namespace App\Http\Controllers\User\Post;

use App\Http\Controllers\Controller;
use App\Models\City;
use App\Models\District;
use App\Models\Region;
use Illuminate\Http\Request;

class CreateController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function __invoke()
    {
        $regions = Region::all();
        $cities = City::all();
        $districts = District::all();
        return view('user.createPost')
            ->with(compact('regions'))
            ->with(compact('districts'))
            ->with(compact('cities'));
    }
}
