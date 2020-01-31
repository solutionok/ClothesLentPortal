@extends('user-interface.layout')
@section('content')
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
                                    <?php $product = App\Models\Products\Products::with('product_categories')->where('id', $productID)->first(); ?>
                                    <tr>
                                        <th></th>
                                        <th>Image</th>
                                        <th>Product Name</th>
                                        <th>Delivery Option</th>
                                        <th>Rent From</th>
                                        <th>Rent Until</th>
                                        <th>Retail Price</th>
                                        <th>Shipping</th>
                                        <th>Price Per Day</th>
                                        <th>Days</th>
                                        <th>Rent</th>
                                        @if($product->cleaning_price)
                                            <th>Cleaning Price</th>
                                        @endif
                                        <th>Total</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php $final_return = 0 ?>
                                    <?php $final_ship = 0 ?>
                                    <?php $final_fee = 0 ?>
                                    <?php $final_total = 0 ?>
                                    <?php $final_rent = 0 ?>
                                    <?php $availability = count(App\Models\Products\Products::getData($product->id)->availability) == 0 ? 'Available' : 'Unavailable' ?>
                                    <?php $rent_detail = App\Models\Rent\Rent::where('id', $cartID)->first(); ?>
                                    <?php $category = App\Models\Categories::where('id', $product->product_categories[0]->category_id)->first(); ?>

                                    <tr>
                                        <td>
                                        </td>
                                        <td data-title="Image">
                                            <a href="{!!URL('garments/view/'.$product->seo_url)!!}"><img
                                                        src="{!!asset($product->picture)!!}"></a>
                                        </td>
                                        <td data-title="Product Name" class="">
                                            <a href="{!!URL('garments/view/'.$product->seo_url)!!}">{!! $product->name !!}</a>
                                        </td>
                                        <td data-title="Delivery Option"
                                            class="">{!! $rent_detail->delivery_option !!}</td>
                                        <td data-title="Color" class="">{!! $rent_detail->rental_start_date !!}</td>
                                        <td data-title="Size" class="">{!! $rent_detail->rental_end_date !!}</td>

                                        <?php
                                        $date1 = date_create($rent_detail->rental_start_date);
                                        $date2 = date_create($rent_detail->rental_end_date);
                                        $diff = date_diff($date1, $date2);
                                        $total_days = $diff->format("%a") + 1;

                                        if ($rent_detail->delivery_option === "Localization") {
                                            $shipping = 0;
                                        } else if ($rent_detail->delivery_option === "Regular mail") {
                                            $shipping = $category->shipping_fee_local;
                                        } else {
                                            $shipping = $category->shipping_fee_nationwide;
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



                                        ?>

                                        <td data-title="Retail Price" class="">{!! $product->retail_price !!}</td>
                                        <td data-title="Shipping" class="">{!!$shipping !!}</td>
                                        <td data-title="Price" class="">{!! $product->price !!}</td>
                                        <td data-title="Day" class="">{!! $total_days !!}</td>
                                        <td data-title="Rent" class="">{!! $rent !!}

                                        @if($product->cleaning_price)
                                            <td data-title="Admin Fees" class="">{!! $product->cleaning_price !!}</td>
                                        @endif
                                        <td data-title="Price" class="">{!! $total  !!}</td>
                                    </tr>
                                    </tbody>
                                </table>

                            </div>
                        </div>
                    </div>
                    <div class="clearfix">&nbsp;</div>

                    <form action="{!! URL('rented/proceed-checkout') !!}" method="get">
                        <input type="hidden" name="id" value="{!! $cartID !!}">

                        <div class="col-md-12">
                            <div class="page-content wishlist-holder">
                                <div class="text-right">
                                    <div class="clearfix">
                                        <div class="total-holder total">
                                            <div class="clearfix">
                                                <h3 class="pull-left" style="width: 300px">Rent</h3>
                                                <sub class="pull-right">
                                                    <small id="shippingFeeTotal">
                                                        $ {!! number_format($final_rent, 2) !!}</small>
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
                                                    <small id="shippingFeeTotal">
                                                        $ {!! number_format($final_fee, 2) !!}</small>
                                                </sub>
                                            </div>
                                            @if($product->cleaning_price)
                                                <div class="clearfix">
                                                    <h3 class="pull-left" style="width: 300px">Cleaning Price</h3>
                                                    <sub class="pull-right">
                                                        <small id="shippingFeeTotal">
                                                            $ {!! number_format($product->cleaning_price, 2) !!}</small>
                                                    </sub>
                                                </div>
                                            @endif
                                            <div class="clearfix" style="border-top: 3px double #ccc">
                                                <h3 class="pull-left" style="width: 300px">Total Charges</h3>
                                                <sub class="pull-right">
                                                    <small id="shippingFeeTotal">
                                                        $ {!! number_format($final_fee + $final_ship + $final_rent + $product->cleaning_price, 2) !!}</small>
                                                </sub>
                                            </div>

                                            <div class="clearfix">
                                                <h3 class="pull-left text-right">&nbsp;</h3>
                                                <sub class="pull-right">
                                                    <small id="shippingFeeTotal">+</small>
                                                </sub>
                                            </div>
                                            <div class="clearfix">
                                                <h3 class="pull-left " style="width: 300px">
                                                    Security Deposit <br><span
                                                            style="font-size: 12px; font-weight: lighter">(Money on hold until items returned)</span>
                                                </h3>
                                                <sub class="pull-right">
                                                    <small id="shippingFeeTotal">
                                                        $ {!! number_format($final_return, 2) !!}</small>
                                                </sub>
                                            </div>
                                            <div class="clearfix" style="border-top: 3px double #ccc">
                                                <h3 class="pull-left" style="width: 300px">Total Payment</h3>
                                                <sub class="pull-right">
                                                    <small id="shippingFeeTotal">
                                                        $ {!! number_format($final_total, 2) !!}</small>
                                                    <input type="hidden" name="total"
                                                           value="{!! number_format($final_total, 2) !!}"/>
                                                </sub>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="clearfix">&nbsp;</div>
                                    <p style="margin-right: 10px">I accept the <b><a style='color: #95b2f2'
                                                                                     href='{!!URL("terms-and-conditions")!!}'
                                                                                     target="_blank"></b>terms and
                                        conditions</a>
                                        and have read the <b><a style='color: #95b2f2'
                                                                href='{!!URL('privacy-policy')!!}' target="_blank">
                                                privacy policy</a></b>.</p>
                                    <button id="btn-submit" type="submit" class="continue-btn" style="margin: 0 10px;">
                                        PAY THE RENTAL
                                    </button>

                                    {{--<div id="paypal-button"></div>--}}

                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        @stop
        @section('js')
            @include('user-interface.cart.includes.js')
            <script src="https://www.paypalobjects.com/api/checkout.js"></script>

            <script>


                $('#btn-submit').on('click', function (e) {

                    e.preventDefault();
                    var form = $(this).parents('form');

                    var content = "<div><p style='text-align: left'>I hereby understand and agree that: <br>" +
                        "<ul style='text-align: left'>" +
                        "<li style='margin: 10px 0;'>I have read and understood Rent a Suit's Terms and Conditions and Privacy Policy.</li>" +
                        "<li style='margin-bottom: 10px;'>There is no employer or employee principal or agent, partnership or joint venture, or any other fiduciary relationship between Rent a Suit and person providing Items for rent.</li>" +
                        "<li style='margin-bottom: 10px;'>Person providing Items for rent has provided fair consideration for the payment I am making.</li>" +
                        "<li style='margin-bottom: 10px;'>I am authorizing Rent a Suit to charge my payment method for the amount shown at the checkout and for any subsequent amounts such as for late fees, penalties, repair or replacement of Items.</li>" +
                        "<li style='margin-bottom: 10px;'>Once the payment has been released the person providing Items for rent, I will not be able to receive any refund.</li>" +
                        "</ul>" +
                        "</p></div>";

                    swal({
                        title: "Agree?",
                        text: content,
                        html: true,
                        type: "warning",
                        showCancelButton: true,
                        confirmButtonColor: "#DD6B55",
                        confirmButtonText: "Yes",
                        cancelButtonText: "No",
                        closeOnConfirm: false,
                        closeOnCancel: false
                    }, function (isConfirm) {
                        if (isConfirm) {
                            form.submit();
                        }
                        else {
                            swal.close()
                        }
                    });
                });


                /*paypal.Button.render({
                 env: 'production', // Or 'sandbox',

                 commit: true, // Show a 'Pay Now' button

                 style: {
                 color: 'gold',
                 size: 'small'
                 },

                 payment: function(data, actions) {
                 /!*
                 * Set up the payment here
                 *!/

                 var SETEC_URL = 'https://svcs.sandbox.paypal.com/AdaptivePayments/Pay';

                 return paypal.request.post(SETEC_URL).then(function(res) {
                 return res.id;
                 });
                 },

                 onAuthorize: function(data, actions) {
                 /!*
                 * Execute the payment here
                 *!/
                 },

                 onCancel: function(data, actions) {
                 /!*
                 * Buyer cancelled the payment
                 *!/
                 },

                 onError: function(err) {
                 /!*
                 * An error occurred during the transaction
                 *!/
                 }
                 }, '#paypal-button');*/
            </script>
            <script type="text/javascript">
                var feeType = [];
            </script>


@stop