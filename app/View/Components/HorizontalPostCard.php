<?php

namespace App\View\Components;

use App\Models\Post;
use Illuminate\View\Component;

class HorizontalPostCard extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public $posts;

    public function __construct()
    {
        $region = app('request')->input('region');
        $district = app('request')->input('district');
        $city = app('request')->input('city');
        if ($region && !$district && !$city) {
            $posts = Post::latest('id')
                ->where('region_id', $region)
                ->where('status', 1)->get();
        } else if ($region && $district && !$city) {
            $posts = Post::latest('id')
                ->where('region_id', $region)
                ->where('district_id', $district)
                ->where('status', 1)->get();
        } else if ($region && $district && $city) {
            $posts = Post::latest('id')
                ->where('region_id', $region)
                ->where('district_id', $district)
                ->where('city_id', $city)
                ->where('status', 1)->get();
        } else {
            $posts = Post::latest('id')
                ->where('status', 1)->get();
        }
        $this->posts = $posts;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.horizontal-post-card');
    }
}
