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
                                            <div class="image-name-holder">
                                                <div class="image-name trigger-image">No Image Selected</div>
                                                <a id="remove-image" style="display:none"><i class="fa fa-times" aria-hidden="true"></i></a>
                                            </div>
                                            <div class="edit-profile trigger-image">
                                                <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                                                CHANGE PHOTO
                                            </div>
                                            <input id="open-image" class="input-file" type="file" accept="image/*" name="profile_picture"/>
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

                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label>Location</label>
                                                <input type="text" class="form-control" name='location' id="google_location" value="{{Auth::user()->location}}" placeholder="Enter your Location">
                                                <span class="profile-error errors" id="profile_location"></span>
                                            </div>
                                        </div>
                                         <div class="col-md-3">
                                            <div class="form-group">
                                                <label>Country</label>
                                                <div class="select">
                                                <select name='country' class="form-control">
                                                    <option value="none">Select</option>
                                                    @foreach($countries as $value)
                                                        <option value="{{$value->Code2}}" {{Auth::user()->country == $value->Code2 ? 'selected' : ''}}>{{$value->Name}}</option>
                                                    @endforeach
                                                </select>
                                                </div>
                                                <span class="profile-error errors" id="profile_country"></span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Email Address</label>
                                                <input type="text" class="form-control" name='email' value="{{Auth::user()->email}}" placeholder="Enter Email Address">
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
                                                <input type="text" class="form-control" name='birthday' id="datepicker" value="{{(!empty($birthdate))?date('d/m/Y', strtotime($birthdate)):''}}" placeholder="Enter your Birthday">
                                                <span class="profile-error errors" id="profile_birthday"></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-content shipping-fee">
                                    <h4>Body Type</h4>
                                    <div class="row clearfix">
                                        <div class="col-20">
                                            <div class="form-group">
                                                <label>SIZE</label>
                                                <div class="select">
                                                <select class="form-control" name='size'>
                                                    <option value="" {{Auth::user()->size == NULL ? 'selected' : ''}}>--</option>
                                                    <option value="0" {{Auth::user()->size == 0 ? 'selected' : ''}}>Extra Small</option>
                                                    <option value="1" {{Auth::user()->size == 1 ? 'selected' : ''}}>Small</option>
                                                    <option value="2" {{Auth::user()->size == 2 ? 'selected' : ''}}>Medium</option>
                                                    <option value="3" {{Auth::user()->size == 3 ? 'selected' : ''}}>Large</option>
                                                    <option value="4" {{Auth::user()->size == 4 ? 'selected' : ''}}>Extra Large</option>
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
                                                    <option value="0" {{Auth::user()->height == 0 ? 'selected' : ''}}>--</option>
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
                                                <select class="form-control" name='breast'>
                                                    <option value="0" {{Auth::user()->breast == 0 ? 'selected' : ''}}>--</option>
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
                                                <select class="form-control" name='waist'>
                                                    <option value="0" {{Auth::user()->waist == 0 ? 'selected' : ''}}>--</option>
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
                                                <select class="form-control" name='hips'>
                                                    <option value="0" {{Auth::user()->hips == 0 ? 'selected' : ''}}>--</option>
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
                                        <a href="#body-type-mp" class="form-btn popup-with-form">View</a>
                                    </div>
                                </div>
                                <div class="form-content shipping-fee">
                                    <h4>Shipping fee</h4>
                                    <div class="form-group">
                                        <div class="row">
                                            <label class="col-sm-2 control-label">Local</label>
                                            <div class="col-sm-2 relative">
                                                <input type="text" name='shipping_fee_local' class="form-control text-right number_decimal" value="{{Auth::user()->shipping_fee_local}}">
                                                <p>$</p>
                                                <span class="profile-error errors" id="profile_shipping_fee_local"></span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="row">
                                            <label class="col-sm-2 control-label">Nationwide</label>
                                            <div class="col-sm-2 relative">
                                                <input type="text" name='shipping_fee_nationwide' class="form-control text-right number_decimal" value="{{Auth::user()->shipping_fee_nationwide}}">
                                                <p>$</p>
                                                <span class="profile-error errors" id="profile_shipping_fee_nationwide"></span>
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
                                                    <input type="password" name='password' class="form-control">
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
    <script type="text/javascript">
        $('#datepicker').datetimepicker({
            timepicker:false,
            format    :'m/d/Y',
        });
        $(document).on("click",".trigger-image",function(){
            $("#open-image").click();
        });
        $('#open-image').change(function(){
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
        });
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
        $(document).on("submit","#profile-form", function(){
            // Set form data
            var formData = new FormData($(this)[0]);
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
                        swal("Good job!", "Account has been updated.", "success");
                    }
                    else{
                        swal("Action failed", "Please check your inputs or connection and try again.", "error");
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
@stop