<?php

namespace App\Http\Controllers\UserInterface;

use App\Functions\PaypalConfig;
use App\Models\Paypal\TransactionFactory;
use App\models\Rent\RentTransactionDetail;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Input;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Helper;

use App\Models\Validators;
use App\Models\Notification\Notification;
use App\Models\Wishlist\Wishlist;
use App\Models\Categories;
use App\Models\Cart\Cart;
use App\User;
use App\Models\Rent\Rent;
use App\Models\Products\Products;
use App\Models\Pages\PageContent;
use App\Models\DeviceToken;

use Auth;
use Crypt,Session;
use Illuminate\Support\Facades\Mail;
use PayPal\Api\Amount;
use PayPal\Api\Payer;
use PayPal\Api\Payment;
use PayPal\Api\PaymentExecution;
use PayPal\Api\RedirectUrls;
use PayPal\Api\RefundRequest;
use PayPal\Api\Sale;
use PayPal\Auth\OAuthTokenCredential;
use PayPal\Exception\PayPalConnectionException;
use PayPal\Rest\ApiContext;

class CartController extends Controller{

    function getIndex(Request $request)
    {

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

        $this->data['budget']     = $this->data['price'] / $this->data['per'];
        $this->data['categories'] = Categories::where('status', 1)->get();

        $this->data['cart'] = Rent::groupBy('rent_details.id','products.id')
                                            ->leftjoin('products', 'rent_details.product_id', '=', 'products.id')
                                            ->leftjoin('product_categories','products.id','=','product_categories.product_id')
                                            ->leftjoin('categories','product_categories.category_id','=','categories.id')
                                            ->leftjoin('users','products.user_id','=','users.id')
                                            ->where('rent_details.user_id', '=', Auth::user()->id )
//                                            ->where('categories.name', 'LIKE', '%' . $this->data['category'] . '%')
//                                            ->where('users.body_type', 'LIKE', '%' . $this->data['body_type'] . '%')
//                                            ->where('products.size', 'LIKE', '%' . $this->data['size'] . '%')
//                                            ->where('products.price', '<=', $this->data['budget'])
//                                            ->whereNotIn('rent_details.id', Rent::select('id')->where('user_id', Auth::user()->id)->where('status', '!=', 'Cart')->get())
//                                            ->where('users.location', 'LIKE', '%' . $this->data['location'] . '%')
//                                            ->where('users.height', 'LIKE', '%' . $this->data['height'] . '%')
//                                            ->where('products.season', 'LIKE', '%' . $this->data['season'] . '%')
                                            ->where('rent_details.status', 'Cart')
                                            ->select('rent_details.id as cartID',
                                                     'products.id as productID')
                                            ->paginate(3);                                        

        $this->data['product_owner'] = Rent::groupBy('users.id')
                                            ->leftjoin('products', 'rent_details.product_id', '=', 'products.id')
                                            ->leftjoin('product_categories','products.id','=','product_categories.product_id')
                                            ->leftjoin('categories','product_categories.category_id','=','categories.id')
                                            ->leftjoin('users','products.user_id','=','users.id')
                                            ->where('rent_details.user_id', '=', Auth::user()->id )
//                                            ->where('categories.name', 'LIKE', '%' . $this->data['category'] . '%')
//                                            ->where('users.body_type', 'LIKE', '%' . $this->data['body_type'] . '%')
//                                            ->where('products.size', 'LIKE', '%' . $this->data['size'] . '%')
//                                            ->where('products.price', '<=', $this->data['budget'])
//                                            ->whereNotIn('rent_details.id', Rent::select('id')->where('user_id', Auth::user()->id)->where('status', '!=', 'Cart')->get())
//                                            ->where('users.location', 'LIKE', '%' . $this->data['location'] . '%')
//                                            ->where('users.height', 'LIKE', '%' . $this->data['height'] . '%')
//                                            ->where('products.season', 'LIKE', '%' . $this->data['season'] . '%')
                                            ->where('rent_details.status', 'Cart')
                                            ->select('users.id as userID')
                                            ->get();

        $this->data['page_content'] = PageContent::getData('none',10);

        return view('user-interface.cart.index', $this->data);
    }


