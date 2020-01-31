<?php

namespace App\Http\Controllers\UserInterface;

use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Input;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Pagination\LengthAwarePaginator;

use App\Models\Helper;
use App\Models\Validators;
use App\Models\Messages\Messages;
use App\Models\Messages\MessagesRoom;
use App\User;

use Auth;
use DB;
use Crypt;
use View;

class MessagesController extends Controller{


    function getIndex(Request $request){   

        $this->data['sort_index'] = 'created_at';
        $this->data['sort_value'] = 'desc';
        if ($request->has('sort')) {
            $this->sort($request);
        }
        if($request->has('keyword')){
            $this->search($request);
        }
        else{
            $messages = [];
            $extracted_messages = [];
            $rooms = Messages::where('to_user_id',Auth::user()->id)
                                ->distinct()
                                ->select('room_id')
                                ->get();

            if($rooms){
                foreach($rooms as $value){
                    $messages[] = Messages::where('room_id',$value->room_id)
                                            ->where('to_user_id',Auth::user()->id)
                                            ->orderBy($this->data['sort_index'], $this->data['sort_value'])
                                            ->take(1)
                                            ->get();
                }

                if($messages){
                    foreach($messages as $value){
                        $extracted_messages[] = $value[0];
                    }
                }
            }
            $this->data['messages'] = collect([$extracted_messages])->collapse()->sortByDesc('created_at');
        }

        $unread_messages = Messages::where('to_user_id',Auth::user()->id)
                                    ->distinct()
                                    ->select('room_id')
                                    ->where('status',0)
                                    ->get();

        $this->data['total_messages'] = count($unread_messages);  

        $this->data['contacts'] = User::where('id', '!=', !Auth::user()->isAdmin())
                                        ->where('id', '!=', Auth::user()->id)
                                        ->get();                                      
        //print_r($this->data['messages']->toArray());exit;             
        $this->customPagination();
        return view('user-interface.dashboard.messages.index',$this->data);
    }

    function search($request){
        // Set the messages to none
        $messages = [];
        // Set results as array
        $results = [];
        // Set keyword
        $keyword = $request->keyword;
        // Set search list
        $search_list =  [
                            'users.first_name',
                            'users.last_name'
                        ];
        // Iterate search list
        foreach($search_list as $value){
            // Get the rooms
            $rooms = Messages::where('to_user_id',Auth::user()->id)
                                ->distinct()
                                ->select('room_id')
                                ->get();
            // Check if rooms exist
            //echo $value.":".$keyword;exit;
            if($rooms){
                // Iterate rooms
                foreach($rooms as $r){
                    // Get the message data
                    $message_data = DB::table('users')
                                        ->join('messages','users.id','=','messages.from_user_id')
                                        ->where($value,'LIKE','%'.$keyword.'%')
                                        ->where('messages.room_id',$r->room_id)
                                        ->orwhere('messages.content','LIKE','%'.$keyword.'%')
                                        ->where('messages.to_user_id',Auth::user()->id)
                                        ->orderBy('messages.'.$this->data['sort_index'], $this->data['sort_value'])
                                        ->take(1)
                                        ->get();
                    // Check message data if exist
                    if($message_data){
                        // Insert data
                        $messages[] = $message_data[0];
                    }
                }
            }
            // Get the search data
            $search_data = collect([$messages])->collapse()->sortByDesc('created_at');
            // Iterate search data
            foreach($search_data as $search_value){
                // Set checker
                $checker = 0;
                // Check if result is not empty
                if($results){
                    // Iterate results
                    foreach($results as $v){
                        // Check if id does not match
                        if($search_value->id == $v->id){
                            // Increment
                            $checker++;
                        }
                    }
                    if($checker == 0){
                        // Insert search value
                        $results[] = $search_value;
                    }
                }
                else{
                    // Insert search value
                    $results[] = $search_value;
                }
            }
        }
        // Get jobs
        $this->data['messages'] = $results;
    }

    function sort($request)
    {
        switch ($request->sort) {
            case 'date-recently':
                $this->data['sort_index'] = 'created_at';
                $this->data['sort_value'] = 'desc';
                break;
            case 'date-beginning':
                $this->data['sort_index'] = 'created_at';
                $this->data['sort_value'] = 'asc';
                break;
            default:
                $this->data['sort_index'] = 'created_at';
                $this->data['sort_value'] = 'desc';
                break;
        }
    }

    function customPagination(){
        // Get current page
        $currentPage = LengthAwarePaginator::resolveCurrentPage();
        // Check if page is null
        if(is_null($currentPage)){
            $currentPage = 1;
        }
        // Set new collection
        $collection             = new Collection($this->data['messages']);
        $perPage                = 5;
        $currentPageImgResults  = $collection->slice(($currentPage - 1) * $perPage, $perPage)->all();
        $this->data['messages'] = new LengthAwarePaginator($currentPageImgResults, count($collection), $perPage, $currentPage);
    }

