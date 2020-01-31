<?php

namespace App\Http\Controllers\UserInterface;

use App\models\FAQs;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Input;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\User;
use App\Models\Pages\PageContent;
use App\Models\Categories;
use App\Models\Countries;
use App\Notifications\Registration;
use App\Models\Validators;
use App\Models\Helper;
use App\Models\NewsLatter;
use App\Models\Configuration;
use App\Models\Dropzone;
use App\Models\Products\Products;
use Illuminate\Support\Facades\Mail;

use DB;
use Crypt;
use Carbon\Carbon;
use Auth;

class MainController extends Controller{

    function __construct(){
        /*-- HOMEPAGE ----------------------------------------------------------------*/
        

        parent::__construct();
    }

    function getIndex()
    {  
    //echo phpinfo();exit;
        $this->data['products'] = Products::groupBy('products.id', 'products.created_at')
            ->select( 'products.id as productID' )
            ->where('products.is_deleted', 0)
            ->orderBy('products.created_at', 'desc')->where("user_id", "!=", Auth::check() ? Auth::user()->id : "")
            ->skip(0)->take(6)->get();
        $this->data['max_product_price']        =   Products::max('price');
        $this->data['price1']        =   1;
        $this->data['price2']        =   Products::max('price'); 
        /*echo "<pre>";
        print_r($this->data['products']);  exit;     */              	     
        $this->data['page_content'] = PageContent::getData('none',1);
        /*echo "<pre>";
        print_r($this->data['page_content']);exit;*/
        $this->data['categories'] = Categories::where('status',1)->get();
        return view('user-interface.index',$this->data);
    }

	public function postUpdateFirebaseId(Request $request) {
		User::where('id',$request->id)->update(array('firebase_id'=>$request->firebase_id));
	}

    function postRegistration(Request $request)
    {
        // Send all the request to validate
        $validator = Validators::frontendValidate($request,"registration");
        // Check the validator if there's no error
        if ($validator === true) {
            $section  = 'load';
            $url      = '';
            if ($request->has('id')) {
                $user = User::manageData($request,Crypt::decrypt($request->id));
                Auth::loginUsingId($user->id);
                $section = 'redirect';
            } else {
                $user = User::manageData($request);
                // Send a registration link
                //echo 'data:'.$this->data['configuration'];exit;

                $data['title']   = 'Good day!';
                $data['message'] = 'Thank you for registering with '. $this->data['configuration']->name . '!. <br><br> Click the button to complete your registration.';
                $data['url'] = URL('verify-registration/'. Crypt::encrypt($user->email));
                $data['button'] = "Verify Registration";
                $data['name'] = $this->data['configuration']->name;

                $subject = $this->data['configuration']->name . " Registration";
                $from    = "info@rentsuit.com";
                $to      = $user->email;

                $a = Mail::send('emails.registration', compact('data'), function ($m) use ($from, $to, $subject) {
                    $m->to($to)->subject($subject);
                    $m->from($from);
                });

//                $user->notify(new Registration($user,$this->data['configuration']));
                Helper::flashMessage('Great!','An email has been sent to your registered email address.','success');
            }
            return response()->json(["result" => 'success', "section" => $section, "url" => URL('/'),'response'=>$user]);
        }
        return response()->json(["result" => 'failed', "errors" => $validator->errors()->messages()]);
    }

    function getVerifyRegistration($token)
    {
        $user = User::where('email',Crypt::decrypt($token))
                    ->where('status',0)
                    ->first();
        if (!empty($user)) {
            $user->status = 1;
            $user->save();
            Helper::flashMessage('Good Job!','Your account has been activated','success');
        }
        $this->data['products'] = Products::groupBy('products.id', 'products.created_at')->select( 'products.id as productID' )->orderBy('products.created_at', 'desc')->skip(0)->take(6)->get();
        $this->data['page_content'] = PageContent::getData('none',1);
        $this->data['categories'] = Categories::get();
        return view("user-interface.index",$this->data);
    }

