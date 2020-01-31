<div class="col-md-3">
    <div class="page-sidebar">
        <h3>Categories</h3>
        <ul>
            <li class="{!! Request::input('category') == '' ? 'active' : '' !!}"><a href="{!!URL(Request::segment(1).'?category=')!!}">ALL GARMENTS</a></li>
            @if(count($categories)>0)
	            @foreach($categories as $categories_key=>$categories_value)
	            <li class="<?php if(Request::input('category')===$categories_value->seo_url) {echo 'active';} ?>"><a href="{!!URL(Request::segment(1).'?category='.$categories_value->seo_url)!!}">{{$categories_value->name}} </a></li>
	            @endforeach
            @endif
            <!--<li class="{!! Request::input('category') == 'suits' ? 'active' : '' !!}"><a href="{!!URL(Request::segment(1).'?category=suits')!!}">SUITS</a></li>
            <li class="{!! Request::input('category') == 'dress' ? 'active' : '' !!}"><a href="{!!URL(Request::segment(1).'?category=dress')!!}">DRESS</a></li>
            <li class="{!! Request::input('category') == 'jackets' ? 'active' : '' !!}"><a href="{!!URL(Request::segment(1).'?category=jackets')!!}">JACKETS</a></li>
            <li class="{!! Request::input('category') == 'coats' ? 'active' : '' !!}"><a href="{!!URL(Request::segment(1).'?category=coats')!!}">COATS</a></li>
            <li class="{!! Request::input('category') == 'tops' ? 'active' : '' !!}"><a href="{!!URL(Request::segment(1).'?category=tops')!!}">TOPS</a></li>
            <li class="{!! Request::input('category') == 'accessories' ? 'active' : '' !!}"><a href="{!!URL(Request::segment(1).'?category=accessories')!!}">ACCESSORIES</a>--></li>
        </ul>
    </div>
    <div class="page-sidebar">
        <h3>fILTER</h3>
        <div class="search-holder">
            <form action="{!! URL(Request::segment(1).'/') !!}" method="post" autocomplete="off">
                <div id="body-type-mp" class="white-popup-block mfp-hide body-type-popup" style="background-image: url('{!!asset('user-interface')!!}/img/pop-bg.jpg');">
                    <div class="text-center">
                        <div class="title-holder">
                            <p>Select your body type:</p>
                        </div>
                        <div class="row">
                            <input type="hidden" name="body_type" value="" />
                            <div class="col-20">
                                <div class="rdo-holder">
                                    <input type="radio" id="first_rdo" name="body_type" value="1" {{ Request::input('body_type') == "1" ? "checked" : ""}} />
                                    <label for="first_rdo"><span></span>
                                        <img src="{!!asset('user-interface')!!}/img/body-type-new-1.png">
                                    </label>
                                </div>
                            </div>
                            <div class="col-20">
                                <div class="rdo-holder">
                                    <input type="radio" id="second_rdo" name="body_type" value="2" {{ Request::input('body_type') == "2" ? "checked" : ""}} />
                                    <label for="second_rdo"><span></span>
                                        <img src="{!!asset('user-interface')!!}/img/body-type-new-2.png">
                                    </label>
                                </div>
                            </div>
                            <div class="col-20">
                                <div class="rdo-holder">
                                    <input type="radio" id="third_rdo" name="body_type" value="3" {{ Request::input('body_type') == "3" ? "checked" : ""}} />
                                    <label for="third_rdo"><span></span>
                                        <img src="{!!asset('user-interface')!!}/img/body-type-new-3.png">
                                    </label>
                                </div>
                            </div>
                            <div class="col-20">
                                <div class="rdo-holder">
                                    <input type="radio" id="fourth_rdo" name="body_type" value="4" {{ Request::input('body_type') == "4" ? "checked" : ""}} />
                                    <label for="fourth_rdo"><span></span>
                                        <img src="{!!asset('user-interface')!!}/img/body-type-new-4.png">
                                    </label>
                                </div>
                            </div>
                            <div class="col-20">
                                <div class="rdo-holder">
                                    <input type="radio" id="fifth_rdo" name="body_type" value="5" {{ Request::input('body_type') == "5" ? "checked" : ""}} />
                                    <label for="fifth_rdo"><span></span>
                                        <img src="{!!asset('user-interface')!!}/img/body-type-new-5.png">
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- map  popup-->
                <div id="show_map" class="white-popup-block mfp-hide " style="background-image: url('{!!asset('user-interface')!!}/img/pop-bg.jpg');">
                    <div id="map"></div>
                </div>

                <div class="form-group">
                    <label>SIZE</label>
                    <div class="select">
                    <select class="form-control" name="size">
                        <option value="">--</option>
                        <option value="Extra Small" {{ Request::input('size') == "Extra Small" ? 'selected="selected"' : '' }}>Extra Small</option>
                        <option value="Small" {{ Request::input('size') == "Small" ? 'selected="selected"' : '' }}>Small</option>
                        <option value="Medium" {{ Request::input('size') == "Medium" ? 'selected="selected"' : '' }}>Medium</option>
                        <option value="Large" {{ Request::input('size') == "Large" ? 'selected="selected"' : '' }}>Large</option>
                        <option value="Extra Large" {{ Request::input('size') == "Extra Large" ? 'selected="selected"' : '' }}>Extra Large </option>
                    </select>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label>Price <span id="amount"></label>
                            <!--<input type="text" class="form-control text-right" name="price" value="{{ Request::input('price') == NULL ? '' : $price }}" placeholder="price">-->
                            <div id="slider-range"></div>
                            <input type="hidden" id="price1" value="{{ Request::input('price1') == NULL ? '' : $price1 }}" name="price1">
                            <input type="hidden" id="price2" value="{{ Request::input('price2') == NULL ? '' : $price2 }}" name="price2">

                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <label>&nbsp;</label>
                            <div class="select">
                            <select class="form-control" name="per">
                                <option value="per_day" {{ Request::input('per') == "per_day" ? 'selected="selected"' : '' }}>per Day</option>
                                <option value="per_week" {{ Request::input('per') == "per_week" ? 'selected="selected"' : '' }}>per Week</option>
                            <!--<option value="per_month" {{ Request::input('per') == "per_month" ? 'selected="selected"' : '' }}>per month</option>-->
                            </select>
                            </div>
                        </div>
                    </div>
                </div>
               
                <div class="more-filters">
                    <div class="toggle-title" style='cursor: pointer'>
                        <h4>More filters</h4>
                    </div>
                    <div class="toggle-details">
                        <div class="form-group">
                            <label for="">BODY TYPE</label>
                            <div>
                                <button type="button" href="#body-type-mp" class="btn popup-with-form">View</a>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="">Location</label>
                            <div>
                                <!--<button href="#show_map" class="btn show_maps popup-gmaps">Users Nearby</a> -->
                                <input type="text" class="form-control" name='location' id="google_location_near_by_location" value="{{ Request::input('location') == NULL ? '' : $location}}" placeholder="search Location">
                                <input type="hidden" name="longitude" value="">
                                <input type="hidden" name="latitude" value="">
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <label for="">Designer </label>
                            <div>
                                
                                <input type="text" class="form-control" name='designer' value="{{ Request::input('designer') == NULL ? '' : $designer}}" placeholder="search designer">
                                
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="">HEIGHT</label>
                            <div class="select">
                            <select class="form-control" name="height">
                                <option value="">--</option>
                                @for($ft = 4; $ft <= 6; $ft++)
                                    @for($in = 0; $in <= 11; $in++)
                                        <?php $data = $ft."'".$in.'"' ?>
                                        <option value="{{ $data }}" {{ Request::input('height') == $data ? 'selected="selected"' : '' }}>{{ $data }}</option>
                                    @endfor
                                @endfor
                            </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="">Season</label>
                            <div class="select">
                            <select class="form-control" name="season">
                                <option value="" >--</option>
                                <option value="spring" {{ Request::input('season') == "spring" ? 'selected="selected"' : '' }}>Spring</option>
                                <option value="summer" {{ Request::input('season') == "summer" ? 'selected="selected"' : '' }}>Summer</option>
                                <option value="fall" {{ Request::input('season') == "fall" ? 'selected="selected"' : '' }}>Fall</option>
                                <option value="winter" {{ Request::input('season') == "winter" ? 'selected="selected"' : '' }}>Winter</option>
                            </select>
                            </div>
                        </div>
                        
                    </div>
                </div>
                 <button type="submit" class="btn btn-default form-btn">Search</button>
                <input type="hidden" name='category' value="{{ Request::input('category') }}">
                {{ csrf_field() }}
            </form>
        </div>
    </div>
