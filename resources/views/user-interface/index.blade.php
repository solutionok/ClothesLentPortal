@extends('user-interface.layout')
@section('title' , $page_content->section_first[5]->content)
@section('css')
	<link href="{!!asset('user-interface')!!}/css/owl.carousel.min.css" rel="stylesheet">
@stop

@section('content')
    <div class="home-page">
        <div class="section-1 banner" style="background-image: url('{!!asset('user-interface')!!}/img/home-banner.jpg');" >
            <div class="container">
                <div class="middle-div text-center">
                    <h3>{!! $page_content->section_first[0]->content !!}</h3>
                    <img src="{!! $page_content->section_first[1]->content !!}" alt="">
                    <p>{!! $page_content->section_first[2]->content !!}</p>
{{--                    <a href="{!! URL('tcNpp') !!}" class="haveBackground">{!! $page_content->section_first[3]->content !!}</a>--}}
                    <a data-location="{!! URL ('garments') !!}" class="haveBackground acknowledge">{!! $page_content->section_first[3]->content !!}</a>
                @if(Auth::check() && !Auth::user()->isAdmin())
                    <a href="{!! URL('for-rent/post-an-item') !!}">{!! $page_content->section_first[4]->content !!}</a>
                    @else
                    <a href="#login" class="login popup-with-form login_modal" redirect_url="{!! URL('for-rent/post-an-item') !!}">{!! $page_content->section_first[4]->content !!}</a>
                    @endif
                </div>
            </div>
        </div>
        <div class="section-2">
            <div class="container">
                <div class="col-md-5">
                    <div class="img-holder" style="background-image: url('{!! $page_content->section_second[0]->content !!}');">
                        <img src="{!! $page_content->section_second[1]->content !!}" alt="">
                    </div>
                </div>
                <div class="col-md-7">
                    <div class="title-holder text-center">
                        <div>{!! $page_content->section_second[2]->content !!}</div>
                        <h2>{!! $page_content->section_second[3]->content !!} <span>{!! $page_content->section_second[4]->content !!}</span></h2>
                    </div> 
                    <p>{!! $page_content->section_second[5]->content !!}  <span>{!! $page_content->section_second[6]->content !!}</span>  {!! $page_content->section_second[7]->content !!}</p>
                </div>
            </div>
        </div>
        <div class="section-3">
            <div class="container">
                <div class="title-holder text-center relative clearfix">
                    <div>{!! $page_content->section_third[0]->content !!}</div>
                    <h2>{!! $page_content->section_third[1]->content !!} <span>{!! $page_content->section_third[2]->content !!}</span></h2>
                </div>
                <div class="listing-holder">
                    @foreach(unserialize(base64_decode($page_content->section_third[3]->content)) as $value)
                    <div class="single-list-holder">
                        <div class="img-holder">
                            <img src="{!!asset($value[0]['field_value'])!!}" alt="">
                        </div>
                        <h3>{!!$value[1]['field_value']!!}</h3>
                        <p>{!!$value[2]['field_value']!!}</p>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
        <div class="section-4">
            <div class="container">
                <div class="title-holder text-center relative clearfix">
                    <div>{!! $page_content->section_fourth[0]->content !!}</div>
                    <h2>{!! $page_content->section_fourth[1]->content !!} <span>{!! $page_content->section_fourth[2]->content !!}</span></h2>
                </div>
                <div id="collections" class="owl-carousel owl-theme">
               
                    @foreach($categories as $value)
                        <div class="item">
                            <div class="single-product-item">
                                <div class="img-holder">
                                    <a href="{!!URL('garments?category=')!!}{{$value->seo_url}}"><img src="{!!asset($value->picture)!!}"></a>
                                </div>
                                <div class="text-holder clearfix text-center">
                                    <a href="{!!URL('garments?category=')!!}{{$value->seo_url}}">{!! $value->name !!}</a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
        @if(count($products)>0)
        <div class="section-5">
            <div class="container">
                <div class="title-holder text-center relative clearfix">
                    <div>{!! $page_content->section_fifth[0]->content !!}</div>
                    <h2>{!! $page_content->section_fifth[1]->content !!} <span>{!! $page_content->section_fifth[2]->content !!}</span></h2>
                </div>
                <div id="rental" class="owl-carousel owl-theme">
                    @foreach($products as $key=>$value)
                    <?php $product = App\Models\Products\Products::where('id', $value->productID)->first();  ?>
                    <?php $user = App\User::where('id', $product->user_id)->first();  ?>
                    <?php $wishlist = App\Models\Wishlist\Wishlist::where('product_id', $value->productID)->where('user_id',  Auth::check() ? Auth::user()->id : '' )->first();  ?>
                    <?php $rent = App\Models\Rent\Rent::where('product_id', $value->productID)->where('user_id', Auth::check() ? Auth::user()->id : '' )->first(); ?>
                    <?php
                        $product_review_avg = \App\Models\ProductUserReview::where('product_id',$value->productID)->avg('rating');
                        $product_review_avg = round($product_review_avg);
                        $without_fill_start = 5-$product_review_avg;
                        ?>
                        <div class="item" style="width: 90%;margin: 0 auto;padding: 15px; border: 1px solid #d3ad52">
                            <div class="single-product-item">
                                <div class="img-holder">

                                    <a href="{!!URL('garments/view/'.$product->seo_url)!!}"><img
                                                src="{!!asset($product->picture)!!}"></a>

                                </div>
                                <div class="clearfix">
                                    <h5 class="pull-left">{{$product->name}}</h5>
                                    <p class="pull-right price">$ {{$product->price}}/day</p>
                                </div>
                                <div class="clearfix">
                                    <h5 class="pull-left">Designer: {{$product->designer}}</h5>
                                </div>
                                <div class="clearfix">
                                    <h5 class="pull-left">Size: {{$product->size}}</h5>
                                </div>
                                <div class="clearfix">
                                    <div class="pull-left star">
                                        <ul>
                                            @for($i=0;$i<$product_review_avg;$i++)
                                                <li><i class="fa fa-star" aria-hidden="true"></i></li>
                                            @endfor

                                            @for($j=0;$j<$without_fill_start;$j++)
                                                <li><i class="fa fa-star-o" aria-hidden="true"></i></li>
                                            @endfor
                                        </ul>
                                    </div>
                                    <div class="pull-right name index-name">
                                        <a href="{!!URL('profile/profile-personal-info/'.Crypt::encrypt($user->id))!!}">{{$user->first_name}} {{substr($user->last_name,0,1)}} {{$user->location}}</a>
                                    </div>
                                </div>
                                <div class="clearfix">

                                    <div class="btn-holder">
                                        @if(Auth::check() && !Auth::user()->isAdmin())
                                            @if($wishlist === null)
                                                <a id="add-to-wishlist"
                                                   data-product-id="{!! Crypt::encrypt($value->productID) !!}"
                                                   class="border-only wishlist_value"><i class="fa fa-heart-o"
                                                                                         aria-hidden="true"></i>WISHLIST</a>
                                            @else
                                                <a id="remove-from-wishlist"
                                                   data-product-id="{!! Crypt::encrypt($value->productID) !!}"
                                                   class="border-only wishlist_value"><i class="fa fa-heart"
                                                                                         aria-hidden="true"></i>ON
                                                    WISHLIST</a>
                                            @endif
                                        @else
                                            <a href="#login" class="border-only popup-with-form login_modal"
                                               redirect_url="{!! URL('/') !!}"><i class="fa fa-heart-o"
                                                                                  aria-hidden="true"></i>WISHLIST</a>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                    
                   
                    
                </div>
            </div>
        </div>
        @endif
        {{--<div class="section-6" style="background-image: url('{!!asset('user-interface')!!}/img/heme-sec-6.jpg');">--}}
            {{--<div class="center-div">--}}
                {{--<div class="text-center">--}}
                    {{--<h3>{!! $page_content->section_fifth[3]->content !!}</h3>--}}
                    {{--<h2>{!! $page_content->section_fifth[4]->content !!}</h2>--}}
                {{--</div>--}}
                {{--<div class="form-holder">--}}
                    {{--<form class="form-inline" id="newslatter">--}}
                        {{--<div class="form-group">--}}
                            {{--<label class="sr-only" for="">Name</label>--}}
                            {{--<input type="text" class="form-control name-field"  placeholder="Name" name="name">--}}
                            {{--<span class="login-error errors" id="news_latter_name"></span>--}}
                        {{--</div>--}}
                        {{--<div class="form-group">--}}
                            {{--<label class="sr-only" for="">Email Address</label>--}}
                            {{--<input type="text" class="form-control email-field" placeholder="Email Address" name="email">--}}
                            {{--<span class="login-error errors" id="news_latter_email"></span>--}}
                        {{--</div>--}}
                        {{--{!! csrf_field() !!}--}}
                        {{--<button type="submit" class="btn btn-default btn-field">Submit</button>--}}
                    {{--</form>--}}
                {{--</div>--}}
            {{--</div>--}}
        {{--</div>--}}
    </div>
