<?php

namespace App\Http\Controllers\UserInterface;

use App\Functions\PaypalConfig;
use App\Models\Categories;
use App\Models\Ratting;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Support\Facades\Input;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\User;
use App\Models\Validators;
use App\Models\ProductUserReview;
use App\Models\Rent\Rent;
use App\Models\Products\Products;
use App\Models\Helper;
use App\Models\Notification\Notification;
use App\Models\DeviceToken;
use App\Models\Rent\RentTransactionDetail;
use Auth, Session;
use Illuminate\Support\Facades\Mail;
use Mockery\Exception;
use PayPal\Api\Amount;
use PayPal\Api\Currency;
use PayPal\Api\Details;
use PayPal\Api\Item;
use PayPal\Api\ItemList;
use PayPal\Api\Payer;
use PayPal\Api\Payment;
use PayPal\Api\PaymentExecution;
use PayPal\Api\Payout;
use PayPal\Api\PayoutItem;
use PayPal\Api\PayoutSenderBatchHeader;
use PayPal\Api\RedirectUrls;
use PayPal\Api\RefundRequest;
use PayPal\Api\Sale;
use PayPal\Api\Transaction;
use PayPal\Auth\OAuthTokenCredential;
use PayPal\Exception\PayPalConnectionException;
use PayPal\Rest\ApiContext;

class RentedController extends Controller {

    /**
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    function getIndex(Request $request) {
        $this->data['sort_index'] = 'rent_details.updated_at';
        $this->data['sort_value'] = 'desc';
        if ($request->has('sort')) {
            $this->sort($request);
        }
        $this->data['rented'] = Rent::where('rent_details.user_id', Auth::user()->id)->where('rent_details.status', '!=', 'Cart')
            ->join('products', 'rent_details.product_id', '=', 'products.id')
            ->select(
                'rent_details.id as clientID',
                'products.id as productID',
                'rent_details.status as status',
                'rent_details.shipping_info',
                'rent_details.id as id'
            )
            ->groupBy('rent_details.id', 'rent_details.updated_at', 'rent_details.status', 'products.id', 'products.price', 'products.name', 'rent_details.shipping_info')
            ->orderBy($this->data['sort_index'], $this->data['sort_value'])
            ->paginate(6);

        $this->data['count'] = Rent::where('user_id', Auth::user()->id)->where('status', '!=', 'Cart')->count();

//        return $this->data['rented'];
        return view('user-interface.dashboard.rented.index', $this->data);
    }

    /**
     * @param $request
     */
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

