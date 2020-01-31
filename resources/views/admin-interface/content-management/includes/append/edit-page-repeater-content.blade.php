<div class="repeater-children repeater-children-{!!$page_data->id!!} repeater-children-{!!$page_data->id.'-'.date('His', strtotime($page_data->created_at))!!}" data-key="{!!date('His', strtotime($page_data->created_at))!!}" data-check='new'>
	@foreach(unserialize($page_data->repeater_fields) as $key => $value)
		<?php $field_name = 'field_repeater_'.str_replace('-','',App\Models\Helper::seoUrl($value['field_name'])).'_'.$page_data->id; ?>
		<div class="form-group clearfix">
			<label class="col-md-1 col-xs-12 control-label">{!! $value['field_name'] !!}</label>
	        <div class="col-md-10 col-xs-12">
	        	@if($value['field_type'] == 'text')
					<input type="text" class="form-control" name="{!!$field_name!!}[]">
	        	@elseif($value['field_type'] == 'textarea')
					<textarea class="form-control" rows="5" name="{!!$field_name!!}[]"></textarea>
	        	@elseif($value['field_type'] == 'image')
					<input type="file" class="file-simple file-simple-default" accept="image/jpg,image/png,image/gif" name="{!!$field_name!!}[]">
	        	@elseif($value['field_type'] == 'file')
					<input type="file" class="file-simple file-simple-default" name="{!!$field_name!!}[]">
				@elseif($value['field_type'] == 'wysiwyg_basic')
					<textarea class="form-control summernote_simple" rows="5" name="{!!$field_name!!}[]"></textarea>
				@elseif($value['field_type'] == 'wysiwyg_full')
					<textarea class="form-control summernote" rows="5" name="{!!$field_name!!}[]"></textarea>
	        	@endif
	        </div>
	        @if($key == 0)
	            <div class="col-md-1">
	    			<a class='btn btn-info btn-rounded remove-repeater' data-id="{!!$page_data->id!!}" style='padding-right:3px;'><i class='glyphicon glyphicon-remove'></i></a>
	        	</div>
	        @endif
		 </div>
	@endforeach
</div>
<script type="text/javascript" src="{!!asset('admin-interface/js/plugins/summernote/summernote.js')!!}"></script>
<script type="text/javascript" src="{!!asset('admin-interface/js/custom_summernote.js')!!}"></script>
<script type="text/javascript">
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
</script>