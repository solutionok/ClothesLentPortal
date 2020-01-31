@extends('user-interface.layout')
@section('title' , $page_content->section_first[3]->content)
@section('content')
	<div class="dashboard garments">
        <div class="section-1">
            <div class="mx-1254 clearfix">
                <div class="breadcrumbs">
                    <ul>
                        <li><a href="{!!URL('/')!!}">Home</a></li>
                        <li><span>Garments</span></li>
                    </ul>
                </div>
                
                <div class="header-title text-center">
                    <div class="bg">
                        {!! $page_content->section_first[0]->content !!}
                    </div>
                    <h1>{!! $page_content->section_first[1]->content !!}</h1>
                    <h2>{!! $page_content->section_first[2]->content !!}</h2>
                </div>
                <div class="dashboard-container clearfix">
                    @include('user-interface.cart.includes.left-sidebar')
                    <div class="col-md-9">
                        <div class="page-content garments">
                            <div class="listing-product-holder text-center">
                            @forelse($products as $value)
                                <?php $product = App\Models\Products\Products::where('id', $value->productID)->first();  ?>
                                <?php $user = App\User::where('id', $product->user_id)->first();  ?>
                                <?php $wishlist = App\Models\Wishlist\Wishlist::where('product_id', $value->productID)->where('user_id',  Auth::check() ? Auth::user()->id : '' )->first();  ?>
                                <?php
                                    $rent = \App\models\Rent\Rent::where( 'product_id', $value->productID )->whereNotIn( 'status', array(
                                        'Merchant Received',
                                        'Cart',
                                        'Declined',
                                        'Pending',
                                        'Canceled'
                                    ) )->first();
                                ?>
                                <div class="single-product-item">
                                    <div class="img-holder">

                                        <a href="{!!URL('garments/view/'.$product->seo_url)!!}">
                                            <img style="{!! $rent ? "opacity: .2" : "" !!}" src="{!!asset($product->picture)!!}"></a>

                                    <!--@if(Auth::check() && !Auth::user()->isAdmin()) -->
                                        <!-- @else
                                        <a href="#login" class="with-background popup-with-form " ><img src="{!!asset($product->picture)!!}"></a>
                                        @endif -->
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
                                    <?php 
                                    	$product_review_avg = \App\Models\ProductUserReview::where('product_id',$value->productID)->avg('rating');                		   	          
                                        $product_review_avg = round($product_review_avg);
                                        $without_fill_start = 5-$product_review_avg;
					
                                    ?>
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
                                        <div class="pull-right name">
                                            @if(Auth::check() && Auth::user()->id != $product->user_id)
                                                <a href="{!!URL('profile/profile-personal-info/'.Crypt::encrypt($user->id))!!}">{{$user->first_name}} {{substr($user->last_name,0,1)}} {{$user->location}}</a>
                                            @else
                                                <a>{{$user->first_name}} {{substr($user->last_name,0,1)}} {{$user->location}}</a>

                                            @endif
                                        </div>

                                    </div>
                                    
                                    <div class="clearfix">
                                        
                                        <div class="btn-holder">
                                        @if(Auth::check() && !Auth::user()->isAdmin())
                                            @if($wishlist === null)
                                                @if(Auth::user()->id != $product->user_id)
                                                    <a id="add-to-wishlist"  data-product-id="{!! Crypt::encrypt($value->productID) !!}" class="border-only wishlist_value">
                                                        <i class="fa fa-heart-o" aria-hidden="true"></i>WISHLIST</a>
                                                @else
                                                    <a style="margin-bottom: 3px">&nbsp;</a>
                                                @endif
                                            @else
                                                <a id="remove-from-wishlist"  data-product-id="{!! Crypt::encrypt($value->productID) !!}" class="border-only wishlist_value">
                                                    <i class="fa fa-heart" aria-hidden="true"></i>ON WISHLIST</a>
                                            @endif
                                        @else
	                                        @if(Request::input('category')=='' && Request::input('page')=='')
	                                            <a href="#login" class="border-only popup-with-form login_modal" redirect_url="{{url()->current()}}"><i class="fa fa-heart-o" aria-hidden="true"></i>WISHLIST</a>
                                            	@elseif(Request::input('category')!='' && Request::input('page')!='')
                                            	<a href="#login" class="border-only popup-with-form login_modal" redirect_url="{{url()->current().'?category='.Request::input('category')}}&page={{Request::input('page')}}"><i class="fa fa-heart-o" aria-hidden="true"></i>WISHLIST</a> 
                                            	@elseif(Request::input('category')!='' && Request::input('page')=='')
                                            	<a href="#login" class="border-only popup-with-form login_modal" redirect_url="{{url()->current().'?category='.Request::input('category')}}"><i class="fa fa-heart-o" aria-hidden="true"></i>WISHLIST</a>
                                            	@else
                                            	<a href="#login" class="border-only popup-with-form login_modal" redirect_url="{{url()->current().'?page='.Request::input('page')}}"><i class="fa fa-heart-o" aria-hidden="true"></i>WISHLIST</a>
                                            	@endif
                                        @endif
                                        </div>
                                    </div>
                                </div>
                            @empty
                                No result found.
                            @endforelse      
                            </div>
                            <div class="text-right">
                                <ul class="pagination">
                                    {{ $products->appends(Request::input())->render() }}
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop
@section('js')
	@include('user-interface.cart.includes.js')
@stop