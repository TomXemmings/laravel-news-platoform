<?php

namespace App\View\Components;

use App\Models\Post;
use Illuminate\View\Component;

class TopCard extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public $post;

    public function __construct()
    {
        $this->post = Post::where('privilege', 1)->get();
        $this->post = $this->post->get(1);
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.top-card');
    }
}
