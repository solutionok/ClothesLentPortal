@extends('user-interface.layout')
@section('title',App\User::displayName(Auth::user()->id))
@section('content')
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
                            <div class="listing-product-holder text-center">
                                <div class="single-product-item">
                                    <div class="img-holder">
                                        <img src="{!!asset('user-interface')!!}/img/item-1.png">
                                    </div>
                                    <h5>Soft Leather Blazer Jacket</h5>
                                    <div class="clearfix">
                                        <div class="pull-left star">
                                            <ul>
                                                <li><i class="fa fa-star" aria-hidden="true"></i></li>
                                                <li><i class="fa fa-star" aria-hidden="true"></i></li>
                                                <li><i class="fa fa-star" aria-hidden="true"></i></li>
                                                <li><i class="fa fa-star" aria-hidden="true"></i></li>
                                                <li><i class="fa fa-star-o" aria-hidden="true"></i></li>
                                            </ul>
                                        </div>
                                        <div class="pull-right price">
                                            <p>$ 100</p>
                                        </div>
                                    </div>
                                    <div class="clearfix">
                                        <div class="btn-holder">
                                            <a class="addToCart with-background"><i class="fa fa-shopping-cart" aria-hidden="true"></i>ADD TO CART</a>
                                        </div>
                                        <div class="btn-holder">
                                            <a href="" class="border-only"><i class="fa fa-heart-o" aria-hidden="true"></i>WISHLIST</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="single-product-item">
                                    <div class="img-holder">
                                        <img src="{!!asset('user-interface')!!}/img/item-2.png">
                                    </div>
                                    <h5>Soft Leather Blazer Jacket</h5>
                                    <div class="clearfix">
                                        <div class="pull-left star">
                                            <ul>
                                                <li><i class="fa fa-star" aria-hidden="true"></i></li>
                                                <li><i class="fa fa-star" aria-hidden="true"></i></li>
                                                <li><i class="fa fa-star" aria-hidden="true"></i></li>
                                                <li><i class="fa fa-star" aria-hidden="true"></i></li>
                                                <li><i class="fa fa-star-o" aria-hidden="true"></i></li>
                                            </ul>
                                        </div>
                                        <div class="pull-right price">
                                            <p>$ 100</p>
                                        </div>
                                    </div>
                                    <div class="clearfix">
                                        <div class="btn-holder">
                                            <a class="addToCart with-background"><i class="fa fa-shopping-cart" aria-hidden="true"></i>ADD TO CART</a>
                                        </div>
                                        <div class="btn-holder">
                                            <a href="" class="border-only"><i class="fa fa-heart-o" aria-hidden="true"></i>WISHLIST</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="single-product-item">
                                    <div class="img-holder">
                                        <img src="{!!asset('user-interface')!!}/img/item-1.png">
                                    </div>
                                    <h5>Soft Leather Blazer Jacket</h5>
                                    <div class="clearfix">
                                        <div class="pull-left star">
                                            <ul>
                                                <li><i class="fa fa-star" aria-hidden="true"></i></li>
                                                <li><i class="fa fa-star" aria-hidden="true"></i></li>
                                                <li><i class="fa fa-star" aria-hidden="true"></i></li>
                                                <li><i class="fa fa-star" aria-hidden="true"></i></li>
                                                <li><i class="fa fa-star-o" aria-hidden="true"></i></li>
                                            </ul>
                                        </div>
                                        <div class="pull-right price">
                                            <p>$ 100</p>
                                        </div>
                                    </div>
                                    <div class="clearfix">
                                        <div class="btn-holder">
                                            <a class="addToCart with-background"><i class="fa fa-shopping-cart" aria-hidden="true"></i>ADD TO CART</a>
                                        </div>
                                        <div class="btn-holder">
                                            <a href="" class="border-only"><i class="fa fa-heart-o" aria-hidden="true"></i>WISHLIST</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="single-product-item">
                                    <div class="img-holder">
                                        <img src="{!!asset('user-interface')!!}/img/item-2.png">
                                    </div>
                                    <h5>Soft Leather Blazer Jacket</h5>
                                    <div class="clearfix">
                                        <div class="pull-left star">
                                            <ul>
                                                <li><i class="fa fa-star" aria-hidden="true"></i></li>
                                                <li><i class="fa fa-star" aria-hidden="true"></i></li>
                                                <li><i class="fa fa-star" aria-hidden="true"></i></li>
                                                <li><i class="fa fa-star" aria-hidden="true"></i></li>
                                                <li><i class="fa fa-star-o" aria-hidden="true"></i></li>
                                            </ul>
                                        </div>
                                        <div class="pull-right price">
                                            <p>$ 100</p>
                                        </div>
                                    </div>
                                    <div class="clearfix">
                                        <div class="btn-holder">
                                            <a class="addToCart with-background"><i class="fa fa-shopping-cart" aria-hidden="true"></i>ADD TO CART</a>
                                        </div>
                                        <div class="btn-holder">
                                            <a href="" class="border-only"><i class="fa fa-heart-o" aria-hidden="true"></i>WISHLIST</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="single-product-item">
                                    <div class="img-holder">
                                        <img src="{!!asset('user-interface')!!}/img/item-1.png">
                                    </div>
                                    <h5>Soft Leather Blazer Jacket</h5>
                                    <div class="clearfix">
                                        <div class="pull-left star">
                                            <ul>
                                                <li><i class="fa fa-star" aria-hidden="true"></i></li>
                                                <li><i class="fa fa-star" aria-hidden="true"></i></li>
                                                <li><i class="fa fa-star" aria-hidden="true"></i></li>
                                                <li><i class="fa fa-star" aria-hidden="true"></i></li>
                                                <li><i class="fa fa-star-o" aria-hidden="true"></i></li>
                                            </ul>
                                        </div>
                                        <div class="pull-right price">
                                            <p>$ 100</p>
                                        </div>
                                    </div>
                                    <div class="clearfix">
                                        <div class="btn-holder">
                                            <a class="addToCart with-background"><i class="fa fa-shopping-cart" aria-hidden="true"></i>ADD TO CART</a>
                                        </div>
                                        <div class="btn-holder">
                                            <a href="" class="border-only"><i class="fa fa-heart-o" aria-hidden="true"></i>WISHLIST</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="single-product-item">
                                    <div class="img-holder">
                                        <img src="{!!asset('user-interface')!!}/img/item-2.png">
                                    </div>
                                    <h5>Soft Leather Blazer Jacket</h5>
                                    <div class="clearfix">
                                        <div class="pull-left star">
                                            <ul>
                                                <li><i class="fa fa-star" aria-hidden="true"></i></li>
                                                <li><i class="fa fa-star" aria-hidden="true"></i></li>
                                                <li><i class="fa fa-star" aria-hidden="true"></i></li>
                                                <li><i class="fa fa-star" aria-hidden="true"></i></li>
                                                <li><i class="fa fa-star-o" aria-hidden="true"></i></li>
                                            </ul>
                                        </div>
                                        <div class="pull-right price">
                                            <p>$ 100</p>
                                        </div>
                                    </div>
                                    <div class="clearfix">
                                        <div class="btn-holder">
                                            <a class="addToCart with-background"><i class="fa fa-shopping-cart" aria-hidden="true"></i>ADD TO CART</a>
                                        </div>
                                        <div class="btn-holder">
                                            <a href="" class="border-only"><i class="fa fa-heart-o" aria-hidden="true"></i>WISHLIST</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="text-right">
                                <ul class="pagination">
                                    <li class="page-item"><a class="page-link" href="#">Previous</a></li>
                                    <li class="page-item active"><a class="page-link" href="#">1</a></li>
                                    <li class="page-item"><a class="page-link" href="#">2</a></li>
                                    <li class="page-item"><a class="page-link" href="#">3</a></li>
                                    <li class="page-item"><a class="page-link" href="#">Next</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop