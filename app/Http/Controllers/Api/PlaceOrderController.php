<?php

namespace App\Http\Controllers\Api;

use App\Models\DeviceToken;
use App\models\Notification\Notification;
use App\Models\Products\Products;
use App\models\Rent\Rent;
use Braintree_Gateway;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PlaceOrderController extends Controller
{

    /**
     * @author Syed Faisal <sfkazmi0@gmail.com>
     * @var Braintree_Gateway
     */
    private $gateway;

    public function __construct()
    {
        $this->gateway = new Braintree_Gateway([
            'environment' => 'sandbox',
            'merchantId' => 'n8ddpcttdt3zcyzc',
            'publicKey' => 'tnhcpwkq3m3knm59',
            'privateKey' => 'e6f42d61407327f22420d98cfc59e88c'
        ]);

    }

    public function placeOrderNew(Request $request)
    {
        $user = auth()->guard('api')->user();
        $nonceFromTheClient = $request->payment_method_nonce;

        $rentDetails = Rent::where('user_id',$user->id)->where('status','=','Cart')->first();

        if (count($rentDetails)){

            foreach ($rentDetails as $rentDetail){
                $result = $this->gateway->transaction()->sale([
                    'amount' => number_format($rentDetail->total,2),
                    'paymentMethodNonce' => $nonceFromTheClient,
                    'orderId' => $rentDetail->id,
                    'options' => [
                        'submitForSettlement' => True
                    ]
                ]);

                if (isset($result->success) && $result->success == true){

                    Rent::manageData($rentDetail->id, 'Pending');

//                    $product_data = Products::where('id', $rentDetail->product_id)->with('user_detail')->first();

//                    $link2 = url('for-rent/booking-list/' . $product_data->id);
//
//                    $name = $product_data->user_detail->first_name . " " . $product_data->user_detail->last_name;

//                    Notification::addData($product_data->user_id, $user->id, $rentDetail->id, 'Rented your item', 'New product are now pending for approval.', 'rental_request');
//                    Notification::sendEmail("Rented your item", "New product are now pending for approval.", $product_data->user_detail->email, $link2, $name,$product_data->user_detail);
                    $user_device_token = DeviceToken::where('user_id',$rentDetails->user_id)->get();
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
                }
            }

            return [
                'code' => SUCCESS,
                'msg' => 'Order is placed successfully and items are now pending for approval.',
                'data' => []
            ];
        }

        return [
            'code' => UNSUCCESS,
            'msg' => 'Cart Empty'
        ];
    }

    public function getClientToken()
    {
        $clientToken =  $this->gateway->clientToken()->generate();

        return [
            'code' => 200,
            'msg' => 'Token Fetched Successfully',
            'data' => [
                'client_token' => $clientToken
            ],
        ];
    }

}
