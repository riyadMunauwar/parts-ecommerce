<?php

namespace App\Http\Livewire\Front;

use Livewire\Component;

class RegisterUser extends Component
{
    public $isRegisterModeOn = true;
    public $isAlreadyHaveAnAccount = false;

    public $name;
    public $email;
    public $password;
    public $confirm;


    protected $rules = [
        'name' => ['required', 'string', 'max:255'],
        'email' => ['required', 'email', 'uniqe:users', 'max:255'],
        'email' => ['required', 'string'],
    ];

    protected $listeners = [
        'onRegisterMode' => 'enableRegisterMode',
    ];

    public function render()
    {
        return view('front.components.register-user');
    }

    public function registerUser()
    {
        $this->validate();
    }

    public function cancelRegisterMode()
    {
        $this->reset();
        $this->isRegisterModeOn = false;
    }

    public function enableRegisterMode()
    {
        $this->isRegisterModeOn = true;
    }

    public function toggleAlreadyHaveAccountMode()
    {
        $this->isAlreadyHaveAnAccount = ! $this->isAlreadyHaveAnAccount;
    }
}
