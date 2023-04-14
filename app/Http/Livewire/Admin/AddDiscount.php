<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\Discount;
use App\Traits\WithSweetAlert;
use App\Traits\WithSweetAlertToast;
use App\Models\User;

class AddDiscount extends Component
{
    use WithSweetAlert;
    use WithSweetAlertToast;

    public $is_add_discount_modal_show = false;

    public $is_custom = false;
    public $customer;
    public $discounts = [];

    public $amount;
    public $type = 'percentage';
    public $discount_id;



    protected $rules = [
        'amount' => ['required', 'numeric'],
        'type' => ['required', 'string'],
        'discount_id' => ['nullable'],
    ];


    protected $listeners = [
        'onAddDiscountModalShow' => 'showAddDiscountModal',
    ];


    public function render()
    {
        return view('admin.components.add-discount');
    }


    public function addDiscount()
    {
        $customer = User::find($this->customer->id);


        if($this->is_custom){

            $this->validate([
                'amount' => ['required', 'numeric'],
                'type' => ['required', 'string'],
            ]);

            $customer->discount_amount = $this->amount;
            $customer->discount_type = $this->type;

        }else {

            $discount = Discount::find($this->discount_id);

            if(!$discount) return $this->errorToast('You do not select discount');
            
            $customer->discount_amount = $discount->amount;
            $customer->discount_type = $discount->type;
        }
        
        if($customer->save())
        {
            $this->reset();
            $this->is_add_discount_modal_show = false; 
            $this->emit('onDiscountAdded');
            return $this->success('Added', 'Discount added successfully');
        }
        
        return $this->error('Failed', 'Discount added failed');

    }


    public function removeCurrentDiscount()
    {
        $customer = User::find($this->customer->id);

        if($customer){
            $customer->discount_type = null;
            $customer->discount_amount = null;

            if($customer->save())
            {
                $this->reset();
                $this->is_add_discount_modal_show = false; 
                $this->emit('onDiscountAdded');
                return $this->success('Removed', 'Discount removed successfully');
            }
        }
    }


    public function showAddDiscountModal($id)
    {
        $this->customer = User::find($id);
        $this->preparedInitData();

        $this->is_add_discount_modal_show = true;
    }

    public function cancelAddDiscount()
    {
        $this->reset();
        $this->is_add_discount_modal_show = false; 
    }


    private function preparedInitData()
    {
        $this->discounts = Discount::all();
    }

}
