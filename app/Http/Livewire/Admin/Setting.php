<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use Livewire\WithFileUploads;
use App\Models\Setting as _Setting;
use App\Traits\WithSweetAlert;

class Setting extends Component
{
    use WithFileUploads;
    use WithSweetAlert;


    public $website_name;
    public $website_email;
    public $website_phone;
    public $meta_title;
    public $meta_tags;
    public $meta_description;

    public $new_favicon;
    public $old_favicon;

    public $setting;


    protected $rules = [
        'website_name' => ['nullable', 'string'],
        'website_email' => ['nullable', 'email'],
        'website_phone' => ['nullable', 'string'],
        'meta_title' => ['nullable', 'string'],
        'meta_tags' => ['nullable', 'string'],
        'meta_description' => ['nullable', 'string'],
        'new_favicon' => ['nullable', 'image']
    ];

    public function mount()
    {
        $this->preparedInitData();
    }

    public function render()
    {
        return view('admin.components.setting');
    }

    public function saveSetting()
    {
        
        $this->validate();

        $setting = _Setting::first();


        $setting->website_name = $this->website_name;
        $setting->website_email = $this->website_email;
        $setting->website_phone = $this->website_phone;
        $setting->meta_title = $this->meta_title;
        $setting->meta_tags = $this->meta_tags;
        $setting->meta_description = $this->meta_description;

        if($setting && $this->new_favicon){
            $setting->addMedia($this->new_favicon)->toMediaCollection('favicon');
        }

        if($setting->save())
        {
            $this->new_favicon = null;
            $this->old_favicon = $setting->faviconUrl();

            return $this->success('Saved', '');
        }

        return $this->error('Saved failed', '');
    }

    public function removeFavicon()
    {
        $this->new_favicon->delete();
        $this->new_favicon = null;
    }

    private function preparedInitData()
    {
        $setting = _Setting::firstOrCreate();

        $this->website_name = $setting->website_name;
        $this->website_email = $setting->website_email;
        $this->website_phone = $setting->website_phone;
        $this->meta_title = $setting->meta_title;
        $this->meta_tags = $setting->meta_tags;
        $this->meta_description = $setting->meta_description;

        $this->old_favicon = $setting->faviconUrl();
    }
}
