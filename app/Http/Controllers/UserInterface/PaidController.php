<?php

namespace App\Http\Controllers\UserInterface;

use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Input;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class PaidController extends Controller{

    function getIndex()
    {
        return view('user-interface.dashboard.paid.index',$this->data);
    }

    function getSingle()
    {
        return view('user-interface.dashboard.paid.single',$this->data);
    }

}