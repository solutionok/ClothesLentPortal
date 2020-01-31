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
use App\Models\Messages\Messages;
use App\Models\Messages\MessagesRoom;
use App\Models\Validators;
use App\Models\Notification\Notification;
use App\Models\Helper;
use Auth,Hash,Input,Session,Redirect,Mail,URL,File,Str,Config,DB,Response,View,Validator,Twilio;
use Crypt;

class CartController extends ApiBaseController
{
	public function postAddCart(Request $request) {
		$code = UNSUCCESS;
		$msg = "Already in the cart";
		$user = auth()->guard('api')->user();
		$response = array();
                    $rules = [];
                    $rules['product_id'] = 'required';
                    $rules['rental_start_date'] = 'required|date_format:d-m-Y|after:today';
                    $rules['rental_end_date'] = 'required|date_format:d-m-Y|after:today';
                    $rules['delivery_option'] = 'required|in:Localization,Regular mail,Ups';
                    $rules['street_number'] = 'required';
                    $rules['address2'] = 'required';
                    $rules['city'] = 'required';
                    $rules['state'] = 'required';
                    $rules['postal_code'] = 'required';
                    $rules['contact_number'] = 'required';
                    $rules['country'] = 'required';
                    $rules['email'] = 'required|email';
                    
                    
                    $validator = Validator::make($request->all(), $rules);

                    if ($validator->fails()) {
                        return Response::json(array('code' => $code, 'msg' => $validator->errors()->messages(), 'data' => null));
                    }
                $product_details = Products::where('id',$request->product_id)->first();
                if(!$product_details)
                {
                   return Response::json(array('code' => $code, 'msg' => 'Invalid product', 'data' => null));  
                }
		//print_r($user);exit;
		$check_already_in_cart = Rent::where('user_id',$user->id)->where('product_id',$request->product_id)->where('status','=','Cart')->first();
		//print_r($check_already_in_cart->toArray());exit;
		if(count($check_already_in_cart)==0) {
			$product_details = Products::where('id',$request->product_id)->first();
			$date1=date_create($request->rental_start_date);
			$date2=date_create($request->rental_end_date);
			$diff=date_diff($date1,$date2);
			$total_days = $diff->format("%a");
			$total_days+=1;
			//echo $days;exit;
			
			if(!isset($request->street_number) || $request->street_number==null) {
				$request->street_number = "";
			}
			
//			if(!isset($request->route) || $request->route==null) {
//				$request->route= "";
//			}
			
			if(!isset($request->address2) || $request->address2==null) {
				$request->address2= "";
			}
			
			/*if(!isset($request->address3) || $request->address3==null) {
				$request->address3= "";
			}*/
			
			if(!isset($request->city) || $request->city==null) {
				$request->city= "";
			}
			
			if(!isset($request->state) || $request->state==null) {
				$request->state= "";
			}
			
			if(!isset($request->postal_code) || $request->postal_code==null) {
				$request->postal_code= "";
			}
			
			if(!isset($request->country) || $request->country==null) {
				$request->country= "";
			}
			
			if(!isset($request->contact_number) || $request->contact_number==null) {
				$request->contact_number= "";
			}
			
			if(!isset($request->email) || $request->email==null) {
				$request->email= "";
			}
			
			if(!isset($request->description) || $request->description==null) {
				$request->description= "";
			}

			$add_cart = new Rent;
			$add_cart->user_id = $user->id;
			$add_cart->product_id = $request->product_id;
			$add_cart->delivery_option = $request->delivery_option;
			$add_cart->rental_start_date = date('m/d/Y',strtotime($request->rental_start_date));
			$add_cart->rental_end_date = date('m/d/Y',strtotime($request->rental_end_date));
			$add_cart->street_number = $request->street_number;
//			$add_cart->route = $request->route;
			$add_cart->address2 = $request->address2;
//			$add_cart->address3 = $request->address3;
			$add_cart->city = $request->city;
			$add_cart->state = $request->state;
			$add_cart->postal_code = $request->postal_code;
			$add_cart->country = $request->country;
			$add_cart->contact_number = $request->contact_number;
			$add_cart->email = $request->email;
			$add_cart->description = $request->description;
			$add_cart->total = ($total_days * $product_details->price);
			$add_cart->status = "Cart";
			$add_cart->save();
			$code = SUCCESS;
			$msg = "Product Added in cart successfully.";
			
		}
		return Response::json(array('code' => $code,'msg' => $msg,'data' => (object)$response));
	}
	
