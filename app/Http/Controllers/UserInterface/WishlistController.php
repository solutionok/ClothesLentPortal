<?php

namespace App\Http\Controllers\UserInterface;

use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Input;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Models\Helper;
use App\Models\Categories;
use App\Models\Pages\PageContent;
use App\Models\Wishlist\Wishlist;
use App\Models\Products\Products;
use App\Models\Rent\Rent;

use Auth;
use DB;
use Crypt;

class WishlistController extends Controller{

    function getIndex(Request $request) {
        $this->data['body_type'] = '';
        $this->data['size']      = '';
        $this->data['price']     = Products::max('price');
        $this->data['per']       = 1;
        $this->data['location']  = '';
        $this->data['height']    = '';
        $this->data['season']    = '';
        $this->data['category']  = '';

        if ($request->has('body_type')) {
            $this->data['body_type'] = $request->body_type;
        }
        if ($request->has('size')) {
            $this->data['size'] = $request->size;
        }
        if ($request->has('price')) {
            $this->data['price'] = $request->price;
        }
        if ($request->has('per')) {
            $this->per($request);
        }
        if ($request->has('location')) {
            $this->data['location'] = $request->location;
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
        $this->data['categories'] = Categories::where('status', 1)->get();
        $this->data['budget']     = $this->data['price'] / $this->data['per'];

        $this->data['wishlist'] = Wishlist::leftjoin('products', 'wishlist.product_id', '=', 'products.id')
//            ->groupBy('wishlist.id','products.id')->
//            ->leftjoin('product_categories','products.id','=','product_categories.product_id')
//            ->leftjoin('categories','product_categories.category_id','=','categories.id')
//            ->leftjoin('users','products.user_id','=','users.id')
//            ->where('categories.name', 'LIKE', '%' . $this->data['category'] . '%')
//            ->where('users.body_type', 'LIKE', '%' . $this->data['body_type'] . '%')
//            ->where('products.size', 'LIKE', '%' . $this->data['size'] . '%')
//            ->where('products.price', '<=', $this->data['budget'])
//            ->whereNotIn('products.id', Rent::select('product_id')->where('user_id', Auth::user()->id)->where('status', '!=', 'Cart')->where('status', '!=', 'Declined')->get())
//            ->where('users.location', 'LIKE', '%' . $this->data['location'] . '%')
//            ->where('users.height', 'LIKE', '%' . $this->data['height'] . '%')
//            ->where('products.season', 'LIKE', '%' . $this->data['season'] . '%')
            ->where('wishlist.user_id', '=', Auth::user()->id)
            ->select('wishlist.id as wishlistID', 'products.id as productID')
            ->orderBy('wishlist.id', 'desc')
            ->paginate(6);

        $this->data['page_content'] = PageContent::getData('none', 11);

        return view('user-interface.cart.wishlist.index', $this->data);
    }

    function per($request){
        switch ($request->per) {
            case 'per_day':
                $this->data['per'] = 1;
                break;
            case 'per_week':
                $this->data['per'] = 7;
                break;
            case 'per_month':
                $this->data['per'] = 30;
                break;
            default:
                $this->data['per'] = 1;
                break;
        }
    }

    function getAddWishlist(Request $request)
    {
        Helper::flashMessage('Great!','You added an item to your Wishlist.','success');
        Wishlist::manageData(Crypt::decrypt($request->product_id));

        return response()->json([ "result"  => 'success' ]);
    }

    function getDeleteWishlist(Request $request)
    {
        $wishlist_data = Wishlist::where('product_id', Crypt::decrypt($request->product_id))->where('user_id',  Auth::user()->id)->first();
        $data = $wishlist_data->id;
        Wishlist::deleteData($data);

        return response()->json([ "result"  => 'success' ]);
    }

}