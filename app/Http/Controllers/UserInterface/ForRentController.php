<?php

namespace App\Http\Controllers\UserInterface;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Input;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Models\Validators;
use App\Models\Rent\Rent;
use App\Models\Products\Products;
use App\Models\Products\ProductCategories;
use App\Models\Products\ProductPhotos;
use App\Models\ProductUserReview;
use App\Models\Wishlist\Wishlist;
use App\Models\Notification\Notification;
use App\Models\Dropzone;
use App\Models\Helper;
use App\Models\Categories;

use DB;
use Crypt;
use Auth;

class ForRentController extends Controller{

    function __construct()
    {
        parent::__construct(); // Extend the constructor from the main controller
        $this->data['categories'] = Categories::where('status',1)
                                            ->orderBy('name','asc')
                                            ->get();
    }

    function getIndex(Request $request)
    {
        $this->data['sort_index'] = 'created_at';
        $this->data['sort_value'] = 'desc';
        if ($request->has('sort'))
        {
            $this->sort($request);
        }
        $this->data['products'] = Products::with('user_detail')
            ->where('products.user_id',Auth::user()->id)
            ->where('products.is_deleted', 0)
            ->orderBy($this->data['sort_index'],$this->data['sort_value'])
            ->paginate(6);
        $this->data['total_products'] = Products::where('products.user_id',Auth::user()->id)
            ->where('products.is_deleted', 0)->count();

        return view('user-interface.dashboard.for-rent.index',$this->data);
    }

    function sort($request)
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
            case 'name-desc':
                $this->data['sort_index'] = 'name';
                $this->data['sort_value'] = 'desc';
                break;
            case 'designer-asc':
                $this->data['sort_index'] = 'designer';
                $this->data['sort_value'] = 'asc';
                break;
            case 'designer-desc':
                $this->data['sort_index'] = 'designer';
                $this->data['sort_value'] = 'desc';
                break;
            default:
                $this->data['sort_index'] = 'created_at';
                $this->data['sort_value'] = 'desc';
                break;
        }
    }

  function getAdd()
    {
    	$this->data['label'] = 'Post';
//    	if(Auth::user()->verify_paypal_email==0) {
//    		Helper::flashMessage('Failed!','Please Verify Paypal Email address in my account and the continue. otherwise you can`t post item','error');
//    	}
    	return view('user-interface.dashboard.for-rent.manage',$this->data);
    }
	
	function getAddpro(Request $request)
    {
        $user = 'omari123';
        $resulet = Rent::addpostData($user); 
   var_dump($resulet);
    }

    function getEdit($id)
    {
    	$sub_photos_array = array();
        $product_data = Products::where('id', $id)->first();
        if ($product_data && $product_data->user_id == Auth::user()->id)
        {
            $this->data['label'] = 'Edit';
            $this->data['product_data'] = Products::getData($product_data->id);
    	    Dropzone::deleteSessionData(Auth::user()->id);
            if (count($this->data['product_data']->sub_photo)) 
            {
            foreach ($this->data['product_data']->sub_photo as $value)
            {
            // Dropzone holds -> ip, label_name, file, and size
            $id= Dropzone::addDataCustom(Auth::user()->id,'items',$value->sub_photo,$value->size);
            $sub_photos_array[] = $id;
            }
            }
            $this->data['sub_photos'] = implode(",",$sub_photos_array);
    	    return view('user-interface.dashboard.for-rent.manage',$this->data);
        } else {
            Helper::flashMessage('Error!', 'Not found.', 'error');
            return redirect()->back();
        }
        return back();
    }

    function postSave(Request $request)
    {
    $validator = Validators::frontendValidate($request,"for_rent_save");
        // Check the validator if there's no error
        if ($validator === true) {         
            $product_data = Products::manageData($request,Auth::user()->id);
            
            //print_r($request->all());exit;
            ProductCategories::addData($product_data->id,$request);
            //ProductPhotos::addData($product_data->id,Auth::user()->id,0,$request);
            if($request->sub_photos!="") {
		ProductPhotos::addData($product_data->id,Auth::user()->id,0,$request);
		} else {
			Dropzone::where('ip',Auth::user()->id)->delete();
		}
            if ($request->has('id')) {
                Helper::flashMessage('Great!','The item has been updated.','success');
            } else {
                Helper::flashMessage('Great!','The item has been added.','success');
            }
            return response()->json(["result" => 'success']);
       } 
       return response()->json(["result" => 'failed', "errors" => $validator->errors()->messages()]);
        
    }

    function getDelete($id, Request $request)
    {        
        $product_data = Products::find($id);

        $extra = '';
        if ($request->has('extra')) {
            $extra = $request->input('extra');
        }

        if (!empty($product_data))
        {
            $product_rented = Rent::where('product_id',$id)->count();
            $product_review = ProductUserReview::where('product_id',$id)->count();
            $product_wishlist = Wishlist::where('product_id',$id)->count();
            $product_notification = Notification::where('rent_id',$id)->count();

            if($product_rented==0 && $product_review==0 && $product_wishlist==0 && $product_notification==0) {
	            Products::deleteData($id);
	            $product_category_data = ProductCategories::where('product_id', $id);
		        if (!empty($product_category_data))
		        {
		            ProductCategories::deleteData($id);
		        }

	        Helper::flashMessage('Success!','The item has been Deleted.','success');
            return response()->json(["result" => 'success']);

            } else {

                $product = Products::find($id);
                $product->is_deleted = (int) $extra;
                $product->save();

                Helper::flashMessage('Success!', 'The item has been removed.', 'success');
                return response()->json(["result" => 'success']);

//                Helper::flashMessage('Error!', 'User already used this product. You can`t delete this product.', 'error');
//                return response()->json(["result" => 'used']);
            }
        } else {
        	Helper::flashMessage('Error!','Product not found.','error');
            return response()->json(["result" => 'error']);
        }

        
        
        return back(); 
    }

    function getSingle($id) {

        $this->data['product'] = Products::where('id', $id)->first();

        $this->data['owner'] = User::where('id', $this->data['product']->user_id)->first();

        return view('user-interface.dashboard.for-rent.single', $this->data);
    }
    
    public function getBookingList($id,Request $request) {

        $product = Products::with('user_detail')->find($id);

        if($product->user_id == Auth::user()->id) {
            $booking_list = Rent::select('rent_details.*', 'merchant.paypal_email_address', 'products.picture', 'products.name')
                ->join('products', 'rent_details.product_id', '=', 'products.id')
                ->join('users as merchant', 'products.user_id', '=', 'merchant.id')
                ->where('product_id', $id)->where('rent_details.status', '!=', 'Cart')->with(['user_detail' => function ($query) {
                    $query->select('id', 'first_name', 'last_name', 'email', 'profile_picture', 'profile_picture_custom_size', 'location');
                }])->paginate(6);

            $this->data['booking_list'] = $booking_list;
            $this->data['product']      = $product;
            return view('user-interface.dashboard.for-rent.booking_list', $this->data);
        } else {
            Helper::flashMessage('Error!','Not found.','error');
            return redirect()->back();
        }
    }   

}