    function postForgotPassword(Request $request)
    {
        // Send all the request to validate
        $validator = Validators::frontendValidate($request,"forgot_password");
        // Check the validator if there's no error
        if ($validator === true) {
            $success = User::forgotPassword($request);
            if ($success == 'social media') {
                $result = 'social media';
            } elseif ($success == 'true') {
                $result = 'success';
            } else {
                $result = 'failed';
            }
            return response()->json(['result' => $result]);
        }
        return response()->json(["result" => 'failed', "errors" => $validator->errors()->messages()]);
    }

    function getResetPassword(Request $request)
    {
        $this->data['page_content'] = PageContent::getData('none',1);
        $this->data['categories'] = Categories::get();        
        if (Auth::check()) {
            return back();
        }
        $token = DB::table('password_resets')
                    ->where('token',$request->token)
                    ->where('created_at','>',Carbon::now()->subHours(2)) // Set 2 hours expiration
                    ->first();
        // Check if the token exist
        if (!empty($token)) {
            $user_data = User::where('email',$token->email)
                            ->first();

            $user_data->status = 1;
            $user_data->save();

            if (!empty($user_data)) {
                $this->data['products'] = Products::groupBy('products.id', 'products.created_at')->select( 'products.id as productID' )->orderBy('products.created_at', 'desc')->skip(0)->take(6)->get();
                $this->data['id'] = Crypt::encrypt($user_data->id);
                return view('user-interface.index',$this->data);
            }
        }
        Helper::flashMessage('Action failed','The token has expired.','error');
        return redirect('/');
    }

    function postResetPassword(Request $request)
    {
        // Send all the request to validate
        $validator = Validators::backendValidate($request,"reset_password");
        // Check the validator if there's no error
        if ($validator === true) {
            $user_old_password = User::where('id',Crypt::decrypt($request->id))->first();
            $user_old_password = Crypt::decrypt($user_old_password->crypted_password);	
            User::updateCredentials($request,Crypt::decrypt($request->id));
            $user_detail = User::where('id',Crypt::decrypt($request->id))->first();
            
            return response()->json(['result' => 'success','user_detail'=>$user_detail,'new_password'=>$request->password,'user_old_password'=>$user_old_password]);
        }
        return response()->json(["result" => 'failed', "errors" => $validator->errors()->messages()]);
    }

    function getContactUs()
    {
        $this->data['page_content'] = PageContent::getData('none',5);
        return view("user-interface.guess-pages.contact-us",$this->data);
    }

    function postContactUs(Request $request)
    {
        // Send all the request to validate
        $validator = Validators::frontendValidate($request,"contact_us");
        // Check the validator if there's no error
        if ($validator === true) {
            Configuration::contactUs($request);
            return response()->json(["result" => 'success']);
        }
        return response()->json(["result" => 'failed', "errors" => $validator->errors()->messages()]);
    }

