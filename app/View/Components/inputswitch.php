<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class inputswitch extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct(public string $name, public string $label, public $subjects, public $value)
    {
        $this->value = old($name, $value);
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.inputswitch');
    }

    public function isSelected($value = null) {
        $value = isset($value)? $value : $this->value;
        return $this->subjects->contains(function($s) use ($value) { 
            return $s->id == $value;   
        });
    }
}
