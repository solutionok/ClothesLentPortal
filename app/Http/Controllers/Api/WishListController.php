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

class WishListController extends ApiBaseController
{
	public function getWishList(Request $request) {
		$code = UNSUCCESS;
		$msg = "Wishlist not found.";
		$user = auth()->guard('api')->user();
		$response = array();
		
	        $total = 10;
		$skip = ($request->page-1) * $total;
		
		$wishlist = Wishlist::where('user_id',$user->id)->orderBy('id','desc')->skip($skip)->take($total)->get();
		$product_list = array();
		if(count($wishlist)>0) {
			foreach($wishlist as $key=>$value) {
				 $product_detail = Products::where('id',$value->product_id)->with(['user_detail'=>function($query){
				$query->select("id","contact_number","location","body_type","first_name","last_name","profile_picture","profile_picture_custom_size");
				}])->first();
                               if(!is_object($product_detail)) 
                                {
                                  $value->delete();
                                }else 
                                    $product_list[] =$product_detail;
			}
			$code = SUCCESS;
			$msg = "Wishlist found successfully.";
			foreach($product_list as $key=>$value)
			{
                            if(!is_object($value)) 
                                continue; 
				if($user) {
					$check_on_wishlist_or_not = Wishlist::where('product_id',$value->id)->where('user_id',$user->id)->count();
					$product_list[$key]['on_wishlist'] = 0;
					if($check_on_wishlist_or_not>0) {
						$product_list[$key]['on_wishlist'] = 1;
					}
				} else {
					$product_list[$key]['on_wishlist'] = 0;
				}
				$product_review_avg = ProductUserReview::where('product_id',$value->id)->avg('rating');                		   	          
				$product_review_avg = round($product_review_avg);
				$product_list[$key]['avg_product_review'] = $product_review_avg;
			}
			
			$product_list = array_map(function($v){
			        return (is_null($v)) ? "" : $v;
			    },$product_list);
			$response['Wishlist'] = $product_list;
			$code = SUCCESS;
			$msg = "Wishlist found successfully.";
		}
		return Response::json(array('code' => $code,'msg' => $msg,'data' => (object)$response));
	}
}