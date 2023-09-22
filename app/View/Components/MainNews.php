<?php

namespace App\View\Components;

use App\Models\Post;
use App\Models\Quote;
use Illuminate\View\Component;

class MainNews extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public $posts;
    public $quote;

    public function __construct()
    {
        $posts = Post::latest('id')->where('privilege', 1)->take(4)->get();
        $quote = Quote::latest('id')->first();
        $this->posts = $posts;
        $this->quote = $quote;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.main-news');
    }
}
