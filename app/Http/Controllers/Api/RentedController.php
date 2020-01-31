<?php

namespace App\Http\Controllers\Api;

use App\Functions\PaypalConfig;
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
use Auth,
    Hash,
    Input,
    Session,
    Redirect,
    Mail,
    URL,
    File,
    Str,
    Config,
    DB,
    Response,
    View,
    Validator,
    Twilio;
use Crypt;
use PayPal\Api\Amount;
use PayPal\Api\Details;
use PayPal\Api\Item;
use PayPal\Api\ItemList;
use PayPal\Api\Payer;
use PayPal\Api\Payment;
use PayPal\Api\PaymentExecution;
use PayPal\Api\RedirectUrls;
use PayPal\Api\Transaction;
use PayPal\Exception\PayPalConnectionException;

class RentedController extends ApiBaseController {

    public function getRentedList(Request $request) {
        $code = UNSUCCESS;
        $msg = "Rented list not found.";
        $user = auth()->guard('api')->user();
        $response = array();
        $this->data['sort_index'] = 'rent_details.updated_at';
        $this->data['sort_value'] = 'desc';
        if ($request->has('sort')) {
            $this->sort($request);
        } else {
            $this->data['sort_index'] = 'rent_details.id';
            $this->data['sort_value'] = 'desc';
            //$this->sort($request);	  	
        }
        $total = 4;
        $skip = ($request->page - 1) * $total;

        $rentedTotal = Rent::where('rent_details.user_id', $user->id)->where('rent_details.status', '!=', 'Cart')
                ->leftjoin('products', 'rent_details.product_id', '=', 'products.id')
                ->select(
                        'rent_details.id as clientID', 'products.id as productID', 'rent_details.status as status'
                )->groupBy('rent_details.id', 'rent_details.updated_at', 'rent_details.status', 'products.id', 'products.price', 'products.name')
                ->get();
        $rented_list = Rent::where('rent_details.user_id', $user->id)->where('rent_details.status', '!=', 'Cart')
                        ->leftjoin('products', 'rent_details.product_id', '=', 'products.id')
                        ->select(
                                'rent_details.id as clientID', 'products.id as productID', 'rent_details.status as status'
                        )->groupBy('rent_details.id', 'rent_details.updated_at', 'rent_details.status', 'products.id', 'products.price', 'products.name')
                        ->orderBy($this->data['sort_index'], $this->data['sort_value'])
                        ->skip($skip)->take($total)->get();
        if (count($rented_list) > 0) {
            $product_list = array();
            $rented_list = $rented_list->toArray();
            //print_r($rented_list);

            $rented_id = array();
            //$rented_id = array_pluck($rented_list,'clientID');
            foreach ($rented_list as $key => $value) {
                array_push($rented_id, $value['clientID']);
            }
            //print_r($rented_id);exit;
            foreach ($rented_id as $key => $value) {
                $rented_list = Rent::where('id', $value)->first();

                $product_detail = Products::where('id', $rented_list->product_id)->with(['user_detail' => function($query) {
                                $query->select("id", "contact_number", "location", "body_type", "first_name", "last_name", "profile_picture", "profile_picture_custom_size");
                            }])->first();


                $product_detail->rented_id = $rented_list->id;
                $product_detail->rental_start_date = $rented_list->rental_start_date;
                $product_detail->rental_end_date = $rented_list->rental_end_date;
                $product_detail->status = $rented_list->status;

                $cancellation_flag = "FALSE";

                if ($product_detail->status == "Pending" || $product_detail->status == "Accepted") {
                    $cancellation_flag = "TRUE";
                }
                $product_detail->cancellation_flag = $cancellation_flag;
                $product_list[] = $product_detail;
            }
            $code = SUCCESS;
            $msg = "Rented list found successfully.";
            foreach ($product_list as $key => $value) {
                if ($user) {
                    $check_on_wishlist_or_not = Wishlist::where('product_id', $value->id)->where('user_id', $user->id)->count();
                    $product_list[$key]['on_wishlist'] = 0;
                    if ($check_on_wishlist_or_not > 0) {
                        $product_list[$key]['on_wishlist'] = 1;
                    }
                } else {
                    $product_list[$key]['on_wishlist'] = 0;
                }
                $product_review_avg = ProductUserReview::where('product_id', $value->id)->avg('rating');
                $product_review_avg = round($product_review_avg);
                $product_list[$key]['avg_product_review'] = $product_review_avg;
            }
            //$product_list = $product_list->toArray();
            $product_list = array_map(function($v) {
                return (is_null($v)) ? "" : $v;
            }, $product_list);

            $response['rented_list'] = $product_list;
            $response['page'] = $request->page;
            $response['totale_pages'] = ceil(count($rentedTotal) / $total);
        }



        return Response::json(array('code' => $code, 'msg' => $msg, 'data' => (object) $response));
    }

