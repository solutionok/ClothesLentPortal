<?php

namespace App\Http\Controllers\AdminInterface;

use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Input;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Pagination\LengthAwarePaginator;

use App\User;
use App\Models\Validators;
use App\Models\Helper;

use Crypt;
use Auth;

class UsersManagementController extends Controller{

    function getIndex(Request $request)
    {
        $this->data['users']       = User::where('id','!=',1)
                                        ->where('id','!=',Auth::user()->id)
                                        ->where('is_deleted', 0)
                                        ->orderBy('first_name','asc')
                                        ->orderBy('last_name','asc')
                                        ->paginate(8);
        $this->data['total_users'] = User::where('id','!=',1)
                                        ->where('id','!=',Auth::user()->id)
                                        ->where('is_deleted', 0)
                                        ->count();
    	if ($request->has('keyword')) {
            $results                   = $this->search($request);
            $this->data['total_users'] = count($results);
            // Create a pagination
            $this->data['users']       = $this->customPagination(serialize($results),8);
    	}
    	return view('admin-interface.users-management.index',$this->data);
    }

    function search($request)
    {
        $results     = [];
        $search_list =  [
                            'first_name',
                            'last_name',
                            'username',
                            'email'
                        ];
        foreach ($search_list as $value)
        {
            $search_data = User::where($value,'LIKE','%'.$request->keyword.'%')
                                ->orderBy('first_name','asc')
                                ->orderBy('last_name','asc')
                                ->where('is_deleted', 0)
                                ->get();
            foreach ($search_data as $search_value) {
                $exist = 0;
                if (count($results)) {
                    foreach ($results as $v) {
                        if ($search_value->id == $v->id) {
                            $exist++;
                        }
                    }
                    if ($exist == 0) {
                        $results[] = $search_value;
                    }
                } else{
                    $results[] = $search_value;
                }
            }
        }
        return $results;
    }

    function customPagination($array,$page_number)
    {
        $currentPage = LengthAwarePaginator::resolveCurrentPage();
        if (is_null($currentPage)) {
            $currentPage = 1;
        }
        $collection            = new Collection(unserialize($array));
        $perPage               = $page_number;
        $currentPageImgResults = $collection->slice(($currentPage - 1) * $perPage, $perPage)->all();
        return new LengthAwarePaginator($currentPageImgResults, count($collection), $perPage, $currentPage);
    }

    function getAdd()
    {
        $this->data['label'] = 'Add';
        return view('admin-interface.users-management.manage',$this->data);
    }

    function postAdd(Request $request)
    {
        // Send all the request to validate
        $validator = Validators::backendValidate($request,"users_manage_information");
        // Check the validator if there's no error
        if ($validator === true) {
            $user = User::manageData($request);
            $url  = URL('admin/users-management/edit/'.Crypt::encrypt($user->id));
            Helper::flashMessage('Good job!','User has been added.','success');
            return response()->json(["result" => 'success','url' => $url]);
        }
        return response()->json(["result" => 'failed', "errors" => $validator->errors()->messages()]);
    }

    function getEdit($id)
    {
    	//Crypt::decrypt($id);exit;
        $this->data['user']  = User::find(Crypt::decrypt($id));
        $this->data['label'] = 'Edit';
        
        //echo "<pre>";
        //print_r($this->data['user']);exit;
        return view('admin-interface.users-management.manage',$this->data);
    }

    function postEdit(Request $request)
    {
        // Send all the request to validate
        $validator = Validators::backendValidate($request,"users_manage_general");
        // Check the validator if there's no error
        if ($validator === true) {
            $user = User::manageData($request,Crypt::decrypt($request->id));
            return response()->json([
                                        "result" => 'success',
                                        'name'   => ucwords($user->first_name.' '.$user->last_name)
                                    ]);
        }
        return response()->json(["result" => 'failed', "errors" => $validator->errors()->messages()]);
    }

    function postCredentials(Request $request)
    {
        // Send all the request to validate
        $validator = Validators::backendValidate($request,"users_manage_credentials");
        // Check the validator if there's no error
        if ($validator === true) {
            User::updateCredentials($request,Crypt::decrypt($request->id));
            return response()->json(["result" => 'success']);
        }
        return response()->json(["result" => 'failed', "errors" => $validator->errors()->messages()]);
    }

    function getDelete($id)
    {
    	$id = Crypt::decrypt($id);
        $user_data = User::find($id);
        if (!empty($user_data)) {
//            User::deleteData($user_data->id);
//            $user_data->delete();
            $user_data->is_deleted = 1;
            $user_data->save();
            Helper::flashMessage('Good job!','The user has been removed.','success');
            return response()->json(["result" => 'success']);
        }
        return response()->json(["result" => 'failed']);
    }

}