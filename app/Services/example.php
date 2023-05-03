<?php 
// Use case

use App\Services\GoShippoService;

$shippo = new GoShippoService();

// Create address
$address = $shippo->createAddress([
    'name' => 'John Doe',
    'company' => 'Acme Inc.',
    'street1' => '123 Main St',
    'city' => 'Los Angeles',
    'state' => 'CA',
    'zip' => '90001',
    'country' => 'US',
    'phone' => '+1 555 1234',
    'email' => 'john@example.com',
]);

if (!$address['success']) {
    // Handle error
    $errorMessage = $address['message'];
} else {
    // Address created successfully, validate it
    $validatedAddress = $shippo->validateAddress($address['data']['object_id']);

    if (!$validatedAddress['success']) {
        // Handle error
        $errorMessage = $validatedAddress['message'];
    } else {
        // Address validated successfully, create parcel
        $parcel = $shippo->createParcel([
            'length' => '5',
            'width' => '5',
            'height' => '5',
            'distance_unit' => 'in',
            'weight' => '10',
            'mass_unit' => 'lb',
        ]);

        if (!$parcel['success']) {
            // Handle error
            $errorMessage = $parcel['message'];
        } else {
            // Parcel created successfully, get shipping rates
            $shippingRates = $shippo->getShippingRates([
                'address_from' => $address['data']['object_id'],
                'address_to' => 'MILAN',
                'parcel' => $parcel['data']['object_id'],
                'currency' => 'USD',
            ]);

            if (!$shippingRates['success']) {
                // Handle error
                $errorMessage = $shippingRates['message'];
            } else {
                // Shipping rates retrieved successfully, create shipment and purchase label
                $shipment = $shippingRates['data']['results'][0]['shipment'];

                $label = $shippo->createLabel($shipment['object_id']);

                if (!$label['success']) {
                    // Handle error
                    $errorMessage = $label['message'];
                } else {
                    // Label created successfully, do something with it
                    $labelUrl = $label['data']['label_url'];
                    $trackingNumber = $shipment['tracking_number'];
                    // ...
                }
            }
        }
    }
}