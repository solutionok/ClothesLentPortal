@extends('admin-interface.layout')
@section('css')
    <link rel="stylesheet" href="{{ asset('css/select2.min.css') }}">
    <style>
        .select2{
            width: 100%!important;
        }
        .select2-container--default .select2-selection--multiple { border: 1px solid #D5D5D5; }
        .select2-container--default.select2-container--focus .select2-selection--multiple { border: 1px solid #D5D5D5; }
    </style>
@stop
@section('title',$label.' Cleaning')
@section('page_title')
    <h2><i class="fa fa-file"></i> {!! $label !!} Cleaning</h2>
@stop
@section('breadcrumb')
    <li><a href="{!! URL('admin/cleaning-management') !!}">Cleaning Management</a></li>
    <li class="active">{!! $label !!} Cleaning</li>
@stop
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-body">
                    <div class="row">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h3 class="panel-title">This is where you can {!! strtolower($label) !!} a cleaning</h3>
                                <ul class="panel-controls">
                                    <li data-toggle="tooltip" data-placement="left" title="Back">
                                        <a href="{!! URL('admin/cleaning-management') !!}"><span class="fa fa-backward"></span></a>
                                    </li>
                                </ul>                             
                            </div>
                            <form action="{!! URL('admin/cleaning-management/save') !!}" method="post" enctype="multipart/form-data">
                                <div class="panel-body">
                                    <div class="form-group {!!$errors->first('name') ? 'has-error' : ''!!}">
                                        <label class="col-md-1 col-xs-12 control-label">Name</label>
                                        <div class="col-md-11 col-xs-12">
                                            <input type="text" placeholder="Enter Name" class="form-control" name="name" value="@if(old('name')){!! htmlentities(old('name')) !!}@elseif($label == 'Edit'){!!htmlentities($category->name)!!}@endif">
                                            <span class="help-block" style="color:red">{!!$errors->first('name')!!}</span>
                                        </div>
                                    </div>

                                    <div class="form-group {!!$errors->first('shop_name') ? 'has-error' : ''!!}">
                                        <label class="col-md-1 col-xs-12 control-label">Shop Name</label>
                                        <div class="col-md-11 col-xs-12">
                                            <input type="text" placeholder="Enter Shop Name" class="form-control" name="shop_name" value="@if(old('shop_name')){!! htmlentities(old('shop_name')) !!}@elseif($label == 'Edit'){!!htmlentities($category->shop_name)!!}@endif">
                                            <span class="help-block" style="color:red">{!!$errors->first('shop_name')!!}</span>
                                        </div>
                                    </div>

                                    <div class="form-group {!!$errors->first('location') ? 'has-error' : ''!!}">
                                        <label class="col-md-1 col-xs-12 control-label">Location</label>
                                        <div class="col-md-11 col-xs-12">
                                            <input type="text" class="form-control" name="location" id="google_location" value="@if(old('location')){!! htmlentities(old('location')) !!}@elseif($label == 'Edit'){!!htmlentities($category->location)!!}@endif">
                                            <span class="help-block" style="color:red">{!!$errors->first('location')!!}</span>

                                            <input type="hidden" name="latitude" value="@if(old('latitude')){!! htmlentities(old('latitude')) !!}@elseif($label == 'Edit'){!!htmlentities($category->latitude)!!}@endif">

                                            <input type="hidden" name="longitude" value="@if(old('longitude')){!! htmlentities(old('longitude')) !!}@elseif($label == 'Edit'){!!htmlentities($category->longitude)!!}@endif">
                                        </div>
                                    </div>

                                    <div class="form-group {!!$errors->first('mobile_number') ? 'has-error' : ''!!}">
                                        <label class="col-md-1 col-xs-12 control-label">Mobile Number</label>
                                        <div class="col-md-11 col-xs-12">
                                            <input type="text" placeholder="Enter Mobile Number" class="form-control" name="mobile_number" value="@if(old('mobile_number')){!! htmlentities(old('mobile_number')) !!}@elseif($label == 'Edit'){!!htmlentities($category->mobile_number)!!}@endif">
                                            <span class="help-block" style="color:red">{!!$errors->first('mobile_number')!!}</span>
                                        </div>
                                    </div>
                                    
                                                                      
                                </div>
                                <div class="panel-footer">
                                    <button class="btn btn-primary pull-right">Save</button>
                                </div>
                                @if($label == 'Edit')
                                    <input type="hidden" name="id" value="{!! Crypt::encrypt($category->id) !!}">
                                @endif
                                {!! csrf_field() !!}
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> 
@stop
@section('js')
      <script defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBHJFXeb0JU0JJri1-XfdvxSjoW6cQH_30&libraries=places&callback=initAutocomplete"></script>

    <script type="text/javascript">
        
        var autocomplete;
        function initAutocomplete(){
            autocomplete = new google.maps.places.Autocomplete(
            (document.getElementById('google_location')),
            {types: ['geocode']});
            //alert("welcome");
            autocomplete.addListener('place_changed', fillInAddress);
        }
        function fillInAddress(){
            var place = autocomplete.getPlace();
            $(document).ready(function(){
                $("input[name='longitude']").val(place.geometry.location.lng().toFixed(6));
                $("input[name='latitude']").val(place.geometry.location.lat().toFixed(6));
            });
        }


    </script>
    
@stop