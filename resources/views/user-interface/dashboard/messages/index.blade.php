@extends('user-interface.layout')
@section('title',App\User::displayName(Auth::user()->id))
@section('css')
    <link rel="stylesheet" href="{{ asset('css/select2.min.css') }}">
    <style>
        .select2{
            width: 100%!important;
        }
        .select2-container--default .select2-selection--multiple { border: 1px solid #D5D5D5; }
        .select2-container--default.select2-container--focus .select2-selection--multiple { border: 1px solid #D5D5D5; }
    </style>        
@stop

@section('css')
    <link rel="stylesheet" href="{!!asset('user-interface')!!}/css/jquery.fancybox.min.css">
    <link rel="stylesheet" href="{!!asset('user-interface')!!}/css/owl.carousel.min.css">
    <style type="">
    	.mfp-close {
    		margin-right:20px !important;
    		margin-top:-8px !important;
    	}
    </style>
@stop
@section('content')
    <div class="dashboard paid">
        <div class="section-1">
            <div class="mx-1254 clearfix">
                <div class="breadcrumbs">
                    <ul>
                        <li><a href="{!!URL('/')!!}">Home</a></li>
                        <li><span>messages</span></li>
                    </ul>
                  </div>
                <div class="dashboard-container clearfix">
                    @include('user-interface.dashboard.includes.left-sidebar')
                    <div class="col-md-9">
                        <div class="page-content">
                            <div class="page-content-header clearfix">
                                <div class="header-left">
                                    <h3>Message List</h3> <a class="btn btn-sm pull-right messages_popup" style="background:#d4ad53;color:#fff;display: none;" href="#message">MESSAGE</a>
                                </div>
                                
                            </div>
<!-- -------------------------------------------------------------------------------------------------------------------------------------------- -->                            
                            <div class="listing-product-holder text-center">
                                <div class="Message_border Message_List">                
                                    	{{--<div class="row">--}}
                                            {{--<div class="col-sm-3">--}}
                                            {{--<h1>F sfasbfsaf</h1>--}}
                                                {{--<div class="profile_image_holder">--}}
                                              		{{--<img src="http://www.rentasuit.ca/uploads/others/no_avatar.jpg">--}}
                                             	{{--</div>--}}
                                            {{--</div>--}}
                                            {{--<div class="col-sm-6">--}}
                                            	{{----}}
                                            	{{--<p> flksdfdmlkf sfsf askfnsaknf ksanfkasnkfnsa kf nkasjn fkasnfkj sanfnsdnflsdnflksdnfs</p>--}}
                                            	{{----}}
                                                {{----}}
                                            {{--</div>--}}
                                            {{--<div class="col-sm-3">--}}
                                            	{{----}}
                                            	{{----}}
                                            	{{--<h2>17 hours ago</h2>--}}
                                                {{----}}
                                            {{--</div>--}}
                                        {{--</div>--}}
                                        {{----}}
                                        {{--<div class="row">--}}
                                            {{--<div class="col-sm-3">--}}
                                            {{--<h1>F sfasbfsaf</h1>--}}
                                                {{--<div class="profile_image_holder">--}}
                                              		{{--<img src="http://www.rentasuit.ca/uploads/others/no_avatar.jpg">--}}
                                             	{{--</div>--}}
                                            {{--</div>--}}
                                            {{--<div class="col-sm-6">--}}
                                            	{{----}}
                                            	{{--<p> flksdfdmlkf sfsf askfnsaknf ksanfkasnkfnsa kf nkasjn fkasnfkj sanfnsdnflsdnflksdnfs</p>--}}
                                            	{{----}}
                                                {{----}}
                                            {{--</div>--}}
                                            {{--<div class="col-sm-3">--}}
                                            	{{----}}
                                            	{{----}}
                                            	{{--<h2>17 hours ago</h2>--}}
                                                {{----}}
                                            {{--</div>--}}
                                        {{--</div>--}}
                                    </div>
                            </div>
                            <input type="hidden" value="{{Auth::user()->firebase_id}}" id="sender_firebase_id">
                            <input type="hidden" value="" id="receiver_firebase_id">
				<input type="hidden" value="{!!asset(Auth::user()->profile_picture)!!}" id="sender_profile_photo">
				<input type="hidden" value="{{Auth::user()->first_name.' '.Auth::user()->last_name}}" id="sender_username">
				<input type="hidden" value="" id="product_id">
				<input type="hidden" value="" id="product_picture">
				<input type="hidden" value="" id="product_name">
				<input type="hidden" value="" id="product_price">
				<input type="hidden" value="" id="receiver_profile_photo">
				<input type="hidden" value="" id="receiver_username">
				
				
<!-- -------------------------------------------------------------------------------------------------------------------------------------------- -->

                          
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
                                <div class="Message_border Message_border_data" style="min-height: 140px;"></div>
                            </div>
                                
                                	<div class="form-group">
                                	  
                                          
                                          <input type="text" class="form-control" name="content" placeholder="Write your message. press enter to send message" style="padding-left:5px" id="write_message"><span>Note: press enter after write your message</span>
                                        </div>
                                         
                                
                                </div>
    
@stop
@section('js')
@include('user-interface.cart.includes.js')
    <script type="text/javascript" src="{!!asset('js/select2.min.js')!!}"></script>
    <script type="text/javascript">
    
    

setInterval(function(){
	
    	load_user_message_list();
    	
    },600000);
   
    
    
    function format(state){
        //alert('welcome');
        $('.mfp-wrap').attr('tabindex','');
        if(!state.id) return state.text;
        // Get the picture
        var picture = $("#user-"+state.id).data('picture');
        // Set the picture
        return "<span><img src='"+picture+"'/>" + state.text+"</span>";
    }
    $(".select2").select2({
        templateResult: format,
        minimumInputLength: 3,
        placeholder: 'Send to:',
        escapeMarkup: function(m){ return m; }
    });

    $(document).on("change","select[name='sort']",function(){
        window.location.href = "{{URL('messages?sort=')}}"+$(this).val();
    });
    
    $(document).ready(function(){
    
     $('#loadingDiv').show();
    	load_user_message_list();
    	setTimeout(function(){ $('#loadingDiv').hide(); },3000);
    	//$('#loadingDiv').hide();
    $('.messages_popup').magnificPopup({
		type: 'inline',
	});
	
	$(document).on('click','.messages_popup_click',function(){
		$('.messages_popup').trigger('click');
		receiver_firebase_id = $(this).attr('receiver_firebase_id');
        sender_firebase_id = $("#sender_firebase_id").val();
		product_id = $(this).attr('product_id');
		product_picture = $(this).attr('product_picture');
		
		product_name = $(this).attr('product_name');
		
		product_price = $(this).attr('product_price');
		
		$("#receiver_firebase_id").val(receiver_firebase_id);
		$("#product_id").val(product_id);
		$("#product_picture").val(product_picture);
		$("#product_name").val(product_name);
		
		$("#product_price").val(product_price);
		
		$("#write_message").val("");


        /*timestamp = "{{strtotime(date('Y-m-d H:i:s')) * 1000}}";
        firebase.database().ref('messages/'+product_id+'/'+receiver_firebase_id+'/'+sender_firebase_id).update({
            seen: true,
        });

        firebase.database().ref('Chat/'+product_id+'/'+receiver_firebase_id+'/'+sender_firebase_id).update({
            seen: true,
        });*/

		//alert('receiver_firebase_id:'+$(this).attr('receiver_firebase_id'));
		load_user_messages();
	});
    	const messaging = firebase.messaging();
     messaging.onMessage(function(payload) {
//	  console.log('Message received. ', payload);
	  alert('Message received. '+payload);
	  // ...
	});
    });
    
    function load_user_messages() {
    	sender_firebase_id = $("#sender_firebase_id").val();
    	receiver_firebase_id= $("#receiver_firebase_id").val();
    	product_id= $("#product_id").val();


        console.log('Chat/'+product_id+'/'+receiver_firebase_id+'/'+sender_firebase_id );
//        firebase.database().ref('Chat/'+product_id+'/'+receiver_firebase_id+'/'+sender_firebase_id).update({seen: true});

        firebase.database().ref('Chat/'+product_id+'/'+sender_firebase_id+'/'+receiver_firebase_id).update({seen: true});

//        firebase.database().ref('Chat/'+product_id+'/'+receiver_firebase_id+'/'+sender_firebase_id).on('value', function(snapshot) {
//            console.log(snapshot.key, snapshot.val().seen);
//        });


//    	var firebaseURL = 'messages/'+product_id+'/'+sender_firebase_id+'/'+receiver_firebase_id;
    	var firebaseURL = 'messages/'+product_id+'/'+receiver_firebase_id+'/'+sender_firebase_id;

    	firebase.database().ref(firebaseURL).on('value',function(data){
    		if(data.exists()){
    			html = "";
		  	data.forEach(function(childSnapshot) {
			    var childKey = childSnapshot.key;
			    var childData = childSnapshot.val().message;

			    time = parseInt(childSnapshot.val().time);
			    time = new Date(time);
			    
			    time = time.getDate()+"-"+time.getMonth()+"-"+time.getFullYear()+" "+time.getHours()+":"+time.getMinutes()+":"+time.getSeconds();
			    
			    html +="<div class='row'>";
			    	if(childSnapshot.val().from==sender_firebase_id) {
			    		html +="<div class='col-sm-3'>";
                                            html +="<h1>"+childSnapshot.val().username+"</h1>";
                                                html +="<div class='profile_image_holder'>";
                                              		html +="<img src='"+childSnapshot.val().profile_photo+"'>";
                                             	html +="</div>";
                                        html +="</div>";
                                        
                                        html +="<div class='col-sm-6'>";
                                            html +="<p>"+childSnapshot.val().message+"</p>";
                                        html +="</div>";
                                        
                                        html +="<div class='col-sm-3'>";
                                            html +="<h2>"+time+"</h2>";
                                        html +="</div>";
			    	} else {
/*
                        console.log(childKey+':'+childData );
                        firebase.database().ref(firebaseURL+"/"+childKey).update({
                            seen: true,
                        });*/



			    		html +="<div class='col-sm-3'>";
                                            html +="<h2>"+time +"</h2>";
                                        html +="</div>";
                                        
			    		
			    		html +="<div class='col-sm-6'>";
                                            html +="<p>"+childSnapshot.val().message+"</p>";
                                        html +="</div>";
                                        
                                        html +="<div class='col-sm-3'>";
                                            html +="<h1>"+childSnapshot.val().username+"</h1>";
                                                html +="<div class='profile_image_holder'>";
                                              		html +="<img src='"+childSnapshot.val().profile_photo+"'>";
                                             	html +="</div>";
                                        html +="</div>";
                                        
                                        
                                        
                                        
			    	}
			    html +="</div>";
			  });
			  $(".Message_border_data").html(html );
			  $(".listing-product-holder").animate({ scrollTop: 50000}, 10);
    		} else {
    			html = "<div class='row'><div class='col-sm-12'><h1>No Messages Found.</h1></div></div>";
		  	$(".Message_border_data").html(html );
		  	$(".listing-product-holder").animate({ scrollTop: 50000}, 10);
    		}
    	});
    }
    
    function load_user_message_list() {
    	sender_firebase_id= $("#sender_firebase_id").val();
		sender_profile_photo = $("#sender_profile_photo").val();
		sender_username = $("#sender_username").val();
//    	console.log(sender_firebase_id+":"+sender_profile_photo+":"+sender_username);
    	var receiver_array1 = [];
    	var receiver_array = [];
     	var html = "";




        firebase.database().ref().child('messages').on('child_added',function(data){
    	if(data.exists()){
    		//console.log(data.key+" : "+data.child().key);
    		//console.log("ALL:"+JSON.stringify(data));
    		
    		data.forEach(function(childSnapshot) {
    			//console.log("Main Key:"+childSnapshot.key);

				var isSeen = false;
 	if(sender_firebase_id==childSnapshot.key) {
  /*firebase.database().ref().child('Chat').on('child_added',function(data){
                        data.forEach(function(ppppp) {
                            if(sender_firebase_id==ppppp.key) {
                                let v = ppppp.val();
                                let k = Object.keys(v)[0];

                                isSeen = v[k].seen;
//
//                                if(v[k].seen){
//                                    $('#'+sender_firebase_id+"_unreadbox").hide();
//								}

                            }

                        });
                    })
   */


    				childSnapshot.forEach(function(childSnapshot1) {
//    				console.log("Inner Key:"+childSnapshot1.key);
    					receiver_array = [];
    					receiver_array1['receiver_firebase_id'] = childSnapshot1.key;
    					childSnapshot1.forEach(function(childSnapshot2) {
							//console.log("Inner Key data:"+childSnapshot2.val());
							//alert("Inner Key data:"+JSON.stringify(childSnapshot2));
							//receiver_array = childSnapshot2.val();

							receiver_array1['from'] = childSnapshot2.val().from;
							receiver_array1['message'] = childSnapshot2.val().message;
							receiver_array1['product_id'] = childSnapshot2.val().product_id;
							receiver_array1['product_name'] = childSnapshot2.val().product_name;
							receiver_array1['product_picture'] = childSnapshot2.val().product_picture;
							receiver_array1['product_price'] = childSnapshot2.val().product_price;


							receiver_array1['profile_photo'] = childSnapshot2.val().profile_photo;
							receiver_array1['seen'] = childSnapshot2.val().seen;
							receiver_array1['time'] = childSnapshot2.val().time;
							receiver_array1['type'] = childSnapshot2.val().type;
							receiver_array1['username'] = childSnapshot2.val().username;
	//    					console.log("===================="+JSON.stringify(receiver_array1));
    					
	    				});


	    				
	    				//alert(receiver_array1['message']);
	    				receiver_array.push(receiver_array1);
	    				//receiver_array = [];
	    				//console.log("^^^^"+JSON.stringify(receiver_array));

	    				if(receiver_array.length>0) {
	    				for(i=0;i<receiver_array.length;i++) {

                            var userName = '';
                            var picture = '';
                            $.ajax({
                                'url': "<?php echo URL('/getProfile'); ?>",
                                'method': 'get',
                                'dataType': 'json',
                                'async': false,
                                'data': {
                                    sender_firebase_id: receiver_array[i].from,
                                    receiver_firebase_id: receiver_array[i].receiver_firebase_id
                                },
                                success: function (data) {

                                    userName = data.userName;
                                    picture = data.picture;

                                },
                            });

                            //alert(receiver_array[i].message);
	    				time = parseInt(receiver_array[i].time);
			    		time = new Date(time);

			    		time = time.getDate()+"-"+time.getMonth()+"-"+time.getFullYear()+" "+time.getHours()+":"+time.getMinutes()+":"+time.getSeconds();


	    				html +="<div class='row'>";
	    					html +="<div class='col-sm-3'>";
	                                            html +="<h1>"+ userName +"</h1>";
	                                                html +="<div class='profile_image_holder'>";
	                                              		html +="<img src='"+picture+"'>";
	                                             	html +="</div>";
	                                        html +="</div>";

	                                        html +="<div class='col-sm-6'>";
	                                            html +="<p>"+receiver_array[i].message+"</p>";
	                                        html +="</div>";

	                                        html +="<div class='col-sm-3'>";
	                                            html +="<h2>"+time+"</h2>" +
													"<a href='#message' class='btn btn-sm pull-right messages_popup_click' style='background:#d4ad53;color:#fff'" +
													" from='"+receiver_array[i].from+"' message='"+receiver_array[i].message+"' product_id='"+receiver_array[i].product_id+"' " +
													"product_name='"+receiver_array[i].product_name+"' product_picture='"+receiver_array[i].product_picture+"' product_price='"+receiver_array[i].product_price+"' " +
													"profile_photo='"+receiver_array[i].profile_photo+"' seen='"+receiver_array[i].seen+"' time='"+receiver_array[i].time+"' " +
													"type='"+receiver_array[i].type+"' username='"+receiver_array[i].username+"' " +
													"receiver_firebase_id ='"+receiver_array[i].receiver_firebase_id+"'>Read & Send Message</a>";
												html +="<h2 id='"+receiver_array[i].product_id+'_'+sender_firebase_id+"_unreadbox'><b>"+ (isSeen ? "" : "Un Read") +"</b></h2>";

											html +="</div>";
	    					//console.log("message:"+receiver_array[i].message);
	    					//console.log("username:"+receiver_array[i].username);
	    					//console.log("profile_photo:"+receiver_array[i].profile_photo);
	    					//console.log("from:"+receiver_array[i].from);

	    					//console.log("product_name:"+receiver_array[i].product_name);
	    					//console.log("product_id:"+receiver_array[i].product_id);
	    					//console.log("product_photo:"+receiver_array[i].product_photo);
	    					//console.log("time:"+receiver_array[i].time);
	    				html +="</div>";
	    				}
	    				//console.log("html:"+html);
	    				$(".Message_List").html(html );
	    				//$('#loadingDiv').hide();
			  		//$(".listing-product-holder").animate({ scrollTop: 3000}, 1000);


//                            var poth = 'Chat/' + receiver_array1['product_id'] + '/' + childSnapshot1.key + '/' + sender_firebase_id;
                            var poth = 'Chat/' + receiver_array1['product_id'] + '/' + sender_firebase_id + '/' + childSnapshot1.key;
                            firebase.database().ref(poth).on('value', function (isSeenCheck) {
                                isSeenCheck.val().seen;

                                var idName = "#"+receiver_array1['product_id']+'_'+sender_firebase_id+"_unreadbox";

                                console.log(poth);
                                console.log(idName);

                                if(isSeenCheck.val().seen){
                                    $(idName).hide();
//                                    $("#noti-display").hide();
                                }else{
                                    $(idName).show();
//                                    $("#noti-display").show();

                                }

                                console.log(isSeenCheck.val().seen);

                            });

	    			} else {
	    				html = "<div class='row'><div class='col-sm-12'><h1>No Messages List Found.</h1></div></div>";
				  	$(".Message_List").html(html );
				  	//$('#loadingDiv').hide();
				  	//$(".listing-product-holder").animate({ scrollTop: 3000}, 1000);
	    			}
	    			});


                    //console.log('here');

    }

            });





            /*data.forEach(function(childSnapshot) {
                console.log("all:"+childSnapshot.key+" "+childSnapshot.value);
            });*/
    		
    	} else {
    		html = "<div class='row'><div class='col-sm-12'><h1>No Messages List Found.</h1></div></div>";
		  	$(".Message_List").html(html );
		  	$(".listing-product-holder").animate({ scrollTop: 50000}, 10);
		  	//$('#loadingDiv').hide();
    	}
    	
    	//console.log("receiver_array :"+receiver_array);
//	    			console.log("receiver_array length:"+receiver_array);
	    			 
    	});
    }
    
    function send_message() {
		sender_firebase_id = $("#sender_firebase_id").val();
    	receiver_firebase_id= $("#receiver_firebase_id").val();
    	//alert(sender_firebase_id+":"+receiver_firebase_id); return false;
    	product_id= $("#product_id").val();
    	product_picture= $("#product_picture").val();
    	product_name= $("#product_name").val();
    	product_price= $("#product_price").val();
    	sender_profile_photo= $("#sender_profile_photo").val();
    	receiver_profile_photo= $("#receiver_profile_photo").val();
    	sender_user_name= $("#sender_username").val();
    	receiver_username= $("#receiver_username").val();

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

        message = $("#write_message").val();

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
					firebase.database().ref('messages/'+product_id+'/'+sender_firebase_id+'/'+receiver_firebase_id).push({
					    from: sender_firebase_id,
					    message: message,
					    product_id: product_id,
					    product_name: product_name,
					    product_photo: product_picture,
					    product_price: product_price,
					    profile_photo: sender_profile_photo,
//					    seen: true,
					    time: time_data,
					    type:"text",
					    username:sender_user_name
					  });

        			firebase.database().ref('messages/'+product_id+'/'+receiver_firebase_id+'/'+sender_firebase_id).push({
					    from: sender_firebase_id,
					    message: message,
					    product_id: product_id,
					    product_name: product_name,
					    product_photo: product_picture,
					    product_price: product_price,
					    profile_photo: sender_profile_photo,
					    seen: false,
					    time: time_data,
					    type:"text",
					    username:sender_user_name
					  });

					firebase.database().ref('Chat/'+product_id+'/'+receiver_firebase_id+'/'+sender_firebase_id).set({
					    seen: false,
					    timestamp: timestamp,
					    
					  });

					firebase.database().ref('Chat/'+product_id+'/'+sender_firebase_id+'/'+receiver_firebase_id).set({
					    seen: false,
					    timestamp: timestamp,
					    
					  });
					  
	
					  $("#write_message").val("");
		$('#loadingDiv').hide();
		load_user_messages();			  
	// read data
	}
	
	$(document).keypress(function(e) {
	    	if(e.which == 13) {
			send_message();
		}
	});
    </script>
@stop