    /**
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    function getSingle($id) {
        $this->data['rented'] = Rent::where('id', $id)->first();

        if($this->data['rented']->user_id == Auth::user()->id) {

            $this->data['product'] = Products::where('id', $this->data['rented']->product_id)->first();

            $this->data['owner'] = User::where('id', $this->data['product']->user_id)->first();

            return view('user-interface.dashboard.rented.single', $this->data);
        } else {
            Helper::flashMessage('Error!', 'Item not found.', 'error');
            return redirect()->back();
        }
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function postSubmitReview(Request $request) {
        $validator = Validators::frontendValidate($request, 'rented_submit_review');
        //print_r($request->all());
        if ($validator === true) {
            //echo "here";
            ProductUserReview::manageData($request);
            Helper::flashMessage('Great!', 'The Review Submited Successfully.', 'success');
            Rent::where('id', $request->rented_id)->update(array('user_review_submitted' => 1));
            $rented_detail = Rent::where('id', $request->rented_id)->first();
            if ($request->rating > 2) {
                $curl = curl_init();
                curl_setopt_array($curl, array(
                    CURLOPT_URL => "https://svcs.sandbox.paypal.com/AdaptivePayments/ExecutePayment?payKey=" . $rented_detail->pay_key . "&requestEnvelope.errorLanguage=en_US",
                    CURLOPT_RETURNTRANSFER => true,
                    CURLOPT_ENCODING => "",
                    CURLOPT_MAXREDIRS => 10,
                    CURLOPT_TIMEOUT => 30,
                    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                    CURLOPT_CUSTOMREQUEST => "GET",
                    CURLOPT_HTTPHEADER => array(
                        "cache-control: no-cache",
                        "postman-token: 1e4485e3-92ae-7be5-2925-1632732affae",
                        "x-paypal-request-data-format: NV",
                        "x-paypal-response-data-format: JSON",
                        "x-paypal-security-password: AWV9D3FATHQN9LCF",
                        "x-paypal-security-signature: A76bwlv2Z01mOclk1JxeCgsePvJ8AeHFAIIl50UGOc2vL789Duw9RUIj",
                        "x-paypal-security-userid: vishal.patel-facilitator_api1.mitajacorp.com"
                    ),
                ));

                $response = curl_exec($curl);
                $err      = curl_error($curl);

                curl_close($curl);

                if ($err) {
                    //echo "cURL Error #:" . $err;
                } else {
                    //echo $response;
                }
            } else {
                $curl = curl_init();
                curl_setopt_array($curl, array(
                    CURLOPT_URL => "https://svcs.sandbox.paypal.com/AdaptivePayments/Refund?payKey=" . $rented_detail->pay_key . "&requestEnvelope.errorLanguage=en_US",
                    CURLOPT_RETURNTRANSFER => true,
                    CURLOPT_ENCODING => "",
                    CURLOPT_MAXREDIRS => 10,
                    CURLOPT_TIMEOUT => 30,
                    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                    CURLOPT_CUSTOMREQUEST => "GET",
                    CURLOPT_HTTPHEADER => array(
                        "cache-control: no-cache",
                        "postman-token: 1e4485e3-92ae-7be5-2925-1632732affae",
                        "x-paypal-request-data-format: NV",
                        "x-paypal-response-data-format: JSON",
                        "x-paypal-security-password: AWV9D3FATHQN9LCF",
                        "x-paypal-security-signature: A76bwlv2Z01mOclk1JxeCgsePvJ8AeHFAIIl50UGOc2vL789Duw9RUIj",
                        "x-paypal-security-userid: vishal.patel-facilitator_api1.mitajacorp.com"
                    ),
                ));

                $response = curl_exec($curl);
                $err      = curl_error($curl);

                curl_close($curl);

                if ($err) {
                    //echo "cURL Error #:" . $err;
                } else {
                    //echo $response;
                }
            }//exit;
            return response()->json(["result" => 'success']);
        }
        return response()->json(["result" => 'failed', "errors" => $validator->errors()->messages()]);

    }

    /**
     * @param $status
     * @param $rented_id
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse|\Illuminate\Http\RedirectResponse
     */
    public function getChangeStatus($status, $rented_id, Request $request) {

        $extra = '';
        if ($request->has('extra')) {
            $extra = $request->input('extra');
        }

        $rented_detail = Rent::where('id', $rented_id)->with('user_detail')->first();

        $product       = Products::where('id', $rented_detail->product_id)
            ->with('user_detail')
            ->with('product_categories')
            ->first();

        $clientName = $rented_detail->user_detail->first_name . ' ' . $rented_detail->user_detail->last_name;
        $merName = $product->user_detail->first_name . ' ' . $product->user_detail->last_name;

        $category = Categories::where('id', $product->product_categories[0]->category_id)->first();

        $user = Auth()->user();

        if ($rented_detail) {

            $msg = "Rented product status changed successfully.";
            Helper::flashMessage('Success!', $msg, 'success');

            $link = url('rented/view/' . $rented_id);
            $link2 = url('for-rent/booking-list/' . $product->id);

            if ($status == "accept") {

                Notification::addData($rented_detail->user_id, $user->id, $rented_id, 'Accepted your rental request', 'Accepted your rental request', 'accept');
                pushMobile($rented_detail->user_id, "Accepted", 'Accepted your rental request');
                $this->sendEmail("Accepted", "Accepted your rental request", $rented_detail->user_detail->email, $link, $clientName, $product, $rented_detail, "client");
                Rent::manageData($rented_id, 'Accepted', $extra);

            } else if ($status == "decline") {
                Rent::manageData($rented_id, 'Declined');
                $name  = $product->name;

                $title = "<b>$user->first_name $user->last_name</b> Declined your rental request";
                $noti  = "<b>$user->first_name $user->last_name</b> cancelled your rental request for <b>$name</b>, Reason: <b>$extra</b>";

                Notification::addData($rented_detail->user_id, $user->id, $rented_id, $title, $noti, 'decline');
                $mobileNoti = "$user->first_name $user->last_name cancelled rental request for $name, Reason: $extra";
                pushMobile($rented_detail->user_id, $title, $mobileNoti);

                $this->sendEmail($title, $noti, $rented_detail->user_detail->email, false, $clientName, $product, $rented_detail, "client");

                if ($rented_detail->delivery_option === "Localization") {
                    $shippingCost = 0;
                } else if($rented_detail->delivery_option === "Regular mail") {
                    $shippingCost = $category->shipping_fee_local;
                } else {
                    $shippingCost = $category->shipping_fee_nationwide;
                }

                $rent         = $rented_detail->total * 0.9;
                $refundAmount = $product->retail_price + $shippingCost + $rent + $product->cleaning_price;
                $noti = "100 % Full refund is provided to client EXCEPT RENT A SUIT FEE";

                $this->refundToClient($rented_detail->id, $refundAmount, $rented_detail->user_id, $noti);

                Notification::addData($user->id, $product->user_id, $rented_id, $title, $noti, 'cancel');

            } else if ($status == "cancel") {

                $now        = Carbon::now();
                $rentalDate = Carbon::parse($rented_detail->rental_start_date);

                $title = "Cancel rental request";
                $noti  = "Cancel rental request";

                Rent::manageData($rented_id, 'Canceled');

                if ($rented_detail->status === 'Pending' || $rented_detail->status === 'Accepted') {
                    Notification::addData($product->user_id, $user->id, $rented_id, $title, $noti, 'cancel');
                    return response()->json(["result" => 'success']);
                }

	            if ($rented_detail->delivery_option === "Localization") {
		            $shippingCost = 0;
	            } else if($rented_detail->delivery_option === "Regular mail") {
		            $shippingCost = $category->shipping_fee_local;
	            } else {
		            $shippingCost = $category->shipping_fee_nationwide;
	            }

                $rent         = $rented_detail->total * 0.9;
                $refundAmount = $product->retail_price + $shippingCost + $rent + $product->cleaning_price;

                // Aggressive
                if ($product->cancellation === '1') {
                    if ($rentalDate->gt($now) && $rentalDate->diffInDays($now) > 10) {

                        $noti = "100 % Full refund is provided to client EXCEPT RENT A SUIT FEE";

                        $this->refundToClient($rented_detail->id, $refundAmount, $rented_detail->user_id, $noti);

                        Notification::addData($user->id, $product->user_id, $rented_id, $title, $noti, 'cancel');

                    } else {

                        $date1      = date_create($rented_detail->rental_start_date);
                        $date2      = date_create($rented_detail->rental_end_date);
                        $diff       = date_diff($date1, $date2);
                        $total_days = $diff->format("%a") + 1;

                        $perDayRent   = $rent / $total_days;
                        $refundAmount = $product->retail_price + $product->cleaning_price + $rent - $perDayRent;
                        $merchantRent = $shippingCost + $perDayRent;

                        $notiC = "1 Day Rent is deducted from security, Refunded due amount";
                        $notiM = "Shipping Address + 1 day rent is Received";

                        $this->refundToClient($rented_detail->id, $refundAmount, $rented_detail->user_id, $notiC);
                        $this->payToMerchant($user->paypal_email_address, $merchantRent, $rented_detail, $notiM);

                        Notification::addData($user->id, $product->user_id, $rented_id, $title, $notiC, 'cancel');
                        Notification::addData($product->user_id, $user->id, $rented_id, $title, $notiM, 'cancel');
                    }

                } else {
                    // Moderate
                    if ($rentalDate->gt($now) && $rentalDate->diffInDays($now) >= 6) {

                        $notiC = "100 % Full refund is provided to client EXCEPT RENT A SUIT FEE";

                        $this->refundToClient($rented_detail->id, $refundAmount, $rented_detail->user_id, $noti);

                        Notification::addData($user->id, $product->user_id, $rented_id, $title, $noti, 'cancel');
                    } else {

                        $date1      = date_create($rented_detail->rental_start_date);
                        $date2      = date_create($rented_detail->rental_end_date);
                        $diff       = date_diff($date1, $date2);
                        $total_days = $diff->format("%a") + 1;

                        $perDayRent   = $rent / $total_days;
                        $refundAmount = $product->retail_price + $rent - $perDayRent + $product->cleaning_price;
                        $merchantRent = $shippingCost + $perDayRent;

                        $notiC = "1 Day Rent is deducted from security, refunded due amount";
                        $notiM = "Shipping Address + 1 day rent is Received";

                        $this->refundToClient($rented_detail->id, $refundAmount, $rented_detail->user_id, $notiC);
                        $this->payToMerchant($user->paypal_email_address, $merchantRent, $rented_detail, $notiM);

                        Notification::addData($user->id, $product->user_id, $rented_id, $title, $notiC, 'cancel');
                        Notification::addData($product->user_id, $user->id, $rented_id, $title, $notiM, 'cancel');
                    }

                }

                $this->sendEmail($title, $notiM, $product->user_detail->email, $link2, $merName, $product, $rented_detail, "bp");
                $this->sendEmail($title, $notiC, $rented_detail->user_detail->email, $link, $clientName, $product, $rented_detail, "client");


            } else if ($status == "merchantSent") {

                Rent::manageData($rented_id, 'Merchant Sent');

                $title = "Item Sent";
                $noti  = "Item <b>$product->name</b> sent by <b>$user->first_name $user->last_name</b>, Shipping Info: <b>$extra</b>";

                Notification::addData($rented_detail->user_id, $user->id, $rented_id, $title, $noti, 'sent');
                pushMobile($rented_detail->user_id, $title, $noti);

                Rent::where('id', $rented_detail->id)->update(['shipping_info' => $extra]);

                $this->sendEmail($title, $noti, $rented_detail->user_detail->email, $link ,$clientName, $product, $rented_detail, "client");


            } else if ($status == "clientReceived") {

                Rent::manageData($rented_id, 'Client Received');

                $title = "Item Arrived";
                $noti  = "Item <b>$product->name</b> has arrived to <b>$user->first_name $user->last_name</b>";

                Notification::addData($product->user_id, $user->id, $rented_id, $title, $noti, 'received');
                pushMobile($rented_detail->user_id, $title, $noti);

                $this->sendEmail($title, $noti, $product->user_detail->email, false, $merName, $product, $rented_detail, "bp");

            } else if ($status === 'satisfied') {

                $ratings = $request->input('rating');
                $finalR  = explode(',', $ratings);
                $average = array_sum($finalR) / count($finalR);
                $average = round($average);
                $comment = $request->input('comment');
                $data             = new ProductUserReview();
                $data->user_id    = Auth()->user()->id;
                $data->product_id = $rented_detail->product_id;
                $data->rating     = $average;
                $data->comment    = $comment;
                $data->save();
                $rating                    = new Ratting();
                $rating->user_id           = Auth()->user()->id;
                $rating->product_id        = $rented_detail->product_id;
                $rating->delivery_rat      = $finalR[0];
                $rating->cleanliness_rat   = $finalR[1];
                $rating->accuracy_rat      = $finalR[2];
                $rating->quality_rat       = $finalR[3];
                $rating->communication_rat = $finalR[4];
                $rating->overall_rat       = $finalR[5];
                $rating->save();

                $rent = $rented_detail->total;

                if ($rented_detail->delivery_option === "Localization") {
                    $shippingCost = 0;
                } else if($rented_detail->delivery_option === "Regular mail") {
                    $shippingCost = $category->shipping_fee_local;
                } else {
                    $shippingCost = $category->shipping_fee_nationwide;
                }

                $merchantRent = $rent + $shippingCost + $product->cleaning_price;
                $this->payToMerchant($product->user_detail->paypal_email_address, $merchantRent, $rented_detail, "Rent and Shipping Cost Paid to Merchant");

                $title = "Payment Received";
                $notiC  = "<b>$user->first_name $user->last_name</b> satisfied to <b>$product->name</b>, <br /> A payment has been made to you for this item, Total Amount: $$merchantRent";
                $notiM  = "$user->first_name $user->last_name satisfied to $product->name";

                Rent::manageData($rented_id, 'Satisfied');
                Notification::addData($product->user_id, $user->id, $rented_id, $title, $notiC, 'satisfied');
                $this->sendEmail($title, $notiC, $product->user_detail->email, $link2, $merName, $product, $rented_detail, "bp");
                pushMobile($rented_detail->user_id, $title, $notiM);

            } else if ($status === 'notSatisfied') {

                if ($extra === 'damaged') {
                    $reason = 'Damaged';
                } else if ($extra === 'differentItem') {
                    $reason = 'Item is Different';
                } else {
                    $reason = $extra;

                    $emailMessage = "we are terribly sorry about your experience. 
                    We tried our best to avoid these kind of situations. <br/>
                    Please share your comments as well when you provide your feedback";

                    $this->sendEmail("Admin Feedback!", $emailMessage, $rented_detail->user_detail->email, false, $clientName, $product, $rented_detail, "client");
                    Notification::addData($rented_detail->user_id, $product->user_id, $rented_id, "Admin Feedback", $emailMessage, 'feedback');

                }

                Rent::manageData($rented_id, 'Not Satisfied');

                $title = 'Client Feedback';
                $noti  = "<b>$user->first_name $user->last_name</b> is not satisfied to <b>$product->name</b>, Reason: <b>$reason</b>";

                Notification::addData($product->user_id, $user->id, $rented_id, $title, $noti, 'feedback');
                pushMobile($rented_detail->user_id, $title, $noti);

                $this->sendEmail($title, $noti, $product->user_detail->email, $link2, $merName, $product, $rented_detail, "bp");
                $this->sendEmail($title, $noti, 'info@rentasuit.ca', false, 'Admin', $product, $rented_detail, "admin");

                Rent::where('id', $rented_detail->id)->update(['reason' => $reason]);

            } else if ($status === 'clientSent') {

                Rent::manageData($rented_id, 'Client Sent');
                Rent::where('id', $rented_detail->id)->update(['return_date' => Carbon::now()]);

                $title = 'Item Returned';
                $noti  = "Item <b>$product->name</b> is Returned by <b>$user->first_name $user->last_name</b>, Shipping Info: <b>$extra</b>";

                Notification::addData($product->user_id, $user->id, $rented_id, $title, $noti, 'sent');
                pushMobile($rented_detail->user_id, $title, $noti);

                $this->sendEmail($title, $noti, $product->user_detail->email, $link2, $merName, $product, $rented_detail, "bp");

                Rent::where('id', $rented_detail->id)->update(['return_shipping_info' => $extra]);

            } else if ($status == "merchantReceived") {

                $ratings = $request->input('rating');
                $finalR  = explode(',', $ratings);

                $rating                    = new Ratting();
                $rating->user_id           = Auth()->user()->id;
                $rating->product_id        = $rented_detail->product_id;
                $rating->time_rat          = $finalR[0];
                $rating->cleanliness_rat   = $finalR[1];
                $rating->communication_rat = $finalR[2];
                $rating->overall_rat       = $finalR[3];
                $rating->save();

	            if ($rented_detail->delivery_option === "Localization") {
		            $shippingCost = 0;
	            } else if($rented_detail->delivery_option === "Regular mail") {
		            $shippingCost = $category->shipping_fee_local;
	            } else {
		            $shippingCost = $category->shipping_fee_nationwide;
	            }

                $refundAmount = $product->retail_price;
                $merchantRent = 0;

                $notiM = "";
                $notiC  = "Item <b>$product->name</b> Received to <b>$user->first_name $user->last_name</b> and Refunded Security, Total Amount: $$refundAmount";
                $msg   = "Refunded security to Client and paid rent to Merchant!";

                $endDate    = Carbon::parse($rented_detail->rental_end_date);
                $returnDate = Carbon::parse($rented_detail->return_date);


                if ($returnDate->gt($endDate) && $returnDate->diffInDays($endDate) >= 1) {

                    if ($returnDate->diffInDays($endDate) >= 1 && $returnDate->diffInDays($endDate) <= 5) {

                        $refundAmount = $product->retail_price - 39;
                        $merchantRent = 39;

                        $notiC = "Late Fees: Deducted $50 CAD and Refunded remaining Retail price, Total Amount: $$refundAmount";
                        $notiM = "Late Fees: $50 CAD are received";
                        $msg   = "$50 CAD are received due to late fees!";

                    } else if ($returnDate->diffInDays($endDate) > 5 && $returnDate->diffInDays($endDate) <= 15) {

                        $upDay  = ($returnDate->diffInDays($endDate) - 5);
                        $perDay = $upDay * $product->price;

                        $refundAmount = $product->retail_price - 39 - $perDay;
                        $merchantRent = 39 + $perDay;

                        $notiC = "Late Fees: Deducted $50 CAD + One day rent and Refunded remaining Retail price, Total Amount: $$refundAmount";
                        $notiM = "Late Fees: Rent + Shipping Cost + One day Rent and $50 CAD received, Total Amount: $$merchantRent";

                        $msg = "Rent + Shipping Cost + One day Rent and $50 CAD received, Total Amount: $$merchantRent";

                    } else if ($returnDate->diffInDays($endDate) > 15) {

                        $refundAmount = 0;
                        $merchantRent = $product->retail_price;

                        $notiC = "Late Fees: No Refund";
                        $notiM = "Late Fees: Rent + Shipping Cost received, Total Amount: $$merchantRent";
                        $msg = "Rent + Shipping Cost received, Total Amount: $$merchantRent";

                    }

                } else {

                    $reason = $rented_detail->reason;
                    $rent = $rented_detail->total;
                    if ($reason) {
                        if ($reason === 'Damaged' || $reason === 'Item is Different') {
                            $refundAmount = $product->retail_price + $shippingCost + $rent + $product->cleaning_price;
                            $merchantRent = 0;
                            $notiC = "Item <b>$product->name</b> Received by <b>$user->first_name $user->last_name</b> and Shipping Amount + Security and Total Rent without fees is Refunded, Total Amount: $$refundAmount";
                            $notiM = $msg = "Refunded all Security to Client!";

                        } else {
                            $refundAmount = $product->retail_price + $shippingCost + ($rent / 2) + $product->cleaning_price;
                            $merchantRent = $rent / 2;
                            $noti         = "Item <b>$product->name</b> Received to <b>$user->first_name $user->last_name</b> and Shipping Amount + Security and 50% of Rent without fees is Refunded";
                            $notiC = "Shipping Amount + Security and 50% of Rent without fees is Refunded, Total Amount: $$refundAmount";
                            $notiM = $msg = "Refunded security to Client and Half Rent is Received, Received Amount: $$merchantRent";

                        }
                    }
                }

                $refundAmount = $refundAmount < 0 ? 0 : $refundAmount;

                // Payment to Merchant
                if ($merchantRent) {
                    $this->payToMerchant($user->paypal_email_address, $merchantRent, $rented_detail, $notiM);
                }

                // Refund to Client
                if ($refundAmount && $rented_detail->status !== 'Automatic Refund') {
                    $this->refundToClient($rented_detail->id, $refundAmount, $rented_detail->user_id, $notiC);
                }


                Rent::manageData($rented_id, 'Merchant Received');
                $title = 'Item received back';
                Notification::addData($rented_detail->user_id, $user->id, $rented_id, $title, $notiC, 'received');
                Notification::addData($user->id, $rented_detail->user_id, $rented_id, $title, $notiM, 'received');
                pushMobile($rented_detail->user_id, $title, $notiC);

                $this->sendEmail($title, $notiC, $rented_detail->user_detail->email, $link, $clientName, $product, $rented_detail, "client");

                Helper::flashMessage('Success!', $msg, 'success');

            }

            return response()->json(["result" => 'success']);
        }

        Helper::flashMessage('Error!', 'Booking detail not found.', 'error');
        return redirect()->back();
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function getCheckout(Request $request) {
        $msg           = "";
        $rented_id     = $request->id;
        $rented_detail = Rent::where('id', $rented_id)->first();

        if ($rented_detail) {
            $product_detail = Products::where('id', $rented_detail->product_id)
                ->with('product_categories')->first();

            $category = Categories::where('id', $product_detail->product_categories[0]->category_id)->first();

            $user_detail = User::where('id', $product_detail->user_id)->first();
            $curl        = curl_init();
            $days_amount = $rented_detail->total;

	        if ($rented_detail->delivery_option === "Localization") {
		        $shippingCost = 0;
	        } else if($rented_detail->delivery_option === "Regular mail") {
		        $shippingCost = $category->shipping_fee_local;
	        } else {
		        $shippingCost = $category->shipping_fee_nationwide;
	        }

            $admin_amount    = $rented_detail->total + $product_detail->retail_price + $shippingCost;
            $merchant_amount = ($days_amount * 90) / 100;
            $cancel_url      = url('rented/cancel');
            $success_url     = url('rented/success');

            $url = URL . "?actionType=" . ACTION_TYPE .
                "&clientDetails.applicationId=" . APP_ID .
                "&clientDetails.ipAddress=" . IP_ADDRESS .
                "&currencyCode=" . CURRENCY_CODE .
                "&feesPayer=" . FEES_PAYER .
                "&memo=Example" .
                "&receiverList.receiver(0).amount=" . $admin_amount .
                "&receiverList.receiver(0).email=" . ADMIN_EMAIL .
                "&receiverList.receiver(0).primary=true" .
                "&receiverList.receiver(1).amount=" . $merchant_amount .
                "&receiverList.receiver(1).email=" . $user_detail->paypal_email_address .
                "&receiverList.receiver(1).primary=false" .
                "&requestEnvelope.errorLanguage=en_US" .
                "&returnUrl=" . $success_url .
                "&cancelUrl=" . $cancel_url;

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

            $response_data = curl_exec($curl);
            $err           = curl_error($curl);

            curl_close($curl);
            //echo "hererer";exit;
            if ($err) {
                $msg = 'Internal Server Error :' . $err;
                Helper::flashMessage('Error!', $msg, 'error');
                return redirect()->back();
            } else {
                //echo "hererer";exit;
                $response_data = json_decode($response_data);
                if ($response_data->responseEnvelope->ack === "Failure") {
                    $msg = $response_data->error[0]->message;
                    Helper::flashMessage('Error!', $msg, 'error');
                    return redirect()->back();
                } else {
                    $payKey = $response_data->payKey;
                    Rent::where('id', $rented_id)->update(array('pay_key' => $payKey));
                    Session::put('rented_id', $rented_id);
                    return redirect()->to('https://www.sandbox.paypal.com/cgi-bin/webscr?cmd=_ap-payment&paykey=' . $payKey);
                }
            }
        }
        Helper::flashMessage('Error!', 'Rented detail not found.', 'error');
        return redirect()->back();

    }

    /**
     * @param Request $req
     * @param $id
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function payment_success(Request $req, $id) {

        $rented_id     = $id;
        $rented_detail = Rent::where('id', $rented_id)->with('user_detail')->first();
        $clientName = $rented_detail->user_detail->first_name . ' ' . $rented_detail->user_detail->first_name;

        $product_detail = Products::where('id', $rented_detail->product_id)
            ->with('product_categories')->first();
        $user_detail    = User::where('id', $product_detail->user_id)->first();
        $merName = $user_detail->first_name . ' ' . $user_detail->last_name;

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


        if ($rented_detail) {
            $RentTransactD                   = new RentTransactionDetail;
            $RentTransactD->product_id       = $rented_detail->product_id;
            $RentTransactD->rented_detail_id = $rented_id;
            $RentTransactD->user_id          = Auth()->user()->id;
            $RentTransactD->total_amount     = $admin_amount;
            $RentTransactD->pay_key          = $paymentId;
            $RentTransactD->detail           = "Client Paid the Payment";
            $RentTransactD->payment_info     = $payment;
            $RentTransactD->save();

            $pp = Products::where('id', $rented_detail->product_id)->first();
            $rented_detail->status = "Payment Accepted";
            $rented_detail->save();

            Notification::addData($pp->user_id, Auth()->user()->id, $rented_id, 'Payment Accepted', "Client Paid the Payment", 'payment accepted');

            $link = url('rented/view/' . $rented_id);
            $link2 = url('for-rent/booking-list/' . $rented_detail->product_id);
            $this->sendEmail("Payment Accepted", "Payment Accepted", $rented_detail->user_detail->email, $link, $clientName, $product_detail, $rented_detail, "client");

            $designer = $product_detail->designer;
            $amount = $rented_detail->total;
            $date = Carbon::now();
            $name   = $product_detail->name;

            $message = "Your <b>" . ucfirst($name) . "</b> / <b>$designer</b> was booked on <b>" . $date->toDateString() . "</b> by <b>$clientName</b>, Please sent this item within 5 days by <b>$rented_detail->delivery_option</b>. You will earn <b>$$amount</b> for this item.</a>";
            $this->sendEmail("Reminder", $message, $user_detail->email, $link2, $merName, $product_detail, $rented_detail, "bp");

            $user_device_token = DeviceToken::where('user_id', $pp->user_id)->get();
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

            $msg = "Payment accepted successfully.";

            Helper::flashMessage('Success!', $msg, 'success');

            return redirect('rented/view/' . $rented_id);
        }


        Helper::flashMessage('Error!', 'Rented detail not found.', 'error');

        return redirect('rented/view/' . $rented_id);
    }

    /**
     * @param $id
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function payment_cancel($id) {

        Helper::flashMessage('Error!', 'Transaction Canceled.', 'error');
        return redirect('rented/view/' . $id);

    }

    /**
     * @param Request $req
     * @return \Illuminate\Http\RedirectResponse
     */
    public function payRental(Request $req) {

        $paypal = PaypalConfig::getApiContext();

        $rented_id     = $req->id;
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

            $cancel_url   = url('rented/cancel') . '/' . $rented_id;
            $success_url  = url('rented/success') . '/' . $rented_id;

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

                echo $e->getData();
                exit;

                Helper::flashMessage('Error!', 'Network Issue.', 'error');
                return redirect('my-cart/' . $rented_id);

            } catch (Exception $ex) {

                die($ex);

                Helper::flashMessage('Error!', 'Network Issue.', 'error');
                return redirect('my-cart/' . $rented_id);
            }

            $approvalUrl = $payment->getApprovalLink();

            return redirect()->to($approvalUrl);

        }


    }

    /**
     * @param $rented_id
     * @param $refundAmount
     */
    public function refundToClient($rented_id, $refundAmount, $user_id, $detail) {

        $RentTransactD                   = new RentTransactionDetail;
        $RentTransactD->rented_detail_id = $rented_id;
        $RentTransactD->user_id          = $user_id;
        $RentTransactD->total_amount     = $refundAmount;
        $RentTransactD->detail           = $detail;
        $RentTransactD->pay_key          = '';
        $RentTransactD->payment_info     = '';
        $RentTransactD->save();

        $apiContext  = PaypalConfig::getApiContext();

        $rentedDetail = Rent::where('id', $rented_id)->first();
        $payment = Payment::get($rentedDetail->pay_key, $apiContext);
        $sale = new Sale();
        $saleId = $payment
            ->getTransactions()[0]
            ->getRelatedResources()[0]
            ->sale->id;
        $sale->setId($saleId);


        // Refunded Security amount to Client
        $sale   = Sale::get($saleId, $apiContext);
        $saleId = $sale->getId();

        $amt = new Amount();
        $amt->setCurrency(CURRENCY_CODE)
            ->setTotal($refundAmount);

        $refundRequest = new RefundRequest();
        $refundRequest->setAmount($amt);

        $sale = new Sale();
        $sale->setId($saleId);
        try {

            $sale->refundSale($refundRequest, $apiContext);

        } catch (PayPalConnectionException $ex) {
            echo $ex->getCode();
            echo $ex->getData();
            die($ex);
        }
    }

    /**
     * @param $email
     * @param $rent
     */
    public function payToMerchant($email, $rent, $rented_detail, $detail) {

        $rented_id = $rented_detail->id;
        $userID    = $rented_detail->user_id;

        $RentTransactD                   = new RentTransactionDetail;
        $RentTransactD->rented_detail_id = $rented_id;
        $RentTransactD->user_id          = $userID;
        $RentTransactD->total_amount     = $rent;
        $RentTransactD->detail           = $detail;
        $RentTransactD->pay_key          = '';
        $RentTransactD->payment_info     = '';
        $RentTransactD->save();

        $apiContext = PaypalConfig::getApiContext();
        $payouts    = new Payout();

        $senderBatchHeader = new PayoutSenderBatchHeader();
        $senderBatchHeader->setSenderBatchId(uniqid())
            ->setEmailSubject("You have a Payout!");


        $senderItem = new PayoutItem();
        $senderItem->setRecipientType('Email')
            ->setNote('Thanks for your patronage!')
            ->setReceiver($email)
            ->setSenderItemId("2014031400023")
            ->setAmount(new Currency('{
                        "value":"' . $rent . '",
                        "currency":"' . CURRENCY_CODE . '"
                    }'));

        $payouts->setSenderBatchHeader($senderBatchHeader)
            ->addItem($senderItem);

        try {

            $payouts->create(null, $apiContext);

        } catch (PayPalConnectionException $ex) {
            echo $ex->getCode();
            echo $ex->getData();
            die($ex);
        }
    }

    public function sendEmail($title, $message, $email, $link, $name, $product, $rent, $user) {

        $data['title']   = $title;
        $data['message'] = $message;
        $data['link'] = $link;
        $data['name'] = $name;
        $data['picture'] = $product['picture'];

        $data['rented_id']   = $rent->id;
        $data['product_id'] = $product->id;
        $data['user_type'] = $user;

        Mail::send('emails.notify', compact('data'), function ($m) use ($title, $email) {
            $m->to($email)->subject('Rent A Suit - ' . $title);
            $m->from('info@rentsuit.com');
        });
    }

}