<?php

namespace App\View\Components;

use Illuminate\View\Component;

class AccountData extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public $dataProfile;

    public function __construct($dataProfile)
    {
        $this->dataProfile = $dataProfile;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.account-data');
    }
}
