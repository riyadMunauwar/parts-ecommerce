<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\Discount as _Discount;
use App\Traits\WithSweetAlert;


class Discount extends Component
{
    use WithSweetAlert;

    public $discounts = [];
    public $isEditModeOn = false;
    public $discountId;

    // Form variable
    public $name;
    public $type = 'percentage';
    public $amount;
    public $description;


    protected $rules = [
        'name' => [
            'nullable',
            'string'
        ],
        'type' => [
            'required',
            'string'
        ],
        'amount' => [
            'required',
            'numeric'
        ],
        'description' => [
            'nullable',
            'string'
        ]
    ];


    protected $listeners = [
        'onDiscountDelete' => 'deleteDiscountHandeler',
    ];


    public function mount()
    {
        $this->preparedInitialData();
    }

    public function render()
    {
        return view('admin.components.discount');
    }


    public function createDiscount()
    {
        $this->validate();

        _Discount::create([
            'name' => $this->name,
            'type' => $this->type,
            'amount' => $this->amount,
            'description' => $this->description
        ]);

        $this->reset();

        $this->preparedInitialData();

        return $this->success('Created', 'Discount created successfully');
    }


    public function updateDiscount()
    {
        $this->validate();

        $discount = _Discount::find($this->discountId);

        $discount->name = $this->name;
        $discount->type = $this->type;
        $discount->amount = $this->amount;
        $discount->description = $this->description;

        if($discount->save()){
            $this->reset();
            $this->preparedInitialData();
            return $this->success('Updated', 'Discount updated successfully');
        }

        return $this->error('Failed', 'Failed to update. Try again');
    }


    public function confirmDeleteDiscount($id)
    {
        return $this->ifConfirmThenDispatch('onDiscountDelete', $id, 'Are you sure ?', 'Discount will delete permanently');
    }


    public function deleteDiscountHandeler($id)
    {
        if(_Discount::destroy($id)) {
            $this->reset();
            $this->preparedInitialData();
            return $this->success('Deleted', 'Discount deleted successfully');
        }

        return $this->error('Failed', 'Something went wrong ! try again');

    }


    public function enableDiscountEditMode($id)
    {
        $discount = _Discount::find($id);

        $this->discountId = $discount->id;
        $this->name = $discount->name;
        $this->type = $discount->type;
        $this->amount = $discount->amount;
        $this->description = $discount->description;

        $this->isEditModeOn = true;

    }

    public function cancelDiscountEditMode()
    {
        $this->reset();
        $this->preparedInitialData();
        $this->isEditModeOn = false;
    }


    private function preparedInitialData()
    {
        $this->discounts = _Discount::all();
    }
}
