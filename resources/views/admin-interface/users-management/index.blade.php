@extends('admin-interface.layout')
@section('title','Users Management')
@section('page_title')
    <h2><span class="fa fa-users"></span> Address Book <small id="total_contacts">({!! $total_users !!} {!! $total_users > 1 ? 'contacts' : 'contact' !!})</small></h2>
@stop
@section('breadcrumb')
    <li class="active">Users Management</li>
@stop
@section('content')
	<div class="row">
	    <div class="col-md-12">  
	        <div class="row">
	            <div class="col-md-12">        
	                <div class="panel panel-default">
	                    <div class="panel-body">
	                        <p>Use search to find contacts. You can search by: name, email, or username.</p>
	                        <form class="form-horizontal" method="get" action="{!! URL('admin/users-management') !!}">
	                            <div class="form-group">
	                                <div class="col-md-8">
	                                    <div class="input-group">
	                                        <div class="input-group-addon">
	                                            <span class="fa fa-search"></span>
	                                        </div>
	                                        <input type="text" class="form-control" name="keyword" placeholder="Who are you looking for?" value="{!! Request::input('keyword') !!}"/>
	                                        <div class="input-group-btn">
	                                            <button type="submit" class="btn btn-primary">Search</button>
	                                        </div>
	                                    </div>
	                                </div>
	                                <div class="col-md-4">
	                                    <a href="{!! URL('admin/users-management/add') !!}" class="btn btn-info btn-block"><span class="fa fa-plus"></span> Add new user</a>
	                                </div>
	                            </div>
	                        </form>
	                    </div>
	                </div>        
	            </div>
	        </div>
	        <div class="row">
	            @forelse($users as $key => $value)
	            	<?php $name = App\User::displayName($value->id); ?>
	                <div class="col-md-3" id="delete{!!$key!!}">
	                    <div class="panel panel-default">
	                        <div class="panel-body profile">
	                            <div class="profile-image">
							        <img style="width:100px;height:131px" src="{!!asset($value->profile_picture)!!}"/>
	                            </div>
	                            <div class="profile-data">
	                                <div class="profile-data-name">
	                                	{!! $value->first_name != '' ? ucwords($value->first_name.' '.$value->last_name) : "N/A" !!}
	                                </div>
	                            </div>
	                            <div class="profile-controls">
	                                <a href="{!! URL('admin/users-management/edit/'.Crypt::encrypt($value->id)) !!}" class="profile-control-left" data-toggle="tooltip" data-placement="bottom" title="Edit"><span class="glyphicon glyphicon-edit"></span></a>
	                                <a style="cursor:pointer" data-location="{!! URL('admin/users-management/delete/'.Crypt::encrypt($value->id)) !!}" data-name="{!!$name!!}" class="profile-control-right remove-user" data-toggle="tooltip" data-placement="bottom" title="Remove"><span class="glyphicon glyphicon-remove"></span></a>
	                            </div>
	                        </div>                                
	                        <div class="panel-body">
	                            <div class="contact-info">
	                                <p><small>Email</small><br/>{!! $value->email !!}</p>
	                                <p><small>Status</small><br/>{!! $value->status == 0 ? 'Pending' : 'Active' !!}</p>
	                                <p><small>Type</small><br/>{!! $value->privilege == 0 ? 'Admin' : 'User' !!}</p>
	                            </div>
	                        </div>                                
	                    </div>
	                </div>
	            @empty
	                <div class="col-md-3">
	                    <h3>No User found</h3>
	                </div>
	            @endif
	        </div>
	        <div class="row">
	            <div class="col-md-12">
	                <ul class="pagination pagination-sm pull-right push-down-10 push-up-10">
	                	@if(Request::has('keyword'))
							{!! str_replace('?page', '&page', $users->setPath(URL::to('admin/users-management?keyword='.Request::get('keyword')))->render()) !!}
                    	@else
                        	{!! $users->appends(Request::input())->render() !!}
                        @endif
	                </ul>                            
	            </div>
	        </div>
	    </div>
	</div>
@stop
@section('js')
	<script type="text/javascript" src="{!!asset('admin-interface')!!}/js/plugins/bootstrap/bootstrap-file-input.js"></script>
	<script type="text/javascript">
	    $("body").delegate(".remove-user","click",function(e){
	        e.preventDefault();
	        var location = $(this).data("location");
	        var name     = $(this).data("name");
			swal({
				title             : "Are you sure?",
				text              : "You will not be able to recover "+name+"!",
 				type              : "warning",
				showCancelButton  : true,
				confirmButtonColor: "#DD6B55",
				confirmButtonText : "Yes, remove it!",
				cancelButtonText  : "No, cancel it!",
				closeOnConfirm    : false,
				closeOnCancel     : false 
			}, function(isConfirm){
				if(isConfirm){
					$.ajax({
		                'url'      : location,
		                'method'   : 'get',
		                'dataType' : 'json',
		                success    : function(data){
		                    if(data.result == 'success'){
		                    	window.location.reload();
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
				else{
					swal.close()
				}
			});
	    });
	</script>
@stop