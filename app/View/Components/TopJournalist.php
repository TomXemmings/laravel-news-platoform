<?php

namespace App\View\Components;

use App\Models\User;
use Illuminate\View\Component;

class TopJournalist extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public $users;

    public function __construct()
    {
        $this->users = User::with('posts')->latest()->take(5)->get();
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.top-journalist');
    }
}
