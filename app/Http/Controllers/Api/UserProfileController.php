<?php

namespace App\Http\Controllers\Api;

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
use App\Models\Messages\Messages;
use App\Models\Messages\MessagesRoom;
use App\Models\Validators;
use App\Models\Helper;
use Auth,Hash,Input,Session,Redirect,Mail,URL,File,Str,Config,DB,Response,View,Validator,Twilio;
use Crypt;

class UserProfileController extends ApiBaseController
{
	public function getProfile(Request $request) {
		$code = SUCCESS;
		$msg = "User profile get successfully."; 
		$user = auth()->guard('api')->user();
		$response = array();
		$user_details = User::where('id',$user->id)->first(array('id','first_name','last_name','contact_number','location','country','longitude','latitude','birthday','email','size','height','breast','waist','hips','body_type','profile_picture','profile_picture_custom_size','paypal_email_address','status','facebook_id','twitter_id'));
		if(count($user_details)) {
			
			$size = array();
			$size[0]['display'] = "Extra Small";
			$size[1]['display'] = "Small";
			
			$size[2]['display'] = "Medium";
			$size[3]['display'] = "Large";
			$size[4]['display'] = "Extra Large";
			
			$size[0]['value'] = "Extra Small";
			$size[1]['value'] = "Small";
			$size[2]['value'] = "Medium";
			$size[3]['value'] = "Large";
			$size[4]['value'] = "Extra Large";
			$user_details->display_size = "";
			foreach($size as $value)
			{
				if($user_details->size==$value['value']) {
					$user_details->display_size = $value['display'];
				}
			}
			
			$height = array();
			$counter = 0;
			for($ft = 4; $ft <= 6; $ft++) {
				 for($in = 0; $in <= 11; $in++) {
				 	$data = $ft."'".$in.'"';
				 	$height[$counter]['display'] = $data;
				 	$height[$counter]['value'] = $data;
				 	$counter++;
				 }
			}
			$user_details->display_height = "";
			foreach($height as $value)
			{
				if($user_details->height==$value['value']) {
					$user_details->display_height = $value['display'];
				}
			}
			
			$breast = array();
			$counter = 0;
			
			 for($in = 20; $in <= 100; $in++) {
			 	$data = $in.'"';
			 	$breast[$counter]['display'] = $data;
			 	$breast[$counter]['value'] = $data;
			 	$counter++;
			 }
			 
			 $user_details->display_breast = "";
			 foreach($breast as $value)
			 {
				if($user_details->breast==$value['value']) {
					$user_details->display_breast = $value['display'];
				}
			 }
				 
			
			$waist= array();
			$counter = 0;
			
				 for($in = 20; $in <= 100; $in++) {
				 	$data = $in.'"';
				 	$waist[$counter]['display'] = $data;
				 	$waist[$counter]['value'] = $data;
				 	$counter++;
				 }
				 
			$user_details->display_waist = "";
			foreach($waist as $value)
			 {
				if($user_details->waist==$value['value']) {
					$user_details->display_waist = $value['display'];
				}
			 }	
			 
			 
			 $hips= array();
			$counter = 0;
			
				 for($in = 20; $in <= 100; $in++) {
				 	$data = $in.'"';
				 	$hips[$counter]['display'] = $data;
				 	$hips[$counter]['value'] = $data;
				 	$counter++;
				 }
			$user_details->display_hips = ""; 
			foreach($hips as $value)
			 {
				if($user_details->hips==$value['value']) {
					$user_details->display_hips = $value['display'];
				}
			 }	 
				 
			$user_details  = $user_details->toArray();
			$user_details = array_map(function($v){
			        return (is_null($v)) ? "" : $v;
			    },$user_details);
			$user_details['measurement_image'] = "user-interface/img/size_chart.png";
			$response['user_profile'] = $user_details;
		} else {
			$code = UNSUCCESS;
			$msg = "User profile not found.";
		}
		
		return Response::json(array('code' => $code,'msg' => $msg,'data' => (object)$response));
	}
	
