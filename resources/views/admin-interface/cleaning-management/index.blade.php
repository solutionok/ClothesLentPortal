@extends('admin-interface.layout')
@section('title','Cleaning Management')
@section('page_title')
	<h2><span class="fa fa-book"></span> Cleaning Management</h2>
@stop
@section('breadcrumb')
    <li class="active">Cleaning Management</li>
@stop
@section('content')
	<div class="row">
	    <div class="col-md-12">
	        <div class="panel panel-default">
	            <div class="panel-heading">
	                <h3 class="panel-title">List of cleaning</h3>
	                <ul class="panel-controls">
                        <li data-toggle="tooltip" data-placement="left" title="Add">
                            <a href="{!! URL('admin/cleaning-management/add') !!}"><span class="fa fa-plus"></span></a>
                        </li>
                    </ul>
	            </div>
	            <div class="panel-body">
	                <table class="table datatable">
	                    <thead>
	                        <tr>
	                            <th style="width:55px">#</th>
	                            <th>Name</th>
	                            <th>Shop Name</th>
	                            <th>Location</th>
	                            <th>Mobile Number</th>
	                            <th>Date</th>
	                            <th>Action</th>
	                        </tr>
	                    </thead>
	                    <tbody>
	                        @foreach($categories as $key => $value)
                                <tr>
                                    <td>{!! $key+1 !!}</td>
                                    <td>{!!$value->name!!}</td>
                                    <td>{!!$value->shop_name!!}</td>
                                    <td>{!!$value->location!!}</td>
                                    <td>{!!$value->mobile_number!!}</td>
                                    
                                    
                                    <td>{!! date("F d, Y h:i A", strtotime($value->created_at)) !!}</td>
                                    <td style="width:16%">
                                        <div class="form-group">
                                            <a href="{!! URL('admin/cleaning-management/edit/'.Crypt::encrypt($value->id)) !!}" class="btn btn-info btn-rounded" style="padding-right: 3px;" data-toggle="tooltip" data-placement="top" title="Edit"><i class="fa fa-edit" ></i></a>
											<a data-location="{!! URL('admin/cleaning-management/delete/'.Crypt::encrypt($value->id)) !!}" class="btn btn-info btn-rounded delete-data" style="padding-right: 3px;" data-toggle="tooltip" data-placement="top" title="Delete"><i class="glyphicon glyphicon-remove" ></i></a>
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
				text              : "You are now deleting this category!",
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