@extends('user-interface.layout')
@section('title',App\User::displayName(Auth::user()->id))
@section('css')
    <link rel="stylesheet" href="{!!asset('css')!!}/select2.min.css">
    <link rel="stylesheet" href="{{asset('user-interface')}}/css/dropzone.min.css">
@stop

@section('content')
    <div class="dashboard post-item">
        <div class="section-1">
            <div class="mx-1254 clearfix">
                <div class="breadcrumbs">
                    <ul>
                        <li><a href="{!!URL('/')!!}">Home</a></li>
                        <li><a href="{!!URL('for-rent')!!}">For Rent</a></li>
                        <li><span>{{$label}} Item</span></li>
                    </ul>
                </div>
                <div class="dashboard-container clearfix">
                    @include('user-interface.dashboard.includes.left-sidebar')
                    <div class="col-md-9">
                        <div class="page-content">
                            <div class="page-content-header clearfix">
                                <div class="header-left">
                                    <h3>{{$label}} Item</h3>
                                </div>
                            </div>
                            <div class="listing-product-holder">
                                <form id="product-form">

                                    <meta name="csrf-token" content="{{ csrf_token() }}">

                                    <div class="main-photo">
                                        <div class="clearfix">
                                            <div class="col-md-4 text-center">
                                                <div class="item-img-holder">
                                                    @if($label == 'Edit')
                                                        <img class="item-img"
                                                             src="{!!asset($product_data->self_data->picture)!!}">
                                                    @else
                                                        <img class="item-img"
                                                             src="{!!asset('user-interface')!!}/img/img-placeholder.png">
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="col-md-8">
                                                <h2>main photo</h2>
                                                <!--<div class="image-name-holder">
                                                    <div class="image-name">No Image</div>
                                                    <a><i class="fa fa-times" aria-hidden="true" style="display: none;"></i></a>
                                                </div>-->
                                                <div class="edit-item">
                                                    <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                                                    UPLOAD
                                                </div>


                                                <input id="file-upload" class="input-file" type="file" name="picture"
                                                       accept="image/*"/>
                                            </div>
                                            <span class="product-error errors" id="product_picture"></span>
                                            <br> <br>
                                            <span style="color:red">Note:(Pictures need to be smaller than 10MB and Suppoted file type are : jpg,jpeg,png)</span>
                                        </div>
                                    </div>
                                    <div class="form-content">
                                    <!--<div class="row">
    <div class="col-md-6">
        <div class="form-group">
            <label>item name</label>
            <input type="text" class="form-control" name="name" value="{{ $label == 'Edit' ? $product_data->self_data->name : '' }}">
            <span class="product-error errors" id="product_name"></span>
        </div>
    </div>
    <div class="col-md-3">
        <div class="form-group">
            <label>item Price</label>
            <div class="relative price-holder">
                <input type="text" class="form-control text-right" name="price" value="{{ $label == 'Edit' ? $product_data->self_data->price : '' }}">
                <p>$</p>
                <span class="product-error errors" id="product_price"></span>
            </div>
        </div>
    </div>
