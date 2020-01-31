<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class NewsLatter extends Model{

    protected $table = 'news_latter';
    
    public static function addData($request)
    {
        $check_email_alredy_exists = Self::where('email',$request->email)->first();
        if(count($check_email_alredy_exists)>0) {
        	$check_email_alredy_exists->name = $request->name;
        	$check_email_alredy_exists->email = $request->email;
        	$check_email_alredy_exists->save();
        } else {
        	$add_new = new Self;
        	$add_new->name = $request->name;
        	$add_new->email = $request->email;
        	$add_new->save();
        }
        return true;
    }
}