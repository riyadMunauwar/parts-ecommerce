<?php

namespace App\Http\Livewire\Front\User;

use Livewire\Component;
use Livewire\WithPagination;
use App\Traits\WithSweetAlert;
use App\Models\Order;


class UserOrderList extends Component
{
    use WithPagination;
    use WithSweetAlert;

    public $search;
    public $from_date;
    public $to_date;

    protected $listeners = [
        'onOrderCreated' => '$refresh',
        'onOrderUpdated' => '$refresh',
        'onVariationDeleted' => '$refresh',
        'onOrderDelete' => 'deleteOrder',
    ];


    public function render()
    {
        $orders = $this->getOrders();

        return view('front.components.user.user-order-list', compact('orders'));
    }

    public function enableOrderEditMode($id)
    {
        $this->emit('onOrderEdit', $id);
    }


    public function showVariationList($id)
    {
        $this->emit('onVariatioShow', $id);
    }


    public function enableAddStockModal($id)
    {
        $this->emit('onAddStockModalShow', $id);
    }


    public function confirmDeleteOrder($id)
    {
        return $this->ifConfirmThenDispatch('onOrderDelete', $id, 'Are you sure ?', 'Order will delete permanently !');
    }


    public function deleteOrder($id)
    {
        try {

            $Order = Order::find($id);

            foreach($Order->orderItems as $orderItem)
            {
                $orderItem->delete();
            }

            if($Order->delete()){
                return $this->success('Success', 'Order deleted successfully.');
            }

        }catch(\Exception $e)
        {
            return $this->error('Failed', $e->getMessage());
        }

    }


    private function getOrders()
    {

        $search = $this->search;
        $from_date = $this->from_date;
        $to_date = $this->to_date;

        $query = Order::where('user_id', auth()->id());

        $query->when($this->search, function($query) use($search){
            $query->withWhereHas('user', function($query) use($search){
                $query->where('name', 'like', '%' . $search . '%')
                      ->orWhere('name', $search)
                      ->orWhere('email', 'like', '%' . $search . '%')
                      ->orWhere('email', $search);
            });
        });


        $query->when($this->from_date && $this->to_date, function($query) use($from_date, $to_date){
            $query->whereBetween('order_date', [$from_date, $to_date]);
        });



        return $query->with('orderItems', 'user')->withCount('orderItems')->latest()->paginate(50);

    }
}
