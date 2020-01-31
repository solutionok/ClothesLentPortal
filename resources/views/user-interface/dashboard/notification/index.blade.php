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
                        <li><span>Notification</span></li>
                    </ul>
                </div>
                <div class="dashboard-container clearfix">
                    @include('user-interface.dashboard.includes.left-sidebar')
                    <div class="col-md-9">
                        <div class="page-content">
                            <div class="page-content-header clearfix">
                                <div class="header-left">
                                    <h3>Notifications <!--<span>({{$unopened}})</span>--></h3>
                                </div>
                                <div class="header-right">
                                    <div class="form-group clearfix">
                                        <label for="" class="col-sm-5 control-label">Sort by</label>
                                        <div class="col-sm-7">
                                            <div class="select">
                                                <select class="form-control select_form" name="sort">
                                                <option value="date-recently" {{ Request::input('sort') == 'date-recently' ? 'selected' : '' }}>Date (Recently)</option>
                                                <option value="date-beginning" {{ Request::input('sort') == 'date-beginning' ? 'selected' : '' }}>Date (Beginning)</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="">
                            @forelse($notifications as $value)
                            <?php $rent = App\Models\Rent\Rent::where('id', $value->rentID)->first(); ?>
                            <?php $client = App\User::where('id', $value->from_user)->first(); ?>
                            <?php $product = App\Models\Products\Products::where('id', $rent->product_id)->first(); ?>
                            <?php ?>
                                <div class="single-notification single-noti clearfix {!! $value->status == 0 ? 'unread' : '' !!}">
                                    @if($value->type == 'feedback')
                                        {{--<div class="col_img">
                                            <div class="img-holder">
                                                <img src="{!!asset($client->profile_picture)!!}">
                                            </div>
                                        </div>--}}
                                        <div class="row">
                                            <div style="font-weight: bold" class="columns col-md-1 text-right">
                                                <a href="">{{$value->dateTime}}</a>
                                            </div>
                                            <div class="columns col-md-8"><a class="hover-noti">{{$value->message}}</a></div>
{{--                                            <p>{{ App\Models\Helper::timeDuration($value->created_at) }}</p>--}}
                                            <div class="columns col-md-3 col_view_link text-right">
                                                <a href="#give-feedback" class="give-feedback-btn popup-with-form">Give Feedback</a>
                                            </div>
                                        </div>

                                    @else
                                        {{--<div class="col_img">
                                            <div class="img-holder">
                                                <img src="{!!asset($client->profile_picture)!!}">
                                            </div>
                                        </div>--}}
                                        <div class="row">
                                            @if($product->user_id != Auth::user()->id)
                                            <div style="font-weight: bold" class="columns col-md-1 text-right">
                                                <a style="color: #000;" href="{!!URL('rented/view/'.$value->rent_id) !!}" >{{$value->dateTime}}</a>
                                            </div>
                                            <div class="columns col-md-11"><a class="hover-noti" href="{!!URL('rented/view/'.$value->rent_id) !!}">{!! $value->message !!}</a></div>
                                            @else
                                                <div style="font-weight: bold" class="columns col-md-1 text-right">
                                                    <a style="color: #000;" href="{!!URL('for-rent/booking-list/' . $product->id) !!}" >{{$value->dateTime}}</a>
                                                </div>
                                                <div class="columns col-md-11"><a class="hover-noti" href="{!!URL('for-rent/booking-list/'.$product->id) !!}">{!! $value->message !!}</a></div>
                                            @endif
                                            
                                            
                                            
                                        </div>
{{--                                        <div class="pull-right">{{\App\Models\Helper::timeDuration($value->created_at)}}</div>--}}
                                        <!--<div class="col_view_link text-right">
                                            <a href="{!!URL('notification/notification-inner?rentID='.Crypt::encrypt($rent->id).'&notificationID='.Crypt::encrypt($value->notificationID))  !!}">View Details <i class="fa fa-angle-right" aria-hidden="true"></i></a>
                                        </div>-->
                                    @endif
                                </div>
                            @empty
                                No result found.
                            @endforelse
                            </div>
                            <div class="text-right">
                                <ul class="pagination">
                                    {{ $notifications->appends(Request::input())->render() }}
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

        // $('.feedback').click(function(){
        //     swal("Thank you", "Feedback has been sent.", "success")
        // });
    </script>
@stop