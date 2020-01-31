<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Notifications\RegistrationVerificationCodeSend;
use App\User;
use App\Models\Categories;
use App\Models\Products\Products;
use App\Models\DeviceToken;
use App\Models\Wishlist\Wishlist;
use App\Models\ProductUserReview;
use App\Models\Rent\Rent;
use App\Models\Messages\Messages;
use App\Models\Messages\MessagesRoom;
use App\Models\Cleaner;
use App\Models\Configuration;
use App\Models\FAQs;
use Auth,
    Hash,
    Input,
    Session,
    Redirect,
    Mail,
    URL,
    File,
    Str,
    Config,
    DB,
    Response,
    View,
    Validator,
    Twilio;
use Crypt;

class UserController extends ApiBaseController {

    public function postSignup(Request $request) {
        $rules = [];
        $rules['first_name'] = 'required';
        $rules['last_name'] = 'required';
        $rules['email'] = 'required|email|unique:users,email';
        $rules['password'] = 'required|min:3';
        $validator = Validator::make($request->all(), $rules);
        $code = UNSUCCESS;
        $msg = "Parameter mising.";
        if ($validator->fails()) {
            return Response::json(array('code' => $code, 'msg' => $validator->errors()->messages(), 'data' => null));
        }

        $check_user = User::where('email', $request->email)->first();
        $response = array();
        if (count($check_user) == 0 || $check_user->status == '0') {

            if (count($check_user) > 0) {
                $user = User::find($check_user->id);
                $user->first_name = $request->first_name;
                $user->last_name = $request->last_name;
                $user->password = Hash::make($request->password);
                $user->crypted_password = Crypt::encrypt($request->password);
                $user->api_token = str_random(200);
                $user->verification_code = rand(100000, 1000000);
                $user->save();
            } else {
                $user = User::manageData($request);
            }
            $request->user_id = $user->id;
            DeviceToken::addData($request);
            $user_details = User::where('id', $user->id)->first(array('id', 'api_token', 'status', 'first_name', 'last_name', 'profile_picture', 'profile_picture_custom_size'));
            $user_details = $user_details->toArray();
            $user_details = array_map(function($v) {
                return (is_null($v)) ? "" : $v;
            }, $user_details);
            $response['user_details'] = $user_details;
            $code = SUCCESS;
            $msg = "User register successfully.";
            @ob_end_clean();
            header("Connection: close");
            ignore_user_abort();
            ob_start();
            header('HTTP/1.1 200 OK', true, 200);
            header('Content-Type: application/json');
            echo json_encode(array('code' => $code, 'msg' => $msg, 'data' => (object) $response));
            $size = ob_get_length();
            header("Content-Length: $size");
            ob_end_flush();
            flush();
            session_write_close();
            $user->notify(new RegistrationVerificationCodeSend($user, $this->data['configuration']));
            exit;
        } else {
            $msg = "Email already exists.";
        }
        return Response::json(array('code' => $code, 'msg' => $msg, 'data' => (object) $response));
    }

    public function postLogout(Request $request) {
        $code = SUCCESS;
        $msg = "User logout successfully.";
        $user = auth()->guard('api')->user();
        $response = array();
        $request->user_id = $user->id;
        DeviceToken::RemoveData($request);
        return Response::json(array('code' => $code, 'msg' => $msg, 'data' => (object) $response));
    }

    public function postSigninSocial(Request $request) {
        $code = UNSUCCESS;
        $msg = "Invalid email address.";
        $response = array();
        if ($request->type == "facebook") {
            $check_email_exists = User::where('email', $request->email)->first();
            if (count($check_email_exists) > 0) {
                if ($check_email_exists->facebook_id == NULL && $check_email_exists->twitter_id == NULL) {
                    $msg = "Email already register. please login with email and password.";
                } else if ($check_email_exists->twitter_id != "") {
                    $msg = "Email already register with twitter. please login with twitter.";
                } else {
                    $code = SUCCESS;
                    $msg = "Facebook login successfully.";
                    $user_details = User::where('id', $check_email_exists->id)->first(array('id', 'api_token', 'status', 'first_name', 'last_name', 'profile_picture', 'profile_picture_custom_size', 'firebase_id'));
                    $request->user_id = $user_details->id;
                    $user_details = $user_details->toArray();
                    $user_details = array_map(function($v) {
                        return (is_null($v)) ? "" : $v;
                    }, $user_details);
                    $response['user_details'] = $user_details;

                    DeviceToken::addData($request);
                }
            } else {
                $user = new User;
                $user->facebook_id = $request->social_id;
                $user->email = $request->email;
                $user->first_name = $request->first_name;
                $user->last_name = $request->last_name;
                $user->api_token = str_random(200);
                $user->status = 1;
                $user->profile_picture = 'uploads/others/no_avatar.jpg';
                $user->profile_picture_custom_size = 'uploads/others/no_avatar.jpg';
                $user->save();
                $user_details = User::where('id', $user->id)->first(array('id', 'api_token', 'status', 'first_name', 'last_name', 'profile_picture', 'profile_picture_custom_size', 'firebase_id'));
                $request->user_id = $user_details->id;
                $user_details = $user_details->toArray();
                $user_details = array_map(function($v) {
                    return (is_null($v)) ? "" : $v;
                }, $user_details);


                $response['user_details'] = $user_details;
                $msg = "Facebook register successfully.";
                $code = SUCCESS;

                DeviceToken::addData($request);
            }
        } else {
            $check_email_exists = User::where('email', $request->email)->first();
            if (count($check_email_exists) > 0) {
                if ($check_email_exists->facebook_id == NULL && $check_email_exists->twitter_id == NULL) {
                    $msg = "Email already register. please login with email and password.";
                } else if ($check_email_exists->facebook_id != "") {
                    $msg = "Email already register with facebook. please login with twitter.";
                } else {
                    $code = SUCCESS;
                    $msg = "Twitter login successfully.";
                    $user_details = User::where('id', $check_email_exists->id)->first(array('id', 'api_token', 'status', 'first_name', 'last_name', 'profile_picture', 'profile_picture_custom_size', 'firebase_id'));
                    $request->user_id = $user_details->id;
                    $user_details = $user_details->toArray();
                    $user_details = array_map(function($v) {
                        return (is_null($v)) ? "" : $v;
                    }, $user_details);

                    $response['user_details'] = $user_details;
                    DeviceToken::addData($request);
                }
            } else {
                $user = new User;
                $user->twitter_id = $request->social_id;
                $user->email = $request->email;
                $user->api_token = str_random(200);
                $user->first_name = $request->first_name;
                $user->last_name = $request->last_name;
                $user->status = 1;
                $user->profile_picture = 'uploads/others/no_avatar.jpg';
                $user->profile_picture_custom_size = 'uploads/others/no_avatar.jpg';
                $user->save();
                $user_details = User::where('id', $user->id)->first(array('id', 'api_token', 'status', 'first_name', 'last_name', 'profile_picture', 'profile_picture_custom_size', 'firebase_id'));
                $request->user_id = $user_details->id;
                $user_details = $user_details->toArray();
                $user_details = array_map(function($v) {
                    return (is_null($v)) ? "" : $v;
                }, $user_details);

                $response['user_details'] = $user_details;
                $msg = "Twitter register successfully.";
                $code = SUCCESS;
                DeviceToken::addData($request);
            }
        }
        return Response::json(array('code' => $code, 'msg' => $msg, 'data' => (object) $response));
    }

