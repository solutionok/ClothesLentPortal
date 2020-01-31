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
@section('title',$label.' Product')
@section('page_title')
    <h2><i class="fa fa-shopping-cart"></i> {!! $label !!} Product</h2>
@stop
@section('breadcrumb')
    <li><a href="{!! URL('admin/product-management') !!}">Product Management</a></li>
    <li class="active">{!! $label !!} Product</li>
@stop
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-body">
                    <div class="row">
                        <div class="panel panel-default">
                            <div class="panel-heading">                                
                                <h3 class="panel-title">This is where you can {!! strtolower($label) !!} a product</h3>
                                <ul class="panel-controls">
                                    <li data-toggle="tooltip" data-placement="left" title="Back">
                                        <a href="{!! URL('admin/product-management') !!}"><span class="fa fa-backward"></span></a>
                                    </li>
                                </ul>                             
                            </div>
                            <form action="{!! URL('admin/product-management/save') !!}" method="post" enctype="multipart/form-data">
                                <div class="panel-body">
                                    <div class="form-group {!!$errors->first('name') ? 'has-error' : ''!!}">
                                        <label class="col-md-2 col-xs-12 control-label">Name</label>
                                        <div class="col-md-10 col-xs-12">
                                            <input type="text" class="form-control" name="name" value="@if(old('name')){!! htmlentities(old('name')) !!}@elseif($label == 'Edit'){!!htmlentities($product_data->self_data->name)!!}@endif">
                                            <span class="help-block" style="color:red">{!!$errors->first('name')!!}</span>
                                        </div>
                                    </div>
                                    <div class="form-group {!!$errors->first('category') ? 'has-error' : ''!!}">
                                        <label class="col-md-2 col-xs-12 control-label">Categories</label>
                                        <div class="col-md-10 col-xs-12">
                                            <select name="categories"  id="multiple_categories_no" class="select2"> 
                                                @foreach($categories as $value)
                                                    <option value="{!! $value->id !!}" @if($label == 'Edit') @foreach($product_data->categories as $v) @if($v->category_id == $value->id) selected @endif @endforeach @endif>{!! ucwords($value->name) !!}</option>
                                                @endforeach
                                            </select>
                                            <span class="help-block form-error" style="color:red">{!!$errors->first('category') != '' ? 'The categories field is required.' : '' !!}</span>
                                        </div>
                                    </div>
                                    <div class="form-group {!!$errors->first('picture') ? 'has-error' : ''!!}">
                                        <label class="col-md-2 col-xs-12 control-label">Picture</label>
                                        <div class="col-md-10 col-xs-12">
                                            @if($label == 'Add')
                                                <input type="file" class="file-simple file_default" data-file="file_default" data-value="uploads/others/no_image.jpg" accept="image/jpg,image/png,image/gif" name="picture">
                                            @else
                                                <input type="file" class="file-simple file_default" data-file="file_default" data-value="{!!$product_data->self_data->picture!!}" accept="image/jpg,image/png,image/gif" name="picture">
                                            @endif
                                            <span class="help-block" style="color:red">{!!$errors->first('picture')!!}</span>
                                        </div>
                                    </div>
                                    <div class="form-group {!!$errors->first('description') ? 'has-error' : ''!!}">
                                        <label class="col-md-2 col-xs-12 control-label">Description</label>
                                        <div class="col-md-10 col-xs-12">
                                            <textarea class="form-control summernote_simple" rows="10" col="30" name="description">@if(old('description')){!! old('description') !!}@elseif($label == 'Edit'){!!$product_data->self_data->description!!}@endif</textarea>
                                            <span class="help-block" style="color:red">{!!$errors->first('description')!!}</span>
                                        </div>
                                    </div>
                                    <div class="form-group {!!$errors->first('price') ? 'has-error' : ''!!}">
                                        <label class="col-md-2 col-xs-12 control-label">Price</label>
                                        <div class="col-md-10 col-xs-12">
                                            <input type="text" class="form-control numbers_only" name="price" value="@if(old('price')){!! old('price') !!}@elseif($label == 'Edit'){!!$product_data->self_data->price!!}@endif">
                                            <span class="help-block" style="color:red">{!!$errors->first('price')!!}</span>
                                        </div>
                                    </div>
                                    <div class="form-group {!!$errors->first('retail_price') ? 'has-error' : ''!!}">
                                        <label class="col-md-2 col-xs-12 control-label">Retail Price</label>
                                        <div class="col-md-10 col-xs-12">
                                            <input type="text" class="form-control numbers_only" name="retail_price" value="@if(old('retail_price')){!! old('retail_price') !!}@elseif($label == 'Edit'){!!$product_data->self_data->retail_price!!}@endif">
                                            <span class="help-block" style="color:red">{!!$errors->first('retail_price')!!}</span>
                                        </div>
                                    </div>
                                    
                                    
                                    <div class="form-group {!!$errors->first('color') ? 'has-error' : ''!!}">
                                        <label class="col-md-2 col-xs-12 control-label">Color</label>
                                        <div class="col-md-10 col-xs-12">
                                            <input type="text" class="form-control " name="color" value="@if(old('color')){!! old('color') !!}@elseif($label == 'Edit'){!!$product_data->self_data->color!!}@endif">
                                            <span class="help-block" style="color:red">{!!$errors->first('color')!!}</span>
                                        </div>
                                    </div>
                                    
                                    <div class="form-group {!!$errors->first('size') ? 'has-error' : ''!!}">
                                        <label class="col-md-2 col-xs-12 control-label">Size</label>
                                        <div class="col-md-10 col-xs-12">
                                            <select class="form-control" name="size">
			                    	<option value="">Select a size</option>
			                    	<option value="Extra Small" {{ $label == 'Edit' && $product_data->self_data->size == 'Extra Small' ? 'selected' : '' }}>Extra Small</option>
			                    	<option value="Small" {{ $label == 'Edit' && $product_data->self_data->size == 'Small' ? 'selected' : '' }}>Small</option>
			                    	<option value="Medium" {{ $label == 'Edit' && $product_data->self_data->size == 'Medium' ? 'selected' : '' }}>Medium</option>
			                    	<option value="Large" {{ $label == 'Edit' && $product_data->self_data->size == 'Large' ? 'selected' : '' }}>Large</option>
			                    	<option value="Extra Large" {{ $label == 'Edit' && $product_data->self_data->size == 'Extra Large' ? 'selected' : '' }}>Extra Large</option>
			                    </select>
                                            <span class="help-block" style="color:red">{!!$errors->first('size')!!}</span>
                                        </div>
                                    </div>
                                    
                                    <div class="form-group {!!$errors->first('alteration') ? 'has-error' : ''!!}">
                                        <label class="col-md-2 col-xs-12 control-label">Alteration</label>
                                        <div class="col-md-10 col-xs-12">
                                            <select class="form-control" name="alteration">
			                    	<option value="Yes" {{ $label == 'Edit' && $product_data->self_data->alteration == 'Yes' ? 'selected' : '' }}>Yes</option>
			                    	<option value="No" {{ $label == 'Edit' && $product_data->self_data->alteration == 'No' ? 'selected' : '' }}>No</option>
			                    </select>
                                            <span class="help-block" style="color:red">{!!$errors->first('alteration')!!}</span>
                                        </div>
                                    </div>
                                    
                                    <div class="form-group {!!$errors->first('condition') ? 'has-error' : ''!!}">
                                        <label class="col-md-2 col-xs-12 control-label">Select a condition</label>
                                        <div class="col-md-10 col-xs-12">
                                            <select class="form-control" name="condition">
			                    	<option value="Like New" {{ $label == 'Edit' && $product_data->self_data->condition == 'Like New' ? 'selected' : '' }}>Like New</option>
                    	<option value="Slightly Worn" {{ $label == 'Edit' && $product_data->self_data->condition == 'Slightly Worn' ? 'selected' : '' }}>Slightly Worn</option>
                        <option value="Still Looks Good" {{ $label == 'Edit' && $product_data->self_data->condition == 'Still Looks Good' ? 'selected' : '' }}>Still Looks Good</option>
			                    </select>
                                            <span class="help-block" style="color:red">{!!$errors->first('condition')!!}</span>
                                        </div>
                                    </div>
                                    
                                    <div class="form-group {!!$errors->first('season') ? 'has-error' : ''!!}">
                                        <label class="col-md-2 col-xs-12 control-label">Season</label>
                                        <div class="col-md-10 col-xs-12">
                                            <select class="form-control" name="season">
			                    	<option value="">Select a season</option>
			                    	<option value="Spring" {{ $label == 'Edit' && $product_data->self_data->season == 'Spring' ? 'selected' : '' }}>Spring</option>
			                    	<option value="Summer" {{ $label == 'Edit' && $product_data->self_data->season == 'Summer' ? 'selected' : '' }}>Summer</option>
			                    	<option value="Fall" {{ $label == 'Edit' && $product_data->self_data->season == 'Fall' ? 'selected' : '' }}>Fall</option>
			                    	<option value="Winter" {{ $label == 'Edit' && $product_data->self_data->season == 'Winter' ? 'selected' : '' }}>Winter</option>
			                    </select>
                                            <span class="help-block" style="color:red">{!!$errors->first('season')!!}</span>
                                        </div>
                                    </div>
                                    
                                    <div class="form-group {!!$errors->first('designer') ? 'has-error' : ''!!}">
                                        <label class="col-md-2 col-xs-12 control-label">Designer </label>
                                        <div class="col-md-10 col-xs-12">
                                            <input type="text" class="form-control " name="designer" value="@if(old('designer')){!! old('designer') !!}@elseif($label == 'Edit'){!!$product_data->self_data->designer!!}@endif">
                                            <span class="help-block" style="color:red">{!!$errors->first('designer')!!}</span>
                                        </div>
                                    </div>
                                    
                                    <div class="form-group {!!$errors->first('cancellation') ? 'has-error' : ''!!}">
                                        <label class="col-md-2 col-xs-12 control-label">Cancellation  selection</label>
                                        <div class="col-md-10 col-xs-12">
                                            <select class="form-control" name="cancellation">
                                                <option value="0" {{ $label == 'Edit' && $product_data->self_data->cancellation == '0' ? 'selected' : '' }}>
                                                    Aggressive (Item may be cancelled without penalty 6-8 days prior the rental period)
                                                </option>

                                                <option value="1" {{ $label == 'Edit' && $product_data->self_data->cancellation == '1' ? 'selected' : '' }}>
                                                    Moderate
                                                </option>
                                            </select>
                                            <span class="help-block" style="color:red">{!!$errors->first('cancellation')!!}</span>
                                        </div>
                                    </div>
                                    
                                    
                                </div>
                                <div class="panel-footer">
                                    <button class="btn btn-primary pull-right">Save</button>
                                </div>
                                @if($label == 'Edit')
                                    <input type="hidden" name="id" value="{!! $product_data->self_data->id !!}">
                                @endif
                                <input type="hidden" name="category">
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
    <script type="text/javascript" src="{!!asset('admin-interface/js/plugins/summernote/summernote.js')!!}"></script>
    <script type="text/javascript" src="{!!asset('admin-interface/js/custom_summernote.js')!!}"></script>
    <script type="text/javascript" src="{!!asset('admin-interface/js/plugins/fileinput/fileinput.min.js')!!}"></script>
    <script type="text/javascript" src="{!!asset('js/select2.min.js')!!}"></script>
    <script type="text/javascript">
        $(".select2").select2({
            placeholder: "Select a category",
        });
        // File input display
        if($(".file-simple").length > 0){
            // This is for the existing fields
            $('.file-simple').each(function(){
                var file = "<img src='{!!asset('/')!!}"+$(this).data('value')+"' class='file-preview-image' style='width:100%'>"
                $("."+$(this).data('file')).fileinput({
                        showUpload  : false,
                        showCaption : false,
                        browseClass : "btn btn-info",
                        showRemove  : false,
                        showClose   : false,
                        initialPreview: [ file ],
                        initialPreviewConfig:   [{
                                                    width: '500px'
                                                }],
                        allowedFileTypes     : ["image"],
                        allowedFileExtensions: ["jpg", "png", "gif"],
                        previewconfiguration :  {
                                                    previewAsData: false,
                                                    image:  {
                                                                width: "100%"
                                                            }
                                                }
                });
            });
        }
        // Remove close
        $(".fileinput-remove").remove();
        // Numbers only
        $('.numbers_only').keypress(function(event){
            if((event.which != 46 || $(this).val().indexOf('.') != -1) && (event.which < 48 || event.which > 57)) {
                event.preventDefault();
            }
        });
    </script>
@stop