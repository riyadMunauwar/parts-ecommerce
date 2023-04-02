<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use Livewire\WithFileUploads;
use App\Models\Setting;
use App\Traits\WithSweetAlert;

class Header extends Component
{
    use WithFileUploads;
    use WithSweetAlert;

    public $setting;


    public function mount()
    {
        $this->setting = Setting::first();
    }


    public function render()
    {
        return view('admin.components.header');
    }
}