    function sort($request) {
        switch ($request->sort) {
            case 'date-recently':
                $this->data['sort_index'] = 'rent_details.updated_at';
                $this->data['sort_value'] = 'desc';
                break;
            case 'date-beginning':
                $this->data['sort_index'] = 'rent_details.updated_at';
                $this->data['sort_value'] = 'asc';
                break;
            case 'price-high':
                $this->data['sort_index'] = 'products.price';
                $this->data['sort_value'] = 'desc';
                break;
            case 'price-low':
                $this->data['sort_index'] = 'products.price';
                $this->data['sort_value'] = 'asc';
                break;
            case 'name-asc':
                $this->data['sort_index'] = 'products.name';
                $this->data['sort_value'] = 'asc';
                break;
            case 'name-desc':
                $this->data['sort_index'] = 'products.name';
                $this->data['sort_value'] = 'desc';
                break;
            case 'designer-asc':
                $this->data['sort_index'] = 'designer';
                $this->data['sort_value'] = 'asc';
                break;
            case 'designer-desc':
                $this->data['sort_index'] = 'designer';
                $this->data['sort_value'] = 'desc';
                break;
            default:
                $this->data['sort_index'] = 'rent_details.updated_at';
                $this->data['sort_value'] = 'desc';
                break;
        }
    }

    public function getRentedDetail(Request $request) {
        $code = UNSUCCESS;
        $msg = "Rented detail not found.";
        $total = $request->total;
        $skip = $request->skip;
        $response = array();
        $rented_id = $request->rented_id;
        $user = auth()->guard('api')->user();
        //print_r(Categories::all()->toArray());

        $rented_product_detail = $rented_list = Rent::where('id', $rented_id)->where('rent_details.status', '!=', 'Cart')->first();
        if (count($rented_product_detail) > 0) {
            $code = SUCCESS;
            $msg = "Rented product detail found successfully.";
            $product_detail = Products::where('id', $rented_product_detail->product_id)->with(['user_detail' => function($query) {
                            $query->select("id", "contact_number", "location", "body_type", "first_name", "last_name", "profile_picture", "profile_picture_custom_size");
                        }])->first();

            $cancellation_flag = "FALSE";

            if ($rented_product_detail->status == "Pending" || $rented_product_detail->status == "Accepted") {
                $cancellation_flag = "TRUE";
            }
            /* if($rented_product_detail->status!="Payment Accepted" || $rented_product_detail->status!="Canceled" || $rented_product_detail->status!="Declined") {
              $cancellation_flag = "TRUE";
              } */
            $product_detail->cancellation_flag = $cancellation_flag;
            $total_product_review = ProductUserReview::where('product_id', $rented_product_detail->product_id)->count();
            $product_detail->total_product_review = $total_product_review;
            $product_review_avg = ProductUserReview::where('product_id', $rented_product_detail->product_id)->avg('rating');
            $product_review_avg = round($product_review_avg);
            $product_detail->avg_product_review = $product_review_avg;

            $product_detail->user_detail->body_type_image = "user-interface/img/body-type-new-" . $product_detail->user_detail->body_type . ".png";

            $check_on_wishlist_or_not = Wishlist::where('product_id', $rented_product_detail->product_id)->where('user_id', $user->id)->count();
            $product_detail->on_wishlist = 0;
            if ($check_on_wishlist_or_not > 0) {
                $product_detail->on_wishlist = 1;
            }
            $rented_product_detail->product_detail = $product_detail;
            ;
            $rented_product_detail = $rented_product_detail->toArray();
            $rented_product_detail = array_map(function($v) {
                return (is_null($v)) ? "" : $v;
            }, $rented_product_detail);
            $response['rented_product_detail'] = $rented_product_detail;
        }
        return Response::json(array('code' => $code, 'msg' => $msg, 'data' => (object) $response));
    }

