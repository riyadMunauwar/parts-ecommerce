<?php

namespace App\View\Components\Front;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class MasterLayout extends Component
{
    public $meta_title;
    public $meta_tags;
    public $meta_description;
    /**
     * Create a new component instance.
     */
    public function __construct($meta_title = '', $meta_description = '', $meta_tags = '')
    {
        $this->meta_title = $meta_title;
        $this->meta_description = $meta_description;
        $this->meta_tags = $meta_tags;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('front.layouts.master-layout');
    }
}
