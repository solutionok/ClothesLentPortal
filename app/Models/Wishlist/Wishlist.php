<?php

namespace App\models\Wishlist;

use Illuminate\Database\Eloquent\Model;

use Auth;
use App\Models\Products\Products;

class Wishlist extends Model
{
	protected $table = 'wishlist';

	public static function manageData($product_id)
    {
    	$data              = self::findOrNew(0);
        $data->user_id     = Auth::user()->id;
        $data->product_id  = $product_id;

        $data->save();
        return $data;
    }

    public static function deleteData($id)
    {
        $self_data = self::find($id);
        $self_data->delete();
    }
}
