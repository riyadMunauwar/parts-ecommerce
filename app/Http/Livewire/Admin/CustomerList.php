<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use Livewire\WithPagination;
use App\Traits\WithSweetAlert;
use App\Models\User as Customer;

class CustomerList extends Component
{
    use WithPagination;
    use WithSweetAlert;

    public $search;

    protected $listeners = [
        'onCustomerCreated' => '$refresh',
        'onCustomerUpdated' => '$refresh',
        'onDiscountAdded' => '$refresh',
        'onCustomerDelete' => 'deleteCustomer',
    ];


    public function render()
    {
        $customers = $this->getCustomers();

        return view('admin.components.customer-list', compact('customers'));
    }

    public function enableCustomerEditMode($id)
    {
        $this->emit('onCustomerEdit', $id);
    }


    public function openAddDiscountModal($id)
    {
        $this->emit('onAddDiscountModalShow', $id);
    }


    public function confirmDeleteCustomer($id)
    {
        return $this->ifConfirmThenDispatch('onCustomerDelete', $id, 'Are you sure ?', 'Customer will delete permanently !');
    }


    public function deleteCustomer($id)
    {
        try {

            $customer = Customer::find($id);

            if($customer->delete()){
                return $this->success('Success', 'Customer deleted successfully.');
            }

        }catch(\Exception $e){
            return $this->error('Failed', 'Failed to delete Customer. try again');
        }

    }


    private function getCustomers()
    {

        $search = $this->search;

        $query = Customer::query();

        $query->when($this->search, function($query) use($search){
            $query->where('name', 'like', '%' . $search . '%')
                  ->orWhere('name', $search)
                  ->orWhere('email', $search)
                  ->orWhere('email', 'like', '%' . $search . '%');
        });

        return $query->latest()->paginate(25);

    }
}
