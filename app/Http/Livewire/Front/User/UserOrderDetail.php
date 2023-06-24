<?php

namespace App\Http\Livewire\Front\User;

use Livewire\Component;
use App\Models\Order;
use App\Traits\WithSweetAlert;
// use Barryvdh\DomPDF\Facade\Pdf;

class UserOrderDetail extends Component
{
    use WithSweetalert;

    public Order $order;
    public $orderSubtotalPrice = 0;


    public function mount($orderId)
    {
        $this->order = Order::with('orderItems.product', 'address', 'user')->find($orderId);
        $this->calculateSubtotalPrice();
    }


    public function render()
    {
        return view('front.components.user.user-order-detail');
    }


    private function calculateSubtotalPrice()
    {
        $sum = 0;

        foreach($this->order->orderItems as $item){
            $sum += (float) $item->price * $item->qty;
        }

        $this->orderSubtotalPrice = $sum;
    }
}
