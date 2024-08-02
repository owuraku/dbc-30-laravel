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
    public function __construct(public string $name, public string $label, public $options, public $value)
    {
        $this->selected = old($name);
        $this->value = old($name, $value);
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
