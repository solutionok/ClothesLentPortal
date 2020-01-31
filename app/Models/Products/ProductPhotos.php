<?php

namespace App\Models\Products;
use Illuminate\Database\Eloquent\Model;

use App\Models\Helper;
use App\Models\Dropzone;

use File;

class ProductPhotos extends Model{

    protected $table = 'product_photos';

    public static function addData($product_id,$user_id,$type,$request = null)
    {
        $old_data = self::where('product_id',$product_id)->get();
        $old_data->each(function($value){
            File::delete(public_path().'/'.$value->sub_photo);
            self::find($value->id)->delete();
        });
        $files = Dropzone::where('ip',$user_id);
        
        	$photos_id = $request->sub_photos;
		$photos_id = explode(",",$photos_id);
		$files = $files->whereIn('id',$photos_id);
        
        $files = $files->get();
		//print_r($photos_id);
		//$request->sub_photos = $photos_id;
		//print_r($request->all());exit;
		
        
        //print_r($files);exit;
        foreach ($files as $value) {
            $old_path  = public_path().$value->file;
            $post_path = public_path().'/uploads/items';
            if (!File::exists($post_path)) {
                // Create a directory path
                File::makeDirectory($post_path);
            }
            $ip_path = public_path().'/uploads/items/'.$user_id;
            if (!File::exists($ip_path)) {
                // Create a directory path
                File::makeDirectory($ip_path);
            }
            $remove_name = 'uploads/dropzone/items/'.$user_id.'/';
            $new_name    = str_replace($remove_name, '', $value->file);
            // Set new path
            $new_path = $ip_path.$new_name;
            // Move images
            @rename($old_path, $new_path);
            $data = new self;
            $data->product_id = $product_id;
            $data->sub_photo  = 'uploads/items/'.$user_id.$new_name;
            $data->type       = $type;
            $data->size       = $value->size;
            $data->rotate     = $value->rotate;
            $data->save();
            // Delete the file on dropzone
            Dropzone::find($value->id)->delete();
        };
        Dropzone::where('ip',$user_id)->delete();
    }

    public static function deleteData($id)
    {
        $data = self::find($id);
        if ($data->type == 0) { // Image
            File::delete(public_path().'/'.$data->name);
        }
        $data->delete();
    }

}