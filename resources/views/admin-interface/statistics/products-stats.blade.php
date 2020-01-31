@extends('admin-interface.layout')
@section('title','Statistics')
@section('page_title')
	<h2><span class="fa fa-shopping-cart"></span> Statistics</h2>
@stop
@section('breadcrumb')
	<li class="active">Statistics</li>
@stop
@section('content')
	<div class="row">
		<div class="col-md-12">
			<div class="panel panel-default">
				<div class="panel-heading">
					<h3 class="panel-title">Users Statistics</h3>
				</div>
				<div class="panel-body">
					<table class="table datatable">
						<thead>
						<tr>
							<th style="display: none"></th>
							<th style="width: 330px">Product Name</th>
							<th class="sorting_desc" aria-sort="descending">Statistics</th>
							<th>Action</th>
						</tr>
						</thead>
						<tbody>
						@foreach($products as $key => $value)
							<tr>
								<td style="display: none"></td>
								<td title="{!! ucwords($value->name) !!}">{!! str_limit(ucwords($value->name), 50, '...') !!}</td>
								<td title="{!! $value->orders !!}">{!! $value->orders !!}</td>
								<td style="width:10%">
									<div class="form-group">
										<a href="{!! URL('admin/product-management/edit/'.Crypt::encrypt($value->id)) !!}" class="btn btn-info btn-rounded" style="padding-right: 3px;" data-toggle="tooltip" data-placement="top" title="Edit"><i class="fa fa-edit" ></i></a>
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

	</script>
@stop