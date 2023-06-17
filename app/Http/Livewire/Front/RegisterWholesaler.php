<?php

namespace App\Http\Livewire\Front;

use Livewire\Component;
use Livewire\WithFileUploads;
use App\Traits\WithSweetAlert;


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

        'business_licence' => ['required', 'mimes:pdf,png,jpg,jpeg', 'max:1024'],
        'business_tax_sales_certificate' => ['required', 'mimes:pdf,png,jpg,jpeg', 'max:1024'],
        
    ];

    public function render()
    {
        return view('front.components.register-wholesaler');
    }
}
