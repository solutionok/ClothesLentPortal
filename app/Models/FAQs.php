<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;
use App\Http\Requests;
use Crypt;
use Auth;

class FAQs extends Model
{
	protected $table = 'faqs';
	
	public static function manageData($request)
    {
        $id           = $request->has('id') ? Crypt::decrypt($request->id) : 0;
        $data         = self::findOrNew($id);
        $data->section = $request->section;
        $data->category = $request->category;
        $data->question = $request->question;
        $data->answer = $request->answer;
        $data->save();
    }
}