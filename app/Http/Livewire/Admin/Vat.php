<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\Vat as VatModel;
use App\Traits\WithSweetAlert;

class Vat extends Component
{
    use WithSweetAlert;

    public $vat_rate;
    public $vats = [];
    public $isEditModeOn = false;
    public $vatId;

    protected $rules = [
        'vat_rate' => ['required', 'numeric'],
    ];



    public function mount()
    {
        $this->vats = VatModel::all();
    }


    public function render()
    {
        return view('.admin.components.vat');
    }


    public function createVatHandeler()
    {
        $this->validate();
        
        $isCreate = VatModel::create([
                        'vat_rate' => $this->vat_rate
                    ]);

        if($isCreate){
            $this->reset();
            $this->vats = VatModel::all();
            return $this->success('Success', 'Vat created');
        }

        return $this->error('Failed', 'Something went wrong ! try again');
    }


    public function updateVatHandeler()
    {
        VatModel::find($this->vatId)->update(['vat_rate' => $this->vat_rate]);
        $this->reset();
        $this->vats = VatModel::all();
        return $this->success('Updated', 'Vat updated successfully');
    }


    public function deleteVat($id)
    {
        if(VatModel::destroy($id)){
            $this->vats = VatModel::all();
            return $this->success('Deleted', 'Vat deleted successfully');
        }

        return $this->error('Failed', 'Something went wrong try again !!!');
    }


    public function cancelEditMode()
    {
        $this->vat_rate = '';
        $this->toggleEditMode();
    }

    public function enableEditMode($id)
    {
        
        $vat = VatModel::find($id);
        $this->vatId = $vat->id;
        $this->vat_rate = $vat->vat_rate;
        $this->isEditModeOn = true;

    }

    private function toggleEditMode()
    {
        $this->isEditModeOn = !$this->isEditModeOn;
    }
}