</div>



<!-- <script async defer
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyC6t_6zYFVBa2_5BvbPSAMuUPi0Tji2QbU&callback=initMap"> AIzaSyDZt62THnZmReCdhaFvhfppa5dKINzSC50 
</script>-->
  <!--<script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBHJFXeb0JU0JJri1-XfdvxSjoW6cQH_30&callback=initMap"
  type="text/javascript"></script>-->
      <script defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBHJFXeb0JU0JJri1-XfdvxSjoW6cQH_30&libraries=places&callback=initAutocomplete"></script>

<script type="text/javascript">
     // This example displays a marker at the center of Australia.
      // When the user clicks the marker, an info window opens.
	
      function initMap() {
      //alert("caaa");
        var uluru = {lat: -25.363, lng: 131.044};
        var map = new google.maps.Map(document.getElementById('map'), {
          zoom: 4,
          center: uluru
        });

        var contentString = '<div id="content">'+
            '<div id="siteNotice">'+
            '</div>'+
            '<h1 id="firstHeading" class="firstHeading">Uluru</h1>'+
            '<div id="bodyContent">'+
            '<p><b>Uluru</b>, also referred to as <b>Ayers Rock</b>, is a large ' +
            'sandstone rock formation in the southern part of the '+
            'Northern Territory, central Australia. It lies 335&#160;km (208&#160;mi) '+
            'south west of the nearest large town, Alice Springs; 450&#160;km '+
            '(280&#160;mi) by road. Kata Tjuta and Uluru are the two major '+
            'features of the Uluru - Kata Tjuta National Park. Uluru is '+
            'sacred to the Pitjantjatjara and Yankunytjatjara, the '+
            'Aboriginal people of the area. It has many springs, waterholes, '+
            'rock caves and ancient paintings. Uluru is listed as a World '+
            'Heritage Site.</p>'+
            '<p>Attribution: Uluru, <a href="https://en.wikipedia.org/w/index.php?title=Uluru&oldid=297882194">'+
            'https://en.wikipedia.org/w/index.php?title=Uluru</a> '+
            '(last visited June 22, 2009).</p>'+
            '</div>'+
            '</div>';

        var infowindow = new google.maps.InfoWindow({
          content: contentString
        });

        var marker = new google.maps.Marker({
          position: uluru,
          map: map,
          title: 'Uluru (Ayers Rock)'
        });
        marker.addListener('click', function() {
        //alert("slfmslfsms");
          infowindow.open(map, marker);
        });
        
        google.maps.event.trigger(map, 'place_changed', function() {
        alert('place changed');
        });
      }
</script>

