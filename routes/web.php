<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('payment', function () {
    $curl = curl_init();

    curl_setopt_array($curl, array(
        CURLOPT_URL => "https://svcs.sandbox.paypal.com/AdaptivePayments/Pay?actionType=PAY_PRIMARY&clientDetails.applicationId=APP-80W284485P519543T&clientDetails.ipAddress=127.0.0.1&currencyCode=USD&feesPayer=EACHRECEIVER&memo=Example&receiverList.receiver(0).amount=25.0&receiverList.receiver(0).email=vishal.patel-facilitator%40mitajacorp.com&receiverList.receiver(0).primary=true&receiverList.receiver(1).amount=5.0&receiverList.receiver(1).email=vishal.patel-buyer%40mitajacorp.com&receiverList.receiver(1).primary=false&requestEnvelope.errorLanguage=en_US&returnUrl=https%3A%2F%2Fwww.rentasuit.ca%2Fpayment%2Fsuccess&cancelUrl=https%3A%2F%2Fwww.rentasuit.ca%2Fpayment%2Fcancel",
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
    $err      = curl_error($curl);

    curl_close($curl);

    if ($err) {
        echo "cURL Error #:" . $err;
    } else {
        echo $response;
        $response = json_decode($response);
        echo "<pre>";
        print_r($response);
        //echo $response->responseEnvelope->ack;
        if ($response->responseEnvelope->ack == "Failure") {
            echo $response->error[0]->message;
        } else {
            $payKey = $response->payKey;
            return redirect()->to('https://www.sandbox.paypal.com/cgi-bin/webscr?cmd=_ap-payment&paykey=' . $payKey);
        }
    }
});

Route::get('payment/success', function () {
    echo "success";
});

Route::get('payment/cancel', function () {
    echo "cancel";
});

Route::get('/getProductDetail', 'AdminInterface\ProductManagementController@getProductDetail')->name('getProductDetail');
Route::get('/getProfile', 'AdminInterface\ProductManagementController@getProfile')->name('getProfile');


Route::group(['middlewareGroups' => ['web']], function () {
    Route::get('admin/logout', function () {
        Auth::logout();
        return redirect('admin');
    });
    Route::get('logout', function () {
        Session::flush();
        Auth::logout();
        return redirect('/');
    });
    Route::group(["prefix" => "admin", 'namespace' => 'AdminInterface'], function () {
        // Admin Interface
        Route::group(['middleware' => ['admin']], function () {
            Route::group(["prefix" => "users-management"], function () {
                // ---------- Post Method ---------- //
                Route::post('/edit', 'UsersManagementController@postEdit');
                Route::post('/credentials', 'UsersManagementController@postCredentials');
                Route::post('/add', 'UsersManagementController@postAdd');
                // ---------- Get Method ---------- //
                Route::get('/edit/{id}', 'UsersManagementController@getEdit');
                Route::get('/delete/{id}', 'UsersManagementController@getDelete');
                Route::get('/add', 'UsersManagementController@getAdd');
                Route::get('/', 'UsersManagementController@getIndex');
            });
            Route::group(["prefix" => "product-management"], function () {
                // ---------- Post Method ---------- //
                Route::post('/save', 'ProductManagementController@postSave');
                // ---------- Get Method ---------- //
                Route::get('/edit/{id}', 'ProductManagementController@getEdit');
                Route::get('/delete/{id}', 'ProductManagementController@getDelete');
                Route::get('/', 'ProductManagementController@getIndex');
                Route::get('/deleted', 'ProductManagementController@getIndex');
            });
            Route::group(["prefix" => "transaction-history"], function () {
                // ---------- Post Method ---------- //

                Route::get('/', 'TransactionHistoryController@getIndex');
            });

            Route::group(["prefix" => "faq-management"], function () {
                Route::get('/add', 'FAQManagement@getAdd');
                Route::post('/save', 'FAQManagement@postSave');
                // ---------- Get Method ---------- //
                Route::get('/edit/{id}', 'FAQManagement@getEdit');
                Route::get('/delete/{id}', 'FAQManagement@getDelete');
                Route::get('/', 'FAQManagement@getIndex');
            });
            Route::group(["prefix" => "content-management"], function () {
                // ---------- Post Method ---------- //
                Route::post('/save', 'ContentManagementController@postSave');
                Route::post('/add', 'ContentManagementController@postAdd');
                // ---------- Get Method ---------- //
                Route::get('/remove-repeater-fields', 'ContentManagementController@getRemoveRepeaterFields');
                Route::get('/repeater-fields', 'ContentManagementController@getRepeaterFields');
                Route::get('/edit-page/{id}', 'ContentManagementController@getEditPage');
                Route::get('/add', 'ContentManagementController@getAdd');
                Route::get('/', 'ContentManagementController@getIndex');
            });
            Route::group(["prefix" => "configuration"], function () {
                // ---------- Post Method ---------- //
                Route::post('/social-links', 'ConfigurationController@postSocialLinks');
                Route::post('/password', 'ConfigurationController@postPassword');
                Route::post('/general', 'ConfigurationController@postGeneral');
                Route::post('/email', 'ConfigurationController@postEmail');
                Route::post('/api-keys', 'ConfigurationController@postApiKeys');
                // ---------- Get Method ---------- //
                Route::get('/', 'ConfigurationController@getIndex');
            });
            Route::group(["prefix" => "category-management"], function () {
                // ---------- Post Method ---------- //
                Route::post('/save', 'CategoryManagementController@postSave');
                // ---------- Get Method ---------- //
                Route::get('/edit/{id}', 'CategoryManagementController@getEdit');
                Route::get('/delete/{id}', 'CategoryManagementController@getDelete');
                Route::get('/add', 'CategoryManagementController@getAdd');
                Route::get('/', 'CategoryManagementController@getIndex');
            });

            Route::group(["prefix" => "cleaning-management"], function () {
                // ---------- Post Method ---------- //
                Route::post('/save', 'CleaningManagementController@postSave');
                // ---------- Get Method ---------- //
                Route::get('/edit/{id}', 'CleaningManagementController@getEdit');
                Route::get('/delete/{id}', 'CleaningManagementController@getDelete');
                Route::get('/add', 'CleaningManagementController@getAdd');
                Route::get('/', 'CleaningManagementController@getIndex');
                Route::get('/map_demo', 'CleaningManagementController@map_demo');
                Route::get('/get_record', 'CleaningManagementController@get_record');
            });

            Route::group(["prefix" => "news-management"], function () {
                // ---------- Post Method ---------- //
                Route::post('/save', 'BlogManagementController@postSave');
                // ---------- Get Method ---------- //
                Route::get('/edit/{id}', 'BlogManagementController@getEdit');
                Route::get('/delete/{id}', 'BlogManagementController@getDelete');
                Route::get('/add', 'BlogManagementController@getAdd');
                Route::get('/', 'BlogManagementController@getIndex');
            });


        });
        // UnAuthenticated for admin interface
        // ---------- Post Method ---------- //
        Route::post('/reset-password', 'MainController@postResetPassword');
        Route::post('/login', 'MainController@postLogin');
        Route::post('/forgot-password', 'MainController@postForgotPassword');
        // ---------- Get Method ---------- //
        Route::get('/reset-password', 'MainController@getResetPassword');
        // Route::get('/logout'         , 'MainController@getLogout');
        Route::get('/forgot-password', 'MainController@getForgotPassword');
        Route::get('/', 'MainController@getIndex');
        Route::get('/statistics', 'MainController@getStats');
        Route::get('/products-stats', 'MainController@getProductsStats');


    });
    Route::group(['namespace' => 'UserInterface'], function () {
        // Client Interface
        Route::group(['middleware' => ['client']], function () {
            Route::group(["prefix" => "test-blade"], function () {
                // ---------- Get Method ---------- //
                // Route::get('/'				, 'ApiController@getAddressValidation');
                Route::get('/', 'ApiController@getUps');
            });
            Route::group(["prefix" => "transaction"], function () {
                // ---------- Get Method ---------- //
                Route::get('/', 'TransactionController@getIndex');
            });
            Route::group(["prefix" => "rented"], function () {
                // ---------- Get Method ---------- //
                Route::get('/view/{slug}', 'RentedController@getSingle');
                Route::get('/', 'RentedController@getIndex');
                Route::get('/change-status/{status}/{id}', 'RentedController@getChangeStatus');
                Route::post('/submit-review', 'RentedController@postSubmitReview');
                //				Route::get('/proceed-checkout'			, 'RentedController@getCheckout');
                Route::get('/proceed-checkout', 'RentedController@payRental');
                Route::get('/success/{id}', 'RentedController@payment_success');
                Route::get('/cancel/{id}', 'RentedController@payment_cancel');
            });
            Route::group(["prefix" => "profile"], function () {
                // ---------- Post Method ---------- //
                Route::post('/save', 'ProfileController@postSave');
                // ---------- Get Method ---------- //
                Route::get('/profile-personal-info/{slug}', 'ProfileController@getPersonalInfo');
                Route::get('/', 'ProfileController@getIndex');
            });
            Route::group(["prefix" => "paid"], function () {
                // ---------- Get Method ---------- //
                Route::get('/{slug}', 'PaidController@getSingle');
                Route::get('/', 'PaidController@getIndex');
            });
            Route::group(["prefix" => "notification"], function () {
                // ---------- Post Method ---------- //
                Route::post('/decline-request', 'NotificationController@declineRequest');
                Route::post('/accept-request', 'NotificationController@acceptRequest');
                // ---------- Get Method ---------- //
                Route::get('/notification-inner', 'NotificationController@getInner');
                Route::get('/', 'NotificationController@getIndex');
                Route::get('/getCount', 'NotificationController@getCount');
            });
            Route::group(["prefix" => "my-wishlist"], function () {
                // ---------- Post Method ---------- //
                Route::post('/', 'WishlistController@getIndex');
                // ---------- Get Method ---------- //
                Route::get('/add-wishlist', 'WishlistController@getAddWishlist');
                Route::get('/remove-wishlist', 'WishlistController@getDeleteWishlist');
                Route::get('/', 'WishlistController@getIndex');
            });
            Route::group(["prefix" => "my-cart"], function () {
                // ---------- Post Method ---------- //
                Route::post('/add-cart', 'CartController@getAddToCart');
                Route::post('/', 'CartController@getIndex');
                // ---------- Get Method ---------- //
                Route::get('/proceed-checkout', 'CartController@getCheckout');
                Route::get('/make-order', 'CartController@getMakeOrder');
                Route::get('/refund-order', 'CartController@getRefund');
                Route::get('/make-payment', 'CartController@getOrderPayment');
                Route::get('/pay-order', 'CartController@getPayOrder');
                Route::get('/remove-cart', 'CartController@getDeleteToCart');
                Route::get('/change-delivery', 'CartController@changeDelivery');
                Route::get('/', 'CartController@getIndex');
                Route::get('/{item}', 'CartController@displayCart');
                Route::get('/success', 'CartController@payment_success');
                Route::get('/cancel', 'CartController@payment_cancel');
            });
            Route::group(["prefix" => "messages"], function () {
                // ---------- Post Method ---------- //
                Route::post('/send-message', 'MessagesController@getSendMessage');
                Route::post('/', 'MessagesController@getIndex');
                // ---------- Get Method ---------- //
                Route::get('/messages-load-more', 'MessagesController@getMessagesLoadMore');
                Route::get('/message-inner', 'MessagesController@getMessageInner');
                Route::get('/', 'MessagesController@getIndex');
            });
            Route::group(["prefix" => "for-rent"], function () {
                // ---------- Post Method ---------- //
                Route::post('/save', 'ForRentController@postSave');
                // ---------- Get Method ---------- //
                Route::get('/posted', 'ForRentController@getAddpro');
                Route::get('/view/{slug}', 'ForRentController@getSingle');
                Route::get('/post-an-item', 'ForRentController@getAdd');
                Route::get('/edit-item/{slug}', 'ForRentController@getEdit');
                Route::get('/delete/{slug}', 'ForRentController@getDelete');
                Route::get('/', 'ForRentController@getIndex');
                Route::get('/booking-list/{id}', 'ForRentController@getBookingList');
            });
        });
        // UnAuthenticated for user interface
        Route::group(['namespace' => 'SocialMedia'], function () {
            Route::group(["prefix" => "twitter"], function () {
                // ---------- Get Method ---------- //
                Route::get('callback', 'TwitterController@getCallback');
                Route::get('/', 'TwitterController@getIndex');
            });
            Route::group(["prefix" => "facebook"], function () {
                // ---------- Get Method ---------- //
                Route::get('callback', 'FacebookController@getCallback');
                Route::get('/', 'FacebookController@getIndex');
            });
        });
        // UnAuthenticated for user interface
        Route::group(['namespace' => 'Api'], function () {
            Route::group(["prefix" => "paypal"], function () {
                // ---------- Get Method ---------- //
                Route::get('payment-success', 'PayPalController@getPaymentSuccess'); // CALLBACK
                Route::get('/', 'PayPalController@getPayment'); // REDIRECT
            });
        });
        // UnAuthenticated for user interface
        Route::group(["prefix" => "garments"], function () {
            Route::post('/', 'GarmentsController@getIndex');
            // ---------- Get Method ---------- //
            Route::get('/view/{slug}', 'GarmentsController@getSingle');
            Route::get('/{slug}', 'GarmentsController@getIndex');
            Route::get('/', 'GarmentsController@getIndex');
        });
        Route::group(["prefix" => "news"], function () {
            // ---------- Get Method ---------- //
            Route::get('/{slug}', 'BlogsController@getSingle');
            Route::get('/', 'BlogsController@getIndex');
        });
        // ---------- Post Method ---------- //
        Route::post('upload-by-dropzone', 'MainController@postUploadByDropzone');
        Route::post('delete-by-dropzone', 'MainController@postDeleteByDropzone');
        Route::post('reset-password', 'MainController@postResetPassword');
        Route::post('update_firebase_id', 'MainController@postUpdateFirebaseId');
        Route::post('registration', 'MainController@postRegistration');
        Route::post('login', 'MainController@postLogin');
        Route::post('forgot-password', 'MainController@postForgotPassword');
        Route::post('contact-us', 'MainController@postContactUs');
        // ---------- Get Method ---------- //
        Route::get('verify-registration/{email}', 'MainController@getVerifyRegistration');
        Route::get('terms-and-conditions', 'MainController@getTermsAndConditions');
        Route::get('tcNpp', 'MainController@getTcNpp');
        Route::get('shipping-calculator', 'MainController@getShippingCalculator');
        Route::post('shipping-calculator', 'MainController@postShippingCalculator');
        Route::get('return-policy', 'MainController@getReturnPolicy');
        Route::get('privacy-policy', 'MainController@getPrivacyPolicy');
        Route::get('reset-password', 'MainController@getResetPassword');
        Route::get('faq', 'MainController@getFaq');
        Route::get('contact-us', 'MainController@getContactUs');
        Route::get('about', 'MainController@getAbout');
        Route::get('/{slug}', 'ProfileController@getSingle');
        Route::get('/', 'MainController@getIndex');
        Route::post('/add-news-latter', 'MainController@postAddNewsLatter');
    });
});