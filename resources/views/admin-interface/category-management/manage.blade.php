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
@section('title',$label.' Category')
@section('page_title')
    <h2><i class="fa fa-file"></i> {!! $label !!} Category</h2>
@stop
@section('breadcrumb')
    <li><a href="{!! URL('admin/category-management') !!}">Category Management</a></li>
    <li class="active">{!! $label !!} Category</li>
@stop
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-body">
                    <div class="row">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h3 class="panel-title">This is where you can {!! strtolower($label) !!} a category</h3>
                                <ul class="panel-controls">
                                    <li data-toggle="tooltip" data-placement="left" title="Back">
                                        <a href="{!! URL('admin/category-management') !!}"><span class="fa fa-backward"></span></a>
                                    </li>
                                </ul>                             
                            </div>
                            <form action="{!! URL('admin/category-management/save') !!}" method="post" enctype="multipart/form-data">
                                <div class="panel-body">
                                    <div class="form-group {!!$errors->first('name') ? 'has-error' : ''!!}">
                                        <label class="col-md-1 col-xs-12 control-label">Name</label>
                                        <div class="col-md-11 col-xs-12">
                                            <input type="text" class="form-control" name="name" value="@if(old('name')){!! htmlentities(old('name')) !!}@elseif($label == 'Edit'){!!htmlentities($category->name)!!}@endif">
                                            <span class="help-block" style="color:red">{!!$errors->first('name')!!}</span>
                                        </div>
                                    </div>
                                    <div class="form-group {!!$errors->first('status') ? 'has-error' : ''!!}">
                                        <label class="col-md-1 control-label">Status</label>
                                        <div class="col-md-11">
                                            <select class="form-control select" name="status" id="select_status">
                                                <option value="0" @if($label == 'Edit') {!! $category->status == 0 ? 'selected="selected"' : '' !!}} @endif>News</option>
                                                <option value="1" @if($label == 'Edit') {!! $category->status == 1 ? 'selected="selected"' : '' !!}} @endif>Product</option>
                                            </select>
                                            <span class="help-block" style="color:red">{!!$errors->first('status')!!}</span>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <div class="clearfix">&nbsp;</div>
                                        <div class="clearfix">&nbsp;</div>
                                        <label class="col-md-12 control-label"><h3>Shipping fee</h3></label>
                                    </div>
                                    <div class="form-group {!!$errors->first('shipping_fee_local') ? 'has-error' : ''!!}">
                                        <label class="col-md-1 col-xs-12 control-label">Local </label>
                                        <div class="col-md-11 col-xs-12">
                                            <input type="number" class="form-control" name="shipping_fee_local" value="@if(old('shipping_fee_local')){!! htmlentities(old('shipping_fee_local')) !!}@elseif($label == 'Edit'){!!htmlentities($category->shipping_fee_local)!!}@endif">
                                            <span class="help-block" style="color:red">{!!$errors->first('shipping_fee_local')!!}</span>
                                        </div>
                                    </div>
                                    <div class="form-group {!!$errors->first('shipping_fee_nationwide') ? 'has-error' : ''!!}">
                                        <label class="col-md-1 col-xs-12 control-label">UPS</label>
                                        <div class="col-md-11 col-xs-12">
                                            <input type="number" class="form-control" name="shipping_fee_nationwide" value="@if(old('shipping_fee_nationwide')){!! htmlentities(old('shipping_fee_nationwide')) !!}@elseif($label == 'Edit'){!!htmlentities($category->shipping_fee_nationwide)!!}@endif">
                                            <span class="help-block" style="color:red">{!!$errors->first('shipping_fee_nationwide')!!}</span>
                                        </div>
                                    </div>
                                    <div class="form-group {!!$errors->first('picture') ? 'has-error' : ''!!}" id="picture">
                                        <label class="col-md-1 col-xs-12 control-label">Picture</label>
                                        <div class="col-md-10 col-xs-12">
                                            @if($label == 'Add')
                                                <input type="file" class="file-simple file_default" data-file="file_default" data-value="uploads/others/no_image.jpg" accept="image/jpg,image/png,image/gif" name="picture">
                                            @else
                                                <input type="file" class="file-simple file_default" data-file="file_default" data-value="{!!$category->picture!!}" accept="image/jpg,image/png,image/gif" name="picture">
                                            @endif
                                            <span class="help-block" style="color:red">{!!$errors->first('picture')!!}</span>
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
    <script type="text/javascript" src="{!!asset('admin-interface/js/plugins/fileinput/fileinput.min.js')!!}"></script>
    <script type="text/javascript" src="{!!asset('admin-interface/js/plugins/bootstrap/bootstrap-select.js')!!}"></script>
    @if($label == 'Edit')
        <script>
            $(document).ready(function(){   
                if({!! $category->status !!} == 1){
                    $('#picture').show();
                } else{
                    $('#picture').hide();
                }
            });        
        </script>
    @else
        <script>
            $(document).ready(function(){  
                $('#picture').hide();
            });
        </script>    
    @endif    
    <script>
        $(document).on("change","#select_status",function(){        
            if($('#select_status option:selected').text() == "Product"){
                $('#picture').show();
            } else{
                $('#picture').hide();
            }
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
    </script>
@stop