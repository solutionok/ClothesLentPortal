<?php

define('API_USER_ID','dupentalent_api1.gmail.com');
define('API_USER_PASS','XVDJ9Y8HARYDGECM');
define('API_USER_SIGN','ALFgi8ofeA-6HuFl5AL7sH8tfO1oARur-ilFaAb35D-I4tM0SN8zllcE');
define('API_APP_ID','APP-80W284485P519543T');
define('API_SANDBOX_EMAIL','meher.ayed@blachere-factory.com');

define('API_URL','https://svcs.sandbox.paypal.com/AdaptivePayments/Pay');
define('API_ACTION_TYPE','PAY_PRIMARY');
define('API_IP_ADDRESS','127.0.0.1');
define('API_CURRENCY_CODE','CAD');
define('API_FEES_PAYER','EACHRECEIVER');

define('API_ADMIN_EMAIL','businessCanada@gmail.com');


define('USER_ID','vishal.patel-facilitator_api1.mitajacorp.com');
define('USER_PASS','AWV9D3FATHQN9LCF');
define('USER_SIGN','A76bwlv2Z01mOclk1JxeCgsePvJ8AeHFAIIl50UGOc2vL789Duw9RUIj');
define('APP_ID','APP-80W284485P519543T');
define('SANDBOX_EMAIL','vishal.patel@mitajacorp.com');

define('URL','https://svcs.sandbox.paypal.com/AdaptivePayments/Pay');
define('ACTION_TYPE','PAY_PRIMARY');
define('IP_ADDRESS','127.0.0.1');
define('CURRENCY_CODE','CAD');
define('FEES_PAYER','EACHRECEIVER');

define('ADMIN_EMAIL','vishal.patel-facilitator@mitajacorp.com');
//define('SUCCESS_URL',url('my-cart/success'));
//define('CANCEL_URL', url('my-cart/cancel'));

define('SUCCESS_URL', Config('app.url').'/my-cart/success');
define('CANCEL_URL', Config('app.url').'/my-cart/cancel');

// sandbox merchant get verify status

 
	function sendPushNotification($fields) {
         
        //require_once __DIR__ . '/config.php';
  
        // Set POST variables
        $url = 'https://fcm.googleapis.com/fcm/send';
  
        $headers = array(
            'Authorization: key=AIzaSyCghgBHl5taqw7Nz9CDEv17I3Gn2yX3Xcc', ////AIzaSyB5GNaxLBEC6vdCE5v6dTnIm3Uq2FdOY8U
            'Content-Type: application/json'
        );
        // Open connection
        $ch = curl_init();
 
        // Set the url, number of POST vars, POST data
        curl_setopt($ch, CURLOPT_URL, $url);
 
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
 
        // Disabling SSL Certificate support temporarly
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
 
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($fields));
 
        // Execute post
        $result = curl_exec($ch);        
             
        if ($result === FALSE) {
            die('Curl failed: ' . curl_error($ch));
        }
 	//print_r($result);
        // Close connection
        curl_close($ch);
 
        return $result;
    }
    
    function sendiSOnotification($message,$deviceToken,$Type,$pendingcount,$id){
    
    	//echo phpinfo();exit;
        //echo "exit";
	$passphrase = '';
	$message=urldecode($message);
	////////////////////////////////////////////////////////////////////////////////
	//echo base_path();exit;
	$ctx = stream_context_create();
	stream_context_set_option($ctx, 'ssl', 'local_cert','pushcert.pem');
	//stream_context_set_option($ctx, 'ssl', 'passphrase', $passphrase);
	// $fp = stream_socket_client(
	//     'ssl://gateway.push.apple.com:2195', $err,
	//     $errstr, 60, STREAM_CLIENT_CONNECT|STREAM_CLIENT_PERSISTENT, $ctx);
	
	$fp = stream_socket_client(
	        'ssl://gateway.sandbox.push.apple.com:2195', $err, $errstr, 60, STREAM_CLIENT_CONNECT | STREAM_CLIENT_PERSISTENT, $ctx);
	
	// Open a connection to the APNS server
	
	    $countP = intval($pendingcount);
	
	if (!$fp)
	    exit("Failed to connect: $err $errstr" . PHP_EOL);
	
	//echo 'Connected to APNS' . PHP_EOL;
	$body['aps'] = array(
	    'alert' => $message,
	        'type' =>$Type,
	    'sound' => 'default',
	        'badge' => $countP,
	        'id'=>$id
	    );
	
	// Encode the payload as JSON
	$payload = json_encode($body);
	
	// Build the binary notification
	$msg = chr(0) . pack('n', 32) . pack('H*', $deviceToken) . pack('n', strlen($payload)) . $payload;
	
	// Send it to the server
	$result = fwrite($fp, $msg, strlen($msg));
	print_r($result);
	// if (!$result)    
	//         //echo 'fail';
	    
	// else
	//      //echo 'sucees';
	    
	
	//    $output = $json->encode($arrResult);
	//    print_r($output);
	// Close the connection to the server
	fclose($fp);
}

function pushMobile ($userID, $title, $message) {
    $user_device_token = \App\Models\DeviceToken::where('user_id', $userID)->get();
    if (count($user_device_token) > 0) {
        foreach ($user_device_token as $key => $value) {
            if ($value->device_type == "Android") {
                $fields = array(
                    'to' => $value->device_token,
                    'data' => array("message" => $message, 'title' => $title)
                );
                sendPushNotification($fields);
            }
        }
    }
}


?>