<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use App\User;
use App\Models\Configuration;
use App\Models\Categories;
use App\Models\Cleaner;

use Validator;
use Session;
use Crypt;
use Auth;

class Validators extends Model {

	public static function frontendValidate( $request, $key ) {
		switch ( $key ) {
			case 'reset_password':
				$rules = [
					'password'              => 'required|min:6|confirmed',
					'password_confirmation' => 'required|min:6',
					'id'                    => 'required'
				];
				break;
			case 'rented_submit_review':
				$rules = [
					'comment' => 'required',
					'title'   => 'required'
				];
				break;
			case 'newslatter':
				$rules = [
					'name'  => 'required|min:3',
					'email' => 'required|email|unique:news_latter,email',
				];
				break;
			case 'registration';
				$rules                          = [];
				$rules['first_name']            = 'required';
				$rules['terms_condition']       = 'required';
				$rules['last_name']             = 'required';
				$rules['email']                 = 'required|email|unique:users,email';
				$rules['password']              = 'required|min:3|confirmed';
				$rules['password_confirmation'] = 'required|min:3';
				/*if ($request->password != NULL || $request->password_confirmation != NULL) {


				}*/
				break;
			case 'profile_save';
				$rules                   = [];
				$rules['body_type']      = 'required|numeric|in:1,2,3,4,5';
				$rules['first_name']     = 'required';
				$rules['last_name']      = 'required';
				$rules['contact_number'] = 'required';
				$rules['location']       = 'required';
				//$rules['country']                 = 'required|not_in:none';
				if ( $request->email != Auth::user()->email ) {
					$rules['email'] = 'required|email|unique:users,email';
				}
				$rules['birthday']                = 'required|date_format:m/d/Y';
				$rules['size']                    = 'required';
				$rules['height']                  = 'required';
				$rules['breast']                  = 'required';
				$rules['waist']                   = 'required';
				$rules['hips']                    = 'required';
//				$rules['shipping_fee_local']      = 'required|numeric';
//				$rules['shipping_fee_nationwide'] = 'required|numeric';
				if ( $request->has( 'current_password' ) || $request->has( 'password' ) || $request->has( 'password_confirmation' ) ) {
					$rules['current_password']      = 'required|min:6|in:' . Crypt::decrypt( Auth::user()->crypted_password );
					$rules['password']              = 'required|min:6|confirmed';
					$rules['password_confirmation'] = 'required|min:6';
				}
				$rules['longitude'] = 'required|numeric';
				$rules['latitude']  = 'required|numeric';
				break;
			case 'login':
				$rules = [
					'email'    => 'required|email|exists:users,email',
					'password' => 'required|min:6'
				];
				break;
			case 'for_rent_save':
				if ( $request->has( 'id' ) ) {
					$rules['picture'] = 'image';
				} else {
					$rules['picture'] = 'required|image';
					//$rules['terms_condition'] = 'required';
				}
				$rules['name']         = 'required';
				$rules['designer']     = 'required';
				$rules['price']        = 'required|numeric';
				$rules['retail_price'] = 'required|numeric';
				//$rules['price_week']  = 'required|numeric';
				$rules['color']       = 'required';
				$rules['size']        = 'required';
				$rules['season']      = 'required|in:Spring,Summer,Fall,Winter';
				$rules['description'] = 'required';
				if ( ! $request->has( 'categories' ) ) {
					$rules['category'] = 'required|in:none';
				}
				break;
			case 'forgot_password':
				$rules = [
					'email' => 'required|email|exists:users,email',
				];
				break;
			case 'contact_us';
				$configuration          = Configuration::find( 1 );
				$rules                  = [];
				$rules['name']          = 'required';
				$rules['email_address'] = 'required|email|not_in:' . $configuration->email;
				$rules['subject']       = 'required|not_in:none';
				$rules['message']       = 'required';
				break;
			case 'messages_create';
				$rules            = [];
				$rules["to"]      = "required";
				$rules["content"] = "required";
				break;
			case 'rent';
				$rules                   = [];
				$rules["rental_period"]  = 'required';
				$rules["start_date"]     = 'required';
				$rules["end_date"]       = 'required';
				$rules["street_number"]  = 'required';
//				$rules["route"]          = 'required';
				$rules["city"]           = 'required';
				$rules["state"]          = 'required';
				$rules["postal_code"]    = 'required';
				$rules["delivery_option"]    = 'required|in:Localization,Regular mail,Ups';
				$rules["country"]        = 'required';
				$rules["contact_number"] = 'required';
				$rules["email"]          = 'required|email';
				break;
			case 'dropzone':
				$rules          = [];
				$rules['label'] = 'required|in:items';
//				$rules['file']  = 'required|image';
				break;
			case 'shipping_calculator':
				$rules = [
					'type'                            => 'required',
					'from_address'                    => 'required',
					'from_city'                       => 'required',
					'from_state_province_code'        => 'required',
					'from_zipcode'                    => 'required',
					'from_countries'                  => 'required',
					'destination_address'             => 'required',
					'destination_city'                => 'required',
					'destination_state_province_code' => 'required',
					'destination_zipcode'             => 'required',
					'destination_countries'           => 'required',
					'length'                          => 'required',
					'width'                           => 'required',
					'height'                          => 'required',
					'weight'                          => 'required'
				];
				break;
		}
		$validator = Validator::make( $request->all(), $rules );
		if ( $validator->fails() ) {
			// Check if the request is not an ajax
			if ( ! $request->ajax() ) {
				Session::flash( 'session_header', 'Action failed' );
				Session::flash( 'session_content', 'Please check your inputs or connection and try again.' );
				Session::flash( 'session_boolean', 'error' );
			}

			return $validator;
		}

		return true;
	}

