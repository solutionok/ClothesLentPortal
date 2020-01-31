 
<script type="text/javascript">
	$('.toggle-title').click(function(){
        $(this).toggleClass('clicked', 'slow');
        $(this).next('.toggle-details').slideToggle( "slow" );
    });
    $(".pagination>li:first-child>a, .pagination>li:first-child>span").html("Previous");
    $(".pagination>li:last-child>a, .pagination>li:last-child>span").html("Next");

    $(document).ready(function() {
        $('.popup-gmaps').magnificPopup({
            type: 'inline'
        });

        $('.toggle-title').click(function(){
            $(this).toggleClass('clicked', 'slow');
            $(this).next('.toggle-details').slideToggle( "slow" );
        });
    });

	var min = 1;
	var max = "<?php if(isset($max_product_price)) {echo $max_product_price;}else {echo '1000';}?>";
	var selected_min = "<?php if(isset($price1)) {echo $price1;}else {echo '1';}?>";
	var selected_max = "<?php if(isset($price2)) {echo $price2;}else {echo '1000';}?>";
    $( "#slider-range" ).slider({
      range: true,
      min: min,
      max: max,
      values: [selected_min , selected_max ],
      slide: function( event, ui ) {
      	$("#price1").val(ui.values[ 0 ]);
      	$("#price2").val(ui.values[ 1 ]);
        $( "#amount" ).text( "$" + ui.values[ 0 ] + " - $" + ui.values[ 1 ] );
      }
    });
    $( "#amount" ).text( "$" + $( "#slider-range" ).slider( "values", 0 ) +
      " - $" + $( "#slider-range" ).slider( "values", 1 ) );

   var placeSearch, autocomplete;
      var componentForm = {
        street_number: 'short_name',
        locality: 'long_name',
        administrative_area_level_1: 'short_name',
        country: 'long_name',
        postal_code: 'short_name'
      };


    // GOOGLE LOCATION SECTION //
    var autocomplete;
    var autocomplete_add_to_cart;
    var autocomplete_near_by_location;
    
    var broadway = {
		info: '<strong>Chipotle on Broadway</strong><br>\
					5224 N Broadway St<br> Chicago, IL 60640<br>\
					<a href="https://goo.gl/maps/jKNEDz4SyyH2">Get Directions</a>',
		lat: 41.976816,
		long: -87.659916
	};

	var belmont = {
		info: '<strong>Chipotle on Belmont</strong><br>\
					1025 W Belmont Ave<br> Chicago, IL 60657<br>\
					<a href="https://goo.gl/maps/PHfsWTvgKa92">Get Directions</a>',
		lat: 41.939670,
		long: -87.655167
	};

	var sheridan = {
		info: '<strong>Chipotle on Sheridan</strong><br>\r\
					6600 N Sheridan Rd<br> Chicago, IL 60626<br>\
					<a href="https://goo.gl/maps/QGUrqZPsYp92">Get Directions</a>',
		lat: 42.002707,
		long: -87.661236
	};

	var locations = [
      [broadway.info, broadway.lat, broadway.long, 0],
      [belmont.info, belmont.lat, belmont.long, 1],
      [sheridan.info, sheridan.lat, sheridan.long, 2],
    ];
    var locations = [[],[]];
    url= "<?php echo url('');?>/admin/cleaning-management/get_record";
	 //alert(url);
	 $.get(url,function(response){
	 	if(response.code=="success") {
	 		for(var i=0;i<response.data.length;i++) {
	 			//locations_new[i][0]= response.data[i].location;
	 			//locations_new[i][1]= response.data[i].latitude;
	 			//locations_new[i][2]= response.data[i].longitude;
	 			var get_direction = "<a target='_blank' href='https://www.google.com/maps/?q="+response.data[i].latitude+","+response.data[i].longitude+"'>Get Directions</a>";
	 locations [i] = ["<strong>User Name : "+response.data[i].name+"<br>Shop Name : "+response.data[i].shop_name+"<br>Mobile Number : "+response.data[i].mobile_number+"<br>"+get_direction+"</strong>",response.data[i].latitude,response.data[i].longitude];
	 			//,response.data[i].latitide,response.data[i].longitude]
	 		}
	 	}
	 });
	 
    function initAutocomplete(){
        autocomplete = new google.maps.places.Autocomplete(
        (document.getElementById('google_location')),
        {types: ['geocode']});
        //alert("welcome");
        autocomplete.addListener('place_changed', fillInAddress);
        
        autocomplete_near_by_location= new google.maps.places.Autocomplete(
        (document.getElementById('google_location_near_by_location')),
        {types: ['geocode']});
        //alert("welcome");
        autocomplete_near_by_location.addListener('place_changed', fillInAddressNearByLocation);
        
        autocomplete_add_to_cart= new google.maps.places.Autocomplete(
            /** @type {!HTMLInputElement} */(document.getElementById('autocomplete')),
            {types: ['geocode']});

        // When the user selects an address from the dropdown, populate the address
        // fields in the form.
        autocomplete_add_to_cart.addListener('place_changed', fillInAddressAddToCart);

        var lat = '';
        var long = '';

        @if(\Illuminate\Support\Facades\Auth::check())
            lat = "{{Auth::user()->latitude}}" || lat;
            long = "{{Auth::user()->longitude}}" || long;
        @endif

       var map = new google.maps.Map(document.getElementById('map'), {
		zoom: 9,
		center: new google.maps.LatLng(lat,long),
		mapTypeId: google.maps.MapTypeId.ROADMAP
	});

	var infowindow = new google.maps.InfoWindow({});

	var marker, i;
	 
	for (i = 0; i < locations.length; i++) {
		marker = new google.maps.Marker({
			position: new google.maps.LatLng(locations[i][1], locations[i][2]),
			map: map
		});

		google.maps.event.addListener(marker, 'click', (function (marker, i) {
			return function () {
				infowindow.setContent(locations[i][0]);
				infowindow.open(map, marker);
			}
		})(marker, i));
	}
        
        
    }
    
    
    
    function fillInAddressAddToCart() {
        console.log(4);

        // Get the place details from the autocomplete object.
        var place = autocomplete_add_to_cart.getPlace();
	
        for (var component in componentForm) {
          document.getElementById(component).value = '';
          document.getElementById(component).disabled = false;
        }

        // Get each component of the address from the place details
        // and fill the corresponding field on the form.
        for (var i = 0; i < place.address_components.length; i++) {
          var addressType = place.address_components[i].types[0];
          if (componentForm[addressType]) {
            var val = place.address_components[i][componentForm[addressType]];
            document.getElementById(addressType).value = val;
          }
        }
      }

      // Bias the autocomplete object to the user's geographical location,
      // as supplied by the browser's 'navigator.geolocation' object.
      function geolocate() {
          console.log(5);

          if (navigator.geolocation) {
              navigator.geolocation.getCurrentPosition(function(position) {
            var geolocation = {
              lat: position.coords.latitude,
              lng: position.coords.longitude
            };
            var circle = new google.maps.Circle({
              center: geolocation,
              radius: position.coords.accuracy
            });
            autocomplete_add_to_cart.setBounds(circle.getBounds());
          });
        }
      }
      
    function fillInAddress(){
        console.log(6);

        var place = autocomplete.getPlace();
        $(document).ready(function(){
        //alert("caaaaa");
            $("input[name='longitude']").val(place.geometry.location.lng().toFixed(6));
            $("input[name='latitude']").val(place.geometry.location.lat().toFixed(6));
        });
    }
    
    function fillInAddressNearByLocation(){
        console.log(7);

        var place = autocomplete_near_by_location.getPlace();
        $(document).ready(function(){
        //alert("caaaaa");
            $("input[name='longitude']").val(place.geometry.location.lng().toFixed(6));
            $("input[name='latitude']").val(place.geometry.location.lat().toFixed(6));
        });
    }

    $(document).on("click","#add-to-wishlist",function(){
        $.ajax({
            'url'      : "{!! URL('/my-wishlist/add-wishlist') !!}",
            'method'   : 'get',
            'dataType' : 'json',
            'data'     :    {
                                product_id    : $(this).data('product-id')
                            },
            success : function(data){
                if(data.result == "success"){
                   window.location.reload();
                }
            },
            beforeSend : function(){
                $('#loadingDiv').show()
            },
            complete   : function(){
                $('#loadingDiv').hide();
                window.location.reload();
            }
        });
        return false;
    });

    $(document).on("click","#remove-from-wishlist",function(){
        $.ajax({
            'url'      : "{!! URL('/my-wishlist/remove-wishlist') !!}",
            'method'   : 'get',
            'dataType' : 'json',
            'data'     :    {
                                product_id    : $(this).data('product-id')
                            },
            success : function(data){
                if(data.result == "success"){
                   window.location.reload();
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

    $(document).on("click","#add-to-cart",function(){
        $.ajax({
            'url'      : "{!! URL('/my-cart/add-cart') !!}",
            'method'   : 'get',
            'dataType' : 'json',
            'data'     :    {
                                product_id    : $(this).data('product-id')
                            },
            success : function(data){
                if(data.result == "success"){
                }
            },
            beforeSend : function(){
                $('#loadingDiv').show()
            },
            complete   : function(){
                $('#loadingDiv').hide();
                window.location.reload();
            }
        });
        return false;
    });

    $(document).on("click","#remove-from-cart",function(){
        $.ajax({
            'url'      : "{!! URL('/my-cart/remove-cart') !!}",
            'method'   : 'get',
            'dataType' : 'json',
            'data'     :    {
                                product_id    : $(this).data('product-id')
                            },
            success : function(data){
                if(data.result == "success"){
                    window.location.reload();
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