    function getMessageInner(Request $request){

        $room_data = MessagesRoom::where('id', Crypt::decrypt($request->room))->first();
        // Check the room data if exist
      
        if($room_data){
            // Make all the messages as read
            Messages::makeAsRead($room_data->id,Auth::user()->id);
            // Get all the messages
            $messages = Messages::where('room_id',$room_data->id)
                                ->where('to_user_id',Auth::user()->id)
                                ->orderBy('created_at','desc')
                                ->take(3)
                                ->get();
            // Reverse the oder by
            $this->data['messages'] = collect([$messages])->collapse()->sortBy('created_at');
            // Check messages if exist
            if(count($this->data['messages'])){
                // Get the last message data
                $this->data['last_message_data'] = $this->data['messages'][count($this->data['messages'])-1];
            }
            // Get the messages data
            $this->data['messages_data'] = Messages::getData('none',$room_data->id,Auth::user()->id);
            $unread_messages = Messages::where('to_user_id',Auth::user()->id)
                            ->distinct()
                            ->select('room_id')
                            ->where('status',0)
                            ->get();
            // Count the total unread messages
            $this->data['total_messages'] = count($unread_messages);

            return view('user-interface.dashboard.messages.message-inner',$this->data);
        }
        return back();

    }

    function getMessagesLoadMore(Request $request){
        // Get the messagesdd(
        $messages = Messages::where('room_id',Crypt::decrypt($request->room_id))
                            ->where('to_user_id',Auth::user()->id)
                            ->where('created_at','<',Crypt::decrypt($request->date))
                            ->orderBy('created_at','desc')
                            ->take(2)
                            ->get();
        // Reverse the oder by
        $this->data['messages'] = collect([$messages])->collapse()->sortBy('created_at');
        // Get the total messages
        $total_messages = Messages::where('room_id',Crypt::decrypt($request->room_id))
                                    ->where('to_user_id',Auth::user()->id)
                                    ->where('created_at','<',Crypt::decrypt($request->date))
                                    ->count();
        // Check the messages if it doens't exist
        if(!count($this->data['messages'])){
            return response()->json(["result" => 'failed']);
        }
        // Set the total messages
        $new_total_messages = $total_messages - count($this->data['messages']);
        // Get the messages data
        $this->data['messages_data'] = Messages::getData('none',Crypt::decrypt($request->room_id),Auth::user()->id);
        // Get the content
        $content = View::make('user-interface.dashboard.messages.includes.append.messages-load-more',$this->data)->render();
        // Set empty
        $empty = 'false';
        // Check the total if it's 0
        if($new_total_messages == 0){
            // Set empty
            $empty = 'true';
        }
        return response()->json([
                                    "result"  => 'success',
                                    'content' => $content,
                                    'date'    => Crypt::encrypt($this->data['messages'][count($this->data['messages'])-1]->created_at),
                                    'empty'   => $empty
                                ]);
    } 

   function getSendMessage(Request $request){
        // Validation data
        $validator = Validators::frontendValidate($request,"messages_create");

        // Check if there is no error
        if($validator === true){
            // Get the messages from data

            $messages_from_data = Messages::where('from_user_id', Auth::user()->id)
                                            ->where('to_user_id', $request->to)
                                            ->first();                                        
            // Set room value
            $room = 'false';
            // Check messages from data if exist
            if($messages_from_data){
                // Set room id
                $room_id = $messages_from_data->room_id;
                // Set room value
                $room = 'true';
            }
            else{

                // -------- REVERSE -------- //
                // Get the messages to data
                $messages_to_data = Messages::where('from_user_id', $request->to)
                                                ->where('to_user_id',Auth::user()->id)
                                                ->first();
                // Check messages to data if exist
                if($messages_to_data){
                    // Set room id
                    $room_id = $messages_to_data->room_id;
                    // Set room value
                    $room = 'true';
                }
            }
            // Check the room value
            if($room == 'false'){
                // Create a new chat room and generate the room id
                $room_id = MessagesRoom::addData(Auth::user()->id);
            }
            // Create a new message
            $this->data['message_data'] = Messages::addData($room_id,Auth::user()->id, $request->to,$request);
            // Get the messages data
            $this->data['messages_data'] = Messages::getData($this->data['message_data']->id);
            // Get the content

            $content = View::make('user-interface.dashboard.messages.includes.append.messages-reply-content',$this->data)->render();
            
            if ($request->has('not_js')) { 
                Helper::flashMessage('Great!','Your message is sent.','success');
                return back();  
            } else { return response()->json([ "result"  => 'success', "content" => $content ]); }
        }

        if ($request->has('not_js')) { 
            Helper::flashMessage('Failed','Check your inputs.','error');
            return back(); 
        } else { return response()->json([ "result" => 'failed', "errors" => $errors ]); }
    }

}