	public static function backendValidate( $request, $key ) {
		switch ( $key ) {
			case 'users_manage_information';
				$rules              = [];
				$rules['privilege'] = 'required|in:0,1';
				if ( $request->privilege != 0 ) {
					$rules['first_name'] = 'required|string';
					$rules['last_name']  = 'required|string';
					$rules['username']   = 'required|string|unique:users,username|regex:/^[a-zA-Z0-9.]*$/';
				}
				$rules['email'] = 'required|email|unique:users,email';
				/*if($request->has('password')) {
					$rules['password'] = 'required|min:3';
				}*/
				//
				break;
			case 'users_manage_general';
				$rules              = [];
				$rules['privilege'] = 'required|in:0,1';
				if ( $request->privilege != 0 ) {
					$rules['first_name'] = 'required|string';
					$rules['last_name']  = 'required|string';
					$user_data           = User::where( 'id', Crypt::decrypt( $request->id ) )
					                           ->where( 'username', $request->username )
					                           ->count();
					if ( $user_data == 0 ) {
						$rules['username'] = 'required|string|unique:users,username|regex:/^[a-zA-Z0-9.]*$/';
					}
				}
				break;
			case 'users_manage_credentials';
				$rules = [];
				$user  = User::find( Crypt::decrypt( $request->id ) );
				if ( $user->email != $request->email ) {
					$rules['email'] = "required|email|unique:users,email";
				}
				//$rules['password'] = "required|min:3";
				break;
			case 'reset_password':
				$rules = [
					'password'              => 'required|min:6|confirmed',
					'password_confirmation' => 'required|min:6',
					'id'                    => 'required'
				];
				break;
			case 'products_save';
				$rules = [];
				if ( ! $request->has( 'categories' ) ) {
					$rules['category'] = 'required';
				}
				//$rules['name']        = 'required|string';
				//$rules['description'] = 'required|string|not_in:<p><br></p>';
				//$rules['price']       = 'required|numeric';
				//$rules['picture']     = 'image';
				$rules['name']         = 'required';
				$rules['designer']     = 'required';
				$rules['price']        = 'required|numeric';
				$rules['retail_price'] = 'required|numeric';
				//$rules['price_week']  = 'required|numeric';
				$rules['color']       = 'required';
				$rules['size']        = 'required|in:Extra Small,Small,Medium,Large,Extra Large';
				$rules['season']      = 'required|in:Spring,Summer,Fall,Winter';
				$rules['description'] = 'required';
				break;
			case 'login':
				$rules = [
					'email'    => 'required|email',
					'password' => 'required|min:6'
				];
				break;
			case 'forgot_password':
				$rules = [
					'email' => 'required|email|exists:users,email',
				];
				break;
			case 'configuration_social_links':
				$rules = [];
				if ( $request->has( 'facebook_link' ) ) {
					$rules['facebook_link'] = "url";
				}
				if ( $request->has( 'instagram_link' ) ) {
					$rules['instagram_link'] = "url";
				}
				if ( $request->has( 'twitter_link' ) ) {
					$rules['twitter_link'] = "url";
				}
				break;
			case 'configuration_password':
				$rules = [
					'current_password'      => 'required|min:6|in:' . Crypt::decrypt( Auth::user()->crypted_password ),
					'password'              => 'required|min:6|confirmed',
					'password_confirmation' => 'required|min:6'
				];
				break;
			case 'configuration_general':
				$rules = [
					'website_logo'        => 'image',
					'website_logo_footer' => 'image',
					'profile_picture'     => 'image',
					'website_name'        => 'required',
					'website_email'       => 'required|email',
					'copyright'           => 'required',
					'phone_number'        => 'required',
					'location'            => 'required'
				];
				break;
			case 'configuration_email':
				$rules = [
					'current_email'      => 'required|email|in:' . Auth::user()->email,
					'email'              => 'required|email|unique:users,email|confirmed',
					'email_confirmation' => 'required|email|unique:users,email'
				];
				break;
			case 'configuration_api_keys':
				$rules = [
					'paypal_test_username'  => 'required_with:paypal_test_password,paypal_test_signature',
					'paypal_test_password'  => 'required_with:paypal_test_username,paypal_test_signature',
					'paypal_test_signature' => 'required_with:paypal_test_username,paypal_test_password',
					'paypal_live_username'  => 'required_with:paypal_live_password,paypal_live_signature',
					'paypal_live_password'  => 'required_with:paypal_live_username,paypal_live_signature',
					'paypal_live_signature' => 'required_with:paypal_live_username,paypal_live_password',
					'paypal_mode'           => 'required|in:live,sandbox'
				];
				break;
			case 'cms_custom_add';
				$rules                  = [];
				$rules['page_dropdown'] = 'required';
				if ( $request->page_dropdown == 'custom_page' ) {
					$rules['page_name'] = 'required|unique:pages,name';
				}
				$rules['section']    = 'required';
				$rules['field_type'] = 'required';
				$rules['field_name'] = 'required';
				if ( $request->has( 'repeater_field_type' ) ) {
					$rules['repeater_field_type.*'] = 'required|regex:/^[a-zA-Z0-9_ ]*$/';
					$rules['repeater_field_name.*'] = 'required|regex:/^[a-zA-Z0-9_ ]*$/';
				}
				break;
			case 'categories_save';
				$rules = [];
				if ( $request->has( 'id' ) ) {
					$category = Categories::find( Crypt::decrypt( $request->id ) );
					if ( $category->name == $request->name && $category->status == $request->status ) {
						$rules['name'] = 'required';
					}
				} else {
					$rules['name'] = 'required|unique:categories,name';
				}
				$rules['status'] = 'required|in:0,1';
				if ( $request->has( 'picture' ) ) {
					$rules['picture'] = 'image';
				}
				break;
			case 'cleaning_save';
				$rules = [];
				if ( $request->has( 'id' ) ) {
					$category = Cleaner::find( Crypt::decrypt( $request->id ) );
					if ( $category->name == $request->name ) {
						$rules['name'] = 'required';
					} else {
						$rules['name'] = 'required|unique:cleaner,name';
					}
					if ( $category->shop_name == $request->shop_name ) {
						$rules['shop_name'] = 'required';
					} else {
						$rules['shop_name'] = 'required|unique:cleaner,shop_name';
					}
					$rules['location'] = 'required';
					if ( $request->has( 'mobile_number' ) ) {
						$rules['mobile_number'] = 'min:8|max:14';
					}
				} else {
					$rules['name']      = 'required|unique:cleaner,name';
					$rules['shop_name'] = 'required|unique:cleaner,shop_name';
					$rules['location']  = 'required';
					if ( $request->has( 'mobile_number' ) ) {
						$rules['mobile_number'] = 'min:8|max:14';
					}
				}

				break;
			case 'blog_save';
				$rules = [];
				/*if (!$request->has('categories')) {
					$rules['category'] = 'required';
				}*/
				$rules['title']       = 'required|string';
				$rules['description'] = 'required|string|not_in:<p><br></p>';
				break;
			case 'faqs_save':
				$rules = [
					'question' => 'required|min:5',
					'answer'   => 'required|min:10'
				];
				break;
		}
		$validator = Validator::make( $request->all(), $rules );
		if ( $validator->fails() ) {
			// Check if the request is not an ajax
			if ( ! $request->ajax() ) {
				Session::flash( 'session_header', 'Action failed' );
				Session::flash( 'session_content', 'Please check your inputs or connection and try again.' );
				Session::flash( 'session_boolean', 'error' );
			}

			return $validator;
		}

		return true;
	}

}