    public function postSignin(Request $request) {
        $rules = [];
        $rules['email'] = 'required|email';
        $rules['password'] = 'required|min:3';
        $validator = Validator::make($request->all(), $rules);
        $code = UNSUCCESS;
        $msg = "Parameter mising.";
        if ($validator->fails()) {
            return Response::json(array('code' => $code, 'msg' => $validator->errors()->messages(), 'data' => null));
        }


        $check_user = User::where('email', $request->email)->first(array('id', 'api_token', 'status', 'password', 'first_name', 'last_name', 'profile_picture', 'profile_picture_custom_size', 'firebase_id'));
        $response = array();


        //$response = $request->all();
        //return Response::json(array('code' => $code,'msg' => $msg,'data' => (object)$response));
        if (count($check_user) > 0) {
            if (Hash::check($request->password, $check_user->password)) {
                $msg = "login successfully.";
                $request->user_id = $check_user->id;
                $check_user = $check_user->toArray();
                $check_user = array_map(function($v) {
                    return (is_null($v)) ? "" : $v;
                }, $check_user);
                $response['user_details'] = $check_user;
                $code = SUCCESS;
                DeviceToken::addData($request);
            } else {
                $msg = "Invalid password.";
            }
        }
        return Response::json(array('code' => $code, 'msg' => $msg, 'data' => (object) $response));
    }

    public function postContactUs(Request $request) {
        $code = SUCCESS;
        $msg = "Contact us send successfully.";
        $user = auth()->guard('api')->user();
         $rules = []; 
                    $rules['name'] = 'required|min:3';
                    $rules['email_address'] = 'required|email';
                    $rules['localization'] = 'required|min:2';
                    $rules['message'] = 'required|min:3';
                    $rules['subject'] = 'required|min:3';
                    
                    $validator = Validator::make($request->all(), $rules);
                    if ($validator->fails()) {
                        return Response::json(array('code' => $code, 'msg' => $validator->errors()->messages(), 'data' => null));
                    }
        $response = array();
        Configuration::contactUsAPI($request);
        return Response::json(array('code' => $code, 'msg' => $msg, 'data' => (object) $response));
    }

    public function getFAQsList() {
        $code = UNSUCCESS;
        $msg = "FAQs not found.";
        $user = auth()->guard('api')->user();
        $response = array();
        $faqs_list = FAQs::all();
        if (count($faqs_list) > 0) {
            $code = SUCCESS;
            $msg = "FAQs list found successfully.";
            $response['faqs_list'] = $faqs_list;
        }
        return Response::json(array('code' => $code, 'msg' => $msg, 'data' => (object) $response));
    }

    public function postResendVerificationCode(Request $request) {
        $code = SUCCESS;
        $msg = "Verification code send successfully. Please check your email.";
        $user = auth()->guard('api')->user();

        $verification_code = rand(100000, 1000000);
        User::where('id', $user->id)->update(array('verification_code' => $verification_code));
        $user = User::where('id', $user->id)->first();
        $user_details = User::where('id', $user->id)->first(array('id', 'api_token', 'status', 'first_name', 'last_name', 'profile_picture', 'profile_picture_custom_size'));
        $user_details = $user_details->toArray();
        $user_details = array_map(function($v) {
            return (is_null($v)) ? "" : $v;
        }, $user_details);


        $response['user_details'] = $user_details;
        //$code = SUCCESS;
        //$msg = "User register successfully.";
        @ob_end_clean();
        header("Connection: close");
        ignore_user_abort();
        ob_start();
        header('HTTP/1.1 200 OK', true, 200);
        header('Content-Type: application/json');
        echo json_encode(array('code' => $code, 'msg' => $msg, 'data' => (object) $response));
        $size = ob_get_length();
        header("Content-Length: $size");
        ob_end_flush();
        flush();
        session_write_close();
        $user->notify(new RegistrationVerificationCodeSend($user, $this->data['configuration']));
        exit;
        return Response::json(array('code' => $code, 'msg' => $msg, 'data' => (object) $response));
    }

