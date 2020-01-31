@extends('user-interface.layout')
@section('title' , $page_content->section_first[0]->content)
@section('content')
    <style>
        .total-holder h3{
            margin-bottom: 10px !important;
        }
    </style>
    <div class="dashboard garments wishlist">
        <div class="section-1">
            <div class="mx-1254 clearfix">
                <div class="breadcrumbs">
                    <ul>
                        <li><a href="{!!URL('/')!!}">Home</a></li>
                        <li><span>My Cart</span></li>
                    </ul>
                </div>
                <div class="dashboard-container clearfix">

                    <div class="col-md-12">
                        <div class="page-content wishlist-holder">
                            <div id="no-more-tables" class="wishlist-table">
                                <table class="table-condensed cf list-item">
                                    <thead class="cf">
                                    <tr>
                                        <th></th>
                                        <th>Image</th>
                                        <th>Product Name</th>
                                        <th>Delivery Option</th>
                                        <th>Rent From</th>
                                        <th>Rent Until</th>
                                        <th>Retail<sup style="color: #7c7cb0; cursor: pointer;" data-toggle="tooltip" title="A deposit will be retrieved from your credit card upon the owner of the item receives the item back satisfactorily">(*)</sup> Price</th>
                                        <th>Shipping</th>
                                        <th>Price Per Day</th>
                                        <th>Days</th>
                                        <th>Rent</th>
                                        <th>Cleaning Price</th>
                                        <th>Total</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php $final_return = 0 ?>
                                    <?php $final_ship = 0 ?>
                                    <?php $final_fee = 0 ?>
                                    <?php $final_rent = 0 ?>
                                    <?php $rent = 0 ?>
                                    <?php $final_total = 0 ?>
                                    <?php $final_cp = 0 ?>
                                    @forelse($cart as $value)
                                        <?php
                                        $product = App\Models\Products\Products::with('product_categories')->with('user_detail')
                                            ->where('id', $value->productID)->first();
                                        ?>
                                        <?php $availability = count(App\Models\Products\Products::getData($product->id)->availability) == 0 ? 'Available' : 'Unavailable' ?>
                                        <?php $rent_detail = App\Models\Rent\Rent::where('id', $value->cartID)->first(); ?>
                                        <?php $cat = App\Models\Categories::where('id', $product->product_categories[0]->category_id)->first(); ?>
                                        <tr>
                                            <td data-title=""><a id="remove-from-cart"
                                                                 data-product-id="{!! Crypt::encrypt($product->id) !!}"
                                                                 class="with-background"><i class="fa fa-times"
                                                                                            aria-hidden="true"></i></a>
                                            </td>
                                            <td data-title="Image">
                                                <a href="{!!URL('garments/view/'.$product->seo_url)!!}">
                                                    <img style="max-height: 100px;" src="{!!asset($product->picture)!!}">
                                                </a>
                                            </td>
                                            <td data-title="Product Name" class="">
                                                <a href="{!!URL('garments/view/'.$product->seo_url)!!}">{!! $product->name !!}</a>
                                            </td>
                                            <td data-title="Delivery Option">
                                                <a data-location="{!! URL('my-cart/change-delivery') !!}"
                                                   data-id="{{$rent_detail->id}}"
                                                            class="change-delivery" data-toggle="tooltip">

                                                    <select name="delivery_option" class="form-control" id="delivery_option">
                                                        <option value="">Please Select Delivery</option>
                                                        <option {{ $rent_detail->delivery_option === "Localization" ? "selected" : "" }} vaue="Localization">Localization</option>
                                                        <option {{ $rent_detail->delivery_option === "Regular mail" ? "selected" : ""  }} value="Regular mail">Regular mail</option>
                                                        <option {{ $rent_detail->delivery_option === "Ups" ? "selected" : ""  }} value="Ups">Pick up from UPS</option>
                                                    </select>
                                                </a>
                                            </td>
                                            <td data-title="Color" class="">{!! $rent_detail->rental_start_date !!}</td>
                                            <td data-title="Size" class="">{!! $rent_detail->rental_end_date !!}</td>

                                            <?php
                                            $date1 = date_create($rent_detail->rental_start_date);
                                            $date2 = date_create($rent_detail->rental_end_date);
                                            $diff = date_diff($date1, $date2);
                                            $total_days = $diff->format("%a") + 1;

	                                        if ($rent_detail->delivery_option === "Localization") {
		                                        $shipping = 0;
	                                        } else if($rent_detail->delivery_option === "Regular mail") {
		                                        $shipping = $cat->shipping_fee_local;
	                                        } else {
		                                        $shipping = $cat->shipping_fee_nationwide;
	                                        }

                                            $fee = ($product->price * $total_days) / 10;
                                            $rent = ($product->price * $total_days);
                                            $total = ($product->price * $total_days) + $product->retail_price + $shipping + $product->cleaning_price;
                                            $total2 = ($product->price * $total_days) + $product->retail_price + $shipping + $fee + $product->cleaning_price;

                                            $final_return += $product->retail_price;
                                            $final_ship += $shipping;
                                            $final_fee += ($product->price * $total_days) / 10;
                                            $final_rent += $rent;
                                            $final_total += $total2;
                                            $final_cp += $product->cleaning_price;

                                            ?>

                                            <td data-title="Price" class="">{!! $product->retail_price !!}</td>
                                            <td data-title="Price" class="">{!!$shipping !!}</td>
                                            <td data-title="Price" class="">{!! $product->price !!}</td>
                                            <td data-title="Day" class="">{!! $total_days !!}</td>
                                            <td data-title="Rent" class="">{!! $rent !!}</td>
                                            <td data-title="Admin Fees" class="">{!! !$product->cleaning_price ? "NP" : $product->cleaning_price !!}</td>
                                            <td data-title="Price" class="">{!! $total  !!}</td>
                                        </tr>

                                    @empty
                                        <tr>
                                            <td colspan="13" style="height: 320px;">Your Cart Is Empty</td>
                                        </tr>
                                    @endforelse
                                    </tbody>
                                </table>

                            </div>
                        </div>
                    </div>
                    <div class="clearfix">&nbsp;</div>

                    <div class="col-md-12">
                        <div class="page-content wishlist-holder">
                                <div class="text-right">
                                    <div class="clearfix">
                                        <div class="total-holder total">
                                            <div class="clearfix">
                                                <h3 class="pull-left" style="width: 300px">Rent</h3>
                                                <sub class="pull-right">
                                                    <small id="shippingFeeTotal">$ {!! number_format($final_rent, 2) !!}</small>
                                                </sub>
                                            </div>
                                            <div class="clearfix">
                                                <h3 class="pull-left" style="width: 300px">Shipping</h3>
                                                <sub class="pull-right">
                                                    <small id="shippingFeeTotal"> {{ $final_ship === 0 ? "FREE" :'$ ' . number_format($final_ship, 2)}}</small>
                                                </sub>
                                            </div>
                                            <div class="clearfix">
                                                <h3 class="pull-left" style="width: 300px">Fee</h3>
                                                <sub class="pull-right">
                                                    <small id="shippingFeeTotal">$ {!! number_format($final_fee, 2) !!}</small>
                                                </sub>
                                            </div>
                                            @if($final_cp)
                                            <div class="clearfix">
                                                <h3 class="pull-left" style="width: 300px">Cleaning Price</h3>
                                                <sub class="pull-right">
                                                    <small id="shippingFeeTotal">
                                                        $ {!! number_format($final_cp, 2) !!}</small>
                                                </sub>
                                            </div>
                                            @endif
                                            <div class="clearfix" style="border-top: 3px double #ccc">
                                                <h3 class="pull-left" style="width: 300px">Total Charges<sup class="deposit" data-toggle="tooltip"  style="color: #7c7cb0; cursor: pointer;">(*)</sup></h3>
                                                <sub class="pull-right">
                                                    <small id="shippingFeeTotal">$ {!! number_format($final_fee + $final_ship + $final_rent + $final_cp, 2) !!}</small>
                                                </sub>
                                            </div>
                                            {{--<div>--}}
                                            {{--<div class="clearfix">--}}
                                                {{--<h3 class="pull-left text-right">&nbsp;</h3>--}}
                                                {{--<sub class="pull-right">--}}
                                                    {{--<small id="shippingFeeTotal">+</small>--}}
                                                {{--</sub>--}}
                                            {{--</div>--}}
                                            {{--<div class="clearfix">--}}
                                                {{--<h3 class="pull-left " style="width: 300px">--}}
                                                    {{--Security Deposit <br><span style="font-size: 12px; font-weight: lighter">(Money on hold until items returned)</span> </h3>--}}
                                                {{--<sub class="pull-right">--}}
                                                    {{--<small id="shippingFeeTotal">$ {!! number_format($final_return, 2) !!}</small>--}}
                                                {{--</sub>--}}
                                            {{--</div>--}}
                                            {{--</div>--}}
                                            <div class="clearfix"  style="border-top: 3px double #ccc">
                                                <h3 class="pull-left" style="width: 300px">Total Payment</h3>
                                                <sub class="pull-right">
                                                    <small id="shippingFeeTotal">$ {!! number_format($final_total, 2) !!}</small>
                                                </sub>
                                            </div>
                                        </div>
                                    </div>
                                    <a href="{!! URL('garments') !!}" class="add-all-btn">CONTINUE SHOPPING</a>
                                    @if(count($cart)>0)
                                    <a data-location="{!! URL('my-cart/make-payment?category='.$category.
                                    '&body_type='.$body_type.'&size='.$size.'&budget='.$budget.'&location='.$location.
                                    '&height='.$height.'&season='.$season.'&total='.($final_total )) !!}" data-info="{{$product->user_detail }}"
                                       class="continue-btn make-order" data-toggle="tooltip">PLACE ORDER</a>
                                    @endif
                                </div>
                            <div><span class="reference-accessdate"><a style="font-size:35px"><sub>*</sub></a> Full retail price will be charged if you fail to return the item at the end of the rental period</span></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @stop
        @section('js')
            @include('user-interface.cart.includes.js')
            <script type="text/javascript">
                var feeType = [];


                $("body").delegate(".make-order","click",function(e){
                    e.preventDefault();
                    var location = $(this).data("location");
                    var info = $(this).data("info");

                    var bp = info.first_name + " " + info.last_name;

                    var content = "<div><p style='text-align: left'>By checking this box, I acknowledge that: <br>" +
                        "<ul style='text-align: left'>" +
                        "<li style='margin: 10px 0;'>RentaSuit.ca is not an agent of <b>" + bp + "</b></li>" +
                        "<li style='margin-bottom: 10px;'><b>" + bp + "</b> has provided fair consideration for the payment I am making</li>" +
                        "<li style='margin-bottom: 10px;'>I authorize RentaSuit to charge my payment method, and release payment to <b>" + bp + "</b></li>" +
                        "<li style='margin-bottom: 10px;'>Once RentaSuit  releases payment to <b>" + bp + "</b> on my behalf, this amount cannot be recovered by RentaSuit</li>" +
                        "<li style='margin-bottom: 10px;'>Retail price will be charged if you fail to return the item at the end of the rental period</li>" +

                        "</ul>" +
                        "</p></div>";

                    swal({
                        title: "Are you sure you want to Place this Order?",
                        type: "warning",
                        text: content,
                        html: true,
                        showCancelButton: true,
                        confirmButtonColor: "#DD6B55",
                        confirmButtonText: "Place Order",
                        cancelButtonText: "No",
                        closeOnConfirm: false,
                        closeOnCancel: false
                    }, function(isConfirm){
                        if(isConfirm){
                            $.ajax({
                                'url'      : location,
                                'method'   : 'get',
                                'dataType' : 'json',
                                success    : function(data){
                                    if(data.result == 'success'){
                                        //window.location.reload();
                                        window.location.href = data.url;
                                    }
                                    else{
                                        swal("Failed!", "Cart Empty.", "error");
                                    }
                                },
                                beforeSend : function(){
                                    $('#loadingDiv').show()
                                },
                                complete   : function(){
                                    $('#loadingDiv').hide();
                                }
                            });
                            return false;
                        }
                        else{
                            swal.close()
                        }
                    });
                });


                $("body").delegate(".change-delivery","change",function(e){
                    e.preventDefault();
                    var location = $(this).data("location");
                    var id = $(this).data("id");
                    var val = $("#delivery_option").val();

                    swal({
                        title: "Are you sure you want to change delivery option?",
                        type: "warning",
                        showCancelButton: true,
                        confirmButtonColor: "#DD6B55",
                        confirmButtonText: "Yes",
                        cancelButtonText: "No",
                        closeOnConfirm: false,
                        closeOnCancel: false
                    }, function(isConfirm){
                        if(isConfirm){
                            $.ajax({
                                'url'      : location + "?id=" + id +"&value=" + val,
                                'method'   : 'get',
                                'dataType' : 'json',
                                success    : function(data){
                                    if(data.result == 'success'){
                                        window.location.reload();
                                    }
                                    else{
                                        swal("Failed!", "Something Wrong!.", "error");
                                    }
                                },
                                beforeSend : function(){
                                    $('#loadingDiv').show()
                                },
                                complete   : function(){
                                    $('#loadingDiv').hide();
                                }
                            });
                            return false;
                        }
                        else{
                            swal.close()
                        }
                    });
                });

                $(document).ready(function(){
                    $('[data-toggle="tooltip"]').popover();
                });

                $("body").delegate(".deposit","click",function(e) {
                    var content = "<h1>$ {!! number_format($final_return, 2) !!}</h1>";
                    swal({
                        title: "Security Deposit",
                        text: content,
                        html: true,
                        closeOnConfirm: false,
                    }, function(isConfirm){
                            swal.close()
                    });
                });

            </script>


@stop