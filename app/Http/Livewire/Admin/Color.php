<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\Setting;
use App\Traits\WithSweetAlert;

class Color extends Component
{

    use WithSweetAlert;
    
    public $setting;


    public function mount()
    {
        $this->setting = Setting::first();
    }


    public function render()
    {
        return view('admin.components.color');
    }
}
