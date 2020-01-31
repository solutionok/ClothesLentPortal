@extends('user-interface.layout')
@section('title' , 'Rent a suit - ' . $product->name)
@section('css')
    <link rel="stylesheet" href="{!!asset('user-interface')!!}/css/jquery.fancybox.min.css">
    <link rel="stylesheet" href="{!!asset('user-interface')!!}/css/owl.carousel.min.css">
    <style type="">
        .mfp-close {
            margin-right: 20px !important;
            margin-top: -8px !important;
        }

        .clickable {
            cursor: pointer !important;
        }
    </style>
@stop
@section('content')

    <div class="dashboard garments">
        <div class="section-1">
            <div class="mx-1254 clearfix">
                <div class="breadcrumbs">
                    <ul>
                        <li><a href="{!!URL('/')!!}">Home</a></li>
                        <li><a href="{!!URL('garments')!!}">Garments</a></li>
                        <li><span>Product detail</span></li>
                    </ul>
                </div>
                <div class="header-title text-center">
                    <div class="bg">
                        Collections
                    </div>
                    <h1>TImeless classic beyond</h1>
                    <h2>our collections</h2>
                </div>
                <div class="dashboard-container clearfix">

                    <div class="col-md-12">
                        <div class="page-content garments">
                            <div class="product-inner-holder">
                                <div class="row">
                                    <div class="col-md-8">
                                        <div class="clearfix">
                                            <div class="gallery">
                                                <div class="full">
                                                    <img src="{!!asset($product->picture)!!}"/>
                                                </div>
                                                <div class="previews">
                                                    <a class="thumb selected"
                                                       data-full="{!!asset($product->picture)!!}"><img
                                                                src="{!!asset($product->picture)!!}"/></a>
                                                    @foreach($product_data->sub_photos as $value)
                                                        <a class="thumb" data-rotate="{{$value->rotate}}" data-full="{!!asset($value->sub_photo)!!}">
                                                            <img style="transform: rotate({{$value->rotate}}deg)" src="{!!asset($value->sub_photo)!!}"/></a>
                                                    @endforeach
                                                </div>
                                            </div>
                                        </div>
                                        <div class="clearfix">
                                            <div class="item-description">
                                                <h5>{{$product->name}}
                                                    @if(Auth::check() && !Auth::user()->isAdmin())
                                                        @if(Auth::user()->id != $product->userID)
                                                        <a class="btn btn-sm pull-right messages_popup"
                                                           style="background:#d4ad53;color:#fff" href="#message">MESSAGE
                                                            THE OWNER OF THIS ITEM</a>
                                                        @endif
                                                        <input type="hidden" value="{{Auth::user()->firebase_id}}"
                                                               id="sender_firebase_id">
                                                        <?php
                                                        $product_user_detail = \App\User::where('id', $product->userID)->first();
                                                        ?>
                                                        <input type="hidden"
                                                               value="{{$product_user_detail->firebase_id}}"
                                                               id="receiver_firebase_id">
                                                        <input type="hidden" value="{{$product->productID}}"
                                                               id="product_id">
                                                        <input type="hidden" value="{!!asset($product->picture)!!}"
                                                               id="product_picture">
                                                        <input type="hidden" value="{{$product->name}}"
                                                               id="product_name">
                                                        <input type="hidden" value="$ {{$product->price}}/day"
                                                               id="product_price">
                                                        <input type="hidden"
                                                               value="{!!asset(Auth::user()->profile_picture)!!}"
                                                               id="sender_profile_photo">
                                                        <input type="hidden"
                                                               value="{!!asset($product_user_detail->profile_picture)!!}"
                                                               id="receiver_profile_photo">
                                                        <input type="hidden"
                                                               value="{{Auth::user()->first_name.' '.Auth::user()->last_name}}"
                                                               id="sender_username">
                                                        <input type="hidden"
                                                               value="{{$product_user_detail->first_name.' '.$product_user_detail->last_name }}"
                                                               id="receiver_username">

                                                    @else
                                                        <a href="#login"
                                                           class="btn btn-sm pull-right popup-with-form login_modal"
                                                           style="background:#d4ad53;color:#fff"
                                                           redirect_url="{{Request::fullUrl()}}">MESSAGE THE OWNER OF
                                                            THIS ITEM</a>
                                                    @endif</h5>


                                                <?php
                                                $product_review_avg = \App\Models\ProductUserReview::where('product_id', $product->productID)->avg('rating');
                                                $product_review_avg = round($product_review_avg);

                                                $without_fill_start = 5 - $product_review_avg;

                                                ?>
                                                <div class="star">
                                                    <ul>
                                                        @for($i=0;$i<$product_review_avg;$i++)
                                                            <li><i class="fa fa-star" aria-hidden="true"></i></li>
                                                        @endfor

                                                        @for($j=0;$j<$without_fill_start;$j++)
                                                            <li><i class="fa fa-star-o" aria-hidden="true"></i></li>
                                                        @endfor
                                                    </ul>

                                                    <?php
                                                    $product_review = \App\Models\ProductUserReview::where('product_id', $product->productID)->with(['user_detail' => function ($query) {
                                                        $query->select("id", "contact_number", "location", "body_type", "first_name", "last_name", "profile_picture", "profile_picture_custom_size");
                                                    }])->get();
                                                    ?>


                                                    <p class="toggle-title clicked"
                                                       style="cursor:pointer">{{count($product_review)}} REVIEWS</p>


                                                    <div class="toggle-details" style="display:none">

                                                        <table class="table-bordered table-striped table-condensed cf">
                                                            <thead class="cf">
                                                            <tr>
                                                                <th>Index #</th>
                                                                <th>User</th>
                                                                <th>Title</th>
                                                                <th>Message</th>
                                                                <th>Rating</th>

                                                            </tr>
                                                            </thead>
                                                            <tbody>
                                                            @if(count($product_review)>0)
                                                                @foreach($product_review as $key=>$value)
                                                                    <tr>
                                                                        <td>{{$key+1}}</td>
                                                                        <td>{{$value->user_detail ? $value->user_detail->first_name . " " . $value->user_detail->last_name : ""}}</td>
                                                                        <td>{{$value->title}}</td>
                                                                        <td>{{$value->comment}}</td>
                                                                        <td>{{$value->rating}}</td>

                                                                    </tr>
                                                                @endforeach
                                                            @else
                                                                <tr>
                                                                    <td colspan="5">No Review Available</td>


                                                                </tr>
                                                            @endif
                                                            </tbody>
                                                        </table>
                                                    </div>


                                                </div>
                                                <div class="clearfix list-description">
                                                    <strong class="col-md-3">SEASON</strong>
                                                    <div class="col-md-8">
                                                        <p>{{$product->season}}</p>
                                                    </div>
                                                </div>
                                                <div class="clearfix list-description">
                                                    <strong class="col-md-3">SIZE</strong>
                                                    <div class="col-md-8">
                                                        <p>{{$product->size}}</p>
                                                    </div>
                                                </div>
                                                <div class="clearfix list-description">
                                                    <strong class="col-md-3">COLOR</strong>
                                                    <div class="col-md-8">
                                                        <p>{{$product->color}}</p>
                                                    </div>
                                                </div>
                                                <div class="clearfix list-description">
                                                    <strong class="col-md-3">CATEGORY</strong>
                                                    <div class="col-md-8">
                                                        <p>{{$category}}</p>
                                                    </div>
                                                </div>
                                                <div class="clearfix list-description">
                                                    <strong class="col-md-3">PRICE</strong>
                                                    <div class="col-md-8">
                                                        <p>$ {{$product->price}}/day</p>
                                                    </div>
                                                </div><div class="clearfix list-description">
                                                    <strong class="col-md-3">RETAIL PRICE</strong>
                                                    <div class="col-md-8">
                                                        <p>$ {{$product->retail_price}}</p>
                                                    </div>
                                                </div>

                                                <div class="clearfix list-description">
                                                    <strong class="col-md-3">DESIGNER</strong>
                                                    <div class="col-md-8">
                                                        @if($product->designer=="")
                                                            <p>-</p>
                                                        @else
                                                            <p>{{$product->designer}}</p>
                                                        @endif

                                                    </div>
                                                </div>
                                                <div class="clearfix list-description">
                                                    <strong class="col-md-3">DESCRIPTION</strong>
                                                    <div class="col-md-9">
                                                        <p>{{$product->description}}</p>
                                                    </div>
                                                </div>
                                                <div class="clearfix list-description">
                                                    <strong class="col-md-3">DATE POSTED</strong>
                                                    <div class="col-md-9">
                                                        <p>{{date('m/d/Y', strtotime($product->createdAt))}}</p>
                                                    </div>
                                                </div>
                                                </br>
                                                <div class="clearfix profile-inner-holder">
                                                    <div class="profile-image">
                                                        <img src="{!!asset($product->profile_picture)!!}">
                                                    </div>
                                                    <div class="profile-name">
                                                        <a href="{!!URL('profile/profile-personal-info/'.Crypt::encrypt($product->userID))!!}">{{$product->first_name}}
                                                            ...{{--{{$product->last_name}}--}}</a>
                                                    </div>
                                                </div>
                                                {{--<div class="clearfix list-description">--}}
                                                {{--<strong class="col-md-3">CONTACT#</strong>--}}
                                                {{--<div class="col-md-9">--}}
                                                {{--<p>{{$product->contact}}</p>--}}
                                                {{--</div>--}}
                                                {{--</div>--}}
                                                <div class="clearfix list-description">
                                                    <strong class="col-md-3">LOCATION</strong>
                                                    <div class="col-md-9">
                                                        <p>{{$product->location}}</p>
                                                    </div>
                                                </div>
                                                <div class="clearfix list-description">
                                                    <strong class="col-md-3">BODY TYPE</strong>
                                                    <div class="col-md-9">
                                                        <img src="{!!asset('user-interface/img/body-type-new-'.$product->body_type.'.png')!!}">
                                                    </div>
                                                </div>


                                            </div>
                                        </div>
                                    </div>
                                    <div id="show_map" class="white-popup-block mfp-hide "
                                         style="background-image: url('{!!asset('user-interface')!!}/img/pop-bg.jpg');">
                                        <div id="map"></div>
                                    </div>

                                    @if(!Auth::check() || Auth::user()->id != $product->userID)

                                        <form id="rent-item-form" enctype="multipart/form-data">
                                            <div class="col-md-4">
                                                <?php $wishlist = App\Models\Wishlist\Wishlist::where('product_id', $product->productID)->where('user_id', Auth::check() ? Auth::user()->id : '')->first();  ?>
                                                <?php $rent = App\Models\Rent\Rent::where('product_id', $product->productID)->where('user_id', Auth::check() ? Auth::user()->id : '')->where('status', 'Cart')->first();  ?>

                                                <div class="rent-details-holder rent-item-holder">
                                                    <h3>RENT THIS ITEM</h3>
                                                    <?php
                                                    $oncart = false;
                                                    if (Auth::check() && !Auth::user()->isAdmin()) {
                                                        //print_r($$rent);exit;
                                                        if ($rent != null) {
                                                            $oncart = true;
                                                        }
                                                    }
                                                    ?>
                                                    @if($oncart==false)
                                                        <div class="form-group">
                                                            <label for="">DELIVERY OPTIONS</label>
                                                            <div class="select Localization_function">
                                                                <select name="delivery_option" class="form-control" id="delivery_option">
                                                                    <option value="">Please Select Delivery</option>
                                                                    <option vaue="Localization">Localization</option>
                                                                    <option value="Regular mail">Regular mail</option>
                                                                    <option value="Ups">Pick up from UPS</option>
                                                                </select>

                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="">CHOOSE RENTAL NO OF DAYS</label>
                                                            <div class="row">
                                                                <div class="col-md-12">
                                                                    <select class="form-control"
                                                                            name="rental_period_no_of_days"
                                                                            id="rental_period_no_of_days">
                                                                        <option value="0">Please select a duration</option>
                                                                        <option value="1">1</option>
                                                                        <option value="2">2</option>
                                                                        <option value="3">3</option>
                                                                        <option value="4">4</option>
                                                                        <option value="5">5</option>
                                                                        <option value="6">6</option>
                                                                        <option value="7">7</option>
                                                                        <option value="8">8</option>
                                                                        <option value="9">9</option>
                                                                        <option value="10">10</option>
                                                                        <option value="11">11</option>
                                                                        <option value="12">12</option>
                                                                        <option value="13">13</option>
                                                                        <option value="14">14</option>
                                                                        <option value="15">15</option>

                                                                    </select>
                                                                    <span class="rent-error errors"
                                                                          id="rent_rental_period_no_of_days"></span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="">CHOOSE RENTAL PERIOD</label>
                                                            <div class="row">

                                                                <div class="col-md-12">

                                                                    <input type='text'
                                                                           class="form-control datepicker_rent_period"
                                                                           readonly name="rental_period"/>
                                                                    <span class="rent-error errors"
                                                                          id="rent_rental_period"></span>
                                                                    <input type="hidden" name="start_date" value="empty"
                                                                           id="user_start_date"/>
                                                                    <input type="hidden" name="end_date" value="empty"
                                                                           id="user_end_date"/>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <!--<div class="form-group">
                                                            <label for="">CHOOSE RENTAL PERIOD</label>
                                                            <div class="row">
                                                                <div class="col-md-12">
                                                                    <input type="text" class="form-control" name="rental_period" value="" required/>
                                                                    <span class="rent-error errors" id="rent_rental_period"></span>
                                                                    <input type="hidden" name="start_date" value="empty" />
                                                                    <input type="hidden" name="end_date" value="empty" />
                                                                </div>
                                                            </div>
                                                        </div>-->
                                                        <div class="more-filters">
                                                            <div class="toggle-title" style='cursor: pointer'>
                                                                <h4>ADD LOCATION</h4>
                                                            </div>
                                                            <div class="toggle-details">
                                                                <div class="form-group">
                                                                    <div id="locationField">
                                                                        <input class="form-control" id="autocomplete"
                                                                               name="location"
                                                                               placeholder="Locate your address"
                                                                               type="text"
                                                                               onFocus="geolocate()"></input>
                                                                    </div>
                                                                </div>

                                                                <div class="form-group address_form">
                                                                    <label for="">Street address</label>
                                                                    <div class="row">
                                                                        <div class="col-md-12">
                                                                            <div class="form-group address_form">
                                                                                <input class="form-control"
                                                                                       id="street_number"
                                                                                       name="street_number"
                                                                                       placeholder="Street Number"></input>
                                                                                <span class="rent-error errors"
                                                                                      id="rent_street_number"></span>
                                                                            </div>
                                                                            {{--<div class="form-group address_form">
                                                                                <input class="form-control" id="route"
                                                                                       name="route"
                                                                                       placeholder="Route"></input>
                                                                                <span class="rent-error errors"
                                                                                      id="rent_route"></span>
                                                                            </div>--}}
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                                <div class="form-group address_form">
                                                                    <div class="row">
                                                                        <div class="col-md-12">
                                                                            <div class="form-group address_form">
                                                                                <input class="form-control"
                                                                                       id="street_number2"
                                                                                       name="address2"
                                                                                       placeholder="Apartment, suite, unit, bldg, floor etc"></input>
                                                                                <span class="rent-error errors"
                                                                                      id="rent_address2"></span>
                                                                            </div>
                                                                            {{--<div class="form-group address_form">
                                                                                <input class="form-control" id="route"
                                                                                       name="address3"
                                                                                       placeholder="Department, c/o, etc."></input>
                                                                                <span class="rent-error errors"
                                                                                      id="rent_address3"></span>
                                                                            </div>--}}
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                                <div class="form-group address_form">
                                                                    <label for="">City</label>
                                                                    <div class="row">
                                                                        <div class="col-md-12">
                                                                            <input class="form-control" id="locality"
                                                                                   name="city"></input>
                                                                            <span class="rent-error errors"
                                                                                  id="rent_city"></span>
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                                <div class="form-group address_form">

                                                                    <div class="row">
                                                                        <div class="col-md-6">
                                                                            <label for="">State</label>
                                                                            <input class="form-control"
                                                                                   id="administrative_area_level_1"
                                                                                   name="state"></input>
                                                                            <span class="rent-error errors"
                                                                                  id="rent_state"></span>
                                                                        </div>
                                                                        <div class="col-md-6">
                                                                            <label for="">Postal Code</label>
                                                                            <input class="form-control" id="postal_code"
                                                                                   name="postal_code"></input>
                                                                            <span class="rent-error errors"
                                                                                  id="rent_postal_code"></span>
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                                <div class="form-group address_form">
                                                                    <label for="">Country</label>
                                                                    <div class="row">
                                                                        <div class="col-md-12">
                                                                            <input class="form-control" id="country"
                                                                                   name="country"></input>
                                                                            <span class="rent-error errors"
                                                                                  id="rent_country"></span>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="more-filters">
                                                            <div class="toggle-title" style='cursor: pointer'>
                                                                <h4>ADD DETAILS</h4>
                                                                <!--<span class="rent-error errors" id="rent_contact_number"></span>
                                                                <span class="rent-error errors" id="rent_email"></span> -->
                                                            </div>
                                                            <div class="toggle-details">

                                                                <div class="form-group address_form">
                                                                    <div class="row">
                                                                        <div class="col-md-12">
                                                                            <label for="">Contact number</label>
                                                                            <input class="form-control"
                                                                                   name="contact_number"></input>
                                                                            <span class="rent-error errors"
                                                                                  id="rent_contact_number"></span>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="form-group address_form">
                                                                    <div class="row">
                                                                        <div class="col-md-12">
                                                                            <label for="">Email</label>
                                                                            <input class="form-control"
                                                                                   name="email"></input>
                                                                            <span class="rent-error errors"
                                                                                  id="rent_email"></span>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="form-group address_form">
                                                                    <div class="row">
                                                                        <div class="col-md-12">
                                                                            <label for="">Description</label>
                                                                            <textarea class="form-control"
                                                                                      name="description"></textarea>
                                                                            <span class="rent-error errors"
                                                                                  id="rent_description"></span>
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                            </div>
                                                        </div>

                                                        @if(Auth::check() && !Auth::user()->isAdmin())
                                                            @if($wishlist === null)
                                                                <a id="add-to-wishlist"
                                                                   data-product-id="{!! Crypt::encrypt($product->productID) !!}"
                                                                   class="btn__block no_bg wishlist_value"><i
                                                                            class="fa fa-heart-o"
                                                                            aria-hidden="true"></i> WISHLIST</a>
                                                            @else
                                                                <a id="remove-from-wishlist"
                                                                   data-product-id="{!! Crypt::encrypt($product->productID) !!}"
                                                                   class="btn__block no_bg wishlist_value"><i
                                                                            class="fa fa-heart"
                                                                            aria-hidden="true"></i> ON WISHLIST</a>
                                                            @endif
                                                        @else
                                                            <a href="#login"
                                                               class="btn__block no_bg wishlist_value popup-with-form"><i
                                                                        class="fa fa-heart-o" aria-hidden="true"></i>
                                                                WISHLIST</a>
                                                        @endif
                                                        @if(Auth::check() && !Auth::user()->isAdmin())
                                                            @if($rent === null)
                                                                <button type="submit" class=" btn__block"><i
                                                                            class="fa fa-shopping-cart"
                                                                            aria-hidden="true"></i>ADD TO CART
                                                                </button>
                                                            @else
                                                                <a href="{!! URL('my-cart') !!}" class="btn__block"><i
                                                                            class="fa fa-shopping-cart"
                                                                            aria-hidden="true"></i> ON CART</a>
                                                            @endif
                                                        @else
                                                            <a href="#login"
                                                               class="btn__block popup-with-form login_modal"
                                                               redirect_url="{{Request::fullUrl()}}"><i
                                                                        class="fa fa-shopping-cart"
                                                                        aria-hidden="true"></i> ADD TO CART</a>
                                                        @endif
                                                        <a href="#size_chart_popup" class="btn__block popup-with-form">MEASUREMENT
                                                            REFERENCE GUIDE</a><a href="#show_map"
                                                                                  class="btn__block popup-with-form">VIEW
                                                            CLEANER`S LOCATION</a>
                                                </div>
                                                @else
                                                    @if(Auth::check() && !Auth::user()->isAdmin())
                                                        @if($wishlist === null)
                                                            <a id="add-to-wishlist"
                                                               data-product-id="{!! Crypt::encrypt($product->productID) !!}"
                                                               class="btn__block no_bg wishlist_value"><i
                                                                        class="fa fa-heart-o" aria-hidden="true"></i>
                                                                WISHLIST</a>
                                                        @else
                                                            <a id="remove-from-wishlist"
                                                               data-product-id="{!! Crypt::encrypt($product->productID) !!}"
                                                               class="btn__block no_bg wishlist_value"><i
                                                                        class="fa fa-heart-o" aria-hidden="true"></i> ON
                                                                WISHLIST</a>
                                                        @endif
                                                    @else
                                                        <a href="#login"
                                                           class="btn__block no_bg wishlist_value popup-with-form"><i
                                                                    class="fa fa-heart-o" aria-hidden="true"></i>
                                                            WISHLIST</a>
                                                    @endif
                                                    @if(Auth::check() && !Auth::user()->isAdmin())
                                                        @if($rent === null)
                                                            <button type="submit" class=" btn__block"><i
                                                                        class="fa fa-shopping-cart"
                                                                        aria-hidden="true"></i>ADD TO CART
                                                            </button>
                                                        @else
                                                            <a href="{!! URL('my-cart') !!}" class="btn__block"><i
                                                                        class="fa fa-shopping-cart"
                                                                        aria-hidden="true"></i> ON CART</a>
                                                        @endif
                                                    @else
                                                        <a href="#login" class="btn__block popup-with-form login_modal"
                                                           redirect_url="{{Request::fullUrl()}}"><i
                                                                    class="fa fa-shopping-cart" aria-hidden="true"></i>
                                                            ADD TO CART</a>
                                                    @endif
                                                    <a href="#size_chart_popup" class="btn__block popup-with-form">MEASUREMENT
                                                        REFERENCE GUIDE</a><a href="#show_map"
                                                                              class="btn__block popup-with-form">VIEW
                                                        CLEANER`S LOCATION</a>
                                                @endif

                                            </div>

                                            <input type="hidden" name="status" value="Cart">
                                            <input type="hidden" name="productID" value="{!! $product->productID !!}">
                                            {{ csrf_field() }}


                                        </form>

                                    @endif


                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div id="message" class="white-popup-block mfp-hide messages_popup_holder">
        <h1>Message</h1>

        <div class="listing-product-holder text-center" style="
    overflow-y: scroll;
    height: 300px;
">
            <div class="Message_border" style="min-height:auto">

            </div>
        </div>

        <div class="form-group">


            <input type="text" class="form-control" name="content"
                   placeholder="Write your message. press enter to send message" style="padding-left:5px"
                   id="write_message"><span>Note: press enter after write your message</span>
        </div>


    </div>
    <div id="related-product" class="white-popup-block related-product-popup">
        <div class="title-holder text-center">
            <h3>you might like these items as well</h3>
        </div>
        <div id="related-item" class="owl-carousel owl-theme">
            @foreach($suggestions as $suggestion)
                <?php $user = App\User::where('id', $suggestion->userID)->first(); ?>
                <?php $suggested_product = App\Models\Products\Products::where('id', $suggestion->productID)->first(); ?>

                <?php $wishlist_new = App\Models\Wishlist\Wishlist::where('product_id', $suggested_product->id)->where('user_id', Auth::check() ? Auth::user()->id : '')->first();

                $product_review_avg = \App\Models\ProductUserReview::where('product_id', $suggested_product->id)->avg('rating');
                $product_review_avg = round($product_review_avg);
                $without_fill_start = 5 - $product_review_avg;
                ?>
                <div class="item">
                    <div class="single-product-item">
                        <div class="img-holder">
                            <a href="{!!URL('garments/view/'.$suggested_product->seo_url)!!}"><img
                                        src="{!!asset($suggested_product->picture)!!}"></a>
                        </div>
                        <div class="clearfix">
                            <h5 class="pull-left"><a
                                        href="{!!URL('garments/view/'.$suggested_product->seo_url)!!}">{{$suggested_product->name}}</a>
                            </h5>
                            <p class="pull-right price">$ {{$suggested_product->price}}/day</p>
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
                            <div class="pull-right name">
                                <a href="">{{$user->first_name}} {{substr($user->last_name,0,1)}} {{$user->location}}</a>
                            </div>
                        </div>

                        <div class="clearfix">

                            <div class="btn-holder">
                                @if(Auth::check() && !Auth::user()->isAdmin())
                                    @if($wishlist_new === null)
                                        <a id="add-to-wishlist"
                                           data-product-id="{!! Crypt::encrypt($suggested_product->id) !!}"
                                           class="btn__block no_bg wishlist_value border-only"><i class="fa fa-heart-o"
                                                                                                  aria-hidden="true"></i>
                                            WISHLIST</a>
                                    @else
                                        <a id="remove-from-wishlist"
                                           data-product-id="{!! Crypt::encrypt($suggested_product->productID) !!}"
                                           class="btn__block no_bg wishlist_value border-only"><i class="fa fa-heart"
                                                                                                  aria-hidden="true"></i>
                                            ON WISHLIST</a>
                                    @endif
                                @else
                                    <a href="#login"
                                       class="btn__block no_bg wishlist_value popup-with-form border-only login_modal"
                                       redirect_url="{{Request::fullUrl()}}"><i class="fa fa-heart-o"
                                                                                aria-hidden="true"></i> WISHLIST</a>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@stop
@section('js')
    @include('user-interface.cart.includes.js')

    <script src="{!!asset('user-interface')!!}/js/jquery.fancybox.min.js"></script>
    <script src="{!!asset('user-interface')!!}/js/owl.carousel.js"></script>
    {{--<script src="https://maps.google.com/maps/api/js?sensor=false"></script>--}}
    <script defer
            src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCX4SwO87SkUA_iKjehYl2-C0RWuvVFmLM&libraries=places&callback=initAutocomplete"></script>
    <script type="text/javascript">


        $(function () {
            if (navigator.geolocation) {
                navigator.geolocation.getCurrentPosition(showPosition);
            } else {
//            alert("Geolocation is not supported by this browser.");
            }

        });
        function showPosition(position) {

//            if(!$("#google_location").val()) {
            var geocoder = new google.maps.Geocoder();
            var latLng = new google.maps.LatLng(position.coords.latitude, position.coords.longitude);

            if (geocoder) {
                geocoder.geocode({'latLng': latLng}, function (results, status) {
                    if (status == google.maps.GeocoderStatus.OK) {
//                        console.log(results[0].formatted_address);
//                        console.log(results[0]);
                        $("#autocomplete").val(results[0].formatted_address);

                        var address_components = results[0].address_components;
                        var components={};
                        jQuery.each(address_components, function(k,v1) {jQuery.each(v1.types, function(k2, v2){components[v2]=v1.long_name});});

//                        console.log(components);

                        $("#administrative_area_level_1").val(components.administrative_area_level_1);
                        $("#locality").val(components.locality);
                        $("#postal_code").val(components.postal_code);
                        $("#country").val(components.country);
                    }
                    else {
                        $("#autocomplete").val(results[0].formatted_address);
                        console.log("Geocoding failed: " + status);
                    }
                }); //geocoder.geocode()
            }
//            }
        }


        $(".messages_popup").click(function () {
            $(".listing-product-holder").animate({scrollTop: 50000}, 10);
        });
        //$(".listing-product-holder").animate({ scrollTop: 300}, 1000);
        //$(".listing-product-holder").animate({ scrollTop: 1800}, 1000);
        //alert($('.listing-product-holder').prop("scrollHeight"));
        //$('.listing-product-holder').scrollTop($('.listing-product-holder')[0].scrollHeight);

        $(document).keypress(function (e) {
            if (e.which == 13) {

                send_message();
            }
        });
        // END GOOGLE LOCATION SECTION //
        $(window).load(function () {

            //var autocomplete;


            /*setTimeout(function(){        
             $.magnificPopup.open({
             items: {
             src: '#related-product',
             type:'inline'
             }
             });
             }, 5000);*/
        });

        /*$('.Localization_function select').change(function () {
         var theValue = $(this).find('option:selected').text();
         if ($(this).find('option:selected').val() === 'Pick_up') {
         $("").hide();
         }else{
         $("").show();
         }
         });*/

        // owl carousel for you might like these items
        $(document).ready(function () {

            $("#write_message").val("");
            $(".listing-product-holder").animate({scrollTop: 3000}, 1000);
            console.log('welcome');
            $('#related-item').owlCarousel({
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
                        items: 3,
                        nav: true,
                        loop: false,
                        margin: 20
                    }
                }
            })
        })

        // for large view of fimage
        $(document).ready(function () {
            load_user_message_data();
            $('.thumb').click(function () {
                var largeImage = $(this).attr('data-full');
                var rotate = $(this).attr('data-rotate');
                $('.selected').removeClass();
                $(this).addClass('selected');
                $('.full img').hide();
                $('.full img').attr('src', largeImage);
                $('.full img').css({'transform' : 'rotate('+ rotate +'deg)'});

                $('.full img').fadeIn();
            });
            $('.full img').on('click', function () {
                var modalImage = $(this).attr('src');
                $.fancybox.open(modalImage);
            });
        });

        // DATES AND CALEDAR
        $('input[name="rental_period_olddd"]').daterangepicker({
            autoUpdateInput: false,
            minDate: moment().add(3, 'days'),
            locale: {cancelLabel: 'Clear'},
        });

        var disableddates = ["20-05-2015", "12-11-2014", "12-25-2014", "02-20-2018"];
        //var disableddates = ['02/16/2018','02/17/2018'];
        var disableddates = [<?php echo $this_item_on_rent_dates;?>];
        //if()
        console.log('sdsds:' + disableddates);
        //var disableddates = ['02/26/2018'];
        //disableddates.push("02/16/2018");
        //disableddates.push("02/17/2018");
        //var a = "'02/16/2018','02/17/2018'";
        //console.log(a);
        function DisableSpecificDates(date) {
            var string = jQuery.datepicker.formatDate('dd-mm-yy', date);
            return [disableddates.indexOf(string) == -1];
        }

        console.log(DisableSpecificDates);

        //$('#datepicker').datepicker();
        /*$('.datepicker_rent_period').datepicker({
         format: 'yyyy-mm-dd',
         startDate: '+1d',
         minDate : 0,
         selectMultiple:true,
         onSelect: function (date) {
         $('.datepicker_rent_period').datepicker("setDate", new Date(2018,9,03) );

         // var date2 = $('.datepicker_rent_period').datepicker('getDate');
         //date2.setDate(date2.getDate() + 1);
         //$('.datepicker_rent_period').datepicker('setDate', date2);
         //$('.datepicker_rent_period').datepicker('setDates', [date2.getDate(), date2]);

         //sets minDate to dt1 date + 1
         //$('#dt2').datepicker('option', 'minDate', date2);
         },

         beforeShowDay: function(date){
         var month = date.getMonth()+1;
         var year = date.getFullYear();
         var day = date.getDate();

         // Change format of date
         var newdate = day+"-"+month+'-'+year;

         // Set tooltip text when mouse over date
         var tooltip_text = "New event on " + newdate;

         // Check date in Array
         if(jQuery.inArray(newdate, disableddates) != -1){
         return [false, "ui-state-active"];
         }
         return [true];
         }

         });*/

        $('.datepicker_rent_period').multiDatesPicker({
            minDate: 0,
            //maxPicks: 2,
            autoclose: true,
            mode: 'daysRange',
            autoselectRange: [0, 1],
            addDisabledDates: disableddates,
            onSelect: function (date) {
                var dates = $('.datepicker_rent_period').multiDatesPicker('value');
                dates_array = dates.split(',');

                for (i = 0; i < disableddates.length; i++) {
                    for (j = 0; j < dates_array.length; j++) {
                        if (disableddates[i] == dates_array[j]) {
                            $('.datepicker_rent_period').multiDatesPicker('resetDates', 'picked');
                            $("#user_start_date").val('empty');
                            $("#user_end_date").val('empty');
                            //$('.datepicker_rent_period').multiDatesPicker('destroy');

                            alert("Invalid date selection. disabled date not be consider.");
                            return false;
                        }
                    }
                }
                $("#user_start_date").val(dates_array[0]);
                $("#user_end_date").val(dates_array[dates_array.length - 1]);

            }


        });

        $(document).on('change', '#rental_period_no_of_days', function () {
            $('.datepicker_rent_period').addClass('clickable');
            if(this.value == 0) {
                $('.datepicker_rent_period').removeClass('clickable');
                $("#user_start_date").val('empty');
                $("#user_end_date").val('empty');
            }
            $("#user_start_date").val('empty');
            $("#user_end_date").val('empty');
            $('.datepicker_rent_period').multiDatesPicker('resetDates', 'picked');
            $('.datepicker_rent_period').multiDatesPicker({
                minDate: 0,
                //maxPicks: 2,
                autoclose: true,
                mode: 'daysRange',
                autoselectRange: [0, this.value],
                addDisabledDates: disableddates,
                onSelect: function (date) {
                    var dates = $('.datepicker_rent_period').multiDatesPicker('value');
                    dates_array = dates.split(',');
                    for (i = 0; i < disableddates.length; i++) {
                        for (j = 0; j < dates_array.length; j++) {
                            if (disableddates[i].trim() == dates_array[j].trim()) {

                                $("#user_start_date").val('empty');
                                $("#user_end_date").val('empty');
                                invalid_date_selection = true;
                                $('.datepicker_rent_period').multiDatesPicker('resetDates', 'picked');
                                //$('.datepicker_rent_period').multiDatesPicker('destroy');

                                alert("Invalid date selection. disabled date not be consider.");
                                return false;
                            }
                        }
                    }
                    $("#user_start_date").val(dates_array[0]);
                    $("#user_end_date").val(dates_array[dates_array.length - 1]);
                }


            });
            //$('.datepicker_rent_period').multiDatesPicker('resetDates', 'disabled');


        });

        /*$('input[name="rental_period"]').on('apply.daterangepicker', function(ev, picker) {
         $(this).val(picker.startDate.format('MM/DD/YYYY') + ' - ' + picker.endDate.format('MM/DD/YYYY'));
         $('input[name="start_date"]').val(picker.startDate.format('MM/DD/YYYY'));
         $('input[name="end_date"]').val(picker.endDate.format('MM/DD/YYYY'));

         $('#datepicker').datepicker("option", "minDate", picker.startDate.format('MM/DD/YYYY'));
         $('#datepicker').datepicker("option", "maxDate", picker.endDate.format('MM/DD/YYYY'));
         });

         $('input[name="rental_period"]').on('cancel.daterangepicker', function(ev, picker) {
         $(this).val('');
         }); */
        // END DATES AND CALEDAR      


        $(document).on("submit", "#rent-item-form", function () {
            // Set form data
            var formData = new FormData($(this)[0]);
            $.ajax({
                'url': "{!!URL('my-cart/add-cart')!!}",
                'method': 'post',
                'dataType': 'json',
                'data': formData,
                'processData': false,
                'contentType': false,
                success: function (data) {
                    $(".rent-error").empty();
                    if (data.result == 'success') {
                        $(".display-name").text(data.name);
                        //location.reload();
                        window.location.href = "{!!URL('my-cart')!!}";
                    }
                    else {
                        swal("Action failed", "Please check your inputs or connection and try again.", "error");
                        $.each(data.errors, function (key, value) {
                            if (value != "") {
                                $("#rent_" + key).text(value);
                            }
                        });
                        $(".toggle-title").addClass('clicked');
                        $(".toggle-details").show();
                    }
                },
                beforeSend: function () {
                    $('#loadingDiv').show()
                },
                complete: function () {
                    $('#loadingDiv').hide();
                }
            });
            return false;
        });

        function load_user_message_data() {
            sender_firebase_id = $("#sender_firebase_id").val();
            receiver_firebase_id = $("#receiver_firebase_id").val();
            product_id = $("#product_id").val();
            firebase.database().ref('messages/' + product_id + '/' + sender_firebase_id + '/' + receiver_firebase_id).on('value', function (data) {
                /*data.forEach(function(childSnapshot) {
                 var childKey = childSnapshot.key;
                 var childData = childSnapshot.val().message;
                 console.log(childKey+':'+childData );
                 });
                 $("#write_message").val("");
                 $('#loadingDiv').hide();*/

                //console.log("data:::"+data);
                if (data.exists()) {
                    //alert("Yes");
                    html = "";
                    data.forEach(function (childSnapshot) {
                        var childKey = childSnapshot.key;
                        var childData = childSnapshot.val().message;
                        //console.log(childKey+':'+childData );

                        time = parseInt(childSnapshot.val().time);
                        time = new Date(time);

                        time = time.getDate() + "-" + time.getMonth() + "-" + time.getFullYear() + " " + time.getHours() + ":" + time.getMinutes() + ":" + time.getSeconds();

                        html += "<div class='row'>";
                        if (childSnapshot.val().from == sender_firebase_id) {
                            html += "<div class='col-sm-3'>";
                            html += "<h1>" + childSnapshot.val().username + "</h1>";
                            html += "<div class='profile_image_holder'>";
                            html += "<img src='" + childSnapshot.val().profile_photo + "'>";
                            html += "</div>";
                            html += "</div>";

                            html += "<div class='col-sm-6'>";
                            html += "<p>" + childSnapshot.val().message + "</p>";
                            html += "</div>";

                            html += "<div class='col-sm-3'>";
                            html += "<h2>" + time + "</h2>";
                            html += "</div>";
                        } else {
                            html += "<div class='col-sm-3'>";
                            html += "<h2>" + time + "</h2>";
                            html += "</div>";


                            html += "<div class='col-sm-6'>";
                            html += "<p>" + childSnapshot.val().message + "</p>";
                            html += "</div>";

                            html += "<div class='col-sm-3'>";
                            html += "<h1>" + childSnapshot.val().username + "</h1>";
                            html += "<div class='profile_image_holder'>";
                            html += "<img src='" + childSnapshot.val().profile_photo + "'>";
                            html += "</div>";
                            html += "</div>";


                        }
                        html += "</div>";
                    });
                    $(".Message_border").html(html);
                    $(".listing-product-holder").animate({scrollTop: 50000}, 1000);
                    //$(".listing-product-holder").animate({ scrollTop: 1800}, 1000);

                } else {
                    //alert("No");
                    html = "<div class='row'><div class='col-sm-12'><h1>No Messages Found.</h1></div></div>";
                    $(".Message_border").html(html);
                    $(".listing-product-holder").animate({scrollTop: 50000}, 1000);

                }
            });
        }

        function send_message() {
            sender_firebase_id = $("#sender_firebase_id").val();
            receiver_firebase_id = $("#receiver_firebase_id").val();
            //alert(sender_firebase_id+":"+receiver_firebase_id); return false;
            product_id = $("#product_id").val();
            product_picture = $("#product_picture").val();
            product_name = $("#product_name").val();
            product_price = $("#product_price").val();
            sender_profile_photo = $("#sender_profile_photo").val();
            receiver_profile_photo = $("#receiver_profile_photo").val();
            sender_user_name = $("#sender_username").val();
            receiver_username = $("#receiver_username").val();
            message = $("#write_message").val();

            var status = false;

            $.ajax({
                'url': "<?php echo URL('/getProductDetail'); ?>",
                'method': 'get',
                'dataType': 'json',
                'async': false,
                'data': {
                    product_id: product_id,
                    sender_firebase_id: sender_firebase_id,
                    receiver_firebase_id: receiver_firebase_id
                },
                success: function (data) {

                    status = data.status;

                },
            });

            if(!status) {
                email = message.match(/([a-zA-Z0-9._-]+@[a-zA-Z0-9._-]+\.[a-zA-Z0-9._-]+)/gi);
                number = message.match(/(\(\d{3}\))?[\s-]?\d{3}[\s-]?\d{4}/img);
                message = message.replace(email, "*********");
                message = message.replace(number, "*********");
            }

            time_data = "{{strtotime(date('Y-m-d H:i:s')) * 1000}}";
            timestamp = "{{strtotime(date('Y-m-d H:i:s')) * 1000}}";
            $('#loadingDiv').show();
            //alert('You pressed enter!'+sender_firebase_id+' '+receiver_firebase_id+' '+product_id+' '+product_picture+' '+product_name+' '+product_price+' '+sender_profile_photo+' '+receiver_profile_photo+' '+sender_user_name+' '+receiver_username);
            firebase.database().ref('messages/' + product_id + '/' + sender_firebase_id + '/' + receiver_firebase_id).push({
                from: sender_firebase_id,
                message: message,
                product_id: product_id,
                product_name: product_name,
                product_photo: product_picture,
                product_price: product_price,
                profile_photo: sender_profile_photo,
//                seen: true,
                time: time_data,
                type: "text",
                username: sender_user_name
            });

            firebase.database().ref('messages/' + product_id + '/' + receiver_firebase_id + '/' + sender_firebase_id).push({
                from: sender_firebase_id,
                message: message,
                product_id: product_id,
                product_name: product_name,
                product_photo: product_picture,
                product_price: product_price,
                profile_photo: sender_profile_photo,
                seen: false,
                time: time_data,
                type: "text",
                username: sender_user_name
            });

            firebase.database().ref('Chat/' + product_id + '/' + receiver_firebase_id + '/' + sender_firebase_id).set({
                seen: false,
                timestamp: timestamp,

            });

            firebase.database().ref('Chat/' + product_id + '/' + sender_firebase_id + '/' + receiver_firebase_id).set({
                seen: false,
                timestamp: timestamp,

            });


            $("#write_message").val("");
            $('#loadingDiv').hide();
            load_user_message_data();
            // read data
        }
    </script>
    {{--<script defer
            src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCX4SwO87SkUA_iKjehYl2-C0RWuvVFmLM&libraries=places&callback=initAutocomplete"></script>--}}

@stop