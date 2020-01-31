<?php
 
use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/


Route::get('test_android_push',function(){
	$msg = "Android Push Notification!!!";
	$fields = array(
                    'to' => "eIagJJpmVks:APA91bEpPuKU4lmqYWXDEspgBz2Pr7i-qyxTLC4rpKXU_A-QJCEZLZYjyxWpr7QTxx6rb0fhe_BW7cXuafvkobwq051UjS1dVDIPLxbzowdcOEjmyS5aIKOIDrl3drXJlxgrYDUbWNP7",
                    'data' => array("message"=>$msg,'title'=>"title")
                   );
        sendPushNotification($fields);
        echo "here";
});

Route::get('test_ios_push',function(){
	$msg = "IOS Push Notification!!!";
	
        //sendiSOnotification($msg,"84E326A3693D28CDB91A270E9B9EBE3C2A417504BED3795871E3C1849ABD6CA7","IOS",0,0);
        //echo "here";
        
        $deviceToken = '84E326A3693D28CDB91A270E9B9EBE3C2A417504BED3795871E3C1849ABD6CA7';

	$passphrase = '';
	
	$message = 'My first push notification!';
	
	////////////////////////////////////////////////////////////////////////////////

	$ctx = stream_context_create();
	$filename = 'ck.pem';
	stream_context_set_option($ctx, 'ssl', 'local_cert', $filename);
	stream_context_set_option($ctx, 'ssl', 'passphrase', $passphrase);
	
	// Open a connection to the APNS server
	$fp = stream_socket_client(
	'ssl://gateway.sandbox.push.apple.com:2195', $err,
	$errstr, 60, STREAM_CLIENT_CONNECT|STREAM_CLIENT_PERSISTENT, $ctx);
	
	if (!$fp)
	exit("Failed to connect: $err $errstr" . PHP_EOL);
	
	echo 'Connected to APNS' . PHP_EOL;
	
	// Create the payload body
	$body['aps'] = array(
	'alert' => $message,
	'sound' => 'default'
	);
	
	// Encode the payload as JSON
	$payload = json_encode($body);
	
	// Build the binary notification
	$msg = chr(0) . pack('n', 32) . pack('H*', $deviceToken) . pack('n', strlen($payload)) . 
	
	$payload;
	
	// Send it to the server
	$result = fwrite($fp, $msg, strlen($msg));
	
	if (!$result)
	    echo 'Message not delivered' . PHP_EOL;
	else
	    echo 'Message successfully delivered'.PHP_EOL;
	
	// Close the connection to the server
	fclose($fp);
});
Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group(array('prefix'=>API_PREFIX,'middleware'=>API_MIDDLEWARE_NAME),function(){
	Route::get("profile",array('uses' => 'Api\UserProfileController@getProfile'));
	Route::post("update_firebase_id",array('uses' => 'Api\UserProfileController@postUpdateFireBaseId'));
	Route::post("profile",array('uses' => 'Api\UserProfileController@postProfile'));
	Route::post("change_password",array('uses' => 'Api\UserProfileController@postChangePassword'));
	Route::post("resend_verification_code",array('uses' => 'Api\UserController@postResendVerificationCode'));
	Route::post("verify_code",array('uses' => 'Api\UserController@postVerifyCode'));
	//Route::get("product_detail/{product_id}",array('uses' => 'Api\UserController@getProductDetail'));
	Route::post("product_add_remove_wishlist",array('uses' => 'Api\UserController@postProductAddRemoveWishlist'));
	Route::get("messages",array('uses' => 'Api\UserController@GetMessages'));
	Route::get("messages-details/{room_id}",array('uses' => 'Api\UserController@GetMessagesDetails'));
	
        Route::post("submit_product_review",array('uses' => 'Api\UserController@postSubmitProductReview'));

	Route::get("rented_list",array('uses' => 'Api\RentedController@getRentedList'));
	Route::get("rented_detail",array('uses' => 'Api\RentedController@getRentedDetail'));
	Route::get("wish_list",array('uses' => 'Api\WishListController@getWishList'));
	
	// update topday
	
	Route::get("category_list",array('uses' => 'Api\UserController@getCategoryList'));

	Route::get("product_list",array('uses' => 'Api\UserController@getProductList'));
	
	Route::get("product_list_filter",array('uses' => 'Api\UserController@getProductListFilter'));
	
	Route::get("review_list",array('uses' => 'Api\UserController@getReviewList'));
	
	
	Route::get("product_detail",array('uses' => 'Api\UserController@getProductDetail'));

	Route::get("product_search",array('uses' => 'Api\UserController@getProductSearch'));
	Route::get("new_added_product",array('uses' => 'Api\UserController@getNewAddedProductList'));
	
	Route::get("common/dropdown",array('uses' => 'Api\CommonDropdownController@getCommonDropdown'));

	Route::post("add_cart",array('uses' => 'Api\CartController@postAddCart'));
	Route::get("cart_list",array('uses' => 'Api\CartController@getCartList'));
	Route::post("remove_cart",array('uses' => 'Api\CartController@postRemoveCart'));
	Route::post("empty_cart",array('uses' => 'Api\CartController@postEmptyCart'));
	Route::get("make_order",array('uses' => 'Api\CartController@postMakeOrder'));
	Route::post("generate_pay_id",array('uses' => 'Api\CartController@postGeneratePayId'));
	
	Route::get("cleaner_list",array('uses' => 'Api\UserController@getCleanerList'));
	
	Route::post("post_item",array('uses' => 'Api\PostItemController@postPostItem'));
	Route::post("post_item/upload_sub_photos",array('uses' => 'Api\PostItemController@postPostItemUploadSubPhotos'));
	Route::post("post_item/remove_sub_photos",array('uses' => 'Api\PostItemController@postPostItemRemoveSubPhotos'));
	
	Route::get("edit_post_item/detail",array('uses' => 'Api\PostItemController@getEditPostItemDetail'));
	Route::post("edit_post_item",array('uses' => 'Api\PostItemController@postEditPostItem'));
	Route::get("post_item/list",array('uses' => 'Api\PostItemController@getPostItemList'));
	Route::post("post_item/remove",array('uses' => 'Api\PostItemController@postPostItemRemove'));
	Route::post("contact_us",array('uses' => 'Api\UserController@postContactUs'));
	Route::get("faqs_list",array('uses' => 'Api\UserController@getFAQsList'));

	
	Route::get("notification_list",array('uses' => 'Api\NotificationController@getNotificationList'));
	Route::get("booking_list",array('uses' => 'Api\BookingController@getBookingList'));
	
	Route::post("rented_product_status_change",array('uses' => 'Api\RentedController@postRentedProductStatusChange'));
	Route::post("proceed_to_payment",array('uses' => 'Api\RentedController@postProceedToPayment'));
	Route::get("transaction_list",array('uses' => 'Api\RentedController@getTransactionList'));
	Route::get("transaction_detail",array('uses' => 'Api\RentedController@getTransactionDetail'));
	
	Route::post("shipping_calculator",array('uses' => 'Api\ShippingCalculatorController@getShippingCalculator'));
	Route::post("logout",array('uses' => 'Api\UserController@postLogout'));



});
Route::group(array('prefix'=>API_PREFIX),function(){
	Route::post("signup",array('uses' => 'Api\UserController@postSignup'));
	Route::post("signin",array('uses' => 'Api\UserController@postSignin'));
	Route::post("signin/social",array('uses' => 'Api\UserController@postSigninSocial'));
	Route::post("signin/facebook",array('uses' => 'Api\UserController@postSigninFacebook'));
	Route::post("signin/twitter",array('uses' => 'Api\UserController@postSigninTwitter'));
	Route::post("forgotpassword",array('uses' => 'Api\UserController@postForgotpassword'));
	
	
});


