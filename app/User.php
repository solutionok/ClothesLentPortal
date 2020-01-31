<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\Mail;

use App\Notifications\ForgotPassword;
use App\Models\Helper;
use App\Models\Configuration;
use App\Models\Blog\Blog;

use Hash;
use DB;
use Crypt;
use Auth;

class User extends Authenticatable
{
    use Notifiable;

    protected $fillable = [
        'first_name','last_name','email','password', 'is_deleted'
    ];

    protected $hidden = [
        'password','crypted_password','remember_token',
    ];

    public function isAdmin()
    {
        return $this->privilege == 0 ? true : false;
    }

    // public static function getData($id='none')
    // {
    //     if ($id != 'none') {
    //         // Get user data
    //         $data['self_data'] = self::find($id);
    //         if (!empty($data['self_data'])) {
    //             $data['display_name']  = self::displayName($data['self_data']->id);
    //             $data['time_duration'] = Helper::timeDuration($data['self_data']->created_at);
    //         }
    //     }
    //     return (object) $data;
    // }

    public static function getData($id)
    {
        $data                      = [];
        $data['users_information'] = self::find($id);
        if (!empty($data['users_information'])) {
            $country = DB::table('countries')
                            ->where('Code2',$data['users_information']->country)
                            ->first();
            if (!empty($country)) {
                // Get the exact address
                $data['address'] = $data['users_information']->address.' '.
                                   strtoupper($data['users_information']->state).' '.
                                   $country->Name;
                $data['country'] = $country->Name;
            } else {
                // Get the exact address
                $data['address'] = $data['users_information']->address.' '.
                                   strtoupper($data['users_information']->state);
                $data['country'] = '';
            }
            // $data['skills'] = UsersSkill::where('user_id',$data['users_information']->id)->get();
        }
        return (object) $data;
    } 
    
     public static function getData2($id)
    {
        $data                      = [];
        $data['users_information'] = self::select(["first_name","last_name","profile_picture"])->find($id);
        if (!empty($data['users_information'])) {
            $country = DB::table('countries')
                            ->where('Code2',$data['users_information']->country)
                            ->first();
            if (!empty($country)) {
                // Get the exact address
                $data['address'] = $data['users_information']->address.' '.
                                   strtoupper($data['users_information']->state).' '.
                                   $country->Name;
                $data['country'] = $country->Name;
            } else {
                // Get the exact address
                $data['address'] = $data['users_information']->address.' '.
                                   strtoupper($data['users_information']->state);
                $data['country'] = '';
            }
            // $data['skills'] = UsersSkill::where('user_id',$data['users_information']->id)->get();
        }
        return (object) $data;
    } 

    public static function manageData($request,$id=0)
    {
        $data = self::findOrNew($id);
        if ($request->has('first_name')) {
            $data->first_name = $request->first_name;
        }
        if ($request->has('last_name')) {
            $data->last_name  = $request->last_name;
        }

        if ($request->has('paypal_email_address')) {
            $data->paypal_email_address= $request->paypal_email_address;
        } else {
            $data->paypal_email_address= '';
        }
        // For new user
        if ($id == 0) {
        	$data->email                       = $request->email;
        	$data->verify_paypal_email	   = 0;
        	$data->password                    = Hash::make($request->password);
        	$data->crypted_password            = Crypt::encrypt($request->password);
        	$data->api_token		   = str_random(200);
        	$data->verification_code           = rand(100000,1000000);
            $data->profile_picture             = 'uploads/others/no_avatar.jpg';
        	$data->profile_picture_custom_size = 'uploads/others/no_avatar.jpg';
            $data->status                      = 0;
            
            // Check if the authentication is an admin
            if (Auth::check()) {
                if (Auth::user()->privilege == 0) {
                    $data->status = 1;
                }
            }
        // For updating a user
        } else {
        	if ($request->hasFile('profile_picture')) {
	            // Upload files holds custom old file, custom file size, old file, field name, request, first folder and second folder
	            $path = Helper::uploadFile($data->profile_picture_custom_size,200,$data->profile_picture,'profile_picture',$request,'profile_picture',$data->id);
                $data->profile_picture             = $path['new_path'];
                $data->profile_picture_custom_size = $path['custom_size_path'];
	        }
            if (Auth::user()->id == $id) { // If admin update it's own
                if (!$request->has('first_name')) {
                    $data->first_name = NULL;
                }
                if (!$request->has('last_name')) {
                    $data->last_name  = NULL;
                }
            }
        }
        if ($request->has('privilege')) {
            $data->privilege = $request->privilege;
        }
        if ($request->has('username')) {
            $data->username = $request->username;
        } elseif (!$request->has('latitude')) {
            $data->username = NULL;
        }
        if ($request->has('body_type')) {
            $data->body_type = $request->body_type;
        }
        if ($request->has('contact_number')) {
            $data->contact_number = $request->contact_number;
        }
        if ($request->has('location')) {
            $data->location = $request->location;
        }
        if ($request->has('country')) {
            $data->country = $request->country;
        }
        if ($request->has('birthday')) {
            $data->birthday = date('Y-m-d', strtotime($request->birthday));
        }
        if ($request->has('size')) {
            $data->size = $request->size;
        }
        if ($request->has('height')) {
            $data->height = $request->height;
        }
        if ($request->has('breast')) {
            $data->breast = $request->breast;
        }
        if ($request->has('waist')) {
            $data->waist = $request->waist;
        }
        if ($request->has('hips')) {
            $data->hips = $request->hips;
        }
        /*if ($request->has('shipping_fee_local')) {
            $data->shipping_fee_local = $request->shipping_fee_local;
        }
        if ($request->has('shipping_fee_nationwide')) {
            $data->shipping_fee_nationwide = $request->shipping_fee_nationwide;
        }*/
        if ($request->has('longitude')) {
            $data->longitude = $request->longitude;
        }
        if ($request->has('latitude')) {
            $data->latitude = $request->latitude;
        } 
        $data->save();
        return $data;       
    }

