<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Notifications\RegistrationVerificationCodeSend;
use App\User;
use App\Models\Categories;
use App\Models\Products\Products;
use App\Models\DeviceToken;
use App\Models\Wishlist\Wishlist;
use App\Models\ProductUserReview;
use App\Models\Rent\Rent;
use App\Models\Rent\RentTransactionDetail;
use App\Models\Messages\Messages;
use App\Models\Messages\MessagesRoom;
use App\Models\Notification\Notification;
use App\Models\Validators;
use App\Models\Helper;
use Auth,Hash,Input,Session,Redirect,Mail,URL,File,Str,Config,DB,Response,View,Validator,Twilio;
use Crypt;

class ShippingCalculatorController extends ApiBaseController
{
	public function getShippingCalculator(Request $request) {
		$code = UNSUCCESS; 
		$response = array();
                
               $rules = [];
$rules['type'] = 'required';

$rules['destination_address'] = 'required';
$rules['destination_city'] = 'required';
$rules['destination_state_province_code'] = 'required'; 
$rules['destination_countries'] = 'required';
$rules['destination_zipcode'] = 'required';

$rules['from_address'] = 'required';
$rules['from_city'] = 'required';
$rules['from_state_province_code'] = 'required';
$rules['from_countries'] = 'required';
$rules['from_zipcode'] = 'required';

$rules['length'] = 'required';
$rules['width'] = 'required';
$rules['height'] = 'required';
$rules['weight'] = 'required';
                $validator = Validator::make($request->all(), $rules);
                $code = UNSUCCESS;
                $msg = "Parameter mising.";
                if ($validator->fails()) {
                    return Response::json(array('code' => $code, 'msg' => $validator->errors()->messages(), 'data' => null));
                }
                
                
                
                
		if($request->type=="Localization") {
	               return $this->canada_api($request);
	        } else {
	                return $this->ups_usa($request);
	        }
		return Response::json(array('code' => $code,'msg' => $msg,'data' => (object)$response));
	}
	