    public function postVerifyCode(Request $request) {
        $code = UNSUCCESS;
        $msg = "Invalid verification code";
        $user = auth()->guard('api')->user();
        $response = array();
        $check_verify_code = User::where('verification_code', $request->verification_code)->where('id', $user->id)->first();
        if (count($check_verify_code) > 0) {
            $code = SUCCESS;
            $msg = "User verify successfully.";
            User::where('id', $user->id)->update(array('verification_code' => 0, 'status' => '1'));
            $user_details = User::where('id', $user->id)->first(array('id', 'api_token', 'status', 'first_name', 'last_name', 'profile_picture', 'profile_picture_custom_size'));
            $user_details = $user_details->toArray();
            $user_details = array_map(function($v) {
                return (is_null($v)) ? "" : $v;
            }, $user_details);


            $response['user_details'] = $user_details;
        }
        return Response::json(array('code' => $code, 'msg' => $msg, 'data' => (object) $response));
    }

    public function postSigninFacebook(Request $request) {
        $code = UNSUCCESS;
        $msg = "Invalid email address.";
        $check_user = new User;
        if (isset($request->email)) {
            $check_user = $check_user->where('email', $request->email);
        }
        $check_user = $check_user->where('facebook_id', $request->facebook_id)->first(array('id', 'api_token', 'status', 'first_name', 'last_name', 'profile_picture', 'profile_picture_custom_size'));
        $response = array();
        if (count($check_user) > 0) {
            $response['user_details'] = $check_user;
            $msg = "Facebook login successfully.";
            $code = SUCCESS;
        } else {
            $user = new User;
            $user->facebook_id = $request->facebook_id;
            $user->email = $request->email;
            $user->first_name = $request->first_name;
            $user->last_name = $request->last_name;
            $user->save();
            $check_user = User::find($user->id);
            $response['user_details'] = $check_user;
            $msg = "Facebook register successfully.";
            $code = SUCCESS;
        }
        return Response::json(array('code' => $code, 'msg' => $msg, 'data' => (object) $response));
    }

    public function postSigninTwitter(Request $request) {
        $code = UNSUCCESS;
        $msg = "Invalid email address.";
        $check_user = new User;
        if (isset($request->email)) {
            $check_user = $check_user->where('email', $request->email);
        }
        $check_user = $check_user->where('twitter_id', $request->twitter_id)->first(array('id', 'api_token', 'status', 'first_name', 'last_name', 'profile_picture', 'profile_picture_custom_size'));
        $response = array();
        if (count($check_user) > 0) {
            $response['user_details'] = $check_user;
            $msg = "Twitter login successfully.";
            $code = SUCCESS;
        } else {
            $user = new User;
            $user->twitter_id = $request->twitter_id;
            $user->email = $request->email;
            $user->first_name = $request->first_name;
            $user->last_name = $request->last_name;
            $user->save();
            $check_user = User::find($user->id);
            $response['user_details'] = $check_user;
            $msg = "Twitter register successfully.";
            $code = SUCCESS;
        }
        return Response::json(array('code' => $code, 'msg' => $msg, 'data' => (object) $response));
    }

    public function postForgotpassword(Request $request) {
        $code = UNSUCCESS;
        //session()->put('_token', str_random(40)); 
        $rules = [];
        $rules['email'] = 'required|email'; 
        $validator = Validator::make($request->all(), $rules);
        $msg = "Parameter mising.";
        if ($validator->fails()) {
            return Response::json(array('code' => $code, 'msg' => $validator->errors()->messages(), 'data' => null));
        }

        $response = array();
        $success = User::forgotPassword($request);
        if ($success == 'social media') {
            $msg = 'Email register with social media. please login with social media';
        } elseif ($success == 'true') {
            $code = SUCCESS;
            $msg = "Forgot password like send to your email address.";
        } else {
            $msg = "Invalid email address.";
        }

        return Response::json(array('code' => $code, 'msg' => $msg, 'data' => (object) $response));
    }

    public function getCategoryList() {
        $code = UNSUCCESS;
        $msg = "Category list not found.";
        $check_user = new User;
        $response = array();
        //print_r(Categories::all()->toArray());
        $category_list = Categories::where('status', 1)->get(array('id', 'name','picture'));
        if (count($category_list) > 0) {
            $category_list_array = $category_list->toArray();
            $msg = "Category found successfully.";
            $code = SUCCESS;
            $all_category_array[] = array("id" => 0, "name" => "All");
            $category_list = $category_list_array;//array_merge($all_category_array, $category_list_array);

            $category_list = array_map(function($v) {
                return (is_null($v)) ? "" : $v;
            }, $category_list);

            $response['category_list'] = $category_list;
        }
        return Response::json(array('code' => $code, 'msg' => $msg, 'data' => (object) $response));
    }

    public function getReviewList(Request $request) {
        $code = UNSUCCESS;
        $msg = "Review list not found.";
        $check_user = new User;
        $response = array();
        //print_r(Categories::all()->toArray());
        $review_list = ProductUserReview::where('product_id', $request->product_id)->with(['user_detail' => function($query) {
                        $query->select("id", "contact_number", "location", "body_type", "first_name", "last_name", "profile_picture", "profile_picture_custom_size");
                    }])->get();
        if (count($review_list) > 0) {
            $review_list = $review_list->toArray();
            $msg = "Review list found successfully.";
            $code = SUCCESS;

            $review_list = array_map(function($v) {
                return (is_null($v)) ? "" : $v;
            }, $review_list);

            $response['review_list'] = $review_list;
        }
        return Response::json(array('code' => $code, 'msg' => $msg, 'data' => (object) $response));
    }