    public function postRentedProductStatusChange(Request $request) {
        $code = UNSUCCESS;
        $msg = "Rented product detail not found.";

        $response = array();
        $rented_id = $request->rented_id;
        $status = $request->status;
        $user = auth()->guard('api')->user();

        $rented_detail = Rent::where('id', $rented_id)->first();
        if (count($rented_detail) > 0) {
            if ($status == "accept") {
                Rent::manageData($rented_id, 'Accepted');
                Notification::addData($rented_detail->user_id, $user->id, $rented_id, 'Accepted your rental request', 'Accepted your rental request', 'accept');
                $user_device_token = DeviceToken::where('user_id', $rented_detail->user_id)->get();
                if (count($user_device_token) > 0) {
                    foreach ($user_device_token as $key => $value) {
                        if ($value->device_type == "Android") {
                            $fields = array(
                                'to' => $value->device_token,
                                'data' => array("message" => 'Accepted your rental request', 'title' => "Accepted your rental request")
                            );
                            sendPushNotification($fields);
                        }
                    }
                }
            } else if ($status == "decline") {
                Rent::manageData($rented_id, 'Declined');
                Notification::addData($rented_detail->user_id, $user->id, $rented_id, 'Declined your rental request', 'Declined your rental request', 'decline');
                $user_device_token = DeviceToken::where('user_id', $rented_detail->user_id)->get();
                if (count($user_device_token) > 0) {
                    foreach ($user_device_token as $key => $value) {
                        if ($value->device_type == "Android") {
                            $fields = array(
                                'to' => $value->device_token,
                                'data' => array("message" => 'Declined your rental request', 'title' => "Declined your rental request")
                            );
                            sendPushNotification($fields);
                        }
                    }
                }
            } else if ($status == "cancel") {
                $rented_product_detail = Products::where('id', $rented_detail->product_id)->first();
                Rent::manageData($rented_id, 'Canceled');
                Notification::addData($rented_product_detail->user_id, $user->id, $rented_id, 'Canceled rental request', 'Canceled rental request', 'cancel');
                $user_device_token = DeviceToken::where('user_id', $rented_product_detail->user_id)->get();
                if (count($user_device_token) > 0) {
                    foreach ($user_device_token as $key => $value) {
                        if ($value->device_type == "Android") {
                            $fields = array(
                                'to' => $value->device_token,
                                'data' => array("message" => 'Canceled rental request', 'title' => "Canceled rental request")
                            );
                            sendPushNotification($fields);
                        }
                    }
                }
            }
            $code = SUCCESS;
            $msg = "Rented product status changed successfully.";
        }
        return Response::json(array('code' => $code, 'msg' => $msg, 'data' => (object) $response));
    }

    public function postProceedToPayment(Request $request) {
        $code = UNSUCCESS;
        $msg = "Rented product detail not found.";

        $response = array();
        $rented_id = $request->rented_id;

        $user = auth()->guard('api')->user();

        $rented_detail = Rent::where('id', $rented_id)->first();

        if(!$request->has('pay_key'))
            $msg = "pay_key required";
            else
        if (count($rented_detail) > 0) {
            $RentTransactionDetail = new RentTransactionDetail;
            $RentTransactionDetail->rented_detail_id = $rented_id;
            $RentTransactionDetail->product_id = $rented_detail->product_id;
            $RentTransactionDetail->user_id = $user->id;
            $RentTransactionDetail->total_amount = $rented_detail->total;
            $RentTransactionDetail->pay_key = $request->pay_key;
            $RentTransactionDetail->save();

            $rented_product_detail = Products::where('id', $rented_detail->product_id)->first();
            $rented_detail->status = "Payment Accepted";
            $rented_detail->save();
            Notification::addData($rented_product_detail->user_id, $user->id, $rented_id, 'Payment Accepted', 'Payment Accepted', 'payment accepted');


            $user_device_token = DeviceToken::where('user_id', $rented_product_detail->user_id)->get();
            if (count($user_device_token) > 0) {
                foreach ($user_device_token as $key => $value) {
                    if ($value->device_type == "Android") {
                        $fields = array(
                            'to' => $value->device_token,
                            'data' => array("message" => 'Payment Accepted', 'title' => "Payment Accepted")
                        );
                        sendPushNotification($fields);
                    }
                }
            }


            $code = SUCCESS;
            $msg = "Payment accepted successfully.";
        }
        return Response::json(array('code' => $code, 'msg' => $msg, 'data' => (object) $response));
    }

