<?php

namespace App\Http\Livewire\Front;

use Livewire\Component;
use Illuminate\Support\Facades\DB;
use Livewire\WithFileUploads;
use App\Traits\WithSweetAlert;
use App\Models\User;
use App\Models\Wholesaler;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class RegisterWholesaler extends Component
{
    use WithFileUploads;
    use WithSweetAlert;

    public $full_name;
    public $email;
    public $phone;
    public $address;

    public $business_name;
    public $business_email;
    public $business_contact_number;
    public $business_sales_tax;
    public $business_address;

    public $business_licence;
    public $business_tax_sales_certificate;

    public $password;
    public $password_confirm;

    public $terms_of_service;


    protected $rules = [

        'full_name' => ['required', 'string', 'max:255'],
        'email' => ['required', 'email', 'unique:users', 'max:255'],
        'phone' => ['required', 'string', 'unique:wholesalers', 'max:255'],
        'address' => ['required', 'string', 'max:255'],

        'business_name' => ['required', 'string', 'max:255'],
        'business_email' => ['required', 'email', 'unique:wholesalers', 'max:255'],
        'business_contact_number' => ['required', 'string', 'unique:wholesalers', 'max:255'],
        'business_sales_tax' => ['required', 'string', 'unique:wholesalers', 'max:255'],
        'business_address' => ['required', 'string', 'max:255'],

        'business_licence' => ['required', 'image', 'max:1024'],
        'business_tax_sales_certificate' => ['required', 'image', 'max:1024'],
        'terms_of_service' => ['required', 'boolean']

    ];

    public function render()
    {
        return view('front.components.register-wholesaler');
    }

    public function handleForm()
    {
        $this->validate();

     
        if(!$this->validateConfirmPassword()){
            return $this->error('Error', 'Confirm Password Not Match');
        }


        // if(!$this->validateUSAPhoneNumber()){
        //     return $this->error('Invalid Phone Number', 'Enter a valid USA phone number !');
        // }


        try {
            DB::transaction(function () {


                $user = new User();

                $user->name = $this->full_name;
                $user->email = $this->email;
                $user->password = Hash::make($this->password);


                $user->save();

                $wholesaler = new Wholesaler();

                $wholesaler->name = $this->full_name;
                $wholesaler->email = $this->email;
                $wholesaler->phone = $this->phone;
                $wholesaler->address = $this->address;
                $wholesaler->business_name = $this->business_name;
                $wholesaler->business_email = $this->business_email;
                $wholesaler->business_contact_number = $this->business_contact_number;
                $wholesaler->business_address = $this->business_address;
                $wholesaler->business_sales_tax = $this->business_sales_tax;
                $wholesaler->user_id = $user->id;

                if($wholesaler->save()){
                    $wholesaler->addMedia($this->business_licence)->toMediaCollection('business_licence');
                    $wholesaler->addMedia($this->business_tax_sales_certificate)->toMediaCollection('sales_tax_certificate');
                }

                $this->reset();

                
                Auth::login($user);

                return redirect()->route('user-dashboard');

                return $this->success('Success', 'Registration sucessfull');
                


            });
        } catch (\Exception $e) {
            return $this->error('Failed', 'Something went wrong. Try again later !' . $e->getMessage());
        }

        
    }

    public function revomeBusinessLicence()
    {
        $this->business_licence->delete();
        $this->business_licence = null;
    }

    public function removeTaxSalesCertificate ()
    {
        $this->business_tax_sales_certificate->delete();
        $this->business_tax_sales_certificate = null;
    }


    private function validateUSAPhoneNumber()
    {
        if(!$this->isUSAPhoneNumber($this->phone)) return false; 
        if(!$this->isUSAPhoneNumber($this->business_contact_number)) return false; 

        return true;
    }


    private function isUSAPhoneNumber($phoneNumber) {
        // Remove any non-digit characters from the phone number
        $phoneNumber = preg_replace('/[^0-9]/', '', $phoneNumber);
    
        // Check if the phone number is exactly 10 digits long
        if (strlen($phoneNumber) === 10) {
            // Validate the phone number pattern
            if (preg_match('/^(?:\+?1)?[2-9]\d{2}[2-9](?!11)\d{6}$/', $phoneNumber)) {
                return true; // Valid USA phone number
            }
        }
    
        return false; // Not a valid USA phone number
    }

    private function validateConfirmPassword()
    {
        if($this->password !== $this->password_confirm) return false;

        return true;
    }


}
