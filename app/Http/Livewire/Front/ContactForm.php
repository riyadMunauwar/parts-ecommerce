<?php

namespace App\Http\Livewire\Front;

use Livewire\Component;
use App\Models\ContactForm as _ContactForm;
use App\Traits\WithSweetAlertToast;
use App\Traits\WithSweetAlert;
use App\Models\SocialLink;

class ContactForm extends Component
{
    use WithSweetAlert;
    use WithSweetAlertToast;

    public $first_name;
    public $email;
    public $message;

    public $socialLinks = [];

    protected $rules = [
        'first_name' => ['required', 'string', 'max:255'],
        'email' => ['required', 'email', 'max:255'],
        'message' => ['required', 'string', 'max:2500'],
    ];

    public function mount()
    {
        $this->socialLinks = SocialLink::whereNotNull('is_published')->get();
    }

    public function render()
    {
        return view('front.components.contact-form');
    }


    public function sendMessage()
    {
        $this->validate();

        $contactForm = new _ContactForm();

        $contactForm->first_name = $this->first_name;
        $contactForm->email = $this->email;
        $contactForm->message = $this->message;

        if($contactForm->save()){
            $this->reset();
            return $this->success('Thank You !', 'We have recieved your message');
        }

        return $this->error('Failed', 'Something went wrong ! Try again.');
    }
}
