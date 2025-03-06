<?php

namespace App\View\Components\Forms;

use App\Models\Pigeon as ModelsPigeon;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Pigeon extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct()
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        $sires = ModelsPigeon::where('user_id', auth()->id())->where('sex', 'cock')->get();
        $dams = ModelsPigeon::where('user_id', auth()->id())->where('sex', 'hen')->get();

        return view('components.forms.pigeon', compact('sires', 'dams'));
    }
}
