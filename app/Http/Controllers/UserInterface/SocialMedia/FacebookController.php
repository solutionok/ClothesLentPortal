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

class FacebookController extends Controller{

    function getCallback(Request $request)
    {
    	try {
    		if(isset($_GET['error']) && $_GET['error']!="" && $_GET['error_code']==200){
	       	Session::flash('error_msg','Access Denied. Please login with facebook again.');
	        Session::flash('login_error',true);
	        return redirect()->to("/");
	       	}
	        // Set the facebook fields to retrieve
	        $user = Socialite::driver('facebook')->fields([
	                                                    'friends',
	                                                    'name', 
	                                                    'first_name', 
	                                                    'last_name', 
	                                                    'email', 
	                                                    'gender', 
	                                                    'verified'
	                                                ]);
	        $socialiteUser = $user->user(); // Get facebook data
	        /*echo "<pre>";
	        print_r($socialiteUser);
	        exit;*/
	        if($socialiteUser->email!="") {
	        	$check_user = User::where('email',$socialiteUser->email)->first();
	        	if($check_user){
		        	if($check_user->facebook_id==NULL && $check_user->twitter_id==NULL) {
		        		Session::flash('error_msg','Email already register. please login with email and password.');
	        			Session::flash('login_error',true);
	        			return redirect()->to("/");
		        	} else if($check_user->twitter_id!="") {
		        		Session::flash('error_msg','Email already register with twitter. please login with twitter.');
	        			Session::flash('login_error',true);
	        			return redirect()->to("/");
		        	}
	        	}
	        } 
	        
	        
	        $user = User::where('facebook_id',$socialiteUser->getId())->first();
	        
	        
	        if (!$user) {
	            $user = User::socialMediaData($socialiteUser,'facebook');
	        }
	        Auth::loginUsingId($user->id);
	        Session::flash('login_type','FACEBOOK');
	        return redirect("profile");
    	} catch(\Exception $e) {
    		//echo "error occur";
    		return redirect("facebook");
    	}
    	
    }

    function getIndex()
    {
        return Socialite::driver('facebook')->redirect();
    }

}