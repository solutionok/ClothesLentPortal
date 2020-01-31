<?php

namespace App\models\Messages;

use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Model;
use App\Http\Requests;

use Auth;

class MessagesRoom extends Model
{
	protected $table = 'messages_room';

	public static function addData($id)
    {   
        $data             = new self;
        $data->md5_id 	  = '';
        $data->creator_id = Auth::user()->id;
        $data->save();
        // Save the md5 id
        $data         	  = self::find($data->id);
        $data->md5_id 	  = md5($data->id);
        $data->save();
        return $data->id;
    }

}
