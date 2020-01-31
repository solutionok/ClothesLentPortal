@extends('user-interface.layout')
@section('title',App\User::displayName(Auth::user()->id))
@section('content')
    @include('user-interface.dashboard.notification.includes.index.give-feedback')
    <div class="dashboard notification">
        <div class="section-1">
            <div class="mx-1254 clearfix">
                <div class="breadcrumbs">
                    <ul>
                        <li><a href="{!!URL('/')!!}">Home</a></li>
                        <li><a href="{!!URL('/for-rent')!!}">For Rent</a></li>
                        <li><span>Booking List</span></li>
                    </ul>
                </div>
                <div class="dashboard-container clearfix">
                    @include('user-interface.dashboard.includes.left-sidebar')
                    <div class="col-md-9">
                        <div class="page-content">
                            <div class="page-content-header clearfix">
                                <div class="col-md-6">
                                    <h3>Booking List: {{$product->name}}</h3>
                                </div>
                                <div class="col-md-6 text-right">
                                    <div class="item-img-holder">
                                        <img class="item-img" style="width: 105px;" src="{{asset($product->picture)}}">
                                    </div>
                                </div>
                            </div>
                            
                            @forelse($booking_list as $value)

                                @if($value->user_detail)
                            	<div class="listing-of-notification">
                                <div class="single-notification clearfix">
                                   
                                        <div class="col_img">
                                            <div class="img-holder">
                                                <img src="/{{$value->user_detail->profile_picture}}" style="width:87px;height:87px;border-radius:50%">
                                            </div>
                                        </div>

                                    <?php
                                    $client = \App\models\Rent\Rent::with('user_detail')
                                        ->where('id', $value->id)
                                        ->first();

                                    $rating = \App\Models\Ratting::where('user_id', $value->user_id)->where('product_id', $value->product_id)->orderBy('id', 'desc')->first();

                                    $review = \App\Models\ProductUserReview::where('user_id', $value->user_id)->where('product_id', $value->product_id)->orderBy('id', 'desc')->first();
                                    if($review) {
                                        $rating['comment'] = $review->comment;
                                    }
                                    ?>

                                        <div class="col_content">
                                           {{$value->user_detail->first_name}} {{$value->user_detail->last_name}}
                                            <br>
                                            {{$value->user_detail->location}}
                                            <br>
                                            {{$value->rental_start_date}} to {{$value->rental_end_date}}
                                            <br>
                                            @if($value->shipping_info)
                                                <b>Shipping Info:</b> {{$value->shipping_info}}
                                            <br>
                                            @endif

                                            <b>{{$value->status}}</b>

                                            <br>
                                            <br>
                                            @if($value->status=="Pending")
                                                @if($value->paypal_email_address)
                                                    <a data-location="{!! URL('rented/change-status/accept/'. $value->id) !!}"
                                                       class="btn btn-sm accept-user"
                                                       data-toggle="tooltip" data-placement="bottom"
                                                       title="Accept" style="background:#d4ad53;color:#fff">Approve</a>

                                                @else
                                                    <a data-location="{!! URL('rented/missingPaypalAddress/'. $value->id) !!}"
                                                       class="btn btn-sm missing-paypal"
                                                       data-toggle="tooltip" data-placement="bottom"
                                                       title="Accept" style="background:#d4ad53;color:#fff">Approve</a>
                                                @endif
                                                <a data-location="{!! URL('rented/change-status/decline/'. $value->id) !!}"
                                                   class="btn btn-sm reject-user"
                                                   data-toggle="tooltip" data-placement="bottom"
                                                   title="Reject" style="background:#d4ad53;color:#fff">Disapprove</a>

                                            @endif

                                            @if($value->status === 'Payment Accepted')
                                                    <a data-location="{!! URL('rented/change-status/merchantSent/'.$value->id) !!}" style="background:#d4ad53;color:#fff; font-size: 14px" class="item-sent btn btn-sm " data-toggle="tooltip" data-placement="bottom">ITEM SENT?</a>
                                                    <a data-client="{{$client}}" data-merchant="{{$product}}" class="btn btn-sm print-label" data-toggle="tooltip" style="background:#d4ad53;color:#fff; font-size: 14px" data-placement="bottom" title="Print Label">PRINT LABEL</a>
                                            @endif

                                            @if($value->status === 'Client Sent')
                                                <a data-location="{!! URL('rented/change-status/merchantReceived/'.$value->id) !!}" data-info="{{$rating}}" class="small-buttons btn btn-sm item-received" style="background:#d4ad53;color:#fff" data-toggle="tooltip" data-placement="bottom" title="No">Item Received?</a>
                                                <a data-info="{!! $value->return_shipping_info !!}" class="small-buttons btn btn-sm shipping-info" style="background:#fff;color:#d4ad53" data-toggle="tooltip" data-placement="bottom" title="No">Shipping Info</a>

                                            @endif
                                            
                                            
                                            
                                        </div>
                                            
                                            
                                        </div>
                                      
                                       
                                    
                                </div>
                                @endif
                            @empty
                                No Booking List Found.
                            @endforelse
                            </div>
                            <div class="text-right">
                                <ul class="pagination">
                                    {{ $booking_list->appends(Request::input())->render() }}
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
    <script src="js/jquery.raty.js"></script>
    <script type="text/javascript">
        $(document).on("change","select[name='sort']",function(){
            window.location.href = "{{URL('notification?sort=')}}"+$(this).val();
        });
        $(".pagination>li:first-child>a, .pagination>li:first-child>span").html("Previous");
        $(".pagination>li:last-child>a, .pagination>li:last-child>span").html("Next");

        $(document).ready(function() {
            $('.popup-with-form').magnificPopup({
                type: 'inline'
            });
        });
        $('#rate_1').raty({
            half     : false,
            starType : 'i'
        });
        $('#rate_2').raty({
            half     : false,
            starType : 'i'
        });
        $('#rate_3').raty({
            half     : false,
            starType : 'i'
        });
        $('#rate_4').raty({
            half     : false,
            starType : 'i'
        });
        $('#rate_5').raty({
            half     : false,
            starType : 'i'
        });
        $('#rate_6').raty({
            half     : false,
            starType : 'i'
        });
        $('#rate_7').raty({
            half     : false,
            starType : 'i'
        });
        $('#rate_8').raty({
            half     : false,
            starType : 'i'
        });

        $("body").delegate(".accept-user","click",function(e){
            e.preventDefault();
            var location = $(this).data("location");

            var inviteDevInput = '<form> ' +
                '<div class="row"> ' +
                    '<span style="float: left;width: 25%">&nbsp;</span>' +
                    '<input style="margin: 0; box-shadow: none; width: 5%; display: block; height: 15px; float: left;" type="radio" name="csvSelect" id="radio1" ng-model="radioValue" ng-value="1" value="Localization" > ' +
                    '<label style="width: 70%; text-align: left; cursor:pointer" for="radio1"> Localization </label> ' +
                '</div> ' +
                '<div class="row"> ' +
                    '<span style="float: left;width: 25%">&nbsp;</span>' +
                    '<input style="margin: 0; box-shadow: none; width: 5%; display: block; height: 15px; float: left;" type="radio" name="csvSelect" id="radio2" ng-model="radioValue" ng-value="2" value="Regular mail" > ' +
                    '<label style="width: 70%; text-align: left; cursor:pointer" for="radio2"> Regular Mail </label> ' +
                '</div> ' +
                '<div class="row"> ' +
                    '<span style="float: left;width: 25%">&nbsp;</span>' +
                    '<input style="margin: 0; box-shadow: none; width: 5%; display: block; height: 15px; float: left;" type="radio" name="csvSelect" id="radio3" ng-model="radioValue" ng-value="3" value="Ups">' +
                    '<label style="width: 70%; text-align: left; cursor:pointer" for="radio3"> Pick up from UPS </label> </div>' +
                '</form>';

            var recordType;

            swal({
                title: "Select Return Delivery Method",
                text: inviteDevInput,
                html: true,
                showCancelButton: true,
                confirmButtonColor: "#DD6B55",
                confirmButtonText: "Submit",
                cancelButtonText: "Close",
                closeOnConfirm: false,
                closeOnCancel: false


//                title             : "Are you sure?",
//                text              : "You will not be able to recover "+name+"!",
//                type              : "warning",
//                showCancelButton  : true,
//                confirmButtonColor: "#DD6B55",
//                confirmButtonText : "Yes, remove it!",
//                cancelButtonText  : "No, cancel it!",
//                closeOnConfirm    : false,
//                closeOnCancel     : false
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
        });

        $("body").delegate(".reject-user","click",function(e){
            e.preventDefault();
            var location = $(this).data("location");

            var inviteDevInput = '<form> ' +
                '<div class="row"> ' +
                '<span style="float: left;width: 25%">&nbsp;</span>' +
                '<input style="margin: 0; box-shadow: none; width: 5%; display: block; height: 15px; float: left;" type="radio" name="csvSelect" id="radio1" ng-model="radioValue" ng-value="1" value="Bad review on customer" > ' +
                '<label style="width: 70%; text-align: left; cursor:pointer" for="radio1"> Bad review on customer </label> ' +
                '</div> ' +
                '<div class="row"> ' +
                '<span style="float: left;width: 25%">&nbsp;</span>' +
                '<input style="margin: 0; box-shadow: none; width: 5%; display: block; height: 15px; float: left;" type="radio" name="csvSelect" id="radio2" ng-model="radioValue" ng-value="2" value="Change my mind" > ' +
                '<label style="width: 70%; text-align: left; cursor:pointer" for="radio2"> Change my mind </label> ' +
                '</div> ' +
                '<div class="row"> ' +
                '<span style="float: left;width: 25%">&nbsp;</span>' +
                '<input style="margin: 0; box-shadow: none; width: 5%; display: block; height: 15px; float: left;" type="radio" name="csvSelect" id="radio3" ng-model="radioValue" ng-value="3" value="Item is not available">' +
                '<label style="width: 70%; text-align: left; cursor:pointer" for="radio3"> Item is not available </label> </div>' +
                '</form>';

            var recordType;

            swal({
                title: "Select Reason",
                text: inviteDevInput,
                html: true,
                showCancelButton: true,
                confirmButtonColor: "#DD6B55",
                confirmButtonText: "Submit",
                cancelButtonText: "Close",
                closeOnConfirm: false,
                closeOnCancel: false


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

        $("body").delegate(".item-received","click",function(e){
            e.preventDefault();
            var location = $(this).data("location");

            var inviteDevInput = '<form> ' +
                '<div class="row"> ' +
                '<div class="columns col-md-11 col-md-offset-1 text-left"> ' +
                '<p style="color: #d4ad53;">PLEASE RATE THE FOLLOWINGS from 1 to 5 (1 - worst and 5 - best):</p>' +
                '</div>' +
                '</div>' +

                '<div class="clearfix">&nbsp;</div> ' +
                '<div class="ratings"> ' +
                '<div class="row"> ' +
                '<div class="columns col-md-7 col-md-offset-1 text-left"> ' +
                '<b>TIME TO RETURN ITEM</b>' +
                '</div>' +
                '<div class="columns col-md-4"> ' +
                '<label for="star1"><i class="star-1 fa fa-star-o" ></i></label>' +
                '<input type="radio" name="star_rating" value="1" id="star1">' +
                '<label for="star2"><i class="star-2 fa fa-star-o" ></i></label>' +
                '<input type="radio" name="star_rating" value="2" id="star2">' +
                '<label for="star3"><i class="star-3 fa fa-star-o" ></i></label>' +
                '<input type="radio" name="star_rating" value="3" id="star3">' +
                '<label for="star4"><i class="star-4 fa fa-star-o" ></i></label>' +
                '<input type="radio" name="star_rating" value="4" id="star4">' +
                '<label for="star5"><i class="star-5 fa fa-star-o" ></i></label>' +
                '<input type="radio" name="star_rating" value="5" id="star5">' +
                '</div>' +
                '</div>' +


                '<div class="row"> ' +
                '<div class="columns col-md-7 col-md-offset-1 text-left"> ' +
                '<b>CLEANLINESS</b>' +
                '</div>' +
                '<div class="columns col-md-4"> ' +
                '<label for="star11"><i class="star-11 fa fa-star-o" ></i></label>' +
                '<input type="radio" name="star_rating1" value="1" id="star11">' +
                '<label for="star12"><i class="star-12 fa fa-star-o" ></i></label>' +
                '<input type="radio" name="star_rating1" value="2" id="star12">' +
                '<label for="star13"><i class="star-13 fa fa-star-o" ></i></label>' +
                '<input type="radio" name="star_rating1" value="3" id="star13">' +
                '<label for="star14"><i class="star-14 fa fa-star-o" ></i></label>' +
                '<input type="radio" name="star_rating1" value="4" id="star14">' +
                '<label for="star15"><i class="star-15 fa fa-star-o" ></i></label>' +
                '<input type="radio" name="star_rating1" value="5" id="star15">' +
                '</div>' +
                '</div>' +

                '<div class="row"> ' +
                '<div class="columns col-md-7 col-md-offset-1 text-left"> ' +
                '<b>COMMUNICATION</b>' +
                '</div>' +
                '<div class="columns col-md-4"> ' +
                '<label for="star41"><i class="star-41 fa fa-star-o" ></i></label>' +
                '<input type="radio" name="star_rating4" value="1" id="star41">' +
                '<label for="star42"><i class="star-42 fa fa-star-o" ></i></label>' +
                '<input type="radio" name="star_rating4" value="2" id="star42">' +
                '<label for="star43"><i class="star-43 fa fa-star-o" ></i></label>' +
                '<input type="radio" name="star_rating4" value="3" id="star43">' +
                '<label for="star44"><i class="star-44 fa fa-star-o" ></i></label>' +
                '<input type="radio" name="star_rating4" value="4" id="star44">' +
                '<label for="star45"><i class="star-45 fa fa-star-o" ></i></label>' +
                '<input type="radio" name="star_rating4" value="5" id="star45">' +
                '</div>' +
                '</div>' +

                '<div class="row"> ' +
                '<div class="columns col-md-7 col-md-offset-1 text-left"> ' +
                '<b>OVERALL EXPERIENCE</b>' +
                '</div>' +
                '<div class="columns col-md-4"> ' +
                '<label for="star51"><i class="star-51 fa fa-star-o" ></i></label>' +
                '<input type="radio" name="star_rating5" value="1" id="star51">' +
                '<label for="star52"><i class="star-52 fa fa-star-o" ></i></label>' +
                '<input type="radio" name="star_rating5" value="2" id="star52">' +
                '<label for="star53"><i class="star-53 fa fa-star-o" ></i></label>' +
                '<input type="radio" name="star_rating5" value="3" id="star53">' +
                '<label for="star54"><i class="star-54 fa fa-star-o" ></i></label>' +
                '<input type="radio" name="star_rating5" value="4" id="star54">' +
                '<label for="star55"><i class="star-55 fa fa-star-o" ></i></label>' +
                '<input type="radio" name="star_rating5" value="5" id="star55">' +
                '</div>' +
                '</div>' +


                '</div>' +

                '</form>';

            var title;
            var comment;
            var rating;

            swal({
                title: "GIVE YOUR FEEDBACK",
                text: inviteDevInput,
                html: true,
                showCancelButton: true,
                confirmButtonColor: "#DD6B55",
                confirmButtonText: "Submit",
                cancelButtonText: "Close",
                closeOnConfirm: false,
                closeOnCancel: false

            }, function(isConfirm){

                title = $("input[name=title]").val();
                rating1 = $("input:radio[name=star_rating]:checked").val()  || 0;
                rating2 = $("input:radio[name=star_rating1]:checked").val() || 0;
                rating5 = $("input:radio[name=star_rating4]:checked").val() || 0;
                rating6 = $("input:radio[name=star_rating5]:checked").val() || 0;

                rating = rating1 + "," + rating2 + "," + rating5 + "," + rating6;

                if(isConfirm){
                    $.ajax({
                        'url'      : location + '?rating=' + rating + "&title=" + title + "&comment=" + comment,
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
                } else {
                    swal.close();
                }
            });

            $('input[name=star_rating]').on('click', function() {

                $('.star-1').addClass('fa-star');
                $('.star-1').removeClass('fa-star-o');

                if(this.value !== '1') {
                    $('.star-2').addClass('fa-star');
                    $('.star-2').removeClass('fa-star-o');
                }

                if(this.value !== '2') {
                    $('.star-3').addClass('fa-star');
                    $('.star-3').removeClass('fa-star-o');
                }

                if(this.value !== '3') {
                    $('.star-4').addClass('fa-star');
                    $('.star-4').removeClass('fa-star-o');
                }

                if(this.value !== '4') {
                    $('.star-5').addClass('fa-star');
                    $('.star-5').removeClass('fa-star-o');
                }

                if(this.value === '1') {
                    $('.star-2').addClass('fa-star-o');
                    $('.star-2').removeClass('fa-star');
                    $('.star-3').addClass('fa-star-o');
                    $('.star-3').removeClass('fa-star');
                    $('.star-4').addClass('fa-star-o');
                    $('.star-4').removeClass('fa-star');
                    $('.star-5').addClass('fa-star-o');
                    $('.star-5').removeClass('fa-star');
                } else if(this.value === '2') {
                    $('.star-3').addClass('fa-star-o');
                    $('.star-3').removeClass('fa-star');
                    $('.star-4').addClass('fa-star-o');
                    $('.star-4').removeClass('fa-star');
                    $('.star-5').addClass('fa-star-o');
                    $('.star-5').removeClass('fa-star');
                } else if(this.value === '3') {
                    $('.star-4').addClass('fa-star-o');
                    $('.star-4').removeClass('fa-star');
                    $('.star-5').addClass('fa-star-o');
                    $('.star-5').removeClass('fa-star');
                } else if(this.value === '4') {
                    $('.star-5').addClass('fa-star-o');
                    $('.star-5').removeClass('fa-star');
                }
            });

            $('input[name=star_rating1]').on('click', function() {
                $('.star-11').addClass('fa-star');
                $('.star-11').removeClass('fa-star-o');

                if(this.value !== '1') {
                    $('.star-12').addClass('fa-star');
                    $('.star-12').removeClass('fa-star-o');
                }

                if(this.value !== '2') {
                    $('.star-13').addClass('fa-star');
                    $('.star-13').removeClass('fa-star-o');
                }

                if(this.value !== '3') {
                    $('.star-14').addClass('fa-star');
                    $('.star-14').removeClass('fa-star-o');
                }

                if(this.value !== '4') {
                    $('.star-15').addClass('fa-star');
                    $('.star-15').removeClass('fa-star-o');
                }

                if(this.value === '1') {
                    $('.star-12').addClass('fa-star-o');
                    $('.star-12').removeClass('fa-star');
                    $('.star-13').addClass('fa-star-o');
                    $('.star-13').removeClass('fa-star');
                    $('.star-14').addClass('fa-star-o');
                    $('.star-14').removeClass('fa-star');
                    $('.star-15').addClass('fa-star-o');
                    $('.star-15').removeClass('fa-star');
                } else if(this.value === '2') {
                    $('.star-13').addClass('fa-star-o');
                    $('.star-13').removeClass('fa-star');
                    $('.star-14').addClass('fa-star-o');
                    $('.star-14').removeClass('fa-star');
                    $('.star-15').addClass('fa-star-o');
                    $('.star-15').removeClass('fa-star');
                } else if(this.value === '3') {
                    $('.star-14').addClass('fa-star-o');
                    $('.star-14').removeClass('fa-star');
                    $('.star-15').addClass('fa-star-o');
                    $('.star-15').removeClass('fa-star');
                } else if(this.value === '4') {
                    $('.star-15').addClass('fa-star-o');
                    $('.star-15').removeClass('fa-star');
                }
            });

            $('input[name=star_rating4]').on('click', function() {
                $('.star-41').addClass('fa-star');
                $('.star-41').removeClass('fa-star-o');

                if(this.value !== '1') {
                    $('.star-42').addClass('fa-star');
                    $('.star-42').removeClass('fa-star-o');
                }

                if(this.value !== '2') {
                    $('.star-43').addClass('fa-star');
                    $('.star-43').removeClass('fa-star-o');
                }

                if(this.value !== '3') {
                    $('.star-44').addClass('fa-star');
                    $('.star-44').removeClass('fa-star-o');
                }

                if(this.value !== '4') {
                    $('.star-45').addClass('fa-star');
                    $('.star-45').removeClass('fa-star-o');
                }

                if(this.value === '1') {
                    $('.star-42').addClass('fa-star-o');
                    $('.star-42').removeClass('fa-star');
                    $('.star-43').addClass('fa-star-o');
                    $('.star-43').removeClass('fa-star');
                    $('.star-44').addClass('fa-star-o');
                    $('.star-44').removeClass('fa-star');
                    $('.star-45').addClass('fa-star-o');
                    $('.star-45').removeClass('fa-star');
                } else if(this.value === '2') {
                    $('.star-43').addClass('fa-star-o');
                    $('.star-43').removeClass('fa-star');
                    $('.star-44').addClass('fa-star-o');
                    $('.star-44').removeClass('fa-star');
                    $('.star-45').addClass('fa-star-o');
                    $('.star-45').removeClass('fa-star');
                } else if(this.value === '3') {
                    $('.star-44').addClass('fa-star-o');
                    $('.star-44').removeClass('fa-star');
                    $('.star-45').addClass('fa-star-o');
                    $('.star-45').removeClass('fa-star');
                } else if(this.value === '4') {
                    $('.star-45').addClass('fa-star-o');
                    $('.star-45').removeClass('fa-star');
                }
            });

            $('input[name=star_rating5]').on('click', function() {
                $('.star-51').addClass('fa-star');
                $('.star-51').removeClass('fa-star-o');

                if(this.value !== '1') {
                    $('.star-52').addClass('fa-star');
                    $('.star-52').removeClass('fa-star-o');
                }

                if(this.value !== '2') {
                    $('.star-53').addClass('fa-star');
                    $('.star-53').removeClass('fa-star-o');
                }

                if(this.value !== '3') {
                    $('.star-54').addClass('fa-star');
                    $('.star-54').removeClass('fa-star-o');
                }

                if(this.value !== '4') {
                    $('.star-55').addClass('fa-star');
                    $('.star-55').removeClass('fa-star-o');
                }

                if(this.value === '1') {
                    $('.star-52').addClass('fa-star-o');
                    $('.star-52').removeClass('fa-star');
                    $('.star-53').addClass('fa-star-o');
                    $('.star-53').removeClass('fa-star');
                    $('.star-54').addClass('fa-star-o');
                    $('.star-54').removeClass('fa-star');
                    $('.star-55').addClass('fa-star-o');
                    $('.star-55').removeClass('fa-star');
                } else if(this.value === '2') {
                    $('.star-53').addClass('fa-star-o');
                    $('.star-53').removeClass('fa-star');
                    $('.star-54').addClass('fa-star-o');
                    $('.star-54').removeClass('fa-star');
                    $('.star-55').addClass('fa-star-o');
                    $('.star-55').removeClass('fa-star');
                } else if(this.value === '3') {
                    $('.star-54').addClass('fa-star-o');
                    $('.star-54').removeClass('fa-star');
                    $('.star-55').addClass('fa-star-o');
                    $('.star-55').removeClass('fa-star');
                } else if(this.value === '4') {
                    $('.star-55').addClass('fa-star-o');
                    $('.star-55').removeClass('fa-star');
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

        $("body").delegate(".missing-paypal","click",function(e){
            e.preventDefault();
            var location = $(this).data("location");
            swal({
                title             : "Missing Paypal Account!",
                text              : "You must provide Paypal Email Address to approve this request",
                type              : "warning",
                showCancelButton  : true,
                confirmButtonColor: "#DD6B55",
                confirmButtonText : "Add Paypal Email",
                cancelButtonText  : "Maybe Later!",
                closeOnConfirm    : false,
                closeOnCancel     : false
            }, function(isConfirm){
                if(isConfirm){
                    window.location = "{{ url('/profile') }}";
                }
                else{
                    swal.close()
                }
            });
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

        function printDiv () {
            var divToPrint=document.getElementById('DivIdToPrint').innerHTML;

            var newWin = window.open('', 'Print-Window');

            newWin.document.open();

            newWin.document.write('<head><title>Print Labels</title>');
            newWin.document.write('<style type="text/css">' +
                '.row{border-bottom: 1px solid #000}' +
                '.row{border-top: 1px solid #000}' +
                'h3{text-align: center}' +
                'span{font-weight: bold !important;}' +
                'p{line-height: 10px !important;}' +
                '</style>');

            newWin.document.write("</head><body onload='window.print()'>" + divToPrint + "</body>");
            newWin.document.close();

            setTimeout(function () {
                newWin.close();
            }, 10);

        }


        // $('.feedback').click(function(){
        //     swal("Thank you", "Feedback has been sent.", "success")
        // });
    </script>
@stop