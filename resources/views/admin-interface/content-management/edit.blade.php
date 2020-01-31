@extends('admin-interface.layout')
@section('css')
	<style type="text/css">
		.form-group:last-child { margin-bottom: 15px; }
	</style>
@stop
@section('title','Edit '.$page_data->self_data->name.' Page')
@section('page_title')
	<h2><span class="fa fa-file"></span> Edit {!! $page_data->self_data->name !!} Page</h2>
@stop
@section('breadcrumb')
	<li><a href="{!! URL('admin/content-management') !!}">Content Management</a></li>
    <li class="active">Edit {!! $page_data->self_data->name !!} Page</li>
@stop
@section('content')
	<div class="row">
	    <div class="col-md-12">        
	        <form class="form-horizontal" method="post" action="{!! URL('admin/content-management/save') !!}" enctype="multipart/form-data">
	            <div class="panel panel-default">
	                <div class="panel-heading">
	                    <h3 class="panel-title">This is where you can edit the {!! $page_data->self_data->name !!} page</h3>
	                    <ul class="panel-controls">
	                        <li data-toggle="tooltip" data-placement="left" title="Back">
	                            <a href="{!! URL('admin/content-management') !!}"><span class="fa fa-backward"></span></a>
	                        </li>
	                    </ul>
	                </div>    
					<div class="panel-body">
						<div class="row">
							<div class="panel panel-default tabs">
								<ul class="nav nav-tabs" role="tablist">
									@foreach($page_data->page_section as $key => $value)
	                                	<li class="{!! $key == 0 ? 'active' : '' !!}"><a href="#tab-{!! $value->name !!}" role="tab" data-toggle="tab">{!! $value->name !!}</a></li>
	                                @endforeach
	                            </ul>
	                            <div class="panel-body tab-content">
	                            	<?php $section_array    = []; ?>
	                            	<?php $section_distinct = 0; ?>
	                            	<?php $section_count    = count($page_data->page_content)-1; ?>
	                            	<?php $section_name     = ''; ?>
									@foreach($page_data->page_content as $key => $value)
										@if(!in_array($value->name, $section_array))
											<?php $section_array[] = $value->name; ?>
											@if($section_name != $value->name && $section_name != '' || $section_count == $key)
												</div>
											@else
												<?php $section_count++; ?>
											@endif
											<div class="tab-pane {!! $key == 0 ? 'active' : '' !!}" id="tab-{!! $value->name !!}">
										@else
											<?php $section_name = $value->name; ?>
										@endif
										@if($value->field_type == 'text')
											<div class="form-group">
	                                            <label class="col-md-1 col-xs-12 control-label">{!! $value->field_name !!}</label>
	                                            <div class="col-md-11 col-xs-12"> 
													<input type="text" class="form-control" value="{!! htmlentities($value->content) !!}" name="field_{!!$value->id!!}">
												</div>
											</div>
										@elseif($value->field_type == 'textarea')
											<div class="form-group">
	                                            <label class="col-md-1 col-xs-12 control-label">{!! $value->field_name !!}</label>
	                                            <div class="col-md-11 col-xs-12"> 
													<textarea class="form-control" rows="5" name="field_{!!$value->id!!}">{!! $value->content !!}</textarea>
												</div>
											</div>
										@elseif($value->field_type == 'image')
											<div class="form-group">
	                                            <label class="col-md-1 col-xs-12 control-label">{!! $value->field_name !!}</label>
	                                            <div class="col-md-11 col-xs-12"> 
													<input type="file" class="file-simple file_{!!$value->id!!}" data-file='file_{!!$value->id!!}' accept="image/jpg,image/png,image/gif" name="field_{!!$value->id!!}" data-value="{!! $value->content !!}">
												</div>
											</div>
										@elseif($value->field_type == 'file')
											<div class="form-group">
	                                            <label class="col-md-1 col-xs-12 control-label">{!! $value->field_name !!}</label>
	                                            <div class="col-md-11 col-xs-12"> 
													<input type="file" class="file-simple file_{!!$value->id!!}" data-file='file_{!!$value->id!!}' name="field_{!!$value->id!!}" data-value="{!! $value->content !!}">
												</div>
											</div>
										@elseif($value->field_type == 'wysiwyg_basic')
											<div class="form-group">
	                                            <label class="col-md-1 col-xs-12 control-label">{!! $value->field_name !!}</label>
	                                            <div class="col-md-11 col-xs-12"> 
													<textarea class="form-control summernote_simple" rows="5" name="field_{!!$value->id!!}">{!! $value->content !!}</textarea>
												</div>
											</div>
										@elseif($value->field_type == 'wysiwyg_full')
											<div class="form-group">
	                                            <label class="col-md-1 col-xs-12 control-label">{!! $value->field_name !!}</label>
	                                            <div class="col-md-11 col-xs-12">
													<textarea class="form-control summernote" rows="5" name="field_{!!$value->id!!}">{!! $value->content !!}</textarea>
												</div>
											</div>
										@elseif($value->field_type == 'repeater')
											<div class="panel panel-default">
								                <div class="panel-heading">
								                    <h3 class="panel-title">{!! $value->field_name !!}</h3>
								                    <ul class="panel-controls">
								                        <li data-toggle="tooltip" data-placement="left" title="Add" style="cursor:pointer">
								                            <a class="add-repeater-field" data-json='{!!base64_encode(serialize($value))!!}'><span class="fa fa-plus"></span></a>
								                        </li>
								                    </ul>
								                </div>
												<div class="panel-body">
													<div class="row repeater_display_{!!$value->id!!}">
														@if($value->content != '')
															@foreach(unserialize(base64_decode($value->content)) as $k => $v)
																<div class="repeater-children repeater-children-{!!$value->id!!} repeater-children-{!!$value->id.'-'.$k!!}" data-key="{!!$k!!}" data-check='old'>
																	@foreach($v as $vk => $mv)
																		<?php $field_name = 'field_repeater_'.str_replace('-','',App\Models\Helper::seoUrl($mv['field_name'])).'_'.$value->id; ?>
																		<div class="form-group clearfix">
																			<label class="col-md-1 col-xs-12 control-label">{!! $mv['field_name'] !!}</label>
								                                            <div class="col-md-10 col-xs-12">
								                                            	@if($mv['field_type'] == 'text')
																					<input type="text" class="form-control" name="{!!$field_name!!}[]" value="{!! htmlentities($mv['field_value']) !!}">
								                                            	@elseif($mv['field_type'] == 'textarea')
																					<textarea class="form-control" rows="5" name="{!!$field_name!!}[]">{!! $mv['field_value'] !!}</textarea>
								                                            	@elseif($mv['field_type'] == 'image')
								                                            		@if($mv['field_name'] != '')
																						<input type="file" class="file-simple file_{!!$field_name.$k!!}" data-file='file_{!!$field_name.$k!!}' accept="image/jpg,image/png,image/gif" name="{!!$field_name!!}[]" data-value="{!! $mv['field_value'] !!}">
																					@else
																						<input type="file" class="file-simple file_{!!$field_name.$k!!}" data-file='file_{!!$field_name.$k!!}' accept="image/jpg,image/png,image/gif" name="{!!$field_name!!}[]" data-value="uploads/others/no_image.jpg">
																					@endif
								                                            	@elseif($mv['field_type'] == 'file')
								                                            		@if($mv['field_name'] != '')
																						<input type="file" class="file-simple file_{!!$field_name.$k!!}" data-file='file_{!!$field_name.$k!!}' name="{!!$field_name!!}[]" data-value="{!! $mv['field_value'] !!}">
																					@else
																						<input type="file" class="file-simple file_{!!$field_name.$k!!}" data-file='file_{!!$field_name.$k!!}' name="{!!$field_name!!}[]" data-value="uploads/others/no_image.jpg">
																					@endif
																				@elseif($mv['field_type'] == 'wysiwyg_basic')
																					<textarea class="form-control summernote_simple" rows="5" name="{!!$field_name!!}[]">{!! $mv['field_value'] !!}</textarea>
																				@elseif($mv['field_type'] == 'wysiwyg_full')
																					<textarea class="form-control summernote" rows="5" name="{!!$field_name!!}[]">{!! $mv['field_value'] !!}</textarea>
								                                            	@endif
								                                            </div>
								                                            @if($vk == 0)
									                                            <div class="col-md-1">
									                                    			<a class='btn btn-info btn-rounded remove-repeater' data-id="{!!$value->id!!}" style='padding-right:3px;'><i class='glyphicon glyphicon-remove'></i></a>
										                                    	</div>
										                                    @endif
								                                   	 	</div>
									                                @endforeach
									                            </div>
															@endforeach
														@endif
														<input type="hidden" name="repeater_total_{!!$value->id!!}" value="@if($value->content != '') {!! count(unserialize(base64_decode($value->content))) !!} @else 0 @endif">
														<h5 class="note_{!!$value->id!!} {!! $value->content != '' ? 'hide' : '' !!}"><i>Nothing to display, click the button on the upper right to add a content.</i></h1>
													</div>
												</div>
											</div>
										@endif
									@endforeach
	                            </div>
	                        </div>
						</div>
					</div>
	                <div class="panel-footer">
	                	<input type="hidden" value="{!! $page_data->self_data->id !!}" name="id">
	                    <button class="btn btn-primary pull-right">Save</button>
	                </div>
	            </div>
	            {!!csrf_field()!!}
	        </form>
	    </div>
	</div>
