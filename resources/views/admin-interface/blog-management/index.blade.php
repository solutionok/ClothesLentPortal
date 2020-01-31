@extends('admin-interface.layout')
@section('title','News Management')
@section('page_title')
	<h2><span class="fa fa-book"></span> News Management</h2>
@stop
@section('breadcrumb')
    <li class="active">News Management</li>
@stop
@section('content')
	<div class="row">
	    <div class="col-md-12">
	        <div class="panel panel-default">
	            <div class="panel-heading">
	                <h3 class="panel-title">List of News</h3>
	                <ul class="panel-controls">
                        <li data-toggle="tooltip" data-placement="left" title="Add">
                            <a href="{!! URL('admin/news-management/add') !!}"><span class="fa fa-plus"></span></a>
                        </li>
                    </ul>
	            </div>
	            <div class="panel-body">
	                <table class="table datatable">
	                    <thead>
	                        <tr>
	                            <th style="width:55px">#</th>
	                            <th>Author</th>
	                            <th>Title</th>
	                            <th>Description</th>
	                            <th>Date</th>
	                            <th>Action</th>
	                        </tr>
	                    </thead>
	                    <tbody>
	                        @foreach($blog as $key => $value)
	                        	<?php $blog_data = App\Models\Blog\Blog::getData($value->id); ?>
                                <tr>
                                    <td>{!! $key+1 !!}</td>
                                    <td title="{!! $blog_data->user_data !!}">{!! str_limit($blog_data->user_data, 30, '...') !!}</td>
                                    <td title="{!! ucwords($value->title) !!}">{!! str_limit(ucwords($value->title), 50, '...') !!}</td>
                                    <td title="{!! $value->description !!}">{!! str_limit($value->description, 50, '...') !!}</td>
                                    <td>{!! date("F d, Y h:i A", strtotime($value->created_at)) !!}</td>
                                    <td style="width:16%">
                                        <div class="form-group">
                                            <a href="{!! URL('admin/news-management/edit/'.Crypt::encrypt($value->id)) !!}" class="btn btn-info btn-rounded" style="padding-right: 3px;" data-toggle="tooltip" data-placement="top" title="Edit"><i class="fa fa-edit" ></i></a>
											<a data-location="{!! URL('admin/news-management/delete/'.Crypt::encrypt($value->id)) !!}" class="btn btn-info btn-rounded delete-data" style="padding-right: 3px;" data-toggle="tooltip" data-placement="top" title="Delete"><i class="glyphicon glyphicon-remove" ></i></a>
                                        </div>
                                    </td>
                                </tr>
	                        @endforeach
	                    </tbody>
	                </table>
	            </div>            
	        </div>
	    </div>
	</div>
@stop
@section('js')
	<script type="text/javascript" src="{!!asset('admin-interface/js/plugins/datatables/jquery.dataTables.min.js')!!}"></script>
	<script type="text/javascript">
	    if($(".datatable").length > 0){                
	        $(".datatable").dataTable();
	        $(".datatable").on('page.dt',function(){
	            onresize(100);
	        });
	    }
	    $("body").delegate(".delete-data","click",function(e){
	        e.preventDefault();
	        var selector = $(this);
	        var location = selector.data("location");
			swal({
				title             : "Are you sure?",
				text              : "You are now deleting this News!",
				type              : "warning",
				showCancelButton  : true,
				confirmButtonColor: "#DD6B55",
				confirmButtonText : "Yes, delete it!",
				cancelButtonText  : "No, cancel it!",
				closeOnConfirm    : false,
				closeOnCancel     : false 
			}, function(isConfirm){
				if(isConfirm){
					setTimeout(function(){
	                    window.location = location;
	                }, 800);
				}
				else{
					swal.close();
				}
			});
	    });
	</script>
@stop