<?php

namespace App\View\Components;

use App\Models\Quote;
use Illuminate\View\Component;

class TopQuote extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public $quotes;

    public function __construct()
    {
        $this->quotes = Quote::latest()->take(5)->get();
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.top-quote');
    }
}