	public function canada_api($request) {
	$code = UNSUCCESS;
	$msg = "UNSUCCESS";
        //echo "here";
        //print_r($request->all());exit;
        $username = "c7510ed7ea5a4e1a"; 
        $password = "6149022203b1cdd393e8cc";
        $mailedBy = "8609453";

        // REST URL
        $service_url = 'https://ct.soa-gw.canadapost.ca/rs/ship/price';

        // Create GetRates request xml
        // $originPostalCode = 'H2B1A0'; 
        // $postalCode = 'K1K4T3';
        // $weight = 1;
        $from_zipcode = explode(" ", $request->from_zipcode);
        $from_zipcode_final = "";
        foreach ($from_zipcode as $key => $value) {
            $from_zipcode_final.=$value;
        }

        $destination_zipcode = explode(" ", $request->destination_zipcode);
        $destination_zipcode_final = "";
        foreach ($destination_zipcode as $key => $value) {
            $destination_zipcode_final.=$value;
        }

        $originPostalCode = $from_zipcode_final; 
        $postalCode = $destination_zipcode_final;
        $weight = $request->weight;

$xmlRequest = <<<XML
<?xml version="1.0" encoding="UTF-8"?>
<mailing-scenario xmlns="http://www.canadapost.ca/ws/ship/rate-v3">
  <customer-number>{$mailedBy}</customer-number>
  <parcel-characteristics>
    <weight>{$weight}</weight>
  </parcel-characteristics>
  <origin-postal-code>{$originPostalCode}</origin-postal-code>
  <destination>
    <domestic>
      <postal-code>{$postalCode}</postal-code>
    </domestic>
  </destination>
</mailing-scenario>
XML;

        $curl = curl_init($service_url); // Create REST Request
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, true);
        curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, 2);
        //curl_setopt($curl, CURLOPT_CAINFO, realpath(dirname($_SERVER['SCRIPT_FILENAME'])) . '/../../../third-party/cert/cacert.pem');
        curl_setopt($curl, CURLOPT_POST, true);
        curl_setopt($curl, CURLOPT_POSTFIELDS, $xmlRequest);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
        curl_setopt($curl, CURLOPT_USERPWD, $username . ':' . $password);
        curl_setopt($curl, CURLOPT_HTTPHEADER, array('Content-Type: application/vnd.cpc.ship.rate-v3+xml', 'Accept: application/vnd.cpc.ship.rate-v3+xml'));
        $curl_response = curl_exec($curl); // Execute REST Request
        if(curl_errno($curl)){ 
             return Response::json(array('code' => $code,'msg' => curl_error($curl),'data' => (object)array()));
        }

        //echo 'HTTP Response Status: ' . curl_getinfo($curl,CURLINFO_HTTP_CODE) . "\n";

        curl_close($curl);

        // Example of using SimpleXML to parse xml response
        libxml_use_internal_errors(true);
        $xml = simplexml_load_string('<root>' . preg_replace('/<\?xml.*\?>/','',$curl_response) . '</root>');
      
        if (!$xml) {
            $msg= 'Failed loading XML '  ;
            $msg.= $curl_response  ;
            foreach(libxml_get_errors() as $error) {
                $msg.=' '. $error->message;
            }
           return Response::json(array('code' => $code,'msg' => $msg,'data' => (object)array()));
        } else {
            if ($xml->{'price-quotes'} ) {
                $priceQuotes = $xml->{'price-quotes'}->children('http://www.canadapost.ca/ws/ship/rate-v3');
                if ( $priceQuotes->{'price-quote'} ) {
                    $array = array();
                    $i = 0;
                    foreach ( $priceQuotes as $key=>$priceQuote ) {  
                        //echo '<br>Service Name: ' . $priceQuote->{'service-name'} . "\n<br>";
                        //echo 'Price: ' . $priceQuote->{'price-details'}->{'due'} . "\n\n<br>";  
                        //print_r($priceQuote);
                        $array[$i]['name'] = $priceQuote->{'service-name'}."";
                        $array[$i]['value'] = $priceQuote->{'price-details'}->{'due'}." CAD";
                        $i++;
                    }
		    $code = SUCCESS;
		    $msg = "SUCCESS";
		    $response['shipping_calculator'] = $array;
                    return Response::json(array('code' => $code,'msg' => $msg,'data' => $response));
                    
                }
            }
            if ($xml->{'messages'} ) {                  
                $messages = $xml->{'messages'}->children('http://www.canadapost.ca/ws/messages');     
                //print_r($messages);  
                foreach ( $messages as $message ) {
                    //echo '<br>Error Code: ' . $message->code . "\n<br>";
                    //echo 'Error Msg: ' . $message->description . "\n\n<BR>";
                    

                    if (strpos($message->description."", 'origin-postal-code') !== false) {
                        $msg= "server not found this zip code.";
                    } else if(strpos($message->description."", 'postal-code') !== false) {
                        $msg = "server not found this zip code.";
                    } else {
                        $msg = $message->description."";
                    }

                    return Response::json(array('code' => $code,'msg' => $msg,'data' => (object)array()));
                }
            }
                
        }

    }
    
    public function ups_usa($request) {
    	$code = UNSUCCESS;
    	$msg = "UNSUCCESS";
        $curl = curl_init();

        // curl_setopt_array($curl, array(
        //   CURLOPT_URL => "https://wwwcie.ups.com/rest/Rate",
        //   CURLOPT_RETURNTRANSFER => true,
        //   CURLOPT_ENCODING => "",
        //   CURLOPT_MAXREDIRS => 10,
        //   CURLOPT_TIMEOUT => 30,
        //   CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        //   CURLOPT_CUSTOMREQUEST => "POST",
        //   CURLOPT_POSTFIELDS => "{  'UPSSecurity':{ 'UsernameToken':{ 'Username':'nanou1968','Password':'Jasmine1968'},'ServiceAccessToken':{ 'AccessLicenseNumber':'DD3EE35B71EAED58'}},'RateRequest':{ 'Request':{ 'RequestOption':'Rate','TransactionReference':{ 'CustomerContext':'Your Customer Context'}},'Shipment':{  'Shipper':{ 'Name':'Shipper Name','ShipperNumber':'121212','Address':{  'AddressLine':[  'Address Line','Address Line ','Address Line ],'City':'City','StateProvinceCode':'State Province Code','PostalCode':'Postal Code','CountryCode':'US'}\},'ShipTo':{  'Name':'Ship To Name','Address':{  'AddressLine':[  'Address Line ','Address Line ','Address Line '],'City':'City','StateProvinceCode':'DE','PostalCode':'19703','CountryCode':'US'}},'ShipFrom':{  'Name':'Ship From Name','Address':{  'AddressLine':[  'Address Line ','Address Line ','Address Line '],'City':'City','StateProvinceCode':'CA','PostalCode':'90230','CountryCode':'US'}},'Service':{  'Code':'03','Description':'Service Code Description'},'Package':{  'PackagingType':{ 'Code':'02','Description':'Rate' },'Dimensions':{ 'UnitOfMeasurement':{  'Code':'IN','Description':'inches'},'Length':'5','Width':'4','Height':'3'},'PackageWeight':{  'UnitOfMeasurement':{  'Code':'Lbs','Description':'pounds'},'Weight':'5'}\},'ShipmentRatingOptions':{ 'NegotiatedRatesIndicator':''}}}}",
        //   CURLOPT_HTTPHEADER => array(
        //     "cache-control: no-cache",
        //     "content-type: application/json",
        //     "postman-token: 3da5a9c9-8643-bbfe-64f2-19a896af0b1d"
        //   ),
        // ));
	$request->from_address = clean($request->from_address);
	$request->destination_address = clean($request->destination_address);
	
	
	//echo $request->from_address.":".$request->destination_address;
        curl_setopt_array($curl, array(
          CURLOPT_URL => "https://wwwcie.ups.com/rest/Rate",
          CURLOPT_RETURNTRANSFER => true,
          CURLOPT_ENCODING => "",
          CURLOPT_MAXREDIRS => 10,
          CURLOPT_TIMEOUT => 30,
          CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
          CURLOPT_CUSTOMREQUEST => "POST",
          CURLOPT_POSTFIELDS => "{  \r\n   \"UPSSecurity\":{  \r\n      \"UsernameToken\":{  \r\n         \"Username\":\"nanou1968\",\r\n         \"Password\":\"Jasmine1968\"\r\n      },\r\n      \"ServiceAccessToken\":{  \r\n         \"AccessLicenseNumber\":\"DD3EE35B71EAED58\"\r\n      }\r\n   },\r\n   \"RateRequest\":{  \r\n      \"Request\":{  \r\n         \"RequestOption\":\"Rate\",\r\n         \"TransactionReference\":{  \r\n            \"CustomerContext\":\"Your Customer Context\"\r\n         }\r\n      },\r\n      \"Shipment\":{  \r\n         \"Shipper\":{  \r\n            \"Name\":\"Shipper Name\",\r\n            \"ShipperNumber\":\"121212\",\r\n            \"Address\":{  \r\n               \"AddressLine\":[  \r\n                  \"Address Line \",\r\n                  \"Address Line \",\r\n                  \"".$request->from_address." \"\r\n               ],\r\n               \"City\":\"".$request->from_city."\",\r\n               \"StateProvinceCode\":\"State Province Code\",\r\n               \"PostalCode\":\"Postal Code\",\r\n               \"CountryCode\":\"US\"\r\n            }\r\n         },\r\n         \"ShipTo\":{  \r\n            \"Name\":\"Ship To Name\",\r\n            \"Address\":{  \r\n               \"".$request->from_address."\":[  \r\n                  \"Address Line \",\r\n                  \"Address Line \",\r\n                  \"Address Line \"\r\n               ],\r\n               \"City\":\"".$request->from_city."\",\r\n               \"StateProvinceCode\":\"".$request->from_state_province_code."\",\r\n               \"PostalCode\":\"".$request->from_zipcode."\",\r\n               \"CountryCode\":\"".$request->from_countries."\"\r\n            }\r\n         },\r\n         \"ShipFrom\":{  \r\n            \"Name\":\"Ship From Name\",\r\n            \"Address\":{  \r\n               \"".$request->destination_address."\":[  \r\n                  \"Address Line \",\r\n                  \"Address Line \",\r\n                  \"Address Line \"\r\n               ],\r\n               \"City\":\"".$request->destination_city."\",\r\n               \"StateProvinceCode\":\"".$request->destination_state_province_code."\",\r\n               \"PostalCode\":\"".$request->destination_zipcode."\",\r\n               \"CountryCode\":\"".$request->destination_countries."\"\r\n            }\r\n         },\r\n         \"Service\":{  \r\n            \"Code\":\"02\",\r\n            \"Description\":\"Service Code Description\"\r\n         },\r\n         \"Package\":{  \r\n            \"PackagingType\":{  \r\n               \"Code\":\"02\",\r\n               \"Description\":\"Rate\"\r\n            },\r\n            \"Dimensions\":{  \r\n               \"UnitOfMeasurement\":{  \r\n                  \"Code\":\"IN\",\r\n                  \"Description\":\"inches\"\r\n               },\r\n               \"Length\":\"".$request->length."\",\r\n               \"Width\":\"".$request->width."\",\r\n               \"Height\":\"".$request->height."\"\r\n            },\r\n            \"PackageWeight\":{  \r\n               \"UnitOfMeasurement\":{  \r\n                  \"Code\":\"Lbs\",\r\n                  \"Description\":\"pounds\"\r\n               },\r\n               \"Weight\":\"".$request->weight."\"\r\n            }\r\n         },\r\n         \"ShipmentRatingOptions\":{  \r\n            \"NegotiatedRatesIndicator\":\"\"\r\n         }\r\n      }\r\n   }\r\n}",
          CURLOPT_HTTPHEADER => array(
            "cache-control: no-cache",
            "content-type: application/json",
            "postman-token: 7eadf5e2-8e9d-cb29-e59b-ba38d14c6387"
          ),
        ));

        $response = curl_exec($curl);
        $err = curl_error($curl);

        curl_close($curl);

        if ($err) {
          $msg  = "Internal Server Error. Please Try Again.";
        } else {

          //echo $response;
            $response = json_decode($response,true);
            //print_r($response);

            if(isset($response['Fault'])) {
                //echo $response['Fault']['detail']['Errors']['ErrorDetail']['PrimaryErrorCode']['Description'];
                 $msg = $response['Fault']['detail']['Errors']['ErrorDetail']['PrimaryErrorCode']['Description'];
		//echo "error";
                return Response::json(array('code' => $code,'msg' => $msg,'data' => (object)array()));
            } else {
                //print_r($response['RateResponse']['RatedShipment']['RatedPackage']['TotalCharges']);
                $array = array();
                $array[0]['name'] = "Shipping Charges";
                //$array[0]['value'] = $response['RateResponse']['RatedShipment']['RatedPackage']['TotalCharges']['MonetaryValue'];
                $array[0]['value'] = $response['RateResponse']['RatedShipment']['TotalCharges']['MonetaryValue']." ".$response['RateResponse']['RatedShipment']['TotalCharges']['CurrencyCode'];
               $code = SUCCESS;
               $msg = "SUCCESS";
               $response_data['shipping_calculator'] = $array;
               return Response::json(array('code' => $code,'msg' => $msg,'data' => $response_data));
               //return Response::json(array('code' => $code,'msg' => $msg,'data' => (object)$array));


            }
        }
        return Response::json(array('code' => $code,'msg' => $msg,'data' => null));
    }
}