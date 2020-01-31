<div id="message" class="white-popup-block mfp-hide messages_popup_holder">
    <h1>Create Message</h1>
    <div class="form_message">
        <form action="{!! URL('messages/send-message') !!}" method="POST">
            <label for="message_list"><h2>To: {{ $client->first_name }} {{ $client->last_name }}</h2></label>
            <input type="hidden" name="to" value="{{ $client->id }}">
            <input type="hidden" name="not_js" value="true">
            <div class="form-group">
              <textarea class="form-control" name="content" placeholder="Write your message..."></textarea>
            </div>
            <div class="form-group button_submit clearfix">
                <button>Send Message</button>
            </div>
        {!! csrf_field() !!}
        </form>
    </div>
</div>  

<div id="Accept_rentalsuit" class="white-popup-block mfp-hide accept_popup">
    <form action="{!! URL('notification/accept-request') !!}" method="POST">
        <label>NOTICE: Have this item sent out within 3 days before {{$rented->rental_start_date}}</label>
        <div class="form-group button_submit clearfix">
            <input type="hidden" name="rentID" value="{{ $rented->id }}">
            <input type="hidden" name="notificationID" value="{{ $notification->id }}">            
            <button>Confirm</button>
        </div>
        {!! csrf_field() !!}        
    </form>
</div>  

<div class="page-content-header notification_inner_page clearfix">
    <div class="header-left">
        <h3>{{$notification->title}} <span>{{ App\Models\Helper::timeDuration($notification->created_at) }}</span></h3>
    </div>
</div>
<div class="listing-of-notification">
    <div class="product-inner-holder">
        <div class="row">
            <div class="col-md-4">
                <div class="img-holder">
                    <img src="{!!asset($product->picture)!!}">
                </div>
            </div>
            <div class="col-md-8">
                <div class="rent-details-holder">
                    <h3>RENT DETAILS</h3>
                    <div class="row list-container">
                        <strong class="col-md-4">DELIVERY OPTION</strong>
                        <div class="col-md-8">
                            <p>{{$rented->delivery_option}}</p>
                        </div>
                    </div>                                          
                    <div class="row list-container">
                        <strong class="col-md-4">RENTAL PERIOD</strong>
                        <div class="col-md-8">
                            <p>From: {{$rented->rental_start_date}}</p>
                            <p>To: {{$rented->rental_end_date}}</p>
                        </div>
                    </div>
                    <div class="row list-container">
                        <strong class="col-md-4">DELIVERY LOCATION</strong>
                        <div class="col-md-8">
                            <p>{{$rented->street_number}} {{$rented->route}}, {{$rented->city}} {{$rented->state}}, {{$rented->postal_code}}, {{$rented->country}}</p>
                            <p>- {{$rented->address2}}</p>
                            {{--<p>- {{$rented->address3}}</p>--}}
                        </div>
                    </div>
                    <div class="row list-container">
                        <strong class="col-md-4">OTHER DETAIS</strong>
                        <div class="col-md-8">
                            <p>Email: {{$rented->email}}</p>
                            <p>Contact#: {{$rented->contact_number}}</p>
                            <p>Description: {{$rented->description}}</p>
                        </div>
                    </div>
                    <div class="row list-container">
                        <strong class="col-md-4">NOTES</strong>
                        <div class="col-md-8">
                            <p>{{$rented->description}}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
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
                            <img src="{!!asset($owner->profile_picture)!!}">
                        </div>
                        <div class="profile-name">
                            <a href="{!!URL('profile/profile-personal-info/'.Crypt::encrypt($product->userID))!!}">{{$owner->first_name}} {{$owner->last_name}}</a>
                        </div>
                    </div>
                    <div class="clearfix list-description">
                        <strong class="col-md-3">CONTACT#</strong>
                        <div class="col-md-9">
                            <p>{{$owner->contact_number}}</p>
                        </div>
                    </div>
                    <div class="clearfix list-description">
                        <strong class="col-md-3">LOCATION</strong>
                        <div class="col-md-9">
                            <p>{{$owner->location}}</p>
                        </div>
                    </div>
                    <div class="clearfix list-description">
                        <strong class="col-md-3">BODY TYPE</strong>
                        <div class="col-md-9">
                            <img src="{!!asset('user-interface/img/body-type-new-'.$owner->body_type.'.png')!!}">
                        </div>
                    </div>
            </div>
        </div>
    </div>
    <div class="btn_holder">
        <ul class="list-unstyled">
            @if ($notification->response == NULL)
            	@if($notification->type=='rental_request')
                <li><a href="#Accept_rentalsuit" class="popup-with-form">ACCEPT</a></li>
                <li><a href="#give-reasons" class="decline popup-with-form">DECLINE</a></li>
                @endif
            @else
                <li>{{ $notification->response == 'accepted' ? 'ACCEPTED' : 'DECLINED'}}</li>
            @endif
            <li><a href="#message"  class=" popup-with-form">SEND A MESSAGE</a></li>
        </ul>
    </div>
</div>