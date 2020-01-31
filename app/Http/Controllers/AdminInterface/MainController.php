<?php

namespace App\Http\Controllers\AdminInterface;

use App\Models\Products\Products;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Input;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\User;
use App\Models\Validators;
use App\Models\Helper;

use DB;
use Crypt;
use Carbon\Carbon;

use Auth;

class MainController extends Controller{

    function getIndex()
    {
        if (Auth::check()) {
            if (Auth::user()->isAdmin()) {
                return view('admin-interface.dashboard');
            }
        }
        return view('admin-interface.login');
    }

    function postLogin(Request $request)
    {
        // Send all the request to validate
        $validator = Validators::backendValidate($request,"login");
        // Check the validator if there's no error
        //$validator=true;
        if ($validator == true ) {
            if (Auth::attempt(['email' => $request->email, 'password' => $request->password, 'privilege' => 0, 'status' => 1])){
                if ($request->has('uri')) {
                    return redirect($request->uri);
                } return redirect('admin');
            } else {
                
                Helper::flashMessage('Action failed','Incorrect credentials.','error');
                return back();
                //return redirect($request->uri);
                //return redirect('admin');
            }
        }
        return back()->withErrors($validator)->withInput();
    }

    function getForgotPassword()
    {
        if (Auth::check()) {
            if (Auth::user()->isAdmin()) {
                return back();
            }
        } return view('admin-interface.forgot-password');
    }

    function postForgotPassword(Request $request)
    {
        // Send all the request to validate
        $validator = Validators::backendValidate($request,"forgot_password");
        // Check the validator if there's no error
        if ($validator === true) {
            $success = User::forgotPassword($request);
            if ($success) {
                Helper::flashMessage('Good Job!','Password has been sent to your registered email address.','success');
            } else {
                Helper::flashMessage('Action failed','Something went wrong. please check your internet connection or check your input.','error');
            }
            return back();
        }
        return back()->withErrors($validator)->withInput();
    }

    function getResetPassword(Request $request)
    {
        if (Auth::check()) {
            if (Auth::user()->isAdmin()) {
                return back();
            }
        }
        $token = DB::table('password_resets')
                    ->where('token',$request->token)
                    ->where('created_at','>',Carbon::now()->subHours(2)) // Set 2 hours expiration
                    ->first();
        // Check if the token exist
        if (!empty($token)) {
            $user_data = User::where('email',$token->email)
                            ->first();
            if (!empty($user_data)) {
                $this->data['id'] = Crypt::encrypt($user_data->id);
                return view('admin-interface.reset-password',$this->data);
            }
        }
        Helper::flashMessage('Action failed','The token has expired.','error');
        return redirect('admin');
    }

    function postResetPassword(Request $request)
    {
        // Send all the request to validate
        $validator = Validators::backendValidate($request,"reset_password");
        // Check the validator if there's no error
        if ($validator === true) {
            $success = User::updateCredentials($request,Crypt::decrypt($request->id));
            if ($success) {
                Helper::flashMessage('Good Job!','Password has been changed.','success');
                return redirect('admin');
            } else {
                Helper::flashMessage('Action failed','Something went wrong. please check your internet connection or check your input.','error');
            }
        }
        return back()->withErrors($validator);
    }

    function getStats () {

        $loggedInUsers = count(User::all())-1 > 0 ? count(User::all())-1 : 0;

        $this->data['loggedInUsers'] = $loggedInUsers;

        return view('admin-interface.statistics.statistics',$this->data);

    }

    function getProductsStats () {

        $products = Products::has('rent_details')->with("rent_details")->get();

        foreach ($products as $product) {
            $product->orders = count($product->rent_details);
        }

        array_multisort(array_column($products->toArray(), 'orders'), SORT_DESC, $products->toArray());
        $this->data['products'] = $products;

        return view('admin-interface.statistics.products-stats',$this->data);

    }

}