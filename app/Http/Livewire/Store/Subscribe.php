<?php

namespace App\Http\Livewire\Store;

use Livewire\Component;
use App\Models\Subscriber;
use App\Traits\WithSweetAlert;
use App\Traits\WithSweetAlertToast;

class Subscribe extends Component
{
    use WithSweetAlert;
    use WithSweetAlertToast;

    public $email;
    
    public function render()
    {
        return view('front.components.subscribe');
    }

    public function addNewSubscriber()
    {
        if(!$this->email){
            return $this->infoToast(__('Email is empty !'));
        }

        if(!$this->isValidEmail($this->email)){
            return $this->errorToast(__('Invalid Email'));
        }

        if(Subscriber::where('email', $this->email)->exists()){
            return $this->infoToast(__('This email already subscribe'));
        }

        $subscriber = new Subscriber();
        $subscriber->email = $this->email;

        if($subscriber->save()){
            $this->reset();
            return $this->successToast('Thank You ! Subscription done');
        }

        return $this->errorToast('Something went wrong');

    }

    private function isValidEmail($email) {
        return filter_var($email, FILTER_VALIDATE_EMAIL) !== false;
      }
}
