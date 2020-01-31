@extends('user-interface.layout')
@section('title',App\User::displayName(Auth::user()->id))
@section('content')
    <div class="dashboard for-rent">
        <div class="section-1">
            <div class="mx-1254 clearfix">
                <div class="breadcrumbs">
                    <ul>
                        <li><a href="{!!URL('/')!!}">Home</a></li>
                        <li><span>for rent</span></li>
                    </ul>
                </div>
                <div class="dashboard-container clearfix">
                    @include('user-interface.dashboard.includes.left-sidebar')
                    <div class="col-md-9">
                        <div class="page-content">
                            <div class="page-content-header clearfix">
                                <div class="header-left">
                                    <h3>For Rent <span>({{$total_products}})</span></h3>
                                </div>
                                <div class="header-right">
                                    <div class="form-group clearfix">
                                        <label for="" class="col-sm-5 control-label">Sort by</label>
                                        <div class="col-sm-7">
                                            <div class="select">
                                                <select class="form-control select_form" name="sort">
                                                <option value="date-recently" {{ Request::input('sort') == 'date-recently' ? 'selected' : '' }}>Date (Recently)</option>
                                                <option value="date-beginning" {{ Request::input('sort') == 'date-beginning' ? 'selected' : '' }}>Date (Beginning)</option>
                                                <option value="price-high" {{ Request::input('sort') == 'price-high' ? 'selected' : '' }}>Price (High)</option>
                                                <option value="price-low" {{ Request::input('sort') == 'price-low' ? 'selected' : '' }}>Price (Low)</option>
                                                <option value="name-asc" {{ Request::input('sort') == 'name-asc' ? 'selected' : '' }}>Name (Asc)</option>
                                                <option value="name-desc" {{ Request::input('sort') == 'name-desc' ? 'selected' : '' }}>Name (Desc)</option>
                                                <option value="designer-asc" {{ Request::input('sort') == 'designer-asc' ? 'selected' : '' }}>Designer (Asc)</option>
                                                <option value="designer-desc" {{ Request::input('sort') == 'designer-desc' ? 'selected' : '' }}>Designer (Desc)</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="listing-product-holder text-center">
                                @forelse($products as $value)
                                    <div class="single-product-item">


                                        <?php

                                        $product_review_avg = \App\Models\ProductUserReview::where('product_id', $value->id)->avg('rating');
                                        $product_review_avg = round($product_review_avg);
                                        $without_fill_start = 5 - $product_review_avg;

                                        $client = \App\models\Rent\Rent::with('user_detail')
                                            ->where('product_id', $value->id)
                                            ->where('status', 'Payment Accepted')
                                            ->first();

                                        $rent = \App\models\Rent\Rent::where( 'product_id', $value->id )->whereNotIn( 'status', array(
                                            'Merchant Received',
                                            'Cart',
                                            'Declined',
                                            'Pending',
                                            'Canceled'
                                        ) )->first();

                                        ?>


                                        {{--<a href="{!!URL('for-rent/view/'.$value->id)!!}">--}}
                                        <div class="img-holder">
                                        <img style="{!! $rent ? "opacity: .2" : "" !!}" src="{!!asset($value->picture)!!}">
                                        </div>
                                        {{--</a>--}}
                                        <h5>{{$value->name}}</h5>

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
                                            <div class="pull-right price">
                                                <p>${{number_format($value->price,2)}}</p>
                                            </div>
                                            <div class="clearfix">
                                                <div class="pull-right">
                                                    <p><b>Designer:</b> {{$value->designer}}</p>
                                                </div>
                                            </div>

                                        </div>
                                        <div class="clearfix">
                                            <div class="btn-holder">
                                                <a href="{!!URL('for-rent/edit-item/'.$value->id)!!}" class="with-background"><i class="fa fa-pencil-square-o" aria-hidden="true"></i>EDIT ITEM</a>
                                            </div>
                                            <div class="btn-holder">
                                                <a data-location="{!! URL('for-rent/delete/'.$value->id) !!}" class="removeItem border-only remove-item" data-toggle="tooltip" data-placement="bottom" title="Remove Item">REMOVE ITEM</a>
                                            </div>

                                            <div class="btn-holder" style="width:100%">
                                                {{--@if($client)
                                                    <a data-location="{!! URL('rented/change-status/merchantSent/'.$client->id) !!}" class="item-sent with-background" data-toggle="tooltip" data-placement="bottom" title="Remove Item" >ITEM SENT?</a>
                                                    <a data-client="{{$client}}" data-merchant="{{$value}}" class="with-background white profile-control-right print-label" data-toggle="tooltip" data-placement="bottom" title="Print Label">PRINT LABEL</a>
                                                @endif
                                                @if($sent)
                                                    <a href="{!! URL('rented/change-status/merchantReceived/'.$sent->id) !!}" class="with-background profile-control-right">Item Received?</a>
                                                    <a data-info="{!! $sent->return_shipping_info !!}" class="with-background white profile-control-right shipping-info" data-toggle="tooltip" data-placement="bottom" title="cancel">Shipping Info</a>
                                                @endif--}}
                                                <a href="{!! URL('for-rent/booking-list/'.$value->id) !!}" class="with-background">BOOKING LIST</a>
                                            </div>
                                        </div>
                                            
                                    </div>
                                @empty
                                    No result found.
                                @endforelse
                            </div>
                            <div class="text-right">
                                {{ $products->appends(Request::input())->render() }}
                                <!-- <ul class="pagination">
                                    <li class="page-item"><a class="page-link" href="#">Previous</a></li>
                                    <li class="page-item active"><a class="page-link" href="#">1</a></li>
                                    <li class="page-item"><a class="page-link" href="#">2</a></li>
                                    <li class="page-item"><a class="page-link" href="#">3</a></li>
                                    <li class="page-item"><a class="page-link" href="#">Next</a></li>
                                </ul> -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop
@section('js')
    <script type="text/javascript">
        $(document).on("change","select[name='sort']",function(){
            window.location.href = "{{URL('for-rent?sort=')}}"+$(this).val();
        });
        $(".pagination>li:first-child>a, .pagination>li:first-child>span").html("Previous");
        $(".pagination>li:last-child>a, .pagination>li:last-child>span").html("Next");


        $("body").delegate(".print-label","click",function(e){
            e.preventDefault();
            var client = $(this).data("client");
            var merchant = $(this).data("merchant");

            var address = client.street_number + " " + client.route + " " + client.address2 + " " + client.city + ", " + client.state + ", " + client.country ;

            var inviteDevInput =
                "<input class='print-input' type='button' id='btn' value='Print' onclick='printDiv();'>" +
                "<div class='clearfix'></div>" +
                "<div id='DivIdToPrint'>" +
                "<div class='row'>" +
                "<h3>Automatic Label</h3>" +
                "<p><span>Recipient Name: </span>" + client.user_detail.first_name + " " + client.user_detail.last_name + "  </p>" +
                "<p><span>Address: </span>" + address + "  </p>" +
                "<p><span>Postal Address: </span>" + client.postal_code + "  </p>" +
                "<p><span>Contact: </span>" + client.contact_number + "  </p>" +
                "</div>" +

                "<div class='row'>" +
                "<h3>Return Label</h3>" +
                "<p><span>Recipient Name: </span>" + merchant.user_detail.first_name + " " + merchant.user_detail.last_name + "  </p>" +
                "<p><span>Address: </span>" + merchant.user_detail.location + ", " + merchant.user_detail.country + "  </p>" +
                "<p><span>Contact: </span>" + merchant.user_detail.contact_number + "  </p>" +
                "</div>" +


                "</div>";

            swal({
                title: "",
                text: inviteDevInput,
                html: true,
                showCancelButton: true,
                showConfirmButton: false,
                confirmButtonColor: "#DD6B55",
                cancelButtonText: "Close",
                closeOnConfirm: false,
                closeOnCancel: false

            });
        });

        $("body").delegate(".item-sent","click",function(e){
            e.preventDefault();
            var location = $(this).data("location");

            var inviteDevInput = '<form> ' +
                '<div class="row"> ' +
                '<textarea id="textarea" class="textarea2"></textarea>' +
                '</form>';

            var recordType;

            swal({
                title: "Provide Shipping Info",
                text: inviteDevInput,
                html: true,
                showCancelButton: true,
                confirmButtonColor: "#DD6B55",
                confirmButtonText: "Submit",
                cancelButtonText: "Close",
                closeOnConfirm: false,
                closeOnCancel: false

            }, function(isConfirm){

                recordType = $("#textarea").val();

                if(!isConfirm) {
                    swal.close();
                }
                if(!recordType) {
                    return false;
                }

                if(isConfirm){
                    $.ajax({
                        'url'      : location + '?extra=' + recordType,
                        'method'   : 'get',
                        'dataType' : 'json',
                        success    : function(data){
                            if(data.result == 'success'){
                                window.location.reload();
                            }
                            else{
                                swal("Action failed", "Please check your inputs or connection and try again.", "error");
                            }
                        },
                        beforeSend : function(){
                            $('#loadingDiv').show()
                        },
                        complete   : function(){
                            $('#loadingDiv').hide();
                        }
                    });
                    swal.close();
                    return false;
                }
            });
            $('input:radio').on('click', function() {
                if($(this).val() === 'other') {
                    $("#showDiv").show();
                } else {
                    $("#showDiv").hide();

                }
            });
            $("#showDiv").hide();
        });

        $("body").delegate(".shipping-info","click",function(e){
            e.preventDefault();
            var info = $(this).data("info");

            var inviteDevInput =
                "<div class='row'>" +
                "<p>" + info + "  </p>" +
                "</div>";

            swal({
                title: "Shipping Information",
                text: inviteDevInput,
                html: true,
                showCancelButton: true,
                showConfirmButton: false,
                confirmButtonColor: "#DD6B55",
                cancelButtonText: "Close",
                closeOnConfirm: false,
                closeOnCancel: false

            });
        });

        $("body").delegate(".remove-item","click",function(e){
            e.preventDefault();
            var location = $(this).data("location");


            var inviteDevInput = '<form> ' +
                '<div class="row"> ' +
                '<h3>Select Reason!</h3>' +
                '</div> ' +

                '<div class="row"> ' +
                '<span style="float: left;width: 25%">&nbsp;</span>' +
                '<input id="radio1" style="margin: 0; box-shadow: none; width: 5%; display: block; height: 15px; float: left;" type="radio" name="csvSelect" value=1 > ' +
                '<label style="width: 70%; text-align: left; cursor:pointer" for="radio1"> This Item is Overused </label> ' +
                '</div> ' +
                '<div class="row"> ' +
                '<span style="float: left;width: 25%">&nbsp;</span>' +
                '<input id="radio2" style="margin: 0; box-shadow: none; width: 5%; display: block; height: 15px; float: left;" type="radio" name="csvSelect" value=2 > ' +
                '<label style="width: 70%; text-align: left; cursor:pointer" for="radio2"> I no Longer have it </label> ' +
                '</div> ' +
                '<div class="row"> ' +
                '<span style="float: left;width: 25%">&nbsp;</span>' +
                '<input id="radio3" style="margin: 0; box-shadow: none; width: 5%; display: block; height: 15px; float: left;" type="radio" name="csvSelect" value=3>' +
                '<label style="width: 70%; text-align: left; cursor:pointer" for="radio3"> I changed my mind </label> </div>' +
                '</form>';

            swal({
                title             : "Are you sure you want to delete this item?",
                type              : "warning",
                html              : true,
                text              : inviteDevInput,
                showCancelButton  : true,
                confirmButtonColor: "#DD6B55",
                confirmButtonText : "Yes",
                cancelButtonText  : "No",
                closeOnConfirm    : false,
                closeOnCancel     : false
            }, function(isConfirm){

                recordType = $("input[name=csvSelect]:checked").val();


                if(!isConfirm) {
                    swal.close();
                }

                if(!recordType) {
                    return false;
                }
                if(isConfirm){
                    $.ajax({
                        'url'      : location + '?extra=' + recordType,
                        'method'   : 'get',
                        'dataType' : 'json',
                        success    : function(data){
                            if(data.result == 'success'){
                                window.location.reload();
                            }
                            else if (data.result == 'used') {
                                swal("Error!", "User already used this product. You can`t delete this product.", "error");
                            } else {
                                swal("Error!", "Product not found.", "error");
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

    </script>
@stop