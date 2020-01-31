<?php

namespace App\Http\Controllers\UserInterface\Api;

use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Input;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Helper;

use Srmklive\PayPal\Services\ExpressCheckout;

use App\Models\Rent\Rent;

class PayPalController extends Controller{

    function getPayment(Request $request)
    {
        $rent_details = Rent::find($request->rentID);
        $rent_from = \Carbon\Carbon::parse($rent_details->rental_start_date);
        $rent_to = \Carbon\Carbon::parse($rent_details->rental_end_date);
        $rent_total_days = $rent_from->diffInDays($rent_to);  
        $rent_total_price = $request->price * $rent_total_days;

        $data_paypal = [];
        $data_paypal['items'] = [
            [
                'name'  => $request->name,
                'price' => $rent_total_price,
                'qty'   => 1,
            ],
        ];
        $data_paypal['subscription_desc']   = "Total Charge";
        $data_paypal['invoice_id']          = '';
        $data_paypal['invoice_description'] = '';
        $data_paypal['return_url']          = url('paypal/payment-success');
        $data_paypal['cancel_url']          = url('notification');
        $data_paypal['total'] = $rent_total_price;
        $provider = new ExpressCheckout;
        
        $response = $provider->setExpressCheckout($data_paypal, true);
        //This will redirect user to PayPal
        return redirect($response['paypal_link']);
    }

    function getPaymentSuccess(Request $request)
    {   
        if ($request->has('token')) {
            $provider = new ExpressCheckout;
            $response = $provider->getExpressCheckoutDetails($request->token);     
            $data = [
                'items' => [
                    [
                        'name'  => $response['L_NAME0'],
                        'price' => $response['AMT'],
                        'qty'   => 1,
                    ],
                ],
                'total'                 => $response['AMT'],
                'invoice_description'   => '',
                'invoice_id'            => '',
            ];
            $payer_id = $response['PAYERID'];
            $response = $provider->doExpressCheckoutPayment($data, $request->token, $payer_id);
                // User::managePaypalPlans(Auth::user()->id,2,$payer_id); // Set as subscribe
                // Notification::newPlanNotification(Auth::user()->id, 2, 'paypal', 'monthly'); // Notify user and admin
            Helper::flashMessage('Congratulations!','You paid for the rental.','success');
            return redirect('notification');
        } return back();
    }


}