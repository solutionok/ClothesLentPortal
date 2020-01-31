 @extends('user-interface.layout')
@section('title' , $page_content->section_first[0]->content)
@section('content')
	<div class="dashboard shipping_calculator">
       <div class="section-1">
            <div class="mx-1254 clearfix">
                <div class="breadcrumbs">
                    <ul>
                        <li><a href="">Home</a></li>
                        <li><a href="">shipping calculator</a></li>
                    </ul>
                </div>
                <div class="shipping_calculator_border">
                    <h1>Shipping Calculator</h1>

                    <div class="shipping_calculator_border_inside">
                        <h3 class="register-error errors" id="shipping_calculator_some_error"></h3>
                        <form id="shipping_calculator">
                            <h2>Shipping Type</h2>

                                        <div class="form-group">
                                            <div class="select">
                                            <select class="form-control" name="type">
                                              <option value="Localization">Canada Post</option>
                                              <option value="UPS">UPS</option>
                                            </select>
                                            <span class="register-error errors" id="shipping_calculator_type"></span>
                                            </div>
                                        </div>
                                    
                            <h2>From Information</h2>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-12 col">
                                        <input type="text" class="form-control" id="FromAddress" placeholder="Address" name="from_address">
                                        <span class="register-error errors" id="shipping_calculator_from_address"></span>
                                    </div>
                                </div>
                            </div>
                                <div class="row">
                                    <div class="col-md-3 col">
                                        <div class="form-group">
                                            <input type="text" class="form-control" id="FromCity" placeholder="City" name="from_city">
                                            <span class="register-error errors" id="shipping_calculator_from_city"></span>
                                        </div>
                                    </div>
                                    <div class="col-md-3 col">
                                        <div class="form-group">
                                           <!--  <input type="text" class="form-control" id="FromState" placeholder="State" name="from_state"> -->
                                            <select name="from_state_province_code" class="form-control" placeholder="State Province Code">
                                                <option value="">Please Select</option>
                                                <option value="AB">Alberta, CA</option>
                                                <option value="BC">British Columbia, CA</option>
                                                <option value="MB">Manitoba, CA</option>
                                                <option value="NB">New Brunswick, CA</option>
                                                <option value="NL">Newfoundland and Labrador, CA</option>
                                                <option value="NT">Northwest Territories, CA</option>
                                                <option value="NS">Nova Scotia, CA</option>
                                                <option value="NU">Nunavut, CA</option>
                                                <option value="ON">Ontario, CA</option>
                                                <option value="PE">Prince Edward Island, CA</option>
                                                <option value="QC">Quebec, CA</option>
                                                <option value="SK">Saskatchewan, CA</option>
                                                <option value="YT">Yukon, CA</option>

                                            </select>
                                            <span class="register-error errors" id="shipping_calculator_from_state_province_code"></span>
                                        </div>
                                    </div>
                                    <div class="col-md-3 col">
                                        <div class="form-group">
                                            <input type="text" class="form-control" id="FromZip Code" placeholder="Zip Code" name="from_zipcode">
                                            <span class="register-error errors" id="shipping_calculator_from_zipcode"></span>
                                        </div>
                                    </div>
                                    <div class="col-md-3 col">
                                        <div class="form-group">
                                            <div class="select">
                                            <select class="form-control" name="from_countries">
                                              
                                                     @foreach($countries as $value)
                                                       
                                                        @if($value->Code2=="CA")
                                                        <option value="{{$value->Code2}}">{{$value->Name}}</option>
                                                        @endif
                                                        
                                                        
                                                    @endforeach
                                            </select>
                                            <span class="register-error errors" id="shipping_calculator_from_countries"></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <h2>Destination Information</h2>
                                <div class="form-group">
                                <div class="row">
                                    <div class="col-md-12 col">
                                        <input type="text" class="form-control" id="Address" placeholder="Address" name="destination_address">
                                        <span class="register-error errors" id="shipping_calculator_destination_address"></span>
                                    </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-3 col">
                                        <div class="form-group">
                                            <input type="text" class="form-control" id="City" placeholder="City" name="destination_city">
                                            <span class="register-error errors" id="shipping_calculator_destination_city"></span>
                                        </div>
                                    </div>
                                    <div class="col-md-3 col">
                                        <div class="form-group">
                                            
                                            <select name="destination_state_province_code" class="form-control" placeholder="State Province Code">
                                                <option value="">Please Select</option>
                                                <option value="AB">Alberta, CA</option>
                                                <option value="BC">British Columbia, CA</option>
                                                <option value="MB">Manitoba, CA</option>
                                                <option value="NB">New Brunswick, CA</option>
                                                <option value="NL">Newfoundland and Labrador, CA</option>
                                                <option value="NT">Northwest Territories, CA</option>
                                                <option value="NS">Nova Scotia, CA</option>
                                                <option value="NU">Nunavut, CA</option>
                                                <option value="ON">Ontario, CA</option>
                                                <option value="PE">Prince Edward Island, CA</option>
                                                <option value="QC">Quebec, CA</option>
                                                <option value="SK">Saskatchewan, CA</option>
                                                <option value="YT">Yukon, CA</option>

                                            </select>
                                            <span class="register-error errors" id="shipping_calculator_destination_state_province_code"></span>
                                        </div>
                                    </div>
                                    <div class="col-md-3 col">
                                        <div class="form-group">
                                            <input type="text" class="form-control" id="Zip Code" placeholder="Zip Code" name="destination_zipcode">
                                            <span class="register-error errors" id="shipping_calculator_destination_zipcode"></span>
                                        </div>
                                    </div>
                                    <div class="col-md-3 col">
                                        <div class="form-group">
                                            <div class="select">
                                            <select class="form-control" name="destination_countries">
                                              

                                                    @foreach($countries as $value)
                                                       
                                                        @if($value->Code2=="CA")
                                                        <option value="{{$value->Code2}}">{{$value->Name}}</option>
                                                        @endif
                                                        
                                                        
                                                    @endforeach
                                            </select>
                                            <span class="register-error errors" id="shipping_calculator_destination_countries"></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            <h2>Item Information</h2>
                                <div class="row">
                                    <p>Dimentions</p>
                                    <h4>Weight</h4>
                                    <div class="col-md-2 col">
                                        <div class="form-group">
                                            <input type="number" class="form-control" id="Length" placeholder="Length" name="length">
                                            <span class="register-error errors" id="shipping_calculator_length"></span>
                                        </div>
                                    </div>
                                    <div class="col-md-2 col">
                                        <div class="form-group">
                                            <input type="number" class="form-control" id="Width" placeholder="Width" name="width">
                                            <span class="register-error errors" id="shipping_calculator_width"></span>
                                        </div>
                                    </div>
                                    <div class="col-md-2 col">
                                        <div class="form-group">
                                            <input type="text" class="form-control" id="Height" placeholder="Height" name="height">
                                            <span class="register-error errors" id="shipping_calculator_height"></span>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col">
                                        <div class="form-group">
                                            <!-- <input type="number" class="form-control" id="Enter_Weight" placeholder="Enter Weight" name="weight"> -->
                                            <select class="form-control" name="weight">
                                              <option value="">Please Select</option>
                                              @for($i=1;$i<=30;$i++)
                                              <option value="{{$i}}">{{$i}}</option>
                                              @endfor
                                            </select>
                                            <span class="register-error errors" id="shipping_calculator_weight"></span>
                                            <h6>kg</h6>
                                        </div>
                                    </div>
                                </div>
                                {{ csrf_field() }}

                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-12 col">
                                        <button type="submit" class="btn" >Submit</button>
                                    </div>
                                </div>
                            </div>
                            <div class="footer_border clearfix" id="success_data">
                                
                                
                                
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
@stop
@section('js')
@include('user-interface.cart.includes.js')
<script type="text/javascript">
        $(document).on("submit","#shipping_calculator", function(){
            $.ajax({
                'url'      : "{!! URL('shipping-calculator') !!}",
                'method'   : 'post',
                'dataType' : 'json',
                'data'     : $(this).serialize(),
                success    : function(data){

                    $(".register-error").empty();
                    if (data.result == 'success') {
                        swal("Good Job!", "Success.", "success");
                        $.magnificPopup.close();
                        $("#success_data").html(data.data);
                    }
                    else {
                        swal("Action failed", "Please check your inputs or connection and try again.", "error");

                        $.each(data.errors,function(key,value){
                            if(value != ""){
                                $("#shipping_calculator_"+key).text(value);
                            }
                        });
                    }

                },
                beforeSend : function(){
                    $('#loadingDiv').show();
                },
                complete   : function(){
                    $('#loadingDiv').hide();
                }
            });
            return false;
        });
    </script>
@stop