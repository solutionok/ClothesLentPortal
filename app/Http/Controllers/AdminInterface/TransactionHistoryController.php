<?php

namespace App\Http\Controllers\AdminInterface;

use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Input;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Models\Validators;
use App\Models\Helper;
use App\Models\Categories;
use App\Models\Rent\Rent;
use App\Models\Products\ProductCategories;
use App\Models\Rent\RentTransactionDetail;
use App\Models\Products\Products;

use Crypt;

class TransactionHistoryController  extends Controller{

    function __construct()
    {
        $this->data['categories'] = Categories::where('status',1)
                                            ->orderBy('name','asc')
                                            ->get();    
        // Extend the constructor from the main controller
        parent::__construct();
    }

    function getIndex()
    {        
    	$this->data['products'] = Rent::leftjoin('products', 'rent_details.product_id', '=', 'products.id')
                                            ->leftjoin('product_categories','products.id','=','product_categories.product_id')
                                            ->leftjoin('categories','product_categories.category_id','=','categories.id')
                                            ->leftjoin('users','products.user_id','=','users.id')
                                            ->get();         
                                            
        $this->data['products']  = RentTransactionDetail::with(['rent_details'=>function($query){
			$query->with(['product_detail'=>function($query1){
				$query1->with('user_detail');
			}]);
		},'user_detail'=>function($query){
			$query->select('id','first_name','last_name','email',"profile_picture","profile_picture_custom_size");
		}])->orderBy('id','desc')->get();
		//echo "<pre>";
		//print_r($this->data['products']);  exit;                             
        //$this->data['products'] = Products::orderBy('created_at','desc')->get();
        
        //echo "<pre>";
//        return $this->data['products'];
    	return view('admin-interface.transaction-history.index',$this->data);
    }

   
}