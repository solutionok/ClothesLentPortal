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
use App\Models\Notification\Notification;
use App\Models\Helper;
use Auth,Hash,Input,Session,Redirect,Mail,URL,File,Str,Config,DB,Response,View,Validator,Twilio;
use Crypt;

class NotificationController extends ApiBaseController
{
	public function getNotificationList(Request $request) {
		$code = UNSUCCESS;
		$msg = "Notification not found.";
		$user = auth()->guard('api')->user();
		$response = array();
		$this->data['sort_index'] = 'notification.created_at';
	        $this->data['sort_value'] = 'desc';
	        if ($request->has('sort')) {
	            $this->sort($request);
	        }
        	
        	$total = 10;
                if(intval($request->page)<=1)
                    $request->page=1;
                else 
                  $request->page+=1;
                
		$skip = ($request->page-1) * $total;
		$notificationTotal = Notification::where('for_user',$user->id)->with(['from_user_detail'=>function($query){
			$query->select('id');
		}])
                ->get();
		
                $notification = Notification::where('for_user',$user->id)->with(['from_user_detail'=>function($query){
			$query->select('id','first_name','last_name','profile_picture','profile_picture_custom_size');
		}])->orderBy($this->data['sort_index'],$this->data['sort_value'])
                ->skip($skip)->take($total)->get();
		if(count($notification )>0) {
			$code = SUCCESS;
			$msg = "Notification list found successfully.";
			//print_r($notification->toArray());
			foreach($notification as $key=>$value) {
				$notification[$key]->time_duration= Helper::timeDuration($value->created_at);
			}
			$response['notification_list'] = $notification;
                        $response['page'] = intval($request->page)-1 ;
                        $response['total_pages'] = intval(count($notificationTotal) /10) ;
		}
		return Response::json(array('code' => $code,'msg' => $msg,'data' => (object)$response));
	}
	
	public function sort($request)
	    {
	        switch ($request->sort) {
	            case 'date-recently':
	                $this->data['sort_index'] = 'notification.created_at';
	                $this->data['sort_value'] = 'desc';
	                break;
	            case 'date-beginning':
	                $this->data['sort_index'] = 'notification.created_at';
	                $this->data['sort_value'] = 'asc';
	                break;
	            default:
	                $this->data['sort_index'] = 'notification.created_at';
	                $this->data['sort_value'] = 'desc';
	                break;
	        }
	    }
}