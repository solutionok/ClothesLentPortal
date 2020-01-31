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