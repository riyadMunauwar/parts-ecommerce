<?php

namespace App\Http\Livewire\Front;

use Livewire\Component;

class SquarePaymentMethod extends Component
{
    public $isPaymentModeOn = true;

    protected $listeners = [
        'onPaymentMode' => 'enablePaymentMode',
    ];

    public function render()
    {
        return view('front.components.square-payment-method');
    }

    public function enablePaymentMode()
    {
        $this->isPaymentModeOn = true;
    }

    public function cancelPaymentMode()
    {
        $this->isPaymentModeOn = false;
    }
}
