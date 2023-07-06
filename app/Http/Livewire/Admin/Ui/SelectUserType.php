<?php

namespace App\Http\Livewire\Admin\Ui;

use Livewire\Component;
use Spatie\Permission\Models\Role;
use App\Models\User as Customer;
use App\Traits\WithSweetAlert;

class SelectUserType extends Component
{
    use WithSweetAlert;

    public $userRole;
    public $customerId;

    public function mount($customerId)
    {
        $this->customerId = $customerId;
    }

    public function render()
    {
        return view('admin.components.ui.select-user-type');
    }

    public function updatedUserRole($userRole)
    {
        $idAndRole = $this->parseInputString(trim($userRole));

        $userId = $idAndRole['id'];

        $roleName = $idAndRole['role'];

        $user = Customer::find($userId);

        $user->syncRoles($roleName);

        return $this->success('Role Updated', '');
    }

    private function parseInputString($input)
    {
        $data = explode('|', $input);
        
        $id = isset($data[0]) ? (int) $data[0] : null;
        $role = isset($data[1]) ? $data[1] : null;
        
        return [
            'id' => $id,
            'role' => $role,
        ];
    }
}
