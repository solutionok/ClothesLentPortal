<?php

namespace App\Http\Controllers\UserInterface\SocialMedia;

use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Input;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\User;

use Socialite;
use Auth,Session;

class TwitterController extends Controller{

    function getCallback(Request $request)
    {
    	try {
    		//echo "here";exit;
	       if(isset($_GET['denied']) && $_GET['denied']!=""){
	       	Session::flash('error_msg','Access Denied. Please login with twitter again.');
	        Session::flash('login_error',true);
	        return redirect()->to("/");
	       }
	        $socialiteUser = Socialite::driver('twitter')->user(); // Get twitter data
	        //echo "<pre>";
	       	//print_r($socialiteUser);exit;
	        if($socialiteUser->email!="") {
	        	$check_user = User::where('email',$socialiteUser->email)->first();
	        	if($check_user){
		        	if($check_user->facebook_id==NULL && $check_user->twitter_id==NULL) {
		        		Session::flash('error_msg','Email already register. please login with email and password.');
	        			Session::flash('login_error',true);
	        			return redirect()->to("/");
		        	} else if($check_user->facebook_id!="") {
		        		Session::flash('error_msg','Email already register with facebook. please login with facebook.');
	        			Session::flash('login_error',true);
	        			return redirect()->to("/");
		        	}
	        	}
	        } 
	        
	        
	        $user          = User::where('twitter_id',$socialiteUser->getId())->first();
	        if (!$user) {
	            $user = User::socialMediaData($socialiteUser,'twitter');
	        }
	        Auth::loginUsingId($user->id);
	        Session::flash('login_type','TWITTER');
	        return redirect("profile");
	 } catch(\Exception $e) {
    		//echo "error occur";
    		return redirect("twitter");
    	}
    }

    function getIndex()
    {
        return Socialite::driver('twitter')->redirect();
    }

}