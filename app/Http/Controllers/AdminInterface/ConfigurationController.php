<?php

namespace App\Http\Controllers\AdminInterface;

use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Input;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\User;
use App\Models\Validators;
use App\Models\Configuration;

use Auth;

class ConfigurationController extends Controller{

    function getIndex()
    {
        $this->data['configuration'] = Configuration::find(1);
        $this->data['user']          = Auth::user();
        return view('admin-interface.configuration',$this->data);
    }

    function postGeneral(Request $request)
    {
        // Send all the request to validate
        $validator = Validators::backendValidate($request,"configuration_general");
        // Check the validator if there's no error
        if ($validator === true) {
            $config = Configuration::UpdateGeneral($request);
            $admin  = User::manageData($request,Auth::user()->id);
            return response()->json([
                                        "result"       => 'success',
                                        'picture'      => asset('/').$admin->profile_picture,
                                        'name'         => ucwords($admin->first_name.' '.$admin->last_name),
                                        'website_name' => $config->name
                                    ]);
        }
        return response()->json(["result" => 'failed', "errors" => $validator->errors()->messages()]);
    }

    function postSocialLinks(Request $request)
    {
        // Send all the request to validate
        $validator = Validators::backendValidate($request,"configuration_social_links");
        // Check the validator if there's no error
        if ($validator === true) {
            Configuration::UpdateSocialLinks($request);
            return response()->json(["result" => 'success']);
        }
        return response()->json(["result" => 'failed', "errors" => $validator->errors()->messages()]);
    }

    function postEmail(Request $request)
    {
        // Send all the request to validate
        $validator = Validators::backendValidate($request,"configuration_email");
        // Check the validator if there's no error
        if ($validator === true) {
            $admin = User::UpdateEmail($request,Auth::user()->id);
            return response()->json(["result" => 'success']);
        }
        return response()->json(["result" => 'failed', "errors" => $validator->errors()->messages()]);
    }

    function postPassword(Request $request)
    {
        // Send all the request to validate
        $validator = Validators::backendValidate($request,"configuration_password");
        // Check the validator if there's no error
        if ($validator === true) {
            $admin = User::updateCredentials($request,Auth::user()->id);
            return response()->json(["result" => 'success']);
        }
        return response()->json(["result" => 'failed', "errors" => $validator->errors()->messages()]);
    }

    function postApiKeys(Request $request)
    {

        // Send all the request to validate
//        $validator = Validators::backendValidate($request,"configuration_api_keys");
        // Check the validator if there's no error
//        if ($validator === true) {
        Configuration::updatePaypalAccount($request);
        return response()->json(["result" => 'success']);
//        }
        return response()->json(["result" => 'failed', "errors" => $validator->errors()->messages()]);
    }

}