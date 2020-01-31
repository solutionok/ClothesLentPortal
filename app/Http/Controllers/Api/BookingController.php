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

class BookingController extends ApiBaseController
{
	public function getBookingList(Request $request) {
		$code = UNSUCCESS;
		$msg = "Booking list not found.";
		$user = auth()->guard('api')->user();
		$response = array();
		
	        
		
		//$user_product_ids = Products::where('user_id',$user->id)->get(array('id'));
		//$user_product_ids  = array_pluck($user_product_ids,'id');
		$product_id = $request->product_id; //'product_detail'
		$booking_list = Rent::where('product_id',$product_id)->where('status','!=','Cart')->with(['user_detail'=>function($query){
			$query->select('id','first_name','last_name','email','profile_picture','profile_picture_custom_size','location');
		}])->get();
		if(count($booking_list)>0) {
			$booking_list = $booking_list->toArray();
			$booking_list = array_map(function($v){
			        return (is_null($v)) ? "" : $v;
			    },$booking_list);
			$response['booking_list'] = $booking_list;
			
			$code = SUCCESS;
			$msg = "Booking list found successfully.";
		}
		
		return Response::json(array('code' => $code,'msg' => $msg,'data' => (object)$response));
	}
}