    public static function updateCredentials($request,$id)
    {
        $data = self::find($id);
        if ($request->has('email')) {
            $data->email = $request->email;
        }
        if ($request->has('password')) {
            $data->password         = Hash::make($request->password);
            $data->crypted_password = Crypt::encrypt($request->password);
        }
        $data->save();
        return $data;
    }

    public static function updateEmail($request,$id)
    {
        $data        = self::find($id);
        $data->email = $request->email;
        $data->save();
        return $data;
    }

    public static function forgotPassword($request)
    {
        $user          = self::where('email',$request->email)->first();
        $configuration = Configuration::find(1);
        if (!empty($user)) {
            if ($user->password == NULL) {
                return 'social media';
            }
            $token = session()->get('_token');
            DB::table('password_resets')->insert([
                'email'      => $request->email,
                'token'      => $token,
                'created_at' => date('Y-m-d H:i:s')
            ]);
            // Send a password reset link

            if ($user->privilege == 0) {
                $reset_link = URL('/admin/reset-password?token='.$token);
            } else {
                $reset_link = URL('reset-password?token='.$token);
            }


            $data['title']   = 'Good day!';
            $data['message'] = 'Seems you forgot your password. <br><br> Click the button to reset your password.';
            $data['url'] = $reset_link;
            $data['button'] = "Reset Password";
            $data['name'] = $configuration->name;

            $subject = $configuration->name . " Reset Password";
            $from    = "info@rentsuit.com";
            $to      = $user->email;

            Mail::send('emails.registration', compact('data'), function ($m) use ($from, $to, $subject) {
                $m->to($to)->subject($subject);
                $m->from($from);
            });

//            $user->notify(new ForgotPassword($user,$configuration,$token));
            return 'true';
        } return 'false';
    }

    public static function resetPassword($request)
    {
        $data = self::find(Crypt::decrypt($request->id));
        if (!empty($data)) {
            $data->password         = Hash::make($request->new_password);
            $data->crypted_password = Crypt::encrypt($request->new_password);
            $data->save();
            return true;
        } return false;
    }

    public static function displayName($id)
    {
        $user_data = self::find($id);
        if ($user_data->first_name != NULL && $user_data->last_name != NULL) {
            $name = $user_data->first_name.' '.$user_data->last_name;
        } elseif ($user_data->first_name != NULL && $user_data->last_name == NULL) {
            $name = $user_data->first_name;
        } elseif ($user_data->first_name == NULL && $user_data->last_name != NULL) {
            $name = $user_data->last_name;
        } elseif ($user_data->username != NULL) {
            $name = $user_data->username;
        } else {
            $name = 'N/A';
        }
        return $name;
    }

    public static function deleteData($id)
    {
        $self_data = self::find($id);
        // Delete file holds old file and first folder
        Helper::deleteFile($self_data->profile_picture,'profile_picture');
        Helper::deleteFile($self_data->profile_picture_custom_size,'custom_size');
        $blog_data = Blog::where('user_id',$self_data->id)->get();
        $blog_data->each(function($value){
            // Delete file holds old file and first folder
            Helper::deleteFile($value->picture,'blog');
        });
        $self_data->delete();
    }

    public static function generateUsername($id)
    {
        $data = self::find($id);
        $exist_username = self::where('username',Helper::seoUrl($data->first_name.$data->last_name))->count();
        if ($exist_username == 1) {
            $not_exist = 0;
            foreach (range(1,1000) as $value) {
                $username = self::where('username',Helper::seoUrl($data->first_name.$data->last_name).'-'.$value)->count();
                if ($username == 0) {
                    $data->username = Helper::seoUrl($data->first_name.$data->last_name).'-'.$value;
                    break;
                }
            }
        } else {
            $data->username = Helper::seoUrl($data->first_name.$data->last_name);
        }
        $data->save();
    }

    public static function socialMediaData($request,$label)
    {
    	//echo "<pre>";
    	//print_r($request);exit;
        $data = new self;
        switch ($label) {
            case 'twitter':
                $data->twitter_id = $request->id;
                if (isset($request->name)) {
                   $data->first_name = explode(" ",$request->name)[0]; 
                }
                break;
            case 'facebook':
                $data->facebook_id = $request->id;
                break;
        }
        if (isset($request->email)) {
            //$email = self::where('email',$request->email)->count();
            //if ($email == 0) {
                $data->email = $request->email;
            //}
        }
        if (isset($request->user['first_name'])) {
           $data->first_name = $request->user['first_name']; 
        }
        if (isset($request->user['last_name'])) {
           $data->last_name = $request->user['last_name']; 
        }
        $data->profile_picture             = $request->getAvatar();
        $data->profile_picture_custom_size = $request->getAvatar();
        $data->status = 1;
        $data->save();
        return $data;
    }

}