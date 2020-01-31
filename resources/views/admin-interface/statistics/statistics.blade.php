@extends('admin-interface.layout')
@section('title','Dashboard')
@section('content')
	<div class="col-md-4">
		<a class="tile tile-info">
			<span class="fa fa-group"><br><h4>Total Users</h4></span><br><h4>{{$loggedInUsers}}</h4>
		</a>
	</div>


	<div class="col-md-4">
		<a href="{!! URL('admin/products-stats') !!}" class="tile tile-info">
			<span class="fa fa-shopping-cart"><br><h4>Products Statistics</h4></span><br><h4>&nbsp;</h4>
		</a>
	</div>
@stop