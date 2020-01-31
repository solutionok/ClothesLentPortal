@extends('user-interface.layout')
@section('content')
<body>
    <div class="">
        <div class="dashboard profile-info">
            <div class="section-1">
                <div class="mx-1254 clearfix">
<!-- -------------------------------------------------------------------------------------------------------------------------------------------- -->

                            <div id="message" class="white-popup-block mfp-hide messages_popup_holder">
                                <h1>Create Message</h1>
                                <div class="form_message">
                                    <form action="{!! URL('messages/send-message') !!}" method="POST">
                                        <label for="message_list"><h2>To: {{ $user->first_name }} {{ $user->last_name }}</h2></label>
                                        <input type="hidden" name="to" value="{{ $user->id }}">
                                        <input type="hidden" name="not_js" value="true">
                                        <div class="form-group">
                                          <textarea class="form-control" name="content" placeholder="Write your message..."></textarea>
                                        </div>
                                        <div class="form-group button_submit clearfix">
                                            <button>Send Message</button>
                                        </div>
                                    {!! csrf_field() !!}
                                    </form>
                                </div>
                            </div>

<!-- -------------------------------------------------------------------------------------------------------------------------------------------- -->

                    <div class="breadcrumbs">
                        <ul>
                            <li><a href="">Home</a></li>
                            <li><a href="">Profile</a></li>
                            <li><span>Personal Information</span></li>
                        </ul>
                    </div>
                    <div class="dashboard-container clearfix">
                        <div class="col-md-3">
                            <div class="page-sidebar">
                                <div class="profile-picture-holder">
                                    <img src="{!!asset($user->profile_picture)!!}">
                                </div>
                                <a href="" class="profile-name margin-0">{{ $user->first_name }} {{ $user->last_name }}</a>
                                <a href="" class="email">{{ $user->email }}</a>
                                <a href="#message" class="Message messages_popup">Message</a>
                            </div>
                        </div>
                        <div class="col-md-9">
                            <div class="page-content">
                                <div class="page-content-header clearfix">
                                    <div class="header-left">
                                        <ul>
                                            <li class="active"><a href="profile-personal-info.html" class="hvr-underline-from-center">Profile</a></li>
                                            <li><a href="profile-garments-for-rent.html" class="hvr-underline-from-center">Garments for Rent <span>(12)</span></a></li>
                                        </ul>
                                    </div>
                                    <div class="header-right">
                                        
                                    </div>
                                </div>
                                <div class="profile-info-holder">
                                    <h3>Personal Information</h3>
                                    <div class="row">
                                        <strong class="col-md-4">fIRST NAME</strong>
                                        <p class="col-md-8">{{ $user->first_name }}</p>
                                    </div>
                                   
                                    

                                   
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</body>
@stop
@section('js')
	@include('user-interface.cart.includes.js')
@stop