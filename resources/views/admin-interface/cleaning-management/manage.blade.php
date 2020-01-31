@extends('admin-interface.layout')
@section('css')
    <link rel="stylesheet" href="{{ asset('css/select2.min.css') }}">
    <style>
        .select2{
            width: 100%!important;
        }
        .select2-container--default .select2-selection--multiple { border: 1px solid #D5D5D5; }
        .select2-container--default.select2-container--focus .select2-selection--multiple { border: 1px solid #D5D5D5; }
          #map {
        height: 10%;
        width: 50%;
      }
      html, body {
        height: 100%;
        margin: 0;
        padding: 0;
      }
      input[type=number]::-webkit-inner-spin-button, 
input[type=number]::-webkit-outer-spin-button { 
    -webkit-appearance: none;
    -moz-appearance: none;
    appearance: none;
    margin: 0; 
}

        .map-chart input {
            top: 7px !important;
            width: 500px !important;
        }
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

                                   

                                    <div class="form-group {!!$errors->first('mobile_number') ? 'has-error' : ''!!}">
                                        <label class="col-md-1 col-xs-12 control-label">Mobile</label>
                                        <div class="col-md-11 col-xs-12">
                                            <input type="number" placeholder="Enter Mobile Number" class="form-control" name="mobile_number" value="@if(old('mobile_number')){!! htmlentities(old('mobile_number')) !!}@elseif($label == 'Edit'){!!htmlentities($category->mobile_number)!!}@endif" onkeydown="javascript: return event.keyCode == 69 ? false : true">
                                            <span class="help-block" style="color:red">{!!$errors->first('mobile_number')!!}</span>
                                        </div>
                                    </div>


                                     <div class="form-group {!!$errors->first('location') ? 'has-error' : ''!!}">
                                        <label class="col-md-1 col-xs-12 control-label">Location</label>
                                        <div class="col-md-11 col-xs-12">
                                            <!-- <input type="text" class="form-control" name="location" id="google_location" value="@if(old('location')){!! htmlentities(old('location')) !!}@elseif($label == 'Edit'){!!htmlentities($category->location)!!}@endif">
                                            <span class="help-block" style="color:red">{!!$errors->first('location')!!}</span>

                                            <input type="hidden" name="latitude" value="@if(old('latitude')){!! htmlentities(old('latitude')) !!}@elseif($label == 'Edit'){!!htmlentities($category->latitude)!!}@endif">

                                            <input type="hidden" name="longitude" value="@if(old('longitude')){!! htmlentities(old('longitude')) !!}@elseif($label == 'Edit'){!!htmlentities($category->longitude)!!}@endif"> -->
                                            
                                            <div id="map" class="map-chart" style="width: 100%; height: 500px"></div>
                                            <span style="color:green">Note : Move Maker to change the location</span>
                                            <br>
                                            <input type="hidden" name="latitude" value="@if(old('latitude')){!! htmlentities(old('latitude')) !!}@elseif($label == 'Edit'){!!htmlentities($category->latitude)!!}@else {!!htmlentities('57.7913414')!!} @endif" id="v_lat">

                                            <input type="hidden" name="longitude" value="@if(old('longitude')){!! htmlentities(old('longitude')) !!}@elseif($label == 'Edit'){!!htmlentities($category->longitude)!!} @else {!!htmlentities('-103.582284')!!} @endif" id="v_long">


                                            <input type="hidden" name="location" value="@if(old('location')){!! htmlentities(old('location')) !!}@elseif($label == 'Edit'){!!htmlentities($category->location)!!}@else {!!htmlentities('canada')!!} @endif" id="v_location">
                                        </div>
                                    </div>
                                    <br>
                                    <div class="form-group {!!$errors->first('location') ? 'has-error' : ''!!}">
                                        <label class="col-md-1 col-xs-12 control-label">Address</label>
                                        <div class="col-md-11 col-xs-12">
                                            
                                            <div id="location_address" class="form-control">@if(old('location')){!! htmlentities(old('location')) !!}@elseif($label == 'Edit'){!!htmlentities($category->location)!!}@else {!!htmlentities('canada')!!} @endif</div>
                                        </div>
                                    </div>

                                    <input name="map" style="top: 7px; height: 44px;" id="map-input" type="text" placeholder="Enter location" class="form-control">

                                    <div class="form-group">
                                        <label class="col-md-1 col-xs-12 control-label">Latitude</label>
                                        <div class="col-md-11 col-xs-12">
                                            <div id="location_lat" class="form-control">@if(old('latitude')){!! htmlentities(old('latitude')) !!}@elseif($label == 'Edit'){!!htmlentities($category->latitude)!!}@else {!!htmlentities('57.7913414')!!} @endif</div>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-md-1 col-xs-12 control-label">Longitude</label>
                                        <div class="col-md-11 col-xs-12">
                                            <div id="location_long" class="form-control" >@if(old('longitude')){!! htmlentities(old('longitude')) !!}@elseif($label == 'Edit'){!!htmlentities($category->longitude)!!} @else {!!htmlentities('-103.582284')!!} @endif</div>
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
      <script defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBHJFXeb0JU0JJri1-XfdvxSjoW6cQH_30&libraries=places&callback=initMap"></script>

  
        <script type="text/javascript">
            
            var marker;

        position_lat = "@if(old('latitude')){!! htmlentities(old('latitude')) !!}@elseif($label == 'Edit'){!!htmlentities($category->latitude)!!}@else {!!htmlentities('57.7913414')!!} @endif";
        position_long = "@if(old('longitude')){!! htmlentities(old('longitude')) !!}@elseif($label == 'Edit'){!!htmlentities($category->longitude)!!} @else {!!htmlentities('-103.582284')!!} @endif";

        position_lat = parseFloat(position_lat);
        position_long = parseFloat(position_long);
      function initMap() {
        var map = new google.maps.Map(document.getElementById('map'), {
          zoom: 4,
          center: {lat: position_lat, lng: position_long}
        });

        


        //alert(position_lat);
        marker = new google.maps.Marker({
          map: map,
          draggable: true,
          animation: google.maps.Animation.DROP,
          position: {lat: position_lat, lng: position_long}
        });

          marker.addListener('drag', handleEvent);


          var input = document.getElementById('map-input');
          var searchBox = new google.maps.places.SearchBox(input);

          map.controls[google.maps.ControlPosition.TOP_LEFT].push(input);
          var autocomplete = new google.maps.places.Autocomplete(input);

          autocomplete.bindTo('bounds', map);

          autocomplete.setFields(
              ['address_components', 'geometry', 'icon', 'name']);

          autocomplete.addListener('place_changed', function() {

              var place = autocomplete.getPlace();
              if (!place.geometry) {
                  // User entered the name of a Place that was not suggested and
                  // pressed the Enter key, or the Place Details request failed.
                  window.alert("No details available for input: '" + place.name + "'");
                  return;
              }

              // If the place has a geometry, then present it on a map.
              if (place.geometry.viewport) {
                  map.fitBounds(place.geometry.viewport);
              } else {
                  map.setCenter(place.geometry.location);
                  map.setZoom(17);  // Why 17? Because it looks good.
              }
              marker.setPosition(place.geometry.location);
//              marker.setVisible(true);

              var address = '';
              if (place.address_components) {
                  address = [
                      (place.address_components[0] && place.address_components[0].short_name || ''),
                      (place.address_components[1] && place.address_components[1].short_name || ''),
                      (place.address_components[2] && place.address_components[2].short_name || '')
                  ].join(' ');
              }


              $("#location_address").html(place.name + ' ' + address);
              $("#v_location").val(place.name + ' ' + address);
              $("#location_lat").html(place.geometry.location.lat());
              $("#v_lat").val(place.geometry.location.lat());

              $("#location_long").html(place.geometry.location.lng());
              $("#v_long").val(place.geometry.location.lng());

          });


        google.maps.event.addListener(marker, 'dragend', function() 
        {

            geocodePosition(marker.getPosition());
        });

      }

      function geocodePosition(pos) 
      {
         geocoder = new google.maps.Geocoder();
         geocoder.geocode
          ({
              latLng: pos
          }, 
              function(results, status) 
              {
                  if (status == google.maps.GeocoderStatus.OK) 
                  {
                    console.log(results[0]);
                      $("#mapSearchInput").val(results[0].formatted_address);
                      //console.log("Lat:"+results[0].geometry.location.lat());
                      //console.log("Long:"+results[0].geometry.location.lng());
                      //$("#mapErrorMsg").hide(100);
                      $("#location_address").html(results[0].formatted_address);
                      $("#v_location").val(results[0].formatted_address);
                  } 
                  else 
                  {
                      //$("#mapErrorMsg").html('Cannot determine address at this location.'+status).show(100);
                      $("#location_address").html('Cannot determine address at this location.');
                      $("#v_location").val('Cannot determine address at this location.');
                  }
              }
          );
      }

      function handleEvent(event) {
          //document.getElementById('lat').innerHTML  = "Lat : "+event.latLng.lat();
          //document.getElementById('lng').innerHTML  = "Long : "+ event.latLng.lng();

          $("#location_lat").html(event.latLng.lat());
          $("#v_lat").val(event.latLng.lat());

          $("#location_long").html(event.latLng.lng());
          $("#v_long").val(event.latLng.lng());
      }
        </script>
@stop