<?php

namespace App\View\Components;

use App\Models\Post;
use Illuminate\View\Component;

class CommentBody extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public $post;

    public function __construct($post)
    {
        $this->post = Post::where('id', $post->id)->with('comments')->first();
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.comment-body');
    }
}
