<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Notifications\RegistrationVerificationCodeSend;
use App\User;
use App\Models\Categories;
use App\Models\Products\Products;
use App\Models\Products\ProductCategories;
use App\Models\Products\ProductPhotos;
use App\Models\DeviceToken;
use App\Models\Wishlist\Wishlist;
use App\Models\ProductUserReview;
use App\Models\Rent\Rent;
use App\Models\Messages\Messages;
use App\Models\Messages\MessagesRoom;
use App\Models\Notification\Notification;
use App\Models\Validators;
use App\Models\Helper;
use App\Models\Dropzone;
use Auth,Hash,Input,Session,Redirect,Mail,URL,File,Str,Config,DB,Response,View,Validator,Twilio;
use Crypt;

class PostItemController extends ApiBaseController
{
	public function postPostItem(Request $request) {
		//echo "request:".$request->id;
		$code = UNSUCCESS;
		
		$msg = "some problem occur please try again.";
		$user = auth()->guard('api')->user();
		$response = array();
		if($user->paypal_email_address=="" || $user->verify_paypal_email==0) {
			$msg = "Paypal Account not verify. please go to profile and update your paypal account.";
			return Response::json(array('code' => $code,'msg' => $msg,'data' => (object)$response));
		}
		    $validator = Validators::frontendValidate($request,"for_rent_save_api");
        // Check the validator if there's no error
        if ($validator === true) {         
            $product_data = Products::manageData64($request,$user->id);
            
            //print_r($request->all());exit;
            ProductCategories::addData($product_data->id,$request);
            //ProductPhotos::addData($product_data->id,Auth::user()->id,0,$request);
            if($request->sub_photos!="") {
		ProductPhotos::addData($product_data->id,$user->id,0,$request);
		} else {
			Dropzone::where('ip',$user->id)->delete();
		}
                $code = SUCCESS;
		$msg = "Post item added successfully.";       
           return Response::json(array('code' => $code,'msg' => $msg,'data' => (object)$response));
       }  
	else 
          return Response::json(array('code' => $code,'msg' =>  $validator->errors()->messages(),'data' => null));
                    
		
	}
	
	public function postEditPostItem(Request $request) {
		
		$code = UNSUCCESS;
		$msg = "some problem occur please try again.";
		$user = auth()->guard('api')->user();
		$response = array();
		if($user->paypal_email_address=="" || $user->verify_paypal_email==0) {
			$msg = "Paypal Account not verify. please go to profile and update your paypal account.";
			return Response::json(array('code' => $code,'msg' => $msg,'data' => (object)$response));
		}
		//$response = $request->all();
		//return Response::json(array('code' => $code,'msg' => $msg,'data' => (object)$response));
		
		
		/*$category_array = explode(",",$request->categories);
		$new_category_array = array();
		foreach($category_array as $value) {
			$new_category_array[] = Crypt::encrypt($value);
		} */
		
		//$request->categories = $new_category_array;
		//print_r($request->all());exit;
		$product = Products::manageData($request,$user->id);
		
		ProductCategories::addData($product->id,$request);
		
		//$response = $request->all();
		//return Response::json(array('code' => $code,'msg' => $msg,'data' => (object)$response));
		if($request->sub_photos!="") {
		ProductPhotos::addData($product->id,$user->id,0,$request);
		} else {
			Dropzone::where('ip',$user->id)->delete();
		}
		
		
		$code = SUCCESS;
		$msg = "Post item edited successfully.";
		//print_r($product);
		return Response::json(array('code' => $code,'msg' => $msg,'data' => (object)$response));
	}
	
	public function postPostItemUploadSubPhotos(Request $request) {
		$code = SUCCESS;
		$msg = "photos uploaded successfully.";
		$user = auth()->guard('api')->user();
		$response = array();
		$request->label = "items";
		$request->ip = $user->id;
		if(! $request->has('file'))
                    return Response::json(array('code' => $code,'msg' => 'missing file','data' => null));
		$data = Dropzone::addData64($request);
		$response['sub_photo_detail'] = $data;
		return Response::json(array('code' => $code,'msg' => $msg,'data' => (object)$response));
	}
	
	public function postPostItemRemoveSubPhotos(Request $request) {
		$code = UNSUCCESS;
		$msg = "Sub photo not found.";
		$user = auth()->guard('api')->user();
		$response = array();
		$sub_photos_detail = Dropzone::where('id',$request->id)->first();
		
		if(count($sub_photos_detail)>0) {
			Dropzone::where('id',$request->id)->delete();
			$code = SUCCESS;
			$msg = "Sub photo removed successfully.";
		}
		return Response::json(array('code' => $code,'msg' => $msg,'data' => (object)$response));
	}
	
