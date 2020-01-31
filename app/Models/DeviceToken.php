<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class DeviceToken extends Model{

    protected $table = 'user_device_token';
    
    public static function addData($request)
    {
    	if($request->DeviceType!="" && $request->DeviceToken!="") {
	        $check_already_exits =self::where('device_type',$request->DeviceType)->where('device_token',$request->DeviceToken)->first();
	        if(count($check_already_exits)==0) {
	        	$add_new_device_token = new self;
	        	$add_new_device_token->user_id = $request->user_id;
	        	$add_new_device_token->device_type = $request->DeviceType;
	        	$add_new_device_token->device_token = $request->DeviceToken;
	        	$add_new_device_token->created_at = date('Y-m-d H:i:s');
	        	$add_new_device_token->updated_at= date('Y-m-d H:i:s');
	        	$add_new_device_token->save();
	        }
	}
        return true;
    }
    
    public static function RemoveData($request)
    {
    	
	        $check_already_exits =self::where('user_id',$request->user_id)->get();
	        if(count($check_already_exits)>0) {
	        	$check_already_exits = self::where('user_id',$request->user_id)->delete();
	        }
	
        return true;
    }
}