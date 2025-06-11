<?php

namespace App\View\Components\Global;

use Closure;
use Illuminate\View\Component;
use Illuminate\Contracts\View\View;

class Button extends Component
{
    public $type;
    public $size;
    public $link;
    public $buttonType;
    public $classnames;


    /**
     * Create a new component instance.
     */
    public function __construct($type = 'primary', $size = 'md', $link = null, $buttonType = 'button', $classnames = null)
    {
        $this->type = $type;
        $this->size = $size;
        $this->link = $link;
        $this->buttonType = $buttonType;
        $this->classnames = $classnames;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.global.button');
    }
}
