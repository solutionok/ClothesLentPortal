@extends('admin-interface.layout')
@section('title','Dashboard')
@section('content')
	<div class="col-md-4">
        <a href="{!! URL('admin/content-management') !!}" class="tile tile-info">
        	<span class="fa fa-file"><br><h4>Content Management</h4></span>
        </a>
    </div>
    <div class="col-md-4">
        <a href="{!! URL('admin/users-management') !!}" class="tile tile-info">
            <span class="fa fa-group"><br><h4>Users Management</h4></span>
        </a>
    </div>
    <div class="col-md-4">
        <a href="{!! URL('admin/product-management') !!}" class="tile tile-info">
            <span class="fa fa-shopping-cart"><br><h4>Product Management</h4></span>
        </a>
    </div>
    <div class="col-md-4">
        <a href="{!! URL('admin/news-management') !!}" class="tile tile-info">
            <span class="fa fa-book"><br><h4>News Management</h4></span>
        </a>
    </div>
    <div class="col-md-4">
        <a href="{!! URL('admin/category-management') !!}" class="tile tile-info">
            <span class="fa fa-bars"><br><h4>Category Management</h4></span>
        </a>
    </div>
    <div class="col-md-4">
        <a href="{!! URL('admin/configuration') !!}" class="tile tile-info">
        	<span class="fa fa-wrench"><br><h4>Configuration</h4></span>
        </a>
    </div>
@stop