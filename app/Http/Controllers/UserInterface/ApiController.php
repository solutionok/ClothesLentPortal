<?php

namespace App\Http\Controllers\UserInterface;

use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Input;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class ApiController extends Controller{

    function __construct()
    {
        $this->data['$accessKey'] = "8D33E3B78EC5F8BC"; 
        $this->data['$userId'] = "nanou1968";
        $this->data['$password'] = "Jasmine1968"; 
        $this->data['$shipperNumber'] = "50R17W";                                            
        // Extend the constructor from the main controller
        parent::__construct();
    }


    function getUps(Request $request)
    {


    // Start shipment

        $return = null;
        $order_id = "123123";
            
        $shipment = new \Ups\Entity\Shipment;

        // Set shipper
        $address = new \Ups\Entity\Address();
        $address->setAddressLine1('Old toronto');
        $address->setPostalCode('M5S1V6');
        $address->setCity('Toronto');
        $address->setCountryCode('CA');
        $address->setStateProvinceCode('ON'); 
        $shipper = new \Ups\Entity\Shipper();
        $shipper->setShipperNumber($this->data['$shipperNumber']);
        $shipper->setName('XX');
        $shipper->setAttentionName('XX');
        $shipper->setAddress($address);
        $shipper->setEmailAddress('client@gmail.com'); 
        $shipper->setPhoneNumber('XXX-XXXX-X');
        $shipment->setShipper($shipper);

        // To address
        $address = new \Ups\Entity\Address();
        $address->setAddressLine1('John Street');
        $address->setPostalCode('10038');
        $address->setCity('New York');
        $address->setCountryCode('US');
        $address->setStateProvinceCode('NY');
        $shipTo = new \Ups\Entity\ShipTo();
        $shipTo->setAddress($address);
        $shipTo->setCompanyName('XX');
        $shipTo->setAttentionName('XX');
        $shipTo->setEmailAddress('client@gmail.com'); 
        $shipTo->setPhoneNumber('1234567890');
        $shipment->setShipTo($shipTo);      

        // From address
        $address = new \Ups\Entity\Address();
        $address->setAddressLine1('Old toronto');
        $address->setPostalCode('M5S1V6');
        $address->setCity('Toronto');
        $address->setCountryCode('CA');
        $address->setStateProvinceCode('ON'); 
        $shipFrom = new \Ups\Entity\ShipFrom();
        $shipFrom->setAddress($address);
        $shipFrom->setName('XX');
        $shipFrom->setAttentionName($shipFrom->getName());
        $shipFrom->setCompanyName($shipFrom->getName());
        $shipFrom->setEmailAddress('XX');
        $shipFrom->setPhoneNumber('XX');
        $shipment->setShipFrom($shipFrom);

        // Sold to
        $address = new \Ups\Entity\Address();
        $address->setAddressLine1('10571 Pico Blvd');
        $address->setPostalCode('90064');
        $address->setCity('Los Angeles');
        $address->setCountryCode('US');
        $address->setStateProvinceCode('CA');
        $soldTo = new \Ups\Entity\SoldTo;
        $soldTo->setAddress($address);
        $soldTo->setAttentionName('XX');
        $soldTo->setCompanyName($soldTo->getAttentionName());
        $soldTo->setEmailAddress('XX');
        $soldTo->setPhoneNumber('XX');
        $shipment->setSoldTo($soldTo);

        // Set service
        $service = new \Ups\Entity\Service;
        $service->setCode(\Ups\Entity\Service::S_STANDARD);
        $service->setDescription($service->getName());
        $shipment->setService($service);

        // Mark as a return (if return)
        if ($return) {
            $returnService = new \Ups\Entity\ReturnService;
            $returnService->setCode(\Ups\Entity\ReturnService::PRINT_RETURN_LABEL_PRL);
            $shipment->setReturnService($returnService);
        }

        // Set description
        $shipment->setDescription('XX');

        // Add Package
        $package = new \Ups\Entity\Package();
        $package->getPackagingType()->setCode(\Ups\Entity\PackagingType::PT_PACKAGE);
        $package->getPackageWeight()->setWeight(10);
        $unit = new \Ups\Entity\UnitOfMeasurement;
        $unit->setCode(\Ups\Entity\UnitOfMeasurement::UOM_KGS);
        $package->getPackageWeight()->setUnitOfMeasurement($unit);

        // Set dimensions
        $dimensions = new \Ups\Entity\Dimensions();
        $dimensions->setHeight(50);
        $dimensions->setWidth(50);
        $dimensions->setLength(50);
        $unit = new \Ups\Entity\UnitOfMeasurement;
        $unit->setCode(\Ups\Entity\UnitOfMeasurement::UOM_CM);
        $dimensions->setUnitOfMeasurement($unit);
        $package->setDimensions($dimensions);

        // Add descriptions because it is a package
        $package->setDescription('XX');

        // Add this package
        $shipment->addPackage($package);

        // Set Reference Number
        $referenceNumber = new \Ups\Entity\ReferenceNumber;
        if ($return) {
            $referenceNumber->setCode(\Ups\Entity\ReferenceNumber::CODE_RETURN_AUTHORIZATION_NUMBER);
            $referenceNumber->setValue($return_id);
        } else {
            $referenceNumber->setCode(\Ups\Entity\ReferenceNumber::CODE_INVOICE_NUMBER);
            $referenceNumber->setValue($order_id);
        }
        $shipment->setReferenceNumber($referenceNumber);

        // Set payment information
        $shipment->setPaymentInformation(new \Ups\Entity\PaymentInformation('prepaid', (object)array('AccountNumber' => $this->data['$shipperNumber'])));

        // Ask for negotiated rates (optional)
        $rateInformation = new \Ups\Entity\RateInformation;
        $rateInformation->setNegotiatedRatesIndicator(1);
        $shipment->setRateInformation($rateInformation);     

        // Get shipment info
        try {

            $api = new \Ups\Shipping($this->data['$accessKey'], $this->data['$userId'], $this->data['$password']); 
        
            $confirm = $api->confirm(\Ups\Shipping::REQ_VALIDATE, $shipment);
            // var_dump($confirm); // Confirm holds the digest you need to accept the result
            dd($confirm);
            if ($confirm) {
                $accept = $api->accept($confirm->ShipmentDigest);
                var_dump($accept); // Accept holds the label and additional information
            }
        } catch (\Exception $e) {
            dd($e);
            // var_dump($e);
        }

        return view('user-interface.dashboard.test-blades.ups-test',$this->data);
    }

    function getAddressValidation(Request $request)
    {
        $address = new \Ups\Entity\Address();
        $address->setStateProvinceCode('NY');
        $address->setCity('New York');
        $address->setCountryCode('US');
        $address->setPostalCode('10000');

        $av = new \Ups\SimpleAddressValidation($this->data['$accessKey'], $this->data['$userId'], $this->data['$password']);
        try {
         $response = $av->validate($address);
         // var_dump($response);
        dd($response);
        } catch (Exception $e) {
         // var_dump($e);
        dd($e);
        }        
    }

}