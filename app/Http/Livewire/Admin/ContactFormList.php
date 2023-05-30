<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use Livewire\WithPagination;
use App\Traits\WithSweetAlert;
use App\Models\ContactForm;

class ContactFormList extends Component
{
    use WithPagination;
    use WithSweetAlert;

    public $search;

    protected $listeners = [
        'onContactFormCreated' => '$refresh',
        'onContactFormUpdated' => '$refresh',
        'onContactFormDelete' => 'deleteContactForm',
    ];


    public function render()
    {
        $contactForms = $this->getContactForms();

        return view('admin.components.contact-form-list', compact('contactForms'));
    }


    public function confirmDeleteContactForm($id)
    {
        return $this->ifConfirmThenDispatch('onContactFormDelete', $id, 'Are you sure ?', 'ContactForm will delete permanently !');
    }


    public function deleteContactForm($id)
    {
        try {
            ContactForm::destroy($id);
            return $this->success('Success', 'ContactForm deleted successfully.');
        }catch(\Exception $e)
        {
            return $this->error('Failed', 'Failed to delete ContactForm. try again');
        }

    }


    private function getContactForms()
    {

        $search = $this->search;

        $query = ContactForm::query();

        $query->when($this->search, function($query) use($search){
            $query->where('first_name', 'like', '%' . $search . '%')
                  ->orWhere('first_name', $search)
                  ->orWhere('first_name', 'like', '%' . $search . '%')
                  ->orWhere('email', $search);
        });

        return $query->latest()->paginate(25);

    }
}
