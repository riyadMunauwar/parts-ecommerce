<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App;

class LocalizationSwitching extends Component
{
    public $locale;
    public $payload;

    public function mount($payload)
    {
        $this->locale = app()->getLocale();
        $this->payload = $payload;
    }

    public function render()
    {
        return view('admin.components.localization-switching');
    }

    public function updatedLocale($localeValue)
    {
        if($localeValue === 'en' || $localeValue === 'es'){
            $this->emit('onLocaleChange', $this->payload, $localeValue);
        }
    }

}