	public function getEditPostItemDetail(Request $request) {
		$code = UNSUCCESS;
		$msg = "product not found";
		$user = auth()->guard('api')->user();
		$response = array();
		$product_data = Products::where('id', $request->product_id)->first();
		
		if (count($product_data))
	        {
	            $this->data['label'] = 'Edit';
	            $this->data['product_data'] = Products::getData($product_data->id);
	            
	            //print_r($this->data['product_data']);exit;
	    	    //Dropzone::deleteSessionData(Auth::user()->id);
	    	    $sub_photos = array();
	            if (count($this->data['product_data']->sub_photo)) 
	            {
		            foreach ($this->data['product_data']->sub_photo as $value)
		            {
		            // Dropzone holds -> ip, label_name, file, and size
		            $id= Dropzone::addDataCustom($user->id,'items',$value->sub_photo,$value->size);
		            //echo $id;
		            $sub_photos[] =  $id;
		            }
	            }
	            $product_detail = array();
	            //echo $this->data['product_data']->self_data->id;
	            //$this->data['product_data']->self_data->id = Crypt::encrypt($this->data['product_data']->self_data->id);
	            //;exit;
	            
	             $size = array();
			$size[0]['display'] = "Extra Small";
			$size[1]['display'] = "Small";
			
			$size[2]['display'] = "Medium";
			$size[3]['display'] = "Large";
			$size[4]['display'] = "Extra Large";
			
			$size[0]['value'] = "0";
			$size[1]['value'] = "1";
			$size[2]['value'] = "2";
			$size[3]['value'] = "3";
			$size[4]['value'] = "4";
		    $display_size = "Extra Small";
		    //print_r($product_detail);
		    foreach($size as $key=>$value) {
		    	if($this->data['product_data']->self_data->size==$value['display']) {
		    		$display_size = $value['display'];
		    	}
		    }
		    
		    $this->data['product_data']->self_data->display_size= $display_size;
		    $sub_photo = Dropzone::whereIn('id',$sub_photos)->get();	
		    //print_r($sub_photo);
		    $sub_photos = implode(',',$sub_photos);
		    $this->data['product_data']->self_data->sub_photos_id = $sub_photos;
		    
		    $this->data['product_data']->self_data->sub_photos = $sub_photo;
		    	
		    
	            $product_detail['product_detail'] = $this->data['product_data']->self_data;
	            //print_r($this->data['product_data']->categories);
	           // $product_detail['product_detail']['sub_photos'] = $this->data['product_data']->sub_photo;
	            $product_detail['product_detail']['categories'] = $this->data['product_data']->categories[0];
	            
	           
	    	    $response = $product_detail;
	    	    $code = SUCCESS;
			$msg = "product found successfully.";
	        } 
        
		return Response::json(array('code' => $code,'msg' => $msg,'data' => (object)$response));
	}
	
	public function getPostItemList(Request $request) {
		$code = UNSUCCESS;
		$msg = "product not found";
		$user = auth()->guard('api')->user();
		$response = array();
		$total = 10;
		$skip = ($request->page-1) * $total;
		$this->data['sort_index'] = 'created_at';
	        $this->data['sort_value'] = 'desc';
	        if ($request->has('sort'))
	        {
	            $this->sort($request);
	        }
                $totalProducts = Products::where('user_id',$user->id)->get();
	        $product = Products::where('user_id',$user->id)->orderBy($this->data['sort_index'],$this->data['sort_value'])->skip($skip)->take($total)->get(array('id','name','price','picture','designer'))->toArray();
	        
	        
	        if(count($product )>0) {
	        	$product = array_map(function($v){
			        return (is_null($v)) ? "" : $v;
			    },$product);
			$code = SUCCESS;
			$msg = "Post item found successfully.";
			
			foreach($product as $key=>$value) {
				$product_review_avg = ProductUserReview::where('product_id',$value['id'])->avg('rating');                		   	          
				$product_review_avg = round($product_review_avg);
				$product[$key]['avg_product_review'] = $product_review_avg;
			}
			$response['post_item_list'] = $product;
                        $response['page']=intval($request->page);
                        $response['total_pages']=ceil (count($totalProducts)/$total);
	        }
	        return Response::json(array('code' => $code,'msg' => $msg,'data' => (object)$response));
	                                            
	}
	public function sort($request)
	{
	        switch ($request->sort)
	        {
	            case 'date-recently':
	                $this->data['sort_index'] = 'created_at';
	                $this->data['sort_value'] = 'desc';
	                break;
	            case 'date-beginning':
	                $this->data['sort_index'] = 'created_at';
	                $this->data['sort_value'] = 'asc';
	                break;
	            case 'price-high':
	                $this->data['sort_index'] = 'price';
	                $this->data['sort_value'] = 'desc';
	                break;
	            case 'price-low':
	                $this->data['sort_index'] = 'price';
	                $this->data['sort_value'] = 'asc';
	                break;
	            case 'name-asc':
	                $this->data['sort_index'] = 'name';
	                $this->data['sort_value'] = 'asc';
	                break;
                    case 'designer-asc':
                        $this->data['sort_index'] = 'designer';
                        $this->data['sort_value'] = 'asc';
                        break;
                    case 'designer-desc':
                        $this->data['sort_index'] = 'designer';
                        $this->data['sort_value'] = 'desc';
                        break;
	            case 'name-desc':
	                $this->data['sort_index'] = 'name';
	                $this->data['sort_value'] = 'desc';
	                break;
	            default:
	                $this->data['sort_index'] = 'created_at';
	                $this->data['sort_value'] = 'desc';
	                break;
	        }
	}
	
	public function postPostItemRemove(Request $request) {
		$code = UNSUCCESS;
		$msg = "product not found";
		$user = auth()->guard('api')->user();
		$response = array();
		$id = $request->id;
		$product_data = Products::find($id);
		if(!empty($product_data)) {
			    $product_rented = Rent::where('product_id',$id)->count();
		            $product_review = ProductUserReview::where('product_id',$id)->count();
		            $product_wishlist = Wishlist::where('product_id',$id)->count();
		            $product_notification = Notification::where('rent_id',$id)->count();
            
            		    if($product_rented==0 && $product_review==0 && $product_wishlist==0 && $product_notification==0) {
            		    	Products::deleteData($id);
		                $product_category_data = ProductCategories::where('product_id', $id)->count();
			        if($product_category_data>0) 
			        {
			            ProductCategories::deleteData($id);
			        }
			        $code = SUCCESS;
			        $msg = "Product removed successfully.";
            		    } else {
            		    	$msg = "User already used this product. You can`t delete this product.";
            		    }
		}
		return Response::json(array('code' => $code,'msg' => $msg,'data' => (object)$response));
	}
}