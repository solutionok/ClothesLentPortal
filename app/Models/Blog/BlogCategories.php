<?php

namespace App\Models\Blog;

use Illuminate\Database\Eloquent\Model;

use Crypt;

class BlogCategories extends Model{

    protected $table = 'blog_categories';

    public static function addData($id,$request)
    {
    	// Delete the old crategories
        $old_categories = self::where('blog_id',$id)->get();
        $old_categories->each->delete();
       	// Add the new categories
        foreach ($request->categories as $value) {
        	$data              = new self;
        	$data->blog_id     = $id;
        	$data->category_id = Crypt::decrypt($value);
        	$data->save();
        }
    }

}