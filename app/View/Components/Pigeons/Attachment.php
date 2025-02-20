<?php

namespace App\View\Components\Pigeons;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Attachment extends Component
{
    /**
     * Create a new component instance.
     */
    public $attachment;
    public function __construct($attachment)
    {
        $this->attachment = $attachment;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        $attachment = $this->attachment;
        return view('components.pigeons.attachment', compact('attachment'));
    }
}
