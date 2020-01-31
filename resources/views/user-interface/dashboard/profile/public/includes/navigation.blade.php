<div class="page-content-header clearfix">
    <div class="header-left">
        <ul>
            <li class="{!! Request::input('section') == 'profile' ? 'active' : '' !!}">
            	<a href="{!!URL($user_data->username.'?section=profile')!!}" class="hvr-underline-from-center">Profile</a>
            </li>
            <li class="{!! Request::input('section') == 'garments-for-rent' ? 'active' : '' !!}">
            	<a href="{!!URL($user_data->username.'?section=garments-for-rent')!!}" class="hvr-underline-from-center">Garments for Rent <span>(0)</span></a>
            </li>
        </ul>
    </div>
</div>