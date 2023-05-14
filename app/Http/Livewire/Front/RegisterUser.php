<?php

namespace App\Http\Livewire\Front;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Traits\WithSweetAlertToast;
use App\Traits\WithSweetAlert;


class RegisterUser extends Component
{

    use WithSweetAlertToast;
    use WithSweetAlert;

    public $isRegisterModeOn = false;
    public $isAlreadyHaveAnAccount = false;

    public $name;
    public $email;
    public $password;
    public $confirm;


    protected $rules = [
        'name' => ['required', 'string', 'max:255'],
        'email' => ['required', 'email', 'unique:users', 'max:255'],
        'password' => ['required', 'string'],
        'confirm' => ['required', 'string'],
    ];

    protected $listeners = [
        'onRegisterMode' => 'enableRegisterMode',
        'onCancelRegisterMode' => 'cancelRegisterMode'
    ];

    public function render()
    {
        return view('front.components.register-user');
    }

    public function registerUser()
    {
        if($this->isAlreadyHaveAnAccount){
            return $this->loginUser();
        }else {
            return $this->createUser();
        }
    }


    private function createUser()
    {
        $this->validate();

        if($this->password !== $this->confirm){
            return $this->errorToast('Confirm Password Not Match!');
        }

        $user = User::create([
            'name' => $this->name,
            'email' => $this->email,
            'password' => Hash::make($this->password),
        ]);

        Auth::login($user);

        $this->cancelRegisterMode();
        return $this->emit('onPaymentMode');
    }


    private function loginUser()
    {
        $this->validate([
            'email' => ['required', 'email', 'max:255'],
            'password' => ['required', 'string'],
        ]);

        if (Auth::attempt(['email' => $this->email, 'password' => $this->password])) {
            $this->cancelRegisterMode();
            return $this->emit('onPaymentMode');
        } else {
            return $this->error('Credential not match!', '');
        }

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
