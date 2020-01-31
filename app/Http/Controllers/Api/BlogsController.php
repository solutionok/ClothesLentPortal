<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Input;
use App\Http\Requests;
use App\Models\Pages\PageContent;
use App\Http\Controllers\Controller;

use App\Models\Helper;
use App\Models\Categories;
use App\Models\Blog\Blog;

use Auth, 
    Session,
    Redirect,
    Mail,
    URL,
    File,
    Str,
    Config,
    DB,
    Response,
    View,
    Validator,
    Twilio;
use Crypt;

class BlogsController extends ApiBaseController{

    function getNews(Request $request)
    {
        
        $code = SUCCESS;
        $msg = "Blog news.";
        $user = auth()->guard('api')->user();
        $response=array();
    	$response = Blog::orderBy('created_at','desc')->paginate(10);
      
        
       return Response::json(array('code' => $code, 'msg' => $msg, 'data' => (object) $response));
    }

    function category($seo_url)
    {
    	$category = Categories::where('seo_url',$seo_url)->first();
    	if (count($category)) {
    		$this->data['blog'] = DB::table('blog_categories')
					    			->join('blog','blog_categories.blog_id','=','blog.id')
					    			->where('blog_categories.category_id',$category->id)
					    			->orderBy('blog.created_at','desc')
					    			->paginate(10);
    	}
    }

    function getSingle($seo_url)
    {
        $blog = Blog::where('seo_url',$seo_url)->first();
        if (count($blog)) {
            $this->data['blog_data']   = Blog::getData($blog->id);
            $this->data['recent_post'] = Blog::where('id','!=',$blog->id)
                                            ->orderBy('created_at','desc')
                                            ->take(5)
                                            ->get();
            $this->relatedBlogs();
            $this->data['page_content'] = PageContent::getData('none',4);
    	    return view('user-interface.blogs.single',$this->data);
        } return back();
    }

    function relatedBlogs()
    {
        $related_blogs = [];
        foreach ($this->data['blog_data']->categories as $value) {
            $blogs = DB::table('blog_categories')
                            ->join('blog','blog_categories.blog_id','=','blog.id')
                            ->where('blog_categories.category_id',$value->category_id)
                            ->where('blog.id','!=',$this->data['blog_data']->self_data->id)
                            ->orderBy('blog.title','asc')
                            ->get();
            foreach (Helper::convertObjectsToArray($blogs) as $b) {
                $exist = 'false';
                foreach ($related_blogs as $r) {
                    if ($b->id == $r->id) {
                        $exist = 'true';
                    }
                }
                if ($exist == 'false') {
                    $related_blogs[] = $b; // Insert the blog
                    if (count($related_blogs) == 8) {
                        break; // Cut the loop
                    }
                }
            }
        }
        $this->data['related_blogs'] = collect([$related_blogs])->collapse()->take(3);
    }

}