	public function postRemoveCart(Request $request) {
		$code = UNSUCCESS;
		$msg = "Product not found in the cart";
		$user = auth()->guard('api')->user();
		$response = array(); 
                    $rules = [];
                    $rules['product_id'] = 'required';
		  $validator = Validator::make($request->all(), $rules);
                if ($validator->fails()) {
                        return Response::json(array('code' => $code, 'msg' => $validator->errors()->messages(), 'data' => null));
                    }
		$check_product_in_cart = Rent::where('product_id',$request->product_id)->where('user_id',$user->id)->where('status','Cart')->first();
		if(count($check_product_in_cart)>0) {
			Rent::deleteData($check_product_in_cart->id);
			$code = SUCCESS;
			$msg = "Product removed to the cart Successfully.";
		}
		return Response::json(array('code' => $code,'msg' => $msg,'data' => (object)$response));
	}
	
	public function postEmptyCart(Request $request) {
		$code = SUCCESS;
		$msg = "Your cart is empty.";
		$user = auth()->guard('api')->user();
		$response = array();
		
		$check_product_in_cart = Rent::where('user_id',$user->id)->where('status','Cart')->first();
		if(count($check_product_in_cart)>0) {
			Rent::emptyData($user->id);
			$code = SUCCESS;
			$msg = "Your cart is empty.";
		}
		return Response::json(array('code' => $code,'msg' => $msg,'data' => (object)$response));
	}
	
	
	
	public function getCartList(Request $request) {
		$code = UNSUCCESS;
		$msg = "Cart empty.";
		$user = auth()->guard('api')->user();
		$response = array();
		//print_r($user);
		$this->data['body_type']    =   '';
	        $this->data['size']         =   '';
	        $this->data['price']        =   Products::max('price');
	        $this->data['per']          =   1;
	        $this->data['location']     =   '';
	        $this->data['height']       =   '';
	        $this->data['season']       =   '';
	        $this->data['category']     =   '';
	
	        if ($request->has('body_type'))     { $this->data['body_type']  = $request->body_type;  }
	        if ($request->has('size'))          { $this->data['size']       = $request->size;       }
	        if ($request->has('price'))         { $this->data['price']      = $request->price;  }
	        if ($request->has('per'))           { $this->per($request);                             }
	        if ($request->has('location'))      { $this->data['location']   = $request->location;   }
	        if ($request->has('height'))        { $this->data['height']     = $request->height;     }
	        if ($request->has('season'))        { $this->data['season']     = $request->season;     }
	        if ($request->has('category'))      { $this->data['category']   = $request->category;   }
		//$data = Rent::select('id')->where('user_id', $user->id)->where('status', '!=', 'Cart')->get();
		//print_r($data);
	        $this->data['budget']       =   $this->data['price']/$this->data['per'];
		$this->data['categories'] = Categories::where('status',1)->get();
	        $cart_list = Rent::groupBy('rent_details.id','products.id')
	                                            ->leftjoin('products', 'rent_details.product_id', '=', 'products.id')
	                                            ->leftjoin('product_categories','products.id','=','product_categories.product_id')
	                                            ->leftjoin('categories','product_categories.category_id','=','categories.id')
	                                            ->leftjoin('users','products.user_id','=','users.id')
	                                            ->where('rent_details.user_id', '=', $user->id )
	                                            ->where('categories.name', 'LIKE', '%' . $this->data['category'] . '%')
	                                            ->where('users.body_type', 'LIKE', '%' . $this->data['body_type'] . '%')
	                                            ->where('products.size', 'LIKE', '%' . $this->data['size'] . '%')
	                                            ->where('products.price', '<=', $this->data['budget'])
	                                            ->whereNotIn('rent_details.id', Rent::select('id')->where('user_id', $user->id)->where('status', '!=', 'Cart')->get())
	                                            ->where('users.location', 'LIKE', '%' . $this->data['location'] . '%')
	                                            ->where('users.height', 'LIKE', '%' . $this->data['height'] . '%')
	                                            ->where('products.season', 'LIKE', '%' . $this->data['season'] . '%')
	                                            ->select('rent_details.id as cartID',
	                                                     'products.id as productID')
	                                            ->get();    
	         if(count($cart_list)>0) {
	         	$cart_list_id = array_pluck($cart_list,'cartID');
	         	
	         	$cart_list = Rent::whereIn('id',$cart_list_id)->with(['product_detail'=>function($query){
	         		$query->select('id','user_id','name','price','picture')->with(['user_detail'=>function($query){
					$query->select('id','first_name','last_name');
				}]);
	         	}])->get()->toArray();
	         	//echo "here";
	         	$cart_list = array_map(function($v){
			        return (is_null($v)) ? "" : $v;
			    },$cart_list);
	         	$response['cart_list'] = $cart_list;
	         	$code =SUCCESS;
			$msg = "Cart found successfully.";
	         }        	                           
	        //
		return Response::json(array('code' => $code,'msg' => $msg,'data' => (object)$response));
	}
	
	public function postMakeOrder(Request $request) {
		$code = UNSUCCESS;
		$msg = "Cart empty";
		$user = auth()->guard('api')->user();
		$response = array();
		
		$this->data['body_type'] =   '';
	        $this->data['size'] =   '';
	        $this->data['budget'] =   Products::max('price');
	        $this->data['location']     =   '';
	        $this->data['height']       =   '';
	        $this->data['season']       =   '';
	        $this->data['category']     =   '';
	        
	            $rent_data = Rent::groupBy('rent_details.id','products.id')
	            ->leftjoin('products', 'rent_details.product_id', '=', 'products.id')
	            ->leftjoin('product_categories','products.id','=','product_categories.product_id')
	            ->leftjoin('categories','product_categories.category_id','=','categories.id')
	            ->leftjoin('users','products.user_id','=','users.id')
	            ->where('rent_details.user_id', '=', $user->id )
	            ->where('rent_details.status','Cart')
	            ->where('categories.name', 'LIKE', '%' . $this->data['category'] . '%')
	            ->where('users.body_type', 'LIKE', '%' . $this->data['body_type'] . '%')
	            ->where('products.size', 'LIKE', '%' . $this->data['size'] . '%')
	            ->where('products.price', '<=', $this->data['budget'])
	            ->where('users.location', 'LIKE', '%' . $this->data['location'] . '%')
	            ->where('users.height', 'LIKE', '%' . $this->data['height'] . '%')
	            ->where('products.season', 'LIKE', '%' . $this->data['season'] . '%')
	            ->select('rent_details.id as rentID',
	                     'products.id as productID')
	            ->get(); 
	            
	            if(count($rent_data)>0) {
	            	$success = true;
	            	foreach($rent_data as $value) {
	            		$product_data = Products::where('id', $value->productID)->first();
            			$user_data = User::where('id',$product_data->user_id)->first();
            			 if($user_data->paypal_email_address=='') {
			            	$success = false;
			            	$msg = "Merchant not added paypal account. Please contact to admin.";
			        } else {
			        	$ch = curl_init();

					$ppUserID = API_USER_ID; //Take it from   sandbox dashboard for test mode or take it from paypal.com account in production mode, help: https://developer.paypal.com/docs/classic/api/apiCredentials/
					$ppPass = API_USER_PASS; //Take it from sandbox dashboard for test mode or take it from paypal.com account in production mode, help: https://developer.paypal.com/docs/classic/api/apiCredentials/
					$ppSign = API_USER_SIGN; //Take it from sandbox dashboard for test mode or take it from paypal.com account in production mode, help: https://developer.paypal.com/docs/classic/api/apiCredentials/
					$ppAppID = API_APP_ID; //if it is sandbox then app id is always: APP-80W284485P519543T
					$sandboxEmail = API_SANDBOX_EMAIL; //comment this line if you want to use it in production mode.It is just for sandbox mode
					
					//$emailAddress = "sunil@rudrainnovatives.com"; //The email address you wana verify
					$emailAddress = $user_data->paypal_email_address; //The email address you wana verify
					//parameters of requests
					$nvpStr = 'emailAddress='.$emailAddress.'&matchCriteria=NONE';
					
					// RequestEnvelope fields
					$detailLevel    = urlencode("ReturnAll");
					$errorLanguage  = urlencode("en_US");
					$nvpreq = "requestEnvelope.errorLanguage=$errorLanguage&requestEnvelope.detailLevel=$detailLevel&";
					$nvpreq .= "&$nvpStr";
					curl_setopt($ch, CURLOPT_POSTFIELDS, $nvpreq);
					
					$headerArray = array(
					"X-PAYPAL-SECURITY-USERID:$ppUserID",
					"X-PAYPAL-SECURITY-PASSWORD:$ppPass",
					"X-PAYPAL-SECURITY-SIGNATURE:$ppSign",
					"X-PAYPAL-REQUEST-DATA-FORMAT:NV",
					"X-PAYPAL-RESPONSE-DATA-FORMAT:JSON",
					"X-PAYPAL-APPLICATION-ID:$ppAppID",
					"X-PAYPAL-SANDBOX-EMAIL-ADDRESS:$sandboxEmail" //comment this line in production mode. IT IS JUST FOR SANDBOX TEST 
					);
					
					$url="https://svcs.sandbox.paypal.com/AdaptiveAccounts/GetVerifiedStatus";
					curl_setopt($ch, CURLOPT_URL,$url);
					curl_setopt($ch, CURLOPT_POST, 1);
					curl_setopt($ch, CURLOPT_VERBOSE, 1);
					curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
					curl_setopt($ch, CURLOPT_HTTPHEADER, $headerArray);
					$paypalResponse = curl_exec($ch);
                                       // var_dump($headerArray,$nvpreq);die();
					 //echo $paypalResponse;   //if you want to see whole PayPal response then uncomment it.
					curl_close($ch);
					
					$data = json_decode($paypalResponse);
					
					if($data) {
						if($data->responseEnvelope->ack=='Failure') {
							$success = false;
			            			$msg = "paypal account not verified. please verify paypal account.";
						} 
					}
			        }
                                  
                                 
	            	}
                                
                               
	            	if($success==true) {
		            	foreach($rent_data as $value) {
		            		Rent::manageData($value->rentID, 'Pending');

                            $product_data = Products::where('id', $value->productID)->with('user_detail')->first();

                            $link2 = url('for-rent/booking-list/' . $product_data->id);
                            $name = $product_data->user_detail->first_name . " " . $product_data->user_detail->last_name;

                            $rent_data = Rent::orderby('id', 'desc')->first();
	            			Notification::addData($product_data->user_id, $user->id, $rent_data->id, 'Rented your item', 'New product are now pending for approval.', 'rental_request');
	            			Notification::sendEmail("Rented your item", "New product are now pending for approval.", $product_data->user_detail->email, $link2, $name);
	            			$user_device_token = DeviceToken::where('user_id',$product_data->user_id)->get();
	            			if(count($user_device_token)>0) {
	            				foreach($user_device_token as $key=>$value) {
	            					if($value->device_type=="Android") {
	            						$fields = array(
						                    'to' => $value->device_token,
						                    'data' => array("message"=>'New product are now pending for approval.', 'rental_request','title'=>"Rented your item")
						                   );
						        	sendPushNotification($fields);
	            					}
	            				}
	            			}
	            			//Notification::addData($user->id,$product_data->user_id, $rent_data->id, 'One new item rented', 'One new item rented', 'rental_request_sent');
		            	}
		            	$code = SUCCESS;
		            	$msg = "Order is placed successfully and items are now pending for approval.";
		            }
	            }
			
		return Response::json(array('code' => $code,'msg' => $msg,'data' => (object)$response));
	}
	
