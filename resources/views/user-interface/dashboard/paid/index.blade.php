@extends('user-interface.layout')
@section('title',App\User::displayName(Auth::user()->id))
@section('content')
    <div class="dashboard paid">
        <div class="section-1">
            <div class="mx-1254 clearfix">
                <div class="breadcrumbs">
                    <ul>
                        <li><a href="{!!URL('/')!!}">Home</a></li>
                        <li><span>paid</span></li>
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
                                <div class="header-right">
                                    <div class="form-group clearfix">
                                        <label for="" class="col-sm-5 control-label">Sort by</label>
                                        <div class="col-sm-7">
                                            <div class="select">
                                            <select class="form-control">
                                                <option>Date</option>
                                                <option>Date</option>
                                            </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
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
                                        <div class="profile-image">
                                            <img src="{!!asset('user-interface')!!}/img/profile-pic.jpg">
                                        </div>
                                        <div class="profile-name">
                                            <a href="">JAMIE COOPER</a>
                                        </div>
                                    </div>
                                    <div class="clearfix">
                                        <div class="btn-holder">
                                            <a href="{!!URL('paid/view')!!}" class="with-background">VIEW DETAILS</a>
                                        </div>
                                        <div class="btn-holder">
                                            <a href="" class="border-only">ITEM RETURNED</a>
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
                                        <div class="profile-image">
                                            <img src="{!!asset('user-interface')!!}/img/profile-pic.jpg">
                                        </div>
                                        <div class="profile-name">
                                            <a href="">JAMIE COOPER</a>
                                        </div>
                                    </div>
                                    <div class="clearfix">
                                        <div class="btn-holder">
                                            <a href="{!!URL('paid/view')!!}" class="with-background">VIEW DETAILS</a>
                                        </div>
                                        <div class="btn-holder">
                                            <a href="" class="border-only">ITEM RETURNED</a>
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
                                        <div class="profile-image">
                                            <img src="{!!asset('user-interface')!!}/img/profile-pic.jpg">
                                        </div>
                                        <div class="profile-name">
                                            <a href="">JAMIE COOPER</a>
                                        </div>
                                    </div>
                                    <div class="clearfix">
                                        <div class="btn-holder">
                                            <a href="{!!URL('paid/view')!!}" class="with-background">VIEW DETAILS</a>
                                        </div>
                                        <div class="btn-holder">
                                            <a href="" class="border-only">ITEM RETURNED</a>
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
                                        <div class="profile-image">
                                            <img src="{!!asset('user-interface')!!}/img/profile-pic.jpg">
                                        </div>
                                        <div class="profile-name">
                                            <a href="">JAMIE COOPER</a>
                                        </div>
                                    </div>
                                    <div class="clearfix">
                                        <div class="btn-holder">
                                            <a href="{!!URL('paid/view')!!}" class="with-background">VIEW DETAILS</a>
                                        </div>
                                        <div class="btn-holder">
                                            <a href="" class="border-only">ITEM RETURNED</a>
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
                                        <div class="profile-image">
                                            <img src="{!!asset('user-interface')!!}/img/profile-pic.jpg">
                                        </div>
                                        <div class="profile-name">
                                            <a href="">JAMIE COOPER</a>
                                        </div>
                                    </div>
                                    <div class="clearfix">
                                        <div class="btn-holder">
                                            <a href="{!!URL('paid/view')!!}" class="with-background">VIEW DETAILS</a>
                                        </div>
                                        <div class="btn-holder">
                                            <a href="" class="border-only">ITEM RETURNED</a>
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
                                        <div class="profile-image">
                                            <img src="{!!asset('user-interface')!!}/img/profile-pic.jpg">
                                        </div>
                                        <div class="profile-name">
                                            <a href="">JAMIE COOPER</a>
                                        </div>
                                    </div>
                                    <div class="clearfix">
                                        <div class="btn-holder">
                                            <a href="{!!URL('paid/view')!!}" class="with-background">VIEW DETAILS</a>
                                        </div>
                                        <div class="btn-holder">
                                            <a href="" class="border-only">ITEM RETURNED</a>
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