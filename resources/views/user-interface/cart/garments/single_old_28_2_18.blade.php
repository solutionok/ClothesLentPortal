@extends('user-interface.layout')
@section('title' , 'Rent a suit - ' . $product->name)
@section('css')
    <link rel="stylesheet" href="{!!asset('user-interface')!!}/css/jquery.fancybox.min.css">
    <link rel="stylesheet" href="{!!asset('user-interface')!!}/css/owl.carousel.min.css">
@stop
@section('content')
    <div id="related-product" class="white-popup-block mfp-hide related-product-popup" style="background-image: url('{!!asset('user-interface')!!}/img/pop-bg.jpg');">
        <div class="title-holder text-center">
            <h3>you might like these items as well</h3>
        </div>
        <div id="related-item" class="owl-carousel owl-theme">
        @foreach($suggestions as $suggestion)
            <?php $user = App\User::where('id', $suggestion->userID)->first(); ?>
            <?php $suggested_product = App\Models\Products\Products::where('id', $suggestion->productID)->first(); ?>
            <div class="item">
                <div class="single-product-item">
                    <div class="img-holder">
                        <a href="{!!URL('garments/view/'.$suggested_product->seo_url)!!}"><img src="{!!asset($suggested_product->picture)!!}"></a>
                    </div>
                    <div class="clearfix">
                        <h5 class="pull-left"><a href="{!!URL('garments/view/'.$suggested_product->seo_url)!!}">{{$suggested_product->name}}</a></h5>
                        <p class="pull-right price">$ {{$suggested_product->price}}/day</p>
                    </div>
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
                        <div class="pull-right name">
                            <a href="">{{$user->first_name}} {{$user->last_name}}</a>
                        </div>
                    </div>
                    
                    <div class="clearfix">
                        <div class="btn-holder">
                            <a class="addToCart with-background"><i class="fa fa-shopping-cart" aria-hidden="true"></i>ADD TO CART</a>
                        </div>
                        <div class="btn-holder">
                            <a href="" class="border-only"><i class="fa fa-heart-o" aria-hidden="true"></i>WISHLIST</a>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
        </div>
    </div>
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
                    @include('user-interface.cart.includes.left-sidebar')
                    <div class="col-md-9">
                        <div class="page-content garments">
                            <div class="product-inner-holder">
                                <div class="row">
                                    <div class="col-md-8">
                                        <div class="clearfix">
                                            <div class="gallery">
                                                <div class="full"> 
                                                    <img src="{!!asset($product->picture)!!}" /> 
                                                </div>
                                                <div class="previews"> 
                                                    <a class="thumb selected" data-full="{!!asset($product->picture)!!}"><img src="{!!asset($product->picture)!!}" /></a> 
                                                    @foreach($product_data->sub_photos as $value)
                                                        <a class="thumb" data-full="{!!asset($value->sub_photo)!!}"><img src="{!!asset($value->sub_photo)!!}" /></a> 
                                                    @endforeach
                                                </div>
                                            </div>
                                        </div>
                                        <div class="clearfix">
                                            <div class="item-description">
                                                <h5>{{$product->name}}</h5>
                                                <div class="star">
                                                    <ul>
                                                        <li><i class="fa fa-star" aria-hidden="true"></i></li>
                                                        <li><i class="fa fa-star" aria-hidden="true"></i></li>
                                                        <li><i class="fa fa-star" aria-hidden="true"></i></li>
                                                        <li><i class="fa fa-star" aria-hidden="true"></i></li>
                                                        <li><i class="fa fa-star-o" aria-hidden="true"></i></li>
                                                    </ul>
                                                    <p>10 REVIEWS</p>
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
                                                    <strong class="col-md-3">PRICE</strong>
                                                    <div class="col-md-8">
                                                        <p>$ {{$product->price}}/day</p>
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
                                                        <a href="{!!URL('profile/profile-personal-info/'.Crypt::encrypt($product->userID))!!}">{{$product->first_name}} {{$product->last_name}}</a>
                                                    </div>
                                                </div>
                                                <div class="clearfix list-description">
                                                    <strong class="col-md-3">CONTACT#</strong>
                                                    <div class="col-md-9">
                                                        <p>{{$product->contact}}</p>
                                                    </div>
                                                </div>
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
                                    <form id="rent-item-form" enctype="multipart/form-data">
                                        <div class="col-md-4">
                                        <?php $wishlist = App\Models\Wishlist\Wishlist::where('product_id', $product->productID)->where('user_id',  Auth::check() ? Auth::user()->id : '' )->first();  ?>
                                        <?php $rent = App\Models\Rent\Rent::where('product_id', $product->productID)->where('user_id', Auth::check() ? Auth::user()->id : '' )->where('status','Cart')->first();  ?>

                                            <div class="rent-details-holder rent-item-holder">
                                                <h3>RENT THIS ITEM</h3>
                                                <?php 
                                                	$oncart = false;
                                                	if(Auth::check() && !Auth::user()->isAdmin())
                                                	{
                                                	//print_r($$rent);exit;
                                                		if($rent != null) {
                                                			$oncart = true;
                                                		}
                                                	}
                                                ?>
                                                	@if($oncart==false)
                                                    <div class="form-group">
                                                        <label for="">DELIVERY OPTIONS</label>
                                                        <div class="select Localization_function">
                                                            <select name="delivery_option" class="form-control">
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
                                                                <select class="form-control" name="rental_period_no_of_days" id="rental_period_no_of_days">
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
                                                                <span class="rent-error errors" id="rent_rental_period_no_of_days"></span>
                                                            </div>
                                                        </div>
                                                    	</div>
                                                    <div class="form-group">
                                                    <label for="">CHOOSE RENTAL PERIOD</label>
                                                        <div class="row">
                                                        
                                                            <div class="col-md-12">
                                                                 
                                                                 <input type='text' class="form-control datepicker_rent_period" readonly name="rental_period"/>
                                                                  <span class="rent-error errors" id="rent_rental_period"></span>
                                                                  <input type="hidden" name="start_date" value="empty" id="user_start_date"/>
                                                                <input type="hidden" name="end_date" value="empty" id="user_end_date"/>
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
                                                                  <input class="form-control" id="autocomplete" name="location" placeholder="Locate your address"
                                                                          type="text" onFocus="geolocate()"></input>
                                                                </div>
                                                            </div>

                                                            <div class="form-group address_form">
                                                                <label for="">Street address</label>
                                                                <div class="row">
                                                                    <div class="col-md-12">
                                                                        <div class="form-group address_form">
                                                                            <input class="form-control" id="street_number" name="street_number" placeholder="Steet Number" ></input>
                                                                            <span class="rent-error errors" id="rent_street_number"></span>
                                                                        </div>
                                                                        <div class="form-group address_form">
                                                                           <input class="form-control" id="route" name="route" placeholder="Route"></input>
                                                                           <span class="rent-error errors" id="rent_route"></span>
                                                                        </div>
                                                                    </div>
                                                                </div> 
                                                            </div>

                                                            <div class="form-group address_form">
                                                                <div class="row">
                                                                    <div class="col-md-12">
                                                                        <div class="form-group address_form">
                                                                            <input class="form-control" id="street_number2" name="address2" placeholder="Apartment,suite,unit,bldg,floor,etc"></input>
                                                                            <span class="rent-error errors" id="rent_address2"></span>
                                                                        </div>
                                                                        <div class="form-group address_form">
                                                                           <input class="form-control" id="route" name="address3" placeholder="Department, c/o, etc."></input>
                                                                           <span class="rent-error errors" id="rent_address3"></span>
                                                                        </div>
                                                                    </div>
                                                                </div> 
                                                            </div>                                                            

                                                            <div class="form-group address_form">
                                                                <label for="">City</label>
                                                                <div class="row">
                                                                    <div class="col-md-12">
                                                                        <input class="form-control" id="locality" name="city"></input>
                                                                        <span class="rent-error errors" id="rent_city"></span>
                                                                    </div>
                                                                </div> 
                                                            </div>

                                                                <div class="form-group address_form">
                                                                    
                                                                    <div class="row">
                                                                        <div class="col-md-6">
                                                                            <label for="">State</label>
                                                                            <input class="form-control" id="administrative_area_level_1" name="state"></input>
                                                                            <span class="rent-error errors" id="rent_state"></span>
                                                                        </div>
                                                                        <div class="col-md-6">
                                                                            <label for="">Postal Code</label>
                                                                            <input class="form-control" id="postal_code" name="postal_code"></input>
                                                                            <span class="rent-error errors" id="rent_postal_code"></span>
                                                                        </div>
                                                                    </div> 
                                                                </div>

                                                            <div class="form-group address_form">
                                                                <label for="">Country</label>
                                                                <div class="row">
                                                                    <div class="col-md-12">
                                                                        <input class="form-control" id="country" name="country"></input>
                                                                        <span class="rent-error errors" id="rent_country"></span>
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
                                                                        <input class="form-control" name="contact_number"></input>
                                                                        <span class="rent-error errors" id="rent_contact_number"></span>
                                                                    </div>
                                                                </div> 
                                                            </div>
                                                            <div class="form-group address_form">
                                                                <div class="row">
                                                                    <div class="col-md-12">
                                                                        <label for="">Email</label>
                                                                        <input class="form-control" name="email"></input>
                                                                        <span class="rent-error errors" id="rent_email"></span>
                                                                    </div>
                                                                </div> 
                                                            </div>
                                                            <div class="form-group address_form">
                                                                <div class="row">
                                                                    <div class="col-md-12">
                                                                        <label for="">Description</label>
                                                                        <textarea class="form-control" name="description"></textarea>
                                                                        <span class="rent-error errors" id="rent_description"></span>
                                                                    </div>
                                                                </div> 
                                                            </div>
                                                          
                                                        </div>
                                                    </div>
                                                    
                                                @if(Auth::check() && !Auth::user()->isAdmin())
                                                    @if($wishlist === null)
                                                        <a id="add-to-wishlist"  data-product-id="{!! Crypt::encrypt($product->productID) !!}" class="btn__block no_bg wishlist_value"><i class="fa fa-heart-o" aria-hidden="true"></i> WISHLIST</a>
                                                    @else
                                                        <a id="remove-from-wishlist"  data-product-id="{!! Crypt::encrypt($product->productID) !!}" class="btn__block no_bg wishlist_value"><i class="fa fa-heart-o" aria-hidden="true"></i> ON WISHLIST</a>
                                                    @endif
                                                @else
                                                   <a href="#login" class="btn__block no_bg wishlist_value popup-with-form"><i class="fa fa-heart-o" aria-hidden="true"></i> WISHLIST</a>
                                                @endif
                                                @if(Auth::check() && !Auth::user()->isAdmin())
                                                    @if($rent === null)
                                                        <button type="submit" class=" btn__block"><i class="fa fa-shopping-cart" aria-hidden="true"></i>ADD TO CART</button>
                                                    @else
                                                        <a href="{!! URL('my-cart') !!}" class="btn__block"><i class="fa fa-shopping-cart" aria-hidden="true"></i> ON CART</a>
                                                    @endif
                                                @else
                                                    <a  href="#login" class="btn__block popup-with-form"><i class="fa fa-shopping-cart" aria-hidden="true"></i> ADD TO CART</a>
                                                @endif
                                            </div>
                                            @else
                                             @if(Auth::check() && !Auth::user()->isAdmin())
                                                    @if($wishlist === null)
                                                        <a id="add-to-wishlist"  data-product-id="{!! Crypt::encrypt($product->productID) !!}" class="btn__block no_bg wishlist_value"><i class="fa fa-heart-o" aria-hidden="true"></i> WISHLIST</a>
                                                    @else
                                                        <a id="remove-from-wishlist"  data-product-id="{!! Crypt::encrypt($product->productID) !!}" class="btn__block no_bg wishlist_value"><i class="fa fa-heart-o" aria-hidden="true"></i> ON WISHLIST</a>
                                                    @endif
                                                @else
                                                   <a href="#login" class="btn__block no_bg wishlist_value popup-with-form"><i class="fa fa-heart-o" aria-hidden="true"></i> WISHLIST</a>
                                                @endif
                                                @if(Auth::check() && !Auth::user()->isAdmin())
                                                    @if($rent === null)
                                                        <button type="submit" class=" btn__block"><i class="fa fa-shopping-cart" aria-hidden="true"></i>ADD TO CART</button>
                                                    @else
                                                        <a href="{!! URL('my-cart') !!}" class="btn__block"><i class="fa fa-shopping-cart" aria-hidden="true"></i> ON CART</a>
                                                    @endif
                                                @else
                                                    <a  href="#login" class="btn__block popup-with-form"><i class="fa fa-shopping-cart" aria-hidden="true"></i> ADD TO CART</a>
                                                @endif
                                            @endif
                                        </div>
                                        
                                        <input type="hidden" name="status" value="Cart">
                                        <input type="hidden" name="productID" value="{!! $product->productID !!}">
                                        {{ csrf_field() }}
                                        
                                        
                                                
                                                
                                                
                                    </form>
                                    
                                    	<br><br>
                                        <div class="col-md-4">
                                        
                                            <div class="rent-details-holder rent-item-holder">
                                                
                                                
                                                    <div class="form-group">
                                                        <a href="#size_chart_popup" class="btn__block popup-with-form">Measurement  Reference guide</a><a href="#show_map" class="btn__block popup-with-form">View Cleaner Location</a>
                                                    </div>
						</div>	

                                                    
                                        
                                        
                                        
                                                
                                                
                                                
                                   
                                    		
                                </div>
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
    
    <script src="{!!asset('user-interface')!!}/js/jquery.fancybox.min.js"></script>
    <script src="{!!asset('user-interface')!!}/js/owl.carousel.min.js"></script>
    <script type="text/javascript"> 
    
    	
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
        $(document).ready(function() {
       
        
            $('#related-item').owlCarousel({
                loop: true,
                margin: 10,
                dot: true,
                responsiveClass: true,
                responsive: {
                    0: {
                        items: 1,
                        nav: false
                    },
                    600: {
                        items: 2,
                        nav: false
                    },
                    1000: {
                        items: 3,
                        nav: false,
                        loop: false,
                        margin: 20
                    }
                }
            })
        })

        // for large view of fimage
        $(document).ready(function(){
            $('.thumb').click(function(){
                var largeImage = $(this).attr('data-full');
                $('.selected').removeClass();
                $(this).addClass('selected');
                $('.full img').hide();
                $('.full img').attr('src', largeImage);
                $('.full img').fadeIn();
            }); 
            $('.full img').on('click', function(){
               var modalImage = $(this).attr('src');
               $.fancybox.open(modalImage);
            });
        }); 

        // DATES AND CALEDAR
        $('input[name="rental_period_olddd"]').daterangepicker({
            autoUpdateInput: false,
            minDate: moment().add(3, 'days'),
            locale: { cancelLabel: 'Clear' },
        });
        
        var disableddates = ["20-05-2015", "12-11-2014", "12-25-2014", "02-20-2018"];
	//var disableddates = ['02/16/2018','02/17/2018'];
	var disableddates = [<?php echo $this_item_on_rent_dates;?>];
	//if()
	console.log('sdsds:'+disableddates);
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
					autoclose:true,
					mode: 'daysRange',
					autoselectRange: [0,1],
					addDisabledDates: disableddates,
					onSelect: function (date) { 
					var dates = $('.datepicker_rent_period').multiDatesPicker('value');
						dates_array = dates.split(',');
						
						for(i=0;i<disableddates.length;i++) {
							for(j=0;j<dates_array.length;j++) {
								if(disableddates[i]==dates_array[j]) {
									$('.datepicker_rent_period').multiDatesPicker('resetDates', 'picked');
									$("#user_start_date").val('empty');
						$("#user_end_date").val('empty');
		//$('.datepicker_rent_period').multiDatesPicker('destroy');
		
		alert("Invalid date selection. disabled date not be consider."); return false;
								}
							}
						}
						$("#user_start_date").val(dates_array[0]);
						$("#user_end_date").val(dates_array[dates_array.length-1]);
						
					}


				});

	$(document).on('change','#rental_period_no_of_days',function(){
		$("#user_start_date").val('empty');
		$("#user_end_date").val('empty');
		$('.datepicker_rent_period').multiDatesPicker('resetDates', 'picked');
		$('.datepicker_rent_period').multiDatesPicker({
					minDate: 0,
					//maxPicks: 2,
					autoclose:true,
					mode: 'daysRange',
					autoselectRange: [0,this.value],
					addDisabledDates: disableddates,
					onSelect: function (date) { 
						var dates = $('.datepicker_rent_period').multiDatesPicker('value');
						dates_array = dates.split(',');
						for(i=0;i<disableddates.length;i++) {
							for(j=0;j<dates_array.length;j++) {
								if(disableddates[i].trim()==dates_array[j].trim()) {
								        
									$("#user_start_date").val('empty');
									$("#user_end_date").val('empty');
									invalid_date_selection = true;
									$('.datepicker_rent_period').multiDatesPicker('resetDates', 'picked');
		//$('.datepicker_rent_period').multiDatesPicker('destroy');
		
									alert("Invalid date selection. disabled date not be consider."); return false;
								} 
							}
						}
						$("#user_start_date").val(dates_array[0]);
						$("#user_end_date").val(dates_array[dates_array.length-1]);
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

        

        $(document).on("submit","#rent-item-form", function(){
            // Set form data
            var formData = new FormData($(this)[0]);
            $.ajax({
                'url'        : "{!!URL('my-cart/add-cart')!!}",
                'method'     : 'post',
                'dataType'   : 'json',
                'data'       : formData,
                'processData': false,
                'contentType': false,
                success      : function(data){
                    $(".rent-error").empty();
                    if(data.result == 'success'){
                        $(".display-name").text(data.name);
                        location.reload();
                    }
                    else{
                        swal("Action failed", "Please check your inputs or connection and try again.", "error");
                        $.each(data.errors,function(key,value){
                            if(value != ""){
                                $("#rent_"+key).text(value);
                            }
                        });
                        $(".toggle-title").addClass('clicked');
                        $(".toggle-details").show();
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
        });

    </script>
        <script defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCX4SwO87SkUA_iKjehYl2-C0RWuvVFmLM&libraries=places&callback=initAutocomplete"></script>

@stop