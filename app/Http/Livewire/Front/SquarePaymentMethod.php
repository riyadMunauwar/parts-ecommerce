<?php

namespace App\Http\Livewire\Front;

use Livewire\Component;
// use Square\SquareClient;
// use Square\LocationApi;
// use Square\ApiResponse;
// use Square\Models\CreatePaymentRequest;
// use Square\Models\Money;
// use Square\Models\CreatePayment;
use Square\Environment;

use Square\SquareClient;
use Square\Models\CreatePaymentRequest;
use Square\Models\Money;
use Square\Exceptions\ApiException;

class SquarePaymentMethod extends Component
{
    public $isPaymentModeOn = true;

    public $selectedMethod;

    protected $listeners = [
        'onPaymentMode' => 'enablePaymentMode',
        'onPayment' => 'startPaymentProcess'
    ];

    public function render()
    {
        return view('front.components.square-payment-method');
    }


    public function updatedSelectedMethod($value)
    {
 
        if($value === 'card'){
            return $this->dispatchBrowserEvent('init:card');
        }

        if($value === 'google-pay'){
            return $this->dispatchBrowserEvent('init:google-pay');
        }

        if($value === 'apple-pay'){
            return $this->dispatchBrowserEvent('init:apple-pay');
        }

        if($value === 'ach'){
            return $this->dispatchBrowserEvent('init:ach');
        }

        if($value === 'gift-card'){
            return $this->dispatchBrowserEvent('init:gift-card');
        }
    }

    public function enablePaymentMode()
    {
        $this->isPaymentModeOn = true;
    }

    public function cancelPaymentMode()
    {
        $this->isPaymentModeOn = false;
    }

    public function back()
    {
        $this->selectedMethod = null;
    }




    public function startPaymentProcess($token){

        $square = new SquareClient([
            'accessToken' => config('square.access_token'),
            'environment' => Environment::SANDBOX,
        ]);

//    
        // $paymentApi = $square->getPaymentsApi();

        // $requestBody = new CreatePaymentRequest([
        //     'source_id' => $token,
        //     'amount_money' => [
        //         'amount' => 100, // replace with your amount
        //         'currency' => 'USD',
        //     ],
        //     'idempotency_key' => uniqid(),
        // ]);
        

        // try {

        //     $money = new Money();
        //     $money->setAmount(500);
        //     $money->setCurrency('USD');

        //     $requestBody = new CreatePaymentRequest($token, 123, $money);
          

        //     $response = $paymentApi->createPayment($requestBody);

        //     dd($response->isSuccess);
            
        // } catch (\Square\Exceptions\ApiException $e) {
        //     dd($e->getMessage());            
        // } catch (\Exception $e) {
        //     dd($e->getMessage());
        // }

        
        // $request_body = new CreatePaymentRequest([
        //     'source_id' => $token,
        //     'amount_money' => [
        //         'amount' => 100, // replace with your amount
        //         'currency' => 'USD',
        //     ],
        //     'idempotency_key' => uniqid(),
        // ]);
        
        // $money = new Money([
        //     'amount_money' => [
        //         'amount' => 500,
        //         'currency' => 'USD',
        //     ]
        // ]);
        $money = new Money();
        $money->setAmount(10*50);
        $money->setCurrency("USD");
        
        $request_body = new CreatePaymentRequest($token, uniqid(), $money);
        
        try {
            $response = $square->getPaymentsApi()->createPayment($request_body);
            // handle success response
            dd($response->getResult());
        } catch (ApiException $e) {
            // handle error response
            echo $e->getMessage();
        }
    }
}
