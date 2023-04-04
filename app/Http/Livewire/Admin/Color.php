<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\Setting;
use App\Traits\WithSweetAlert;

class Color extends Component
{

    use WithSweetAlert;
    
    public $setting;


    protected $rules = [
        'setting.primary_color' => ['required', 'string'],
        'setting.secondary_color' => ['required', 'string'],
        'setting.primary_text_color' => ['required', 'string'],
        'setting.secondary_text_color' => ['required', 'string'],
        'setting.top_header_bg_color' => ['required', 'string'],
        'setting.top_header_text_color' => ['required', 'string'],
        'setting.main_header_bg_color' => ['required', 'string'],
        'setting.main_header_text_color' => ['required', 'string'],
        'setting.middle_header_bg_color' => ['required', 'string'],
        'setting.middle_header_text_color' => ['required', 'string'],
        'setting.footer_bg_color' => ['required', 'string'],
        'setting.footer_text_color' => ['required', 'string'],
        'setting.top_header_button_text_color' => ['required', 'string'],
    ];


    public function mount()
    {
        $this->setting = Setting::first();
    }


    public function render()
    {
        return view('admin.components.color');
    }
    

    public function updated()
    {
        if($this->setting->save()){

            $this->initColoris();
            return $this->success('Change', 'Color change successfully');

        }else {

            $this->initColoris();
            return $this->error('Failed', 'Failed to change color');
            
        }

    }

    private function initColoris()
    {
        return $this->dispatchBrowserEvent('init:coloris');
    }
}
