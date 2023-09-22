<?php

namespace App\View\Components;

use Illuminate\View\Component;
use App\Models\City;
use App\Models\District;

class SelectMapDropdown extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public $cities;
    public $districts;

    public function __construct()
    {
        $districts = District::all();
        $this->districts = $districts;

        $cities = City::all();
        $this->cities = $cities;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.select-map-dropdown');
    }
}
