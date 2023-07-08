<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use Livewire\WithPagination;
use App\Traits\WithSweetAlert;
use Spatie\Permission\Models\Role;
use App\Models\Wholesaler;
use App\Models\User;

class WholesalerList extends Component
{
    use WithPagination;
    use WithSweetAlert;

    public $search;

    protected $listeners = [
        'onWholesalerCreated' => '$refresh',
        'onWholesalerUpdated' => '$refresh',
        'onWholesalerDelete' => 'deleteWholesaler',
    ];

    public function render()
    {
        $wholesalers = $this->getWholesalers();

        return view('admin.components.wholesaler-list', compact('wholesalers'));
    }



    public function toggleActivated($id)
    {
        $wholesaler = Wholesaler::find($id);


        if($wholesaler->is_active){

            $wholesaler->is_active = false;
            $wholesaler->save();

            $user = User::find($wholesaler->user_id);

            $user->syncRoles('user');

            $this->emit('onWholesalerUpdated');

            return $this->success('Wholesaler Canceled !', '');

        }else {

            $wholesaler->is_active = true;
            $wholesaler->save();

            $user = User::find($wholesaler->user_id);

            $user->syncRoles('wholesaler');

            $this->emit('onWholesalerUpdated');

            return $this->success('Wholesaler Confirmed !', '');
        }

        return $this->error('Failed to Confirm !', '');

    }


    public function confirmDeleteWholesaler($id)
    {
        return $this->ifConfirmThenDispatch('onWholesalerDelete', $id, 'Are you sure ?', 'Wholesaler will delete permanently !');
    }


    public function deleteWholesaler($id)
    {
        try {

            $wholesaler = Wholesaler::find($id);

            if($wholesaler->delete()){
                return $this->success('Success', 'Wholesaler deleted successfully.');
            }

        }catch(\Exception $e){
            return $this->error('Failed', 'Failed to delete Wholesaler. try again');
        }

    }


    private function getWholesalers()
    {

        $search = $this->search;

        $query = Wholesaler::query();

        $query->when($this->search, function($query) use($search){
            $query->where('name', 'like', '%' . $search . '%')
                  ->orWhere('name', $search)
                  ->orWhere('email', $search)
                  ->orWhere('email', 'like', '%' . $search . '%');
        });

        return $query->latest()->paginate(25);

    }



}
