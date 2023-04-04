<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\Coupon as _Coupon;
use App\Traits\WithSweetAlert;

class Coupon extends Component
{
    use WithSweetAlert;

    public $coupons = [];
    public $isEditModeOn = false;
    public $couponId;

    // Form variable
    public $name;
    public $code;
    public $type = 'percentage';
    public $amount;
    public $startAt;
    public $endAt;
    public $description;
    public $isPublished = true;


    protected $rules = [
        'name' => [
            'nullable',
            'string'
        ],
        'code' => [
            'required',
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
        'startAt' => [
            'required',
            'date_format:Y-m-d'
        ],
        'endAt' => [
            'required',
            'date_format:Y-m-d'
        ],
        'description' => [
            'nullable',
            'string'
        ]
    ];


    protected $listeners = [
        'onCouponDelete' => 'deleteCouponHandeler',
    ];


    public function mount()
    {
        $this->preparedInitialData();
    }

    public function render()
    {
        return view('admin.components.coupon');
    }

    public function createCoupon()
    {
        $this->validate();

        _Coupon::create([
            'name' => $this->name,
            'code' => $this->code,
            'type' => $this->type,
            'amount' => $this->amount,
            'start_at' => $this->startAt,
            'end_at' => $this->endAt,
            'description' => $this->description,
            'is_published' => $this->isPublished
        ]);

        $this->reset();

        $this->preparedInitialData();

        return $this->success('Created', 'Coupon created successfully');
    }


    public function updateCoupon()
    {
        $this->validate();

        $coupon = _Coupon::find($this->couponId);

        $coupon->name = $this->name;
        $coupon->type = $this->type;
        $coupon->code = $this->code;
        $coupon->amount = $this->amount;
        $coupon->start_at = $this->startAt;
        $coupon->end_at = $this->endAt;
        $coupon->description = $this->description;
        $coupon->is_published = $this->isPublished;

        if($coupon->save()){
            $this->reset();
            $this->preparedInitialData();
            return $this->success('Updated', 'Coupon updated successfully');
        }

        return $this->error('Failed', 'Failed to update. Try again');
    }


    public function confirmDeleteCoupon($id)
    {
        return $this->ifConfirmThenDispatch('onCouponDelete', $id, 'Are you sure ?', 'coupon will delete permanently');
    }


    public function deleteCouponHandeler($id)
    {
        if(_Coupon::destroy($id)) {
            $this->reset();
            $this->preparedInitialData();
            return $this->success('Deleted', 'Coupon deleted successfully');
        }

        return $this->error('Failed', 'Something went wrong ! try again');

    }


    public function enableCouponEditMode($id)
    {
        $coupon = _Coupon::find($id);

        $this->couponId = $coupon->id;
        $this->name = $coupon->name;
        $this->code = $coupon->code;
        $this->type = $coupon->type;
        $this->amount = $coupon->amount;
        $this->startAt = $coupon->start_at->format('Y-m-d');
        $this->endAt = $coupon->end_at->format('Y-m-d');;
        $this->description = $coupon->description;
        $this->isPublished = $coupon->is_published;


        $this->isEditModeOn = true;

    }

    public function cancelCouponEditMode()
    {
        $this->reset();
        $this->preparedInitialData();
        $this->isEditModeOn = false;
    }


    private function preparedInitialData()
    {
        $this->coupons = _Coupon::all();
    }
}
