<?php

namespace App\models\Rent;

use Illuminate\Database\Eloquent\Model;
use App\Http\Requests;

use App\Models\Products\Products;

use DB;
use Auth;

class RentTransactionDetail extends Model
{
	protected $table = 'rent_details_transaction_detail';
	public function rent_details() {
	    	return $this->hasOne('App\Models\Rent\Rent','id','rented_detail_id');
	}
	
	public function user_detail() {
	    	return $this->hasOne('App\User','id','user_id');
	}
}