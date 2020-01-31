<?php

namespace App\Http\Controllers\UserInterface;

use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Input;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Notifications\EmailVerification;

use App\User;
use App\Models\Helper;
use App\Models\Validators;

use DB;
use Auth;
use Crypt;

class ProfileController extends Controller {

	function getIndex() {
		Helper::destroySession();
		$user = Auth::user();

		//echo Crypt::decrypt($user->crypted_password);exit;
		$this->data['countries'] = DB::table( "countries" )
		                             ->orderBy( 'Name', 'asc' )
		                             ->get();

		return view( 'user-interface.dashboard.profile.index', $this->data );
	}

	function getPersonalInfo( $id ) {
		$this->data['user'] = User::where( 'id', Crypt::decrypt( $id ) )->first();

		return view( 'user-interface.dashboard.profile.personal-info', $this->data );
	}

	function postSave( Request $request ) {
		// Send all the request to validate
		$validator = Validators::frontendValidate( $request, "profile_save" );
		// Check the validator if there's no error
		if ( $validator === true ) {
			if ( $request->has( 'paypal_email_address' ) ) {
				$ch           = curl_init();
				$ppUserID     = USER_ID; //Take it from   sandbox dashboard for test mode or take it from paypal.com account in production mode, help: https://developer.paypal.com/docs/classic/api/apiCredentials/
				$ppPass       = USER_PASS; //Take it from sandbox dashboard for test mode or take it from paypal.com account in production mode, help: https://developer.paypal.com/docs/classic/api/apiCredentials/
				$ppSign       = USER_SIGN; //Take it from sandbox dashboard for test mode or take it from paypal.com account in production mode, help: https://developer.paypal.com/docs/classic/api/apiCredentials/
				$ppAppID      = APP_ID; //if it is sandbox then app id is always: APP-80W284485P519543T
				$sandboxEmail = SANDBOX_EMAIL; //comment this line if you want to use it in production mode.It is just for sandbox mode
				//$emailAddress = "sunil@rudrainnovatives.com"; //The email address you wana verify
				$emailAddress = $request->paypal_email_address; //The email address you wana verify
				//parameters of requests
				$nvpStr = 'emailAddress=' . $emailAddress . '&matchCriteria=NONE';

				// RequestEnvelope fields
				$detailLevel   = urlencode( "ReturnAll" );
				$errorLanguage = urlencode( "en_US" );
				$nvpreq        = "requestEnvelope.errorLanguage=$errorLanguage&requestEnvelope.detailLevel=$detailLevel&";
				$nvpreq        .= "&$nvpStr";
				curl_setopt( $ch, CURLOPT_POSTFIELDS, $nvpreq );

				$headerArray = array(
					"X-PAYPAL-SECURITY-USERID:$ppUserID",
					"X-PAYPAL-SECURITY-PASSWORD:$ppPass",
					"X-PAYPAL-SECURITY-SIGNATURE:$ppSign",
					"X-PAYPAL-REQUEST-DATA-FORMAT:NV",
					"X-PAYPAL-RESPONSE-DATA-FORMAT:JSON",
					"X-PAYPAL-APPLICATION-ID:$ppAppID",
					"X-PAYPAL-SANDBOX-EMAIL-ADDRESS:$sandboxEmail"
					//comment this line in production mode. IT IS JUST FOR SANDBOX TEST
				);

				$url = "https://svcs.sandbox.paypal.com/AdaptiveAccounts/GetVerifiedStatus";
				curl_setopt( $ch, CURLOPT_URL, $url );
				curl_setopt( $ch, CURLOPT_POST, 1 );
				curl_setopt( $ch, CURLOPT_VERBOSE, 1 );
				curl_setopt( $ch, CURLOPT_RETURNTRANSFER, true );
				curl_setopt( $ch, CURLOPT_HTTPHEADER, $headerArray );
				$paypalResponse = curl_exec( $ch );
				//echo $paypalResponse;   //if you want to see whole PayPal response then uncomment it.
				curl_close( $ch );

				$data = json_decode( $paypalResponse );
				if ( $data ) {
					if ( $data->responseEnvelope->ack == 'Failure' ) {
						User::where( 'id', Auth::user()->id )->update( array( 'verify_paypal_email' => 0 ) );
						$error_paypal_email                            = array();
						$error_paypal_email['paypal_email_address'][0] = "paypal account not verified. please verify paypal account.";

						return response()->json( [ "result" => 'failed', "errors" => $error_paypal_email ] );
					} else {
						User::where( 'id', Auth::user()->id )->update( array( 'verify_paypal_email' => 1 ) );
					}
				}
			} else {
				User::where( 'id', Auth::user()->id )->update( array( 'verify_paypal_email' => 0 ) );
			}
            $user_old_password = false;
            if(Auth::user()->password != NULL) {
                $user_old_password = User::where('id', Auth::user()->id)->first();
                $user_old_password = Crypt::decrypt($user_old_password->crypted_password);
            }
			$user              = User::manageData( $request, Auth::user()->id );
			if ( Auth::user()->email != $request->email ) {
				User::where( 'id', Auth::user()->id )->update( array( 'status' => 0 ) );
				//print_r($user);exit;

				User::updateCredentials( $request, Auth::user()->id );
				$user = User::where( 'id', Auth::user()->id )->first();
				$user->notify( new EmailVerification( $user, $this->data['configuration'] ) );

				$name = User::displayName( $user->id );
				Auth::logout();

				return response()->json( [
					"result"            => 'success_with_email_update',
					"name"              => $name,
					'user'              => $user,
					'user_old_password' => $user_old_password
				] );
			} else {
				User::updateCredentials( $request, Auth::user()->id );
				$name = User::displayName( $user->id );

				return response()->json( [
					"result"            => 'success',
					"name"              => $name,
					'user'              => $user,
					'user_old_password' => $user_old_password
				] );
			}
		}

		//print_r($validator->errors()->messages());exit;
		return response()->json( [ "result" => 'failed', "errors" => $validator->errors()->messages() ] );
	}

	function getSingle( Request $request, $slug ) {
		$this->data['user_data'] = User::where( 'username', $slug )->first();
		if ( $request->has( 'section' ) && count( $this->data['user_data'] ) ) {
			switch ( $request->section ) {
				case 'profile':
					return view( 'user-interface.dashboard.profile.public.index', $this->data );
					break;
				case 'garments-for-rent':
					return view( 'user-interface.dashboard.profile.public.garments-for-rent', $this->data );
					break;
			}
		}

		return back();
	}

	function getGarments() {

	}

}