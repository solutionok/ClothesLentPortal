@extends('user-interface.layout')
@section('title' , $page_content->section_first[0]->content)
@section('content')
	<div class="dashboard garments wishlist">
	    <div class="section-1">
	        <div class="mx-1254 clearfix">
	            <div class="breadcrumbs">
	                <ul>
	                    <li><a href="{!!URL('/')!!}">Home</a></li>
	                    <li><span>wishlist</span></li>
	                </ul>
	            </div>
	            <div class="dashboard-container clearfix">
	                
	                <div class="col-md-12">
	                    <div class="page-content wishlist-holder">
	                        <div id="no-more-tables" class="wishlist-table">
	                            <table class="table-condensed cf">
	                                <thead class="cf">
	                                    <tr>
	                                        <th></th>
	                                        <th>Image</th>
	                                        <th>Product Name</th>
	                                        <th>Owner</th>
	                                        <th>Color</th>
	                                        <th>Size</th>
	                                        <th>Price</th>
	                                        <!--<th>Action</th> -->                
	                                    </tr>
	                                </thead>
	                                <tbody>
                            		@forelse($wishlist as $value)
                            			<?php $rent = App\Models\Rent\Rent::where('product_id', $value->productID)->where('user_id',  Auth::user()->id)->where('status', '!=', 'Declined')->first();  ?>
                            			<?php $product = App\Models\Products\Products::where('id', $value->productID)->first(); ?>
                            			<?php $owner = App\User::where('id', $product->user_id)->first(); ?>
	                                    <tr>
	                                        <td data-title=""><a id="remove-from-wishlist"  data-product-id="{!! Crypt::encrypt($value->productID) !!}" class="border-only wishlist_value"><i class="fa fa-times" aria-hidden="true"></i></a></td>
	                                        <td data-title="Image">
	                                            <a href="{!!URL('garments/view/'.$product->seo_url)!!}"><img style="max-height: 120px;" src="{!! $product->picture !!}"></a>
	                                        </td>
	                                        <td data-title="Product Name" class="">
	                                        	<a href="{!!URL('garments/view/'.$product->seo_url)!!}">{!! $product->name !!}</a>
	                                        </td>
	                                        <td data-title="Owner" class="">
	                                        	<a href="{!!URL('profile/profile-personal-info/'.Crypt::encrypt($owner->id))!!}">
	                                        	{!! $owner->first_name !!}</a>
	                                        </td>
	                                        <td data-title="Color" class="">{!! $product->color !!}</td>
	                                        <td data-title="Size" class="">{!! $product->size !!}</td>
	                                        <td data-title="Price" class="">$ {!! $product->price !!}/day</td>
	                                        <!--<td data-title="Action" class="">
	                                        	@if($rent === null)
                                                	<a href="{!! URL('garments/view/'.Crypt::encrypt($product->id)) !!}" class="with-background"><i class="fa fa-shopping-cart" aria-hidden="true"></i>ADD TO CART</a>
	                                            @else
	                                                <a href="{!! URL('my-cart') !!}" class="with-background"><i class="fa fa-shopping-cart" aria-hidden="true"></i>ON CART</a>
	                                            @endif
	                                        </td>-->
	                                    </tr>
	                                @empty
                                		<tr><td colspan="7" style="text-align:left">Your Wishlist Is Empty</td></tr>
									@endforelse
	                                </tbody>
	                            </table>
	                        </div>
	                        <div class="text-right">
	                 	         <ul class="pagination">
                                    {{ $wishlist->appends(Request::input())->render() }}
                                </ul>
	                        </div>
	                        <div class="text-right">
	                            <a href="{!! URL('garments') !!}" class="continue-btn">CONTINUE SHOPPING</a>	                               
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