<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\Order;
use App\Traits\WithSweetAlert;
// use Barryvdh\DomPDF\Facade\Pdf;

class OrderDetail extends Component
{
    use WithSweetalert;

    public Order $order;
    public $orderSubtotalPrice = 0;

    protected $rules = [
        'order.parcel_weight' => ['numeric', 'required'],
        'order.parcel_height' => ['numeric', 'required'],
        'order.parcel_width' => ['numeric', 'required'],
        'order.parcel_length' => ['numeric', 'required'],
        'order.status' => ['string', 'required'],
    ];

    public function mount($orderId)
    {
        $this->order = Order::with('orderItems.product', 'address', 'user')->find($orderId);
        $this->calculateSubtotalPrice();
    }


    public function render()
    {
        return view('admin.components.order-detail');
    }

    public function updatedOrderStatus()
    {
        dd($this->status);;
    }

    public function updateOrder()
    {
        return $this->success('Updated', '');
    }

    public function changeStatus()
    {

    }

    public function downloadInvoice()
    {


        return redirect()->route('invoice', ['orderId' => $this->order->id]);
       
        // Below code not use right now

        try {
            $order = $this->order->toArray();
        
            $pdf = Pdf::loadView('invoices.invoice-template-5', compact('order'));
     
            return $pdf->download('billing-invoice');

        }catch(\Exception $e){
            dd($e->getMessage());
        }   

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
