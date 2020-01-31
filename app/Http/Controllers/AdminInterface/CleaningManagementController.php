<?php

namespace App\Http\Controllers\AdminInterface;

use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Models\Validators;
use App\Models\Helper;
use App\Models\Cleaner;

use Crypt;

class CleaningManagementController extends Controller{

    function getIndex()
    {
        $this->data['categories'] = Cleaner::orderBy('name','asc')->get();
    	return view('admin-interface.cleaning-management.index',$this->data);
    }

    function getAdd()
    {
        $this->data['label'] = 'Add';
        return view('admin-interface.cleaning-management.manage',$this->data);
    }

    function getEdit($id)
    {
        $this->data['category'] = Cleaner::find(Crypt::decrypt($id));
        if (!empty($this->data['category'])) {
            $this->data['label'] = 'Edit';
            return view('admin-interface.cleaning-management.manage',$this->data);
        } return back();
    }

    function postSave(Request $request) {
        // Send all the request to validate
        $validator = Validators::backendValidate($request,"cleaning_save");
        // Check the validator if there's no error
        if ($validator === true) {
            Cleaner::manageData($request);
            if ($request->has('id')) {
                Helper::flashMessage('Good Job!','Cleaning has been updated.','success');
            } else {
                Helper::flashMessage('Good Job!','Cleaning has been added.','success');
            }
            return back();
        }
        return back()->withErrors($validator)->withInput();
    }

    function getDelete($id)
    {
        $category = Cleaner::find(Crypt::decrypt($id));
        if (!empty($category)) {
            
            $category->delete();
            Helper::flashMessage('Good Job!','Cleaning has been deleted.','success');
        }
        return back();
    }

    function map_demo() {
        $this->data['label'] = 'Add';
        return view('admin-interface.cleaning-management.map_demo',$this->data);
    }

    function get_record() {
        $code = "unsuccess";
        $data = array();


        $lat = '';
        $long = '';
        if(Auth::check()) {
            $lat  = Auth::user()->latitude;
            $long = Auth::user()->longitude;
        }

        if($lat && $long) {

            $record = DB::select("SELECT *, (
                    3959 * acos (
                      cos ( radians($lat) )
                      * cos( radians( latitude ) )
                      * cos( radians( longitude ) - radians($long) )
                      + sin ( radians($lat) )
                      * sin( radians( latitude ) )
                    )
                  ) AS distance
                FROM cleaner
                HAVING distance < 300 
                ORDER BY distance LIMIT 0 , 20;");

        } else {
            $record = Cleaner::orderBy('id','desc')->get();
        }


        if(count($record)>0) {
            $data = $record;
            $code = "success";
        }
        return response(array('code'=>'success','data'=>$data));
    }

}