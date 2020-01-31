@extends('user-interface.layout')
@section('title',App\User::displayName(Auth::user()->id))
@section('css')
    <link rel="stylesheet" href="{!!asset('user-interface')!!}/css/jquery.datetimepicker.css">
@stop
@section('content')
    <div class="dashboard profile-page">
        <div class="section-1">
            <div class="mx-1254 clearfix">
                <div class="breadcrumbs">
                    <ul>
                        <li><a href="{!!URL('/')!!}">Home</a></li>
                        <li><span>Profile</span></li>
                    </ul>
                </div>
                <div class="dashboard-container clearfix">
                    @include('user-interface.dashboard.includes.left-sidebar')
                    <div class="col-md-9">
                        <div class="page-content">
                            <form id="profile-form" enctype="multipart/form-data">
                                <div id="body-type-mp" class="white-popup-block mfp-hide body-type-popup" style="background-image: url('{!!asset('user-interface')!!}/img/pop-bg.jpg');">
                                    <div class="text-center">
                                        <div class="title-holder">
                                            <h3>confirm body type</h3>
                                            <p>Is this your body type?</p>
                                        </div>
                                        <div class="img-holder">
                                            <img id="display-body-type-img" src="{!!asset('user-interface')!!}/img/body-type-new-{{Auth::user()->body_type}}.png">
                                        </div>
                                        <div class="title-holder">
                                            <p>If no, please select your body type:</p>
                                        </div>
                                        <div class="row">
                                            <div class="col-20">
                                                <div class="rdo-holder">
                                                    <input type="radio" id="first_rdo" name="body_type" value="1" {{Auth::user()->body_type == 1 ? 'checked' : '' }}/>
                                                    <label for="first_rdo"><span></span>
                                                        <img src="{!!asset('user-interface')!!}/img/body-type-new-1.png">
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="col-20">
                                                <div class="rdo-holder">
                                                    <input type="radio" id="second_rdo" name="body_type" value="2" {{Auth::user()->body_type == 2 ? 'checked' : '' }}/>
                                                    <label for="second_rdo"><span></span>
                                                        <img src="{!!asset('user-interface')!!}/img/body-type-new-2.png">
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="col-20">
                                                <div class="rdo-holder">
                                                    <input type="radio" id="third_rdo" name="body_type" value="3" {{Auth::user()->body_type == 3 ? 'checked' : '' }}/>
                                                    <label for="third_rdo"><span></span>
                                                        <img src="{!!asset('user-interface')!!}/img/body-type-new-3.png">
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="col-20">
                                                <div class="rdo-holder">
                                                    <input type="radio" id="fourth_rdo" name="body_type" value="4" {{Auth::user()->body_type == 4 ? 'checked' : '' }}/>
                                                    <label for="fourth_rdo"><span></span>
                                                        <img src="{!!asset('user-interface')!!}/img/body-type-new-4.png">
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="col-20">
                                                <div class="rdo-holder">
                                                    <input type="radio" id="fifth_rdo" name="body_type" value="5" {{Auth::user()->body_type == 5 ? 'checked' : '' }}/>
                                                    <label for="fifth_rdo"><span></span>
                                                        <img src="{!!asset('user-interface')!!}/img/body-type-new-5.png">
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- <button type="submit" class="btn btn-default pop-btn">Yes, this is my body type</button> -->
                                        <a class="btn btn-default pop-btn" id="confirm-body-type">Yes, this is my body type</a>
                                    </div>
                                </div>
                                <div class="edit-profile-picture">
                                    <div class="clearfix">
                                        <div class="col-md-3 text-center">
                                            <div class="user-profile-holder">
                                                <img class="profile-pic trigger-image display-image" src="{!!asset(Auth::user()->profile_picture)!!}">
                                            </div>
                                        </div>
                                        <div class="col-md-9">
                                            <h2 class="display-name">{!!App\User::displayName(Auth::user()->id)!!}</h2>
                                            <!--<div class="image-name-holder">
                                                <div class="image-name trigger-image">No Image Selected</div>
	                                                <a id="remove-image" style="display:none"><i class="fa fa-times" aria-hidden="true"></i></a> 											                                           						
                                            </div>-->
                                            <div class="edit-profile trigger-image">
                                                <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                                                UPLOAD
                                            </div>
                                            <input id="open-image" onchange="readURL(this)" class="input-file" type="file" accept="image/*" name="profile_picture"/>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-content personal-information">
                                    <h4>Personal Information</h4>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>First Name</label>
                                                <input type="text" class="form-control" name='first_name' value="{{Auth::user()->first_name}}" placeholder="Enter First Name">
                                                <span class="profile-error errors" id="profile_first_name"></span>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Last Name</label>
                                                <input type="text" class="form-control" name='last_name' value="{{Auth::user()->last_name}}" placeholder="Enter Last Name">
                                                <span class="profile-error errors" id="profile_last_name"></span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>CONTACT NUMBER</label>
                                                <input type="text" class="form-control" name='contact_number' value="{{Auth::user()->contact_number}}" placeholder="Enter Contact Number">
                                                <span class="profile-error errors" id="profile_contact_number"></span>
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Location</label>
                                                <input type="text" class="form-control" name='location' id="google_location" value="{{Auth::user()->location}}" placeholder="Enter your Location">
                                                <span class="profile-error errors" id="profile_location"><p id="demo"></p></span>
                                            </div>
                                        </div>
                                         </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Email Address</label>
                                                @if(Auth::user()->facebook_id!="" || Auth::user()->twitter_id!="")
                                                <input type="text" class="form-control" name='email' value="{{Auth::user()->email}}" placeholder="Enter Email Address" readonly>
                                                @else
                                                <input type="text" class="form-control" name='email' value="{{Auth::user()->email}}" placeholder="Enter Email Address" >
                                                @endif
                                                <span class="profile-error errors" id="profile_email"></span>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Birthday</label>
                                                <?php
                                                if(isset(Auth::user()->birthday))
                                                {
                                                $birthdate = Auth::user()->birthday;
                                                }
                                               

                                                ?>
                                                <input type="text" class="form-control" name='birthday' id="datepicker" value="{{(!empty($birthdate))?date('m/d/Y', strtotime($birthdate)):''}}" placeholder="Enter your Birthday">
                                                <span class="profile-error errors" id="profile_birthday"></span>
                                            </div>
                                        </div>
                                    </div>


                                    {{--<div class="row">
                                        <div class="col-md-12">
                                        </div>
                                        <div id="">
                                            <div class="col-md-10">
                                                <div class="form-group">
                                                    <input type="checkbox" name="cleanPrice" id="cleanPrice" {{Auth::user()->cleaning_price ? "checked" : ""}}/>
                                                    I agree to receive my item back unclean and will
                                                    clean it myself with a charge of
                                                </div>
                                            </div>
                                            <div class="col-md-2">
                                                <div class="form-group">
                                                    <input type="number" class="form-control"
                                                           id="cleaning_price" name='cleaning_price'
                                                           value="{{Auth::user()->cleaning_price}}"
                                                           placeholder="Amount">
                                                </div>
                                            </div>
                                        </div>
                                    </div>--}}


                                </div>
                                <div class="form-content shipping-fee">
                                    <h4>Body Type</h4>
                                    <div class="row clearfix">
                                        <div class="col-20">
                                            <div class="form-group">
                                                <label>SIZE</label>
                                                <div class="select">
                                                <select class="form-control" name='size' id="body_size">
                                                    <option value="" {{Auth::user()->size == NULL ? 'selected' : ''}}>--</option>
                                                    <option value="Extra Small" {{Auth::user()->size == 'Extra Small' ? 'selected' : ''}}>Extra Small</option>
                                                    <option value="Small" {{Auth::user()->size == 'Small' ? 'selected' : ''}}>Small</option>
                                                    <option value="Medium" {{Auth::user()->size == 'Medium' ? 'selected' : ''}}>Medium</option>
                                                    <option value="Large" {{Auth::user()->size == 'Large' ? 'selected' : ''}}>Large</option>
                                                    <option value="Extra Large" {{Auth::user()->size == 'Extra Large' ? 'selected' : ''}}>Extra Large</option>
                                                </select>
                                                </div>
                                                <span class="profile-error errors" id="profile_size"></span>
                                            </div>
                                        </div>
                                        <div class="col-20">
                                            <div class="form-group">
                                                <label>HEIGHT (ft)</label>
                                                <div class="select">
                                                <select class="form-control" name='height'>
                                                    <option value="" {{Auth::user()->height == 0 ? 'selected' : ''}}>--</option>
                                                    @for($ft = 4; $ft <= 6; $ft++)
                                                        @for($in = 0; $in <= 11; $in++)
                                                            <?php $data = $ft."'".$in.'"' ?>
                                                            <option value="{{ $data }}" {{Auth::user()->height == $data ? 'selected' : ''}}>{{ $data }}</option>
                                                        @endfor
                                                    @endfor
                                                </select>
                                                </div>
                                                <span class="profile-error errors" id="profile_height"></span>
                                            </div>
                                        </div>
                                        <div class="col-20">
                                            <div class="form-group">
                                                <label>Breast</label>
                                                <div class="select">
                                                <select class="form-control" name='breast' onchange="checkBodyType();">
                                                    <option value="" {{Auth::user()->breast == 0 ? 'selected' : ''}}>--</option>
                                                    @for($in = 20; $in <= 100 ; $in++)
                                                        <?php $data = $in.'"' ?>
                                                        <option value="{{ $data }}" {{Auth::user()->breast == $data ? 'selected' : ''}}>{{ $data }}</option>
                                                    @endfor
                                                </select>
                                                </div>
                                                <span class="profile-error errors" id="profile_breast"></span>
                                            </div>
                                        </div>
                                        <div class="col-20">
                                            <div class="form-group">
                                                <label>Waist (Inches)</label>
                                                <div class="select">
                                                <select class="form-control" name='waist'  onchange="checkBodyType();">
                                                    <option value="" {{Auth::user()->waist == 0 ? 'selected' : ''}}>--</option>
                                                    @for($in = 20; $in <= 100 ; $in++)
                                                        <?php $data = $in.'"' ?>
                                                        <option value="{{ $data }}" {{Auth::user()->waist == $data ? 'selected' : ''}}>{{ $data }}</option>
                                                    @endfor
                                                </select>
                                                </div>
                                                <span class="profile-error errors" id="profile_waist"></span>
                                            </div>
                                        </div>
                                        <div class="col-20">
                                            <div class="form-group">
                                                <label>hips (Inches)</label>
                                                <div class="select">
                                                <select class="form-control" name='hips'  onchange="checkBodyType();">
                                                    <option value="" {{Auth::user()->hips == 0 ? 'selected' : ''}}>--</option>
                                                    @for($in = 20; $in <= 100 ; $in++)
                                                        <?php $data = $in.'"' ?>
                                                        <option value="{{ $data }}" {{Auth::user()->hips == $data ? 'selected' : ''}}>{{ $data }}</option>
                                                    @endfor
                                                </select>
                                                </div>
                                                <span class="profile-error errors" id="profile_hips"></span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="text-right">
                                        <a href="#body-type-mp" class="form-btn popup-with-form" style="line-height: 5;">View Body</a>
                                       <a href="#size_chart_popup" style="padding: 15px; line-height: 5;" class=" form-btn popup-with-form btn__block no_bg wishlist_value popup-with-form">Measurement Reference guide</a>
                                    </div>
                                </div>
                                {{--<div class="form-content shipping-fee">
                                    <h4>Shipping fee</h4>
                                    <div class="form-group">
                                        <div class="row">
                                            <label class="col-sm-2 control-label">Local</label>
                                            <div class="col-sm-2 relative">
                                                @if(Auth::user()->shipping_fee_local==0)
                                                <input type="text" name='shipping_fee_local' class="form-control text-right number_decimal" value="">
                                                @else
                                                <input type="text" name='shipping_fee_local' class="form-control text-right number_decimal" value="{{Auth::user()->shipping_fee_local}}">
                                                @endif
                                                <p>$</p>
                                                <span class="profile-error errors" id="profile_shipping_fee_local"></span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="row">
                                            <label class="col-sm-2 control-label">Nationwide</label>
                                            <div class="col-sm-2 relative">
                                                @if(Auth::user()->shipping_fee_nationwide==0)
                                                <input type="text" name='shipping_fee_nationwide' class="form-control text-right number_decimal" value="">
                                                @else
                                                <input type="text" name='shipping_fee_nationwide' class="form-control text-right number_decimal" value="{{Auth::user()->shipping_fee_nationwide}}">
                                                @endif
                                                <p>$</p>
                                                <span class="profile-error errors" id="profile_shipping_fee_nationwide"></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>--}}
                                <div class="form-content shipping-fee">
                                    <h4>Paypal Sandbox Account Detail</h4>
                                    <div class="form-group">
                                        <div class="row">
                                            <label class="col-sm-2 control-label">Email</label>
                                            <div class="col-sm-6 relative">
                                                <input type="text" name='paypal_email_address' class="form-control" value="{{Auth::user()->paypal_email_address}}">
                                               
                                               
                                                <span class="profile-error errors" id="profile_paypal_email_address"></span>
                                            </div>
                                        </div>
                                    </div>
                                    
                                </div>
                                @if(Auth::user()->password != NULL)
                                    <div class="form-content change-password">
                                        <h4>Change Password</h4>
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label>Current Password</label>
                                                    <input type="password" name='current_password' class="form-control">
                                                    <span class="profile-error errors" id="profile_current_password"></span>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label>new Password</label>
                                                    <input type="password" name='password' class="form-control" id="id_password">
                                                    <span class="profile-error errors" id="profile_password"></span>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label>confirm Password</label>
                                                    <input type="password" name='password_confirmation' class="form-control">
                                                    <span class="profile-error errors" id="profile_password_confirmation"></span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endif
                                <div class="text-right">
                                    <button type="submit" class="btn btn-default form-btn">Save Changes</button>
                                </div>
                                <input type="hidden" name='longitude' value="{{Auth::user()->longitude}}">
                                <input type="hidden" name='latitude' value="{{Auth::user()->latitude}}">
                                {{csrf_field()}}
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop
@section('js')
<script src="{!!asset('user-interface')!!}/js/jquery.datetimepicker.full.min.js"></script>
<script src="https://maps.google.com/maps/api/js?sensor=false"></script>
    <script type="text/javascript">


        if (navigator.geolocation) {
            navigator.geolocation.getCurrentPosition(showPosition);
        } else {
            alert("Geolocation is not supported by this browser.");
        }

        function showPosition(position) {

            if(!$("#google_location").val()) {
                var geocoder = new google.maps.Geocoder();
                var latLng = new google.maps.LatLng(position.coords.latitude, position.coords.longitude);

                if (geocoder) {
                    geocoder.geocode({'latLng': latLng}, function (results, status) {
                        if (status == google.maps.GeocoderStatus.OK) {
                            console.log(results[0].formatted_address);
                            $("#google_location").val(results[0].formatted_address);
                        }
                        else {
                            $("#google_location").val(results[0].formatted_address);
                            console.log("Geocoding failed: " + status);
                        }
                    }); //geocoder.geocode()
                }
            }
        }

        $('#btn-submit').on('click',function(e){

            e.preventDefault();

            var form = $(this).parents('form');
            var cPrice = $("#cleaning_price").val();

            var title = "Are you sure you want to save this Changes?";
            var content = "";
            if(cPrice) {
                content = '<form> ' +
                    '<div class="row"> ' +
                    '<span style="float: left;width: 10%">&nbsp;</span>' +
                    '<input id="radio1" style="margin: 0; box-shadow: none; width: 4%; display: block; height: 15px; float: left;" type="checkbox" name="csvSelect"> ' +
                    '<label style="width: 82%; text-align: left; cursor:pointer" for="radio1"> I agree to receive my item back unclean and will clean it myself with a charge of ' + cPrice + '  </label> ' +
                    '</div> ' +
                    '</form>';
            }

            swal({
                title             : title,
                text              : content,
                type              : "warning",
                html              : true,
                showCancelButton  : true,
                confirmButtonColor: "#DD6B55",
                confirmButtonText : "Yes",
                cancelButtonText  : "No",
                closeOnConfirm    : false,
                closeOnCancel     : false
            }, function(isConfirm){

                if(isConfirm){
                    form.submit();
                }
                else{
                    swal.close()
                }
            });
        });

        $('#cleanPrice').on('click',function(e){
            var cPrice = $("#showPrice").toggle();
        });


        function checkBodyType() {
            let breast = $('select[name="breast"]').val().slice(0, -1) * 1;
            let waist = $('select[name="waist"]').val().slice(0, -1) * 1;
            let hips = $('select[name="hips"]').val().slice(0, -1) * 1;

            let values = [waist, hips, breast];
            values.sort(function (a, b) {return a - b;});
            let square_check = ((values[2] - values[0]) / values[0]);

            let hourglass_check = Math.abs((breast - hips) / hips);

            let img = 1;
            if ( (waist > hips && breast < waist) ) {
                // $('#fifth_rdo').prop('checked', true);
                $('#fifth_rdo').click();
                img = 5;
            } else if (waist / hips <= 0.75 && waist / breast <= 0.75 && hourglass_check <= 0.05) {
                // $('#first_rdo').prop('checked', true);
                $('#first_rdo').click();
                img = 1;
            } else if (waist / hips >= 0.75 && square_check <= 0.05) {
                // $('#second_rdo').prop('checked', true);
                $('#second_rdo').click();
                img = 2;
            } else if (hips / waist >= 1.05) {
                // $('#fourth_rdo').prop('checked', true);
                $('#fourth_rdo').click();
                img = 4;

            } else if (breast / hips >= 1.05) {
                // $('#third_rdo').prop('checked', true);
                $('#third_rdo').click();
                img = 3;
            }

            $("#display-body-type-img").attr("src","{!!asset('user-interface')!!}/img/body-type-new-"+img+".png")

            let sumWeight = breast * waist * hips;

           // console.log( breast, waist, hips , sumWeight);
            if ( sumWeight <= 30000 ) {
                $('#body_size').val("Extra Small");
            }else if(sumWeight > 30000 && sumWeight <= 40000){
                $('#body_size').val("Small");
            }else if(sumWeight > 40000 && sumWeight <= 50000){
                $('#body_size').val("Medium");
            }else if(sumWeight > 50000 && sumWeight <= 70000){
                $('#body_size').val("Large");
            }else if(sumWeight > 70000){
                $('#body_size').val("Extra Large");
            }
          /*  if ( breast <= 34 && waist <= 26 && hips <= 36 ) {
                $('#body_size').val("Extra Small");
            }else if(breast > 34 && breast <= 36 && waist > 26 && waist <= 29 && hips > 36 && hips <= 39){
                $('#body_size').val("Small");
            }else if(breast > 36 && breast <= 39 && waist > 29 && waist <= 31 && hips > 39 && hips <= 41){
                $('#body_size').val("Medium");
            }else if(breast > 39 && breast <= 42 && waist > 31 && waist <= 35 && hips > 41 && hips <= 45){
                $('#body_size').val("Large");
            }else if(breast > 42  && waist > 35 && hips > 45){
                $('#body_size').val("Extra Large");
            }*/

        }
    
    firebase.auth().onAuthStateChanged(function(user) {
			  if (user) {
			    // User is signed in.
			    if(user!=null) {
						console.log("user login:"+user.uid);

					}
			  } else {
			    // No user is signed in.
			    console.log("user not login");
			  }
			});
        $('#datepicker').datetimepicker({
            timepicker:false,
            format    :'m/d/Y',
        });
        $(document).on("click",".trigger-image",function(){
            $("#open-image").click();
        });

        function readURL(fileURL) {

            var file    = fileURL.files[0];
            var reader  = new FileReader();
            reader.onloadend = function () {
                $("#remove-image").show();
                $('.display-image').attr('src',reader.result);
                $('.image-name').text(file.name);
            }
            if (file) {
                reader.readAsDataURL(file);
            } else {
                $("#remove-image").hide();
                $('.display-image').attr('src',"{!!Auth::user()->profile_picture!!}");
                $('.image-name').text("No Image Selected");
            }


        }

        /*$('#open-image').change(function(){
            var file    = this.files[0];
            var reader  = new FileReader();
            reader.onloadend = function () {
                $("#remove-image").show();
                $('.display-image').attr('src',reader.result);
                $('.image-name').text(file.name);
            }
            if (file) {
                reader.readAsDataURL(file);
            } else {
                $("#remove-image").hide();
                $('.display-image').attr('src',"{!!Auth::user()->profile_picture!!}");
                $('.image-name').text("No Image Selected");
            }
        });*/

        $(document).on("click","#remove-image",function(){
            $("#remove-image").hide();
            $('.display-image').attr('src',"{!!Auth::user()->profile_picture!!}");
            $('.image-name').text("No Image Selected");
        });
        $('.number_decimal').keypress(function(event){
            if((event.which != 46 || $(this).val().indexOf('.') != -1) && (event.which < 48 || event.which > 57)) {
                event.preventDefault();
            }
        });
        $(document).ready(function() {
            $('.popup-with-form').magnificPopup({
                type: 'inline'
            });
        });
        $(document).on("change","input[name='body_type']",function(){
            $("#display-body-type-img").attr("src","{!!asset('user-interface')!!}/img/body-type-new-"+$(this).val()+".png")
        });
        $(document).on("click","#confirm-body-type",function(){
            $.magnificPopup.close();
        })
        // GOOGLE LOCATION SECTION //
        var autocomplete;
        function initAutocomplete(){
        //alert("sfsafas 123131313");
            autocomplete = new google.maps.places.Autocomplete(
            (document.getElementById('google_location')),
            {types: ['geocode']});
            autocomplete.addListener('place_changed', fillInAddress);
        }
        function fillInAddress(){
            var place = autocomplete.getPlace();
            $(document).ready(function(){
           
                $("input[name='longitude']").val(place.geometry.location.lng().toFixed(6));
                $("input[name='latitude']").val(place.geometry.location.lat().toFixed(6));
            });
        }
        // END GOOGLE LOCATION SECTION //
        url= "<?php echo url('');?>/";
                    	_token = $("input[name=_token]").val();
        $(document).on("submit","#profile-form", function(){
            // Set form data
            var formData = new FormData($(this)[0]);

            try {
                for (var pair of formData.entries()) {
                    if (pair[1] instanceof File && pair[1].name == '' && pair[1].size == 0)
                        formData.delete(pair[0]);
                }
            } catch(e) {

                console.log(e);

            }

            $.ajax({
                'url'        : "{!! URL('profile/save') !!}",
                'method'     : 'post',
                'dataType'   : 'json',
                'data'       : formData,
                'processData': false,
                'contentType': false,
                success      : function(data){
                    $(".profile-error").empty();
                    if(data.result == 'success'){
                    
                        firebase.auth().onAuthStateChanged(function(user) {
                        
			  if (user) {
			    // User is signed in.
			    if(user!=null) {
						console.log("user login:"+user.uid);
						firebase.database().ref('Users/'+user.uid).set({
			 				    device_token: '',
			 				    name: data.user.first_name+' '+data.user.last_name,
			 				    image: url+data.user.profile_picture
							  },function(error) {
							    if (error) {
							        console.log('Operation failed');
							    } else {
							        swal("Good job!", "Account has been updated.", "success");
							        id_password = $("#id_password").val();
							        
							        if(id_password!="") {
							        
							        	var user = firebase.auth().currentUser;
					
					
										user.updatePassword(id_password).then(function() {
									  // Update successful.
									  //alert('firebase pasword change');
									}, function(error) {
									  // An error happened.
									});
							        }
							        
							    }
							});

					}
			  } else {
			    // No user is signed in.
			    console.log("user not login");
			    swal("Good job!", "Account has been updated.", "success");
			  }
			});
                        
                    } else if (data.result == 'success_with_email_update') {
                    	firebase.auth().onAuthStateChanged(function(user) {
			  if (user) {
			    // User is signed in.
			    if(user!=null) {
						console.log("user login:"+user.uid);
						firebase.database().ref('Users/'+user.uid).set({
			 				    device_token: '',
			 				    name: data.user.first_name+' '+data.user.last_name,
			 				    image: url+data.user.profile_picture
							  },function(error) {
							    if (error) {
							        console.log('Operation failed');
							    } else {
							        swal("Good job!", "Account has been updated. and email verification send to your email address. please verify email and login again.", "success");
                     setTimeout(function(){window.location.href= window.location.href},2500);
							    }
							});

					}
			  } else {
			    // No user is signed in.
			    console.log("user not login");
			    swal("Good job!", "Account has been updated.", "success");
			  }
			});
                        
                    }
                    else{
                        swal("Action failed", "Please check your inputs or connection and try again.", "error");
                        //;
                        $.each(data.errors,function(key,value){
                            if(value != ""){
                                $("#profile_"+key).text(value);
                            }
                        });
                    }
                },
                beforeSend : function(){
                    $('#loadingDiv').show()
                },
                complete   : function(){
                    $('#loadingDiv').hide();
                }
            });
            return false;
        });
        
       
    </script>
    <script defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCX4SwO87SkUA_iKjehYl2-C0RWuvVFmLM&libraries=places&callback=initAutocomplete"></script>
    @if(Session::has('login_type') && Session::get('login_type')=="FACEBOOK" )
    	firebase.auth().signOut();
    	
    	<script type="text/javascript">
    	 url= "<?php echo url('');?>/";
        _token = $("input[name=_token]").val();
        
        
  	//firebase.initializeApp(config);
  	
  	
    	var provider = new firebase.auth.FacebookAuthProvider();
		provider.addScope('user_birthday');
		provider.setCustomParameters({
	  'display': 'popup'
	});
