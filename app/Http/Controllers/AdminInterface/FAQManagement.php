<?php

namespace App\Http\Controllers\AdminInterface;

use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Input;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Models\Validators;
use App\Models\Helper;
use App\Models\FAQs;

use Crypt;

class FAQManagement extends Controller{

    function getIndex()
    {
        $this->data['faqs'] = FAQs::orderBy('id','asc')->get();
        /*echo "<pre>";
        print_r($this->data['faqs']);exit;*/
    	return view('admin-interface.faqs-management.index',$this->data);
    }

    function getAdd()
    {
        $this->data['label'] = 'Add';
        return view('admin-interface.faqs-management.manage',$this->data);
    }

    function getEdit($id)
    {
        $this->data['faq'] = FAQs::find(Crypt::decrypt($id));
        if (!empty($this->data['faq'])) {
            $this->data['label'] = 'Edit';
            return view('admin-interface.faqs-management.manage',$this->data);
        } return back();
    }

    function postSave(Request $request) {
        // Send all the request to validate
        $validator = Validators::backendValidate($request,"faqs_save");
        // Check the validator if there's no error
        if ($validator === true) {
            FAQs::manageData($request);
            if ($request->has('id')) {
                Helper::flashMessage('Good Job!','FAQs has been updated.','success');
            } else {
                Helper::flashMessage('Good Job!','FAQs has been added.','success');
            }
            return back();
        }
        return back()->withErrors($validator)->withInput();
    }

    function getDelete($id)
    {
        $category = FAQs::find(Crypt::decrypt($id));
        if (!empty($category)) {
           
            $category->delete();
            Helper::flashMessage('Good Job!','FAQs has been deleted.','success');
        }
        return back();
    }

}