    function displayCart($id) {

        $productId = Rent::find($id)->product_id;

        $data['cartID'] = $id;
        $data['productID'] = $productId;

        return view('user-interface.cart.display-cart', $data);
    }



    function per($request){
        switch ($request->per) {
            case 'per_day':
                $this->data['per'] = 1;
                break;
            case 'per_week':
                $this->data['per'] = 7;
                break;
            case 'per_month':
                $this->data['per'] = 30;
                break;
            default:
                $this->data['per'] = 1;
                break;
        }
    }

    function getAddToCart(Request $request)
    {
//        if($request->delivery_option == 'Ups'){
//            Helper::flashMessage('',$request->delivery_option,'success');
//            return response()->json(["result" => 'success']);
//        }
//        else{
        $validator = Validators::frontendValidate($request, "rent");
        if ($validator === true) {
            //print_r($request->all());exit;
            $product_details = Products::where('id', $request->productID)->first();
            $date1           = date_create($request->start_date);
            $date2           = date_create($request->end_date);

            if(!$date1 || !$date2) {
                return response()->json(["result" => 'failed', "errors" => ['Date' => ['Re-Fill rental period days']]]);
            }

            $diff            = date_diff($date1, $date2);
            $total_days      = $diff->format("%a");
            $total_days      += 1;
            $total           = ($total_days * $product_details->price);
            $request->total  = $total;
            Rent::addData($request);
            Helper::flashMessage('Great!', 'You have added an item to your Cart.', 'success');
            return response()->json(["result" => 'success']);
        }
        return response()->json(["result" => 'failed', "errors" => $validator->errors()->messages()]);
//        }
        
        
    }

    function changeDelivery (Request $req) {
        $opt = $req->input('value');
        $id = $req->input('id');

        $rentDetail = Rent::where('id', $id)->update(['delivery_option' => $opt]);
        Helper::flashMessage('Great!', 'You have Successfully Changed the Delivery Option.', 'success');
        return response()->json(["result" => 'success']);
    }

    function getDeleteToCart(Request $request)
    {
        /*$cart_data = Cart::where('product_id', Crypt::decrypt($request->product_id))->where('user_id',  Auth::user()->id)->first();
        $data = $cart_data->id;
        Cart::deleteData($data);

        return response()->json([ "result"  => 'success' ]);*/
        
        $cart_data = Rent::where('product_id', Crypt::decrypt($request->product_id))->where('user_id',  Auth::user()->id)->first();
        $data = $cart_data->id;
        Rent::deleteData($data);

        return response()->json([ "result"  => 'success' ]);
    }

