<?php

namespace App\Models\Products;

use Illuminate\Database\Eloquent\Model;

use App\Models\Helper;

use DB;
use Crypt;

class Products extends Model{

    protected $table = 'products';
    public function user_detail() {
    	return $this->hasOne('\App\User','id','user_id');
    }
    public function product_categories() {
    	return $this->hasMany('\App\Models\Products\ProductCategories','product_id','id');
    }
    public function product_photos() {
    	return $this->hasMany('\App\Models\Products\ProductPhotos','product_id','id');
    }
    
    public function product_user_reviews() {
    	return $this->hasMany('\App\Models\ProductUserReview','product_id','id');
    }
    public static function manageData($request,$user_id)
    {
        $id                = $request->has('id') ? $request->id : 0;
        $data              = self::findOrNew($id);
        $data->user_id     = $user_id;
        $data->name        = $request->name;
        $data->description = $request->description;
        $data->price       = $request->price;
        $data->retail_price = $request->retail_price;
        //$data->price_week       = $request->price_week;
        $data->color       = $request->color;
        $data->size        = $request->size;
        $data->season      = $request->season;
        $data->designer    = $request->designer;
        $data->cancellation = $request->cancellation;
        $data->alteration   = $request->alteration;
        if($request->cleanPrice) {
            $data->cleaning_price = $request->cleaning_price;
        }
        $data->condition    = $request->condition;
        //if($request->hasFile('picture')){
        if(isset($request->picture) && $request->picture!=''){
            // Upload files holds custom old file, custom file size, old file, field name, request, and first folder
            $path = Helper::uploadFile('none','none',$data->picture,'picture',$request,'products');
            $data->picture = $path['new_path'];
            //echo $path['new_path'];
        } elseif(!$request->has('id')) {
            $data->picture = 'uploads/others/no_image.jpg';
        }
        if ($request->has('id')) {
            $exist_url = self::where('id','!=',$request->id)
                            ->where('seo_url',Helper::seoUrl($request->name))
                            ->count();
        } else {
            $exist_url = self::where('seo_url',Helper::seoUrl($request->name))->count();
        }
        if ($exist_url == 1) {
            $not_exist = 0;
            foreach (range(1,1000) as $value) {
                if ($request->has('id')) {
                    $url = self::where('id','!=',$request->id)
                                ->where('seo_url',Helper::seoUrl($request->name).'-'.$value)
                                ->count();
                } else {
                    $url = self::where('seo_url',Helper::seoUrl($request->name).'-'.$value)->count();
                }
                if ($url == 0) {
                    $data->seo_url = Helper::seoUrl($request->name).'-'.$value;
                    break;
                }
            }
        } else {
            $data->seo_url = Helper::seoUrl($request->name);
        }
        $data->save();
        return $data;
    }
  public static function manageData64($request,$user_id)
    {
        $id                = $request->has('id') ? $request->id : 0;
        $data              = self::findOrNew($id);
        $data->user_id     = $user_id;
        $data->name        = $request->name;
        $data->description = $request->description;
        $data->price       = $request->price;
        $data->retail_price = $request->retail_price;
        //$data->price_week       = $request->price_week;
        $data->color       = $request->color;
        $data->size        = $request->size;
        $data->season      = $request->season;
        $data->designer    = $request->designer;
        $data->cancellation = $request->cancellation;
        $data->alteration   = $request->alteration;
        if($request->cleanPrice) {
            $data->cleaning_price = $request->cleaning_price;
        }
        $data->condition    = $request->condition;
        //if($request->hasFile('picture')){
        if(isset($request->picture) && $request->picture!=''){
            // Upload files holds custom old file, custom file size, old file, field name, request, and first folder
            
            $path = Helper::uploadBase64($request->picture,'none','none',$data->picture,'picture',$request,'products');
            
           // $path = Helper::uploadFile('none','none',$data->picture,'picture',$request,'products');
            $data->picture = $path['new_path'];
            //echo $path['new_path'];
        } elseif(!$request->has('id')) {
            $data->picture = 'uploads/others/no_image.jpg';
        }
        if ($request->has('id')) {
            $exist_url = self::where('id','!=',$request->id)
                            ->where('seo_url',Helper::seoUrl($request->name))
                            ->count();
        } else {
            $exist_url = self::where('seo_url',Helper::seoUrl($request->name))->count();
        }
        if ($exist_url == 1) {
            $not_exist = 0;
            foreach (range(1,1000) as $value) {
                if ($request->has('id')) {
                    $url = self::where('id','!=',$request->id)
                                ->where('seo_url',Helper::seoUrl($request->name).'-'.$value)
                                ->count();
                } else {
                    $url = self::where('seo_url',Helper::seoUrl($request->name).'-'.$value)->count();
                }
                if ($url == 0) {
                    $data->seo_url = Helper::seoUrl($request->name).'-'.$value;
                    break;
                }
            }
        } else {
            $data->seo_url = Helper::seoUrl($request->name);
        }
        $data->save();
        return $data;
    }
    public static function getData($id='none')
    {
        if ($id != 'none') {
            // Get product data
            $data['self_data'] = self::find($id);
            if (!empty($data['self_data'])) {
                $data['categories'] = db::table('categories')
                                        ->join('product_categories','categories.id','=','product_categories.category_id')
                                        ->where('categories.status',1)
                                        ->where('product_categories.product_id',$data['self_data']->id)
                                        ->orderBy('categories.name','asc')
                                        ->get();

                $data['sub_photo'] = db::table('product_photos')
                                        ->where('product_id', $id)
                                        ->get();

                $data['sub_photos'] = ProductPhotos::where('product_id',$data['self_data']->id)->orderBy('created_at','desc')->get();

                $data['availability'] = db::table('rent_details')
                                            ->where('product_id', $id)
                                            ->where('status', '!=', 'Pending')
                                            ->where('status', '!=', 'Cart')
                                            ->get();

            }
        }
        return (object) $data;
    }

    public static function deleteData($id)
    {
        $self_data = self::find($id);
        $self_data->delete();
    }

    public function rent_details () {
        return $this->hasMany('\App\Models\Rent\Rent','product_id','id');
    }
public function isRented($date,$id )
{
    
  $data  = db::table('rent_details')
                                            ->where('product_id', $id)
                                            ->where('status', '=', 'Accepted')
                                            ->where('rental_start_date', '>=', $date)
                                            ->where('rental_end_date', '<=', $date)
                                            ->get();
  return count($data) > 0;
}
}