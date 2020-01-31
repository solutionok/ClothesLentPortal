<?php

namespace App\models\Messages;

use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Model;
use App\Http\Requests;

use App\Models\Helper;
use App\User;

use Auth;


class Messages extends Model
{
	protected $table = 'messages';

    public static function addData($room_id,$from_user_id,$to_user_id,$request){
        // Save copy for the receiver
        $data = new self;
        $data->room_id      = $room_id;
        $data->from_user_id = $from_user_id;
        $data->to_user_id   = $to_user_id;
        $data->content      = $request->content;
        $data->status       = 0;
        $data->save();
        // Save copy for the sender
        $data = new self;
        $data->room_id      = $room_id;
        $data->from_user_id = $from_user_id;
        $data->to_user_id   = $from_user_id;
        $data->content      = $request->content;
        $data->status       = 1;
        $data->save();
        return $data;
    }
    
        public static function getData($id='none',$room_id='none',$to_user_id='none'){
        // Check id if exist
        if($id != 'none'){
            // Get the messages data
            $self_data = self::find($id);
            // Check messages data if exist
            if(count($self_data)){
                // Get the time duration
                $data['time_duration'] = Helper::timeDuration($self_data->created_at);
            }
        }
        // Check room id and to user id if exist
        if($room_id != 'none' && $to_user_id != ''){
            // Get the messages data to get the user data
            $messages = self::where('room_id',$room_id)
                                ->distinct()
                                ->select('to_user_id')
                                ->get();
            // Check messages if exist
            if(count($messages)){
                // Check the first key if it doesn't match the id
                if($messages[0]->to_user_id != $to_user_id){
                    // Set user id
                    $user_id = $messages[0]->to_user_id;
                }
                else{
                    // Set user id
                    $user_id = $messages[1]->to_user_id;
                }
                // Get the user data
                $data['users_data'] = User::getData($user_id);
            }
            // Get the total messages
            $data['total_messages'] = Messages::where('room_id',$room_id)
                                        ->where('to_user_id',$to_user_id)
                                        ->count();
        }
        return (object) $data;
    }

    public static function getData2($id='none',$room_id='none',$to_user_id='none'){
        // Check id if exist
        if($id != 'none'){
            // Get the messages data
            $self_data = self::find($id);
            // Check messages data if exist
            if(count($self_data)){
                // Get the time duration
                $data['time_duration'] = Helper::timeDuration($self_data->created_at);
            }
        }
        // Check room id and to user id if exist
        if($room_id != 'none' && $to_user_id != ''){
            // Get the messages data to get the user data
            $messages = self::where('room_id',$room_id)
                                ->distinct()
                                ->select('to_user_id')
                                ->get();
            // Check messages if exist
            if(count($messages)){
                // Check the first key if it doesn't match the id
                if($messages[0]->to_user_id != $to_user_id){
                    // Set user id
                    $user_id = $messages[0]->to_user_id;
                }
                else{
                    // Set user id
                    $user_id = $messages[1]->to_user_id;
                }
                // Get the user data
                $data['users_data'] = User::getData2($user_id);
            }
            // Get the total messages
            $data['total_messages'] = Messages::where('room_id',$room_id)
                                        ->where('to_user_id',$to_user_id)
                                        ->count();
        }
        return (object) $data;
    }

    public static function makeAsRead($room_id,$user_id){
        // Get the messages
        $messages = self::where('room_id',$room_id)
                        ->where('to_user_id',$user_id)
                        ->where('status',0)
                        ->get();
        // Check if messages exist
        if(count($messages)){
            // Iterate messages
            foreach($messages as $value){
                // Change the status
                $message = self::find($value->id);
                $message->status = 1;
                $message->save();
            }
        }
    }

}
