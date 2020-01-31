<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use App\Models\Helper;

use Crypt;

class Cleaner extends Model{

    protected $table = 'cleaner';

    public static function manageData($request)
    {
        $id           = $request->has('id') ? Crypt::decrypt($request->id) : 0;
        $data         = self::findOrNew($id);
        $data->name   = $request->name;
        $data->shop_name = $request->shop_name;
        $data->location = $request->location;
        $data->latitude = $request->latitude;
        $data->longitude = $request->longitude;
        if($request->has('mobile_number'))
        $data->mobile_number = $request->mobile_number;
        else
        $data->mobile_number = '';   
        
        $data->save();
    }

}