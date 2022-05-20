<?php

namespace App\View\Components;

use App\Models\Category;
use Illuminate\Support\Arr;
use Illuminate\View\Component;

class categoryDropdown extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */

    /**
     * Get the view / contents that represent the component.
     *
     */
    public function render()
    {
        return view('components.category-dropdown',[
            'categories'=>Category::all(),
        ]);
    }
}
