<?php

namespace App\Functions;

use App\Models\Configuration;
use PayPal\Auth\OAuthTokenCredential;
use PayPal\Rest\ApiContext;

class PaypalConfig {

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */


    public static function getApiContext() {

        $conf = Configuration::find(1);

        $pCID = $conf->paypal_client_id;
        $pSecret = $conf->paypal_client_secret;
        if($conf->paypal_mode === "live") {
            $pCID = $conf->paypal_live_client_id;
            $pSecret = $conf->paypal_live_client_secret;
        }

        $paypal = new ApiContext(new OAuthTokenCredential($pCID, $pSecret));
        return $paypal;
    }


}
