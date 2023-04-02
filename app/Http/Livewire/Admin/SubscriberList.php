<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use Livewire\WithPagination;
use App\Traits\WithSweetAlert;
use App\Models\Subscriber;

class SubscriberList extends Component
{

    use WithSweetAlert;
    use WithPagination;

    public $search = '';

    protected $listeners = [
        'onSubscriberDelete' => 'deleteSubscriberHandeler'
    ];

    public function render()
    {
        $query = Subscriber::query();

        $query->where('email', 'like', '%' . $this->search . '%');

        $subscribers = $query->paginate(25);

        return view('admin.components.subscriber-list', compact('subscribers'));
    }

    public function confirmDeleteSubscriber($id)
    {
        return $this->ifConfirmThenDispatch('onSubscriberDelete', $id, 'Are you sure ?', 'Subscriber will delete permanently');
    }

    public function deleteSubscriberHandeler($id)
    {
        if(Subscriber::destroy($id)){
            return $this->success('Success', 'Subscriber deleted successfully');
        }

        return $this->error('Failed', 'Something went wrong. Try again !');
    }
}
