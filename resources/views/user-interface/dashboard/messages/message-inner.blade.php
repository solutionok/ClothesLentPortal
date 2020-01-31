@extends('user-interface.layout')
@section('title',App\User::displayName(Auth::user()->id))
@section('content')
    <div class="">
        <div class="dashboard renting">
            <div class="section-1">
                <div class="mx-1254 clearfix">
                    <div class="breadcrumbs">
                        <ul>
                            <li><a href="{!!URL('/')!!}">Home</a></li>
                            <li><a href="{!!URL('messages')!!}">Messages</a></li>
                            <li><span>Message-inner</span></li>
                        </ul>
                    </div>
                    <div class="dashboard-container clearfix">
                        @include('user-interface.dashboard.includes.left-sidebar')
                        <div class="col-md-9">
                            <div class="page-content">
                                <div class="page-content-header clearfix">
                                    <div class="header-left">
                                        <h3>Message</h3>
                                    </div>
                                </div>
                                <div class="listing-product-holder text-center">
                                    
                                    <div class="Message_border">
                                        <div class="save-listing">
                                            <div class="message-person-holder clearfix">
                                                <div class="img-holder">
                                                    <a href="">
                                                        @if($messages_data->users_data->users_information->profile_picture != '')
                                                            <img src="{!!asset($messages_data->users_data->users_information->profile_picture)!!}">
                                                        @else
                                                            <img src="{!!asset('uploads/others/no_avatar.jpg')!!}">
                                                        @endif
                                                    </a>
                                                </div>
                                                <div class="person-name-holder">
                                                    <p>{!! ucwords($messages_data->users_data->users_information->first_name.' '.$messages_data->users_data->users_information->last_name) !!}</p>
                                                </div>
                                            </div><br>
<!-- ------------------------------------------------------------------------------------------------------------------------------------------------------ -->
                                            <div class="msg-holder">
                                                <div class="scrollbar msg-inner-body" id="msg-scroll">
                 
                                                @if(count($messages) && $messages_data->total_messages > 5)
                                                    <a id="load-more-trigger" class="load-more-msg" data-date="{!! Crypt::encrypt($last_message_data->created_at) !!}" data-room-id="{!! Crypt::encrypt($last_message_data->room_id) !!}">Load more</a>
                                                    <div class="load_more_loader"></div>
                                                @endif 

                                                    <div id="display-content-parent">
                                                        <?php $time_duration_holder = []; ?>
                                                        @foreach($messages as $value)
                                                        <?php $message_data = App\Models\Messages\Messages::getData($value->id); ?>
                                                        @if(in_array($message_data->time_duration,$time_duration_holder, true))

                                                        @else
                                                            <?php $time_duration_holder[] = $message_data->time_duration ?>
                                                            <div class="msg-time-arrived pos-rel">
                                                                <hr class="msg-lefty">
                                                                <p>{!! $message_data->time_duration !!}</p>
                                                                <hr class="msg-righty">
                                                            </div>
                                                        @endif
                                                        <div class="clearfix">
                                                                @if($value->from_user_id == Auth::user()->id)
                                                                <div class="msg-sender-holder">
                                                                    <div class="sender-text">
                                                                        <p>{!! $value->content !!}</p>
                                                                    </div>
                                                                </div>
                                                                @else                                                  
                                                                <div class="msg-receiver-holder">
                                                                    <div class="img-holder">
                                                                        @if($messages_data->users_data->users_information->profile_picture != '')
                                                                            <img src="{!!asset($messages_data->users_data->users_information->profile_picture)!!}">
                                                                        @else
                                                                            <img src="{!!asset('uploads/others/no_avatar.jpg')!!}">
                                                                        @endif
                                                                    </div>
                                                                    <div class="receiver-text">
                                                                        <p>{!! $value->content !!}</p>
                                                                    </div>
                                                                </div>
                                                                @endif                                                          
                                                        </div>
                                                        @endforeach
                                                    </div>

                                                </div>
                                            </div>
<!-- ------------------------------------------------------------------------------------------------------------------------------------------------------ -->
                                            <form id='reply-form' enctype="multipart/form-data">
                                                <div class="form-group">
                                                    <textarea class="write-a-msg-holder message-reply-value" placeholder="Write a reply..." name="content"></textarea>
                                                    <input type="hidden" name="to" value="{!! $messages_data->users_data->users_information->id !!}">
                                                </div>
                                                <button class="btn">Send Message</button>
                                            {{csrf_field()}}
                                            </form>
                                        </div>
                                    </div>                                    
                                </div>
                            <!--<div class="text-right">
                                    <ul class="pagination">
                                        <li class="page-item"><a class="page-link" href="#">Previous</a></li>
                                        <li class="page-item active"><a class="page-link" href="#">1</a></li>
                                        <li class="page-item"><a class="page-link" href="#">2</a></li>
                                        <li class="page-item"><a class="page-link" href="#">3</a></li>
                                        <li class="page-item"><a class="page-link" href="#">Next</a></li>
                                    </ul>
                                </div> -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop
@section('js')
    <script>
        if($('.msg-inner-body').length != 0){
            $('.msg-inner-body').scrollTop($('.msg-inner-body')[0].scrollHeight);
        }
        // Load more trigger
        $(document).on("click","#load-more-trigger",function(){
            $.ajax({
                'url'      : "{!! URL('/messages/messages-load-more') !!}",
                'method'   : 'get',
                'dataType' : 'json',
                'data'     :    {
                                    date    : $(this).data('date'),
                                    room_id : $(this).data('room-id')
                                },
                success    : function(response){
                    if(response.result == 'success'){
                        // Change the date
                        $("#load-more-trigger").data("date",response.date);
                        // Add the content
                        $("#display-content-parent").prepend(response.content);
                        // Check if there are no messages left
                        if(response.empty == 'true'){
                            // Remove the load more
                            $('#load-more-trigger').remove();
                        }
                        else{
                            // Show the load more
                            $('#load-more-trigger').show();
                        }
                    }
                    else{
                        // Remove the load more
                        $('#load-more-trigger').remove();
                    }
                },
                beforeSend : function(){
                    $('#load-more-trigger').hide();
                    $('.load_more_loader').show();
                },
                complete   : function(){
                    $('.load_more_loader').hide();
                }
            });
            return false;
        });
        
        $(document).on("submit","#reply-form",function(){
            // Set form data
            var formData = new FormData($('#reply-form')[0]);
            $.ajax({
                'url'        : "{!! URL('/messages/send-message') !!}",
                'method'     : 'post',
                'dataType'   : 'json',
                'data'       : formData,
                'processData': false,
                'contentType': false,
                success      : function(data){
                    // Remove the error
                    $(".error_validation").empty();
                    if(data.result == 'success'){
                        // Add the content
                        $("#display-content-parent").append(data.content);
                        // Set the messages scroll to the bottom
                        $('.msg-inner-body').scrollTop($('.msg-inner-body')[0].scrollHeight);
                        // Reset value
                        $(".message-reply-value").val("");
                    }
                    else{
                        swal("Action failed", "Please check your inputs or connection and try again.", "error");
                        $.each(data.errors,function(key,value){
                            if(value != ""){
                                $("#"+key).text(value);;
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
    </script>
@stop