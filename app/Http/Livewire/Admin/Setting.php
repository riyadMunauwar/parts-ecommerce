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

    public $locale;

    public $company_name;
    public $company_owner_name;
    public $street_no;
    public $street_1;
    public $street_2;
    public $street_3;
    public $city;
    public $state;
    public $zip;
    public $country;
    public $email;
    public $phone;
    public $meta_title;
    public $meta_tags;
    public $meta_description;

    public $new_favicon;
    public $old_favicon;

    public $setting;


    protected $rules = [
        'company_name' => ['nullable', 'string', 'max:255'],
        'company_owner_name' => ['nullable', 'string', 'max:255'],
        'street_no' => ['nullable', 'string', 'max:55'],
        'street_1' => ['nullable', 'string', 'max:255'],
        'street_2' => ['nullable', 'string', 'max:255'],
        'street_3' => ['nullable', 'string', 'max:255'],
        'city' => ['nullable', 'string', 'max:120'],
        'state' => ['nullable', 'string', 'max:120'],
        'zip' => ['nullable', 'string', 'max:55'],
        'country' => ['nullable', 'string', 'max:125'],
        'email' => ['nullable', 'email', 'max:255'],
        'phone' => ['nullable', 'string', 'max:17'],
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

    public function updatedLocale($localeValue)
    {
        $this->preparedInitData($localeValue);
    }

    public function saveSetting()
    {
        
        $this->validate();

        if($this->locale)
        {
            app()->setLocale($this->locale);
        }

        $setting = _Setting::first();


        $setting->company_name = $this->company_name;
        $setting->company_owner_name = $this->company_owner_name;
        $setting->street_no = $this->street_no;
        $setting->street_1 = $this->street_1;
        $setting->street_2 = $this->street_2;
        $setting->street_3 = $this->street_3;
        $setting->city = $this->city;
        $setting->zip = $this->zip;
        $setting->state = $this->state;
        $setting->country = $this->country;
        $setting->email = $this->email;
        $setting->phone = $this->phone;
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

    private function preparedInitData($locale = null)
    {

        if($locale)
        {
           $this->locale =$locale; 
        }else {
            $this->locale = app()->getLocale();
        }

        if($this->locale)
        {
            app()->setLocale($this->locale);
        }

        $setting = _Setting::firstOrCreate();

        $this->company_name = $setting->company_name;
        $this->company_owner_name = $setting->company_owner_name;
        $this->street_no = $setting->street_no;
        $this->street_1 = $setting->street_1;
        $this->street_2 = $setting->street_2;
        $this->street_3 = $setting->street_3;
        $this->city = $setting->city;
        $this->zip = $setting->zip;
        $this->state = $setting->state;
        $this->country = $setting->country;
        $this->email = $setting->email;
        $this->phone = $setting->phone;
        $this->meta_title = $setting->meta_title;
        $this->meta_tags = $setting->meta_tags;
        $this->meta_description = $setting->meta_description;

        $this->old_favicon = $setting->faviconUrl();
    }
}
