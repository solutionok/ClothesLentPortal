<!DOCTYPE html>
<html lang="{{ config('app.locale') }}" class="@yield('class')">
    <head>        
        <title>Admin | @yield('title')</title>            
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        @include('admin-interface.includes.css')
    </head>
    <body>
        <div id="loadingDiv"></div>
        @if(Request::segment('2') == null && !Auth::check() || Request::segment('2') == null && Auth::check() && !Auth::user()->isAdmin() || Request::segment('2') == 'forgot-password' || Request::segment('2') == 'reset-password')
            @yield('content')
        @else
            <div class="page-container">
                @include('admin-interface.includes.left-sidebar')
                <div class="page-content">
                    <ul class="x-navigation x-navigation-horizontal x-navigation-panel">
                        <li class="xn-icon-button">
                            <a href="#" class="x-navigation-minimize"><span class="fa fa-dedent"></span></a>
                        </li>
                        <li class="xn-icon-button pull-right">
                            <a href="#" class="mb-control" data-box="#mb-signout"><span class="fa fa-sign-out"></span></a>             
                        </li> 
                    </ul>
                    <ul class="breadcrumb">
                        <li><a href="{!! URL('admin') !!}">Dashboard</a></li>
                        @yield('breadcrumb')
                    </ul>
                    <div class="page-title">
                        @yield('page_title')
                    </div>
                    <div class="page-content-wrap">
                        @yield('content')
                    </div>
                </div>
            </div>
            <div class="message-box animated fadeIn" data-sound="alert" id="mb-signout">
                <div class="mb-container">
                    <div class="mb-middle">
                        <div class="mb-title"><span class="fa fa-sign-out"></span> Log <strong>Out</strong> ?</div>
                        <div class="mb-content">
                            <p>Are you sure you want to log out?</p>
                            <p>Press No if you want to continue work. Press Yes to logout.</p>
                        </div>
                        <div class="mb-footer">
                            <div class="pull-right">
                                <a href="{!! URL('admin/logout') !!}" class="btn btn-success btn-lg">Yes</a>
                                <button class="btn btn-default btn-lg mb-control-close">No</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endif
        @include('admin-interface.includes.js')
    </body>
</html>