<?php

namespace App\Http\Livewire\Front\User;

use Livewire\Component;
use App\Traits\WithSweetAlert;
use App\Models\Order;
use App\Models\Refund;


class ReturnApply extends Component
{
    use WithSweetalert;

    public $orderId;

    public $reason;

    protected $rules = [
        'reason' => ['string', 'required']
    ];


    public function mount()
    {
        $this->orderId = request()->orderId;
    }

    public function render()
    {
        return view('front.components.user.return-apply');
    }

    public function handleSubmit()
    {
        $this->validate();

        $order = Order::find($this->orderId);

        if(!$order){
            return $this->error('Invalid Order Id', '');
        }

        if(!$order->order_date->diffInDays() <= 7){
            return $this->error('7 Days Exceed !', 'You can not return this order.');
        }

        $isApply = Refund::where('order_id', $this->orderId)->exists();

        if($isApply){
            return $this->error('Already applied for return', '');
        }


        $refund = new Refund();

        $refund->user_id = auth()->user()->id;
        $refund->order_id = $this->orderId;
        $refund->reason = $this->reason;

        $refund->save();
        
        return $this->success('Return Request Submited !', '');

    }



}