    public function postSubmitProductReview(Request $request) {
        $code = SUCCESS;
        $msg = "Product review submitted.";
        $response = array();
        $user = auth()->guard('api')->user();
        $request->user_id = $user->id;
        ProductUserReview::manageDataUsingAPI($request);
        Rent::where('product_id', $request->product_id)->where('user_id', $user->id)->update(array('user_review_submitted' => 1));
        $product_detail = Products::where('id', $request->product_id)->first();

        $user_device_token = DeviceToken::where('user_id', $product_detail->user_id)->get();
        if (count($user_device_token) > 0) {
            foreach ($user_device_token as $key => $value) {
                if ($value->device_type == "Android") {
                    $fields = array(
                        'to' => $value->device_token,
                        'data' => array("message" => 'Review Submitted', 'title' => "User Submitted Your Product Review.")
                    );
                    sendPushNotification($fields);
                }
            }
        }

        return Response::json(array('code' => $code, 'msg' => $msg, 'data' => (object) $response));
    }

    public function getProductSearch(Request $request) {
        $code = UNSUCCESS;
        $msg = "Product list not found.";
        $user = auth()->guard('api')->user();

        $response = array();
        $total = 10;
        $skip = ($request->page - 1) * $total;
        $total_products = Products::count();
        //print_r(Categories::all()->toArray());
        $product_list = Products::where('name', "LIKE", "%" . $request->search . "%")->where('user_id', '!=', $user->id)->orderBy('created_at', 'desc')->with(['user_detail' => function($query) {
                        $query->select('id', 'first_name', 'last_name');
                    }]);
        $all_product_list=$product_list->get()->toArray();
        $product_list=$product_list->skip($skip)->take($total)->get(array('id', 'user_id', 'name', 'price', 'picture'));
        
                    
         if (count($product_list) > 0) {

            $msg = "Product found successfully.";
            $code = SUCCESS;

            foreach ($product_list as $key => $value) {
                 $product_list[$key]->isRented=$value->isRented(date('d/m/Y'),$value->id) ;
                if ($user) {
                    $check_on_wishlist_or_not = Wishlist::where('product_id', $value->id)->where('user_id', $user->id)->count();
                    $product_list[$key]->on_wishlist = 0;
                    if ($check_on_wishlist_or_not > 0) {
                        $product_list[$key]->on_wishlist = 1;
                    }
                } else {
                    $product_list[$key]->on_wishlist = 0;
                }
                $product_review_avg = ProductUserReview::where('product_id', $value->id)->avg('rating');
                $product_review_avg = round($product_review_avg);
                $product_list[$key]->avg_product_review = $product_review_avg;
            }
            $product_list = $product_list->toArray();
            $product_list = array_map(function($v) {
                return (is_null($v)) ? "" : $v;
            }, $product_list);
            $response['product_list'] = $product_list;
        }
        $response['total_product'] = count($all_product_list);
        $response['current_time'] = date('Y-m-d H:i:s');

        return Response::json(array('code' => $code, 'msg' => $msg, 'data' => (object) $response));
    }

    public function getNewAddedProductList(Request $request) {
        $code = UNSUCCESS;
        $msg = "Product list not found.";
        $user = auth()->guard('api')->user();

        $response = array();

        $total_products = Products::count();
        //print_r(Categories::all()->toArray());
        $product_list = Products::where('created_at', '>', $request->current_time)->orderBy('created_at', 'desc')->with(['user_detail' => function($query) {
                        $query->select('id', 'first_name', 'last_name');
                    }])->get(array('id', 'user_id', 'name', 'price', 'picture'));
        if (count($product_list) > 0) {

            $msg = "Product found successfully.";
            $code = SUCCESS;

            foreach ($product_list as $key => $value) {
                if ($user) {
                    $check_on_wishlist_or_not = Wishlist::where('product_id', $value->id)->where('user_id', $user->id)->count();
                    $product_list[$key]->on_wishlist = 0;
                    if ($check_on_wishlist_or_not > 0) {
                        $product_list[$key]->on_wishlist = 1;
                    }
                } else {
                    $product_list[$key]->on_wishlist = 0;
                }
                $product_review_avg = ProductUserReview::where('product_id', $value->id)->avg('rating');
                $product_review_avg = round($product_review_avg);
                $product_list[$key]->avg_product_review = $product_review_avg;
                $product_list[$key]->user_detail->last_name = substr($product_list[$key]->user_detail->last_name, 0, 1);
            }
            $product_list = $product_list->toArray();
            $product_list = array_map(function($v) {
                return (is_null($v)) ? "" : $v;
            }, $product_list);
            $response['product_list'] = $product_list;
        }
        $response['total_product'] = $total_products;
        $response['current_time'] = date('Y-m-d H:i:s');

        return Response::json(array('code' => $code, 'msg' => $msg, 'data' => (object) $response));
    }

