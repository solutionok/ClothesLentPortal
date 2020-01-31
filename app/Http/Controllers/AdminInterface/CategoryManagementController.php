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

use Crypt;

class CategoryManagementController extends Controller{

    function getIndex()
    {
        $this->data['categories'] = Categories::orderBy('name','asc')->get();
    	return view('admin-interface.category-management.index',$this->data);
    }

    function getAdd()
    {
        $this->data['label'] = 'Add';
        return view('admin-interface.category-management.manage',$this->data);
    }

    function getEdit($id)
    {
        $this->data['category'] = Categories::find(Crypt::decrypt($id));
        if (!empty($this->data['category'])) {
            $this->data['label'] = 'Edit';
            return view('admin-interface.category-management.manage',$this->data);
        } return back();
    }

    function postSave(Request $request) {
        // Send all the request to validate
        $validator = Validators::backendValidate($request,"categories_save");
        // Check the validator if there's no error
        if ($validator === true) {
            Categories::manageData($request);
            if ($request->has('id')) {
                Helper::flashMessage('Good Job!','Category has been updated.','success');
            } else {
                Helper::flashMessage('Good Job!','Category has been added.','success');
            }
            return back();
        }
        return back()->withErrors($validator)->withInput();
    }

    function getDelete($id)
    {
        $category = Categories::find(Crypt::decrypt($id));
        if (!empty($category)) {
            Helper::deleteFile($category->picture,'categories');
            $category->delete();
            Helper::flashMessage('Good Job!','Category has been deleted.','success');
        }
        return back();
    }

}