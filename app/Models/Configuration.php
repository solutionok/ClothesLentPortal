<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;

use App\Models\Helper;

use Mail;

class Configuration extends Model{

    protected $table = 'configuration';

    public static function updateGeneral($request)
    {
        $data        = self::find(1);
        $data->name  = $request->website_name;
        $data->email = $request->website_email;
        if($request->hasFile('website_logo')){
            // Upload files holds custom old file, custom file size, old file, field name, request, and first folder
            $path = Helper::uploadFile('none','none',$data->logo,'website_logo',$request,'others');
            $data->logo = $path['new_path'];
        }
        if($request->hasFile('website_logo_footer')){
            // Upload files holds custom old file, custom file size, old file, field name, request, and first folder
            $path = Helper::uploadFile('none','none',$data->logo_footer,'website_logo_footer',$request,'others');
            $data->logo_footer = $path['new_path'];
        }
        $data->copyright    = $request->copyright;
        $data->phone_number = $request->phone_number;
        $data->commision = $request->commision;
        
        $data->save();
        return $data;
    }

    public static function updateSocialLinks($request)
    {
        $social_links = [
                            'facebook'  => $request->facebook_link,
                            'instagram' => $request->instagram_link,
                            'twitter'   => $request->twitter_link
                        ];
        $data = self::find(1);
        $data->social_media_links = serialize($social_links);
        $data->save();
    }

    public static function updatePaypalAccount($request)
    {
        $data = self::find(1);
        $data->paypal_client_id = $request->paypal_client_id;
        $data->paypal_client_secret = $request->paypal_client_secret;
        $data->paypal_live_client_id = $request->paypal_live_client_id;
        $data->paypal_live_client_secret = $request->paypal_live_client_secret;
        $data->paypal_mode = $request->paypal_mode;
        $data->save();
    }

    public static function contactUs($request)
    {
        $configuration = self::find(1);
        // Send the concern to the admin
        Mail::send(
                    'emails.contact-us', // The page of the email
                    [
                        'request'       => $request,
                        'configuration' => $configuration
                    ],
                    function($message) use ($configuration,$request)
                    {
                        $message->to($configuration->email);
                        $message->subject($configuration->name.': '.$request->subject);
                        $message->from($request->email_address);
                    }
        );
    }

}