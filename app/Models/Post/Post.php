<?php

namespace App\models\Post;

use Illuminate\Database\Eloquent\Model;
use App\Http\Requests;
use DB;
use Auth;

class Post extends Model
{
	 protected $table = 'products';
	
	$user_id = Auth::user()->id;

    public static function addData($name)
    {       
        db::table('products')->insert( 
		['user_id' => $user_id, 'name' => $name,'description' => '','price' => '','color' => '','size' => '','season' => '','picture' => '','seo_url' => '']
		);
        return 'done';
    }

}