    function getCheckout(Request $request)
    {        
    	//Session::put('cart_request',$request);
        $this->data['body_type']    =   '';
        $this->data['size']         =   '';
        $this->data['budget']           =   Products::max('price');
        $this->data['location']     =   '';
        $this->data['height']       =   '';
        $this->data['season']       =   '';
        $this->data['category']     =   '';

        if ($request->has('body_type'))     { $this->data['body_type']  = $request->body_type;  }
        if ($request->has('size'))          { $this->data['size']       = $request->size;       }
        if ($request->has('budget'))        { $this->data['budget']     = $request->budget;     }
        if ($request->has('location'))      { $this->data['location']   = $request->location;   }
        if ($request->has('height'))        { $this->data['height']     = $request->height;     }
        if ($request->has('season'))        { $this->data['season']     = $request->season;     }
        if ($request->has('category'))      { $this->data['category']   = $request->category;   }

        
        $rent_data = Rent::groupBy('rent_details.id','products.id')
                                            ->leftjoin('products', 'rent_details.product_id', '=', 'products.id')
                                            ->leftjoin('product_categories','products.id','=','product_categories.product_id')
                                            ->leftjoin('categories','product_categories.category_id','=','categories.id')
                                            ->leftjoin('users','products.user_id','=','users.id')
                                            ->where('rent_details.user_id', '=', Auth::user()->id )
                                            ->where('rent_details.status','Cart')
                                            ->where('categories.name', 'LIKE', '%' . $this->data['category'] . '%')
                                            ->where('users.body_type', 'LIKE', '%' . $this->data['body_type'] . '%')
                                            ->where('products.size', 'LIKE', '%' . $this->data['size'] . '%')
//                                            ->where('products.price', '<=', $this->data['budget'])
                                            ->where('users.location', 'LIKE', '%' . $this->data['location'] . '%')
                                            ->where('users.height', 'LIKE', '%' . $this->data['height'] . '%')
                                            ->where('products.season', 'LIKE', '%' . $this->data['season'] . '%')
                                            ->select('rent_details.id as rentID',
                                                     'products.id as productID')
                                            ->get(); 
         //echo "<pre>";
         //print_r($rent_data);        exit;                                                    
        /*foreach($rent_data as $value) {
            if(count(Products::getData($value->productID)->availability) != 0){
                Helper::flashMessage('Failed!','There are items unavailable for rental.','error');
                return back();
            }
        }*/

	//Helper::flashMessage('Failed!','Merchant not added paypal account. Please contact to admin.','error');
            	
                //return back();
	$cart_total = $request->total;
	//Session::put('cart_total',$cart_total);
	
        foreach($rent_data as $value) {
            
            /*Rent::manageData($value->rentID, 'Pending');
            Helper::flashMessage('Great!','Items are now pending for approval.','success');

            $product_data = Products::where('id', $value->productID)->first();
            $rent_data = Rent::orderby('id', 'desc')->first();   
            Notification::addData($product_data->user_id, Auth::user()->id, $rent_data->id, 'Rented your item', 'Your items are now pending for approval.', 'rental_request');
            Notification::addData(Auth::user()->id,$product_data->user_id, $rent_data->id, 'One new item rented', 'One new item rented', 'rental_request_sent');*/
            
            $product_data = Products::where('id', $value->productID)->first();
            $user_data = User::where('id',$product_data->user_id)->first();
            //echo $cart_total;
            //print_r($user_data);
            
            if($user_data->paypal_email_address=='') {
            	Helper::flashMessage('Failed!','Merchant not added paypal account. Please contact to admin.','error');
            	
                return redirect()->to('my-cart');
            } else {
            		$curl = curl_init();
			$admin_amount = $cart_total;
			$merchant_amount = ($admin_amount*90)/100;
			$cancel_url = url('my-cart/cancel');
			$success_url = url('my-cart/success');
			//echo $cancel_url.":".$merchant_amount;
			//exit;
			$url = "https://svcs.sandbox.paypal.com/AdaptivePayments/Pay?actionType=PAY_PRIMARY&clientDetails.applicationId=APP-80W284485P519543T&clientDetails.ipAddress=127.0.0.1&currencyCode=USD&feesPayer=EACHRECEIVER&memo=Example&receiverList.receiver(0).amount=".$admin_amount."&receiverList.receiver(0).email=vishal.patel-facilitator%40mitajacorp.com&receiverList.receiver(0).primary=true&receiverList.receiver(1).amount=".$merchant_amount."&receiverList.receiver(1).email=".$user_data->paypal_email_address."&receiverList.receiver(1).primary=false&requestEnvelope.errorLanguage=en_US&returnUrl=".$success_url."&cancelUrl=".$cancel_url;
			
			echo $url;exit;
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
			    "x-paypal-application-id: APP-80W284485P519543T",
			    "x-paypal-request-data-format: NV",
			    "x-paypal-response-data-format: JSON",
			    "x-paypal-security-password: AWV9D3FATHQN9LCF",
			    "x-paypal-security-signature: A76bwlv2Z01mOclk1JxeCgsePvJ8AeHFAIIl50UGOc2vL789Duw9RUIj",
			    "x-paypal-security-userid: vishal.patel-facilitator_api1.mitajacorp.com"
			  ),
			));
			
