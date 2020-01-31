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
@section('title',$label.' FAQs')
@section('page_title')
    <h2><i class="fa fa-file"></i> {!! $label !!} FAQs</h2>
@stop
@section('breadcrumb')
    <li><a href="{!! URL('admin/faq-management') !!}">FAQs Management</a></li>
    <li class="active">{!! $label !!} FAQs</li>
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
                                        <a href="{!! URL('admin/faq-management') !!}"><span class="fa fa-backward"></span></a>
                                    </li>
                                </ul>                             
                            </div>
                            <form action="{!! URL('admin/faq-management/save') !!}" method="post" enctype="multipart/form-data">
                                <div class="panel-body">

                                    <div class="form-group {!!$errors->first('name') ? 'has-error' : ''!!}">
                                        <label class="col-md-1 col-xs-12 control-label">Section</label>
                                        <div class="col-md-11 col-xs-12">
                                            <input type="text" class="form-control" name="section" value="@if(old('section')){!! htmlentities(old('section')) !!}@elseif($label == 'Edit'){!!htmlentities($faq->section)!!}@endif">
                                            <span class="help-block" style="color:red">{!!$errors->first('section')!!}</span>
                                        </div>
                                    </div>

                                    <div class="form-group {!!$errors->first('name') ? 'has-error' : ''!!}">
                                        <label class="col-md-1 col-xs-12 control-label">Category</label>
                                        <div class="col-md-11 col-xs-12">
                                            <input type="text" class="form-control" name="category" value="@if(old('category')){!! htmlentities(old('category')) !!}@elseif($label == 'Edit'){!!htmlentities($faq->category)!!}@endif">
                                            <span class="help-block" style="color:red">{!!$errors->first('category')!!}</span>
                                        </div>
                                    </div>

                                    <div class="form-group {!!$errors->first('name') ? 'has-error' : ''!!}">
                                        <label class="col-md-1 col-xs-12 control-label">Question</label>
                                        <div class="col-md-11 col-xs-12">
                                            <input type="text" class="form-control" name="question" value="@if(old('question')){!! htmlentities(old('question')) !!}@elseif($label == 'Edit'){!!htmlentities($faq->question)!!}@endif">
                                            <span class="help-block" style="color:red">{!!$errors->first('question')!!}</span>
                                        </div>
                                    </div>
                                    
                                    <div class="form-group {!!$errors->first('name') ? 'has-error' : ''!!}">
                                        <label class="col-md-1 col-xs-12 control-label">Answer</label>
                                        <div class="col-md-11 col-xs-12">
                                            <textarea class="form-control" name="answer">@if(old('answer')){!! htmlentities(old('answer')) !!}@elseif($label == 'Edit'){!!htmlentities($faq->answer)!!}@endif</textarea>
                                            <span class="help-block" style="color:red">{!!$errors->first('answer')!!}</span>
                                        </div>
                                    </div>
                                    
                                                                        
                                </div>
                                <div class="panel-footer">
                                    <button class="btn btn-primary pull-right">Save</button>
                                </div>
                                @if($label == 'Edit')
                                    <input type="hidden" name="id" value="{!! Crypt::encrypt($faq->id) !!}">
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