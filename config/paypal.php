<?php
/**
 * PayPal Setting & API Credentials
 * Created by Raza Mehdi <srmk@outlook.com>.
 */

return [
    'mode'    => 'sandbox', // Can only be 'sandbox' Or 'live'. If empty or invalid, 'live' will be used.
    'sandbox' => [
        'username'    => 'rentasuitclothes-backend_api1.gmail.com',
        'password'    => '85UEPETPYL9C6PS9',
        'secret'      => 'AI6XxsHUoOHL02cDJ3IqXWJ57udLAvYkGAqZB10rZZqNvNo-7r1JWyC5',
        'certificate' => '',
        'app_id'      => 'APP-80W284485P519543T', // Used for testing Adaptive Payments API in sandbox mode
    ],
    'live' => [
        'username'    => '',
        'password'    => '',
        'secret'      => '',
        'certificate' => '',
        'app_id'      => '', // Used for Adaptive Payments API
    ],

    'payment_action' => 'Sale', // Can only be 'Sale', 'Authorization' or 'Order'
    'currency'       => 'CAD',
    'notify_url'     => '', // Change this accordingly for your application.
    'locale'         => '', // force gateway language  i.e. it_IT, es_ES, en_US ... (for express checkout only)
];
