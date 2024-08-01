<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class SelectField extends Component
{
    public $selected = '';
    /**
     * Create a new component instance.
     */
    public function __construct(public string $name, public string $label, public $options)
    {
        $this->selected = old($name);
        //
    }


    public function isSelected($option) {
        return $this->selected == $option;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.selectfield');
    }
}
