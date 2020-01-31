@extends('admin-interface.layout')
@section('title','Configuration')
@section('page_title')
	<h2><span class="fa fa-wrench"></span> Configuration</h2>
@stop
@section('breadcrumb')
    <li class="active">Configuration</li>
@stop
@section('content')
	<div class="panel panel-default">
        <div class="panel-heading">
            <h3 class="panel-title">This is where you can manage your configuration</h3>
        </div>     
        <div class="panel-body">
    	    <div class="row">
                <div class="panel panel-default tabs">
                    <ul class="nav nav-tabs" role="tablist">
                        <li class="active"><a href="#tab-general" role="tab" data-toggle="tab">General</a></li>
                        <li><a href="#tab-social-links" role="tab" data-toggle="tab">Social Links</a></li>
                        <li><a href="#tab-credentials" role="tab" data-toggle="tab">Credentials</a></li>
                        <li><a href="#tab-api-keys" role="tab" data-toggle="tab">API Keys</a></li>
                    </ul>                            
                    <div class="panel-body tab-content">
						<div class="tab-pane active" id="tab-general">
                        	<form class="form-horizontal" id="general-form" enctype="multipart/form-data">
                        		<div class="form-group form-group-general">
			                        <label class="col-md-2 col-xs-12 control-label">Website Logo</label>
			                        <div class="col-md-8 col-xs-12"> 
			                        <input type="file" class="file-simple file-logo" data-file="file-logo" data-value="{!! $configuration->logo !!}" name="website_logo" accept="image/*">
			                            <span class="help-block general-error" id="website_logo"></span>
			                        </div>
			                    </div>
			                    <div class="form-group form-group-general">
			                        <label class="col-md-2 col-xs-12 control-label">Website Footer Logo</label>
			                        <div class="col-md-8 col-xs-12"> 
			                        <input type="file" class="file-simple file-logo-footer" data-file="file-logo-footer" data-value="{!! $configuration->logo_footer !!}" name="website_logo_footer" accept="image/*">
			                            <span class="help-block general-error" id="website_logo_footer"></span>
			                        </div>
			                    </div>
			                    <div class="form-group form-group-general">
			                        <label class="col-md-2 col-xs-12 control-label">Profile Picture</label>
			                        <div class="col-md-8 col-xs-12">
			                            <input type="file" class="file-simple file-picture" data-file="file-picture" data-value="{!! $user->profile_picture !!}" name="profile_picture" accept="image/*">
			                            <span class="help-block general-error" id="profile_picture"></span>
			                        </div>
			                    </div>
			                    <div class="form-group form-group-general">
			                        <label class="col-md-2 col-xs-12 control-label">Website Name</label>
			                        <div class="col-md-8 col-xs-12">
		                                <input type="text" name="website_name" class="form-control" value="{!! $configuration->name !!}">
			                            <span class="help-block general-error" id="website_name"></span>
			                        </div>
			                    </div>
			                    <div class="form-group form-group-general">
			                        <label class="col-md-2 col-xs-12 control-label">Website Email</label>
			                        <div class="col-md-8 col-xs-12">
			                            <input type="text" name="website_email" class="form-control" value="{!! $configuration->email !!}"/>
			                            <span class="help-block general-error" id="website_email"></span>
			                        </div>
			                    </div>
			                    <div class="form-group form-group-general">
			                        <label class="col-md-2 col-xs-12 control-label">First Name</label>
			                        <div class="col-md-8 col-xs-12">
		                                <input type="text" name="first_name" class="form-control" value="{!! $user->first_name !!}"/>
			                            <span class="help-block general-error" id="first_name"></span>
			                        </div>
			                    </div>
			                    <div class="form-group form-group-general">
			                        <label class="col-md-2 col-xs-12 control-label">Last Name</label>
			                        <div class="col-md-8 col-xs-12">
			                            <input type="text" name="last_name" class="form-control" value="{!! $user->last_name !!}"/>
			                            <span class="help-block general-error" id="last_name"></span>
			                        </div>
			                    </div>
			                    <div class="form-group form-group-general">
			                        <label class="col-md-2 col-xs-12 control-label">Copyright</label>
			                        <div class="col-md-8 col-xs-12">
			                            <input type="text" name="copyright" class="form-control" value="{!! $configuration->copyright !!}"/>
			                            <span class="help-block general-error" id="copyright"></span>
			                        </div>
			                    </div>
			                    <div class="form-group form-group-general">
			                        <label class="col-md-2 col-xs-12 control-label">Phone Number</label>
			                        <div class="col-md-8 col-xs-12">
			                            <input type="text" name="phone_number" class="form-control" value="{!! $configuration->phone_number !!}"/>
			                            <span class="help-block general-error" id="phone_number"></span>
			                        </div>
			                    </div>
			                    
			                    <div class="form-group form-group-general">
			                        <label class="col-md-2 col-xs-12 control-label">Commision Rate in Percentage</label>
			                        <div class="col-md-8 col-xs-12">
			                            <input type="number" step="0.01" name="commision" class="form-control" value="{!! $configuration->commision !!}"/>
			                            <span class="help-block general-error" id="commision"></span>
			                        </div>
			                    </div>
			                    
			                    
			                    <div class="form-group form-group-general">
			                        <label class="col-md-2 col-xs-12 control-label">Location</label>
			                        <div class="col-md-8 col-xs-12">
			                            <input type="text" name="location" class="form-control" id="autocomplete12" value="{!! $configuration->location !!}"/>
			                            <span class="help-block general-error" id="location"></span>
			                        </div>
			                    </div>
			                    {!!csrf_field()!!}
			                    <div class="form-group">
			                        <div class="col-md-10">
						            	<button class="btn btn-primary pull-right">Save</button>
						            </div>
						        </div>
                            </form>
                        </div>
                        <div class="tab-pane" id="tab-social-links">
                        	<div class="panel panel-primary">
                                <div class="panel-heading">
                                    <h3 class="panel-title">Social Links URLs</h3>
                                </div>
                                <form class="form-horizontal" id="social-links-form">
	                                <div class="panel-body">
										<div class="form-group form-group-social-links">
		                                    <label class="col-md-2 col-xs-12 control-label">Facebook Link</label>
					                        <div class="col-md-8 col-xs-12">
				                                <input type="text" name="facebook_link" class="form-control" value="{!! unserialize($configuration->social_media_links)['facebook'] !!}"/>
					                            <span class="help-block social-links-error" style="color:red" id="facebook_link"></span>
					                        </div>
					                    </div>
					                    <div class="form-group form-group-social-links">
		                                    <label class="col-md-2 col-xs-12 control-label">Pinterest Link</label>
					                        <div class="col-md-8 col-xs-12">
				                                <input type="text" name="twitter_link" class="form-control" value="{!! unserialize($configuration->social_media_links)['twitter'] !!}"/>
					                            <span class="help-block social-links-error" style="color:red" id="twitter_link"></span>
					                        </div>
					                    </div>
					                    <div class="form-group form-group-social-links">
		                                    <label class="col-md-2 col-xs-12 control-label">Instagram</label>
					                        <div class="col-md-8 col-xs-12">
				                                <input type="text" name="instagram_link" class="form-control" value="{!! unserialize($configuration->social_media_links)['instagram'] !!}"/>
					                            <span class="help-block social-links-error" style="color:red" id="instagram_link"></span>
					                        </div>
					                    </div>
	                                </div>
	                                <div class="panel-footer">
	                                    <button class="btn btn-primary pull-right">Submit</button>
	                                </div>
	                                {!! csrf_field() !!}
	                            </form>
                            </div>
                        </div>
                        <div class="tab-pane" id="tab-credentials">
                    		<div class="panel panel-primary">
                                <div class="panel-heading">
                                    <h3 class="panel-title">Email</h3>
                                </div>
                                <form class="form-horizontal" id="email-form">
	                                <div class="panel-body">
	                                	<div class="form-group form-group-email">
		                                    <label class="col-md-2 col-xs-12 control-label">Current Email</label>
					                        <div class="col-md-8 col-xs-12">
				                                <input type="text" name="current_email" class="form-control email-input"/>
					                            <span class="help-block email-error" style="color:red" id="current_email"></span>
					                        </div>
					                    </div>
	                                	<div class="form-group form-group-email">
		                                    <label class="col-md-2 col-xs-12 control-label">New Email</label>
					                        <div class="col-md-8 col-xs-12">
				                                <input type="text" name="email" class="form-control email-input"/>
					                            <span class="help-block email-error" style="color:red" id="email"></span>
					                        </div>
					                    </div>
					                    <div class="form-group form-group-email">
		                                    <label class="col-md-2 col-xs-12 control-label">Email Confirmation</label>
					                        <div class="col-md-8 col-xs-12">
				                                <input type="text" name="email_confirmation" class="form-control email-input"/>
					                            <span class="help-block email-error" style="color:red" id="email_confirmation"></span>
					                        </div>
					                    </div>
	                                </div>
	                                <div class="panel-footer">
	                                    <button class="btn btn-primary pull-right">Submit</button>
	                                </div>
	                                {!! csrf_field() !!}
	                            </form>
                            </div>
	                        <div class="panel panel-primary">
                                <div class="panel-heading">
                                    <h3 class="panel-title">Password</h3>
                                </div>
                                <form class="form-horizontal" id="password-form">
	                                <div class="panel-body">
	                                	<div class="form-group form-group-password">
		                                    <label class="col-md-2 col-xs-12 control-label">Current Password</label>
					                        <div class="col-md-8 col-xs-12">
				                                <input type="password" name="current_password" class="form-control password-input"/>
					                            <span class="help-block password-error" style="color:red" id="current_password"></span>
					                        </div>
					                    </div>
	                                	<div class="form-group form-group-password">
		                                    <label class="col-md-2 col-xs-12 control-label">New Password</label>
					                        <div class="col-md-8 col-xs-12">
				                                <input type="password" name="password" class="form-control password-input"/>
					                            <span class="help-block password-error" style="color:red" id="new_password"></span>
					                        </div>
					                    </div>
					                    <div class="form-group form-group-password">
					                        <label class="col-md-2 col-xs-12 control-label">Password Confirmation</label>
					                        <div class="col-md-8 col-xs-12">
				                                <input type="password" name="password_confirmation" class="form-control password-input"/>
					                            <span class="help-block password-error" style="color:red" id="new_password_confirmation"></span>
					                        </div>
					                    </div>
	                                </div>
	                                <div class="panel-footer">
	                                    <button class="btn btn-primary pull-right">Submit</button>
	                                </div>
	                                {!! csrf_field() !!}
	                            </form>
                            </div>
                        </div>
                        <div class="tab-pane" id="tab-api-keys">
							<div class="panel panel-primary">
                                <div class="panel-heading">
                                    <h3 class="panel-title">Paypal Account</h3>
                                </div>
                                <form class="form-horizontal" id="api-keys-form">
	                                <div class="panel-body">
	                                	<div class="form-group form-group-api-keys">
		                                    <label class="col-md-2 col-xs-12 control-label">
		                                    	Test Client ID
		                                    	<button type="button" class="btn question-btn"></button>
		                                    </label>
					                        <div class="col-md-8 col-xs-12">
				                                <input type="text" name="paypal_client_id" class="form-control" value="{!! $configuration->paypal_client_id !!}"/>
					                            <span class="help-block api-keys-error" style="color:red" id="paypal_client_id"></span>
					                        </div>
					                    </div>
					                    <div class="form-group form-group-api-keys">
		                                    <label class="col-md-2 col-xs-12 control-label">
		                                    	Test Client Secret
		                                    	<button type="button" class="btn question-btn"></button>
		                                    </label>
					                        <div class="col-md-8 col-xs-12">
				                                <input type="text" name="paypal_client_secret" class="form-control" value="{!! $configuration->paypal_client_secret !!}"/>
					                            <span class="help-block api-keys-error" style="color:red" id="paypal_client_secret"></span>
					                        </div>
					                    </div>
					                    {{--<div class="form-group form-group-api-keys">
		                                    <label class="col-md-2 col-xs-12 control-label">
		                                    	Test Signature
		                                    	<button type="button" class="btn question-btn"></button>
		                                    </label>
					                        <div class="col-md-8 col-xs-12">
				                                <input type="text" name="paypal_test_signature" class="form-control" value="{!! unserialize($configuration->paypal_account)['paypal_test_signature'] !!}"/>
					                            <span class="help-block api-keys-error" style="color:red" id="paypal_test_signature"></span>
					                        </div>
					                    </div>--}}
					                    <div class="form-group form-group-api-keys">
		                                    <label class="col-md-2 col-xs-12 control-label">
												Live Client ID
												<button type="button" class="btn question-btn"></button>
		                                    </label>
					                        <div class="col-md-8 col-xs-12">
				                                <input type="text" name="paypal_live_client_id" class="form-control" value="{!! $configuration->paypal_live_client_id !!}"/>
					                            <span class="help-block api-keys-error" style="color:red" id="paypal_live_client_id"></span>
					                        </div>
					                    </div>
					                    <div class="form-group form-group-api-keys">
		                                    <label class="col-md-2 col-xs-12 control-label">
		                                    	Live Client Secret
		                                    	<button type="button" class="btn question-btn"></button>
		                                    </label>
					                        <div class="col-md-8 col-xs-12">
				                                <input type="text" name="paypal_live_client_secret" class="form-control" value="{!! $configuration->paypal_live_client_secret !!}"/>
					                            <span class="help-block api-keys-error" style="color:red" id="paypal_live_client_secret"></span>
					                        </div>
					                    </div>
					                    {{--<div class="form-group form-group-api-keys">
		                                    <label class="col-md-2 col-xs-12 control-label">
		                                    	Live Signature
		                                    	<button type="button" class="btn question-btn"></button>
		                                    </label>
					                        <div class="col-md-8 col-xs-12">
				                                <input type="text" name="paypal_live_signature" class="form-control" value="{!! unserialize($configuration->paypal_account)['paypal_live_signature'] !!}"/>
					                            <span class="help-block api-keys-error" style="color:red" id="paypal_live_signature"></span>
					                        </div>
					                    </div>--}}
	                                	<div class="form-group form-group-api-keys">
		                                    <label class="col-md-2 col-xs-12 control-label">
		                                    	Mode
		                                    	<button type="button" class="btn question-btn"  data-container="body" data-toggle="popover" data-placement="top" data-content="Place the word 'sandbox' if the website is not yet live, or place the word 'live' if the website is on live">
		                                    		<i class="fa fa-question-circle" aria-hidden="true"></i>
		                                    	</button>
		                                    </label>
					                        <div class="col-md-8 col-xs-12">
												<select class="form-control" name="paypal_mode">
													<option value="">Select Mode</option>
													<option {!! $configuration->paypal_mode === "sandbox" ? "selected" : "" !!} value="sandbox">Sandbox</option>
													<option {!! $configuration->paypal_mode === "live" ? "selected" : "" !!} value="live">Live</option>
												</select>
					                            <span class="help-block api-keys-error" style="color:red" id="paypal_mode"></span>
					                        </div>
					                    </div>
	                                </div>
	                                <div class="panel-footer">
	                                    <button class="btn btn-primary pull-right">Submit</button>
	                                </div>
	                                {!! csrf_field() !!}
	                            </form>                               
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop
@section('js')
	<script type="text/javascript" src="{!!asset('admin-interface/js/plugins/fileinput/fileinput.min.js')!!}"></script>
	<script type="text/javascript">
		// File input display
		if($(".file-simple").length > 0){
			// This is for the existing fields
			$('.file-simple').each(function(){
				var file = "<img src='{!!asset('/')!!}"+$(this).data('value')+"' class='file-preview-image' style='width:100%'>"
				$("."+$(this).data('file')).fileinput({
				        showUpload  : false,
				        showCaption : false,
				        browseClass : "btn btn-info",
				        showRemove  : false,
				        showClose   : false,
				        initialPreview: [ file ],
			        	initialPreviewConfig: 	[{
										            width: '500px'                     
										        }],
				        allowedFileTypes     : ["image"],
				        allowedFileExtensions: ["jpg", "png", "gif"],
				        previewconfiguration :  {
				        							previewAsData: false,
										            image: 	{
										            			width: "100%"
										            		}
										        }
				});
			});
		}
		$("#general-form").on("submit", function(){
			// Set form data
			var formData = new FormData($('#general-form')[0]);
            $.ajax({
                'url'        : "{!! URL('admin/configuration/general') !!}",
                'method'     : 'post',
                'dataType'   : 'json',
                'data'       : formData,
	            'processData': false,
	            'contentType': false,
                success      : function(data){
                	$(".form-group-general").removeClass("has-error");
                	$(".general-error").empty();
                    if(data.result == 'success'){
                    	$(".picture-display").attr("src",data.picture);
                    	$(".profile-data-name").text(data.name);
                    	$("#config-website-name").text(data.website_name);
                    	swal("Good job!", "Account has been updated.", "success");
                    }
                    else{
                		swal("Action failed", "Please check your inputs or connection and try again.", "error");
						$.each(data.errors,function(key,value){
		                    if(value != ""){
		                        $("#"+key).text(value);
		                        $("#"+key).parent().parent().addClass("has-error");
		                    }
		                });
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
		$("#social-links-form").on("submit", function(){
            $.ajax({
                'url'      : "{!! URL('admin/configuration/social-links') !!}",
                'method'   : 'post',
                'dataType' : 'json',
                'data'     : $(this).serialize(),
                success    : function(data){
                	$(".form-group-social-links").removeClass("has-error");
                	$(".social-links-error").empty();
                    if(data.result == 'success'){
                    	swal("Good job!", "Social Links has been updated.", "success");
                    }
                    else{
                		swal("Action failed", "Please check your inputs or connection and try again.", "error");
						$.each(data.errors,function(key,value){
		                    if(value != ""){
		                        $("#"+key).text(value);
		                        $("#"+key).parent().parent().addClass("has-error");
		                    }
		                });
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
		$("#email-form").on("submit", function(){
            $.ajax({
                'url'      : "{!! URL('admin/configuration/email') !!}",
                'method'   : 'post',
                'dataType' : 'json',
                'data'     : $(this).serialize(),
                success    : function(data){
                	$(".form-group-email").removeClass("has-error");
                	$(".email-error").empty();
                    if(data.result == 'success'){
                    	$(".email-input").val("");
                    	swal("Good job!", "Email has been updated.", "success");
                    }
                    else{
                		swal("Action failed", "Please check your inputs or connection and try again.", "error");
						$.each(data.errors,function(key,value){
		                    if(value != ""){
		                        $("#"+key).text(value);
		                        $("#"+key).parents('form-group').addClass("has-error");
		                    }
		                });
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
		$("#password-form").on("submit", function(){
            $.ajax({
                'url'      : "{!! URL('admin/configuration/password') !!}",
                'method'   : 'post',
                'dataType' : 'json',
                'data'     : $(this).serialize(),
                success    : function(data){
                	$(".form-group-password").removeClass("has-error");
                	$(".password-error").empty();
                    if(data.result == 'success'){
                    	$(".password-input").val("");
                    	swal("Good job!", "Password has been updated.", "success");
                    }
                    else{
                		swal("Action failed", "Please check your inputs or connection and try again.", "error");
						$.each(data.errors,function(key,value){
		                    if(value != ""){
		                        $("#"+key).text(value);
		                        $("#"+key).parents('form-group').addClass("has-error");
		                    }
		                });
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
		$("#api-keys-form").on("submit", function(){
            $.ajax({
                'url'      : "{!! URL('admin/configuration/api-keys') !!}",
                'method'   : 'post',
                'dataType' : 'json',
                'data'     : $(this).serialize(),
                success    : function(data){
                	$(".form-group-api-keys").removeClass("has-error");
                	$(".api-keys-error").empty();
                    if(data.result == 'success'){
                    	swal("Good job!", "API Keys has been updated.", "success");
                    }
                    else{
                		swal("Action failed", "Please check your inputs or connection and try again.", "error");
						$.each(data.errors,function(key,value){
		                    if(value != ""){
		                        $("#"+key).text(value);
		                        $("#"+key).parents('form-group').addClass("has-error");
		                    }
		                });
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
		// Remove the close button
		$(".fileinput-remove").remove();
        // GOOGLE LOCATION SECTION //
        var autocomplete;
        function initAutocomplete(){
            autocomplete = new google.maps.places.Autocomplete(
            (document.getElementById('autocomplete')),
            {types: ['geocode']});
        }
        // END GOOGLE LOCATION SECTION //
	</script>
	<script defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBfnVz81lAxuqTALarzFFzfh-d18W6N80E&libraries=places&callback=initAutocomplete"></script>
@stop