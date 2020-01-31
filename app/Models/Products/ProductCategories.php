<?php

namespace App\Models\Products;

use Illuminate\Database\Eloquent\Model;

use Crypt;

class ProductCategories extends Model{

    protected $table = 'product_categories';

    public static function addData($id,$request)
    {
    	// Delete the old crategories
        $old_categories = self::where('product_id',$id)->get();
        $old_categories->each->delete();
       	// Add the new categories
        //foreach ($request->categories as $value) {
        //echo $request->categories;exit;
        	$data              = new self;
        	$data->product_id  = $id;
        	$data->category_id = $request->categories;
        	$data->save();
        //}
    }

    public static function deleteData($id)
    {
        //$self_data = self::find($id);
        //$self_data->delete();
        $old_categories = self::where('product_id',$id)->get();
        $old_categories->each->delete();
    }      

}