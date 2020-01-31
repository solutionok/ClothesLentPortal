@extends('user-interface.layout')
@section('title' , $page_content->section_first[0]->content)
@section('content')
	<div class="dashboard shipping_calculator">
       <div class="section-1">
            <div class="mx-1254 clearfix">
                <div class="breadcrumbs">
                    <ul>
                        <li><a href="">Home</a></li>
                        <li><a href="">shipping calculator</a></li>
                    </ul>
                </div>
                <div class="shipping_calculator_border">
                    <h1>Shipping Calculator</h1>
                    <div class="shipping_calculator_border_inside">
                        <h2>Location Information</h2>
                        <form>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-12 col">
                                        <input type="text" class="form-control" id="Address" placeholder="Address">
                                    </div>
                                </div>
                            </div>
                                <div class="row">
                                    <div class="col-md-3 col">
                                        <div class="form-group">
                                            <input type="text" class="form-control" id="City" placeholder="City">
                                        </div>
                                    </div>
                                    <div class="col-md-3 col">
                                        <div class="form-group">
                                            <input type="text" class="form-control" id="State" placeholder="State">
                                        </div>
                                    </div>
                                    <div class="col-md-3 col">
                                        <div class="form-group">
                                            <input type="text" class="form-control" id="Zip Code" placeholder="Zip Code">
                                        </div>
                                    </div>
                                    <div class="col-md-3 col">
                                        <div class="form-group">
                                            <div class="select">
                                            <select class="form-control">
                                              <option value="none">Select</option>
                                                    @foreach($countries as $value)
                                                    	@if(Auth::check())
                                                        <option value="{{$value->Code2}}" {{Auth::user()->country == $value->Code2 ? 'selected' : ''}}>{{$value->Name}}</option>
                                                        @else
                                                        <option value="{{$value->Code2}}">{{$value->Name}}</option>
                                                        
                                                        
                                                        @endif
                                                    @endforeach
                                            </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <h2>Item Information</h2>
                                <div class="row">
                                    <p>Dimentions</p>
                                    <h4>Weight</h4>
                                    <div class="col-md-2 col">
                                        <div class="form-group">
                                            <input type="text" class="form-control" id="Length" placeholder="Length">
                                        </div>
                                    </div>
                                    <div class="col-md-2 col">
                                        <div class="form-group">
                                            <input type="text" class="form-control" id="Width" placeholder="Width">
                                        </div>
                                    </div>
                                    <div class="col-md-2 col">
                                        <div class="form-group">
                                            <input type="text" class="form-control" id="Height" placeholder="Height">
                                        </div>
                                    </div>
                                    <div class="col-md-6 col">
                                        <div class="form-group">
                                            <input type="text" class="form-control" id="Enter_Weight" placeholder="Enter Weight">
                                            <h6>kg</h6>
                                        </div>
                                    </div>
                                </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-12 col">
                                        <button type="submit" class="btn" >Submit</button>
                                    </div>
                                </div>
                            </div>
                            <div class="footer_border clearfix">
                                <p>Shipping Fee</p>
                                <h2>100 USD</h2>
                                <h1>Note: This item will be released and delivered on or within 10 days</h1>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop