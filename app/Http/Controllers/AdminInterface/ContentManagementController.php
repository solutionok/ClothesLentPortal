<?php

namespace App\Http\Controllers\AdminInterface;

use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Input;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Models\Validators;
use App\Models\Pages\Pages;
use App\Models\Pages\PageSection;
use App\Models\Pages\PageContent;
use App\Models\Helper;

use View;
use Crypt;

class ContentManagementController extends Controller
{

    function getIndex()
    {
        $this->data['pages'] = Pages::orderBy('name','asc')->get();
        return view('admin-interface.content-management.index',$this->data);
    }

    function getAdd()
    {
        $this->data['pages']    = Pages::orderBy('name','asc')->get();
        $this->data['sections'] = PageSection::orderBy('created_at','desc')->get();
        return view('admin-interface.content-management.add',$this->data);
    }

    function postAdd(Request $request)
    {
        // Send all the request to validate
        $validator = Validators::backendValidate($request,"cms_custom_add");
        // Check the validator if there's no error
        if ($validator === true) {
            if ($request->page_dropdown == 'custom_page') {
                // Create and get the page id
                $page_id = Pages::addData($request);
            } else {
                $page_id = $request->page_dropdown;
            }
            // Create a content
            PageContent::addData($page_id,$request);
            Helper::flashMessage('Good job!','Content has been added.','success');
            return response()->json(["result" => 'success']);
        } return response()->json(["result" => 'failed']);
    }

    function getEditPage($id)
    {
        $this->data['page_data'] = Pages::getData(Crypt::decrypt($id));
        if ($this->data['page_data']) {
            return view('admin-interface.content-management.edit',$this->data);
        } return back();
    }

    function getRepeaterFields(Request $request)
    {
        $this->data['page_data'] = unserialize(base64_decode($request->json));
        // Get the html file
        $content = View::make('admin-interface.content-management.includes.append.edit-page-repeater-content',$this->data)->render();
        return response()->json([
                                    'result'  => 'success',
                                    'content' => $content,
                                    'id'      => $this->data['page_data']->id
                                ]);
    }

    function getRemoveRepeaterFields(Request $request)
    {
        PageContent::deleteRepeater($request);
        return response()->json(['result'  => 'success']);
    }

    function postSave(Request $request)
    {
        PageContent::updateData($request);
        Helper::flashMessage('Good job!','Content has been updated.','success');
        return back();
    }

}