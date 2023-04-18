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

    public $locale;

    public $new_logo;
    public $old_logo;

    public $top_header_message_text;
    public $top_header_button_text;
    public $top_header_button_link;
    public $middle_header_message_text;
    public $middle_header_message_text_link;
    public $main_header_message_text;
    public $main_header_message_text_link;


    protected $rules = [
        'top_header_message_text' => ['nullable', 'string'],
        'top_header_button_text' => ['nullable', 'string'],
        'top_header_button_link' => ['nullable', 'string'],
        'middle_header_message_text' => ['nullable', 'string'],
        'middle_header_message_text_link' => ['nullable', 'string'],
        'main_header_message_text' => ['nullable', 'string'],
        'main_header_message_text_link' => ['nullable', 'string'],
    ];

    public function mount()
    {
        $this->locale = app()->getLocale();
        $this->preparedInitData();
    }


    public function render()
    {
        return view('admin.components.header');
    }


    public function updatedLocale($value)
    {
        $this->locale = $value;
        $this->preparedInitData();
    }


    public function saveSetting()
    {
        $this->validate();

        if($this->locale){
            app()->setLocale($this->locale);
        }


        $setting = Setting::first();


        $setting->top_header_message_text = $this->top_header_message_text;
        $setting->top_header_button_text = $this->top_header_button_text;
        $setting->top_header_button_link = $this->top_header_button_link;
        $setting->middle_header_message_text = $this->middle_header_message_text;
        $setting->middle_header_message_text_link = $this->middle_header_message_text_link;
        $setting->main_header_message_text = $this->main_header_message_text;
        $setting->main_header_message_text_link = $this->main_header_message_text_link;


        if($setting && $this->new_logo){
            $setting->addMedia($this->new_logo)->toMediaCollection('logo');
        }

         
        if($setting->save())
        {
            $this->new_logo = null;
            $this->old_logo = $setting->logoUrl();

            return $this->success('Save', '');
        }

        return $this->error('Failed', 'Failed to save');
    }


    public function removeLogo()
    {
        $this->new_logo->delete();
        $this->new_logo = null;
    }


    private function preparedInitData()
    {
        
        if($this->locale){
            app()->setLocale($this->locale);
        }

        $setting = Setting::firstOrCreate();

        $this->top_header_message_text = $setting->top_header_message_text;
        $this->top_header_button_text = $setting->top_header_button_text;
        $this->top_header_button_link = $setting->top_header_button_link;
        $this->middle_header_message_text = $setting->middle_header_message_text;
        $this->middle_header_message_text_link = $setting->middle_header_message_text_link;
        $this->main_header_message_text = $setting->main_header_message_text;
        $this->main_header_message_text_link = $setting->main_header_message_text_link;
        $this->old_logo = $setting->logoUrl();

    }
}
