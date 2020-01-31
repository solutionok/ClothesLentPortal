@extends('user-interface.layout')
@section('title',App\User::displayName(Auth::user()->id))
@section('content')
        
    @include('user-interface.dashboard.notification.includes.inner.give-reason')
        <div class="dashboard notification">
            <div class="section-1">
                <div class="mx-1254 clearfix">
                    <div class="breadcrumbs">
                        <ul>
                            <li><a href="">Home</a></li>
                            <li><a href="">My Account</a></li>
                            <li><span>Notification</span></li>
                        </ul>
                    </div>
                    <div class="dashboard-container clearfix">
                        @include('user-interface.dashboard.includes.left-sidebar')
                        <div class="col-md-9">
                            <div class="page-content notification_inner_pages">
                            @if($notification->type == 'rental_request' || $notification->type == 'rental_request_sent')                                
                                @include('user-interface.dashboard.notification.includes.inner.rental-request')
                            @elseif($notification->type == 'decline')
                                @include('user-interface.dashboard.notification.includes.inner.decline')
                            @elseif($notification->type == 'accept')
                                @include('user-interface.dashboard.notification.includes.inner.accept')
                            @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
@stop
@section('js')
    <script type="text/javascript">
        $(document).ready(function() {
            $('.popup-with-form').magnificPopup({
                type: 'inline'
            });
        });
        $('input[type="radio"]').click(function() {
           if($(this).attr('class') == 'Others') {
               $('.shows').slideDown();     
           }
           else {
                 $('.shows').slideUp();  
           }
        });

    </script>
@stop