    public function getTransactionList(Request $request) {
        $code = UNSUCCESS;
        $msg = "Transaction list not found.";

        $response = array();


        $user = auth()->guard('api')->user();

        $transaction_list = RentTransactionDetail::where('user_id', $user->id)->with(['rent_details' => function($query) {
                        $query->with('product_detail');
                    }, 'user_detail' => function($query) {
                        $query->select('id', 'first_name', 'last_name', 'email', "profile_picture", "profile_picture_custom_size");
                    }])->orderBy('id', 'desc')->get();
        if (count($transaction_list) > 0) {
            $transaction_list = $transaction_list->toArray();

            $transaction_list = array_map(function($v) {
                return (is_null($v)) ? "" : $v;
            }, $transaction_list);

            $response['transaction_list'] = $transaction_list;
            $code = SUCCESS;
            $msg = "Transaction list found successfully.";
        }
        return Response::json(array('code' => $code, 'msg' => $msg, 'data' => (object) $response));
    }

    public function getTransactionDetail(Request $request) {
        $code = UNSUCCESS;
        $msg = "Transaction detail not found.";

        $response = array();


        $user = auth()->guard('api')->user();

        $transaction_list = RentTransactionDetail::where('id', $request->id)->with(['rent_details' => function($query) {
                        $query->with('product_detail');
                    }, 'user_detail' => function($query) {
                        $query->select('id', 'first_name', 'last_name', 'email', "profile_picture", "profile_picture_custom_size");
                    }])->first();
        if (count($transaction_list) > 0) {
            $transaction_list = $transaction_list->toArray();

            $transaction_list = array_map(function($v) {
                return (is_null($v)) ? "" : $v;
            }, $transaction_list);

            $response['transaction_detail'] = $transaction_list;
            $code = SUCCESS;
            $msg = "Transaction detail found successfully.";
        }
        return Response::json(array('code' => $code, 'msg' => $msg, 'data' => (object) $response));
    }


    public function payRental($rented_id) {

        $paypal = PaypalConfig::getApiContext();
        $rented_detail = Rent::where('id', $rented_id)->first();

        if ($rented_detail) {
            $product_detail = Products::where('id', $rented_detail->product_id)
                ->with('product_categories')->first();

            $category = Categories::where('id', $product_detail->product_categories[0]->category_id)->first();

            if ($rented_detail->delivery_option === "Localization") {
                $shippingCost = 0;
            } else if($rented_detail->delivery_option === "Regular mail") {
                $shippingCost = $category->shipping_fee_local;
            } else {
                $shippingCost = $category->shipping_fee_nationwide;
            }

            $others = $rented_detail->total + ($rented_detail->total * .1) + $product_detail->cleaning_price;
            $admin_amount = $others + $product_detail->retail_price + $shippingCost;

            $cancel_url   = url('/api/paymentCancel') . '/' . $rented_id;
            $success_url  = url('/api/paymentSuccess') . '/' . $rented_id;

            $payer = new Payer();
            $payer->setPaymentMethod('paypal');


            $item = new Item();
            $item->setName($product_detail->name)->setCurrency(CURRENCY_CODE)->setQuantity(1)
                ->setPrice($others + $product_detail->retail_price);


            $itemList = new ItemList();
            $itemList->setItems([$item]);


            $details = new Details();
            $details->setShipping($shippingCost)->setSubTotal($others + $product_detail->retail_price);


            $amount = new Amount();
            $amount->setCurrency(CURRENCY_CODE)->setTotal($admin_amount)->setDetails($details);

            // product payments
            $transaction = new Transaction();
            $transaction->setAmount($amount)->setItemList($itemList)->setDescription('Item payment')->setInvoiceNumber(uniqid());


            $redirectUrl = new RedirectUrls();
            $redirectUrl->setReturnUrl($success_url)->setCancelUrl($cancel_url);


            $payment = new Payment();
            $payment->setIntent('sale')->setPayer($payer)->setRedirectUrls($redirectUrl)->setTransactions([$transaction]);


            try {
                $payment->create($paypal);
            } catch (PayPalConnectionException $e) {

                return Response::json(['code' => UNSUCCESS, 'msg' => "Network Issue"]);

            } catch (Exception $ex) {

                return Response::json(['code' => UNSUCCESS, 'msg' => "Network Issue"]);

            }

            $approvalUrl = $payment->getApprovalLink();
//            return Response::json(['code' => SUCCESS, 'msg' => "Success", 'url' => $approvalUrl]);
            return redirect($approvalUrl);


        }


    }


