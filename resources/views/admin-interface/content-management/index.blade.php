@extends('admin-interface.layout')
@section('title','Content Management')
@section('page_title')
	<h2><span class="fa fa-file"></span> Content Management</h2>
@stop
@section('breadcrumb')
    <li class="active">Content Management</li>
@stop
@section('content')
	<div class="row">
	    <div class="col-md-12">        
	        <div class="panel panel-default">
	            <div class="panel-heading">
	                <h3 class="panel-title">List of pages</h3>
	                <ul class="panel-controls">
                        <li data-toggle="tooltip" data-placement="left" title="Add">
                            <a href="{!! URL('admin/content-management/add') !!}"><span class="fa fa-plus"></span></a>
                        </li>
                    </ul>
	            </div>
	            <div class="panel-body">
	                <table class="table datatable">
	                    <thead>
	                        <tr>
	                        	<th style="display:none">1</th>
	                            <th style="width:55px">#</th>
	                            <th>Name</th>
	                            <th>Last Update</th>
	                            <th>Action</th>
	                        </tr>
	                    </thead>
	                    <tbody>
	                        @foreach($pages as $key => $value)
                                <tr>
                                	<td style="display:none">1</td>
                                    <td>{!! $key+1 !!}</td>
                                    <td>{!! $value->name !!}</td>
                                    <td>{!! date("F d, Y h:i A", strtotime($value->updated_at)) !!}</td>
                                    <td>
                                        <div class="form-group">
                                            <a href="{!! URL('admin/content-management/edit-page/'.Crypt::encrypt($value->id)) !!}" class="btn btn-info btn-rounded" style="padding-right: 3px;" data-toggle="tooltip" data-placement="top" title="Edit"><i class="fa fa-edit" ></i></a>
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