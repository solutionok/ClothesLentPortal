<?php

namespace App\Http\Controllers\UserInterface;

use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Input;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Helper;

use App\Models\Notification\Notification;
use App\Models\Rent\Rent;
use App\Models\Products\Products;
use App\User;

use Auth;
use Crypt;

class NotificationController extends Controller{

    function getIndex(Request $request)
    {
    	$this->data['sort_index'] = 'notification.created_at';
        $this->data['sort_value'] = 'desc';
        if ($request->has('sort')) {
            $this->sort($request);
        }
    	$this->data['notifications'] = Notification::join('rent_details', 'rent_details.id', '=', 'notification.rent_id')
                                                    ->join('products', 'products.id', '=', 'rent_details.product_id')
                                                    ->where('notification.for_user', Auth::user()->id)
                                                    ->select( 
                                                            'notification.id as notificationID',
                                                            'rent_details.id as rentID',
                                                            'notification.from_user as from_user',
                                                            'notification.created_at as created_at',
                                                            'notification.status as status',
                                                            'notification.type as type',
                                                            'notification.title as title',
                                                            'notification.message as message',
                                                            'notification.rent_id as rent_id'
                                                            )
    												->orderBy($this->data['sort_index'],$this->data['sort_value'])
    												->paginate(6);


        foreach($this->data['notifications'] as $noti) {

            $not = Notification::find($noti->notificationID);
            $not->read = true;
            $not->save();


            $time = $noti->created_at->toTimeString();
            $time = DATE("H:i", STRTOTIME($time));
            $noti['dateTime'] = "$time";
        }

		$this->data['unopened'] = Notification::leftjoin('rent_details', 'rent_details.id', '=', 'notification.rent_id')
                                                ->leftjoin('products', 'products.id', '=', 'rent_details.product_id')
                                                ->where('products.user_id', Auth::user()->id)
                                                ->where('notification.status', 0)
                                                ->count();

//        return $this->data;

        return view('user-interface.dashboard.notification.index',$this->data);
    }

    function getCount() {

        $count = false;
        if(Auth::check()) {
            $count = Notification::where("read", "!=", 1)->where('for_user', Auth::user()->id)->count();
        }

        return response(array('count'=>$count));

    }

    function sort($request)
    {
        switch ($request->sort) {
            case 'date-recently':
                $this->data['sort_index'] = 'notification.created_at';
                $this->data['sort_value'] = 'desc';
                break;
            case 'date-beginning':
                $this->data['sort_index'] = 'notification.created_at';
                $this->data['sort_value'] = 'asc';
                break;
            default:
                $this->data['sort_index'] = 'notification.created_at';
                $this->data['sort_value'] = 'desc';
                break;
        }
    }

    function getInner(Request $request)
    {
        $this->data['rented'] = Rent::where('id', Crypt::decrypt($request->rentID))->first();

        $this->data['product'] = Products::where('id', $this->data['rented']->product_id)->first();

        $this->data['owner'] = User::where('id', $this->data['product']->user_id)->first();

        $this->data['client'] = User::where('id', $this->data['rented']->user_id)->first();

        $this->data['notification'] = Notification::where('id', Crypt::decrypt($request->notificationID))->first();

        Notification::manageData(Crypt::decrypt($request->notificationID));

        return view('user-interface.dashboard.notification.inner',$this->data);
    }

    function declineRequest(Request $request)
    {
        if($request->optReason == 1){
            $reason = "Negative Reviews";
        }else if($request->optReason == 2){
            $reason = "The owner changed mind";
        }else if($request->optReason == 3){
            $reason = "Item was not available";
        }else{
            $reason = $request->reason;
        }
             
        Rent::manageData($request->rentID, 'Declined');
        Notification::declined($request->notificationID); 
        $rent_data = Rent::where('id', $request->rentID)->first();
        Notification::addData($rent_data->user_id, Auth::user()->id, $request->rentID, 'Declined your rental request', $reason, 'decline');

        return redirect('notification/notification-inner?rentID='.Crypt::encrypt($request->rentID).'&notificationID='.Crypt::encrypt($request->notificationID));
    }

    function acceptRequest(Request $request)
    {        
        Rent::manageData($request->rentID, 'Accepted');
        Notification::accepted($request->notificationID); 
        $rent_data = Rent::where('id', $request->rentID)->first();
        Notification::addData($rent_data->user_id, Auth::user()->id, $request->rentID, 'Accepted your rental request', '', 'accept');

        Helper::flashMessage('Great!','You accepted a rental request.','success');

        return redirect('notification/notification-inner?rentID='.Crypt::encrypt($request->rentID).'&notificationID='.Crypt::encrypt($request->notificationID));
    }    

}