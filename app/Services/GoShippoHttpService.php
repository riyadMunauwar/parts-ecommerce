<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;

class GoShippoHttpService
{
    protected $apiUrl;
    protected $apiKey;

    public function __construct()
    {
        $this->apiUrl = config('shippo.api_url');
        $this->apiKey = config('shippo.api_key');
    }

    public function createAddress($data)
    {
        $requestDataSchema = [
            'name' => '',
            'company' => '',
            'street1' => '',
            'street2' => '',
            'street3' => '',
            'city' => '',
            'state' => '',
            'zip' => '',
            'country' => 'US',
            'phone' => '',
            'email' => '',
            'validate' => true,
            'object_purpose' => 'Purchase',
        ];

        $requestData = array_merge($requestDataSchema, $data);

        $response = Http::withHeaders($this->getHeaders())
            ->post($this->apiUrl . '/addresses/', $requestData);

        return $this->handleResponse($response);
    }

    public function validateAddress($addressId)
    {
        $response = Http::withHeaders($this->getHeaders())
            ->get($this->apiUrl . '/addresses/' . $addressId . '/validate/');

        return $this->handleResponse($response);
    }

    public function createParcel($data)
    {
        $response = Http::withHeaders($this->getHeaders())
            ->post($this->apiUrl . '/parcels/', $data);

        return $this->handleResponse($response);
    }

    public function createShipmentAndGetRates($parcel, $addresses)
    {

        $parcelSchema = [
                'height' => 0,
                'weight' => 0,
                'length' => 0,
                'distance_unit' => 'in',
                'mass_unit' => 'lb',
        ];

        $finalParcel = array_merge($parcelSchema, $parcel);
        

        $requestData = [
            'parcels' => [
                $finalParcel,
            ],
            'address_from' => $addresses['address_from'],
            'address_to' => $addresses['address_to'],
            'object_purpose' => 'Purchase',
            'async' => false,
            'shippment_date' => now(),
        ];


        $response = Http::withHeaders($this->getHeaders())
            ->post($this->apiUrl . '/shipments/', $requestData);

        return $this->handleResponse($response);
    }

    public function createLabel($data)
    {

        $requestDataSchema = [
            'rate' => '',
            'async' => false,
            'label_file_type' => config('shippo.label_file_type'),
            'meta_data' => '',
        ];

        $requestData = array_merge($requestDataSchema, $data);

        $response = Http::withHeaders($this->getHeaders())
            ->post($this->apiUrl . '/transactions/', $requestData);

        return $this->handleResponse($response);
    }

    protected function getHeaders()
    {
        return [
            'Authorization' => 'ShippoToken ' . $this->apiKey,
            'Content-Type' => 'application/json',
        ];
    }

    protected function handleResponse($response)
    {
        try {
            $response->throw();
            return [
                'success' => true,
                'data' => $response->json(),
            ];
        } catch (\Exception $e) {
            return [
                'success' => false,
                'message' => $e->getMessage(),
            ];
        }
    }
}

