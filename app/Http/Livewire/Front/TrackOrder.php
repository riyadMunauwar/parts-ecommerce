<?php

namespace App\Http\Livewire\Front;

use Livewire\Component;
use App\Traits\WithSweetAlert;
use App\Models\Order;

class TrackOrder extends Component
{
    use WithSweetAlert;

    public $order_id;

    protected $rules = [
        'order_id' => ['required', 'integer']
    ];

    public function render()
    {
        return view('front.components.track-order');
    }

    public function trackOrder()
    {
        $this->validate();

        $order = Order::find($this->order_id);


        if(!$order) return $this->error('Invalid Order ID', '');


        return redirect()->away($order->tracking_url);
        
    }
}