	public function postUpdateFireBaseId(Request $request) {
		$code = SUCCESS;
		$msg = "User Firebase id updated successfully.";
		$user = auth()->guard('api')->user();
		$response = array();
		$update_firebase_id = User::where('id',$user->id)->update(array('firebase_id'=>$request->firebase_id));
		return Response::json(array('code' => $code,'msg' => $msg,'data' => (object)$response));
	}
	
	public function postProfile(Request $request) {
		$code = UNSUCCESS;
		$msg = "parameter not found.";
		$user = auth()->guard('api')->user();
		$response = array();
		//return Response::json(array('code' => $code,'msg' => $msg,'data' => (object)$request->all()));
		if(strlen(trim($request->email))> 3)
		$check_user = User::where('email',$request->email)->where('id','!=',$user->id)->first();
	    else
		$check_user= array();

	
		if(count($check_user)>0) {
			$msg = "Email Already Exist.";
		} else {
			if(!isset($request->paypal_email_address)) {
				$request->paypal_email_address= '';
			}
			$update_user = User::find($user->id);
			if(strlen(trim($request->first_name))> 3)
			$update_user->first_name = $request->first_name;
		    if(strlen(trim($request->last_name))> 3)
			$update_user->last_name = $request->last_name;
			if(strlen(trim($request->contact_number))> 3)
			$update_user->contact_number = $request->contact_number;
			if(strlen(trim($request->location))> 0)
			$update_user->location = $request->location;
			if(strlen(trim($request->country))> 0)
			$update_user->country = $request->country;
			if(strlen(trim($request->birthday))> 0) 
			$update_user->birthday = $request->birthday;
			if(intval(($request->size))> 0) 
			$update_user->size = $request->size;
		    if(intval(trim($request->height))> 0) 
			$update_user->height = $request->height;
		    if(strlen(trim($request->breast))> 0) 		
			$update_user->breast = $request->breast;
			if(intval(trim($request->waist))> 0) 	
			$update_user->waist = $request->waist;
			if(strlen(trim($request->hips))> 0) 
			$update_user->hips = $request->hips;
			if(strlen(trim($request->longitude))> 3) 
			$update_user->longitude = $request->longitude;
			if(strlen(trim($request->paypal_email_address))> 3) 
			$update_user->paypal_email_address = $request->paypal_email_address;
			if(strlen(trim($request->body_type))> 0) 
			$update_user->body_type = $request->body_type;
			if(strlen(trim($request->latitude))> 3) 
			$update_user->latitude = $request->latitude;
			if ($request->has('profile_picture')) {
			
		            // Upload files holds custom old file, custom file size, old file, field name, request, first folder and second folder
		            $path = Helper::uploadBase64($request->profile_picture ,$user->profile_picture_custom_size,200,$user->profile_picture,'profile_picture',$request,'profile_picture',$user->id);
	                    $update_user->profile_picture             = $path['new_path'];
	                    $update_user->profile_picture_custom_size = $path['custom_size_path'];
	                    //$msg = $path['new_path'];
		        } 
		        if($user->email!=$request->email) {
		        	$update_user->status = 0;
		        	$update_user->verification_code = rand(100000,1000000);	
		        }else 
		          $update_user->status = 1;
			  
		        $update_user->save();
		        
		        if($user->email!=$request->email) { 
		        	$update_user->notify(new RegistrationVerificationCodeSend($update_user,$this->data['configuration']));
		        }
		        
		        
		        $code = SUCCESS;
		        $msg = "profile updated successfully.";
		        
		        if($request->has('paypal_email_address')) {
		            	$ch = curl_init();
		
				$ppUserID = USER_ID; 
				$ppPass = USER_PASS; 
				$ppSign = USER_SIGN; 
				$ppAppID = APP_ID; 
				$sandboxEmail = SANDBOX_EMAIL; 
				
				
				$emailAddress = $request->paypal_email_address;
				//parameters of requests
				$nvpStr = 'emailAddress='.$emailAddress.'&matchCriteria=NONE';
				
				// RequestEnvelope fields
				$detailLevel    = urlencode("ReturnAll");
				$errorLanguage  = urlencode("en_US");
				$nvpreq = "requestEnvelope.errorLanguage=$errorLanguage&requestEnvelope.detailLevel=$detailLevel&";
				$nvpreq .= "&$nvpStr";
				curl_setopt($ch, CURLOPT_POSTFIELDS, $nvpreq);
				
				$headerArray = array(
				"X-PAYPAL-SECURITY-USERID:$ppUserID",
				"X-PAYPAL-SECURITY-PASSWORD:$ppPass",
				"X-PAYPAL-SECURITY-SIGNATURE:$ppSign",
				"X-PAYPAL-REQUEST-DATA-FORMAT:NV",
				"X-PAYPAL-RESPONSE-DATA-FORMAT:JSON",
				"X-PAYPAL-APPLICATION-ID:$ppAppID",
				"X-PAYPAL-SANDBOX-EMAIL-ADDRESS:$sandboxEmail" //comment this line in production mode. IT IS JUST FOR SANDBOX TEST 
				);
				
				$url="https://svcs.sandbox.paypal.com/AdaptiveAccounts/GetVerifiedStatus";
				curl_setopt($ch, CURLOPT_URL,$url);
				curl_setopt($ch, CURLOPT_POST, 1);
				curl_setopt($ch, CURLOPT_VERBOSE, 1);
				curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
				curl_setopt($ch, CURLOPT_HTTPHEADER, $headerArray);
				$paypalResponse = curl_exec($ch);
				//echo $paypalResponse;   //if you want to see whole PayPal response then uncomment it.
				curl_close($ch);
				
				$data = json_decode($paypalResponse);
				
				if($data) {
					if($data->responseEnvelope->ack=='Failure') {
						User::where('id',$update_user->id)->update(array('verify_paypal_email'=>0));
						$error_paypal_email = array();
						$code = UNSUCCESS;
						$msg =  "paypal account not verified. please verify paypal account.";
						
					} else {
						User::where('id',$update_user->id)->update(array('verify_paypal_email'=>1));
					}
				}
		            } else {
		            	User::where('id',$update_user->id)->update(array('verify_paypal_email'=>0));
		            }
		            
		            
			$user_details = User::where('id',$user->id)->first(array('id','first_name','last_name','contact_number','location','country','longitude','latitude','birthday','email','size','height','breast','waist','hips','body_type','profile_picture','profile_picture_custom_size','paypal_email_address','status','facebook_id','twitter_id'));
			if(count($user_details)) {
				$user_details  = $user_details->toArray();
				$user_details = array_map(function($v){
				        return (is_null($v)) ? "" : $v;
				    },$user_details);
				$user_details['measurement_image'] = "user-interface/img/size_chart.png";
				$response['user_profile'] = $user_details;
			}
		        
		}
		return Response::json(array('code' => $code,'msg' => $msg,'data' => (object)$response));
	}
	
	public function postChangePassword(Request $request) {
		$code = UNSUCCESS;
		$msg = "invalid current password.";
		$user = auth()->guard('api')->user();
		$response = array();
		    $rules = []; 
                    $rules['new_password'] = 'required|min:3';
                    $validator = Validator::make($request->all(), $rules);
                    if ($validator->fails()) {
                        return Response::json(array('code' => $code, 'msg' => $validator->errors()->messages(), 'data' => null));
                    }
		if(Hash::check($request->current_password,$user->password)) {
			$change_password = User::find($user->id);
			$change_password->password = Hash::make($request->new_password);
			$change_password->crypted_password = Crypt::encrypt($request->password);
			$change_password->save();
			$code = SUCCESS;
			$msg = "Password changed successfully.";
		} 
		return Response::json(array('code' => $code,'msg' => $msg,'data' => (object)$response));
	}
	
	
}