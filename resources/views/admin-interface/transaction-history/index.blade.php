@extends('admin-interface.layout')
@section('title','Transaction History')
@section('page_title')
	<h2><span class="fa fa-shopping-cart"></span> Transaction History</h2>
@stop
@section('breadcrumb')
    <li class="active">Product Management</li>
@stop
@section('content')
	<div class="row">
	    <div class="col-md-12">
	        <div class="panel panel-default">
	            <div class="panel-heading">
	                <h3 class="panel-title">List of Transaction History</h3>
	            </div>
	            <div class="panel-body">
	                <table class="table datatable">
	                    <thead>
	                        <tr>
	                            <th style="width:55px">#</th>
	                            <th>purchase User Name</th>
	                            <th>Product Name</th>
	                            <th>Price</th>
	                            <th>Detail</th>
	                            <th>Last Update</th>
	                            
	                        </tr>
	                    </thead>
	                    <tbody>
	                        @foreach($products as $key => $value)
								@if($value->user_detail)
                                <tr>
                                    <td>{!! $key+1 !!}</td>
                                    <td title="{!! $value->user_detail ? ucwords($value->user_detail->first_name) : "User not found"!!}">{!! $value->user_detail ? str_limit(ucwords($value->user_detail->last_name), 50, '...') : "User not found" !!}</td>
                                    <td title="{!! $value->rent_details->product_detail ? $value->rent_details->product_detail->name : "Product not found" !!}">{!! $value->rent_details->product_detail ? ucwords($value->rent_details->product_detail->name) : "Product not found" !!}</td>
                                    <td title="{!! '$'.number_format($value->total_amount,2) !!}">${!! number_format($value->total_amount,2) !!}</td>
                                    <td title="{!! $value->detail !!}">{!! $value->detail !!}</td>
                                    <td>{!! date("F d, Y h:i A", strtotime($value->updated_at)) !!}</td>
                                    
                                </tr>
								@endif
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