</div>-->

                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label>item name</label>
                                                    <input type="text" class="form-control" name="name"
                                                           value="{{ $label == 'Edit' ? $product_data->self_data->name : '' }}">
                                                    <span class="product-error errors" id="product_name"></span>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label>retail price</label>
                                                    <div class="relative price-holder">
                                                        <input type="text" class="form-control text-right"
                                                               name="retail_price"
                                                               value="{{ $label == 'Edit' ? $product_data->self_data->retail_price : '' }}">
                                                        <p>$</p>
                                                        <span class="product-error errors"
                                                              id="product_retail_price"></span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label>item Price (Per/Day)</label>
                                                    <div class="relative price-holder">
                                                        <input type="text" class="form-control text-right" name="price"
                                                               value="{{ $label == 'Edit' ? $product_data->self_data->price : '' }}">
                                                        <p>$</p>
                                                        <span class="product-error errors" id="product_price"></span>
                                                    </div>
                                                </div>
                                            </div>
                                        <!--<div class="col-md-3">
        <div class="form-group">
            <label>item Price (Per/Week)</label>
            <div class="relative price-holder">
                <input type="text" class="form-control text-right" name="price_week" value="{{ $label == 'Edit' ? $product_data->self_data->price_week : '' }}">
                <p>$</p>
                 <span class="product-error errors" id="product_price_week"></span>
            </div>
        </div>
    </div>-->
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label>Sub photo</label>
                                                <!-- 	                                                <div class="img-post-holder">
                <div id="result" class="post-image">
                    <div class="upload-button file-input" id="upload-button"> 
                        <img src="{!!asset('user-interface')!!}/img/upload-placeholder.png">
                    </div>
                </div>
                <input type="file" id="files" class="form-group file-upload" name="photos[]" multiple>
                <input type="hidden" id="subPhotos" name="sub_photos"  multiple>
            </div> -->
                                                    <div class="dropzone dropzoneEdit pos_rel">
                                                        <div class="fallback">
                                                            <input name="file" type="file" accept="image/jpg,image/png"
                                                                   multiple/>
                                                        </div>
                                                    </div>
                                                    <br>
                                                    <span style="color:red">Note:(sub photos need to be smaller than 10MB and Suppoted file type are : jpg,jpeg,png and allow max 3 photos)</span>
                                                    <span class="product-error errors" id="product_"></span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-horizontal">
                                                    <div class="form-group">
                                                        <label class="col-sm-2 control-label">color</label>
                                                        <div class="col-sm-6">
                                                            <input type="text" class="form-control" name="color"
                                                                   value="{{ $label == 'Edit' ? $product_data->self_data->color : '' }}">
                                                            <span class="product-error errors"
                                                                  id="product_color"></span>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="col-sm-2 control-label">select a category</label>
                                                        <div class="col-sm-6">
                                                            <div class="select">
                                                                <select class="form-control" name="categories" id="categories">
                                                                    <option value="">Please select category</option>
                                                                    @foreach($categories as $value)
                                                                        <option data-name="{{$value->name}}" value="{{$value->id}}" @if($label == 'Edit') @foreach($product_data->categories as $c) {{ $value->id == $c->category_id ? 'selected' : '' }} @endforeach @endif>{{$value->name}}</option>
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                            <span class="product-error errors"
                                                                  id="product_category"></span>
                                                        </div>
                                                    </div>

                                                    <?php
                                                    $shoesSize = "hidden";
                                                    $otherSize = "";
                                                    if($label == 'Edit' && $product_data->categories[0]->name === "Shoes") {
                                                        $shoesSize = "";
                                                        $otherSize = "hidden";
                                                    }
                                                    ?>

                                                    <div class="form-group {{$otherSize}} otherSize">
                                                        <label class="col-sm-2 control-label">size</label>
                                                        <div class="col-sm-6">
                                                            <div class="select">
                                                                <select class="form-control" id="otherSize" name="otherSize">
                                                                    <option value="none">Select a size</option>
                                                                    <option value="Extra Small" {{ $label == 'Edit' && $product_data->self_data->size == 'Extra Small' ? 'selected' : '' }}>
                                                                        Extra Small
                                                                    </option>
                                                                    <option value="Small" {{ $label == 'Edit' && $product_data->self_data->size == 'Small' ? 'selected' : '' }}>
                                                                        Small
                                                                    </option>
                                                                    <option value="Medium" {{ $label == 'Edit' && $product_data->self_data->size == 'Medium' ? 'selected' : '' }}>
                                                                        Medium
                                                                    </option>
                                                                    <option value="Large" {{ $label == 'Edit' && $product_data->self_data->size == 'Large' ? 'selected' : '' }}>
                                                                        Large
                                                                    </option>
                                                                    <option value="Extra Large" {{ $label == 'Edit' && $product_data->self_data->size == 'Extra Large' ? 'selected' : '' }}>
                                                                        Extra Large
                                                                    </option>
                                                                </select>
                                                            </div>
                                                            <span class="product-error errors" id="product_size"></span>
                                                        </div>
                                                    </div>

                                                    <input type="hidden" name="size" id="size" class="size-field"/>

                                                    <div class="form-group {{$shoesSize}} shoesSize">
                                                        <label class="col-sm-2 control-label">size</label>
                                                        <div class="col-sm-6">
                                                            <input type="number" class="form-control" id="shoesSize" name="shoesSize"
                                                                   value="{{ $label == 'Edit' ? $product_data->self_data->size : '' }}" step="0.5">
                                                            <span class="product-error errors"
                                                                  id="product_size"></span>
                                                        </div>
                                                    </div>

                                                    <div class="form-group">
                                                        <label class="col-sm-2 control-label">Alteration</label>
                                                        <div class="col-sm-6">
                                                            <div class="select">
                                                                <select class="form-control" name="alteration">
                                                                    <option value="Yes" {{ $label == 'Edit' && $product_data->self_data->alteration == 'Yes' ? 'selected' : '' }}>
                                                                        Yes
                                                                    </option>
                                                                    <option value="No" {{ $label == 'Edit' && $product_data->self_data->alteration == 'No' ? 'selected' : '' }}>
                                                                        No
                                                                    </option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="col-sm-2 control-label">Select a condition</label>
                                                        <div class="col-sm-6">
                                                            <div class="select">
                                                                <select class="form-control" name="condition">
                                                                    <option value="Like New" {{ $label == 'Edit' && $product_data->self_data->condition == 'Like New' ? 'selected' : '' }}>
                                                                        Like New
                                                                    </option>
                                                                    <option value="Slightly Worn" {{ $label == 'Edit' && $product_data->self_data->condition == 'Slightly Worn' ? 'selected' : '' }}>
                                                                        Slightly Worn
                                                                    </option>
                                                                    <option value="Still Looks Good" {{ $label == 'Edit' && $product_data->self_data->condition == 'Still Looks Good' ? 'selected' : '' }}>
                                                                        Still Looks Good
                                                                    </option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="col-sm-2 control-label">Season</label>
                                                        <div class="col-sm-6">
                                                            <div class="select">
                                                                <select class="form-control" name="season">
                                                                    <option value="none">Select a season</option>
                                                                    <option value="Spring" {{ $label == 'Edit' && $product_data->self_data->season == 'Spring' ? 'selected' : '' }}>
                                                                        Spring
                                                                    </option>
                                                                    <option value="Summer" {{ $label == 'Edit' && $product_data->self_data->season == 'Summer' ? 'selected' : '' }}>
                                                                        Summer
                                                                    </option>
                                                                    <option value="Fall" {{ $label == 'Edit' && $product_data->self_data->season == 'Fall' ? 'selected' : '' }}>
                                                                        Fall
                                                                    </option>
                                                                    <option value="Winter" {{ $label == 'Edit' && $product_data->self_data->season == 'Winter' ? 'selected' : '' }}>
                                                                        Winter
                                                                    </option>
                                                                </select>
                                                            </div>
                                                            <span class="product-error errors"
                                                                  id="product_season"></span>
                                                        </div>
                                                    </div>

                                                    <div class="form-group">
                                                        <label class="col-sm-2 control-label">Designer </label>
                                                        <div class="col-sm-6">
                                                            <input type="text" class="form-control" name="designer"
                                                                   value="{{ $label == 'Edit' ? $product_data->self_data->designer : '' }}">
                                                            <span class="product-error errors"
                                                                  id="product_designer"></span>
                                                        </div>
                                                    </div>

                                                    <div class="form-group">
                                                        <label class="col-sm-2 control-label">Cancellation
                                                            selection</label>
                                                        <div class="col-sm-10">
                                                            <select class="form-control" name="cancellation">
                                                                <option value="0" {{ $label == 'Edit' && $product_data->self_data->cancellation == '0' ? 'selected' : '' }}>
                                                                    Aggressive (Item may be cancelled without penalty 6-8 days prior the rental period)
                                                                </option>

                                                                <option value="1" {{ $label == 'Edit' && $product_data->self_data->cancellation == '1' ? 'selected' : '' }}>
                                                                    Moderate (Bookings may be canceled without penalty more than ten (10) days before the beginning of the Rental Period)
                                                                </option>
                                                            </select>

                                                        </div>
                                                    </div>


                                                    <div class="form-group">
                                                        <label class="col-sm-2 control-label">Description</label>
                                                        <div class="col-sm-10">
                                                            <textarea class="text-control" rows="5"
                                                                      name="description">{{ $label == 'Edit' ? $product_data->self_data->description : '' }}</textarea>
                                                            <span class="product-error errors"
                                                                  id="product_description"></span>
                                                        </div>
                                                    </div>


                                                    <div class="form-group">
                                                        <div class="col-md-12">
                                                            <div class="col-md-10">
                                                                <div class="form-group">
                                                                    <input type="checkbox" name="cleanPrice" id="cleanPrice" {{ $label == 'Edit' && $product_data->self_data->cleaning_price ? "checked" : "" }}/>
                                                                    I agree to receive my item back unclean and will
                                                                    clean it myself with a charge of
                                                                </div>
                                                            </div>
                                                            <div class="col-md-2">
                                                                <div class="form-group">
                                                                    <input type="number" class="form-control"
                                                                           id="cleaning_price" name='cleaning_price'
                                                                           value="{{$label == 'Edit' && $product_data->self_data->cleaning_price ? $product_data->self_data->cleaning_price : ""}}"
                                                                           placeholder="Amount">
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    @if($label == 'Edit')
                                                        <input type="hidden" name="sub_photos" value="{{$sub_photos}}"
                                                               id="sub_photos">
                                                    @else
                                                        <input type="hidden" name="sub_photos" value="" id="sub_photos">
                                                    @endif
                                                    @if($label == 'Post')
                                                    <!-- <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                        <div class="checkbox">
                            <input type="checkbox" id="terms" name="terms_condition">
                            <label for="terms">I Agree to <a href="{{URL('terms-and-conditions')}}" target="_blank">Terms and Conditions</a></label>
                        </div>
                        <span class="product-error errors" id="product_terms_condition"></span>
                    </div>
                </div> -->
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    {{--@if(Auth::user()->verify_paypal_email==1)--}}
                                        <div class="text-right">
                                            <button type="submit" class="btn btn-default form-btn">Save</button>
                                        </div>
                                        @if($label == 'Edit')
                                            <input type="hidden" name="id" value="{{$product_data->self_data->id}}">
                                        @endif
                                        {{ csrf_field() }}
                                    {{--@endif--}}
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop
@section('js')
    <script src="{!!asset('js')!!}/select2.min.js"></script>
    <script src="{!!asset('user-interface')!!}/js/dropzone.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/exif-js"></script>
    <script type="text/javascript">
        $(document).ready(function () {

            $("#categories").on("change", function () {

                var catID = this.value;

                console.log(catID);

                if(catID == 10) {
                    $(".shoesSize").removeClass("hidden");
                    $(".otherSize").addClass("hidden");
                } else {
                    $(".shoesSize").addClass("hidden");
                    $(".otherSize").removeClass("hidden");
                }

            });

            function readURL(input) {
                if (input.files && input.files[0]) {
                    var reader = new FileReader();
                    type = input.files[0].type;
                    if (type == "image/jpg" || type == "image/jpeg" || type == "image/png") {

                    } else {
                        alert("Supported file type are : jpg,jpeg,png");
                        return false;
                    }
                    size = (((input.files[0].size) / 1024) / 1024).toFixed(2);
                    if (size > 10) {
                        alert("Image Size Must be less or equal 10MB");
                        return false;
                    }
                    reader.onload = function (e) {
                        $('.item-img').attr('src', e.target.result);
                        $('.image-name').html($("#file-upload").val());
                    }
                    reader.readAsDataURL(input.files[0]);
                }
            }

            $("#file-upload").on('change', function () {
                readURL(this);
            });
            $(".edit-item").on('click', function () {
                $("#file-upload").click();
            });
        });
        // Multiple Image
        window.onload = function () {
// collect the sup_photos
            var subPhotos = [];
            var subPhotosResult = [];
// set the value

//Check File API support
            if (window.File && window.FileList && window.FileReader) {
                var filesInput = document.getElementById("files");
                if(!filesInput){
                    return;
                }
                filesInput.addEventListener("change", function (event) {
                    var files = event.target.files; //FileList object
                    var output = document.getElementById("result");
                    for (var i = 0; i < files.length; i++) {
                        var file = files[i];
//Only pics
                        if (!file.type.match('image'))
                            continue;
                        var picReader = new FileReader();
                        picReader.addEventListener("load", function (event) {
                            var picFile = event.target;
                            var div = document.createElement("div");
                            subPhotos.push(file);
                            document.getElementById("subPhotos").value = subPhotos;

                            div.innerHTML = "<img src='" + picFile.result + "'" + "title='" + file.name + "'/>" +
                                "<a href='' class='close-btn'><i class='fa fa-times' aria-hidden='true'></i></a>";
                            output.insertBefore(div, null);
                        });
//Read the image
                        picReader.readAsDataURL(file);
                    }
                });
            }
            else {
                console.log("Your browser does not support File API");
            }
            $('#upload-button').click(function () {
                $('#files').click();
            });
        }

        // ----------------------------------------------------------------------------------------------------------------------------------------


        $(function () {

        myDropzone = new Dropzone(".dropzone", {
            url: "{!! URL('upload-by-dropzone') !!}",
            addRemoveLinks: true,
            acceptedFiles: 'image/png,image/jpeg,image/jpg',
            method: 'post',
            maxFiles: 3,
            maxFilesize: 10,
            dictDefaultMessage: 'Drag and drop files here or click here to upload files',
            sending: function (file, xhr, formData) {
                formData.append("_token", '{{ csrf_token() }}');
                formData.append("label", 'items');
                formData.append("ip", '{{Auth::user()->id}}');
                $(".dz-message").hide();
            },
            init: function () {
                @if($label == 'Edit')
                @foreach($product_data->sub_photos as $value)
				<?php $search_replace = 'uploads/posts/' . $value->product_id . '/'; ?>
				<?php $post_file_name = str_replace( $search_replace, '', $value->sub_photo ); ?>
                // Create the mock file:
                var mockFile = {
                    filename: "{!! $post_file_name !!}",
                    name: "{!! $post_file_name !!}",
                    size: "{!! $value->size !!}"
                };
// Call the default addedfile event handler
                this.emit("addedfile", mockFile);
                this.on("error", function (file, message) {
                    alert(message);
                    this.removeFile(file);
                });
// And optionally show the thumbnail of the file:
                this.emit("thumbnail", mockFile, "{!! asset($value->sub_photo) !!}");
// Maintain limit of adding a file
                this.files.push(mockFile);
// Remove the progress bar
                this.emit("complete", mockFile)
                @endforeach
                @endif
                // Get the renamed file
                this.on("success", function (file, response) {
                    console.log(response.filename);
                    file.filename = response.filename;

                    var image = $(file.previewElement).find( $("img") );
//                    image.css({'transform' : 'rotate('+ response.rotation +'deg)'});

                    final_array = [];

                    sub_photos = $("#sub_photos").val();
                    if (sub_photos != "") {
                        sub_photos_array = sub_photos.split(',');

                        if (sub_photos_array.length > 0) {
                            for (i = 0; i < sub_photos_array.length; i++) {
                                final_array.push(sub_photos_array[i]);
                            }
                        }
                    }
                    final_array.push(response.id);

                    console.log(final_array);

                    $("#sub_photos").val(final_array.toString());
                    console.log($("#sub_photos").val());

                });
                this.on('removedfile', function (file) {
                    $.ajax({
                        type: 'POST',
                        url: "{{ URL('delete-by-dropzone')}}",
                        data: {
                            'file': file.filename,
                            'label': 'items',
                            'ip': '{{ Auth::user()->id }}',
                            "_token": '{{ csrf_token() }}'
                        },
                    });
                    if ($(".dz-preview").length == 0) {
                        $(".dz-message").show();
                    }
                });
            },
        });

        myDropzone.on("maxfilesexceeded", function (file) {
            alert("Max file upload limit reached.");
            myDropzone.removeFile(file);
        });
        // Disable auto discover for all elements
        Dropzone.autoDiscover = false;
        });

        // ----------------------------------------------------------------------------------------------------------------------------------------

        $(document).on("submit", "#product-form", function (e) {

            e.preventDefault();
            var size = '';
            if($("#categories").val() == "10") {
                size = $("#shoesSize").val();
            } else {
                size = $("#otherSize").val();
            }

            $("#size").val(size);

            var formData = new FormData($(this)[0]);


            var content = '<div class="row"> ' +
                '<span style="float: left;width: 15%">&nbsp;</span>' +
                '<input type="checkbox" name="agree" id="radio1" style="margin: 0; box-shadow: none; width: 5%; display: block; height: 15px; float: left;"> ' +
                '<label style="width: 80%; text-align: left; cursor:pointer" for="radio1">I agree to all <a target="_blank" href="{!!URL('terms-and-conditions')!!}">Terms and Conditions</a> and <a target="_blank" href="{!!URL('privacy-policy')!!}">Privacy Policy</a></label> ' +
                '</div> ';

            swal({
                title             : "Agree!",
                text              : content,
                html              : true,
                showCancelButton  : true,
                confirmButtonColor: "#DD6B55",
                customClass       : 'swal-wide',
                confirmButtonText : "Yes",
                cancelButtonText  : "No",
                closeOnConfirm    : false,
                closeOnCancel     : false
            }, function(isConfirm){
                if(isConfirm){

                    checked = $("input:checkbox[name=agree]:checked").val() ? 1 : 0;

                    if(checked) {

                        try {
                            for (var pair of formData.entries()) {
                                if (pair[1] instanceof File && pair[1].name == '' && pair[1].size == 0)
                                    formData.delete(pair[0]);
                            }
                        } catch (e) {

                            console.log(e);

                        }

                        console.log(formData);

                        $.ajax({
                            'url': "{!! URL('for-rent/save') !!}",
                            'method': 'post',
                            'dataType': 'json',
                            "headers": {
                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                            },
                            'data': formData,
                            'processData': false,
                            'contentType': false,
                            success: function (data) {
                                $(".product-error").empty();
                                if (data.result == 'success') {
                                    console.log(data.result);
                                    window.location.href = "{{URL('for-rent')}}";
                                } else {
                                    console.log(data.result);
                                    swal("Action failed", "Please check your inputs or connection and try again.", "error");
                                    $.each(data.errors, function (key, value) {
                                        if (value != "") {
                                            $("#product_" + key).text(value);
                                        }
                                    });
                                }
                            }, errror: function (data) {
                                console.log(data.result);
                                alert('error');
                            },
                            beforeSend: function () {
                                $('#loadingDiv').show()
                            },
                            complete: function () {
                                $('#loadingDiv').hide();
                            }
                        });
                        return false;
                    }

                }
                else{
                    swal.close();
                }
            });


// Set form data
        });


        $('#cleanPrice').on('click',function(e){
            var cPrice = $("#showPrice").toggle();
        });

        $("#select-categories").select2({
            placeholder: "select a category",
            allowClear: true
        });
    </script>

@stop