    public function getProductList(Request $request) {
        $code = UNSUCCESS;
        $msg = "Product list not found.";
        $user = auth()->guard('api')->user();
        //print_r($request->all());
        $response = array();
        $total = 10;
        $skip = ($request->page - 1) * $total;
        $total_products = Products::count();
        $category_id = $request->category_id;
        //print_r(Categories::all()->toArray());

        $this->data['body_type'] = '';
        $this->data['size'] = '';
        $this->data['price'] = Products::max('price');
        $this->data['per'] = 1;
        $this->data['location'] = '';
        $this->data['designer'] = '';
        $this->data['height'] = '';
        $this->data['season'] = '';
        $this->data['category'] = '';
        $max_product_price = Products::max('price');
        if ($max_product_price == "") {
            $max_product_price = 1;
        }
        $this->data['max_product_price'] = $max_product_price;
        $this->data['price1'] = 1;
        $this->data['price2'] = $max_product_price;

        if ($request->has('body_type')) {
            $this->data['body_type'] = $request->body_type;
        }
        if ($request->has('size')) {
            $this->data['size'] = $request->size;
        }
        if ($request->has('price1')) {
            $this->data['price1'] = $request->price1;
        }
        if ($request->has('price2')) {
            $this->data['price2'] = $request->price2;
        }
        if ($request->has('per')) {
            $this->per($request);
        }
        if ($request->has('location')) {
            $this->data['location'] = $request->location;
        }
        if ($request->has('designer')) {
            $this->data['designer'] = $request->designer;
        }
        if ($request->has('height')) {
            $this->data['height'] = $request->height;
        }
        if ($request->has('season')) {
            $this->data['season'] = $request->season;
        }
        if ($request->has('category')) {
            $this->data['category'] = $request->category;
        }

        $category_name = Categories::where('id', $category_id)->first();
        if (count($category_name) > 0) {
            $this->data['category'] = $category_name->name;
        }
        //echo $this->data['per'];exit;
        //echo $this->data['price'];exit;
        $this->data['budget'] = $this->data['price'];
        //echo $this->data['budget'];exit;
        //print_r(Rent::select('product_id')->where('user_id', Auth::check() ? Auth::user()->id : '' ));exit;
        $product_list = Products::groupBy('products.id', 'products.created_at')
                ->leftjoin('product_categories', 'products.id', '=', 'product_categories.product_id')
                ->leftjoin('categories', 'product_categories.category_id', '=', 'categories.id')
                ->leftjoin('users', 'products.user_id', '=', 'users.id')
                ->where('products.user_id', '!=', $user->id)
                ->whereNotIn('products.id', Rent::select('product_id')->where('user_id', Auth::check() ? Auth::user()->id : '')
                        ->whereIn('status', array('Cart', 'Pending', 'Accepted'))->get())
                ->where('categories.name', 'LIKE', '%' . $this->data['category'] . '%')
                ->where('users.body_type', 'LIKE', '%' . $this->data['body_type'] . '%');
        if ($this->data['size'] != "") {
            $product_list = $product_list->where('products.size', $this->data['size']);
        }

        $product_list = $product_list->where('products.price', '>=', $this->data['price1'])
                        ->where('products.price', '<=', $this->data['price2'])
                        ->where('users.location', 'LIKE', '%' . $this->data['location'] . '%')
                        ->where('products.designer', 'LIKE', '%' . $this->data['designer'] . '%')
                        ->where('users.height', 'LIKE', '%' . $this->data['height'] . '%')
                        ->where('products.season', 'LIKE', '%' . $this->data['season'] . '%')
                        ->select('products.id as productID')
                        ->orderBy('products.created_at', 'desc ')
                        ->skip($skip)->take($total)->get()->toArray();
        //print_r($product_list);
        $product_list_id = array_pluck($product_list, 'productID');
        //print_r($product_list_id);
        $product_list = Products::whereIn('id', $product_list_id)->with(['user_detail' => function($query) {
                        $query->select('id', 'first_name', 'last_name');
                    }])->orderBy('created_at', 'desc')->get(array('id', 'user_id', 'name', 'price', 'picture'));
        if (count($product_list) > 0) {

            $msg = "Product found successfully.";
            $code = SUCCESS;

            foreach ($product_list as $key => $value) {
                 $product_list[$key]->isRented=$value->isRented(date('d/m/Y'),$value->id) ;
                if ($user) {
                    $check_on_wishlist_or_not = Wishlist::where('product_id', $value->id)->where('user_id', $user->id)->count();
                    $product_list[$key]->on_wishlist = 0;
                    if ($check_on_wishlist_or_not > 0) {
                        $product_list[$key]->on_wishlist = 1;
                    }
                } else {
                    $product_list[$key]->on_wishlist = 0;
                }
                
               $product_list[$key]->category = db::table('categories')
                                        ->join('product_categories','categories.id','=','product_categories.category_id')
                                        ->where('categories.status',1)
                                        ->where('product_categories.product_id',$value->id)
                                        ->orderBy('categories.name','asc')
                                        ->get(array('category_id', 'name'))->first();
                
                
                $product_review_avg = ProductUserReview::where('product_id', $value->id)->avg('rating');
                $product_review_avg = round($product_review_avg);
                $product_list[$key]->avg_product_review = $product_review_avg;
                $product_list[$key]->user_detail->last_name = substr($product_list[$key]->user_detail->last_name, 0, 1);
            }
            $product_list = $product_list->toArray();
            $product_list = array_map(function($v) {
                return (is_null($v)) ? "" : $v;
            }, $product_list);
            $response['product_list'] = $product_list;
        }
        $response['total_product'] = $total_products;
        $response['current_time'] = date('Y-m-d H:i:s');

        return Response::json(array('code' => $code, 'msg' => $msg, 'data' => (object) $response));
    }

