<?php

namespace App\Models\Blog;

use Illuminate\Database\Eloquent\Model;

use App\User;
use App\Models\Helper;

use DB;
use Crypt;

class Blog extends Model{

    protected $table = 'blog';

    public static function manageData($request,$user_id)
    {
        $id                = $request->has('id') ? Crypt::decrypt($request->id) : 0;
        $data              = self::findOrNew($id);
        $data->user_id     = $user_id;
        $data->title       = $request->title;
        $data->description = $request->description;
        if($request->hasFile('picture')){
            // Upload files holds custom old file, custom file size, old file, field name, request, and first folder
            $path = Helper::uploadFile($data->picture_custom_size,400,$data->picture,'picture',$request,'blog');
            $data->picture             = $path['new_path'];
            $data->picture_custom_size = $path['custom_size_path'];
        } elseif(!$request->has('id')) {
            $data->picture             = 'uploads/others/no_image.jpg';
            $data->picture_custom_size = 'uploads/others/no_image.jpg';
        }
        if ($request->has('id')) {
            $exist_url = self::where('id','!=',Crypt::decrypt($request->id))
                            ->where('seo_url',Helper::seoUrl($request->title))
                            ->count();
        } else {
            $exist_url = self::where('seo_url',Helper::seoUrl($request->title))->count();
        }
        if ($exist_url == 1) {
            $not_exist = 0;
            foreach (range(1,1000) as $value) {
                if ($request->has('id')) {
                    $url = self::where('id','!=',Crypt::decrypt($request->id))
                                ->where('seo_url',Helper::seoUrl($request->title).'-'.$value)
                                ->count();
                } else {
                    $url = self::where('seo_url',Helper::seoUrl($request->title).'-'.$value)->count();
                }
                if ($url == 0) {
                    $data->seo_url = Helper::seoUrl($request->title).'-'.$value;
                    break;
                }
            }
        } else {
            $data->seo_url = Helper::seoUrl($request->title);
        }
        $data->save();
        return $data;
    }

    public static function getData($id='none')
    {
        if ($id != 'none') {
            // Get blog data
            $data['self_data'] = self::find($id);
            if (!empty($data['self_data'])) {
                $data['user_data']  = User::displayName($data['self_data']->user_id);

                $data['categories'] = db::table('categories')
                                        ->join('blog_categories','categories.id','=','blog_categories.category_id')
                                        ->where('categories.status',0)
                                        ->where('blog_categories.blog_id',$data['self_data']->id)
                                        ->orderBy('categories.name','asc')
                                        ->get();
                $data['time_duration'] = Helper::timeDuration($data['self_data']->created_at);
            }
        }
        return (object) $data;
    }

}