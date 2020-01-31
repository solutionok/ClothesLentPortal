<?php

namespace App\Http\Controllers\AdminInterface;

use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Input;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Models\Validators;
use App\Models\Helper;
use App\Models\Categories;
use App\Models\Blog\BlogCategories;
use App\Models\Blog\Blog;

use Crypt;
use Auth;

class BlogManagementController extends Controller{

    function __construct()
    {
        $this->data['categories'] = Categories::where('status',0)
                                            ->orderBy('name','asc')
                                            ->get();
        // Extend the constructor from the main controller
        parent::__construct();
    }

    function getIndex()
    {        
        $this->data['blog'] = Blog::orderBy('created_at','desc')->get();
    	return view('admin-interface.blog-management.index',$this->data);
    }

    function getAdd()
    {
        $this->data['label'] = 'Add';
        return view('admin-interface.blog-management.manage',$this->data);
    }

    function getEdit($id)
    {
        $blog = Blog::find(Crypt::decrypt($id));
        if (!empty($blog)) {
            $this->data['blog_data'] = Blog::getData($blog->id);
            $this->data['label']     = 'Edit';
            return view('admin-interface.blog-management.manage',$this->data);
        } return back();
    }

    function postSave(Request $request)
    {
        // Send all the request to validate
        $validator = Validators::backendValidate($request,"blog_save");
        // Check the validator if there's no error
        if ($validator === true) {
            $blog = Blog::manageData($request,Auth::user()->id);
            //BlogCategories::addData($blog->id,$request);
            if ($request->has('id')) {
                Helper::flashMessage('Good Job!','Blog has been updated.','success');
            } else {
                Helper::flashMessage('Good Job!','Blog has been added.','success');
            }
            return back();
        }
        return back()->withErrors($validator)->withInput();
    }

    function getDelete($id)
    {
        $blog = Blog::find(Crypt::decrypt($id));
        if (!empty($blog)) {
            // Delete file holds old file and first folder
            Helper::deleteFile($blog->picture,'blog');
            Helper::deleteFile($blog->picture_custom_size,'blog');
            $blog->delete();
            Helper::flashMessage('Good Job!','Blog has been deleted.','success');
        }
        return back();
    }

}