    public function payment_success(Request $req, $id) {

        $msg = "Not Allowed!";
        if ($req->has('PayerID')) {

            $rented_id     = $id;
            $rented_detail = Rent::where('id', $rented_id)->with('user_detail')->first();
            $clientName    = $rented_detail->user_detail->first_name . ' ' . $rented_detail->user_detail->first_name;

            $product_detail = Products::where('id', $rented_detail->product_id)
                ->with('product_categories')->first();
            $user_detail    = User::where('id', $product_detail->user_id)->first();
            $merName        = $user_detail->first_name . ' ' . $user_detail->last_name;

            $category = Categories::where('id', $product_detail->product_categories[0]->category_id)->first();

            if ($rented_detail->delivery_option === "Localization") {
                $shippingCost = 0;
            } else if ($rented_detail->delivery_option === "Regular mail") {
                $shippingCost = $category->shipping_fee_local;
            } else {
                $shippingCost = $category->shipping_fee_nationwide;
            }

            $others       = $rented_detail->total + ($rented_detail->total * .1) + $product_detail->cleaning_price;
            $admin_amount = $others + $product_detail->retail_price + $shippingCost;

            $payerID   = $req->input('PayerID');
            $paymentId = $req->input('paymentId');
            $token     = $req->input('token');

            Rent::where('id', $rented_id)->update(array('pay_key' => $paymentId));

            $apiContext = PaypalConfig::getApiContext();

            $payment = Payment::get($paymentId, $apiContext);


            $details = new Details();
            $details->setShipping($shippingCost)
                ->setSubtotal($others + $product_detail->retail_price);


            $amount = new Amount();
            $amount->setCurrency(CURRENCY_CODE)->setTotal($admin_amount)->setDetails($details);


            $transaction = new Transaction();
            $transaction->setAmount($amount);


            $execution = new PaymentExecution();
            $execution->setPayerId($payerID)->addTransaction($transaction);

            try {

                $payment->execute($execution, $apiContext);

                try {
                    $payment = Payment::get($paymentId, $apiContext);
                } catch (PayPalConnectionException $ex) {

                    echo $ex->getCode();
                    echo $ex->getData();
                    die($ex);

                }

            } catch (PayPalConnectionException $ex) {
                echo $ex->getCode();
                echo $ex->getData();
                die($ex);
            }

            $msg = "Rent Detail Not Found!";
            if ($rented_detail) {
                $RentTransactD                   = new RentTransactionDetail();
                $RentTransactD->product_id       = $rented_detail->product_id;
                $RentTransactD->rented_detail_id = $rented_id;
                $RentTransactD->user_id          = Auth()->user()->id;
                $RentTransactD->total_amount     = $admin_amount;
                $RentTransactD->pay_key          = $paymentId;
                $RentTransactD->detail           = "Client Paid the Payment";
                $RentTransactD->payment_info     = $payment;
                $RentTransactD->save();

                $pp                    = Products::where('id', $rented_detail->product_id)->first();
                $rented_detail->status = "Payment Accepted";
                $rented_detail->save();

                Notification::addData($pp->user_id, Auth()->user()->id, $rented_id, 'Payment Accepted', "Client Paid the Payment", 'payment accepted');

                $link  = url('rented/view/' . $rented_id);
                $link2 = url('for-rent/booking-list/' . $rented_detail->product_id);
                $this->sendEmail("Payment Accepted", "Payment Accepted", $rented_detail->user_detail->email, $link, $clientName, $product_detail, $rented_detail, "client");

                $designer = $product_detail->designer;
                $amount   = $rented_detail->total;
                $date     = Carbon::now();
                $name     = $product_detail->name;

                $message = "Your <b>" . ucfirst($name) . "</b> / <b>$designer</b> was booked on <b>" . $date->toDateString() . "</b> by <b>$clientName</b>, Please sent this item within 5 days by <b>$rented_detail->delivery_option</b>. You will earn <b>$$amount</b> for this item.</a>";
                $this->sendEmail("Reminder", $message, $user_detail->email, $link2, $merName, $product_detail, $rented_detail, "bp");

                $msg = "Payment accepted successfully.";
                Helper::flashMessage('Success!', $msg, 'success');
                return redirect('/' . $rented_id);

            }

        }


        Helper::flashMessage('Error!', $msg, 'error');
        return redirect('/');
    }


    public function payment_cancel($id) {

        Helper::flashMessage('Error!', 'Transaction Canceled.', 'error');
        return redirect('/');

    }


}
