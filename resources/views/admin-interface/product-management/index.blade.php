@extends('admin-interface.layout')
@section('title','Product Management')
@section('page_title')
	<h2><span class="fa fa-shopping-cart"></span> Product Management</h2>
@stop
@section('breadcrumb')
    <li class="active">Product Management</li>
@stop
@section('content')
	<div class="row">
	    <div class="col-md-12">
	        <div class="panel panel-default">
	            <div class="panel-heading">
	                <h3 class="panel-title">List of product</h3>
					<span class="pull-right">
						<h3 class="panel-title"><a style="{{$deleted ? "" : "color: #428bca"}}" href="{!! URL('admin/product-management/') !!}">Activated</a> |
							<a style="{{$deleted ? "color: #428bca" : ""}}" href="{!! URL('admin/product-management?deleted=true') !!}">Deleted</a></h3>
					</span>
	            </div>
	            <div class="panel-body">
	                <table class="table datatable">
	                    <thead>
	                        <tr>
	                            <th style="width:55px">#</th>
	                            <th>Name</th>
	                            <th>Description</th>
	                            <th>Price</th>
	                            <th>Last Update</th>
	                            <th>Action</th>
	                        </tr>
	                    </thead>
	                    <tbody>
	                        @foreach($products as $key => $value)
                                <tr>
                                    <td>{!! $key+1 !!}</td>
                                    <td title="{!! ucwords($value->name) !!}">{!! str_limit(ucwords($value->name), 50, '...') !!}</td>
                                    <td title="{!! $value->description !!}">{!! str_limit($value->description, 50, '...') !!}</td>
                                    <td title="{!! '$'.number_format($value->price,2) !!}">${!! number_format($value->price,2) !!}</td>
                                    <td>{!! date("F d, Y h:i A", strtotime($value->updated_at)) !!}</td>
                                    <td style="width:10%">
                                        <div class="form-group">
                                            <a href="{!! URL('admin/product-management/edit/'.Crypt::encrypt($value->id)) !!}" class="btn btn-info btn-rounded" style="padding-right: 3px;" data-toggle="tooltip" data-placement="top" title="Edit"><i class="fa fa-edit" ></i></a>
											@if(!$value->is_deleted)
												<a data-location="{!! URL('admin/product-management/delete/'.Crypt::encrypt($value->id)) !!}" class="btn btn-info btn-rounded delete-data" style="padding-right: 3px;" data-toggle="tooltip" data-placement="top" title="Delete"><i class="glyphicon glyphicon-remove" ></i></a>
											@endif
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
				text              : "You are now deleting this product!",
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