    public function getProductListFilter(Request $request) {
        $code = UNSUCCESS;
        $msg = "Product list not found.";
        $user = auth()->guard('api')->user();
        //print_r($request->all());
        $response = array();
        $total = 10;
        $skip = ($request->page - 1) * $total;
        $total_products = Products::count();
        $category_id = $request->category_id;
        //print_r(Categories::all()->toArray());

        $this->data['body_type'] = '';
        $this->data['size'] = '';
        $this->data['price'] = Products::max('price');
        $this->data['per'] = 1;
        $this->data['location'] = '';
        $this->data['designer'] = '';
        $this->data['height'] = '';
        $this->data['season'] = '';
        $this->data['category'] = '';
        $max_product_price = Products::max('price');
        if ($max_product_price == "") {
            $max_product_price = 1;
        }
        $this->data['max_product_price'] = $max_product_price;
        $this->data['price1'] = 1;
        $this->data['price2'] = $max_product_price;

        if ($request->has('body_type')) {
            $this->data['body_type'] = $request->body_type;
        }
        if ($request->has('size')) {
            $this->data['size'] = $request->size;
        }
        if ($request->has('priceMin')) {
            $this->data['price1'] = $request->priceMin;
        }
        if ($request->has('priceMax')) {
            $this->data['price2'] = $request->priceMax;
        }
        if ($request->has('per')) {
            $this->per($request);
        }
        if ($request->has('location')) {
            $this->data['location'] = $request->location;
        }
        if ($request->has('designer')) {
            $this->data['designer'] = $request->designer;
        }
        if ($request->has('height')) {
            $this->data['height'] = $request->height;
        }
        if ($request->has('season')) {
            $this->data['season'] = $request->season;
        }
       

        $category_name = Categories::where('id', $category_id)->first();
        if (count($category_name) > 0) {
            $this->data['category'] = $category_name->name;
        }
        //echo $this->data['per'];exit;
        //echo $this->data['price'];exit;
        $this->data['budget'] = $this->data['price'];
        //echo $this->data['budget'];exit;
        //print_r(Rent::select('product_id')->where('user_id', Auth::check() ? Auth::user()->id : '' ));exit;
        $product_list = Products::groupBy('products.id', 'products.created_at')
                ->leftjoin('product_categories', 'products.id', '=', 'product_categories.product_id')
                ->leftjoin('categories', 'product_categories.category_id', '=', 'categories.id')
                ->leftjoin('users', 'products.user_id', '=', 'users.id')
                ->where('products.user_id', '!=', $user->id)
                ->whereNotIn('products.id', Rent::select('product_id')->where('user_id', Auth::check() ? Auth::user()->id : '')
                        ->whereIn('status', array('Cart', 'Pending', 'Accepted'))->get());
        if($category_id >0)
               $product_list=$product_list->where('categories.id', '=', $category_id);
        
        $product_list=$product_list->where('users.body_type', 'LIKE', '%' . $this->data['body_type'] . '%');
        if ($this->data['size'] != "") {
            $product_list = $product_list->where('products.size', $this->data['size']);
        }

        $request_product_list = $product_list->where('products.price', '>=', $this->data['price1'])
                        ->where('products.price', '<=', $this->data['price2'])
                        ->where('users.location', 'LIKE', '%' . $this->data['location'] . '%')
                        ->where('products.designer', 'LIKE', '%' . $this->data['designer'] . '%')
                        ->where('users.height', 'LIKE', '%' . $this->data['height'] . '%')
                        ->where('products.season', 'LIKE', '%' . $this->data['season'] . '%')
                        ->select('products.id as productID')
                        ->orderBy('products.created_at', 'desc ')
                        ;
        $all_product_in_request=array(); 
        $all_product_in_request=$request_product_list->get()->toArray();
        $product_list=$request_product_list->skip($skip)->take($total)->get()->toArray() ;
        
        //print_r($product_list);
        $product_list_id = array_pluck($product_list, 'productID');
        //print_r($product_list_id);
        $product_list = Products::whereIn('id', $product_list_id)->with(['user_detail' => function($query) {
                        $query->select('id', 'first_name', 'last_name');
                    }])->orderBy('created_at', 'desc')->get(array('id', 'user_id', 'name', 'price', 'picture'));
        if (count($product_list) > 0) {

            $msg = "Product found successfully.";
            $code = SUCCESS;

            foreach ($product_list as $key => $value) {
                  $product_list[$key]->isRented=$value->isRented(date('d/m/Y'),$value->id) ;
                if ($user) {
                    $check_on_wishlist_or_not = Wishlist::where('product_id', $value->id)->where('user_id', $user->id)->count();
                    $product_list[$key]->on_wishlist = 0;
                    if ($check_on_wishlist_or_not > 0) {
                        $product_list[$key]->on_wishlist = 1;
                    }
                } else {
                    $product_list[$key]->on_wishlist = 0;
                }
                $product_review_avg = ProductUserReview::where('product_id', $value->id)->avg('rating');
                $product_review_avg = round($product_review_avg);
                $product_list[$key]->avg_product_review = $product_review_avg;
                $product_list[$key]->user_detail->last_name = substr($product_list[$key]->user_detail->last_name, 0, 1);
            }
            $product_list = $product_list->toArray();
            $product_list = array_map(function($v) {
                return (is_null($v)) ? "" : $v;
            }, $product_list);
            $response['product_list'] = $product_list;
        } 
        $response['total_product'] = count($all_product_in_request);
        $response['current_time'] = date('Y-m-d H:i:s');

        return Response::json(array('code' => $code, 'msg' => $msg, 'data' => (object) $response));
    }

