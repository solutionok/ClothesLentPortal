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
@section('title',$label.' News')
@section('page_title')
    <h2><i class="fa fa-file"></i> {!! $label !!} News</h2>
@stop
@section('breadcrumb')
    <li><a href="{!! URL('admin/news-management') !!}">News Management</a></li>
    <li class="active">{!! $label !!} News</li>
@stop
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-body">
                    <div class="row">
                        <div class="panel panel-default">
                            <div class="panel-heading">                                
                                <h3 class="panel-title">This is where you can {!! strtolower($label) !!} a News</h3>
                                <ul class="panel-controls">
                                    <li data-toggle="tooltip" data-placement="left" title="Back">
                                        <a href="{!! URL('admin/news-management') !!}"><span class="fa fa-backward"></span></a>
                                    </li>
                                </ul>                             
                            </div>
                            <form action="{!! URL('admin/news-management/save') !!}" method="post" enctype="multipart/form-data">
                                <div class="panel-body">
                                    <div class="form-group {!!$errors->first('title') ? 'has-error' : ''!!}">
                                        <label class="col-md-2 col-xs-12 control-label">Title</label>
                                        <div class="col-md-10 col-xs-12">
                                            <input type="text" class="form-control" name="title" value="@if(old('title')){!! htmlentities(old('title')) !!}@elseif($label == 'Edit'){!!htmlentities($blog_data->self_data->title)!!}@endif">
                                            <span class="help-block" style="color:red">{!!$errors->first('title')!!}</span>
                                        </div>
                                    </div>
                                    <!--<div class="form-group {!!$errors->first('category') ? 'has-error' : ''!!}">
                                        <label class="col-md-2 col-xs-12 control-label">Categories</label>
                                        <div class="col-md-10 col-xs-12">
                                            <select name="categories[]" multiple="multiple" id="multiple_categories" class="select2"> 
                                                @foreach($categories as $value)
                                                    <option value="{!! Crypt::encrypt($value->id) !!}" @if($label == 'Edit') @foreach($blog_data->categories as $v) @if($v->category_id == $value->id) selected @endif @endforeach @endif>{!! ucwords($value->name) !!}</option>
                                                @endforeach
                                            </select>
                                            <span class="help-block form-error" style="color:red">{!!$errors->first('category') != '' ? 'The categories field is required.' : '' !!}</span>
                                        </div>
                                    </div>-->
                                    <div class="form-group {!!$errors->first('picture') ? 'has-error' : ''!!}">
                                        <label class="col-md-2 col-xs-12 control-label">Picture</label>
                                        <div class="col-md-10 col-xs-12">
                                            @if($label == 'Add')
                                                <input type="file" class="file-simple file_default" data-file="file_default" data-value="uploads/others/no_image.jpg" accept="image/jpg,image/png,image/gif" name="picture">
                                            @else
                                                <input type="file" class="file-simple file_default" data-file="file_default" data-value="{!!$blog_data->self_data->picture!!}" accept="image/jpg,image/png,image/gif" name="picture">
                                            @endif
                                            <span class="help-block" style="color:red">{!!$errors->first('picture')!!}</span>
                                        </div>
                                    </div>
                                    <div class="form-group {!!$errors->first('description') ? 'has-error' : ''!!}">
                                        <label class="col-md-2 col-xs-12 control-label">Description</label>
                                        <div class="col-md-10 col-xs-12">
                                            <textarea class="form-control summernote_simple" rows="10" col="30" name="description">@if(old('description')){!! old('description') !!}@elseif($label == 'Edit'){!!$blog_data->self_data->description!!}@endif</textarea>
                                            <span class="help-block" style="color:red">{!!$errors->first('description')!!}</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="panel-footer">
                                    <button class="btn btn-primary pull-right">Save</button>
                                </div>
                                @if($label == 'Edit')
                                    <input type="hidden" name="id" value="{!! Crypt::encrypt($blog_data->self_data->id) !!}">
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
    </script>
@stop