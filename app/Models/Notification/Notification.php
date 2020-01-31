<?php

namespace App\models\Notification;

use Illuminate\Database\Eloquent\Model;
use App\Http\Requests;

use Auth;

class Notification extends Model
{
	protected $table = 'notification';

	public static function addData($for_user, $from_user, $rent_id, $title, $message, $type)
    {
    	$data                             = self::findOrNew(0);
        $data->for_user                   = $for_user;
        $data->from_user                  = $from_user;
        $data->rent_id                    = $rent_id;
        $data->title                      = $title;
        $data->message                    = $message;
        $data->type                       = $type;
        $data->response                   = '';
        $data->status                     = 0;
        $data->read                     = 0;

        $data->save();
        return $data;
    }

    public static function manageData($id)
    {
        $data                 = self::find($id);
        $data->status         = 1;

        $data->save();
        return $data;
    }

    public static function declined($id)
    {
        $data                             = self::find($id);
        $data->response                   = 'declined';

        $data->save();
        return $data;
    }  

    public static function accepted($id)
    {
        $data                             = self::find($id);
        $data->response                   = 'accepted';

        $data->save();
        return $data;
    }
    
    public function from_user_detail() {
    	return $this->hasOne('App\User','id','from_user');
    }

    public function sendEmail($title, $message, $email, $link, $name=false, $user, $productID, $rentID) {

        $data['title']   = $title;
        $data['message'] = $message;
        $data['link'] = $link;
        $data['name'] = $name;
        $data['picture'] = "";
        $data['user_type'] = $user;
        $data['product_id'] = $productID;
        $data['rented_id'] = $rentID;

        Mail::send('emails.notify', compact('data'), function ($m) use ($title, $email) {
            $m->to($email)->subject('Rent A Suit - ' . $title);
            $m->from('info@rentsuit.com');
        });
    }

}