    public function postProductAddRemoveWishlist(Request $request) {
        $code = UNSUCCESS;
        $msg = "Product not found.";
        $response = array();
        $user = auth()->guard('api')->user();
        //print_r(Categories::all()->toArray());
         $rules = []; 
                    $rules['product_id'] = 'required|min:1';
                    $rules['on_wishlist'] = 'required|in:0,1';
                    $validator = Validator::make($request->all(), $rules);
                    if ($validator->fails()) {
                        return Response::json(array('code' => $code, 'msg' => $validator->errors()->messages(), 'data' => null));
                    }
        $product_detail = Products::where('id', $request->product_id)->first();
        if (count($product_detail) > 0) {
            if ($request->on_wishlist == 0) {
                Wishlist::where('product_id', $request->product_id)->where('user_id', $user->id)->delete();
                $msg = "Product removed on wishlist successfully.";
                $code = SUCCESS;
            } else {
                Wishlist::where('product_id', $request->product_id)->where('user_id', $user->id)->delete();
                $add_on_wishlist = new Wishlist;
                $add_on_wishlist->product_id = $request->product_id;
                $add_on_wishlist->user_id = $user->id;
                $add_on_wishlist->save();
                $msg = "Product added on wishlist successfully.";
                $code = SUCCESS;
            }
        }

        return Response::json(array('code' => $code, 'msg' => $msg, 'data' => $response));
    }
    public function getProductDetail(Request $request) {
        $code = UNSUCCESS;
        $msg = "Product detail not found.";
        $total = $request->total;
        $skip = $request->skip;
        $response = array();
        $product_id = $request->product_id;
        $user = auth()->guard('api')->user();
        //print_r(Categories::all()->toArray());
        $product_detail = Products::where('id', $product_id)->with(['user_detail' => function($query) {
                        $query->select("id", "contact_number", "location", "body_type", "first_name", "last_name", "profile_picture", "profile_picture_custom_size", "firebase_id");
                    }, 'product_photos', 'product_user_reviews' => function($query) {
                        $query->orderBy('id', 'desc')->with(['user_detail' => function($query1) {
                                $query1->select("id", "first_name", "last_name", "profile_picture", "profile_picture_custom_size");
                            }]);
                    }])->first();

        $isRented=$product_detail->isRented(date('d/m/Y'),$product_detail->id) ;
        //echo $product_review_avg;

        $product_suggestions = Products::orderBy('products.id', 'desc')
                        ->leftjoin('users', 'products.user_id', '=', 'users.id')
                        ->where('products.id', '!=', $product_id)
                        ->where('products.user_id', '!=', Auth::check() ? Auth::user()->id : '')
                        ->where('users.body_type', Auth::check() ? Auth::user()->body_type : '')
                        ->whereNotIn('products.id', Rent::select('product_id')->where('user_id', Auth::check() ? Auth::user()->id : '')->where('status', '!=', 'Cart')->get())->take(6)->select("products.id")->get();

        if ($product_suggestions->first() == NULL) {
            $product_suggestions = Products::orderBy('products.id', 'desc')
                            ->leftjoin('users', 'products.user_id', '=', 'users.id')
                            ->where('products.id', '!=', $product_id)
                            ->where('products.user_id', '!=', Auth::check() ? Auth::user()->id : '')
                            ->whereNotIn('products.id', Rent::select('product_id')->where('user_id', Auth::check() ? Auth::user()->id : '')->where('status', '!=', 'Cart')->get())->select("products.id")->take(6)->get();
        }


        if (count($product_detail) > 0) {
            $msg = "Product detail found successfully.";
            $code = SUCCESS;
            $suggestion_product_ids = array_pluck($product_suggestions, 'id');

            $product_suggestions = Products::whereIn('id', $suggestion_product_ids)->with(['user_detail' => function($query) {
                            $query->select('id', 'first_name', 'last_name');
                        }])->get(array('id', 'user_id', 'name', 'price', 'picture'));

            //print_r($suggestion_product_ids);
            foreach ($product_suggestions as $key => $value) {
                if ($user) {
                    $check_on_wishlist_or_not = Wishlist::where('product_id', $value->id)->where('user_id', $user->id)->count();
                    $product_suggestions[$key]->on_wishlist = 0;
                    if ($check_on_wishlist_or_not > 0) {
                        $product_suggestions[$key]->on_wishlist = 1;
                    }
                } else {
                    $product_suggestions[$key]->on_wishlist = 0;
                }
                $product_review_avg = ProductUserReview::where('product_id', $value->id)->avg('rating');
                $product_review_avg = round($product_review_avg);
                $product_suggestions[$key]->avg_product_review = $product_review_avg;
                $product_suggestions[$key]->user_detail->last_name = substr($product_suggestions[$key]->user_detail->last_name, 0, 1);
            }
            $product_review_avg = ProductUserReview::where('product_id', $product_id)->avg('rating');
            $product_review_avg = round($product_review_avg);
            $product_detail->avg_product_review = $product_review_avg;
            $product_detail->product_suggestions = $product_suggestions;
            if ($user) {
                $check_on_wishlist_or_not = Wishlist::where('product_id', $product_id)->where('user_id', $user->id)->count();
                $product_detail->on_wishlist = 0;
                if ($check_on_wishlist_or_not > 0) {
                    $product_detail->on_wishlist = 1;
                }
            } else {
                $product_detail->on_wishlist = 0;
            }
            $product_detail->on_cart = "No";
            if ($user) {
                $on_cart = Rent::where('product_id', $product_id)->where('user_id', $user->id)->where('status', 'Cart')->first();
                if (count($on_cart) > 0) {
                    $product_detail->on_cart = "Yes";
                }
            }
            $this_item_on_rent = Rent::where('product_id', $product_id)->whereIn('status', array('Pending', 'Accepted', 'Payment Accepted'))->orderBy('id', 'desc')->first();
            if (count($this_item_on_rent) > 0) {
                //echo "here";
                //print_r($this_item_on_rent->toArray());exit;
                $product_detail->disabled_rental_start_date = date('Y/m/d', strtotime($this_item_on_rent->rental_start_date . "- 3 days"));
                $product_detail->disabled_rental_end_date = date('Y/m/d', strtotime($this_item_on_rent->rental_end_date . "+ 3 days"));
            } else {
                $product_detail->disabled_rental_start_date = date('Y/m/d', strtotime("- 3 days"));
                $product_detail->disabled_rental_end_date = date('Y/m/d', strtotime("-3 days"));
            }
            //$this_item_on_rent->rental_start_date = date('Y/m/d',strtotime($this_item_on_rent->rental_start_date));
            //$this_item_on_rent->rental_end_date = date('Y/m/d',strtotime($this_item_on_rent->rental_end_date));
            $product_detail = $product_detail->toArray();
            $product_detail = array_map(function($v) {
                return (is_null($v)) ? "" : $v;
            }, $product_detail);
            $product_detail['measurement_image'] = "user-interface/img/size_chart.png";
            $product_detail['user_detail']['body_type_image'] = "user-interface/img/body-type-new-" . $product_detail['user_detail']['body_type'] . ".png";
            $product_detail['isRented']=$isRented;
            $response['product_detail'] = $product_detail;
        }

        return Response::json(array('code' => $code, 'msg' => $msg, 'data' => $response));
    }

