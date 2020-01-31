<div class="col-md-3">
    <div class="page-sidebar">
        <div class="profile-picture-holder">
        	<a href="{!!URL($user_data->username.'?section=profile')!!}">
            	<img src="{!!$user_data->profile_picture!!}">
            </a>
        </div>
        <a href="{!!URL($user_data->username.'?section=profile')!!}" class="profile-name margin-0">{!!App\User::displayName($user_data->id)!!}</a>
        <a href="mailto:{{$user_data->email}}" class="email">{!!$user_data->email!!}</a>
    </div>
</div>