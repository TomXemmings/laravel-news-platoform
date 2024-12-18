<?php

namespace App\View\Components;

use App\Models\Ad;
use Illuminate\View\Component;

class AdCard extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public $ad;

    public function __construct()
    {
        $this->ad = Ad::first();
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.ad-card');
    }
}