firebase.auth().signInWithRedirect(provider);
	
			
			firebase.auth().getRedirectResult().then(function(result) {
			  if (result.credential) {
			    // This gives you a Facebook Access Token. You can use it to access the Facebook API.
			    var token = result.credential.accessToken;
			    // ...
			  }
			  // The signed-in user info.
			  var user = result.user;
			  
			  user_id = "<?php echo Auth::user()->id;?>";
					  $.post(url+"update_firebase_id",{id:user_id,firebase_id:user.uid,_token:_token },function(data){
								console.log("data:"+data);
							});
			  //alert("successfully:"+user.uid); 
			 
			}).catch(function(error) {
			  // Handle Errors here.
			  var errorCode = error.code;
			  var errorMessage = error.message;
			  // The email of the user's account used.
			  var email = error.email;
			  // The firebase.auth.AuthCredential type that was used.
			  var credential = error.credential;
			  //alert("Errors "+errorMessage);
			  // ...
			});
    	</script>
    @elseif(Session::has('login_type') && Session::get('login_type')=="TWITTER" )
    //firebase.auth().signOut();
    //firebase.auth().signOut();
    	
	//return false;
    	<script type="text/javascript">
    	 url= "<?php echo url('');?>/";
        _token = $("input[name=_token]").val();
        
        
  	//firebase.initializeApp(config);
  	
  	
    	var provider = new firebase.auth.TwitterAuthProvider();
		provider.setCustomParameters({
	  'lang': 'es'
	});
	firebase.auth().signInWithRedirect(provider);
	
			
			firebase.auth().getRedirectResult().then(function(result) {
	  			if (result.credential) {
			    // This gives you a Facebook Access Token. You can use it to access the Facebook API.
			    var token = result.credential.accessToken;
			    // ...
			  }
			  // The signed-in user info.
			  var user = result.user;
			  //alert("successfully"); 
			  //alert("successfully:"+user.uid); 
			  user_id = "<?php echo Auth::user()->id;?>";
			  $.post(url+"update_firebase_id",{id:user_id,firebase_id:user.uid,_token:_token },function(data){
								console.log("data:"+data);
							});
			 
			}).catch(function(error) {
			  // Handle Errors here.
			  var errorCode = error.code;
			  var errorMessage = error.message;
			  // The email of the user's account used.
			  var email = error.email;
			  // The firebase.auth.AuthCredential type that was used.
			  var credential = error.credential;
			  //alert("Errors: "+errorMessage);
			  // ...
			});
			</script>
    @else
    <script type="text/javascript">
     url= "<?php echo url('');?>/";
        _token = $("input[name=_token]").val();
    firebase.auth().getRedirectResult().then(function(result) {
	  			if (result.credential) {
			    // This gives you a Facebook Access Token. You can use it to access the Facebook API.
			    var token = result.credential.accessToken;
			    // ...
			  }
			  // The signed-in user info.
			  var user = result.user;
			  user_id = "<?php echo Auth::user()->id;?>";
			  $.post(url+"update_firebase_id",{id:user_id,firebase_id:user.uid,_token:_token },function(data){
								console.log("data:"+data);
							});
			  //alert("successfully"); 
			  //alert("successfully outside:"+user.uid); 
			 
			}).catch(function(error) {
			  // Handle Errors here.
			  var errorCode = error.code;
			  var errorMessage = error.message;
			  // The email of the user's account used.
			  var email = error.email;
			  // The firebase.auth.AuthCredential type that was used.
			  var credential = error.credential;
			  //alert("Errors: "+errorMessage);
			  // ...
			});
    </script>
    @endif

@include('user-interface.cart.includes.js')

@stop