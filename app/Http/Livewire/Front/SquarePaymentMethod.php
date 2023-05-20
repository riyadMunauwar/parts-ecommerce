<?php

namespace App\Http\Livewire\Front;

use Livewire\Component;

class SquarePaymentMethod extends Component
{
    public $isPaymentModeOn = true;

    public $selectedMethod;

    protected $listeners = [
        'onPaymentMode' => 'enablePaymentMode',
        'onPayment' => 'startPaymentProcess'
    ];

    public function render()
    {
        return view('front.components.square-payment-method');
    }


    public function updatedSelectedMethod($value)
    {
 
        if($value === 'card'){
            return $this->dispatchBrowserEvent('init:card');
        }

        if($value === 'google-pay'){
            return $this->dispatchBrowserEvent('init:google-pay');
        }

        if($value === 'apple-pay'){
            return $this->dispatchBrowserEvent('init:apple-pay');
        }

        if($value === 'ach'){
            return $this->dispatchBrowserEvent('init:ach');
        }

        if($value === 'gift-card'){
            return $this->dispatchBrowserEvent('init:gift-card');
        }
    }

    public function enablePaymentMode()
    {
        $this->isPaymentModeOn = true;
    }

    public function cancelPaymentMode()
    {
        $this->isPaymentModeOn = false;
    }

    public function back()
    {
        $this->selectedMethod = null;
    }




    public function startPaymentProcess($token){
        dd($token);
    }
}
