@extends('user-interface.layout')
@section('title',App\User::displayName(Auth::user()->id))
@section('content')
    <div class="dashboard paid-inner">
        <div class="section-1">
            <div class="mx-1254 clearfix">
                <div class="breadcrumbs">
                    <ul>
                        <li><a href="{!!URL('/')!!}">Home</a></li>
                        <li><a href="{!!URL('paid')!!}">Paid</a></li>
                        <li><span>RENT DETAIL</span></li>
                    </ul>
                </div>
                <div class="dashboard-container clearfix">
                    @include('user-interface.dashboard.includes.left-sidebar')
                    <div class="col-md-9">
                        <div class="page-content">
                            <div class="page-content-header clearfix">
                                <div class="header-left">
                                    <h3>Paid Items <span>(12)</span></h3>
                                </div>
                            </div>
                            <div class="product-inner-holder">
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="img-holder">
                                            <img src="{!!asset('user-interface')!!}/img/item-1.png">
                                        </div>
                                        <a href="" class="item-returned">ITEM RETURNED</a>
                                    </div>
                                    <div class="col-md-8">
                                        <div class="rent-details-holder">
                                            <h3>RENT DETAILS</h3>
                                            <div class="row list-container">
                                                <strong class="col-md-4">RENTED BY</strong>
                                                <div class="col-md-8">
                                                    <div class="clearfix">
                                                        <div class="profile-image">
                                                            <img src="{!!asset('user-interface')!!}/img/profile-pic.jpg">
                                                        </div>
                                                        <div class="profile-name">
                                                            <a href="">JANNA STONES</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row list-container">
                                                <strong class="col-md-4">RENTAL DATE</strong>
                                                <div class="col-md-8">
                                                    <p>01 - 10 - 2017</p>
                                                </div>
                                            </div>
                                            <div class="row list-container">
                                                <strong class="col-md-4">RENTAL PERIOD</strong>
                                                <div class="col-md-8">
                                                    <p>1 WEEK</p>
                                                </div>
                                            </div>
                                            <div class="row list-container">
                                                <strong class="col-md-4">RETURN ITEM ON</strong>
                                                <div class="col-md-8">
                                                    <p>01 - 17 - 2017</p>
                                                </div>
                                            </div>
                                            <div class="row list-container">
                                                <strong class="col-md-4">LOCATION</strong>
                                                <div class="col-md-8">
                                                    <p>Yonge St, Newmarket, ON L3Y 4Z1, Canada</p>
                                                </div>
                                            </div>
                                            <div class="row list-container">
                                                <strong class="col-md-4">PRICE</strong>
                                                <div class="col-md-8">
                                                    <p>$ 100</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="item-description">
                                        <h5>Soft Leather Blazer Jacket</h5>
                                        <div class="star">
                                            <ul>
                                                <li><i class="fa fa-star" aria-hidden="true"></i></li>
                                                <li><i class="fa fa-star" aria-hidden="true"></i></li>
                                                <li><i class="fa fa-star" aria-hidden="true"></i></li>
                                                <li><i class="fa fa-star" aria-hidden="true"></i></li>
                                                <li><i class="fa fa-star-o" aria-hidden="true"></i></li>
                                            </ul>
                                            <p>10 REVIEWS</p>
                                        </div>
                                        <div class="clearfix profile-inner-holder">
                                            <div class="profile-image">
                                                <img src="{!!asset('user-interface')!!}/img/profile-pic.jpg">
                                            </div>
                                            <div class="profile-name">
                                                <a href="">JAMIE COOPER</a>
                                            </div>
                                        </div>
                                        <div class="clearfix list-description">
                                            <strong class="col-md-2">COLOR</strong>
                                            <div class="col-md-8">
                                                <p>Black</p>
                                            </div>
                                        </div>
                                        <div class="clearfix list-description">
                                            <strong class="col-md-2">SIZE</strong>
                                            <div class="col-md-8">
                                                <p>Large</p>
                                            </div>
                                        </div>
                                        <div class="clearfix list-description">
                                            <strong class="col-md-2">DESCRIPTION</strong>
                                            <div class="col-md-7">
                                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eius mod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, Lorem ip sum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop