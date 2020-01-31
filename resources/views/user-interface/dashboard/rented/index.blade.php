@extends('user-interface.layout')
@section('title',App\User::displayName(Auth::user()->id))
@section('content')
    <div class="dashboard renting">
        <div class="section-1">
            <div class="mx-1254 clearfix">
                <div class="breadcrumbs">
                    <ul>
                        <li><a href="{!!URL('/')!!}">Home</a></li>
                        <li><span>Rented</span></li>
                    </ul>
                </div>
                <div class="dashboard-container clearfix">
                    @include('user-interface.dashboard.includes.left-sidebar')
                    <div class="col-md-9">
                        <div class="page-content">
                            <div class="page-content-header clearfix">
                                <div class="header-left">
                                    <h3>Rented <span>({{$count}})</span></h3>
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
                                @forelse($rented as $value)
                                <?php $product = App\Models\Products\Products::where('id', $value->productID)->first(); ?>
                                <?php $owner = App\User::where('id', $product->user_id)->first(); ?>
                                <div class="single-product-item">
                                    <a href="{!!URL('rented/view/'.$value->clientID)!!}">
                                        <div class="img-holder">
                                            <img src="{!!asset($product->picture)!!}">
                                        </div>
                                    {{$product->name}}
                                    </a>
                                    
                                     <?php
                                    $product_review_avg = \App\Models\ProductUserReview::where('product_id', $value->productID)->avg('rating');
                                    $product_review_avg = round($product_review_avg);
                                    $without_fill_start = 5 - $product_review_avg;
					
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
                                        <div class="pull-right price">
                                            <p>$ {{$product->price}}/day</p>
                                        </div>
                                    </div>
                                    <div class="clearfix">
                                        <div class="profile-image">
                                            <img src="{!!asset($owner->profile_picture)!!}">
                                        </div>
                                        <div class="profile-name">
                                            <a title="{{$owner->first_name}} {{substr($owner->last_name,0,1)}} {{$owner->location}}">
                                                {{$owner->first_name}} {{substr($owner->last_name,0,1)}} {{$owner->location}}</a>
                                        </div>
                                    </div>
                                    <div class="clearfix">
                                        <div class="pull-right">
                                            <p style="margin: 0"><b>Status:</b> {{$value->status}}</p>
                                        </div>
                                        <div class="pull-right">
                                            <p style="margin: 0"><b>Designer:</b> {{$product->designer}}</p>
                                        </div>
                                    </div>
                                    @if($value->status=="Pending" || $value->status=="Accepted" || $value->status === "Payment Accepted")
	                                    <div class="clearfix">
	                                    	<div class="btn-holder" style="width:100%">
                                                @if($value->status=="Accepted")
                                                    <a data-info="{{$owner}}" data-location="{!! URL('my-cart/' . $value->id) !!}" class="acknowledgement with-background" data-toggle="tooltip" >PROCEED TO PAYMENT</a>
                                                @endif
                                                <a data-location="{!! URL('rented/change-status/cancel/'.$value->id) !!}" class="with-background white profile-control-right cancel-booking" >CANCEL BOOKING</a>
                                            </div>
	                                    </div>
                                    @endif
                                    @if($value->status=="Merchant Sent")
                                        <div class="btn-holder" style="width:100%">
                                            <a data-location="{!! URL('rented/change-status/clientReceived/'.$value->id) !!}" class="item-received with-background" >Mark as Received</a>
                                            <a data-info="{!! $value->shipping_info !!}" class="with-background white profile-control-right shipping-info" >Shipping Info</a>
                                        </div>
                                    @endif
                                    @if($value->status=="Client Received")
                                        <div class="clearfix">
                                            <div>
                                                <div class="received">Item Received - are you satisfied?</div>
                                                <a data-location="{!! URL('rented/change-status/notSatisfied/'.$value->id) !!}" class="small-buttons btn btn-sm not-satisfied" style="background:#fff;color:#d4ad53" >NO</a>
                                                <a data-location="{!! URL('rented/change-status/satisfied/'.$value->id) !!}" class="small-buttons btn btn-sm satisfied" style="background:#d4ad53;color:#fff">YES</a>
                                            </div>
                                        </div>
                                    @endif
                                    @if($value->status === "Satisfied" || $value->status === "Not Satisfied")
                                        <div class="btn-holder" style="width:100%">
                                            <a data-location="{!! URL('rented/change-status/clientSent/'.$value->id) !!}" class="item-sent with-background" >ITEM is RETURNED TODAY</a>
                                        </div>
                                    @endif

                                </div>
                                @empty
                                    No result found.
                                @endforelse
                            </div>
                            <div class="text-right">
                                <ul class="pagination">
                                    {{ $rented->appends(Request::input())->render() }}
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
    <script type="text/javascript">
        $(document).on("change","select[name='sort']",function(){
            window.location.href = "{{URL('rented?sort=')}}"+$(this).val();
        });
        $(".pagination>li:first-child>a, .pagination>li:first-child>span").html("Previous");
        $(".pagination>li:last-child>a, .pagination>li:last-child>span").html("Next");


        $("body").delegate(".cancel-booking","click",function(e){
            e.preventDefault();
            var location = $(this).data("location");
            swal({
                title             : "Are you sure you want to cancel this booking?",
                type              : "warning",
                showCancelButton  : true,
                confirmButtonColor: "#DD6B55",
                confirmButtonText : "Yes",
                cancelButtonText  : "No",
                closeOnConfirm    : false,
                closeOnCancel     : false
            }, function(isConfirm){
                if(isConfirm){
                    $.ajax({
                        'url'      : location,
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
                    return false;
                }
                else{
                    swal.close()
                }
            });
        });

        $("body").delegate(".item-received","click",function(e){
            e.preventDefault();
            var location = $(this).data("location");
            swal({
                title             : "Did you really received this item?",
                type              : "warning",
                showCancelButton  : true,
                confirmButtonColor: "#DD6B55",
                confirmButtonText : "Yes",
                cancelButtonText  : "No",
                closeOnConfirm    : false,
                closeOnCancel     : false
            }, function(isConfirm){
                if(isConfirm){
                    $.ajax({
                        'url'      : location,
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
                    return false;
                }
                else{
                    swal.close()
                }
            });
        });

        $("body").delegate(".not-satisfied","click",function(e){
            e.preventDefault();
            var location = $(this).data("location");

            var inviteDevInput = '<form> ' +

                '<div class="row"> ' +
                '<h3>Reason!</h3> ' +
                '</div> ' +

                '<div class="row"> ' +
                '<span style="float: left;width: 25%">&nbsp;</span>' +
                '<input style="margin: 0; box-shadow: none; width: 5%; display: block; height: 15px; float: left;" type="radio" name="csvSelect" id="radio1" ng-model="radioValue" ng-value="1" value="damaged" > ' +
                '<label style="width: 70%; text-align: left; cursor:pointer" for="radio1"> Damaged/stained item </label> ' +
                '</div> ' +
                '<div class="row"> ' +
                '<span style="float: left;width: 25%">&nbsp;</span>' +
                '<input style="margin: 0; box-shadow: none; width: 5%; display: block; height: 15px; float: left;" type="radio" name="csvSelect" id="radio2" ng-model="radioValue" ng-value="2" value="differentItem" > ' +
                '<label style="width: 70%; text-align: left; cursor:pointer" for="radio2"> Item is different than picture </label> ' +
                '</div> ' +
                '<div class="row"> ' +
                '<span style="float: left;width: 25%">&nbsp;</span>' +
                '<input style="margin: 0; box-shadow: none; width: 5%; display: block; height: 15px; float: left;" type="radio" name="csvSelect" id="radio3" ng-model="radioValue" ng-value="3" value="other">' +
                '<label style="width: 70%; text-align: left; cursor:pointer" for="radio3"> Other (please explain) </label> </div>' +
                '<div id="showDiv"> <textarea id="textarea" class="textarea" > </textarea> </div>' +
                '<div class="clearfix"> ' +
                '</div>' +

                '</form>';

            var recordType;
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

                recordType = $("input[name=csvSelect]:checked").val();

                if(!isConfirm) {
                    swal.close();
                }

                if(!recordType) {
                    return false;
                }

                if(recordType === 'other') {
                    recordType = $('#textarea').val();

                    if(recordType.length < 6) {
                        $("#textarea").css("background-color", "#FFD2D2")
                        return false;
                    }
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

            $('input[name=star_rating2]').on('click', function() {
                $('.star-21').addClass('fa-star');
                $('.star-21').removeClass('fa-star-o');

                if(this.value !== '1') {
                    $('.star-22').addClass('fa-star');
                    $('.star-22').removeClass('fa-star-o');
                }

                if(this.value !== '2') {
                    $('.star-23').addClass('fa-star');
                    $('.star-23').removeClass('fa-star-o');
                }

                if(this.value !== '3') {
                    $('.star-24').addClass('fa-star');
                    $('.star-24').removeClass('fa-star-o');
                }

                if(this.value !== '4') {
                    $('.star-25').addClass('fa-star');
                    $('.star-25').removeClass('fa-star-o');
                }

                if(this.value === '1') {
                    $('.star-22').addClass('fa-star-o');
                    $('.star-22').removeClass('fa-star');
                    $('.star-23').addClass('fa-star-o');
                    $('.star-23').removeClass('fa-star');
                    $('.star-24').addClass('fa-star-o');
                    $('.star-24').removeClass('fa-star');
                    $('.star-25').addClass('fa-star-o');
                    $('.star-25').removeClass('fa-star');
                } else if(this.value === '2') {
                    $('.star-23').addClass('fa-star-o');
                    $('.star-23').removeClass('fa-star');
                    $('.star-24').addClass('fa-star-o');
                    $('.star-24').removeClass('fa-star');
                    $('.star-25').addClass('fa-star-o');
                    $('.star-25').removeClass('fa-star');
                } else if(this.value === '3') {
                    $('.star-24').addClass('fa-star-o');
                    $('.star-24').removeClass('fa-star');
                    $('.star-25').addClass('fa-star-o');
                    $('.star-25').removeClass('fa-star');
                } else if(this.value === '4') {
                    $('.star-25').addClass('fa-star-o');
                    $('.star-25').removeClass('fa-star');
                }
            });

            $('input[name=star_rating3]').on('click', function() {
                $('.star-31').addClass('fa-star');
                $('.star-31').removeClass('fa-star-o');

                if(this.value !== '1') {
                    $('.star-32').addClass('fa-star');
                    $('.star-32').removeClass('fa-star-o');
                }

                if(this.value !== '2') {
                    $('.star-33').addClass('fa-star');
                    $('.star-33').removeClass('fa-star-o');
                }

                if(this.value !== '3') {
                    $('.star-34').addClass('fa-star');
                    $('.star-34').removeClass('fa-star-o');
                }

                if(this.value !== '4') {
                    $('.star-35').addClass('fa-star');
                    $('.star-35').removeClass('fa-star-o');
                }

                if(this.value === '1') {
                    $('.star-32').addClass('fa-star-o');
                    $('.star-32').removeClass('fa-star');
                    $('.star-33').addClass('fa-star-o');
                    $('.star-33').removeClass('fa-star');
                    $('.star-34').addClass('fa-star-o');
                    $('.star-34').removeClass('fa-star');
                    $('.star-35').addClass('fa-star-o');
                    $('.star-35').removeClass('fa-star');
                } else if(this.value === '2') {
                    $('.star-33').addClass('fa-star-o');
                    $('.star-33').removeClass('fa-star');
                    $('.star-34').addClass('fa-star-o');
                    $('.star-34').removeClass('fa-star');
                    $('.star-35').addClass('fa-star-o');
                    $('.star-35').removeClass('fa-star');
                } else if(this.value === '3') {
                    $('.star-34').addClass('fa-star-o');
                    $('.star-34').removeClass('fa-star');
                    $('.star-35').addClass('fa-star-o');
                    $('.star-35').removeClass('fa-star');
                } else if(this.value === '4') {
                    $('.star-35').addClass('fa-star-o');
                    $('.star-35').removeClass('fa-star');
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

        $("body").delegate(".satisfied","click",function(e){
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
                '<b>DELIVERY</b>' +
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
                '<b>DESCRIPTION</b>' +
                '</div>' +
                '<div class="columns col-md-4"> ' +
                '<label for="star21"><i class="star-21 fa fa-star-o" ></i></label>' +
                '<input type="radio" name="star_rating2" value="1" id="star21">' +
                '<label for="star22"><i class="star-22 fa fa-star-o" ></i></label>' +
                '<input type="radio" name="star_rating2" value="2" id="star22">' +
                '<label for="star23"><i class="star-23 fa fa-star-o" ></i></label>' +
                '<input type="radio" name="star_rating2" value="3" id="star23">' +
                '<label for="star24"><i class="star-24 fa fa-star-o" ></i></label>' +
                '<input type="radio" name="star_rating2" value="4" id="star24">' +
                '<label for="star25"><i class="star-25 fa fa-star-o" ></i></label>' +
                '<input type="radio" name="star_rating2" value="5" id="star25">' +
                '</div>' +
                '</div>' +

                '<div class="row"> ' +
                '<div class="columns col-md-7 col-md-offset-1 text-left"> ' +
                '<b>QUALITY</b>' +
                '</div>' +
                '<div class="columns col-md-4"> ' +
                '<label for="star31"><i class="star-31 fa fa-star-o" ></i></label>' +
                '<input type="radio" name="star_rating3" value="1" id="star31">' +
                '<label for="star32"><i class="star-32 fa fa-star-o" ></i></label>' +
                '<input type="radio" name="star_rating3" value="2" id="star32">' +
                '<label for="star33"><i class="star-33 fa fa-star-o" ></i></label>' +
                '<input type="radio" name="star_rating3" value="3" id="star33">' +
                '<label for="star34"><i class="star-34 fa fa-star-o" ></i></label>' +
                '<input type="radio" name="star_rating3" value="4" id="star34">' +
                '<label for="star35"><i class="star-35 fa fa-star-o" ></i></label>' +
                '<input type="radio" name="star_rating3" value="5" id="star35">' +
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


                '<div class="row"> ' +
                '<div class="columns col-md-offset-1 col-md-11 text-left"> ' +
                '<b>Comment: </a>' +
                '</div>' +
                '<div class="columns col-md-offset-1 col-md-11 "> ' +
                '<textarea class="textarea" style="width: 93%; float: left;" id="comment" placeholder="Type your comments here..."></textarea>' +
                '</div>' +

                '</div>' +
                '</div>' +

                '</form>';

//            var title;
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

                comment = $('textarea#comment').val();
                shippingInfo = $('textarea#shippingInfo').val();
                rating1 = $("input:radio[name=star_rating]:checked").val()  || 0;
                rating2 = $("input:radio[name=star_rating1]:checked").val() || 0;
                rating3 = $("input:radio[name=star_rating2]:checked").val() || 0;
                rating4 = $("input:radio[name=star_rating3]:checked").val() || 0;
                rating5 = $("input:radio[name=star_rating4]:checked").val() || 0;
                rating6 = $("input:radio[name=star_rating5]:checked").val() || 0;

                rating = rating1 + "," + rating2 + "," + rating3 + "," + rating4 + "," + rating5 + "," + rating6;

                if(!isConfirm) {
                    swal.close();
                }

                if(comment.length < 5) {
                    $("#comment").css("background-color", "#FFD2D2")
                    return false;
                }

                if(isConfirm){
                    $.ajax({
                        'url'      : location + '?rating=' + rating + "&comment=" + comment + "&extra=" + shippingInfo,
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

            $('input[name=star_rating2]').on('click', function() {
                $('.star-21').addClass('fa-star');
                $('.star-21').removeClass('fa-star-o');

                if(this.value !== '1') {
                    $('.star-22').addClass('fa-star');
                    $('.star-22').removeClass('fa-star-o');
                }

                if(this.value !== '2') {
                    $('.star-23').addClass('fa-star');
                    $('.star-23').removeClass('fa-star-o');
                }

                if(this.value !== '3') {
                    $('.star-24').addClass('fa-star');
                    $('.star-24').removeClass('fa-star-o');
                }

                if(this.value !== '4') {
                    $('.star-25').addClass('fa-star');
                    $('.star-25').removeClass('fa-star-o');
                }

                if(this.value === '1') {
                    $('.star-22').addClass('fa-star-o');
                    $('.star-22').removeClass('fa-star');
                    $('.star-23').addClass('fa-star-o');
                    $('.star-23').removeClass('fa-star');
                    $('.star-24').addClass('fa-star-o');
                    $('.star-24').removeClass('fa-star');
                    $('.star-25').addClass('fa-star-o');
                    $('.star-25').removeClass('fa-star');
                } else if(this.value === '2') {
                    $('.star-23').addClass('fa-star-o');
                    $('.star-23').removeClass('fa-star');
                    $('.star-24').addClass('fa-star-o');
                    $('.star-24').removeClass('fa-star');
                    $('.star-25').addClass('fa-star-o');
                    $('.star-25').removeClass('fa-star');
                } else if(this.value === '3') {
                    $('.star-24').addClass('fa-star-o');
                    $('.star-24').removeClass('fa-star');
                    $('.star-25').addClass('fa-star-o');
                    $('.star-25').removeClass('fa-star');
                } else if(this.value === '4') {
                    $('.star-25').addClass('fa-star-o');
                    $('.star-25').removeClass('fa-star');
                }
            });

            $('input[name=star_rating3]').on('click', function() {
                $('.star-31').addClass('fa-star');
                $('.star-31').removeClass('fa-star-o');

                if(this.value !== '1') {
                    $('.star-32').addClass('fa-star');
                    $('.star-32').removeClass('fa-star-o');
                }

                if(this.value !== '2') {
                    $('.star-33').addClass('fa-star');
                    $('.star-33').removeClass('fa-star-o');
                }

                if(this.value !== '3') {
                    $('.star-34').addClass('fa-star');
                    $('.star-34').removeClass('fa-star-o');
                }

                if(this.value !== '4') {
                    $('.star-35').addClass('fa-star');
                    $('.star-35').removeClass('fa-star-o');
                }

                if(this.value === '1') {
                    $('.star-32').addClass('fa-star-o');
                    $('.star-32').removeClass('fa-star');
                    $('.star-33').addClass('fa-star-o');
                    $('.star-33').removeClass('fa-star');
                    $('.star-34').addClass('fa-star-o');
                    $('.star-34').removeClass('fa-star');
                    $('.star-35').addClass('fa-star-o');
                    $('.star-35').removeClass('fa-star');
                } else if(this.value === '2') {
                    $('.star-33').addClass('fa-star-o');
                    $('.star-33').removeClass('fa-star');
                    $('.star-34').addClass('fa-star-o');
                    $('.star-34').removeClass('fa-star');
                    $('.star-35').addClass('fa-star-o');
                    $('.star-35').removeClass('fa-star');
                } else if(this.value === '3') {
                    $('.star-34').addClass('fa-star-o');
                    $('.star-34').removeClass('fa-star');
                    $('.star-35').addClass('fa-star-o');
                    $('.star-35').removeClass('fa-star');
                } else if(this.value === '4') {
                    $('.star-35').addClass('fa-star-o');
                    $('.star-35').removeClass('fa-star');
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
                confirmButtonText: "Confirm",
                cancelButtonText: "Close",
                closeOnConfirm: false,
                closeOnCancel: false

            }, function(isConfirm){

                recordType = $("#textarea").val();

                if(!isConfirm) {
                    swal.close();
                }
                if(!recordType || recordType.length < 5) {
                    $("#textarea").css("background-color", "#FFD2D2")
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

        $("body").delegate(".acknowledgement","click",function(e){
            e.preventDefault();
            var selector = $(this);
            var location = selector.data("location");
            var merchant = selector.data("info");

            var bp = merchant.first_name + " " + merchant.last_name;

            var content = "<div><p style='text-align: left'>By confirming this box, I acknowledge that: <br>" +
                "<ul style='text-align: left'>" +
                "<li style='margin: 10px 0;'>RentaSuit.ca is not an agent of <b>" + bp + "</b></li>" +
                "<li style='margin-bottom: 10px;'><b>" + bp + "</b> has provided fair consideration for the payment I am making</li>" +
                "<li style='margin-bottom: 10px;'>I authorize RentaSuit to charge my payment method, and release payment to <b>" + bp + "</b></li>" +
                "<li style='margin-bottom: 10px;'>Once RentaSuit  releases payment to <b>" + bp + "</b> on my behalf, this amount cannot be recovered by RentaSuit</li>" +
                "</ul>" +
                "</p></div>";

            swal({
                title             : bp,
                text              : content,
                html              : true,
                showCancelButton  : true,
                confirmButtonColor: "#DD6B55",
                customClass       : 'swal-wide',
                confirmButtonText : "Yes, I acknowledge!",
                cancelButtonText  : "No",
                closeOnConfirm    : false,
                closeOnCancel     : false
            }, function(isConfirm){
                if(isConfirm){
                    setTimeout(function(){
                        window.location = location;
                    }, 800);
                }
                else{
                    swal.close();
                }
            });
        });

    </script>
@stop