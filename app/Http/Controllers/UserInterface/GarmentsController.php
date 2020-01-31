<?php

namespace App\Http\Controllers\UserInterface;

use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Input;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Models\Helper;
use App\Models\Categories;
use App\Models\Products\Products;
use App\Models\Products\ProductCategories;
use App\Models\Wishlist\Wishlist;
use App\Models\Rent\Rent;
use App\Models\Pages\PageContent;

use Crypt;
use Auth;
use DB;

class GarmentsController extends Controller{

    function getIndex(Request $request)
    {
    //echo phpinfo();exit;
    
    /*echo "<pre>";
    print_r($request->all());exit;*/
        $this->data['body_type']    =   '';
        $this->data['size']         =   '';
        $this->data['price']        =   Products::max('price');
        $this->data['per']          =   1;
        $this->data['location']     =   '';
        $this->data['designer']     =   '';
        $this->data['height']       =   '';
        $this->data['season']       =   '';
        $this->data['category']     =   '';
        
        $max_product_price = Products::max('price');
        if($max_product_price=="") {
        	$max_product_price = 1;
        }
        
        $this->data['max_product_price']        =   $max_product_price;
        
       
        $this->data['price1']        =   1;
        $this->data['price2']        =    $max_product_price; 
	
        if ($request->has('body_type'))     { $this->data['body_type']  = $request->body_type;  }
        if ($request->has('size'))          { $this->data['size']       = $request->size;       }
        if ($request->has('price1'))         { $this->data['price1']      = $request->price1;  }
        if ($request->has('price2'))         { $this->data['price2']      = $request->price2;  }
        if ($request->has('per'))           { $this->per($request);                             }
        if ($request->has('location'))      { $this->data['location']   = $request->location;   }
        if ($request->has('designer'))      { $this->data['designer']   = $request->designer;   }
        if ($request->has('height'))        { $this->data['height']     = $request->height;     }
        if ($request->has('season'))        { $this->data['season']     = $request->season;     }
        if ($request->has('category'))      { $this->data['category']   = $request->category;   }
	//echo $this->data['per'];exit;
	//echo $this->data['price'];exit;
        $this->data['budget']       =   $this->data['price'];
	//echo $this->data['budget'];exit;
	//print_r(Rent::select('product_id')->where('user_id', Auth::check() ? Auth::user()->id : '' ));exit;

	//echo "<pre>";
	//print_r($this->data);exit;
        $this->data['products'] = Products::groupBy('products.id', 'products.created_at')
                                            ->leftjoin('product_categories','products.id','=','product_categories.product_id')
                                            ->leftjoin('categories','product_categories.category_id','=','categories.id')
                                            ->leftjoin('users','products.user_id','=','users.id')
                                            ->whereNotIn('products.id', Rent::select('product_id')
                                            ->where('user_id', Auth::check() ? Auth::user()->id : '' )
                                            ->whereIn('status',array('Cart','Pending','Accepted'))->get())
                                            ->where('categories.name', 'LIKE', '%' . $this->data['category'] . '%')
                                            ->where('users.body_type', 'LIKE', '%' . $this->data['body_type'] . '%');
                                            if($this->data['size']!="") {
                                            $this->data['products'] = $this->data['products']->where('products.size',$this->data['size']);
                                            }
                                            $this->data['products'] = $this->data['products']->where('products.price', '>=', $this->data['price1'])
                                            ->where('products.price', '<=', $this->data['price2'])
                                            ->where('products.is_deleted', 0)
                                            ->where('users.location', 'LIKE', '%' . $this->data['location'] . '%')
                                            ->where('products.designer', 'LIKE', '%' . $this->data['designer'] . '%')
                                            ->where('users.height', 'LIKE', '%' . $this->data['height'] . '%')
                                            ->where('products.season', 'LIKE', '%' . $this->data['season'] . '%')
                                            ->select( 'products.id as productID' )
                                            ->orderBy('products.created_at', 'desc ')
                                            ->paginate(6);

        $this->data['page_content'] = PageContent::getData('none',3);
        $this->data['categories'] = Categories::where('status',1)->get();
        return view('user-interface.cart.garments.index',$this->data);
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

	function getSingle( $seo_url ) {

		$product_data          = Products::where( 'seo_url', $seo_url )->first();
		$this->data['product'] = Products::leftjoin( 'users', 'products.user_id', '=', 'users.id' )
		                                 ->where( 'seo_url', $seo_url )
		                                 ->where( 'products.is_deleted', 0 )
		                                 ->select(
			                                 'products.id as productID',
			                                 'products.picture as picture',
			                                 'products.name as name',
			                                 'products.color as color',
			                                 'products.size as size',
			                                 'products.description as description',
			                                 'products.season as season',
			                                 'products.price as price',
			                                 'products.retail_price as retail_price',
			                                 'products.designer as designer',
			                                 'products.created_at as createdAt',
			                                 'users.id as userID',
			                                 'users.profile_picture as profile_picture',
			                                 'users.first_name as first_name',
			                                 'users.last_name as last_name',
			                                 'users.location as location',
			                                 'users.contact_number as contact',
			                                 'users.body_type as body_type' )
		                                 ->first();

		$productID = $this->data['product']->productID;
		$catID     = ProductCategories::where( 'product_id', $productID )->first()->category_id;

		$this->data['product_data']      = Products::getData( $product_data->id );
		$this->data['max_product_price'] = Products::max( 'price' );
		$this->data['price1']            = 1;
		$this->data['price2']            = Products::max( 'price' );
		$this->data['suggestions']       = Products::orderBy( 'products.id', 'desc' )
		                                           ->leftjoin( 'users', 'products.user_id', '=', 'users.id' )
		                                           ->leftjoin( 'product_categories', 'products.id', '=', 'product_categories.product_id' )
		                                           ->where( 'product_categories.category_id', $catID )
		                                           ->where( 'products.is_deleted', 0 )
		                                           ->where( 'products.id', '!=', $this->data['product']->productID )
		                                           ->where( 'products.user_id', '!=', Auth::check() ? Auth::user()->id : '' )
		                                           ->where( 'users.body_type', Auth::check() ? Auth::user()->body_type : '' )
		                                           ->whereNotIn( 'products.id', Rent::select( 'product_id' )->where( 'user_id', Auth::check() ? Auth::user()->id : '' )->where( 'status', '!=', 'Cart' )->get() )
		                                           ->select(
			                                           'products.id as productID',
			                                           'users.id as userID' )
		                                           ->take( 6 )
		                                           ->get();

		if ( $this->data['suggestions']->first() == null ) {
			$this->data['suggestions'] = Products::orderBy( 'products.id', 'desc' )
			                                     ->leftjoin( 'users', 'products.user_id', '=', 'users.id' )
			                                     ->leftjoin( 'product_categories', 'products.id', '=', 'product_categories.product_id' )
			                                     ->where( 'product_categories.category_id', $catID )
			                                     ->where( 'products.is_deleted', 0 )
			                                     ->where( 'products.id', '!=', $this->data['product']->productID )
			                                     ->where( 'products.user_id', '!=', Auth::check() ? Auth::user()->id : '' )
			                                     ->whereNotIn( 'products.id', Rent::select( 'product_id' )->where( 'user_id', Auth::check() ? Auth::user()->id : '' )->where( 'status', '!=', 'Cart' )->get() )
			                                     ->select(
				                                     'products.id as productID',
				                                     'users.id as userID' )
			                                     ->take( 6 )
			                                     ->get();


			if ( count( $this->data['suggestions'] ) === 0 ) {
				$this->data['suggestions'] = Products::orderBy( 'products.id', 'desc' )
				                                     ->leftjoin( 'users', 'products.user_id', '=', 'users.id' )
				                                     ->where( 'products.id', '!=', $this->data['product']->productID )
				                                     ->where( 'products.is_deleted', 0 )
				                                     ->where( 'products.user_id', '!=', Auth::check() ? Auth::user()->id : '' )
				                                     ->whereNotIn( 'products.id', Rent::select( 'product_id' )->where( 'user_id', Auth::check() ? Auth::user()->id : '' )->where( 'status', '!=', 'Cart' )->get() )
				                                     ->select(
					                                     'products.id as productID',
					                                     'users.id as userID' )
				                                     ->take( 6 )
				                                     ->get();
			}
		}
		//echo "<pre>";
		//print_r($this->data);exit;

		$this_item_on_rent = Rent::where( 'product_id', $product_data->id )->whereNotIn( 'status', array(
			'Merchant Received',
			'Cart',
			'Declined',
            'Pending',
            'Canceled'
		) )->orderBy( 'id', 'desc' )->get();
//		echo "<pre>";
//		print_r($this_item_on_rent);exit;
		$this_item_on_rent_dates = "";
		if ( count( $this_item_on_rent ) > 0 ) {

		    foreach($this_item_on_rent as $booked_dates) {

                $booked_dates->rental_start_date = date( 'm/d/Y', strtotime( $booked_dates->rental_start_date . "- 3 days" ) );
                $booked_dates->rental_end_date   = date( 'm/d/Y', strtotime( $booked_dates->rental_end_date . "+ 3 days" ) );

                $date1 = date_create( $booked_dates->rental_start_date );
                $date2 = date_create( $booked_dates->rental_end_date );
                $diff  = date_diff( $date1, $date2 );

                if ( $diff->format( "%a" ) == 0 ) {
                    $this_item_on_rent_dates = "'" . $booked_dates->rental_start_date . "'";

                } else {

                    for ( $i = 0; $i <= $diff->format( "%a" ); $i ++ ) {
                        $date                    = date( 'm/d/Y', strtotime( $booked_dates->rental_start_date . "+" . $i . "day" ) );
                        $this_item_on_rent_dates .= "'" . $date . "',";
                    }

                    $this_item_on_rent_dates = rtrim( $this_item_on_rent_dates, "," );
                    $this_item_on_rent_dates = $this_item_on_rent_dates . ",";


                }

            }

        }
		if ( $this_item_on_rent_dates == "" ) {
			$date                    = date( 'm/d/Y', strtotime( "-0 day" ) );
			$this_item_on_rent_dates .= "'" . $date . "'";

		}

        $this_item_on_rent_dates = rtrim( $this_item_on_rent_dates, "," );
		$this->data['this_item_on_rent_dates'] = $this_item_on_rent_dates;

		$category                 = Categories::find( $catID )->name;
		$this->data['category']   = $category;
		$this->data['categories'] = Categories::where( 'status', 1 )->get();

//		return $this->data;
		return view( 'user-interface.cart.garments.single', $this->data );
	}

}