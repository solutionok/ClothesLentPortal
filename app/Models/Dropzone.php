<?php

namespace App\Models;
use App\Models\Products\ProductPhotos;
use Illuminate\Database\Eloquent\Model;

use App\Models\Helper;

use File;

class Dropzone extends Model{

    protected $table = 'dropzone';

    public static function addData($request)
    {
        $data             = new self;
        $data->ip         = $request->ip;
        $data->label_name = $request->label;
        // Upload files holds custom old file, custom file size, old file, field name, request, first folder, second folder and third folder
        $path = Helper::uploadFile($data->file,200,$data->file,'file',$request,'dropzone',$request->label,$request->ip);
        $data->file = str_replace('custom_size', 'dropzone/'.$request->label.'/'.$request->ip, $path['custom_size_path']);
        $data->size = $request->file('file')->getClientSize();
        $data->rotate = $path['rotate'];
        $data->save();
        return $data;
    }
public static function addData64($request)
    {
        $data             = new self;
        $data->ip         = $request->ip;
        $data->label_name = $request->label; 
        // Upload files holds custom old file, custom file size, old file, field name, request, first folder, second folder and third folder
        $path = Helper::uploadBase64($request->file,$data->file,200,$data->file,'file',$request,'dropzone',$request->label,$request->ip);
       // var_dump($path);die();
        $data->file = str_replace('custom_size', 'dropzone/'.$request->label.'/'.$request->ip, $path['custom_size_path']);
        $data->size = filesize($path['new_path']);
        $data->save();
        return $data;
    }
    public static function deleteData($request)
    {
        $file2 = str_replace('custom_size', 'dropzone/'.$request->label.'/'.$request->ip, $request->file);
        $name = substr(strrchr($request->file, '/'), 1);
        $file = '/uploads/dropzone/'.$request->label.'/'.$request->ip . '/' . $name;

//        echo $request->ip . ' ' . $request->label . ' ' . $file;exit;

        $data = self::where('ip',$request->ip)
                    ->where('label_name',$request->label)
                    ->where('file',$file)
                    ->first();


        $data2 = ProductPhotos::where('sub_photo',$file2)
            ->first();

        if($data2) {
            $path = public_path().$file2;
            File::delete($path); // Delete the file
            $data = ProductPhotos::find($data2->id); // Delete the data
            $data->delete();
        }

        if($data){
	        if (count($data)) {
		        $path = public_path().$file;
		        File::delete($path); // Delete the file
		        $data = self::find($data->id); // Delete the data
                $data->delete();
	        } else {
		        $file = str_replace('uploads', '/uploads/dropzone', $request->file);
		        $data = self::where('ip',$request->ip)
		                    ->where('label_name',$request->label)
		                    ->where('file',$file)
		                    ->first();
		        $path = public_path().$file;
		        File::delete($path); // Delete the file
		        self::find($data->id)->delete(); // Delete the data
	        }
        }

    }

    public static function deleteSessionData($ip)
    {
        // Delete all the data from dropzone
        $data = self::where('ip',$ip)->get();
        if (!empty($data)) {
            foreach ($data as $value) {
                $path = public_path().'/uploads/dropzone/'.$value->label_name.'/'.$ip.'/';
                $old  = public_path().'/'.$value->file;
                file_exists($old) ? File::delete($old) : '';
            }
            self::where('ip',$ip)->delete();
        }   
    }

    public static function addDataCustom($ip,$label_name,$file,$size)
    {
        $dropzone_path = public_path().'/uploads/dropzone/';
        if (!File::exists($dropzone_path)) {
            // Create a directory path
            File::makeDirectory($dropzone_path);
        }
        $item_path = public_path().'/uploads/dropzone/items/';
        if (!File::exists($item_path)) {
            // Create a directory path
            File::makeDirectory($item_path);
        }
        // Save the data --------------
        $data             = new self;
        $data->ip         = $ip;
        $data->label_name = $label_name;
        $search_replace   = 'uploads/';
        $post_file_name   = str_replace($search_replace,'',$file);
        $data->file       = '/uploads/dropzone/'.$post_file_name;
        // Copy the image --------------
        $old_path = public_path().'/'.$file;
        $data_string = explode("/",$data->file);
        $ip_path = public_path().'/uploads/dropzone/items/'.$ip;
        if (!File::exists($ip_path)) {
            // Create a directory path
            File::makeDirectory($ip_path);
        }
        // Transfer the image
        if (File::exists($old_path)) {
            copy($old_path, public_path() . $data->file);
        }
        $data->size = $size;
        $data->save();
        return $data->id;
    }

}