@stop
@section('js')
	<script type="text/javascript" src="{!!asset('admin-interface/js/plugins/summernote/summernote.js')!!}"></script>
	<script type="text/javascript" src="{!!asset('admin-interface/js/custom_summernote.js')!!}"></script>
	<script type="text/javascript" src="{!!asset('admin-interface/js/plugins/fileinput/fileinput.min.js')!!}"></script>
	<script type="text/javascript">
		// File input display
		if($(".file-simple").length > 0){
			// This is for the new added fields
			$(".file-simple-default").fileinput({
			        showUpload  : false,
			        showCaption : false,
			        browseClass : "btn btn-info",
			        showRemove  : false,
			        showClose   : false,
			        initialPreview: [

			        				],
		        	initialPreviewConfig: 	[{
									            width: '500px'                     
									        }],
			        allowedFileTypes     : ["image"],
			        allowedFileExtensions: ["jpg", "png", "gif"],
			        previewconfiguration :  {
			        							previewAsData: false,
									            image: 	{
									            			width: "100%"
									            		}
									        }
			});
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
			        	initialPreviewConfig: 	[{
										            width: '500px'                     
										        }],
				        allowedFileTypes     : ["image"],
				        allowedFileExtensions: ["jpg", "png", "gif"],
				        previewconfiguration :  {
				        							previewAsData: false,
										            image: 	{
										            			width: "100%"
										            		}
										        }
				});
			});
		}
		// Add another repeater field
        $(document).on("click",".add-repeater-field",function(){
            $.ajax({
                'url'      : "{!! URL('admin/content-management/repeater-fields') !!}",
                'method'   : 'get',
                'dataType' : 'json',
                'data'     : { json : $(this).data('json') },
                success    : function(response){
                    if(response.result == 'success'){
                    	// Add the content
                    	$(".repeater_display_"+response.id).append(response.content);
                    	$(".note_"+response.id).addClass('hide');
                    	var total = $("input[name='repeater_total_"+response.id+"'").val();
                    	$("input[name='repeater_total_"+response.id+"'").val(parseInt(total)+1);
                    }
                    else{
                        swal("Action failed", "Please check your inputs or connection and try again.", "error");
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
        // Remove repeater field
        $(document).on("click",".remove-repeater",function(){
        	key   = $(this).parents('.repeater-children').data('key');
        	check = $(this).parents('.repeater-children').data('check');
        	// Remove the main children
        	$($(this).parents('.repeater-children-'+$(this).data('id')+'-'+key)).remove();
        	// Count all the children and remove if match
        	if($('.repeater-children-'+$(this).data('id')).length == 0){
        		$(".note_"+$(this).data('id')).removeClass('hide');
        	}
        	var total = $("input[name='repeater_total_"+$(this).data('id')+"'").val();
            $("input[name='repeater_total_"+$(this).data('id')+"'").val(parseInt(total)-1);
            if (check == 'old') {
	            // Remove from the database
	            $.ajax({
	                'url'      : "{!! URL('admin/content-management/remove-repeater-fields') !!}",
	                'method'   : 'get',
	                'dataType' : 'json',
	                'data'     : { key : key, id : $(this).data('id') },
	                success    : function(response){
	                    if(response.result == 'success'){
	                    	location.reload();
	                    }
	                    else{
	                        swal("Action failed", "Please check your inputs or connection and try again.", "error");
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
            }
        });
        // Remove close button
		$(".fileinput-remove").remove();
	</script>
@stop