    function postLogin(Request $request){
        // Send all the request to validate
        $validator = Validators::frontendValidate($request,"login");
        // Check the validator if there's no error
        if ($validator === true) {
            if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
                if (Auth::user()->status == 0) {

                    $data['title']   = 'Good day!';
                    $data['message'] = 'Thank you for registering with '. $this->data['configuration']->name . '!. <br><br> Click the button to complete your registration.';
                    $data['url'] = URL('verify-registration/'. Crypt::encrypt(Auth::user()->email));
                    $data['button'] = "Verify Registration";
                    $data['name'] = $this->data['configuration']->name;

                    $subject = $this->data['configuration']->name . " Registration";
                    $from    = "info@rentsuit.com";
                    $to      = Auth::user()->email;

                    $a = Mail::send('emails.registration', compact('data'), function ($m) use ($from, $to, $subject) {
                        $m->to($to)->subject($subject);
                        $m->from($from);
                    });

                    Auth::logout();

                    return response()->json(['result' => 'invalid', 'message' => 'Go to your email to activate your account!']);
                }
                if (Auth::user()->privilege == 0) { // If admin
                    Auth::logout();
                    return response()->json(['result' => 'invalid', 'message' => 'The account is not valid']);
                }
                if ($request->has('uri')) {
                    $url = $request->uri;
                } else {
                    $url = URL('profile');
                }
                return response()->json([
                                            'result' => 'success',
                                            'url'    => $url,
                                            'response'=>Auth::user()
                                        ]);
            } return response()->json(['result' => 'invalid', 'message' => 'The password is not correct']);
        }
        return response()->json(["result" => 'failed', "errors" => $validator->errors()->messages()]);
    }

    function postUploadByDropzone(Request $request)
    {
        // Send all the request to validate
        $validator = Validators::frontendValidate($request,"dropzone");
        // Check the validator if there's no error
        if($validator === true){
            //echo $request->id;exit();
            //print_r($request);exit;
            $data = Dropzone::addData($request);
//            return response()->json(["result" => 'success', 'filename' => $data->file,'id'=>$data->id]);
            return response()->json(["result" => 'success', 'filename' => $data->file,'id'=>$data->id, "rotation" => $data->rotate]);
        } else {
            return response()->json(["result" => 'failed', "errors" => $validator->errors()->messages()]);
        }
    }

    function postDeleteByDropzone(Request $request)
    {
        Dropzone::deleteData($request);
        return response()->json(["result" => 'success']);
    }    

    function getAbout()
    {
        $this->data['page_content'] = PageContent::getData('none',2);
        return view("user-interface.guess-pages.about",$this->data);
    }

    function getTermsAndConditions()
    {
        $this->data['page_content'] = PageContent::getData('none',7);
        return view("user-interface.guess-pages.terms-and-conditions",$this->data);
    }

    function getTcNpp()
    {
        $this->data['page_content'] = PageContent::getData('none',8);
        return view("user-interface.guess-pages.tcNpp",$this->data);
    }

    function getReturnPolicy()
    {
        $this->data['page_content'] = PageContent::getData('none',8);
        return view("user-interface.guess-pages.return-policy",$this->data);
    }

    function getPrivacyPolicy()
    {
        $this->data['page_content'] = PageContent::getData('none',8);
        return view("user-interface.guess-pages.privacy-policy",$this->data);
    }

    function getFaq()
    {
        $this->data['page_content'] = PageContent::getData('none',9);
        $this->data['faqs'] = FAQs::orderBy('section')->orderBy('category')->get();
        return view("user-interface.guess-pages.faq",$this->data);
    }

    /*function getShippingCalculator()
    {
                             
        $this->data['countries'] = DB::table("countries")
                                    ->orderBy('Name','asc')
                                    ->get()->toArray();
                                   // echo "<pre>";
        
        $this->data['page_content'] = PageContent::getData('none',6);
        return view("user-interface.guess-pages.shipping-calculator",$this->data);
    }*/
    
    function getShippingCalculator()
    {
        $this->data['countries'] = DB::table("countries")
                                    ->orderBy('Name','asc')
                                    ->get();	
        //echo $this->canada_api();exit;
        $this->data['page_content'] = PageContent::getData('none',6);
        return view("user-interface.guess-pages.shipping-calculator",$this->data);
    }

    function postShippingCalculator(Request $request) {

        
        $validator = Validators::frontendValidate($request,"shipping_calculator");
        // Check the validator if there's no error
        if($validator === true){
            //$data = Dropzone::addData($request);
            //return response()->json(["result" => 'success', 'filename' => $data->file]);
            //print_r($request->all());

            if($request->type=="Localization") {
               return $this->canada_api($request);
            } else {
                return $this->ups_usa($request);
            }
        } else {
            return response()->json(["result" => 'failed', "errors" => $validator->errors()->messages()]);
        }
    }
    
    
    public function postAddNewsLatter(Request $request) {
    	// Send all the request to validate
        $validator = Validators::frontendValidate($request,"newslatter");
        // Check the validator if there's no error
        if($validator === true){
            $data = NewsLatter::addData($request);
            return response()->json(["result" => 'success']);
        } else {
            return response()->json(["result" => 'failed', "errors" => $validator->errors()->messages()]);
        }
    }
    
    /*public function canada_api($request) {
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

        $originPostalCode = $request->from_zipcode; 
        $postalCode = $request->destination_zipcode;
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
            echo 'Curl error: ' . curl_error($curl) . "\n";
        }

        //echo 'HTTP Response Status: ' . curl_getinfo($curl,CURLINFO_HTTP_CODE) . "\n";

        curl_close($curl);

        // Example of using SimpleXML to parse xml response
        libxml_use_internal_errors(true);
        $xml = simplexml_load_string('<root>' . preg_replace('/<\?xml.*\?>/','',$curl_response) . '</root>');
        if (!$xml) {
            echo 'Failed loading XML' . "\n";
            echo $curl_response . "\n";
            foreach(libxml_get_errors() as $error) {
                echo "\t" . $error->message;
            }
        } else {
            if ($xml->{'price-quotes'} ) {
                $priceQuotes = $xml->{'price-quotes'}->children('http://www.canadapost.ca/ws/ship/rate-v3');
                if ( $priceQuotes->{'price-quote'} ) {
                    $array = array();
                    $i = 0;
                    foreach ( $priceQuotes as $key=>$priceQuote ) {  
                        //echo '<br>Service Name: ' . $priceQuote->{'service-name'} . "\n<br>";
                        //echo 'Price: ' . $priceQuote->{'price-details'}->{'due'} . "\n\n<br>";  
                        $array[$i]['name'] = $priceQuote->{'service-name'}."";
                        $array[$i]['value'] = $priceQuote->{'price-details'}->{'due'}."";
                        $i++;
                    }

                    //print_r($array);
                    $result_string = "";
                    foreach ($array as $key => $value) {
                        $result_string.="<p>".$value['name']." <span class='pull-right'>".$value['value']." USD</span></p>";
                    }
                    $result_string.="<h1>Note: This item will be released and delivered on or within 10 days</h1>";
                    return response()->json(["result" => 'success', 'data' => $result_string]);

                }
            }
            if ($xml->{'messages'} ) {                  
                $messages = $xml->{'messages'}->children('http://www.canadapost.ca/ws/messages');     
                //print_r($messages);  
                foreach ( $messages as $message ) {
                    //echo '<br>Error Code: ' . $message->code . "\n<br>";
                    //echo 'Error Msg: ' . $message->description . "\n\n<BR>";
                    

                    if (strpos($message->description."", 'origin-postal-code') !== false) {
                        $error['from_zipcode'][0] = "server not found this zip code.";
                    } else if(strpos($message->description."", 'postal-code') !== false) {
                        $error['destination_zipcode'][0] = "server not found this zip code.";
                    } else {
                        $error['some_error'][0] = $message->description."";
                    }

                    return response()->json(["result" => 'failed', "errors" => $error]);
                }
            }
                
        }

    }*/
    
    /*public function ups_usa($request) {
        $curl = curl_init();

       

        curl_setopt_array($curl, array(
          CURLOPT_URL => "https://wwwcie.ups.com/rest/Rate",
          CURLOPT_RETURNTRANSFER => true,
          CURLOPT_ENCODING => "",
          CURLOPT_MAXREDIRS => 10,
          CURLOPT_TIMEOUT => 30,
          CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
          CURLOPT_CUSTOMREQUEST => "POST",
          CURLOPT_POSTFIELDS => "{  \r\n   \"UPSSecurity\":{  \r\n      \"UsernameToken\":{  \r\n         \"Username\":\"nanou1968\",\r\n         \"Password\":\"Jasmine1968\"\r\n      },\r\n      \"ServiceAccessToken\":{  \r\n         \"AccessLicenseNumber\":\"DD3EE35B71EAED58\"\r\n      }\r\n   },\r\n   \"RateRequest\":{  \r\n      \"Request\":{  \r\n         \"RequestOption\":\"Rate\",\r\n         \"TransactionReference\":{  \r\n            \"CustomerContext\":\"Your Customer Context\"\r\n         }\r\n      },\r\n      \"Shipment\":{  \r\n         \"Shipper\":{  \r\n            \"Name\":\"Shipper Name\",\r\n            \"ShipperNumber\":\"121212\",\r\n            \"Address\":{  \r\n               \"AddressLine\":[  \r\n                  \"Address Line \",\r\n                  \"Address Line \",\r\n                  \"".$request->from_address." \"\r\n               ],\r\n               \"City\":\"".$request->from_city."\",\r\n               \"StateProvinceCode\":\"State Province Code\",\r\n               \"PostalCode\":\"Postal Code\",\r\n               \"CountryCode\":\"US\"\r\n            }\r\n         },\r\n         \"ShipTo\":{  \r\n            \"Name\":\"Ship To Name\",\r\n            \"Address\":{  \r\n               \"".$request->from_address."\":[  \r\n                  \"Address Line \",\r\n                  \"Address Line \",\r\n                  \"Address Line \"\r\n               ],\r\n               \"City\":\"".$request->from_city."\",\r\n               \"StateProvinceCode\":\"\",\r\n               \"PostalCode\":\"".$request->from_zipcode."\",\r\n               \"CountryCode\":\"US\"\r\n            }\r\n         },\r\n         \"ShipFrom\":{  \r\n            \"Name\":\"Ship From Name\",\r\n            \"Address\":{  \r\n               \"".$request->destination_address."\":[  \r\n                  \"Address Line \",\r\n                  \"Address Line \",\r\n                  \"Address Line \"\r\n               ],\r\n               \"City\":\"".$request->destination_city."\",\r\n               \"StateProvinceCode\":\"CA\",\r\n               \"PostalCode\":\"".$request->destination_zipcode."\",\r\n               \"CountryCode\":\"US\"\r\n            }\r\n         },\r\n         \"Service\":{  \r\n            \"Code\":\"03\",\r\n            \"Description\":\"Service Code Description\"\r\n         },\r\n         \"Package\":{  \r\n            \"PackagingType\":{  \r\n               \"Code\":\"02\",\r\n               \"Description\":\"Rate\"\r\n            },\r\n            \"Dimensions\":{  \r\n               \"UnitOfMeasurement\":{  \r\n                  \"Code\":\"IN\",\r\n                  \"Description\":\"inches\"\r\n               },\r\n               \"Length\":\"".$request->length."\",\r\n               \"Width\":\"".$request->width."\",\r\n               \"Height\":\"".$request->height."\"\r\n            },\r\n            \"PackageWeight\":{  \r\n               \"UnitOfMeasurement\":{  \r\n                  \"Code\":\"Lbs\",\r\n                  \"Description\":\"pounds\"\r\n               },\r\n               \"Weight\":\"".$request->weight."\"\r\n            }\r\n         },\r\n         \"ShipmentRatingOptions\":{  \r\n            \"NegotiatedRatesIndicator\":\"\"\r\n         }\r\n      }\r\n   }\r\n}",
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
          $error['some_error'][0] = "Internal Server Error. Please Try Again.";
        } else {

          //echo $response;
            $response = json_decode($response,true);
            //print_r($response);

            if(isset($response['Fault'])) {
                //echo $response['Fault']['detail']['Errors']['ErrorDetail']['PrimaryErrorCode']['Description'];
                $error['some_error'][0] = $response['Fault']['detail']['Errors']['ErrorDetail']['PrimaryErrorCode']['Description'];

                return response()->json(["result" => 'failed', "errors" => $error]);
            } else {
                //print_r($response['RateResponse']['RatedShipment']['RatedPackage']['TotalCharges']);
                $array = array();
                $array[0]['name'] = "Shipping Charges";
                $array[0]['value'] = $response['RateResponse']['RatedShipment']['RatedPackage']['TotalCharges']['MonetaryValue'];

                $result_string = "";
                    foreach ($array as $key => $value) {
                        $result_string.="<p>".$value['name']." <span class='pull-right'>".$value['value']." USD</span></p>";
                    }
                    $result_string.="<h1>Note: This item will be released and delivered on or within 10 days</h1>";
                    return response()->json(["result" => 'success', 'data' => $result_string]);


            }
        }
    }*/
    
    
    public function canada_api($request) {
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
            echo 'Curl error: ' . curl_error($curl) . "\n";
        }

        //echo 'HTTP Response Status: ' . curl_getinfo($curl,CURLINFO_HTTP_CODE) . "\n";

        curl_close($curl);

        // Example of using SimpleXML to parse xml response
        libxml_use_internal_errors(true);
        $xml = simplexml_load_string('<root>' . preg_replace('/<\?xml.*\?>/','',$curl_response) . '</root>');
        if (!$xml) {
            echo 'Failed loading XML' . "\n";
            echo $curl_response . "\n";
            foreach(libxml_get_errors() as $error) {
                echo "\t" . $error->message;
            }
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
                        $array[$i]['value'] = $priceQuote->{'price-details'}->{'due'}."";
                        $i++;
                    }

                    //print_r($array);
                    $result_string = "";
                    foreach ($array as $key => $value) {
                        $result_string.="<p>".$value['name']." <span class='pull-right'>".$value['value']." CAD</span></p>";
                    }
                    $result_string.="<h1>Note: This item will be released and delivered on or within 10 days</h1>";
                    return response()->json(["result" => 'success', 'data' => $result_string]);

                }
            }
            if ($xml->{'messages'} ) {                  
                $messages = $xml->{'messages'}->children('http://www.canadapost.ca/ws/messages');     
                //print_r($messages);  
                foreach ( $messages as $message ) {
                    //echo '<br>Error Code: ' . $message->code . "\n<br>";
                    //echo 'Error Msg: ' . $message->description . "\n\n<BR>";
                    

                    if (strpos($message->description."", 'origin-postal-code') !== false) {
                        $error['from_zipcode'][0] = "server not found this zip code.";
                    } else if(strpos($message->description."", 'postal-code') !== false) {
                        $error['destination_zipcode'][0] = "server not found this zip code.";
                    } else {
                        $error['some_error'][0] = $message->description."";
                    }

                    return response()->json(["result" => 'failed', "errors" => $error]);
                }
            }
                
        }

    }
    
    public function ups_usa($request) {
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
	//$request->from_address = str_replace(','," ",$request->from_address);
	//$request->destination_address = str_replace(','," ",$request->destination_address);
	
	$request->from_address = clean($request->from_address);
	$request->destination_address = clean($request->destination_address);
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
          $error['some_error'][0] = "Internal Server Error. Please Try Again.";
        } else {

          //echo $response;
            $response = json_decode($response,true);
            //print_r($response);

            if(isset($response['Fault'])) {
                //echo $response['Fault']['detail']['Errors']['ErrorDetail']['PrimaryErrorCode']['Description'];
                $error['some_error'][0] = $response['Fault']['detail']['Errors']['ErrorDetail']['PrimaryErrorCode']['Description'];

                return response()->json(["result" => 'failed', "errors" => $error]);
            } else {
                //print_r($response['RateResponse']['RatedShipment']['RatedPackage']['TotalCharges']);
                $array = array();
                $array[0]['name'] = "Shipping Charges";
                //$array[0]['value'] = $response['RateResponse']['RatedShipment']['RatedPackage']['TotalCharges']['MonetaryValue'];
                $array[0]['value'] = $response['RateResponse']['RatedShipment']['TotalCharges']['MonetaryValue']." ".$response['RateResponse']['RatedShipment']['TotalCharges']['CurrencyCode'];
                $result_string = "";
                    foreach ($array as $key => $value) {
                        $result_string.="<p>".$value['name']." <span class='pull-right'>".$value['value']."</span></p>";
                    }
                    $result_string.="<h1>Note: This item will be released and delivered on or within 10 days</h1>";
                    return response()->json(["result" => 'success', 'data' => $result_string]);


            }
        }
    }

}