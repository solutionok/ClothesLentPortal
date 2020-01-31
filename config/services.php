<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Third Party Services
    |--------------------------------------------------------------------------
    |
    | This file is for storing the credentials for third party services such
    | as Stripe, Mailgun, SparkPost and others. This file provides a sane
    | default location for this type of information, allowing packages
    | to have a conventional place to find your various credentials.
    |
    */

    'mailgun' => [
        'domain' => env('MAILGUN_DOMAIN'),
        'secret' => env('MAILGUN_SECRET'),
    ],

    'ses' => [
        'key' => env('SES_KEY'),
        'secret' => env('SES_SECRET'),
        'region' => 'us-east-1',
    ],

    'sparkpost' => [
        'secret' => env('SPARKPOST_SECRET'),
    ],

    'stripe' => [
        'model' => App\User::class,
        'key' => env('STRIPE_KEY'),
        'secret' => env('STRIPE_SECRET'),
    ],

    'facebook' => [
        'client_id'     => '2008114579409719', //439254433111846 //1653288318041517
        'client_secret' => '21f7354be644801d1947ffc87f095b61', //ec0c7e7252165ec6026b69e0ec90568c //ffb42161ddbb029f2703258139249bed
        'redirect'      => 'https://rentasuit.ca/facebook/callback',
        //'redirect'      => 'http://maverickpreviews.com/programming/rent-a-suit/public/facebook/callback',
    ],

    'twitter' => [
        'client_id'     => 'F95kvasU5WqMmbOqWOt1djik8',//ClOeqddBWB3AVwOnaJqGTB4o6
        'client_secret' => 'RkhwmBXOsSVTauiiPgKbTbXawCcI0aEQvtGFOruGwPYSi6YyRE',//OKaYlrOJrXDVRM4PZ56wj3tBSgFsy28Bqe3aIokzKqiDNLevBj
        'redirect'      => 'https://rentasuit.ca/twitter/callback',
        //'redirect'      => 'http://maverickpreviews.com/programming/rent-a-suit/public/twitter/callback',
    ],


];