    public function getProfile(Request $request) {
        $code = SUCCESS;
        $msg = "User profile get successfully.";
        $user = auth()->guard('api')->user();
        $response['user_profile'] = $user;
        return Response::json(array('code' => $code, 'msg' => $msg, 'data' => (object) $response));
    }

    public function GetMessages(Request $request) {
        $code = SUCCESS;
        $msg = "User Messages get successfully.";
        $user = auth()->guard('api')->user();
        $messages = [];
        $extracted_messages = [];


        $rooms = Messages::where('to_user_id', $user->id)
                ->distinct()
                ->select('room_id')
                ->get();


        if (count($rooms)) {
            foreach ($rooms as $value) {
                $messages[] = Messages::where('room_id', $value->room_id)
                        ->where('to_user_id', $user->id)
                        ->orderBy("id", "desc")
                        ->take(1)
                        ->get(["id", "room_id", "content"]);
            }

            if (count($messages)) {
                foreach ($messages as $value) {
                    $extracted_messages[] = $value[0];
                }
            }
        }
        if (count($extracted_messages) > 0) {
            foreach ($extracted_messages as $key => $value) {
                $messages_data = Messages::getData2($value->id, $value->room_id, $user->id);
                //print_r($messages_data);
                $extracted_messages[$key]->time_duration = $messages_data->time_duration;
                $extracted_messages[$key]->first_name = $messages_data->users_data->users_information->first_name;
                $extracted_messages[$key]->last_name = $messages_data->users_data->users_information->last_name;
                $extracted_messages[$key]->profile_picture = $messages_data->users_data->users_information->profile_picture;
                $extracted_messages[$key]->profile_picture_custom_size = $messages_data->users_data->users_information->profile_picture_custom_size;


                //$extracted_messages[$key]->message_data =  $messages_data;
                //$extracted_messages[$key]->message_data =  $messages_data;
            }
        }
        $response['messages'] = $extracted_messages;


        return Response::json(array('code' => $code, 'msg' => $msg, 'data' => (object) $response));
    }

    public function GetMessagesDetails($room_id, Request $request) {
        $code = SUCCESS;
        $msg = "User Messages get successfully.";
        $user = auth()->guard('api')->user();
        $messages = [];
        $extracted_messages = [];
        $messages = Messages::where('room_id', $room_id)
                ->where('to_user_id', $user->id)
                ->orderBy('created_at', 'desc')
                ->take(3)
                ->get();
        if (count($messages) > 0) {
            $messages = collect([$messages])->collapse()->sortBy('created_at');

            foreach ($messages as $key => $val) {
                $message_data = Messages::getData($val->id);
                $extracted_messages[$key]->message_data = $message_data;
            }
        }

        $response['messages_detail'] = $extracted_messages;
        return Response::json(array('code' => $code, 'msg' => $msg, 'data' => (object) $response));
    }

    public function getCleanerList(Request $request) {
        $code = UNSUCCESS;
        $msg = "Clearner list not found.";
        $user = auth()->guard('api')->user();
        $response = array();
        $cleaner_list = Cleaner::orderBy('id', 'desc')->get();
        if (count($cleaner_list) > 0) {
            $code = SUCCESS;
            $msg = "Clearner list found successfully.";
            $response['clearner_list'] = $cleaner_list;
        }
        return Response::json(array('code' => $code, 'msg' => $msg, 'data' => (object) $response));
    }
    public function getConfig(Request $request)
    {
         $configuration = Configuration::find(1);
        $code =  SUCCESS;
        $msg = "Configurations."; 
        $response = array();
        unset($configuration->commision);
        unset($configuration->id);
        unset($configuration->paypal_account);
        unset($configuration->created_at);
        unset($configuration->updated_at);
        $configuration->social_media_links=unserialize ($configuration->social_media_links);
        $response['configuration']=$configuration;
        return Response::json(array('code' => $code, 'msg' => $msg, 'data' => (object) $response));
    }
}
