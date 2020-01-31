<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use App\Models\Helper;

use Crypt,Auth;

class ProductUserReview extends Model{

    protected $table = 'product_user_review';

    public static function manageData($request)
    {
        $id           = $request->has('id') ? Crypt::decrypt($request->id) : 0;
        $data         = self::findOrNew($id);
        $data->user_id	= Auth::user()->id;
        $data->product_id= $request->product_id;
        $data->rating = $request->rating;
        $data->title = $request->title;
        $data->comment = $request->comment;
        $data->save();
    }
    
    public static function manageDataUsingAPI($request)
    {
        $id           = $request->has('id') ? Crypt::decrypt($request->id) : 0;
        $data         = self::findOrNew($id);
        $data->user_id	= $request->user_id;
        $data->product_id= $request->product_id;
        $data->rating = $request->rating;
        $data->title = $request->title;
        $data->comment = $request->comment;
        $data->save();
    }
    
    public function user_detail() {
    	return $this->hasOne('\App\User','id','user_id');
    }

}