<?php

namespace App\Http\Controllers\UserInterface;

use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Input;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Rent\RentTransactionDetail;
use Auth;
class TransactionController extends Controller{

    function getIndex(Request $request)
    {
    	if ($request->has('id')) {
    		return $this->single();
    	}
    	$this->data['transaction_list'] = RentTransactionDetail::where('user_id',Auth::user()->id)
            ->with(['rent_details'=>function($query){
			$query->with(['product_detail'=>function($query1){
				$query1->with('user_detail');
			}]);
		},'user_detail'=>function($query){
			$query->select('id','first_name','last_name','email',"profile_picture","profile_picture_custom_size");
		}])->orderBy('id','desc')->paginate(6);
		

//    	return $this->data;
        return view('user-interface.dashboard.transaction.index',$this->data);
    }

    function single()
    {
        return view('user-interface.dashboard.transaction.single',$this->data);
    }

}