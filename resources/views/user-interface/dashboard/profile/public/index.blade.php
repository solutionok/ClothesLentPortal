@extends('user-interface.layout')
@section('content')
    <body>
    <div class="">
        <div class="dashboard profile-info">
            <div class="section-1">
                <div class="mx-1254 clearfix">
                    <div class="breadcrumbs">
                        <ul>
                            <li><a href="{!!URL('/')!!}">Home</a></li>
                            <li><a href="{!!URL($user_data->username.'?section=profile')!!}">{!!App\User::displayName(Auth::user()->id)!!}</a></li>
                            <li><span>Profile</span></li>
                        </ul>
                    </div>
                    <div class="dashboard-container clearfix">
                        @include('user-interface.dashboard.profile.public.includes.left-sidebar')
                        <div class="col-md-9">
                            <div class="page-content">
                                @include('user-interface.dashboard.profile.public.includes.navigation')
                                <div class="profile-info-holder">
                                    <h3>Personal Information</h3>
                                    <div class="row">
                                        <strong class="col-md-4">FIRST NAME</strong>
                                        <p class="col-md-8">{{ $user_data->first_name }}</p>
                                    </div>
                                    <div class="row">
                                        <strong class="col-md-4">LAST NAME</strong>
                                        <p class="col-md-8">{{ $user_data->last_name }}</p>
                                    </div>
                                    <div class="row">
                                        <strong class="col-md-4">CONTACT NUMBER</strong>
                                        <p class="col-md-8">{{ $user_data->contact_number }}</p>
                                    </div>
                                    <div class="row">
                                        <strong class="col-md-4">Location</strong>
                                        <p class="col-md-8">{{ $user_data->location }}</p>
                                    </div>
                                    <div class="row">
                                        <strong class="col-md-4">Email Address</strong>
                                        <p class="col-md-8">{{ $user_data->email }}</p>
                                    </div>
                                    <div class="row">
                                        <strong class="col-md-4">Gender</strong>
                                        <p class="col-md-8"></p>
                                    </div>
                                    <div class="row">
                                        <strong class="col-md-4">Birth Date</strong>
                                        <p class="col-md-8">{{ Carbon\Carbon::parse($user_data->birthday)->format('dS M, y ') }}</p>
                                    </div>

                                    <h3>Body Type</h3>
                                    <div class="row">
                                        <strong class="col-md-4">SIZE</strong>
                                        <p class="col-md-8">{{ $user_data->size }}</p>
                                    </div>
                                    <div class="row">
                                        <strong class="col-md-4">HEIGHT</strong>
                                        <p class="col-md-8">{{ $user_data->height }}</p>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <img src="{!!asset('user-interface/img/body-type-new-'.$user_data->body_type.'.png')!!}">
                                        </div>
                                    </div>

                                    {{--<h3>Shipping fee</h3>
                                    <div class="row">
                                        <strong class="col-md-4">local</strong>
                                        <p class="col-md-8"><b>$</b> {{ $user_data->shipping_fee_local }}</p>
                                    </div>
                                    <div class="row">
                                        <strong class="col-md-4">nationwide</strong>
                                        <p class="col-md-8"><b>$</b> {{ $user_data->shipping_fee_nationwide }}</p>
                                    </div>--}}
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
@stop