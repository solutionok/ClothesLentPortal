<?php

namespace App\Http\Controllers\AdminInterface;

use App\models\Notification\Notification;
use App\Models\ProductUserReview;
use App\models\Rent\Rent;
use App\models\Rent\RentTransactionDetail;
use App\models\Wishlist\Wishlist;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Models\Validators;
use App\Models\Helper;
use App\Models\Categories;
use App\Models\Products\ProductCategories;
use App\Models\Products\Products;
use Response;

use Crypt;

class ProductManagementController extends Controller{

    function __construct()
    {
        $this->data['categories'] = Categories::where('status',1)
                                            ->orderBy('name','asc')
                                            ->get();
        // Extend the constructor from the main controller
        parent::__construct();
    }

    function getIndex(Request $req)
    {

        $this->data['deleted'] = false;
        $deleted = 0;
        if($req->has('deleted')) {
           $req->input('deleted');
            $this->data['deleted'] = true;
            $deleted = 1;
        }

        $this->data['products'] = Products::orderBy('created_at', 'desc')->where('is_deleted', $deleted)->get();
    	return view('admin-interface.product-management.index',$this->data);
    }

    function getEdit($id)
    {
        $product = Products::find(Crypt::decrypt($id));
        if (!empty($product)) {
            $this->data['product_data'] = Products::getData($product->id);
            $this->data['label']        = 'Edit';
            return view('admin-interface.product-management.manage',$this->data);
        } return back();
    }

    function postSave(Request $request)
    {
        // Send all the request to validate
        $validator = Validators::backendValidate($request,"products_save");
        // Check the validator if there's no error
        if ($validator === true) {
            //echo "<pre>";
            //print_r($request->all());exit;
            $product_id = $request->id;
            $product_detail = Products::where('id',$product_id)->first();

            $product = Products::manageData($request,$product_detail->user_id);
            ProductCategories::addData($product->id,$request);
            if ($request->has('id')) {
                Helper::flashMessage('Good Job!','Product has been updated.','success');
            } else {
                Helper::flashMessage('Good Job!','Product has been added.','success');
            }
            return back();
        }
        return back()->withErrors($validator)->withInput();
    }

    function getDelete($id)
    {

        $productID = Crypt::decrypt($id);
        $product = Products::find($productID);
        if (!empty($product)) {

            $product_rented = Rent::where('product_id',$productID)->count();
            $product_review = ProductUserReview::where('product_id',$productID)->count();
            $product_wishlist = Wishlist::where('product_id',$productID)->count();
            $product_notification = Notification::where('rent_id',$productID)->count();

            Helper::flashMessage('Good Job!','Product has been deleted.','success');

            if($product_rented==0 && $product_review==0 && $product_wishlist==0 && $product_notification==0) {

                Helper::deleteFile($product->picture,'products');
                $product->delete();
                return back();

            }

            $product->is_deleted = 1;
            $product->save();

        }
        return back();
    }

    function getProductDetail (Request $req) {

        $productID = $req->input('product_id');
        $senderFID = $req->input('sender_firebase_id');
        $receiverFID = $req->input('receiver_firebase_id');

        $senderID = User::where('firebase_id', $senderFID)->first()->id;
        $receiverID = User::where('firebase_id', $receiverFID)->first()->id;

        $status = true;
        $detail = RentTransactionDetail::where('user_id', $receiverID)->where('product_id', $productID)->first();

        if (!$detail) {
            $detail = RentTransactionDetail::where('user_id', $senderID)->where('product_id', $productID)->first();
            if (!$detail) {
                $status = false;
            }
        }

        return Response::json(compact('status'));


    }


    function getProfile(Request $req) {

        $senderFID = $req->input('sender_firebase_id');
        $receiverFID = $req->input('receiver_firebase_id');

        $user = User::where('firebase_id', $senderFID)->first();
        if($user && $user->id === Auth::user()->id) {
            $user = User::where('firebase_id', $receiverFID)->first();
        }

        if($user) {
        return Response::json(['userName'=> $user->first_name . ' ' . $user->last_name, 'picture'=> $user->profile_picture]);
        }

        return Response::json(['userName'=> "Not Found", 'picture'=> "Not Found"]);


    }


}