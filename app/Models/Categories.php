<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use App\Models\Helper;

use Crypt;

class Categories extends Model{

    protected $table = 'categories';

    public static function manageData($request)
    {
        $id           = $request->has('id') ? Crypt::decrypt($request->id) : 0;
        $data         = self::findOrNew($id);
        $data->name   = $request->name;
        $data->status = $request->status;
        $data->shipping_fee_local = $request->shipping_fee_local;
        $data->shipping_fee_nationwide = $request->shipping_fee_nationwide;
        if($request->hasFile('picture')){
            // Upload files holds custom old file, custom file size, old file, field name, request, and first folder
            $path = Helper::uploadFile('none','none',$data->picture,'picture',$request,'categories');
            $data->picture = $path['new_path'];
        } elseif(!$request->has('id')) {
            $data->picture = 'uploads/others/no_image.jpg';
        }
        if($request->has('id') && $request->status == 0){
            $category = self::find($id);
            Helper::deleteFile($category->picture,'categories');
            $data->picture = 'uploads/others/no_image.jpg';
        }        
        if ($request->has('id')) {
            $exist_url = self::where('id','!=',Crypt::decrypt($request->id))
            				->where('status',$request->status)
                            ->where('seo_url',Helper::seoUrl($request->name))
                            ->count();
        } else {
            $exist_url = self::where('seo_url',Helper::seoUrl($request->name))
            				->where('status',$request->status)
            				->count();
        }
        if ($exist_url == 1) {
            $not_exist = 0;
            foreach (range(1,1000) as $value) {
                if ($request->has('id')) {
                    $url = self::where('id','!=',Crypt::decrypt($request->id))
                    			->where('status',$request->status)
                                ->where('seo_url',Helper::seoUrl($request->name).'-'.$value)
                                ->count();
                } else {
                    $url = self::where('seo_url',Helper::seoUrl($request->name).'-'.$value)
                    			->where('status',$request->status)
                    			->count();
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
    }

}