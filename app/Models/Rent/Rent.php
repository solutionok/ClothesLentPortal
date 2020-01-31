<?php

namespace App\models\Rent;

use Illuminate\Database\Eloquent\Model;
use App\Http\Requests;

use App\Models\Products\Products;

use DB;
use Auth;

class Rent extends Model
{
	protected $table = 'rent_details';

    public function product_detail() {
    	return $this->hasOne('App\Models\Products\Products','id','product_id');
    }
    public function user_detail() {
    	return $this->hasOne('App\User','id','user_id');
    }
    public static function addData($request)
    {       
    	
	if(!isset($request->street_number) || $request->street_number==null) {
		$request->street_number = "";
	}
	
//	if(!isset($request->route) || $request->route==null) {
//		$request->route= "";
//	}
	
	if(!isset($request->address2) || $request->address2==null) {
		$request->address2= "";
	}
	
	/*if(!isset($request->address3) || $request->address3==null) {
		$request->address3= "";
	}*/
	
	if(!isset($request->city) || $request->city==null) {
		$request->city= "";
	}
	
	if(!isset($request->state) || $request->state==null) {
		$request->state= "";
	}
	
	if(!isset($request->postal_code) || $request->postal_code==null) {
		$request->postal_code= "";
	}
	
	if(!isset($request->country) || $request->country==null) {
		$request->country= "";
	}
	
	if(!isset($request->contact_number) || $request->contact_number==null) {
		$request->contact_number= "";
	}
	
	if(!isset($request->email) || $request->email==null) {
		$request->email= "";
	}
	
	if(!isset($request->description) || $request->description==null) {
		$request->description= "";
	}    		
    	
        $data                       = self::findOrNew(0);
        $data->user_id              = Auth::user()->id;
        $data->product_id           = $request->productID;
        $data->delivery_option      = $request->delivery_option;
        $data->rental_start_date    = $request->start_date;
        $data->rental_end_date      = $request->end_date;
        $data->street_number        = $request->street_number;
//        $data->route                = $request->route;
        $data->address2             = $request->address2;
//        $data->address3             = $request->address3;
        $data->city                 = $request->city;
        $data->state                = $request->state;
        $data->postal_code          = $request->postal_code;
        $data->country              = $request->country;
        $data->contact_number       = $request->contact_number;
        $data->email                = $request->email;
        $data->description          = $request->description;
        $data->status               = $request->status;
        $data->total 	    = $request->total;

        $data->save();
        return $data;
    }

	public static function addpostData($name)
    {       
	    $user_id = Auth::user()->id;
       /* DB::table('products')->insert( 
		['user_id' => $user_id, 'name' => $name,'description' => 'myco','price' => 5,'color' => 'red','size' => 'xl','season' => 'winter','picture' => 'myco','seo_url' => 'myco']
		);*/
        $result = DB::table('products')->select('picture')->get();
		return $result;
    }

    public static function manageData($id, $status, $extra = false) {
        $data         = self::findOrNew($id);
        $data->status = $status;
        if ($extra) {
            $data->return_delivery_option = $extra;
        }

        $data->save();
        return $data;
    }    

    public static function deleteData($id)
    {
        $self_data = self::find($id);
        $self_data->delete(); 
    }
    
    public static function emptyData($id)
    {
        $self_data = self::where('user_id',$id)->delete();
        //$self_data->delete();
        //return $self_data;
    }
}
