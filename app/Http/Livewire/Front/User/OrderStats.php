<?php

namespace App\Http\Livewire\Front\User;

use Livewire\Component;
use App\Models\Order;


class OrderStats extends Component
{

    public $totalOrderPlaced = 0;
    public $totalAmountSpent = 0;
    public $totalAmountDue = 0;

    public function mount()
    {
        $this->totalOrderPlaced = Order::where('user_id', auth()->id())->count();
        $this->totalAmountSpent = Order::where('user_id', auth()->id())->sum('total_product_price');
    }

    public function render()
    {
        return view('front.components.user.order-stats');
    }
}