			$response = curl_exec($curl);
			$err = curl_error($curl);
			
			curl_close($curl);
			
			if ($err) {
			//echo "here";exit;
			Helper::flashMessage('Failed!','Internal Server Error :'.$err,'error');
                	return redirect()->to('my-cart');
                	//return back()->with(['session_header'=>'Failed!','session_content'=>'Internal Server Error :'.$err,'session_boolean'=>'error']);
			  //echo "cURL Error #:" . $err;
			} else {
			  //echo $response;
			  $response = json_decode($response);
			  //echo "<pre>";
			  //print_r($response);
			  //echo $response->responseEnvelope->ack;
			  if($response->responseEnvelope->ack=="Failure") {
			  	//echo $response->error[0]->message;exit; 
			  	Helper::flashMessage('Failed!',$response->error[0]->message,'error');
                		return redirect()->to('my-cart');
                		//return back();
                		
                		//return back()->with(['session_header'=>'Failed!','session_content'=>$response->error[0]->message,'session_boolean'=>'error']);
			  } else {
			  	$payKey = $response->payKey;
			  	//echo "here";
			  	//echo $payKey;
			  	//exit;
			  	//Session::put('payKey',$payKey);
			  	//echo Session::get('payKey');exit;
			  	//echo $value->rentID;exit;
			  	Rent::where('id',$value->rentID)->update(array('cart_total'=>$cart_total,'pay_key'=>$payKey));
			  	return redirect()->to('https://www.sandbox.paypal.com/cgi-bin/webscr?cmd=_ap-payment&paykey='.$payKey);
			  }
			}
            }
            
        }
        //return back();
        
        
    }
    
    public function payment_success() {
    	$request = Session::get('cart_request');
    	
    	$this->data['body_type']    =   '';
        $this->data['size']         =   '';
        $this->data['budget']           =   Products::max('price');
        $this->data['location']     =   '';
        $this->data['height']       =   '';
        $this->data['season']       =   '';
        $this->data['category']     =   '';

        /*if ($request->has('body_type'))     { $this->data['body_type']  = $request->body_type;  }
        if ($request->has('size'))          { $this->data['size']       = $request->size;       }
        if ($request->has('budget'))        { $this->data['budget']     = $request->budget;     }
        if ($request->has('location'))      { $this->data['location']   = $request->location;   }
        if ($request->has('height'))        { $this->data['height']     = $request->height;     }
        if ($request->has('season'))        { $this->data['season']     = $request->season;     }
        if ($request->has('category'))      { $this->data['category']   = $request->category;   }

        */
        $rent_data = Rent::groupBy('rent_details.id','products.id')
                                            ->leftjoin('products', 'rent_details.product_id', '=', 'products.id')
                                            ->leftjoin('product_categories','products.id','=','product_categories.product_id')
                                            ->leftjoin('categories','product_categories.category_id','=','categories.id')
                                            ->leftjoin('users','products.user_id','=','users.id')
                                            ->where('rent_details.user_id', '=', Auth::user()->id )
                                            ->where('rent_details.status','Cart')
                                            ->where('categories.name', 'LIKE', '%' . $this->data['category'] . '%')
                                            ->where('users.body_type', 'LIKE', '%' . $this->data['body_type'] . '%')
                                            ->where('products.size', 'LIKE', '%' . $this->data['size'] . '%')
//                                            ->where('products.price', '<=', $this->data['budget'])
                                            ->where('users.location', 'LIKE', '%' . $this->data['location'] . '%')
                                            ->where('users.height', 'LIKE', '%' . $this->data['height'] . '%')
                                            ->where('products.season', 'LIKE', '%' . $this->data['season'] . '%')
                                            ->select('rent_details.id as rentID',
                                                     'products.id as productID')
                                            ->get(); 
       foreach($rent_data as $value) {
            if(count(Products::getData($value->productID)->availability) != 0){
                Helper::flashMessage('Failed!','There are items unavailable for rental.','error');
               	return redirect()->to('my-cart');
            }
        }
        
        foreach($rent_data as $value) {
        //$payKey = Session::get('payKey');
    	//$cart_total = Session::get('cart_total');
            //echo $payKey;exit;
            Rent::manageData($value->rentID, 'Pending');
            Helper::flashMessage('Great!','Payment Successfully and Items are now pending for approval.','success');

            $product_data = Products::where('id', $value->productID)->first();
            $rent_data = Rent::orderby('id', 'desc')->first();   
            Notification::addData($product_data->user_id, Auth::user()->id, $rent_data->id, 'Rented your item', 'Your items are now pending for approval.', 'rental_request');
            //Notification::addData(Auth::user()->id,$product_data->user_id, $rent_data->id, 'One new item rented', 'One new item rented', 'rental_request_sent');
  
  	}
        return redirect()->to('my-cart');
         
    }
    
    public function payment_cancel() {
    	Helper::flashMessage('Failed!','Payment Cancel...','error');
                		return redirect()->to('my-cart');
    }
    
    function getMakeOrder(Request $request)
    {

    	$msg = "";
        $this->data['body_type']    =   '';
        $this->data['size']         =   '';
        $this->data['budget']           =   Products::max('price');
        $this->data['location']     =   '';
        $this->data['height']       =   '';
        $this->data['season']       =   '';
        $this->data['category']     =   '';

        if ($request->has('body_type'))     { $this->data['body_type']  = $request->body_type;  }
        if ($request->has('size'))          { $this->data['size']       = $request->size;       }
        if ($request->has('budget'))        { $this->data['budget']     = $request->budget;     }
        if ($request->has('location'))      { $this->data['location']   = $request->location;   }
        if ($request->has('height'))        { $this->data['height']     = $request->height;     }
        if ($request->has('season'))        { $this->data['season']     = $request->season;     }
        if ($request->has('category'))      { $this->data['category']   = $request->category;   }

        
        $rent_data = Rent::groupBy('rent_details.id','products.id')
        ->leftjoin('products', 'rent_details.product_id', '=', 'products.id')
        ->leftjoin('product_categories','products.id','=','product_categories.product_id')
        ->leftjoin('categories','product_categories.category_id','=','categories.id')
        ->leftjoin('users','products.user_id','=','users.id')
        ->where('rent_details.user_id', '=', Auth::user()->id )
        ->where('rent_details.status','Cart')
//        ->where('categories.name', 'LIKE', '%' . $this->data['category'] . '%')
//        ->where('users.body_type', 'LIKE', '%' . $this->data['body_type'] . '%')
//        ->where('products.size', 'LIKE', '%' . $this->data['size'] . '%')
        ->where('products.price', '<=', $this->data['budget'])
//        ->where('users.location', 'LIKE', '%' . $this->data['location'] . '%')
//        ->where('users.height', 'LIKE', '%' . $this->data['height'] . '%')
//        ->where('products.season', 'LIKE', '%' . $this->data['season'] . '%')
        ->select('rent_details.id as rentID','products.id as productID')
        ->get();
        
        if($rent_data) {

            foreach ($rent_data as $value) {
                Rent::manageData($value->rentID, 'Pending');
                $product_data = Products::where('id', $value->productID)->with('user_detail')->first();

                $client = Auth::user()->first_name . " " . Auth::user()->last_name;
                $title  = $client . " Rented your item";

                Notification::addData($product_data->user_id, Auth::user()->id, $value->rentID, "Rented your item", 'New product are now pending for approval.', 'rental_request');

                $email        = $product_data->user_detail->email;
                $merchantName = $product_data->user_detail->first_name . ' ' . $product_data->user_detail->last_name;

                $pictureSpltd = explode(' ', $product_data->picture);
                $picture = implode("%20", $pictureSpltd);

                $data['message']    = "New product are now pending for approval.";
                $data['title']      = $title;
                $data['picture']    = $picture;
                $data['link']       = url('for-rent/booking-list/' . $product_data->id);
                $data['name']       = $merchantName;
                $data['user_type']  = "bp";
                $data['product_id'] = $value->productID;
                $data['rented_id']  = $value->rentID;

                Mail::send('emails.notify', compact('data'), function ($m) use ($email, $title) {
                    $m->to($email)->subject('Rent A Suit - ' . $title);
                    $m->from('info@rentsuit.com');
                });

                $user_device_token = DeviceToken::where('user_id', $product_data->user_id)->get();
                if (count($user_device_token) > 0) {
                    foreach ($user_device_token as $key => $value) {
                        if ($value->device_type == "Android") {
                            $fields = array(
                                'to' => $value->device_token,
                                'data' => array("message" => 'New product are now pending for approval.', 'rental_request', 'title' => $title)
                            );
                            sendPushNotification($fields);
                        }
                    }
                }

                }

            Helper::flashMessage('Great!', 'Order is placed successfully and items are now pending for approval.', 'success');
            //return response()->json(["result" => 'success']);
            return redirect()->to('my-cart');
//            }
	            	
//			Helper::flashMessage('Failed!',$msg,'error');
//        		return redirect()->to('my-cart');
        } 
        
        Helper::flashMessage('Failed!','Cart Empty.','error');
        return response()->json(["result" => 'error']);
    }

    public function getOrderPayment(Request $request) {
        $msg = "";
        $this->data['body_type']    =   '';
        $this->data['size']         =   '';
        $this->data['budget']           =   Products::max('price');
        $this->data['location']     =   '';
        $this->data['height']       =   '';
        $this->data['season']       =   '';
        $this->data['category']     =   '';

        if ($request->has('body_type'))     { $this->data['body_type']  = $request->body_type;  }
        if ($request->has('size'))          { $this->data['size']       = $request->size;       }
        if ($request->has('budget'))        { $this->data['budget']     = $request->budget;     }
        if ($request->has('location'))      { $this->data['location']   = $request->location;   }
        if ($request->has('height'))        { $this->data['height']     = $request->height;     }
        if ($request->has('season'))        { $this->data['season']     = $request->season;     }
        if ($request->has('category'))      { $this->data['category']   = $request->category;   }

        $basket = Rent::groupBy('rent_details.id','products.id')
            ->leftjoin('products', 'rent_details.product_id', '=', 'products.id')
            ->leftjoin('product_categories','products.id','=','product_categories.product_id')
            ->leftjoin('categories','product_categories.category_id','=','categories.id')
            ->leftjoin('users','products.user_id','=','users.id')
            ->where('rent_details.user_id', '=', Auth::user()->id )
            ->where('rent_details.status','Cart')
            ->where('products.price', '<=', $this->data['budget'])
            ->select('rent_details.id as rentID','products.id as productID')
            ->get();

        $apiContext = PaypalConfig::getApiContext();

        $redirectUrls = (new RedirectUrls())
            ->setReturnUrl($request->root() .
                "/my-cart/pay-order?category=".$request->category.
                '&body_type='.$request->body_type.
                '&size='.$request->size.
                '&budget='. $request->budget.
                '&location='.$request->location.
                '&height='.$request->height.'&season='.$request->season)
            ->setCancelUrl($request->root() . "/my-cart/");

        try {
            $payment = (new Payment())
                ->addTransaction(TransactionFactory::fromBasket($basket))
                ->setIntent('sale')
                ->setRedirectUrls($redirectUrls)
                ->setPayer((new Payer())->setPaymentMethod('paypal'))
                ->create($apiContext);

            return response()->json([
                "result" => 'success',
                "url" => $payment->getApprovalLink()
            ]);
        } catch (PayPalConnectionException $e) {
            echo ($e->getData());
        }
    }

    public function getPayOrder(Request $request) {
        $apiContext = PaypalConfig::getApiContext();

        //TODO verify everything good :
        // - Is the basket content good ?
        // - Are the price good ?
        $payment = Payment::get($request->paymentId, $apiContext);

        //allow to get the transaction info
        // (user info for tax fee depending of the country
        // allow to show order summary
        //$payment->getPayer()->getPayerInfo()->getCountryCode();

        //to launch the le payment
        $execution = (new PaymentExecution())
            ->setPayerId($request->PayerID)
            ->setTransactions($payment->getTransactions());
            //instead of get the transaction it's possible to create a new one with different tax fee
            //if we detect the user are from another country / state
            //->addTransaction(TransactionFactory::fromBasket($basket, 0.2));
            //if you want to add tax fee add a summary page with the new total
        try {
            $payment->execute($execution, $apiContext);

            $listRentId = json_decode($payment->getTransactions()[0]->getCustom());
            foreach ($listRentId as $rentId) {
                /* @var Rent $rentedDetail */
                $rentedDetail = Rent::where('id', $rentId)->first();
                $rentedDetail->pay_key = $payment->getId();
                //$rentedDetail->status = "Payment Accepted";
                $rentedDetail->save();
            }

            return redirect()->to('my-cart/make-order');
        } catch (PayPalConnectionException $e) {
            echo ($e->getData());
        }
    }

    public function getRefund(Request $request) {
        // type :
        // - full (exept fees) if cancellation
        // - retail, to refund the retail price

        if ($request->has('type') && $request->type !== 'full' && $request->type !== 'retail' && $request->type !== 'custom') {
            return response()->json(["error" => "unknown type"]);
        }
        if (!$request->has('type') || !$request->has('listRendId')) {
            return response()->json(["error" => "missing parameter"]);
        }
        $type = $request->type;

        $listRentId = json_decode($request->listRendId);

        foreach ($listRentId as $rentId) {
            $rentedDetail = Rent::where('id', $rentId)->first();
            $dayQuantity = date_diff(
                date_create($rentedDetail->rental_start_date),
                date_create($rentedDetail->rental_end_date))
                    ->format("%a") + 1;
            $product = Products::where('id', $rentedDetail->product_id)
                ->with('user_detail')
                ->first();

            $category = Categories::where('id', $product->product_categories[0]->category_id)
                ->first();

            if ($rentedDetail->delivery_option === "Localization") {
                $shippingCost = 0;
            } else if($rentedDetail->delivery_option === "Regular mail") {
                $shippingCost = $category->shipping_fee_local;
            } else {
                $shippingCost = $category->shipping_fee_nationwide;
            }
            $refundAmount = ($type === 'full')
                ? ($product->price * $dayQuantity + $product->retail_price + $shippingCost)
                :  $product->retail_price;

            $amt = new Amount();
            $amt->setCurrency('CAD')
                ->setTotal($refundAmount);

            $refundRequest = new RefundRequest();
            $refundRequest->setAmount($amt);

            try {
                $apiContext = PaypalConfig::getApiContext();
                $payment = Payment::get($rentedDetail->pay_key, $apiContext);
                $sale = new Sale();
                $saleId = $payment
                    ->getTransactions()[0]
                    ->getRelatedResources()[0]
                    ->sale->id;
                $sale->setId($saleId);

                // Refund the sale
                $refundedSale = $sale->refundSale($refundRequest, $apiContext);
            } catch (\Exception $e) {
                echo($e->getData());
            }
        }

        echo("Refund Sale $refundedSale->getId() Sale $refundRequest $refundedSale");
        return $refundedSale;
    }

}