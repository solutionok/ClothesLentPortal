<!doctype html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang="{{ config('app.locale') }}"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang="{{ config('app.locale') }}"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" lang="{{ config('app.locale') }}"> <![endif]-->
<!--[if gt IE 8]><!-->
<html class="no-js" lang="{{ config('app.locale') }}">
    <!--<![endif]-->
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <title>@yield('title')</title>
        <meta name="description" content="This online service provides an opportunity for women to rent and display quality suits and garments for business, special occasions or events at an affordable price. Phone: 1(833) 311-RENT / (833) 311-7368"/>
        <meta name="keywords" content="@yield('keywords')"/>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        @include('user-interface.includes.css')
    </head>
    <body>
    <div>
        @include('user-interface.includes.js')
        <div id="loadingDiv"></div>
            @include('user-interface.includes.popup.index')
            @include('user-interface.includes.header')
            @yield('content')
            @include('user-interface.includes.footer')
        </div>

        @if(Session::has('login_error') && Session::get('login_error')!="")
	<script>
	$(document).ready(function(){
	$('.login_modal').trigger('click');
	});
	</script>
	@endif
    </body>
</html>