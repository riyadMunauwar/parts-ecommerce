<?php

namespace App\Listeners;

use App\Events\OnSettingUpdated;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use App\Models\Setting;
use Illuminate\Support\Facades\Validator;
use App\Services\GoShippoHttpService;


class CreateShippoPickupAddress
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
      
    }

    /**
     * Handle the event.
     *
     * @param  \App\Events\OnSettingUpdated  $event
     * @return void
     */
    public function handle(OnSettingUpdated $event)
    {
        $setting = $event->setting;

        $address = [
            'company_owner_name' => $setting->company_owner_name,
            'company_name' => $setting->company_name,
            'street_no' => $setting->street_no,
            'street_1' => $setting->street_1,
            'street_2' => $setting->street_2,
            'street_3' => $setting->street_3,
            'city' => $setting->city,
            'state' => $setting->state,
            'zip' => $setting->zip,
            'country' => $setting->country,
            'email' => $setting->email,
            'phone' => $setting->phone,
        ];

        $validator = Validator::make($address, [
            'company_owner_name' => ['nullable', 'string'],
            'company_name' => ['nullable', 'string'],
            'street_no' => ['nullable', 'string'],
            'street_1' => ['required', 'string'],
            'street_2' => ['nullable', 'string'],
            'street_3' => ['nullable', 'string'],
            'city' => ['required', 'string'],
            'state' => ['required', 'string'],
            'zip' => ['required', 'string'],
            'country' => ['required', 'string'],
            'email' => ['required', 'email'],
            'phone' => ['nullable', 'string'],
        ]);

     
        if($validator->fails()){
            $setting->shippo_address_object_id = null;
            $setting->save();
            return;
        }

        try {
            
            $shippo = new GoShippoHttpService();

            $response = $shippo->createAddress([
                'name' => $setting->company_owner_name,
                'company' => $setting->company_name,
                'street1' => $setting->street_1,
                'street2' => $setting->street_1,
                'city' => $setting->city,
                'state' => $setting->state,
                'zip' => $setting->zip,
                'country' => $setting->country,
                'phone' => $setting->phone,
                'email' => $setting->email,
            ]);

            
            if(!$response['data']['validation_results']['is_valid']){
                $setting->shippo_address_object_id = null;
                $setting->save();
                return;
            }


            $pickAddress = $response['data'];

            $setting->shippo_address_object_id = $pickAddress['object_id'];
            $setting->company_owner_name = $pickAddress['name'];
            $setting->company_name = $pickAddress['company'];
            $setting->street_no = $pickAddress['street_no'];
            $setting->street_1 = $pickAddress['street1'];
            $setting->street_2 = $pickAddress['street2'];
            $setting->street_3 = $pickAddress['street3'];
            $setting->city = $pickAddress['city'];
            $setting->state = $pickAddress['state'];
            $setting->zip = $pickAddress['zip'];
            $setting->country = $pickAddress['country'];
            $setting->email = $pickAddress['email'];
            $setting->phone = $pickAddress['phone'];

            $setting->save();


        }catch(\Exception $e){
            $setting->shippo_address_object_id = null;
            $setting->save();
        }
    }
}
