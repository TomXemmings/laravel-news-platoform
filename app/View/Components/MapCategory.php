<?php

namespace App\View\Components;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\View\Component;

class MapCategory extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public $categories;
    public $urlCategory;

    public function __construct()
    {

        $request = app(Request::class);
        $parameters = $request->all();
        $this->urlCategory .= '?';
        foreach ($parameters as $key => $parameter) {
            $this->urlCategory .= $key;
            $this->urlCategory .= '=';
            $this->urlCategory .= $parameter;
            $this->urlCategory .= '&';
        }
        $categories = Category::all();
        $this->categories = $categories;
        $this->urlCategory = substr($this->urlCategory, 0, -1);
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.map-category');
    }
}