@stop
@section('js')
@include('user-interface.cart.includes.js')
	<script src="{!!asset('user-interface')!!}/js/owl.carousel.js"></script>
	<script type="text/javascript">
        $(document).ready(function () {
            $('#collections').owlCarousel({
                loop: true,
                margin: 10,
                nav: true,
                dot: false,
                responsiveClass: true,
                responsive: {
                    0: {
                        items: 1,
                        nav: true
                    },
                    600: {
                        items: 2,
                        nav: true
                    },
                    1000: {
                        items: 4,
                        nav: true,
                        loop: false,
                        margin: 20
                    }
                }
            });
        });
        $(document).ready(function () {

            $('#rental').owlCarousel({
                loop: true,
                margin: 10,
                dot: false,
                nav: true,
                responsiveClass: true,
                responsive: {
                    0: {
                        items: 1,
                        nav: true
                    },
                    600: {
                        items: 2,
                        nav: true
                    },
                    1000: {
                        items: 3,
                        nav: true,
                        loop: false,
                        margin: 20
                    }
                }
            });
        });

        $("body").delegate(".acknowledge","click",function(e){
            e.preventDefault();
            var selector = $(this);
            var location = selector.data("location");

            var content = '<div class="row"> ' +
                '<span style="float: left;width: 15%">&nbsp;</span>' +
                '<input type="checkbox" name="agree" id="radio1" style="margin: 0; box-shadow: none; width: 5%; display: block; height: 15px; float: left;"> ' +
                '<label style="width: 80%; text-align: left; cursor:pointer" for="radio1">I agree to all <a target="_blank" href="{!!URL('terms-and-conditions')!!}">Terms and Conditions</a> and <a target="_blank" href="{!!URL('privacy-policy')!!}">Privacy Policy</a></label> ' +
                '</div> ';

            swal({
                title             : "",
                text              : content,
                type              : "warning",
                html              : true,
                showCancelButton  : true,
                confirmButtonColor: "#DD6B55",
                customClass       : 'swal-wide',
                confirmButtonText : "Accept",
                cancelButtonText  : "No",
                closeOnConfirm    : false,
                closeOnCancel     : false
            }, function(isConfirm){
                if(isConfirm){
                    checked = $("input:checkbox[name=agree]:checked").val() ? 1 : 0;

                    if(checked) {
                        setTimeout(function () {
                            window.location = location;
                        }, 800);
                    }
                }
                else{
                    swal.close();
                }
            });
        });
	</script>
@stop