	public function postGeneratePayId(Request $request) {
		$code = UNSUCCESS;
		$msg = "Rented detail not found.";
		$user = auth()->guard('api')->user();
		//echo $user->first_name.' '.$user->last_name;
		$response = array();
		$rented_id = $request->rented_id;
		
		$rented_detail = Rent::where('id',$rented_id)->first();
		$product_detail = Products::where('id',$rented_detail->product_id)->first();
		
		//echo $product_detail->id.":";
		$user_detail = User::where('id',$product_detail ->user_id)->first();
		//echo $user_detail->id;exit;
		//print_r($rented_detail);
		if(count($rented_detail)>0) {
			//$user_detail = User::where('id',$rented_detail->user_id)->first();
			$curl = curl_init();
			$admin_amount = $rented_detail->total;
			$merchant_amount = ($admin_amount*90)/100;
			$cancel_url = url('my-cart/cancel');
			$success_url = url('my-cart/success');
			
			$url = URL."?actionType=".ACTION_TYPE."&clientDetails.applicationId=".APP_ID."&clientDetails.ipAddress=".IP_ADDRESS."&currencyCode=".API_CURRENCY_CODE."&feesPayer=".FEES_PAYER."&memo=Example&receiverList.receiver(0).amount=".$admin_amount."&receiverList.receiver(0).email=".API_ADMIN_EMAIL."&receiverList.receiver(0).primary=true&receiverList.receiver(1).amount=".$merchant_amount."&receiverList.receiver(1).email=".$user_detail->paypal_email_address."&receiverList.receiver(1).primary=false&requestEnvelope.errorLanguage=en_US&returnUrl=".SUCCESS_URL."&cancelUrl=".CANCEL_URL;
			$input = array(
    "actionType" => ACTION_TYPE,
    "currencyCode" => API_CURRENCY_CODE,
    "feesPayer" => FEES_PAYER,
    "cancelUrl" => CANCEL_URL, //test url
    "returnUrl" => SUCCESS_URL, //test url
    "receiverList" => array(    
        array( //send primary receiver $15
            "amount" => $admin_amount,
            "email" => API_ADMIN_EMAIL,
            "primary" => true
        ),
        array( //send owner of site $1 commission
            "amount" => $merchant_amount,
            "email" => $user_detail->paypal_email_address,
            "primary" => false
        )
    ),
    "requestEnvelope" => array(
        "errorLanguage" => "en_US"
    )
);
			//echo $url;exit;
			curl_setopt_array($curl, array(
			  CURLOPT_URL => $url,
			  CURLOPT_RETURNTRANSFER => true,
			  CURLOPT_ENCODING => "",
			  CURLOPT_MAXREDIRS => 10,
			  CURLOPT_TIMEOUT => 30,
			  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
			  CURLOPT_CUSTOMREQUEST => "GET",
			  CURLOPT_HTTPHEADER => array(
			    "cache-control: no-cache",
			    "postman-token: de2b4e53-134d-d492-600a-220120b879a5",
			    "x-paypal-application-id: ". API_APP_ID ,//APP-80W284485P519543T",
			    "x-paypal-request-data-format: NV",
			    "x-paypal-response-data-format: JSON",
			    "x-paypal-security-password: " . API_USER_PASS, //AWV9D3FATHQN9LCF",
			    "x-paypal-security-signature: ".API_USER_SIGN,//A76bwlv2Z01mOclk1JxeCgsePvJ8AeHFAIIl50UGOc2vL789Duw9RUIj",
			     "x-paypal-security-userid: ".API_USER_ID // "x-paypal-security-userid: vishal.patel-facilitator_api1.mitajacorp.com"
                            ),
                            
			));
			//curl_setopt($curl, CURLOPT_POSTFIELDS, json_encode($input));
			$response_data = curl_exec($curl);
			$err = curl_error($curl);
                       
			curl_close($curl);
			
			if ($err) {
				$msg = 'Internal Server Error :'.$err;
			} else {
				$response_data = json_decode($response_data);
				if($response_data->responseEnvelope->ack=="Failure") {
					$msg = $response_data->error[0]->message;
				} else {
					$payKey = $response_data->payKey;
					$msg = "paykey generated successfully.";
					$code = SUCCESS;
					$response['pay_key'] = $payKey;
				}
			}
		}
		
		return Response::json(array('code' => $code,'msg' => $msg,'data' => (object)$response));
		
	}
}