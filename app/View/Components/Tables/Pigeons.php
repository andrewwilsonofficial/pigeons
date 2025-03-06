<?php

namespace App\View\Components\Tables;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Pigeons extends Component
{
    /**
     * Create a new component instance.
     */
    public $pigeons;
    public function __construct($pigeons)
    {
        $this->pigeons = $pigeons;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        $pigeons = $this->pigeons;
        return view('components.tables.pigeons', compact('pigeons'));
    }
}
